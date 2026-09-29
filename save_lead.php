<?php
// Lead capture form handler
include_once('includes/configs/init.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit;
}

$coupleName = trim($_POST['couple_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$weddingDate = trim($_POST['wedding_date'] ?? '');

// Validate inputs
if (empty($coupleName) || empty($email)) {
    echo json_encode(['success' => false, 'error' => 'Name and email are required']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'error' => 'Invalid email address']);
    exit;
}

// Prepare SQL - use parameterized approach or proper escaping
$userslog_obj = new userslog();

// Check if email already exists
$checkSql = "SELECT lead_id FROM email_leads WHERE email = '" . addslashes($email) . "'";
$existing = $userslog_obj->db_connect->querySelect($checkSql);
$userslog_obj->db_connect->closedb();

if (!empty($existing)) {
    echo json_encode(['success' => false, 'error' => 'This email is already registered']);
    exit;
}

// Insert new lead
$insertSql = "INSERT INTO email_leads (couple_name, email, phone, wedding_date, source, status)
              VALUES (
                  '" . addslashes($coupleName) . "',
                  '" . addslashes($email) . "',
                  '" . addslashes($phone) . "',
                  " . (!empty($weddingDate) ? "'" . date('Y-m-d', strtotime($weddingDate)) . "'" : "NULL") . ",
                  'homepage',
                  'new'
              )";

$leadId = $userslog_obj->insertVal($insertSql);

if ($leadId) {
    // Send thank you email
    $subject = "Welcome to InviteIndia - Your Wedding Website Awaits!";
    $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; }
            .header { background: #d81b60; color: white; padding: 20px; text-align: center; border-radius: 5px; }
            .content { background: white; padding: 20px; border-radius: 5px; line-height: 1.6; }
            .btn { background: #d81b60; color: white; padding: 12px 30px; text-decoration: none; border-radius: 4px; display: inline-block; margin: 20px 0; }
            .footer { text-align: center; font-size: 12px; color: #666; margin-top: 20px; }
        </style>
    </head>
    <body>
        <div class=\"container\">
            <div class=\"header\">
                <h1>Welcome to InviteIndia!</h1>
            </div>
            <div class=\"content\">
                <p>Hi " . htmlspecialchars($coupleName) . ",</p>
                <p>Thank you for showing interest in creating your wedding website!</p>
                <p>We're excited to help you celebrate your special day online. Here's what you can do with InviteIndia:</p>
                <ul>
                    <li>✅ Create a beautiful wedding website in minutes</li>
                    <li>✅ Share your invitation on WhatsApp & other platforms</li>
                    <li>✅ Collect RSVPs automatically</li>
                    <li>✅ Add venue maps, photos, and background music</li>
                    <li>✅ Get your own custom domain (rahulwedspriya.com)</li>
                </ul>
                <p><a href=\"https://www.inviteindia.com/signup.php\" class=\"btn\">Create Your Wedding Website Free</a></p>
                <p>No credit card needed. Start in under 10 minutes.</p>
                <p>Have questions? Reply to this email anytime - our team is here to help!</p>
                <p>Best wishes for your upcoming wedding,<br><strong>The InviteIndia Team</strong></p>
            </div>
            <div class=\"footer\">
                <p>&copy; 2026 InviteIndia.com - Create your wedding website online</p>
            </div>
        </div>
    </body>
    </html>";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: InviteIndia <noreply@inviteindia.com>\r\n";

    mail($email, $subject, $message, $headers);

    echo json_encode([
        'success' => true,
        'message' => 'Thank you! Check your email for next steps.',
        'lead_id' => $leadId
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to save lead. Please try again.']);
}
exit;
?>
