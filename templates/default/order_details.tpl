<div class="container" style="padding: 40px 20px; max-width: 900px;">
    <a href="account.php" style="color: #d81b60; text-decoration: none; margin-bottom: 20px; display: inline-block;">← Back to My Account</a>

    <h1 style="color: #d81b60; margin-bottom: 30px;">Order Details</h1>

    <!-- Order Status and Summary -->
    <div style="background: white; border: 1px solid #ddd; border-radius: 8px; padding: 20px; margin-bottom: 20px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <div>
                <p style="color: #666; font-size: 14px; margin: 0 0 5px 0;">Order Number</p>
                <p style="font-size: 18px; font-weight: bold; color: #d81b60; margin: 0;">{$order.order_no}</p>
            </div>
            <div>
                <p style="color: #666; font-size: 14px; margin: 0 0 5px 0;">Order Date</p>
                <p style="font-size: 18px; font-weight: bold; margin: 0;">{$order.created_at|date_format:"%d %B %Y %H:%M"}</p>
            </div>
            <div>
                <p style="color: #666; font-size: 14px; margin: 0 0 5px 0;">Payment Status</p>
                <p style="font-size: 18px; font-weight: bold; margin: 0;">
                    <span style="background: {if $order.payment_status == 'paid'}#28a745{elseif $order.payment_status == 'pending'}#ffc107{else}#dc3545{/if}; color: white; padding: 5px 10px; border-radius: 4px; display: inline-block;">
                        {capitalize($order.payment_status)}
                    </span>
                </p>
            </div>
            <div>
                <p style="color: #666; font-size: 14px; margin: 0 0 5px 0;">Order Status</p>
                <p style="font-size: 18px; font-weight: bold; margin: 0;">
                    <span style="background: #17a2b8; color: white; padding: 5px 10px; border-radius: 4px; display: inline-block;">
                        {capitalize($order.order_status)}
                    </span>
                </p>
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <!-- Shipping Address -->
        <div style="background: white; border: 1px solid #ddd; border-radius: 8px; padding: 20px;">
            <h3 style="color: #d81b60; margin-top: 0; margin-bottom: 15px;">Shipping Address</h3>
            <p style="margin: 8px 0; line-height: 1.6;">
                <strong>{$order.customer_name}</strong><br />
                {$order.shipping_address}<br />
                {$order.city}, {$order.state}<br />
                {$order.country} - {$order.postal_code}<br />
                <strong>Phone:</strong> {$order.customer_phone}
            </p>
        </div>

        <!-- Payment Details -->
        <div style="background: white; border: 1px solid #ddd; border-radius: 8px; padding: 20px;">
            <h3 style="color: #d81b60; margin-top: 0; margin-bottom: 15px;">Payment Details</h3>
            <p style="margin: 8px 0;">
                <strong>Payment Method:</strong> {capitalize($order.payment_method)}<br />
                <strong>Email:</strong> {$order.customer_email}
            </p>
        </div>
    </div>

    <!-- Order Items -->
    <div style="background: white; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; margin-top: 20px;">
        <div style="background: #f8f9fa; padding: 15px; border-bottom: 1px solid #ddd;">
            <h3 style="margin: 0; color: #d81b60;">Order Items ({$items|@count})</h3>
        </div>

        {if $items && $items|@count > 0}
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f8f9fa; border-bottom: 2px solid #ddd;">
                        <th style="padding: 12px; text-align: left;">Product</th>
                        <th style="padding: 12px; text-align: center;">Quantity</th>
                        <th style="padding: 12px; text-align: right;">Unit Price</th>
                        <th style="padding: 12px; text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$items item=item}
                        {assign var="itemTotal" value=$item.unit_price * $item.quantity}
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 12px;">{$item.product_name}</td>
                            <td style="padding: 12px; text-align: center;">{$item.quantity}</td>
                            <td style="padding: 12px; text-align: right;">₹{number_format($item.unit_price, 2)}</td>
                            <td style="padding: 12px; text-align: right;">₹{number_format($itemTotal, 2)}</td>
                        </tr>
                    {/foreach}
                </tbody>
                <tfoot>
                    <tr style="background: #f8f9fa; border-top: 2px solid #ddd;">
                        <td colspan="3" style="padding: 12px; text-align: right;">Subtotal:</td>
                        <td style="padding: 12px; text-align: right; font-weight: bold;">₹{number_format($order.subtotal, 2)}</td>
                    </tr>
                    <tr style="background: #f8f9fa;">
                        <td colspan="3" style="padding: 12px; text-align: right;">Shipping Charge:</td>
                        <td style="padding: 12px; text-align: right; font-weight: bold;">₹{number_format($order.shipping_charge, 2)}</td>
                    </tr>
                    <tr style="background: #d81b60; color: white;">
                        <td colspan="3" style="padding: 12px; text-align: right; font-weight: bold;">Total Amount:</td>
                        <td style="padding: 12px; text-align: right; font-weight: bold; font-size: 18px;">₹{number_format($order.total_amount, 2)}</td>
                    </tr>
                </tfoot>
            </table>
        {else}
            <div style="padding: 20px; text-align: center; color: #666;">No items in this order.</div>
        {/if}
    </div>

    <div style="margin-top: 30px; text-align: center;">
        <a href="account.php" class="btn btn-primary" style="padding: 12px 30px; background: #d81b60; color: white; text-decoration: none; border-radius: 4px; display: inline-block;">Back to My Account</a>
    </div>
</div>
