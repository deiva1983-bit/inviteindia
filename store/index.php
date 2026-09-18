<?php
// InviteIndia - Modern Store Landing
// Purpose: Responsive, high-converting product listing for wedding templates
// Notes: Self-contained page. Integrate with your site's header/footer as needed.

// Sample product data. Replace with DB calls or your existing product API.
$products = [
    [
        'id' => 101,
        'title' => 'Royal South Indian Template',
        'category' => 'Traditional South Indian',
        'price' => 1499.00,
        'compare_at' => 1999.00,
        'rating' => 4.9,
        'reviews' => 126,
        'best_seller' => true,
        'instant' => true,
        'whatsapp' => true,
        'thumbnail' => '../assets/store/thumbs/royal_south.jpg',
        'stock' => 'InStock'
    ],
    [
        'id' => 102,
        'title' => 'Minimalist Modern Invite',
        'category' => 'Minimalist Modern',
        'price' => 799.00,
        'compare_at' => 999.00,
        'rating' => 4.8,
        'reviews' => 84,
        'best_seller' => false,
        'instant' => true,
        'whatsapp' => false,
        'thumbnail' => '../assets/store/thumbs/minimal_modern.jpg',
        'stock' => 'InStock'
    ],
    [
        'id' => 103,
        'title' => 'Video Invite - Cinematic',
        'category' => 'Video Invites',
        'price' => 2499.00,
        'compare_at' => 2999.00,
        'rating' => 4.95,
        'reviews' => 210,
        'best_seller' => true,
        'instant' => false,
        'whatsapp' => true,
        'thumbnail' => '../assets/store/thumbs/video_cinematic.jpg',
        'stock' => 'PreOrder'
    ]
];

