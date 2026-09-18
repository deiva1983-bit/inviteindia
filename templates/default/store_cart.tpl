<div class="contact" id="store-cart">
    <div class="container">
        <h1 class="w3layouts_head">Shopping Cart</h1>
        <div class="contact-main w3agile" style="padding-top:20px;">
            {if $cart_items && $cart_items|@count > 0}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$cart_items item=item}
                            <tr>
                                <td>
                                    <strong>{$item.product_name}</strong>
                                </td>
                                <td>₹{$item.price}</td>
                                <td>{$item.quantity}</td>
                                <td>₹{$item.price * $item.quantity}</td>
                                <td>
                                    <a href="cart.php?action=remove&cart_id={$item.cart_id}" class="btn btn-danger btn-sm">Remove</a>
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
                <div style="text-align:right; margin-top:20px;">
                    <h3>Subtotal: ₹{$subtotal}</h3>
                    <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
                </div>
            {else}
                <div class="alert alert-info">Your cart is empty.</div>
            {/if}
        </div>
    </div>
</div>

        {include file="default/store_cart_ui.tpl"}
