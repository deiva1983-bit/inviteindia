<div class="contact" id="store-account">
    <div class="container" style="padding: 40px 20px;">
        <h1 class="w3layouts_head" style="text-align: center; margin-bottom: 40px;">My Account</h1>
        <div class="contact-main w3agile">
            <div class="row">
                <!-- Saved Addresses Section -->
                <div class="col-md-6">
                    <h2 style="color: #d81b60; margin-bottom: 20px; font-size: 24px;">Saved Addresses</h2>
                    {if $addresses && $addresses|@count > 0}
                        {foreach from=$addresses item=address}
                            <div class="panel panel-default" style="padding: 15px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; {if $address.is_default}border-left: 4px solid #d81b60;{/if}">
                                <div style="display: flex; justify-content: space-between; align-items: start;">
                                    <div style="flex: 1;">
                                        <strong style="font-size: 16px;">{$address.full_name}</strong>
                                        {if $address.is_default}<span style="background: #d81b60; color: white; padding: 2px 8px; border-radius: 3px; font-size: 12px; margin-left: 10px;">Default</span>{/if}
                                        <p style="margin: 8px 0 0 0; line-height: 1.6; color: #666;">
                                            {$address.address_line1}<br />
                                            {if $address.address_line2 != ''}{$address.address_line2}<br />{/if}
                                            {$address.city}, {$address.state}<br />
                                            {$address.country} - {$address.postal_code}<br />
                                            <strong>Phone:</strong> {$address.phone}
                                        </p>
                                    </div>
                                    <div style="margin-left: 10px;">
                                        <a href="javascript:void(0)" onclick="editAddress({$address.address_id})" class="btn btn-sm btn-primary" style="margin-bottom: 5px; display: block; padding: 5px 10px; background: #007bff; color: white; text-decoration: none; border-radius: 3px; text-align: center;">Edit</a>
                                        <a href="javascript:void(0)" onclick="deleteAddress({$address.address_id})" class="btn btn-sm btn-danger" style="padding: 5px 10px; background: #dc3545; color: white; text-decoration: none; border-radius: 3px; text-align: center; display: block;">Delete</a>
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    {else}
                        <div class="alert alert-info" style="background: #d1ecf1; border: 1px solid #bee5eb; color: #0c5460; padding: 12px; border-radius: 4px;">No saved addresses yet.</div>
                    {/if}
                    <button onclick="showAddAddressForm()" class="btn btn-primary" style="margin-top: 20px; padding: 10px 20px; background: #d81b60; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">+ Add New Address</button>
                </div>

                <!-- Recent Orders Section -->
                <div class="col-md-6">
                    <h2 style="color: #d81b60; margin-bottom: 20px; font-size: 24px;">Recent Orders</h2>
                    {if $orders && $orders|@count > 0}
                        {foreach from=$orders item=order}
                            <div class="panel panel-default" style="padding: 15px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px;">
                                <div style="display: flex; justify-content: space-between; align-items: start;">
                                    <div>
                                        <strong style="font-size: 16px; color: #d81b60;">#{$order.order_no}</strong>
                                        <p style="margin: 8px 0; color: #666; font-size: 14px;">
                                            <strong>Date:</strong> {$order.created_at|date_format:"%d %B %Y"}<br />
                                            <strong>Total:</strong> ₹{number_format($order.total_amount, 2)}<br />
                                            <strong>Status:</strong>
                                            <span style="background: {if $order.payment_status == 'paid'}#28a745{elseif $order.payment_status == 'pending'}#ffc107{else}#dc3545{/if}; color: white; padding: 2px 8px; border-radius: 3px; font-size: 12px;">
                                                {$order.payment_status|capitalize}
                                            </span>
                                        </p>
                                    </div>
                                    <a href="order_details.php?id={$order.order_id}" class="btn btn-sm btn-info" style="padding: 8px 12px; background: #17a2b8; color: white; text-decoration: none; border-radius: 3px; white-space: nowrap;">View Details</a>
                                </div>
                            </div>
                        {/foreach}
                    {else}
                        <div class="alert alert-info" style="background: #d1ecf1; border: 1px solid #bee5eb; color: #0c5460; padding: 12px; border-radius: 4px;">No orders yet.</div>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Address Modal -->
