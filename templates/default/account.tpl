<div class="contact" id="store-account">
    <div class="container">
        <h1 class="w3layouts_head">My Account</h1>
        <div class="contact-main w3agile" style="padding-top:20px;">
            <div class="row">
                <div class="col-md-6">
                    <h3>Saved Addresses</h3>
                    {if $addresses && $addresses|@count > 0}
                        {foreach from=$addresses item=address}
                            <div class="panel panel-default" style="padding:15px; margin-bottom:15px;">
                                <strong>{$address.full_name}</strong><br />
                                {$address.address_line1}<br />
                                {if $address.address_line2 != ''}{$address.address_line2}<br />{/if}
                                {$address.city}, {$address.state}<br />
                                {$address.country} - {$address.postal_code}<br />
                                Phone: {$address.phone}
                            </div>
                        {/foreach}
                    {else}
                        <div class="alert alert-info">No saved addresses yet.</div>
                    {/if}
                </div>
                <div class="col-md-6">
                    <h3>Recent Orders</h3>
                    {if $orders && $orders|@count > 0}
                        {foreach from=$orders item=order}
                            <div class="panel panel-default" style="padding:15px; margin-bottom:15px;">
                                <strong>#{$order.order_no}</strong><br />
                                Date: {$order.created_at}<br />
                                Total: ₹{$order.total_amount}<br />
                                Status: {$order.payment_status}
                            </div>
                        {/foreach}
                    {else}
                        <div class="alert alert-info">No orders yet.</div>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>
