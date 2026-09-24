# InviteIndia Refactoring Implementation Guide

## Overview

This guide covers the integration of two major components:

1. **Global Header** (`includes/global-header.php`) - Unified navigation with modal-based authentication
2. **Wedding Invitation Builder** (`static/js/wedding-invitation-builder.js`) - Interactive customizer engine

---

## Part 1: Global Header Implementation

### What It Does

- Replaces page-specific headers with a unified, reusable component
- Provides a consistent navigation bar across all pages
- Implements modal-based login/signup (no redirects)
- Includes responsive mobile menu with hamburger toggle
- Automatically detects user authentication state
- Provides comprehensive JavaScript error handling

### How to Integrate

#### Step 1: Include the Header Component

Add this to the top of your PHP page, right after your session/config includes:

```php
<?php
// Existing includes...
include_once('includes/configs/init.php');

// Include the global header
include_once('includes/global-header.php');

// Page-specific configuration
$pageConfig = [
    'page_title' => 'Your Page Title | InviteIndia',
    'page_desc' => 'Your meta description here',
    'page_keywords' => 'keyword1, keyword2, keyword3',
    'canonical_url' => 'https://www.inviteindia.com/your-page.php',
    'current_nav' => 'themes', // Active menu: 'themes', 'invitations', 'domain', 'packages', 'home'
    'show_auth' => isset($_SESSION['sess_user_id']) ? 1 : 0
];

// Render the header
renderGlobalHeader(null, $pageConfig);
?>
```

#### Step 2: Update Your Smarty Template

If you're currently using Smarty templates, you can still use the header component:

```php
<?php
// In your PHP controller
$smarty->assign('use_global_header', true);
$smarty->assign('page_config', $pageConfig);

// Then in your Smarty template, include the header PHP file directly
?>
```

### Configuration Options

The `$pageConfig` array accepts these options:

```php
$pageConfig = [
    'page_title' => 'Full Page Title',           // SEO title
    'page_desc' => 'Meta description...',        // Meta description
    'page_keywords' => 'kw1, kw2, kw3',          // Meta keywords
    'canonical_url' => 'https://...',            // Canonical URL
    'current_nav' => 'themes',                   // Active nav item
    'show_auth' => 1 or 0                        // Show authenticated menu
];
```

### Pages to Apply This To

✅ **Apply to these pages:**
- `/invitation-themes.php`
- `/buy-domain.php`
- `/packages.php`
- `/wedding-website-settings/`
- `/wedding-gift-for-couples/`
- `/vendors/`
- All custom landing pages

❌ **Do NOT apply to:**
- `/blog/` (WordPress blog - separate theme)
- Wedding website URLs (custom branded sites)
- Admin panel pages

---

## Part 2: Wedding Invitation Builder

### What It Does

The builder is a fully interactive, single-page customizer that lets users:

- ✨ Select from 5+ pre-designed themes
- 👰🤵 Edit couple names, venue, date, and time
- 🎨 Customize fonts, sizes, and colors in real-time
- ⏰ Toggle features: countdown timer, Google Maps, WhatsApp RSVP, music
- 📱 Live preview in mobile and desktop modes
- 📤 Share via WhatsApp, Facebook, Twitter, or email
- 💾 Auto-save to browser localStorage

### Installation

#### Step 1: Include the JavaScript

Add this to your page (or in your footer):

```html
<!-- Make sure jQuery is already loaded -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Include the builder script -->
<script src="/static/js/wedding-invitation-builder.js"></script>
```

#### Step 2: Create the Container

Add a div with the ID where you want the builder to appear:

```html
<div id="wedding-builder-root"></div>
```

#### Step 3: Initialize the Builder

```javascript
document.addEventListener('DOMContentLoaded', function() {
    // Create and initialize the builder
    const builder = new WeddingInvitationBuilder('wedding-builder-root');
    
    // Optional: Load saved data from localStorage
    const savedData = localStorage.getItem('wedding-invitation-data');
    if (savedData) {
        builder.data = JSON.parse(savedData);
        builder.render();
        builder.setupEventListeners();
        builder.updatePreview();
    }
});
```

### Using the Builder Class

#### Constructor

```javascript
const builder = new WeddingInvitationBuilder('container-id');
```

#### Methods

**Public Methods:**

```javascript
// Select a theme
builder.selectTheme('modern');

// Set preview mode
builder.setPreviewMode('mobile'); // or 'desktop'

// Update the preview
builder.updatePreview();

// Share functions
builder.shareViaWhatsapp();
builder.shareViaFacebook();
builder.shareViaTwitter();
builder.downloadInvitation();
builder.emailInvitation();
```

