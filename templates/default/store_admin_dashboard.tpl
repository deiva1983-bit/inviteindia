<div class="contact" id="store-admin-dashboard">
    <div class="container">
        <h1 class="w3layouts_head">Store Admin</h1>
        <div class="contact-main w3agile" style="padding-top:20px;">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default" style="padding:20px;">
                        <h3>Quick Links</h3>
                        <p><a href="products.php">Manage Products</a></p>
                        <p><a href="categories.php">Manage Categories</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default" style="padding:20px;">
                        <h3>Categories</h3>
                        {if $categories && $categories|@count > 0}
                            <ul>
                                {foreach from=$categories item=cat}
                                    <li>{$cat.category_name}</li>
                                {/foreach}
                            </ul>
                        {else}
                            <p>No categories yet.</p>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
