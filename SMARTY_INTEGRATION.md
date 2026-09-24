# Integrating Global Header with Smarty Templates

Since InviteIndia uses Smarty templating, here's how to properly integrate the global header component.

---

## Current Smarty Setup

Your current flow:
```php
$smarty->assign('header', $smarty->fetch('default/header.tpl'));
$smarty->assign('content', $smarty->fetch($content_template));
$smarty->assign('footer', $smarty->fetch('default/footer.tpl'));
$smarty->display('default/index.tpl');
```

---

## Method 1: Replace Header.tpl (Recommended)

### Step 1: Convert Global Header to Smarty Template

Create a new file: `templates/default/header-global.tpl`

```smarty
{* Global Header Template *}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{$pagetitle|default:'Wedding website templates | InviteIndia'}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="{$metadesc|default:'Create beautiful wedding websites and e-invites online with InviteIndia.'}" />
    <meta name="keywords" content="{$metakeywords|default:'wedding website, wedding invitation, online wedding card, Indian wedding website'}" />
    <meta name="theme-color" content="#d43f5e">

    {* Open Graph *}
    <meta property="og:title" content="{$pagetitle|default:'Wedding website templates | InviteIndia'}" />
    <meta property="og:description" content="{$metadesc|default:'Create beautiful wedding websites and e-invites online with InviteIndia.'}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{$can_url|default:$glb_site_url}" />
    <meta property="og:site_name" content="InviteIndia" />
    <meta property="og:locale" content="en_IN" />
    <meta property="og:image" content="{$static_domain_path_img|default:'https://www.inviteindia.com'}/site/favicon.png" />

    <link rel="icon" href="{$static_domain_path_img}/site/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {* Bootstrap & Styles *}
    <link href="{$static_domain_path_css}/base/bootstrap{$glb_minify_css}.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{$static_domain_path_css}/base/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{$static_domain_path_css}/base/font-awesome.css" rel="stylesheet">
    <link href="{$static_domain_path_css}/userstyle.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="{$static_domain_path_css}/cart.css" rel="stylesheet" type="text/css" media="all" />

    {* Google Fonts *}
    <link href="//fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet">

    {* Global Header Styles *}
    <style>
        :root {
            --primary-color: #d43f5e;
            --secondary-color: #f44c5a;
            --text-dark: #333;
            --text-light: #666;
            --border-color: #e0e0e0;
        }

        .global-header {
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: var(--primary-color) !important;
            font-weight: 600;
            font-size: 20px;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            margin: 0 8px;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-color) !important;
            border-bottom: 2px solid var(--primary-color);
        }

        .auth-btn {
            background: var(--primary-color);
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin: 0 4px;
            font-weight: 500;
            transition: background 0.3s;
        }

        .auth-btn:hover {
            background: var(--secondary-color);
        }

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle { display: block; }
        }

        .modal-header { border-bottom: 2px solid var(--primary-color); }
        .form-error { color: #dc3545; font-size: 12px; margin-top: 4px; }
        .alert-message { padding: 12px; margin-bottom: 16px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>

    <script src="{$static_domain_path_js}/jquery.min.js"></script>
</head>
<body>

{* Navigation *}
<header class="global-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{$glb_site_url}">InviteIndia</a>

            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {if $topnav_select eq 'main'}active{/if}" href="{$glb_site_url}">
                            <i class="fa fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {if $topnav_select eq 'themes'}active{/if}" href="{$glb_site_url}/invitation-themes.php">
                            <i class="fa fa-wpforms"></i> Themes
                        </a>
                    </li>

                    {if $show_auth eq 1}
                        <li class="nav-item">
                            <a class="nav-link {if $topnav_select eq 'wedd'}active{/if}" href="{$glb_site_url}/wedding-website-settings">
                                <i class="fa fa-cog"></i> My Invitations
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {if $topnav_select eq 'owndomain'}active{/if}" href="{$glb_site_url}/buy-domain.php">
                                <i class="fa fa-globe"></i> My Domain
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {if $topnav_select eq 'pack'}active{/if}" href="{$glb_site_url}/packages.php">
                                <i class="fa fa-money"></i> Packages
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="featuresDropdown" role="button" data-toggle="dropdown">
                                <i class="fa fa-plus"></i> More
                            </a>
                            <div class="dropdown-menu" aria-labelledby="featuresDropdown">
                                <a class="dropdown-item" href="{$glb_site_url}/wedding-gift-for-couples">Gift Registry</a>
                                <a class="dropdown-item" href="{$glb_site_url}/vendors">Vendors</a>
                                <a class="dropdown-item" href="{$glb_site_url}/blogs.php">Blog</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{$glb_site_url}/myprofile.php?do=mprofile">
                                <i class="fa fa-user"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{$glb_site_url}/logout.php">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </li>
                    {else}
                        <li class="nav-item">
                            <button class="auth-btn" data-toggle="modal" data-target="#loginModal">
                                Sign In
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="auth-btn" data-toggle="modal" data-target="#signupModal">
                                Sign Up
                            </button>
                        </li>
                    {/if}
                </ul>
            </div>
        </div>
    </nav>
</header>

{* Login Modal *}
{if $show_auth eq 0}
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Sign In to InviteIndia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="loginError" class="alert-message alert-error" style="display: none;"></div>

                <div class="form-group">
                    <label for="loginUsername">Username or Email</label>
                    <input type="text" class="form-control" id="loginUsername" placeholder="Enter your username or email">
                </div>

                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="loginSubmitBtn">Sign In</button>
            </div>
        </div>
    </div>
</div>

{* Signup Modal *}
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Create Your InviteIndia Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="signupError" class="alert-message alert-error" style="display: none;"></div>

                <div class="form-group">
                    <label for="signupName">Full Name</label>
                    <input type="text" class="form-control" id="signupName" placeholder="Enter your full name">
                </div>

                <div class="form-group">
                    <label for="signupEmail">Email Address</label>
                    <input type="email" class="form-control" id="signupEmail" placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="signupUsername">Username</label>
                    <input type="text" class="form-control" id="signupUsername" placeholder="Choose a username">
                </div>

                <div class="form-group">
                    <label for="signupPassword">Password</label>
                    <input type="password" class="form-control" id="signupPassword" placeholder="Create a password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="signupSubmitBtn">Create Account</button>
            </div>
        </div>
    </div>
</div>
{/if}

{* Bootstrap & Scripts *}
<script src="{$static_domain_path_js}/popper.min.js"></script>
<script src="{$static_domain_path_js}/bootstrap.min.js"></script>

{* Global Header Script *}
<script>
(function() {
    'use strict';

    const GlobalHeader = {
        init: function() {
            this.setupMobileMenu();
            this.setupLoginModal();
            this.setupSignupModal();
        },

        setupMobileMenu: function() {
            const toggle = document.getElementById('mobileMenuToggle');
            const navContent = document.getElementById('navbarContent');

            if (toggle) {
                toggle.addEventListener('click', function() {
                    navContent.classList.toggle('show');
                });
            }
        },

        setupLoginModal: function() {
            const submitBtn = document.getElementById('loginSubmitBtn');
            if (!submitBtn) return;

            submitBtn.addEventListener('click', this.handleLogin.bind(this));
        },

        setupSignupModal: function() {
            const submitBtn = document.getElementById('signupSubmitBtn');
            if (!submitBtn) return;

            submitBtn.addEventListener('click', this.handleSignup.bind(this));
        },

        handleLogin: function() {
            const username = document.getElementById('loginUsername').value.trim();
            const password = document.getElementById('loginPassword').value.trim();
            const errorDiv = document.getElementById('loginError');

            if (!username || !password) {
                errorDiv.textContent = 'Please enter username and password';
                errorDiv.style.display = 'block';
                return;
            }

            fetch('{$glb_site_url}/ajax_login.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'user_name=' + encodeURIComponent(username) +
                      '&password=' + encodeURIComponent(password)
            })
            .then(response => response.text())
            .then(data => {
                if (data === '1') {
                    location.reload();
                } else {
                    errorDiv.textContent = 'Invalid username or password';
                    errorDiv.style.display = 'block';
                }
            });
        },

        handleSignup: function() {
            alert('Signup handler - implement your endpoint');
        }
    };

    document.addEventListener('DOMContentLoaded', () => GlobalHeader.init());
})();
</script>
```

