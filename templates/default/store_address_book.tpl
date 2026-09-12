<div class="contact" id="store-address-book">
    <div class="container">
        <h1 class="w3layouts_head">Address Book</h1>
        <div class="contact-main w3agile" style="padding-top:20px;">
            {if $success_msg}
                <div class="alert alert-success">{$success_msg}</div>
            {/if}
            {if $error_msg}
                <div class="alert alert-danger">{$error_msg}</div>
            {/if}

            <div class="row">
                <div class="col-md-6">
                    <h3>Add New Address</h3>
                    <form method="post" action="address-book.php">
                        <input type="hidden" name="save_address" value="1" />
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" name="address_line1" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" name="address_line2" class="form-control" />
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
                            <label>Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control" value="India" required />
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="is_default" value="1" /> Set as default address</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Address</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3>Saved Addresses</h3>
                    {if $addresses && $addresses|@count > 0}
                        {foreach from=$addresses item=address}
                            <div class="panel panel-default" style="padding:15px; margin-bottom:15px;">
                                <strong>{$address.full_name}</strong>
                                {if $address.is_default == 1}<span class="label label-success" style="margin-left:10px;">Default</span>{/if}<br />
                                {$address.address_line1}<br />
                                {if $address.address_line2 != ''}{$address.address_line2}<br />{/if}
                                {$address.city}, {$address.state}<br />
                                {$address.country} - {$address.postal_code}<br />
                                Phone: {$address.phone}
                                <div style="margin-top:10px;">
                                    <a href="address-book.php?action=delete&id={$address.address_id}" class="btn btn-danger btn-xs" onclick="return confirm('Delete this address?');">Delete</a>
                                </div>
                            </div>
                        {/foreach}
                    {else}
                        <div class="alert alert-info">No saved addresses found.</div>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>
