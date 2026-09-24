# Quick Start Guide - InviteIndia Refactoring

## 🚀 30-Second Integration

### Global Header on Any Page

```php
<?php
include_once('includes/global-header.php');

$pageConfig = [
    'page_title' => 'Page Title | InviteIndia',
    'page_desc' => 'Meta description',
    'current_nav' => 'themes',
    'show_auth' => isset($_SESSION['sess_user_id']) ? 1 : 0
];

renderGlobalHeader(null, $pageConfig);
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

## 📱 Required Endpoints

### Login
**Endpoint:** `POST /ajax_login.php`
```
Parameters: user_name, password, rand
Response: "1" (success) or error message
```

### Signup
**Endpoint:** `POST /ajax_signup.php`
```
Parameters: name, email, username, password
Response: "1" (success) or error message
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

| File | Purpose |
|------|---------|
| `includes/global-header.php` | Reusable header component |
| `static/js/wedding-invitation-builder.js` | Interactive builder engine |
| `wedding-customizer-example.php` | Full working example |
| `IMPLEMENTATION_GUIDE.md` | Complete documentation |
| `QUICK_START.md` | This file |

---

## 💡 Tips

1. **Auto-save:** Builder data is saved to localStorage automatically
2. **Mobile:** Preview scales to mobile (360px) and desktop (700px+)
3. **Themes:** All themes are pre-configured, just add theme images
4. **Sharing:** Built-in WhatsApp, Facebook, Twitter, email buttons
5. **Fonts:** Google Fonts are pre-loaded, add custom fonts in header

---

## 🎯 Next Steps

1. Copy `includes/global-header.php` to your includes folder
2. Copy `static/js/wedding-invitation-builder.js` to your static/js folder
3. Update one page to use the global header
4. Test login/signup modals
5. Create a page with the wedding builder
6. Update remaining pages gradually

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