### Step 2: Update Your Page Controller

```php
<?php
// Example: invitation-themes.php

include_once('includes/configs/init.php');

$smarty->assign('topnav_select', 'themes');
$smarty->assign('currentpage_js', 'themes');
$smarty->assign('glb_site_url', $glb_site_url);

$show_auth = isset($_SESSION['sess_user_id']) && !empty($_SESSION['sess_user_id']) ? 1 : 0;
$smarty->assign('show_auth', $show_auth);

// Meta tags
$smarty->assign('pagetitle', 'Wedding Invitation Themes | InviteIndia');
$smarty->assign('metadesc', 'Choose from beautiful wedding invitation themes...');
$smarty->assign('metakeywords', 'wedding themes, invitation templates...');
$smarty->assign('can_url', 'https://www.inviteindia.com/invitation-themes.php');

// Render components
$smarty->assign('header', $smarty->fetch('default/header-global.tpl'));
$smarty->assign('content', $smarty->fetch('default/themes.tpl'));
$smarty->assign('footer', $smarty->fetch('default/footer.tpl'));

$smarty->display('default/index.tpl');
?>
```

---

## Method 2: Wrapper Template (Advanced)

If you want to keep the old header template for some pages, create a wrapper:

### `templates/default/header-wrapper.tpl`

```smarty
{if $use_global_header}
    {include file="default/header-global.tpl"}
{else}
    {include file="default/header.tpl"}
{/if}
```

### In your controller:

```php
$smarty->assign('use_global_header', true);
$smarty->assign('header', $smarty->fetch('default/header-wrapper.tpl'));
```

---

## Conversion Checklist

For each page you convert:

- [ ] Update controller to assign `topnav_select`
- [ ] Add `show_auth` assignment
- [ ] Update `pagetitle`, `metadesc`, `metakeywords`
- [ ] Change header fetch to use `header-global.tpl`
- [ ] Test mobile menu toggle
- [ ] Test login/signup modals
- [ ] Verify styles look correct
- [ ] Check console for errors

---

## Pages to Convert (Recommended Order)

1. **First:** `invitation-themes.php` (lowest complexity)
2. **Then:** `buy-domain.php`, `packages.php`
3. **Next:** `wedding-website-settings`
4. **Finally:** Custom landing pages

---

## Troubleshooting Smarty Issues

### Modal not showing
**Solution:** Check that Bootstrap is loaded and modals are in the template

### Navbar items not showing
**Solution:** Verify `$topnav_select` is assigned correctly

### Mobile menu not toggling
**Solution:** Ensure JavaScript is loaded and IDs match

---

## Complete Working Example

See `wedding-customizer-example.php` for a full working integration.

