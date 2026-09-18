<div class="contact" id="store-paypal-checkout">
    <div class="container">
        <h1 class="w3layouts_head">PayPal Checkout</h1>
        <div class="contact-main w3agile" style="padding-top:20px;">
            <div class="panel panel-default" style="padding:20px; max-width:600px; margin:0 auto;">
                <h3>Order Summary</h3>
                <p><strong>Order No:</strong> {$order.order_no}</p>
                <p><strong>Total Amount:</strong> ₹{$amount}</p>
                <form method="post" action="paypal_checkout.php?order_id={$order.order_id}">
                    <input type="hidden" name="confirm_paypal" value="1" />
                    <button type="submit" class="btn btn-primary">Confirm PayPal Payment</button>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
