<div class="contact" id="store-checkout">
    <div class="container">
        <h1 class="w3layouts_head">Checkout</h1>
        <div class="contact-main w3agile" style="padding-top:20px;">
            <form method="post" action="checkout.php">
                <!-- Saved Addresses Section -->
                {if $addresses && $addresses|@count > 0}
                    <div style="background: #f9f9f9; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
                        <h3 style="margin-top: 0; color: #d81b60;">Use Saved Address</h3>
                        <p style="color: #666; margin-bottom: 15px;">Select one of your saved addresses:</p>
                        <div style="display: grid; gap: 10px;">
                            {foreach from=$addresses item=address}
                                <label style="display: block; padding: 10px; border: 2px solid #ddd; border-radius: 4px; cursor: pointer; transition: all 0.3s; {if $address.is_default}border-color: #d81b60; background: #fff5f8;{/if}">
                                    <input type="radio" name="address_option" value="saved_{$address.address_id}" onchange="fillAddressFromSaved({$address.address_id})" {if $address.is_default}checked{/if} />
                                    <strong>{$address.full_name}</strong> {if $address.is_default}<span style="background: #d81b60; color: white; padding: 2px 6px; border-radius: 3px; font-size: 11px; margin-left: 5px;">Default</span>{/if}
                                    <div style="font-size: 13px; color: #666; margin-top: 5px; margin-left: 20px;">
                                        {$address.address_line1}<br />
                                        {$address.city}, {$address.state} - {$address.postal_code}
                                    </div>
                                </label>
                            {/foreach}
                        </div>
                        <label style="display: block; padding: 10px; margin-top: 10px; border: 2px solid #ddd; border-radius: 4px; cursor: pointer;">
                            <input type="radio" name="address_option" value="new" onchange="showNewAddressForm()" />
                            <strong>Use New Address</strong>
                        </label>
                    </div>
                {/if}

                <div class="row">
                    <div class="col-md-6">
                        <h3>Customer Details</h3>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="customer_email" id="customer_email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="customer_phone" id="customer_phone" class="form-control" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>Shipping Details</h3>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="shipping_address" id="shipping_address" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" id="city" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" id="state" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" id="country" class="form-control" value="India" required />
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" name="postal_code" id="postal_code" class="form-control" required />
                        </div>
                        <div class="form-group" id="saveAddressContainer" style="display: none;">
                            <label>
                                <input type="checkbox" name="save_address" id="save_address" /> Save this address for future orders
                            </label>
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

{literal}
<script>
// Address data for saved addresses
const addressData = {
{/literal}
    {foreach from=$addresses item=address}
        {$address.address_id}: {
            full_name: '{$address.full_name|escape:'javascript'}',
            phone: '{$address.phone|escape:'javascript'}',
            address_line1: '{$address.address_line1|escape:'javascript'}',
            address_line2: '{$address.address_line2|escape:'javascript'}',
            city: '{$address.city|escape:'javascript'}',
            state: '{$address.state|escape:'javascript'}',
            postal_code: '{$address.postal_code|escape:'javascript'}',
            country: '{$address.country|escape:'javascript'}'
        },
    {/foreach}
{literal}
};

function fillAddressFromSaved(addressId) {
    if (addressData[addressId]) {
        const addr = addressData[addressId];
        document.getElementById('customer_name').value = addr.full_name;
        document.getElementById('customer_phone').value = addr.phone;
        document.getElementById('shipping_address').value = addr.address_line1 + (addr.address_line2 ? ', ' + addr.address_line2 : '');
        document.getElementById('city').value = addr.city;
        document.getElementById('state').value = addr.state;
        document.getElementById('postal_code').value = addr.postal_code;
        document.getElementById('country').value = addr.country;
        document.getElementById('saveAddressContainer').style.display = 'none';
    }
}

function showNewAddressForm() {
    // Clear form or show input for new address
    document.getElementById('saveAddressContainer').style.display = 'block';
}

// Pre-fill with default address on load
{/literal}
{if $addresses && $addresses|@count > 0}
    {assign var="defaultAddr" value=false}
    {foreach from=$addresses item=address}
        {if $address.is_default}
            {assign var="defaultAddr" value=$address}
        {/if}
    {/foreach}
    {if $defaultAddr}
        {literal}fillAddressFromSaved({/literal}{$defaultAddr.address_id}{literal});{/literal}
    {/if}
{else}
    {literal}document.getElementById('saveAddressContainer').style.display = 'block';{/literal}
{/if}
{literal}
</script>
{/literal}
