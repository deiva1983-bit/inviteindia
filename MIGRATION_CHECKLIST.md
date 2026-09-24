# Global Header Migration Checklist

This guide helps you migrate your existing pages to the new global header system.

---

## Pre-Migration Setup (One Time)

- [ ] Copy `templates/default/header-global.tpl` to your templates directory
- [ ] Copy `templates/default/header-wrapper.tpl` to your templates directory
- [ ] Verify Bootstrap is loaded in your static assets
- [ ] Verify jQuery is properly loaded
- [ ] Test on desktop (Chrome, Firefox, Safari, Edge)
- [ ] Test on mobile (iPhone, Android)

---

## Step-by-Step Page Migration

### Phase 1: Low-Risk Pages (Quickest Win)

Start with pages that have minimal custom logic.

#### Step 1.1: Update `invitation-themes.php`

**Current flow:**
```php
$smarty->assign('header', $smarty->fetch('default/header.tpl'));
```

**New flow:**
```php
$use_new_header = true;
$show_auth = !empty($_SESSION['sess_user_id']) ? 1 : 0;
$smarty->assign('use_new_header', $use_new_header);
$smarty->assign('show_auth', $show_auth);
$smarty->assign('topnav_select', 'themes');

$smarty->assign('header', $smarty->fetch('default/header-global.tpl'));
```

**Checklist:**
- [ ] Update controller file
- [ ] Add required Smarty assignments
- [ ] Test page loads correctly
- [ ] Test login/signup modals work
- [ ] Test mobile menu
- [ ] Check console for errors
- [ ] Test on multiple browsers

#### Step 1.2: Update `buy-domain.php`

**Same pattern as themes page:**
```php
$use_new_header = true;
$show_auth = !empty($_SESSION['sess_user_id']) ? 1 : 0;
$smarty->assign('use_new_header', $use_new_header);
$smarty->assign('show_auth', $show_auth);
$smarty->assign('topnav_select', 'owndomain');

$smarty->assign('header', $smarty->fetch('default/header-global.tpl'));
```

**Checklist:**
- [ ] Update controller
- [ ] Test page rendering
- [ ] Verify domain info displays correctly
- [ ] Test modals
- [ ] Check responsive design

#### Step 1.3: Update `packages.php`

**Same pattern:**
```php
$smarty->assign('topnav_select', 'pack'); // Different nav selection
```

**Checklist:**
- [ ] Update controller
- [ ] Test page rendering
- [ ] Verify packages display correctly

---

### Phase 2: Medium Complexity Pages

#### Step 2.1: Update `wedding-website-settings`

This is a logged-in user page, so:

```php
$use_new_header = true;
$user_log_id = trim($_SESSION['sess_user_id'] ?? '');
$show_auth = !empty($user_log_id) ? 1 : 0;

if (!$show_auth) {
    header('Location: /signup.php?redirect=wedding-website-settings');
    exit;
}

$smarty->assign('use_new_header', $use_new_header);
$smarty->assign('show_auth', 1); // Always 1 for this page
$smarty->assign('topnav_select', 'wedd');

$smarty->assign('header', $smarty->fetch('default/header-global.tpl'));
```

**Checklist:**
- [ ] Add authentication check
- [ ] Update nav selection to 'wedd'
- [ ] Test as authenticated user
- [ ] Verify profile shows in header
- [ ] Test logout functionality

#### Step 2.2: Update `wedding-gift-for-couples`

**Same pattern:**
```php
$smarty->assign('topnav_select', 'wgift');
```

**Checklist:**
- [ ] Update controller
- [ ] Test page functionality

#### Step 2.3: Update `vendors/`

If this is a separate section, follow the same pattern.

---

### Phase 3: Complex Pages

#### Step 3.1: Custom Landing Pages

Identify all custom landing pages and apply the same pattern:

```php
// List of pages to update:
// - landing-page-1.php
// - special-offer.php
// - seasonal-promotions.php
// - etc.

$smarty->assign('use_new_header', true);
$smarty->assign('show_auth', $show_auth);
$smarty->assign('topnav_select', 'home'); // or appropriate nav item

$smarty->assign('header', $smarty->fetch('default/header-global.tpl'));
```

---

## Testing at Each Phase

### Desktop Testing
- [ ] Chrome latest
- [ ] Firefox latest
- [ ] Safari latest
- [ ] Edge latest

### Mobile Testing
- [ ] iPhone (Safari)
- [ ] Android Chrome
- [ ] iPad

### Feature Testing
- [ ] Navigation clicks work
- [ ] Mobile menu toggle works
- [ ] Login modal opens
- [ ] Signup modal opens
- [ ] Login AJAX call works
- [ ] Page meta tags are correct
- [ ] No console errors

### Regression Testing
- [ ] Existing page functionality preserved
- [ ] Custom scripts still work
- [ ] Forms still submit correctly
- [ ] Links still work

---

## AJAX Endpoint Setup

Ensure these endpoints exist and respond correctly:

### `/ajax_login.php`

