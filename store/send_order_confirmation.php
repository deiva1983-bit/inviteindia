<?php
// Send order confirmation email
include_once('../includes/configs/init.php');

function sendOrderConfirmationEmail($order, $orderItems) {
    global $glb_obj_genral;

    if (!$order || !$orderItems) {
        return false;
    }

    $to = $order['customer_email'];
    $subject = 'Order Confirmation - InviteIndia.com - Order #' . $order['order_no'];

    // Build email HTML
    $itemsHtml = '';
    $totalPrice = 0;
    foreach ($orderItems as $item) {
        $itemTotal = (float)$item['unit_price'] * (int)$item['quantity'];
        $totalPrice += $itemTotal;
        $itemsHtml .= '
        <tr>
            <td style="padding: 12px; border-bottom: 1px solid #eee;">' . htmlspecialchars($item['product_name']) . '</td>
            <td style="padding: 12px; border-bottom: 1px solid #eee; text-align: center;">' . (int)$item['quantity'] . '</td>
            <td style="padding: 12px; border-bottom: 1px solid #eee; text-align: right;">₹' . number_format($item['unit_price'], 2) . '</td>
            <td style="padding: 12px; border-bottom: 1px solid #eee; text-align: right;">₹' . number_format($itemTotal, 2) . '</td>
        </tr>';
    }

    $paymentStatusColor = ($order['payment_status'] == 'paid') ? '#27ae60' : '#f39c12';
    $paymentStatusText = ($order['payment_status'] == 'paid') ? 'Payment Received' : 'Payment Pending';

    $emailContent = '
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; }
            .header { background: #d81b60; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
            .content { background: white; padding: 20px; }
            .order-info { background: #f5f5f5; padding: 15px; margin: 15px 0; border-radius: 5px; }
            .order-info p { margin: 8px 0; }
            table { width: 100%; border-collapse: collapse; margin: 15px 0; }
            th { background: #f0f0f0; padding: 12px; text-align: left; font-weight: bold; border-bottom: 2px solid #ddd; }
            td { padding: 12px; border-bottom: 1px solid #eee; }
            .total-row { background: #f0f0f0; font-weight: bold; }
            .footer { background: #f0f0f0; padding: 15px; text-align: center; font-size: 12px; color: #666; border-radius: 0 0 5px 5px; }
            .status-badge { display: inline-block; padding: 8px 12px; border-radius: 4px; color: white; font-weight: bold; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h2>Order Confirmation</h2>
            </div>
            <div class="content">
                <p>Dear <strong>' . htmlspecialchars($order['customer_name']) . '</strong>,</p>
                <p>Thank you for your order! We have received your order and it is now being processed.</p>

                <div class="order-info">
                    <p><strong>Order Number:</strong> ' . htmlspecialchars($order['order_no']) . '</p>
                    <p><strong>Order Date:</strong> ' . date('F d, Y \a\t g:i A', strtotime($order['created_at'])) . '</p>
                    <p><strong>Payment Status:</strong> <span class="status-badge" style="background: ' . $paymentStatusColor . ';">' . $paymentStatusText . '</span></p>
                    <p><strong>Order Status:</strong> ' . ucfirst($order['order_status']) . '</p>
                </div>

                <h3>Order Items:</h3>
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: right;">Unit Price</th>
                        <th style="text-align: right;">Total</th>
                    </tr>
                    ' . $itemsHtml . '
                    <tr class="total-row">
                        <td colspan="3" style="text-align: right;">Subtotal:</td>
                        <td style="text-align: right;">₹' . number_format($order['subtotal'], 2) . '</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="3" style="text-align: right;">Shipping Charge:</td>
                        <td style="text-align: right;">₹' . number_format($order['shipping_charge'], 2) . '</td>
                    </tr>
                    <tr class="total-row" style="background: #d81b60; color: white;">
                        <td colspan="3" style="text-align: right; color: white;">Total Amount:</td>
                        <td style="text-align: right; color: white;">₹' . number_format($order['total_amount'], 2) . '</td>
                    </tr>
                </table>

                <h3>Shipping Address:</h3>
                <div class="order-info">
                    <p>' . htmlspecialchars($order['customer_name']) . '<br>
                    ' . htmlspecialchars($order['shipping_address']) . '<br>
                    ' . htmlspecialchars($order['city']) . ', ' . htmlspecialchars($order['state']) . ' ' . htmlspecialchars($order['postal_code']) . '<br>
                    ' . htmlspecialchars($order['country']) . '</p>
                </div>

                <h3>Payment Method:</h3>
                <p>' . ucfirst($order['payment_method']) . '</p>

                <p style="margin-top: 20px;">If you have any questions about your order, please contact us at <strong>support@inviteindia.com</strong> or call our customer service team.</p>

                <p>We appreciate your business and look forward to serving you again!</p>
            </div>
            <div class="footer">
                <p>&copy; 2026 InviteIndia.com. All rights reserved.<br>
                This is an automated email. Please do not reply to this email.</p>
            </div>
        </div>
    </body>
    </html>';

    // Send email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= 'From: Wedding Store <customerservice@inviteindia.com>' . "\r\n";

    return mail($to, $subject, $emailContent, $headers);
}
?>