<div id="addressModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 1000; flex-align: center; justify-content: center;">
    <div style="background: white; border-radius: 8px; padding: 30px; max-width: 500px; margin: auto; margin-top: 50px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h3 style="margin-top: 0; color: #d81b60;">Add New Address</h3>
        <form id="addressForm" onsubmit="return submitAddress(event);" style="max-height: 70vh; overflow-y: auto;">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Full Name *</label>
                <input type="text" id="fullName" name="fullName" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Phone *</label>
                <input type="tel" id="phone" name="phone" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Address Line 1 *</label>
                <input type="text" id="addressLine1" name="addressLine1" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Address Line 2</label>
                <input type="text" id="addressLine2" name="addressLine2" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">City *</label>
                <input type="text" id="city" name="city" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">State *</label>
                <input type="text" id="state" name="state" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Postal Code *</label>
                <input type="text" id="postalCode" name="postalCode" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Country *</label>
                <input type="text" id="country" name="country" value="India" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">
                    <input type="checkbox" id="isDefault" name="isDefault" /> Set as default address
                </label>
            </div>
            <div style="display: flex; gap: 10px; justify-content: space-between;">
                <button type="submit" style="flex: 1; padding: 10px; background: #d81b60; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Save Address</button>
                <button type="button" onclick="closeAddressModal()" style="flex: 1; padding: 10px; background: #6c757d; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Cancel</button>
            </div>
        </form>
    </div>
</div>

{literal}
<script>
function showAddAddressForm() {
    document.getElementById('addressForm').reset();
    document.getElementById('addressModal').style.display = 'flex';
    document.getElementById('addressForm').dataset.addressId = '';
}

function closeAddressModal() {
    document.getElementById('addressModal').style.display = 'none';
}

function submitAddress(event) {
    event.preventDefault();

    const fullName = document.getElementById('fullName').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const addressLine1 = document.getElementById('addressLine1').value.trim();
    const addressLine2 = document.getElementById('addressLine2').value.trim();
    const city = document.getElementById('city').value.trim();
    const state = document.getElementById('state').value.trim();
    const postalCode = document.getElementById('postalCode').value.trim();
    const country = document.getElementById('country').value.trim();
    const isDefault = document.getElementById('isDefault').checked ? 1 : 0;

    const formData = new FormData();
    formData.append('action', 'add');
    formData.append('full_name', fullName);
    formData.append('phone', phone);
    formData.append('address_line1', addressLine1);
    formData.append('address_line2', addressLine2);
    formData.append('city', city);
    formData.append('state', state);
    formData.append('postal_code', postalCode);
    formData.append('country', country);
    formData.append('is_default', isDefault);

    fetch('address_handler.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Address saved successfully!');
            closeAddressModal();
            location.reload();
        } else {
            alert('Error: ' + (data.error || 'Failed to save address'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while saving the address');
    });

    return false;
}

function editAddress(addressId) {
    fetch('address_handler.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'action=get&address_id=' + addressId
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const addr = data.data;
            document.getElementById('fullName').value = addr.full_name;
            document.getElementById('phone').value = addr.phone;
            document.getElementById('addressLine1').value = addr.address_line1;
            document.getElementById('addressLine2').value = addr.address_line2;
            document.getElementById('city').value = addr.city;
            document.getElementById('state').value = addr.state;
            document.getElementById('postalCode').value = addr.postal_code;
            document.getElementById('country').value = addr.country;
            document.getElementById('isDefault').checked = addr.is_default == 1;

            document.getElementById('addressForm').dataset.addressId = addressId;
            document.querySelector('#addressModal h3').textContent = 'Edit Address';
            document.getElementById('addressModal').style.display = 'flex';
        } else {
            alert('Error: ' + (data.error || 'Failed to load address'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred');
    });
}

function deleteAddress(addressId) {
    if (confirm('Are you sure you want to delete this address?')) {
        const formData = new FormData();
        formData.append('action', 'delete');
        formData.append('address_id', addressId);

        fetch('address_handler.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Address deleted successfully!');
                location.reload();
            } else {
                alert('Error: ' + (data.error || 'Failed to delete address'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred');
        });
    }
}

document.getElementById('addressModal').onclick = function(event) {
    if (event.target === this) {
        closeAddressModal();
    }
}
</script>
{/literal}