```php
<?php
header('Content-Type: text/plain');

$username = $_POST['user_name'] ?? '';
$password = $_POST['password'] ?? '';

// Your existing login logic
if (validateCredentials($username, $password)) {
    $_SESSION['sess_user_id'] = getUserId($username);
    echo '1'; // Success
    exit;
}

// Return error message if login fails
echo 'Invalid username or password';
?>
```

### `/ajax_signup.php`

```php
<?php
header('Content-Type: text/plain');

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Your existing signup logic
if (createUser($name, $email, $username, $password)) {
    $_SESSION['sess_user_id'] = getUserId($username);
    echo '1'; // Success
    exit;
}

// Return error message if signup fails
echo 'Username already exists or validation failed';
?>
```

**Checklist:**
- [ ] Both endpoints exist
- [ ] Endpoints return "1" on success
- [ ] Endpoints return error message on failure
- [ ] Session is set on success
- [ ] Test with valid/invalid credentials

---

## Rollback Plan

If something breaks:

1. **Revert to old header temporarily:**
   ```php
   $smarty->assign('header', $smarty->fetch('default/header.tpl'));
   ```

2. **Check browser console** for JavaScript errors

3. **Check server logs** for PHP errors

4. **Common issues:**
   - Bootstrap not loaded → Check static paths
   - jQuery not loaded → Check static paths
   - Modal not opening → Verify jQuery version
   - Navigation not working → Check Smarty variable assignments
   - Session not set → Verify AJAX endpoints

---

## Post-Migration Cleanup

After all pages are migrated:

### Option 1: Remove Old Header (Complete Migration)
- [ ] Delete/archive `header.tpl`
- [ ] Archive old header backups (header_bk*.tpl)
- [ ] Update documentation
- [ ] Inform team of changes

### Option 2: Keep Old Header (Gradual Migration)
- [ ] Keep both headers for 1-2 sprints
- [ ] Monitor for issues
- [ ] Complete migration after validation
- [ ] Then remove old header

---

## Monitoring

### During Migration
- Monitor browser console for errors
- Check server error logs daily
- Monitor page load times
- Test AJAX calls frequently

### Post-Migration
- Set up error tracking (Sentry, Rollbar, etc.)
- Monitor user login conversions
- Track modal open/close rates
- Measure page performance

---

## Files to Update

### Core Files
```
invitation-themes.php       ← Page 1
buy-domain.php             ← Page 2
packages.php               ← Page 3
wedding-website-settings   ← Page 4
wedding-gift-for-couples   ← Page 5
vendors/index.php          ← Page 6
```

### Reference Examples
```
invitation-themes-refactored.php    (Example 1)
buy-domain-refactored.php          (Example 2)
```

### Template Files
```
templates/default/header-global.tpl  (New)
templates/default/header-wrapper.tpl (New)
```

---

## Estimated Timeline

| Phase | Pages | Time | Risk |
|-------|-------|------|------|
| 1 | 3 pages | 2-3 hours | Low |
| 2 | 3 pages | 2-3 hours | Medium |
| 3 | Custom | 2-4 hours | Medium-High |
| Total | ~6-10 pages | 6-10 hours | Low-Medium |

---

## Validation Checklist

After each migration:

- [ ] Page title updated in browser tab
- [ ] Meta description shows correctly (check source)
- [ ] Canonical URL set correctly
- [ ] Navigation menu displays
- [ ] Active menu item highlighted
- [ ] User auth state detected correctly
- [ ] Login/signup buttons show for guests
- [ ] Profile/logout show for authenticated users
- [ ] Mobile menu works on small screens
- [ ] No console JavaScript errors
- [ ] No PHP errors in logs
- [ ] AJAX calls work (network tab)
- [ ] Existing page functionality intact

---

## Success Criteria

✅ All pages migrated and tested
✅ No console errors
✅ No PHP errors
✅ Responsive design works
✅ AJAX auth works
✅ No regression in existing features
✅ Page performance maintained
✅ User feedback positive

---

## Questions & Troubleshooting

**Q: Login modal not opening?**
A: Check that Bootstrap is loaded. Verify jQuery version.

**Q: Navigation links not highlighting?**
A: Ensure `$topnav_select` is assigned correctly to match page.

**Q: Mobile menu not working?**
A: Check JavaScript console for errors. Verify elements exist before binding.

**Q: Session not set after login?**
A: Verify `ajax_login.php` endpoint returns "1" and sets session.

**Q: Page meta tags wrong?**
A: Ensure `$pagetitle`, `$metadesc`, `$metakeywords` are assigned before fetch.

---

## Getting Help

1. Check QUICK_START.md for quick answers
2. Check IMPLEMENTATION_GUIDE.md for detailed docs
3. Check SMARTY_INTEGRATION.md for Smarty-specific issues
4. Check browser console for JavaScript errors
5. Check server logs for PHP errors

---

**Version:** 1.0.0
**Last Updated:** 2025-09-24
**Estimated Completion:** 1-2 weeks (gradual rollout recommended)

