{if $glb_ismobile eq 2}
<div class="col-md-12 text-right">
{if $user_log_id_vend neq '0'}
<p><span class="manage-space"><a href='{$glb_path_dir}products.php?do=add' class='button'>Add new products</a></span><span class="manage-space"><a href='{$glb_path_dir}products.php' class='button'>My Products</a></span><span class="manage-space"><a href='{$glb_path_dir}login.php?do=out' class='button'>Vendors Signout</a></span></p>
{else}
<p><span class="manage-space"><a href='{$glb_path_dir}reg.php' class='button'>New Vendor Register</a></span><span class="manage-space"><a href='{$glb_path_dir}login.php' class='button'>Vendor Signin</a></span></p>
{/if}
</div>
{/if}

<div class="col-md-12 text-right">
{if $user_log_id_vend neq '0'}
<p><span class="manage-space"><a href='{$glb_path_dir}products.php?do=add' class='button'>Add new products</a></span><span class="manage-space"><a href='{$glb_path_dir}products.php' class='button'>My Products</a></span><span class="manage-space"><a href='{$glb_path_dir}login.php?do=out' class='button'>Vendors Signout</a></span></p>
{/if}
</div>