// Basic SEO variables
$pageTitle = "Buy Wedding Website Templates India | InviteIndia Store";
$metaDesc = "Shop digital wedding invitation templates, custom domains, and e-invite services in India. Instant activation, WhatsApp RSVP, and custom domain add-ons available.";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo htmlentities($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlentities($metaDesc); ?>">
  <!-- Open Graph for social previews -->
  <meta property="og:title" content="InviteIndia Store - Wedding Website Templates">
  <meta property="og:description" content="Digital wedding templates, custom domains, easy RSVP integration.">
  <meta property="og:type" content="website">

  <!-- Tailwind CDN for fast styling without build step (production: precompile) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Structured Data: ItemList + Products (generated below in JSON-LD) -->

  <style>
    /* Minor custom styles for device mockups and sticky header polish */
    .device-mock { width: 280px; height: 560px; border-radius: 14px; overflow: hidden; background:#fff; box-shadow: 0 6px 20px rgba(0,0,0,0.12); }
    .strike { text-decoration: line-through; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- Sticky header with cart counter and currency indicator -->
<header class="sticky top-0 z-40 bg-white shadow-sm">
  <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
    <a href="/" class="text-2xl font-semibold text-pink-600">InviteIndia</a>
    <nav class="hidden md:flex items-center gap-6">
      <a href="/store/" class="text-sm font-medium text-gray-700">Store</a>
      <a href="/packages.php" class="text-sm text-gray-600">Packages</a>
      <a href="/contact-us.php" class="text-sm text-gray-600">Support</a>
    </nav>
    <div class="flex items-center gap-4">
      <div class="text-sm text-gray-600">Currency: <strong class="ml-1">INR ₹</strong></div>
      <a href="/cart.php" class="relative inline-flex items-center px-3 py-2 bg-pink-600 text-white rounded-md">
        Cart
        <span id="cart-count" class="ml-2 inline-block bg-white text-pink-600 px-2 py-0.5 rounded-full text-xs">2</span>
      </a>
    </div>
  </div>
</header>

<main class="max-w-7xl mx-auto px-4 py-8">
  <!-- Breadcrumbs for SEO and accessibility -->
  <nav class="text-sm mb-4" aria-label="breadcrumb">
    <ol class="list-reset flex text-gray-600">
      <li><a href="/" class="hover:underline">Home</a></li>
      <li class="mx-2">/</li>
      <li><a href="/store/" class="hover:underline">Store</a></li>
      <li class="mx-2">/</li>
      <li class="text-pink-600 font-medium">Wedding Templates</li>
    </ol>
  </nav>

  <!-- Hero & Filtering Bar: CRO recommendation - keep prominent CTAs and quick filters -->
  <section class="bg-white p-6 rounded-lg shadow-sm mb-6">
    <div class="md:flex md:items-center md:justify-between">
      <div>
        <h1 class="text-2xl md:text-3xl font-semibold">Beautiful Wedding Website Templates</h1>
        <p class="mt-2 text-gray-600">Choose a theme, add a custom domain, and send digital invites instantly. Trusted by thousands of couples across India.</p>
      </div>

      <div class="mt-4 md:mt-0 flex gap-3">
        <input id="search" type="search" placeholder="Search templates, traditions, styles..." class="px-4 py-2 border rounded-md w-72" aria-label="Search templates">
        <button id="clear-filters" class="px-4 py-2 bg-gray-100 rounded-md">Clear</button>
        <a href="#comparison" class="px-4 py-2 bg-pink-600 text-white rounded-md">Compare Plans</a>
      </div>
    </div>

    <!-- Category filter chips -->
    <div class="mt-4 flex flex-wrap gap-2">
      <button class="category-chip px-3 py-1 rounded-full bg-pink-50 text-pink-700 text-sm" data-cat="All">All Templates</button>
      <button class="category-chip px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm" data-cat="Traditional South Indian">Traditional South Indian</button>
      <button class="category-chip px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm" data-cat="North Indian / Royal">North Indian / Royal</button>
      <button class="category-chip px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm" data-cat="Minimalist Modern">Minimalist Modern</button>
      <button class="category-chip px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm" data-cat="Video Invites">Video Invites</button>
      <button class="category-chip px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm" data-cat="Add-On Services">Add-On Services</button>
    </div>
  </section>

  <!-- Product Grid: 3-4 columns responsive -->
  <section>
    <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($products as $p): ?>
      <article class="bg-white rounded-lg overflow-hidden shadow-sm group" data-category="<?php echo htmlentities($p['category']); ?>" data-id="<?php echo $p['id']; ?>">
        <div class="relative">
          <img src="<?php echo htmlentities($p['thumbnail']); ?>" alt="<?php echo htmlentities($p['title']); ?>" class="w-full h-56 object-cover">
          <!-- Hover overlay with quick actions -->
          <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-opacity flex items-end justify-center p-4">
            <div class="opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all w-full flex justify-around">
              <button class="live-demo btn px-3 py-2 bg-white text-sm rounded">Live Demo</button>
              <button class="customize btn px-3 py-2 bg-white text-sm rounded">Try Customizer</button>
              <button class="select-theme btn px-3 py-2 bg-pink-600 text-white text-sm rounded" data-id="<?php echo $p['id']; ?>">Select Theme</button>
            </div>
          </div>
        </div>

        <div class="p-4">
          <h3 class="font-semibold text-lg"><?php echo htmlentities($p['title']); ?></h3>
          <div class="flex items-center gap-2 mt-2">
            <div class="text-yellow-500">★ <?php echo $p['rating']; ?></div>
            <div class="text-sm text-gray-500">/5 from <?php echo $p['reviews']; ?> couples</div>
          </div>

          <div class="mt-3 flex items-baseline gap-3">
            <div class="text-xl font-bold">₹<?php echo number_format($p['price'], 0); ?></div>
            <div class="text-sm text-gray-500 strike">₹<?php echo number_format($p['compare_at'], 0); ?></div>
            <div class="text-sm text-green-600 font-medium">Save <?php echo round((1 - $p['price']/$p['compare_at'])*100); ?>%</div>
          </div>

          <div class="mt-3 flex items-center gap-2">
            <?php if ($p['best_seller']): ?><span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded">Best Seller</span><?php endif; ?>
            <?php if ($p['instant']): ?><span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded">Instant Activation</span><?php endif; ?>
            <?php if ($p['whatsapp']): ?><span class="px-2 py-1 bg-blue-50 text-blue-700 text-xs rounded">Includes WhatsApp RSVP</span><?php endif; ?>
          </div>

          <div class="mt-4 flex items-center justify-between">
            <button class="px-3 py-2 border rounded text-sm open-quickview" data-id="<?php echo $p['id']; ?>">Quick View</button>
            <a href="/store/checkout.php?product_id=<?php echo $p['id']; ?>" class="px-3 py-2 bg-pink-600 text-white rounded text-sm">Buy Now</a>
          </div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Add-On Upsell Modal (triggered on Select Theme) -->
  <div id="addon-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-3xl w-full p-6">
      <div class="flex justify-between items-start">
        <h2 class="text-lg font-semibold">Add-ons & Upsells</h2>
        <button id="close-addon" class="text-gray-600">Close</button>
      </div>

      <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <h3 class="font-medium">Add a Custom Domain</h3>
          <p class="text-sm text-gray-600">Secure a `.com` or `.in` for your wedding site.</p>
          <div class="mt-2 flex items-center gap-3">
            <label class="inline-flex items-center gap-2"><input type="radio" name="domain" value="none" checked> No, thanks</label>
            <label class="inline-flex items-center gap-2"><input type="radio" name="domain" value="in"> .in — ₹499</label>
            <label class="inline-flex items-center gap-2"><input type="radio" name="domain" value="com"> .com — ₹699</label>
          </div>
        </div>

        <div>
          <h3 class="font-medium">Integrations & Security</h3>
          <label class="flex items-center gap-2 mt-2"><input type="checkbox" id="whatsapp-addon" checked> WhatsApp RSVP Integration — ₹299</label>
          <label class="flex items-center gap-2 mt-2"><input type="checkbox" id="password-addon"> Password Protection — ₹199</label>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-between">
        <div class="text-sm text-gray-600">Estimated extra: <span id="addon-total">₹0</span></div>
        <div>
          <button id="skip-addons" class="px-4 py-2 border rounded mr-2">Skip</button>
          <button id="confirm-addons" class="px-4 py-2 bg-pink-600 text-white rounded">Add & Proceed to Checkout</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Feature Comparison Table -->
  <section id="comparison" class="mt-10 bg-white p-6 rounded-lg shadow-sm">
    <h2 class="text-xl font-semibold">Compare Plans</h2>
    <p class="text-sm text-gray-600">Choose the plan that fits your wedding style and guest expectations.</p>

    <div class="mt-4 overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr>
            <th class="p-3">Feature</th>
            <th class="p-3">Free</th>
            <th class="p-3">Premium</th>
            <th class="p-3">Deluxe</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t"><td class="p-3">Custom Domain</td><td class="p-3">—</td><td class="p-3">Included (.in)</td><td class="p-3">Included (.com + SSL)</td></tr>
          <tr class="border-t"><td class="p-3">WhatsApp RSVP</td><td class="p-3">Basic</td><td class="p-3">Integrated</td><td class="p-3">Integrated + Templates</td></tr>
          <tr class="border-t"><td class="p-3">Instant Activation</td><td class="p-3">Sometimes</td><td class="p-3">Yes</td><td class="p-3">Yes</td></tr>
          <tr class="border-t"><td class="p-3">Password Protection</td><td class="p-3">No</td><td class="p-3">Optional</td><td class="p-3">Included</td></tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- FAQ & Trust Section -->
  <section class="mt-8 grid md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded shadow-sm">
      <h3 class="font-semibold">Frequently Asked Questions</h3>
      <ul class="mt-4 space-y-3 text-sm text-gray-700">
        <li><strong>Instant Delivery:</strong> Many themes activate within minutes after payment.</li>
        <li><strong>24/7 WhatsApp Support:</strong> Our team helps with customizations and domain setup.</li>
        <li><strong>Refund Policy:</strong> 7-day satisfaction guarantee on digital templates.</li>
      </ul>
    </div>

    <div class="bg-white p-6 rounded shadow-sm">
      <h3 class="font-semibold">Why Choose InviteIndia?</h3>
      <ul class="mt-4 space-y-3 text-sm text-gray-700">
        <li>Trusted by thousands of couples across India.</li>
        <li>Secure payment gateways and easy domain setup.</li>
        <li>Free onboarding and design assistance on Premium plans.</li>
      </ul>
    </div>
  </section>

</main>

<!-- Quick inline scripts for interactions (replace with your framework as needed) -->
<script>
  // Filtering behavior
  document.querySelectorAll('.category-chip').forEach(btn => {
    btn.addEventListener('click', () => {
      const cat = btn.dataset.cat;
      document.querySelectorAll('#product-grid article').forEach(card => {
        if (cat === 'All' || card.dataset.category === cat) card.style.display = '';
        else card.style.display = 'none';
      });
    });
  });

  // Quick View modal (simple simulation) - in production, fetch real preview HTML
  document.querySelectorAll('.open-quickview').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const id = e.target.dataset.id || e.target.closest('article').dataset.id;
      alert('Quick View for product ID: ' + id + '\n(In production: show device mockups and live demo iframe)');
    });
  });

  // Add-on modal flow
  document.querySelectorAll('.select-theme').forEach(btn => {
    btn.addEventListener('click', () => {
      document.getElementById('addon-modal').classList.remove('hidden');
      document.getElementById('addon-modal').classList.add('flex');
    });
  });
  document.getElementById('close-addon').addEventListener('click', () => {
    document.getElementById('addon-modal').classList.add('hidden');
    document.getElementById('addon-modal').classList.remove('flex');
  });
  document.getElementById('confirm-addons').addEventListener('click', () => {
    // In production, gather addon opts and redirect to checkout with params
    window.location.href = '/store/checkout.php';
  });

  // Simple search filter
  document.getElementById('search').addEventListener('input', (e) => {
    const q = e.target.value.toLowerCase();
    document.querySelectorAll('#product-grid article').forEach(card => {
      const title = card.querySelector('h3').innerText.toLowerCase();
      card.style.display = title.indexOf(q) !== -1 ? '' : 'none';
    });
  });
