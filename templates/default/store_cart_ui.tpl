<!-- Store-specific cart UI include: shopping bag, mini-cart preview, toast, and script -->
<a id="shopping-bag" href="/store/cart.php" title="View Cart" role="button" aria-haspopup="true" aria-expanded="false">
    <span class="bag-icon">
        <!-- SVG shopping bag -->
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M6 2h12l1 3h-14l1-3z" fill="#b6192d" opacity="0.12"/>
          <path d="M7 7v11a3 3 0 003 3h4a3 3 0 003-3V7H7z" stroke="#333" stroke-width="1.2" fill="none" stroke-linejoin="round"/>
          <path d="M9 7a3 3 0 006 0" stroke="#333" stroke-width="1.2" fill="none" stroke-linecap="round"/>
        </svg>
    </span>
    <span id="cart-count" class="cart-badge">0</span>
</a>

<!-- mini-cart dropdown -->
<div id="mini-cart" class="mini-cart" aria-hidden="true">
    <div class="mini-cart-inner">
        <div class="mini-cart-items">Loading...</div>
        <div class="mini-cart-footer">
            <div class="mini-cart-subtotal"></div>
            <a href="/store/cart.php" class="btn btn-primary">View Cart</a>
        </div>
    </div>
</div>

<!-- toast container -->
<div id="cart-toast" aria-hidden="true"></div>

<!-- load cart script (deferred) -->
<script defer src="{$static_domain_path_js}/cart.js"></script>
