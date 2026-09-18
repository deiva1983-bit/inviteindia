<div class="contact" id="store-products">
    <div class="container">
        <h1 class="w3layouts_head">{$category.category_name}</h1>
        <div class="contact-main w3agile" style="padding-top:20px;">
            {if $products && $products|@count > 0}
                {foreach from=$products item=product}
                    <div class="col-md-3" style="margin-bottom:30px;">
                        <div class="panel panel-default" style="border:1px solid #eee; border-radius:8px; overflow:hidden;">
                            <div style="padding:15px; background:#fafafa; text-align:center; min-height:220px; display:flex; align-items:center; justify-content:center;">
                                {if $product.image_url != ''}
                                    <img src="{$product.image_url}" alt="{$product.product_name}" style="max-width:100%; max-height:180px; object-fit:cover;" />
                                {else}
                                    <div style="height:180px; width:100%; display:flex; align-items:center; justify-content:center; background:#f0f0f0; color:#666;">No Image</div>
                                {/if}
                            </div>
                            <div style="padding:15px;">
                                <h3 style="font-size:18px; margin:0 0 10px; min-height:42px;">{$product.product_name}</h3>
                                <p style="color:#666; font-size:14px; min-height:52px;">{$product.short_description}</p>
                                <div style="font-size:20px; font-weight:bold; color:#b6192d; margin:10px 0;">
                                    ₹{$product.price}
                                </div>
                                {if $product.sale_price > 0}
                                    <div style="color:#888; text-decoration:line-through; font-size:13px;">
                                        ₹{$product.sale_price}
                                    </div>
                                {/if}
                                <form method="post" action="cart.php?action=add" class="add-to-cart-form" data-product-id="{$product.product_id}" style="margin-top:15px;">
                                    <input type="hidden" name="product_id" value="{$product.product_id}" />
                                    <input type="hidden" name="qty" value="1" />
                                    <button type="submit" class="btn btn-primary add-cart-button">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                {/foreach}
            {else}
                <div class="alert alert-info">No products found in this category.</div>
            {/if}
            <div class="clearfix"></div>
        </div>
    </div>
</div>

{include file="default/store_cart_ui.tpl"}

<!-- Bottom CTA -->
<a id="bottom-cta" href="cart.php" class="bottom-cta">Proceed to View Cart → <span id="cta-count">0</span></a>