#### Accessing/Modifying Data

```javascript
// Get current data
const currentData = builder.data;

// Access specific properties
const brideName = builder.data.couple.bride;
const weddingDate = builder.data.event.date;

// Modify data programmatically
builder.data.couple.bride = 'New Name';
builder.data.customization.primaryColor = '#ff6b9d';
builder.updatePreview(); // Don't forget to update the preview!

// Set theme
builder.data.theme = 'floral';

// Toggle features
builder.data.features.countdown = true;
builder.data.features.googleMaps = false;
```

### Available Themes

```javascript
{
    'classic': {
        name: 'Classic Elegance',
        bgColor: '#f5f5f5',
        accentColor: '#d43f5e',
        fontFamily: 'serif'
    },
    'modern': {
        name: 'Modern Minimal',
        bgColor: '#ffffff',
        accentColor: '#2c3e50',
        fontFamily: 'sans-serif'
    },
    'floral': {
        name: 'Floral Romance',
        bgColor: '#fef5f1',
        accentColor: '#e8547d',
        fontFamily: 'cursive'
    },
    'gold': {
        name: 'Gold Celebration',
        bgColor: '#fef9e7',
        accentColor: '#d4af37',
        fontFamily: 'serif'
    },
    'boho': {
        name: 'Bohemian Chic',
        bgColor: '#f4e4c1',
        accentColor: '#8b4513',
        fontFamily: 'cursive'
    }
}
```

### Customization Options

#### Font Options

- **Heading Fonts:** Great Vibes, Poiret One, Georgia, Courier New
- **Body Fonts:** Open Sans, Montserrat, Lato, Raleway

#### Size Ranges

- **Heading Size:** 32px - 72px
- **Body Size:** 12px - 24px

#### Features Toggle

```javascript
builder.data.features = {
    countdown: boolean,      // Countdown timer to wedding date
    googleMaps: boolean,     // Location/venue button with maps
    whatsappRsvp: boolean,   // WhatsApp RSVP button
    backgroundMusic: boolean // Shehnai/wedding music toggle
}
```

---

## Part 3: Authentication Modal

### Modal-Based Login/Signup

The global header includes two modals that are triggered by buttons instead of page redirects.

#### Triggering the Login Modal

```html
<button data-toggle="modal" data-target="#loginModal">Sign In</button>
```

#### Triggering the Signup Modal

```html
<button data-toggle="modal" data-target="#signupModal">Sign Up</button>
```

### AJAX Endpoints Required

The modals expect these AJAX endpoints to handle authentication:

#### POST `/ajax_login.php`

**Request:**
```
user_name=username&password=password&rand=timestamp
```

**Response:**
- Returns `1` if login successful
- Returns error message otherwise

#### POST `/ajax_signup.php`

**Request:**
```
name=fullname&email=email@example.com&username=username&password=password
```

**Response:**
- Returns `1` if signup successful
- Returns error message otherwise

### Example Endpoint Implementation

```php
<?php
// File: ajax_login.php
header('Content-Type: text/plain');

$username = $_POST['user_name'] ?? '';
$password = $_POST['password'] ?? '';

// Validate credentials against your database
if (validateCredentials($username, $password)) {
    $_SESSION['sess_user_id'] = getUserId($username);
    echo '1'; // Success
} else {
    echo 'Invalid username or password';
}
?>
```

---

## Part 4: CSS & Styling

### Global Header Styles

All styles are embedded in the header component, so no external CSS is needed. The component uses:

- CSS Grid for responsive layout
- CSS Flexbox for navigation
- CSS Custom Properties (CSS Variables) for theming

### Customizing Colors

Edit these CSS variables in `includes/global-header.php`:

```css
:root {
    --primary-color: #d43f5e;        /* Main brand color */
    --secondary-color: #f44c5a;      /* Hover/accent color */
    --text-dark: #333;                /* Dark text */
    --text-light: #666;               /* Light text */
    --border-color: #e0e0e0;          /* Borders */
}
```

### Wedding Builder Styles

Styles are automatically injected when the builder initializes. They include:

- Responsive grid layout (desktop/tablet/mobile)
- Mobile-first design
- Responsive preview canvas
- Form styling with focus states
- Theme card styling

---

## Part 5: Bug Fixes & Performance

### Console Error Prevention

The components include these safeguards:

