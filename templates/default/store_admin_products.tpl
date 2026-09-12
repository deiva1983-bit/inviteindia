<div class="contact" id="store-admin-products">
    <div class="container">
        <h1 class="w3layouts_head">Manage Products</h1>
        <div class="contact-main w3agile" style="padding-top:20px;">
            {if $success_msg}
                <div class="alert alert-success">{$success_msg}</div>
            {/if}
            {if $error_msg}
                <div class="alert alert-danger">{$error_msg}</div>
            {/if}

            <div class="row">
                <div class="col-md-5">
                    <h3>Add Product</h3>
                    <form method="post" action="products.php">
                        <input type="hidden" name="save_product" value="1" />
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control" required>
                                {foreach from=$categories item=cat}
                                    <option value="{$cat.category_id}">{$cat.category_name}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Sale Price</label>
                            <input type="text" name="sale_price" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Stock Qty</label>
                            <input type="text" name="stock_qty" class="form-control" value="0" />
                        </div>
                        <div class="form-group">
                            <label>SKU</label>
                            <input type="text" name="sku" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Fabric</label>
                            <input type="text" name="fabric" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" name="color" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Occasion</label>
                            <input type="text" name="occasion" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="is_featured" value="1" /> Featured</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="status" value="1" checked /> Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </form>
                </div>
                <div class="col-md-7">
                    <h3>Product List</h3>
                    {if $products && $products|@count > 0}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$products item=prod}
                                    <tr>
                                        <td>{$prod.product_name}</td>
                                        <td>{$prod.category_name}</td>
                                        <td>₹{$prod.price}</td>
                                        <td>{if $prod.status == 1}Active{else}Inactive{/if}</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    {else}
                        <div class="alert alert-info">No products found.</div>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>
