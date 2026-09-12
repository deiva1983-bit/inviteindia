<div class="contact" id="store-order-details">
    <div class="container">
        <h1 class="w3layouts_head">Order Details</h1>
        <div class="contact-main w3agile" style="padding-top:20px;">
            <div class="row">
                <div class="col-md-6">
                    <h3>Order Summary</h3>
                    <div class="panel panel-default" style="padding:15px;">
                        <p><strong>Order No:</strong> {$order.order_no}</p>
                        <p><strong>Customer:</strong> {$order.customer_name}</p>
                        <p><strong>Email:</strong> {$order.customer_email}</p>
                        <p><strong>Phone:</strong> {$order.customer_phone}</p>
                        <p><strong>Payment:</strong> {$order.payment_method}</p>
                        <p><strong>Status:</strong> {$order.payment_status}</p>
                        <p><strong>Total:</strong> ₹{$order.total_amount}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Shipping</h3>
                    <div class="panel panel-default" style="padding:15px;">
                        <p>{$order.shipping_address}</p>
                        <p>{$order.city}, {$order.state}</p>
                        <p>{$order.country} - {$order.postal_code}</p>
                    </div>
                </div>
            </div>

            <div style="margin-top:20px;">
                <h3>Items</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$items item=item}
                            <tr>
                                <td>{$item.product_name}</td>
                                <td>{$item.quantity}</td>
                                <td>₹{$item.unit_price}</td>
                                <td>₹{$item.total_price}</td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
