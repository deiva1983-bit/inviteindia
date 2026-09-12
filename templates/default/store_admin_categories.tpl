<div class="contact" id="store-admin-categories">
    <div class="container">
        <h1 class="w3layouts_head">Manage Categories</h1>
        <div class="contact-main w3agile" style="padding-top:20px;">
            {if $success_msg}
                <div class="alert alert-success">{$success_msg}</div>
            {/if}
            {if $error_msg}
                <div class="alert alert-danger">{$error_msg}</div>
            {/if}

            <div class="row">
                <div class="col-md-5">
                    <h3>Add Category</h3>
                    <form method="post" action="categories.php">
                        <input type="hidden" name="save_category" value="1" />
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="category_name" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Category Type</label>
                            <select name="category_type" class="form-control">
                                <option value="wedding">Wedding</option>
                                <option value="gifts">Gifts</option>
                                <option value="accessories">Accessories</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="status" value="1" checked /> Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </form>
                </div>
                <div class="col-md-7">
                    <h3>Category List</h3>
                    {if $categories && $categories|@count > 0}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$categories item=cat}
                                    <tr>
                                        <td>{$cat.category_name}</td>
                                        <td>{$cat.category_type}</td>
                                        <td>{if $cat.status == 1}Active{else}Inactive{/if}</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    {else}
                        <div class="alert alert-info">No categories found.</div>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>
