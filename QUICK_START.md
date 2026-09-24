# Quick Start Guide - InviteIndia Refactoring

## 🚀 30-Second Integration

### Global Header on Any Page (Smarty Template)

**Already implemented on:**
- ✅ buy-domain.php
- ✅ packages.php

**To add to another page:**

```php
<?php
// In your page controller, add before the header fetch:
$show_auth = !empty($user_log_id) ? 1 : 0;
$smarty->assign('show_auth', $show_auth);
$smarty->assign('topnav_select', 'themes'); // or appropriate nav item

// Then fetch the new header template:
$smarty->assign('header', $smarty->fetch('default/header-global.tpl'));
?>
```

### Wedding Invitation Builder

```html
<!-- Container -->
<div id="wedding-builder-root"></div>

<!-- Script -->
<script src="/static/js/wedding-invitation-builder.js"></script>
<script>
    const builder = new WeddingInvitationBuilder('wedding-builder-root');
</script>
```

---

## 📋 Configuration Reference

### Navigation States
```
'home'        → Homepage active
'themes'      → Themes/Gallery active
'invitations' → My Invitations active
'domain'      → My Domain active
'packages'    → Packages active
```

### Common Properties
```php
'page_title'     // SEO title
'page_desc'      // Meta description
'page_keywords'  // Meta keywords
'canonical_url'  // Canonical URL
'current_nav'    // Active nav item
'show_auth'      // 1 = logged in, 0 = guest
```

---

## 🎨 Builder Data Structure

```javascript
builder.data = {
    theme: 'classic',  // or 'modern', 'floral', 'gold', 'boho'
    couple: {
        bride: 'Name',
        groom: 'Name'
    },
    event: {
        date: new Date(),
        time: '18:00',
        venue: 'Hall Name',
        city: 'City',
        state: 'State'
    },
    customization: {
        primaryFont: 'Open Sans',
        accentFont: 'Great Vibes',
        headingSize: 48,
        bodySize: 16,
        primaryColor: '#d43f5e',
        secondaryColor: '#f44c5a'
    },
    features: {
        countdown: true,
        googleMaps: true,
        whatsappRsvp: true,
        backgroundMusic: false
    }
};
```

---

## 🔧 Common Tasks

### Change Theme Programmatically
```javascript
builder.data.theme = 'modern';
builder.updatePreview();
```

### Get Form Data
```javascript
const brideData = builder.data.couple.bride;
const weddingDate = builder.data.event.date;
```

### Save to Server
```javascript
const invitationJSON = JSON.stringify(builder.data);
fetch('/api/save', { method: 'POST', body: invitationJSON });
```

### Toggle Feature
```javascript
builder.data.features.countdown = !builder.data.features.countdown;
builder.updatePreview();
```

### Switch Preview Mode
```javascript
builder.setPreviewMode('mobile');  // or 'desktop'
```

---

## ⚙️ Configuration Checklist

Before testing, verify these are in place:

- [ ] Bootstrap is loaded in your static assets
- [ ] jQuery is loaded properly
- [ ] `$glb_site_url` is set correctly in `init.php`
- [ ] `$static_domain_path_css` points to `/static/css/`
- [ ] `$static_domain_path_js` points to `/static/js/`
- [ ] `$static_domain_path_img` points to `/static/images/`

## 📱 Required AJAX Endpoints

### Login
**Endpoint:** `POST /ajax_login.php`
```
Parameters: user_name, password, rand
Response: "1" (success) or error message
Required: Sets $_SESSION['sess_user_id'] on success
```

### Signup
**Endpoint:** `POST /ajax_signup.php`
```
Parameters: name, email, username, password
Response: "1" (success) or error message
Required: Creates user and sets $_SESSION['sess_user_id'] on success
```

---

## ✅ Pages to Update

**Apply global header to:**
- ✅ invitation-themes.php
- ✅ buy-domain.php
- ✅ packages.php
- ✅ wedding-website-settings/
- ✅ wedding-gift-for-couples/
- ✅ vendors/
- ✅ Custom landing pages

**Do NOT update:**
- ❌ /blog/* (WordPress)
- ❌ Wedding websites
- ❌ Admin panel

---

## 🐛 Common Issues

| Issue | Solution |
|-------|----------|
| Modal won't open | Load Bootstrap before header |
| Preview not updating | Call `builder.updatePreview()` |
| Mobile menu stuck | Check click handlers |
| Console errors | Check element exists before jQuery |
| Styles not applied | Verify container has correct ID |

---

## 📦 Files

| File | Purpose | Status |
|------|---------|--------|
| `templates/default/header-global.tpl` | Global header template (Smarty) | ✅ In use |
| `templates/default/header-wrapper.tpl` | Gradual migration wrapper | 📖 Reference |
| `static/js/wedding-invitation-builder.js` | Interactive builder engine | 📖 Ready to use |
| `wedding-customizer-example.php` | Full builder example | 📖 Reference |
| `buy-domain.php` | Updated to use global header | ✅ In use |
| `packages.php` | Updated to use global header | ✅ In use |
| `index.php` | Homepage (show_auth added) | ⚠️ Uses mainheader.tpl |
| `IMPLEMENTATION_GUIDE.md` | Complete documentation | 📖 Reference |
| `QUICK_START.md` | This file | 📖 Reference |

---

## 💡 Tips

1. **Auto-save:** Builder data is saved to localStorage automatically
2. **Mobile:** Preview scales to mobile (360px) and desktop (700px+)
3. **Themes:** All themes are pre-configured, just add theme images
4. **Sharing:** Built-in WhatsApp, Facebook, Twitter, email buttons
5. **Fonts:** Google Fonts are pre-loaded, add custom fonts in header

---

## 🎯 What's Already Done

✅ `templates/default/header-global.tpl` created (Smarty version)
✅ `static/js/wedding-invitation-builder.js` created
✅ `buy-domain.php` updated to use global header
✅ `packages.php` updated to use global header
✅ Example pages created for reference

## 🚀 Next Steps

1. **Test on localhost:**
   - Visit http://localhost/buy-domain.php (should show new header)
   - Visit http://localhost/packages.php (should show new header)
   - Clear browser cache if you see old styles

2. **Update remaining pages:**
   - Use the pattern from buy-domain.php & packages.php
   - Follow `MIGRATION_CHECKLIST.md` for step-by-step guide

3. **Create wedding builder page:**
   - Copy pattern from `wedding-customizer-example.php`
   - Add the builder to your site

4. **Verify AJAX endpoints:**
   - Ensure `/ajax_login.php` exists and returns "1" on success
   - Ensure `/ajax_signup.php` exists and returns "1" on success

---

## 📞 Quick Reference URLs

```
Login Modal Trigger: data-toggle="modal" data-target="#loginModal"
Signup Modal Trigger: data-toggle="modal" data-target="#signupModal"
Builder Root: <div id="wedding-builder-root"></div>
Builder Class: new WeddingInvitationBuilder('container-id')
```

---

**Version:** 1.0.0
**Last Updated:** 2025-09-24