</script>

<!-- JSON-LD Structured Data: ItemList and Product/Offer entries for SEO -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "InviteIndia Store - Wedding Templates",
  "itemListElement": [
    <?php foreach ($products as $index => $p): ?>
    {
      "@type": "ListItem",
      "position": <?php echo $index+1; ?>,
      "item": {
        "@type": "Product",
        "name": "<?php echo addslashes($p['title']); ?>",
        "image": "<?php echo addslashes($p['thumbnail']); ?>",
        "description": "Digital wedding template: <?php echo addslashes($p['category']); ?>",
        "sku": "INV-<?php echo $p['id']; ?>",
        "brand": {
          "@type": "Brand",
          "name": "InviteIndia"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "<?php echo $p['rating']; ?>",
          "reviewCount": "<?php echo $p['reviews']; ?>"
        },
        "offers": {
          "@type": "Offer",
          "url": "<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/store/checkout.php?product_id='.$p['id']; ?>",
          "priceCurrency": "INR",
          "price": "<?php echo $p['price']; ?>",
          "availability": "http://schema.org/<?php echo $p['stock']; ?>",
          "priceValidUntil": "<?php echo date('Y-m-d', strtotime('+30 days')); ?>"
        }
      }
    }<?php echo $index+1 < count($products) ? ',' : ''; ?>
    <?php endforeach; ?>
  ]
}
</script>

<!-- CRO comments: keep CTAs visible, reduce friction with one-click upsells, show social proof near CTAs. -->

</body>
</html>
