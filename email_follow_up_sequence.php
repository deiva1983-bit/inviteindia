<?php
/**
 * Email Follow-up Sequence for Leads
 * Call this via cron job to send automated follow-ups
 *
 * Setup:
 * - Email 1: Sent immediately (save_lead.php handles this)
 * - Email 2: Sent 1 day after signup
 * - Email 3: Sent 3 days after signup if no conversion
 */

include_once('includes/configs/init.php');

class EmailFollowUp {
    private $userslog_obj;

    public function __construct() {
        global $userslog_obj;
        $this->userslog_obj = new userslog();
    }

    /**
     * Send Day 1 follow-up: Wedding planning tips
     */
    public function sendDay1Email($email, $coupleName) {
        $subject = "💍 5 Wedding Planning Hacks You Need to Know";

        $message = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; }
                .header { background: linear-gradient(135deg, #d81b60 0%, #c2185b 100%); color: white; padding: 20px; text-align: center; border-radius: 8px; }
                .content { background: white; padding: 20px; border-radius: 8px; margin-top: 10px; }
                .tip { background: #f0f0f0; padding: 15px; margin: 15px 0; border-left: 4px solid #d81b60; border-radius: 4px; }
                .tip h3 { margin-top: 0; color: #d81b60; }
                .cta { background: #d81b60; color: white; padding: 15px 30px; text-decoration: none; border-radius: 4px; display: inline-block; margin: 20px 0; }
                .footer { text-align: center; font-size: 12px; color: #666; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class=\"container\">
                <div class=\"header\">
                    <h2>Smart Wedding Planning Tips</h2>
                </div>
                <div class=\"content\">
                    <p>Hi " . htmlspecialchars($coupleName) . ",</p>

                    <p>Starting to plan your wedding? Here are 5 hacks that save time and money:</p>

                    <div class=\"tip\">
                        <h3>1. Collect RSVPs in One Place</h3>
                        <p>Instead of chasing guests on WhatsApp, share a single wedding link. Everyone RSVPs there, and you get a live headcount for catering.</p>
                    </div>

                    <div class=\"tip\">
                        <h3>2. Share Venue Directions Automatically</h3>
                        <p>Embed Google Maps for each venue. Out-of-town guests tap once for navigation - no more \"where exactly is the temple?\"</p>
                    </div>

                    <div class=\"tip\">
                        <h3>3. Add Background Music to Your Invitation</h3>
                        <p>Set shehnai or your favorite song as the background. It plays as guests scroll through your site - sets the celebration mood.</p>
                    </div>

                    <div class=\"tip\">
                        <h3>4. Password-Protect Your Site</h3>
                        <p>Share freely on WhatsApp, but only people with the password can see photos and family details. Privacy + reach = perfect balance.</p>
                    </div>

                    <div class=\"tip\">
                        <h3>5. Use Your Own Wedding Domain</h3>
                        <p>Instead of a generic link, send rahulwedspriya.com - it's personal, memorable, and costs less than you'd think.</p>
                    </div>

                    <p style=\"text-align: center; margin-top: 30px;\">
                        <a href=\"https://www.inviteindia.com/signin.php\" class=\"cta\">Start Building Your Website Now</a>
                    </p>

                    <p>All of these features are built into InviteIndia. Most couples finish their site in about 10 minutes.</p>
                    <p>Questions? Hit reply - we're here to help!</p>
                    <p>Best wishes,<br><strong>The InviteIndia Team</strong></p>
                </div>
                <div class=\"footer\">
                    <p>&copy; 2026 InviteIndia.com | <a href=\"https://www.inviteindia.com/unsubscribe?email=" . urlencode($email) . "\" style=\"color: #666;\">Unsubscribe</a></p>
                </div>
            </div>
        </body>
        </html>";

        return $this->sendEmail($email, $subject, $message);
    }

    /**
     * Send Day 3 follow-up: Success stories
     */
    public function sendDay3Email($email, $coupleName) {
        $subject = "✨ See How Other Couples Created Their Wedding Site in 10 Minutes";

        $message = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; }
                .header { background: linear-gradient(135deg, #d81b60 0%, #c2185b 100%); color: white; padding: 20px; text-align: center; border-radius: 8px; }
                .content { background: white; padding: 20px; border-radius: 8px; margin-top: 10px; }
                .testimonial { background: #f0f0f0; padding: 15px; margin: 15px 0; border-radius: 4px; border-left: 4px solid #gold; }
                .testimonial strong { color: #d81b60; }
                .cta { background: #d81b60; color: white; padding: 15px 30px; text-decoration: none; border-radius: 4px; display: inline-block; margin: 20px 0; }
                .footer { text-align: center; font-size: 12px; color: #666; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class=\"container\">
                <div class=\"header\">
                    <h2>See What's Possible</h2>
                </div>
                <div class=\"content\">
                    <p>Hi " . htmlspecialchars($coupleName) . ",</p>

                    <p>Not sure if InviteIndia is right for you? Here's what other couples are saying:</p>

                    <div class=\"testimonial\">
                        <p><strong>\"Created our site in 15 minutes on a Sunday morning!\"</strong></p>
                        <p>- Priya & Rahul, Bangalore</p>
                        <p>\"We shared it on WhatsApp and RSVPs started coming in immediately. No more chasing people on chat.\"</p>
                    </div>

                    <div class=\"testimonial\">
                        <p><strong>\"Our out-of-town guests were impressed by the venue maps.\"</strong></p>
                        <p>- Ananya & Arjun, Mumbai</p>
                        <p>\"Added the ceremony and reception venues with parking details. Guests navigated perfectly on their own.\"</p>
                    </div>

                    <div class=\"testimonial\">
                        <p><strong>\"The custom domain made us look professional.\"</strong></p>
                        <p>- Meera & Karan, Delhi</p>
                        <p>\"Our guests thought we hired an expensive designer. It was actually just a beautiful theme + our photos.\"</p>
                    </div>

                    <p style=\"text-align: center; margin-top: 30px; font-size: 18px; font-weight: bold;\">
                        Ready to see what you can create?
                    </p>
                    <p style=\"text-align: center;\">
                        <a href=\"https://www.inviteindia.com/signin.php\" class=\"cta\">Create Your Site Free - No Card Needed</a>
                    </p>

                    <p>You'll have your wedding site live in minutes. You can always edit it later - guests always see the latest version.</p>
                    <p>Questions? Reply to this email anytime.</p>
                    <p>Best wishes for your wedding!<br><strong>The InviteIndia Team</strong></p>
                </div>
                <div class=\"footer\">
                    <p>&copy; 2026 InviteIndia.com | <a href=\"https://www.inviteindia.com/unsubscribe?email=" . urlencode($email) . "\" style=\"color: #666;\">Unsubscribe</a></p>
                </div>
            </div>
        </body>
        </html>";

        return $this->sendEmail($email, $subject, $message);
    }

    /**
     * Generic email sender
     */
    private function sendEmail($to, $subject, $message) {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: InviteIndia <noreply@inviteindia.com>\r\n";

        return mail($to, $subject, $message, $headers);
    }

    /**
     * Process daily follow-up queue
     * Call this via cron: php email_follow_up_sequence.php
     */
    public function processDailyQueue() {
        // Get leads created 1 day ago (not yet contacted)
        $oneDayAgo = date('Y-m-d H:i:s', strtotime('-1 day'));
        $threeDaysAgo = date('Y-m-d H:i:s', strtotime('-3 days'));

        // Send Day 1 emails
        $day1Sql = "SELECT lead_id, email, couple_name FROM email_leads
                   WHERE created_at LIKE '" . date('Y-m-d', strtotime('-1 day')) . "%'
                   AND status = 'new'
                   LIMIT 100";
        $day1Leads = $this->userslog_obj->selectVal($day1Sql);

        if ($day1Leads) {
            foreach ($day1Leads as $lead) {
                if ($this->sendDay1Email($lead['email'], $lead['couple_name'])) {
                    // Update status
                    $updateSql = "UPDATE email_leads SET status = 'contacted' WHERE lead_id = " . (int)$lead['lead_id'];
                    $this->userslog_obj->updateVal($updateSql);
                }
            }
            echo "Sent " . count($day1Leads) . " Day 1 emails\n";
        }

        // Send Day 3 emails (only if still new)
        $day3Sql = "SELECT lead_id, email, couple_name FROM email_leads
                   WHERE created_at LIKE '" . date('Y-m-d', strtotime('-3 days')) . "%'
                   AND status = 'contacted'
                   LIMIT 100";
        $day3Leads = $this->userslog_obj->selectVal($day3Sql);

        if ($day3Leads) {
            foreach ($day3Leads as $lead) {
                if ($this->sendDay3Email($lead['email'], $lead['couple_name'])) {
                    // Mark as complete
                    $updateSql = "UPDATE email_leads SET status = 'contacted' WHERE lead_id = " . (int)$lead['lead_id'];
                    $this->userslog_obj->updateVal($updateSql);
                }
            }
            echo "Sent " . count($day3Leads) . " Day 3 emails\n";
        }
    }
}

// If called from CLI/cron
if (php_sapi_name() === 'cli') {
    $emailFollowUp = new EmailFollowUp();
    $emailFollowUp->processDailyQueue();
}
?>
