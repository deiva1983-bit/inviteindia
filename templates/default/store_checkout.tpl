<div class="contact" id="store-checkout">
    <div class="container">
        <h1 class="w3layouts_head">Checkout</h1>
        <div class="contact-main w3agile" style="padding-top:20px;">
            <form method="post" action="checkout.php">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Customer Details</h3>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="customer_name" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="customer_email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="customer_phone" class="form-control" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>Shipping Details</h3>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="shipping_address" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control" value="India" required />
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" required />
                        </div>
                    </div>
                </div>

                

                <div style="margin-top:20px;">
                    <h3>Select Payment Method</h3>
                    <div class="radio">
                        <label><input type="radio" name="payment_method" value="ccavenue" checked /> CC Avenue</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="payment_method" value="paypal" /> PayPal</label>
                    </div>
                </div>

                <div style="margin-top:20px; border-top:1px solid #ddd; padding-top:20px;">
                    <h3>Order Summary</h3>
                    <table class="table table-bordered">
                        <tbody>
                            {foreach from=$cart_items item=item}
                                <tr>
                                    <td>{$item.product_name}</td>
                                    <td>{$item.quantity} x ₹{$item.price}</td>
                                    <td>₹{$item.price * $item.quantity}</td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                    <h4>Total: ₹{$subtotal}</h4>
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
