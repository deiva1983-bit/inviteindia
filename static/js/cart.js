/* Global cart JS: handles add-to-cart AJAX, badge updates, and toast messages */
(function(){
    function qs(selector) { return document.querySelector(selector); }
    function qsa(selector) { return Array.from(document.querySelectorAll(selector)); }

    function showToast(message, isError){
        var container = qs('#cart-toast');
        if(!container){ container = document.createElement('div'); container.id = 'cart-toast'; document.body.appendChild(container); }
        var t = document.createElement('div'); t.className = 'toast' + (isError? ' error' : ''); t.textContent = message;
        container.appendChild(t);
        // force reflow then show
        requestAnimationFrame(function(){ t.classList.add('show'); });
        setTimeout(function(){ t.classList.remove('show'); setTimeout(function(){ container.removeChild(t); }, 300); }, 3000);
    }

    function updateCounts(count){
        var bag = qs('#cart-count'); if(bag) bag.textContent = count;
        var cta = qs('#cta-count'); if(cta) cta.textContent = count;
    }

    function getCartCount(){
        var url = (location.origin || '') + '/store/cart.php?action=count&ajax=1';
        fetch(url, { credentials: 'same-origin' })
            .then(function(res){ return res.json(); })
            .then(function(json){ if(json && json.cart_count !== undefined) updateCounts(json.cart_count); })
            .catch(function(){ /* ignore */ });
    }

    function fetchPreview(){
        var url = (location.origin || '') + '/store/cart.php?action=preview&ajax=1';
        fetch(url, { credentials: 'same-origin' })
            .then(function(res){ return res.json(); })
            .then(function(json){
                if(json && json.success){
                    updateCounts(json.cart_count || 0);
                    populateMiniCart(json.items || [], json.subtotal || 0);
                }
            }).catch(function(){ /* ignore */ });
    }

    function populateMiniCart(items, subtotal){
        var container = qs('#mini-cart'); if(!container) return;
        var list = container.querySelector('.mini-cart-items'); if(!list) return;
        list.innerHTML = '';
        if(!items || items.length === 0){ list.innerHTML = '<div class="mini-cart-empty">Your cart is empty</div>'; return; }
        items.forEach(function(it){
            var row = document.createElement('div'); row.className = 'mini-cart-item';
            var img = document.createElement('img'); img.src = it.image_url || '/site/no-image.png'; img.alt = it.product_name || '';
            var meta = document.createElement('div'); meta.className = 'meta';
            var name = document.createElement('div'); name.className = 'name'; name.textContent = it.product_name || '';
            var qty = document.createElement('div'); qty.className = 'qty'; qty.textContent = 'Qty: ' + (it.quantity || 0) + '  •  ₹' + (it.price || 0).toFixed(2);
            meta.appendChild(name); meta.appendChild(qty);
            // remove button
            var rem = document.createElement('button'); rem.className = 'mini-remove btn btn-xs btn-danger'; rem.type = 'button'; rem.textContent = 'Remove'; rem.setAttribute('data-cart-id', it.cart_id || '');
            meta.appendChild(rem);
            row.appendChild(img); row.appendChild(meta);
            list.appendChild(row);
        });
        var foot = container.querySelector('.mini-cart-footer'); if(foot){
            var subtotalEl = foot.querySelector('.mini-cart-subtotal');
            if(!subtotalEl){ subtotalEl = document.createElement('div'); subtotalEl.className = 'mini-cart-subtotal'; foot.insertBefore(subtotalEl, foot.firstChild); }
            subtotalEl.textContent = 'Subtotal: ₹' + (subtotal || 0).toFixed(2);
        }
        // bind remove buttons
        bindMiniRemoveButtons();
    }

    function bindMiniRemoveButtons(){
        qsa('.mini-remove').forEach(function(btn){
            if (btn._bound) return; // avoid double-binding
            btn._bound = true;
            btn.addEventListener('click', function(e){
                var cartId = this.getAttribute('data-cart-id'); if(!cartId) return;
                var url = (location.origin || '') + '/store/cart.php?action=remove&cart_id=' + encodeURIComponent(cartId) + '&ajax=1';
                fetch(url, { credentials: 'same-origin' })
                    .then(function(res){ return res.json(); })
                    .then(function(json){
                        if(json && json.success){
                            updateCounts(json.cart_count || 0);
                            fetchPreview();
                            showToast('Item removed');
                        } else {
                            showToast('Unable to remove item', true);
                        }
                    }).catch(function(){ showToast('Network error', true); });
            });
        });
    }

    function toggleMiniCart(show){
        var container = qs('#mini-cart'); var bag = qs('#shopping-bag');
        if(!container || !bag) return;
        if(show === undefined) show = !container.classList.contains('show');
        if(show){ container.classList.add('show'); bag.setAttribute('aria-expanded','true'); fetchPreview(); }
        else { container.classList.remove('show'); bag.setAttribute('aria-expanded','false'); }
    }

    function bindForms(){
        qsa('.add-to-cart-form').forEach(function(form){
            form.addEventListener('submit', function(e){
                e.preventDefault();
                var btn = form.querySelector('.add-cart-button');
                if(!btn) return;
                var fd = new FormData(form);
                btn.disabled = true; var origText = btn.textContent; btn.textContent = 'Adding...';
                var action = form.action || '/store/cart.php?action=add';
                var url = action + (action.indexOf('?') === -1 ? '?' : '&') + 'ajax=1';
                fetch(url, { method: 'POST', headers: { 'X-Requested-With': 'XMLHttpRequest' }, body: fd, credentials: 'same-origin' })
                    .then(function(res){ return res.json(); })
                    .then(function(json){
                        if(json && json.success){ updateCounts(json.cart_count || 0); btn.textContent = 'Added!'; btn.classList.add('added'); showToast('Added to cart'); setTimeout(function(){ btn.classList.remove('added'); btn.textContent = origText; btn.disabled = false; }, 1200); }
                        else { btn.textContent = origText; btn.disabled = false; showToast((json && json.message) ? json.message : 'Unable to add to cart', true); }
                    }).catch(function(){ btn.textContent = origText; btn.disabled = false; showToast('Network error. Try again.', true); });
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function(){ getCartCount(); bindForms();
        var bag = qs('#shopping-bag'); if(bag){ bag.addEventListener('click', function(e){ e.preventDefault(); toggleMiniCart(); }); }
        // close mini-cart when clicking outside
        document.addEventListener('click', function(e){ var container = qs('#mini-cart'); if(!container) return; var bag = qs('#shopping-bag'); if(container.classList.contains('show') && !container.contains(e.target) && !bag.contains(e.target)){ toggleMiniCart(false); } });
    });
})();