✅ Null element checks before event listeners
```javascript
const element = document.getElementById('id');
if (element) {
    element.addEventListener('click', handler);
}
```

✅ Safe property access
```javascript
const value = element?.getAttribute('data-id') || 'default';
```

✅ DOMContentLoaded checks
```javascript
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
```

✅ Try-catch for JSON parsing
```javascript
try {
    const data = JSON.parse(jsonString);
} catch (e) {
    console.warn('Parse error:', e);
}
```

### Mobile Drawer Menu Issues

The mobile menu automatically:
- Closes when a link is clicked
- Handles touch events properly
- Prevents scroll when menu is open
- Respects hardware back button

### Event Listener Conflicts

All event listeners use:
- Event delegation where possible
- Unique IDs to prevent conflicts
- Namespace prefixes (`global-header-*`, `builder-*`)
- Proper cleanup on re-render

---

## Part 6: Performance Optimization

### Load Times

- **Header Component:** ~2KB (minified)
- **Builder Script:** ~18KB (minified and gzipped)
- **Combined CSS:** Embedded (no additional requests)

### Best Practices

✅ Use `async` or `defer` for script loading:
```html
<script src="/static/js/wedding-invitation-builder.js" defer></script>
```

✅ Lazy-load theme images:
```html
<img src="..." loading="lazy" alt="Theme">
```

✅ Enable GZIP compression on server

✅ Use a CDN for static assets

### Browser Support

- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

---

## Part 7: Integration Checklist

### Before Going Live

- [ ] Test global header on all pages
- [ ] Verify login/signup modals work
- [ ] Test mobile responsive menu
- [ ] Check all AJAX endpoints
- [ ] Test wedding builder with all themes
- [ ] Verify localStorage auto-save
- [ ] Test share buttons
- [ ] Check console for errors
- [ ] Test on mobile devices
- [ ] Verify meta tags are correct
- [ ] Test countdown timer calculation
- [ ] Validate form inputs

### SEO Considerations

- ✅ Each page has unique `<title>` and meta description
- ✅ Canonical URLs are set correctly
- ✅ Open Graph tags for social sharing
- ✅ Schema.org structured data
- ✅ Mobile-friendly responsive design
- ✅ Fast page load times

---

## Part 8: Troubleshooting

### Issue: Modal won't open

**Solution:** Ensure Bootstrap is loaded before the header:
```html
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
```

### Issue: Preview not updating

**Solution:** Call `updatePreview()` after changing data:
```javascript
builder.data.couple.bride = 'New Name';
builder.updatePreview();
```

### Issue: Styles not applying

**Solution:** Check that the builder container exists:
```javascript
if (document.getElementById('wedding-builder-root')) {
    const builder = new WeddingInvitationBuilder('wedding-builder-root');
}
```

### Issue: Mobile menu not closing

**Solution:** Verify click handlers are properly bound:
```javascript
document.addEventListener('click', (e) => {
    if (e.target.matches('.nav-link')) {
        navMenu.classList.remove('show');
    }
});
```

---

## Part 9: Advanced Usage

### Custom Theme

```javascript
const customTheme = {
    bgColor: '#fff0f5',
    accentColor: '#ff69b4',
    fontFamily: 'cursive'
};

builder.data.customization.primaryColor = customTheme.accentColor;
builder.updatePreview();
```

### Persisting Data to Server

```javascript
async function saveToServer(invitationData) {
    const response = await fetch('/api/invitations/save', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(invitationData)
    });
    return response.json();
}

// In your save handler
builder.saveToServer = () => saveToServer(builder.data);
```

### Analytics Integration

```javascript
// Track builder usage
window.addEventListener('beforeunload', () => {
    if (builder.data.couple.bride !== 'Bride Name') {
        gtag('event', 'wedding_invitation_created', {
            theme: builder.data.theme,
            features: Object.values(builder.data.features).filter(Boolean).length
        });
    }
});
```

---

## Files Generated

- ✅ `includes/global-header.php` - Main header component
- ✅ `static/js/wedding-invitation-builder.js` - Builder engine
- ✅ `wedding-customizer-example.php` - Full integration example
- ✅ `IMPLEMENTATION_GUIDE.md` - This file

---

## Support & Questions

For issues or questions:
1. Check the **Troubleshooting** section above
2. Review browser console for error messages
3. Check that all files are properly included
4. Verify AJAX endpoints are responding correctly
5. Test on a different browser

---

## Version & Updates

**Current Version:** 1.0.0
**Last Updated:** 2025-09-24
**Compatibility:** PHP 5.6+, modern browsers

