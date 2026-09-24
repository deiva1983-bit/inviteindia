<?php
/**
 * Global Header Component
 *
 * File: includes/global-header.php
 * Description: Reusable header template with unified navigation, authentication modal,
 *              and responsive design for all core pages (excludes /blog/ and wedding websites)
 *
 * Usage in any PHP page:
 *   include_once('includes/global-header.php');
 *   renderGlobalHeader($smarty, $pageConfig);
 *
 * $pageConfig array should contain:
 *   - page_title: SEO title
 *   - page_desc: Meta description
 *   - page_keywords: Meta keywords
 *   - canonical_url: Canonical URL
 *   - current_nav: Navigation menu active state (e.g., 'themes', 'packages', 'domain')
 *   - show_auth: 1 if user logged in, 0 if not
 */

if (!function_exists('renderGlobalHeader')) {
    function renderGlobalHeader($smarty, $pageConfig = array()) {
        // Extract config with defaults
        $pageTitle = isset($pageConfig['page_title']) ? $pageConfig['page_title'] : 'InviteIndia - Wedding Websites & Digital Invitations';
        $pageDesc = isset($pageConfig['page_desc']) ? $pageConfig['page_desc'] : 'Create beautiful wedding websites, digital invitations, and e-commerce stores online.';
        $pageKeywords = isset($pageConfig['page_keywords']) ? $pageConfig['page_keywords'] : 'wedding website, digital invitation, e-invitation, wedding card';
        $canonicalUrl = isset($pageConfig['canonical_url']) ? $pageConfig['canonical_url'] : '';
        $currentNav = isset($pageConfig['current_nav']) ? $pageConfig['current_nav'] : '';
        $showAuth = isset($pageConfig['show_auth']) ? $pageConfig['show_auth'] : (isset($smarty->tpl_vars['show_auth']) ? $smarty->tpl_vars['show_auth']->value : 0);

        $siteDomain = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'inviteindia.com';
        $siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://') . $siteDomain;
        $staticPath = $siteUrl . '/static';

        $isMobile = isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/mobile|android|iphone|ipod|blackberry|iemobile|opera mini/i', $_SERVER['HTTP_USER_AGENT']) ? 1 : 0;

        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="<?php echo htmlspecialchars($pageDesc); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($pageKeywords); ?>" />
    <meta name="theme-color" content="#d43f5e">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDesc); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl ?: $siteUrl); ?>" />
    <meta property="og:site_name" content="InviteIndia" />
    <meta property="og:locale" content="en_IN" />
    <meta property="og:image" content="<?php echo $siteUrl; ?>/site/favicon.png" />
    <meta property="og:image:alt" content="InviteIndia wedding website and digital invitation platform" />

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle); ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars($pageDesc); ?>" />
    <meta name="twitter:image" content="<?php echo $siteUrl; ?>/site/favicon.png" />

    <!-- Canonical URL -->
    <?php if (!empty($canonicalUrl)): ?>
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>" />
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo $siteUrl; ?>/site/favicon.png" type="image/png">

    <!-- Preconnect & DNS Prefetch -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">

    <!-- Bootstrap & Base Styles -->
    <link href="<?php echo $staticPath; ?>/css/base/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo $staticPath; ?>/css/base/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo $staticPath; ?>/css/base/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $staticPath; ?>/css/userstyle.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo $staticPath; ?>/css/cart.css" rel="stylesheet" type="text/css" media="all" />

    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet">

    <!-- Global Header Styles -->
    <style>
        :root {
            --primary-color: #d43f5e;
            --secondary-color: #f44c5a;
            --text-dark: #333;
            --text-light: #666;
            --border-color: #e0e0e0;
        }

        body { font-family: 'Open Sans', sans-serif; color: var(--text-dark); }
        .global-header { background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .navbar-brand { color: var(--primary-color) !important; font-weight: 600; font-size: 20px; }
        .navbar-nav .nav-link { color: var(--text-dark) !important; margin: 0 8px; transition: color 0.3s; }
        .navbar-nav .nav-link:hover { color: var(--primary-color) !important; }
        .navbar-nav .nav-link.active { color: var(--primary-color) !important; border-bottom: 2px solid var(--primary-color); }

        .auth-btn { background: var(--primary-color); color: #fff; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer; margin: 0 4px; font-weight: 500; transition: background 0.3s; }
        .auth-btn:hover { background: var(--secondary-color); }
        .auth-btn-secondary { background: transparent; color: var(--primary-color); border: 1px solid var(--primary-color); }
        .auth-btn-secondary:hover { background: var(--primary-color); color: #fff; }

        .mobile-menu-toggle { display: none; background: none; border: none; font-size: 24px; cursor: pointer; }

        @media (max-width: 768px) {
            .mobile-menu-toggle { display: block; }
            .navbar-collapse { display: none; }
            .navbar-collapse.show { display: block; }
            .navbar-nav { flex-direction: column; }
            .navbar-nav .nav-link { margin: 8px 0; }
        }

        /* Login Modal Styles */
        .modal-header { border-bottom: 2px solid var(--primary-color); }
        .modal-body .form-group { margin-bottom: 16px; }
        .modal-body .form-group label { font-weight: 500; color: var(--text-dark); }
        .modal-body .form-control { border: 1px solid var(--border-color); border-radius: 4px; padding: 10px; }
        .modal-body .form-control:focus { border-color: var(--primary-color); box-shadow: 0 0 0 0.2rem rgba(212, 63, 94, 0.25); }

        .modal-footer { border-top: 1px solid var(--border-color); }
        .modal-footer .btn { padding: 8px 16px; margin: 0 4px; }

        .login-link-btn { background: none; border: none; color: var(--primary-color); cursor: pointer; text-decoration: underline; padding: 0; }
        .login-link-btn:hover { color: var(--secondary-color); }

        .form-error { color: #dc3545; font-size: 12px; margin-top: 4px; }
        .alert-message { padding: 12px; margin-bottom: 16px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>

    <!-- jQuery (required for Bootstrap modal) -->
    <script src="<?php echo $staticPath; ?>/js/jquery.min.js"></script>
</head>
<body>

<!-- Global Header Navigation -->
<header class="global-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Logo/Brand -->
            <a class="navbar-brand" href="<?php echo $siteUrl; ?>">InviteIndia</a>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Navigation Menu -->
            <div class="navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentNav === 'home') ? 'active' : ''; ?>" href="<?php echo $siteUrl; ?>">
                            <i class="fa fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentNav === 'themes') ? 'active' : ''; ?>" href="<?php echo $siteUrl; ?>/invitation-themes.php">
                            <i class="fa fa-wpforms"></i> Themes
                        </a>
                    </li>

                    <?php if ($showAuth): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentNav === 'invitations') ? 'active' : ''; ?>" href="<?php echo $siteUrl; ?>/wedding-website-settings">
                            <i class="fa fa-cog"></i> My Invitations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentNav === 'domain') ? 'active' : ''; ?>" href="<?php echo $siteUrl; ?>/buy-domain.php">
                            <i class="fa fa-globe"></i> My Domain
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentNav === 'packages') ? 'active' : ''; ?>" href="<?php echo $siteUrl; ?>/packages.php">
                            <i class="fa fa-money"></i> Packages
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="featuresDropdown" role="button" data-toggle="dropdown">
                            <i class="fa fa-plus"></i> More
                        </a>
                        <div class="dropdown-menu" aria-labelledby="featuresDropdown">
                            <a class="dropdown-item" href="<?php echo $siteUrl; ?>/wedding-gift-for-couples">Gift Registry</a>
                            <a class="dropdown-item" href="<?php echo $siteUrl; ?>/vendors">Vendors</a>
                            <a class="dropdown-item" href="<?php echo $siteUrl; ?>/blogs.php">Blog</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $siteUrl; ?>/myprofile.php?do=mprofile">
                            <i class="fa fa-user"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $siteUrl; ?>/logout.php">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentNav === 'themes') ? 'active' : ''; ?>" href="<?php echo $siteUrl; ?>/invitation-themes.php">
                            Browse Themes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentNav === 'domain') ? 'active' : ''; ?>" href="<?php echo $siteUrl; ?>/buy-domain.php">
                            Get Domain
                        </a>
                    </li>
                    <li class="nav-item">
                        <button class="auth-btn auth-btn-secondary" data-toggle="modal" data-target="#loginModal">
                            Sign In
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="auth-btn" data-toggle="modal" data-target="#signupModal">
                            Sign Up
                        </button>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php if (!$showAuth): ?>
<!-- Login Modal -->
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
                    <small class="form-error" id="usernameError"></small>
                </div>

                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password">
                    <small class="form-error" id="passwordError"></small>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" id="rememberMe"> Remember me
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="loginSubmitBtn">Sign In</button>
            </div>
            <div class="modal-footer" style="border-top: none; padding-top: 0;">
                <small>Don't have an account?
                    <button class="login-link-btn" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">
                        Sign Up here
                    </button>
                </small>
            </div>
        </div>
    </div>
</div>

<!-- Signup Modal -->
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
                <div id="signupSuccess" class="alert-message alert-success" style="display: none;"></div>

                <div class="form-group">
                    <label for="signupName">Full Name</label>
                    <input type="text" class="form-control" id="signupName" placeholder="Enter your full name">
                    <small class="form-error" id="nameError"></small>
                </div>

                <div class="form-group">
                    <label for="signupEmail">Email Address</label>
                    <input type="email" class="form-control" id="signupEmail" placeholder="Enter your email">
                    <small class="form-error" id="emailError"></small>
                </div>

                <div class="form-group">
                    <label for="signupUsername">Username</label>
                    <input type="text" class="form-control" id="signupUsername" placeholder="Choose a username">
                    <small class="form-error" id="signupUsernameError"></small>
                </div>

                <div class="form-group">
                    <label for="signupPassword">Password</label>
                    <input type="password" class="form-control" id="signupPassword" placeholder="Create a password">
                    <small class="form-error" id="signupPasswordError"></small>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" id="agreeTerms"> I agree to the
                        <a href="<?php echo $siteUrl; ?>/terms.php" target="_blank">Terms & Conditions</a>
                    </label>
                    <small class="form-error" id="termsError"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="signupSubmitBtn">Create Account</button>
            </div>
            <div class="modal-footer" style="border-top: none; padding-top: 0;">
                <small>Already have an account?
                    <button class="login-link-btn" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">
                        Sign In here
                    </button>
                </small>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Bootstrap JS & Popper -->
<script src="<?php echo $staticPath; ?>/js/popper.min.js"></script>
<script src="<?php echo $staticPath; ?>/js/bootstrap.min.js"></script>

<!-- Global Header Script -->
<script>
(function() {
    'use strict';

    const GlobalHeader = {
        init: function() {
            this.setupMobileMenu();
            this.setupLoginModal();
            this.setupSignupModal();
            this.setupEventDelegation();
        },

        setupMobileMenu: function() {
            const toggle = document.getElementById('mobileMenuToggle');
            const navContent = document.getElementById('navbarContent');

            if (toggle) {
                toggle.addEventListener('click', function() {
                    if (navContent.classList.contains('show')) {
                        navContent.classList.remove('show');
                    } else {
                        navContent.classList.add('show');
                    }
                });
            }
        },

        setupLoginModal: function() {
            const submitBtn = document.getElementById('loginSubmitBtn');
            if (!submitBtn) return;

            submitBtn.addEventListener('click', this.handleLogin.bind(this));

            document.getElementById('loginPassword').addEventListener('keypress', (e) => {
                if (e.key === 'Enter') this.handleLogin.call(this);
            });
        },

        setupSignupModal: function() {
            const submitBtn = document.getElementById('signupSubmitBtn');
            if (!submitBtn) return;

            submitBtn.addEventListener('click', this.handleSignup.bind(this));
        },

        setupEventDelegation: function() {
            document.addEventListener('click', (e) => {
                if (e.target.hasAttribute('data-toggle') && e.target.getAttribute('data-toggle') === 'modal') {
                    e.preventDefault();
                }
            });
        },

        handleLogin: function() {
            const username = document.getElementById('loginUsername').value.trim();
            const password = document.getElementById('loginPassword').value.trim();
            const errorDiv = document.getElementById('loginError');

            if (!this.validateLogin(username, password)) return;

            fetch('<?php echo $siteUrl; ?>/ajax_login.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'user_name=' + encodeURIComponent(username) +
                      '&password=' + encodeURIComponent(password) +
                      '&rand=' + Math.random()
            })
            .then(response => response.text())
            .then(data => {
                if (data === '1') {
                    errorDiv.style.display = 'none';
                    this.showSuccess('Login successful! Redirecting...', errorDiv);
                    setTimeout(() => location.reload(), 1500);
                } else {
                    this.showError('Invalid username or password', errorDiv);
                }
            })
            .catch(err => {
                console.error('Login error:', err);
                this.showError('An error occurred. Please try again.', errorDiv);
            });
        },

        validateLogin: function(username, password) {
            const errorDiv = document.getElementById('loginError');
            if (!username || !password) {
                this.showError('Please enter both username and password', errorDiv);
                return false;
            }
            return true;
        },

        handleSignup: function() {
            const name = document.getElementById('signupName').value.trim();
            const email = document.getElementById('signupEmail').value.trim();
            const username = document.getElementById('signupUsername').value.trim();
            const password = document.getElementById('signupPassword').value.trim();
            const agreeTerms = document.getElementById('agreeTerms').checked;
            const errorDiv = document.getElementById('signupError');

            if (!this.validateSignup(name, email, username, password, agreeTerms)) return;

            fetch('<?php echo $siteUrl; ?>/ajax_signup.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'name=' + encodeURIComponent(name) +
                      '&email=' + encodeURIComponent(email) +
                      '&username=' + encodeURIComponent(username) +
                      '&password=' + encodeURIComponent(password)
            })
            .then(response => response.text())
            .then(data => {
                if (data === '1') {
                    this.showSuccess('Account created! Logging you in...', errorDiv);
                    setTimeout(() => location.reload(), 1500);
                } else {
                    this.showError(data || 'Signup failed. Please try again.', errorDiv);
                }
            })
            .catch(err => {
                console.error('Signup error:', err);
                this.showError('An error occurred. Please try again.', errorDiv);
            });
        },

        validateSignup: function(name, email, username, password, agreeTerms) {
            const errorDiv = document.getElementById('signupError');

            if (!name) {
                this.showError('Please enter your full name', errorDiv);
                return false;
            }
            if (!email || !this.isValidEmail(email)) {
                this.showError('Please enter a valid email address', errorDiv);
                return false;
            }
            if (!username) {
                this.showError('Please choose a username', errorDiv);
                return false;
            }
            if (!password || password.length < 6) {
                this.showError('Password must be at least 6 characters', errorDiv);
                return false;
            }
            if (!agreeTerms) {
                this.showError('Please agree to the Terms & Conditions', errorDiv);
                return false;
            }
            return true;
        },

        isValidEmail: function(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        },

        showError: function(message, container) {
            if (!container) return;
            container.textContent = message;
            container.style.display = 'block';
            container.className = 'alert-message alert-error';
        },

        showSuccess: function(message, container) {
            if (!container) return;
            container.textContent = message;
            container.style.display = 'block';
            container.className = 'alert-message alert-success';
        }
    };

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => GlobalHeader.init());
    } else {
        GlobalHeader.init();
    }
})();
</script>

        <?php
    }
}

// Shorthand function for direct inclusion
if (!function_exists('includeGlobalHeader')) {
    function includeGlobalHeader($smarty, $pageConfig = array()) {
        renderGlobalHeader($smarty, $pageConfig);
    }
}
?>
