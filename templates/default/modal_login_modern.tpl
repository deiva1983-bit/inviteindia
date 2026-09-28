{* Modern login modal for Tailwind-based pages (mainheader)
   Uses vanilla JavaScript - no jQuery dependency *}

<div id="loginModal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="loginModalTitle" role="dialog" aria-modal="true">
	<div class="flex min-h-screen items-center justify-center px-4 py-8">
		<!-- Backdrop -->
		<div class="fixed inset-0 bg-black/50 transition-opacity" id="loginModalBackdrop"></div>

		<!-- Modal panel -->
		<div class="relative w-full max-w-md space-y-6 rounded-2xl bg-white p-8 shadow-2xl">
			<!-- Close button -->
			<button type="button" id="loginModalClose" class="absolute right-6 top-6 text-ink-400 transition hover:text-ink-600" aria-label="Close login modal">
				<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>
			</button>

			<!-- Tabs -->
			<div class="flex border-b border-cream-200">
				<button type="button" id="signinTab" class="flex-1 pb-3 font-semibold text-brand-700 transition border-b-2 border-brand-700" data-tab="signin">Sign In</button>
				<button type="button" id="signupTab" class="flex-1 pb-3 font-semibold text-ink-400 transition border-b-2 border-transparent hover:text-ink-600" data-tab="signup">Sign Up</button>
			</div>

			<!-- Sign In Form -->
			<div id="signinForm" class="space-y-4">
				<h2 id="loginModalTitle" class="text-xl font-bold text-ink-900">Welcome back</h2>
				<form id="form_signin" onsubmit="return false;" class="space-y-4">
					<div>
						<label for="signin_username" class="block text-sm font-medium text-ink-700 mb-1">Email or Username</label>
						<input type="text" id="signin_username" name="username" placeholder="your@email.com" class="w-full rounded-lg border border-cream-300 px-4 py-2.5 text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition" autocomplete="off" required>
					</div>
					<div>
						<label for="signin_password" class="block text-sm font-medium text-ink-700 mb-1">Password</label>
						<input type="password" id="signin_password" name="password" placeholder="••••••••" class="w-full rounded-lg border border-cream-300 px-4 py-2.5 text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition" autocomplete="off" required>
					</div>
					<button type="submit" id="signin_button" class="w-full rounded-lg bg-brand-700 py-2.5 font-semibold text-white transition hover:bg-brand-800 active:bg-brand-900">Sign In</button>
					<button type="button" id="forgotpass_trigger" class="w-full text-center text-sm text-brand-700 transition hover:text-brand-800">Forgot password?</button>
				</form>
				<div id="alert_signin" class="hidden rounded-lg bg-red-50 p-3 text-sm text-red-700 border border-red-200"></div>
			</div>

			<!-- Sign Up Form -->
			<div id="signupForm" class="hidden space-y-4">
				<h2 class="text-xl font-bold text-ink-900">Create your account</h2>
				<form id="form_signup" onsubmit="return false;" class="space-y-4">
					<div>
						<label for="signup_username" class="block text-sm font-medium text-ink-700 mb-1">Username</label>
						<input type="text" id="signup_username" name="username" placeholder="your username" class="w-full rounded-lg border border-cream-300 px-4 py-2.5 text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition" autocomplete="off" required>
					</div>
					<div>
						<label for="signup_email" class="block text-sm font-medium text-ink-700 mb-1">Email</label>
						<input type="email" id="signup_email" name="email" placeholder="your@email.com" class="w-full rounded-lg border border-cream-300 px-4 py-2.5 text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition" autocomplete="off" required>
					</div>
					<div>
						<label for="signup_password" class="block text-sm font-medium text-ink-700 mb-1">Password</label>
						<input type="password" id="signup_password" name="password" placeholder="••••••••" class="w-full rounded-lg border border-cream-300 px-4 py-2.5 text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition" autocomplete="off" required>
					</div>
					<button type="submit" id="signup_button" class="w-full rounded-lg bg-brand-700 py-2.5 font-semibold text-white transition hover:bg-brand-800 active:bg-brand-900">Create Account</button>
				</form>
				<div id="alert_signup" class="hidden rounded-lg bg-red-50 p-3 text-sm text-red-700 border border-red-200"></div>
			</div>

			<!-- Forgot Password Form -->
			<div id="forgotpassForm" class="hidden space-y-4">
				<h2 class="text-xl font-bold text-ink-900">Reset password</h2>
				<form id="form_forgotpass" onsubmit="return false;" class="space-y-4">
					<p class="text-sm text-ink-600">Enter your email address and we'll send you instructions to reset your password.</p>
					<div>
						<label for="forgotpass_email" class="block text-sm font-medium text-ink-700 mb-1">Email</label>
						<input type="email" id="forgotpass_email" name="email" placeholder="your@email.com" class="w-full rounded-lg border border-cream-300 px-4 py-2.5 text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition" autocomplete="off" required>
					</div>
					<button type="submit" id="forgotpass_button" class="w-full rounded-lg bg-brand-700 py-2.5 font-semibold text-white transition hover:bg-brand-800 active:bg-brand-900">Send Reset Link</button>
					<button type="button" id="forgotpass_back" class="w-full text-center text-sm text-brand-700 transition hover:text-brand-800">Back to sign in</button>
				</form>
				<div id="alert_forgotpass" class="hidden rounded-lg bg-red-50 p-3 text-sm text-red-700 border border-red-200"></div>
			</div>
		</div>
	</div>
</div>

{literal}
<script>
(function() {
	const modal = document.getElementById('loginModal');
	const backdrop = document.getElementById('loginModalBackdrop');
	const closeBtn = document.getElementById('loginModalClose');
	const signinTab = document.getElementById('signinTab');
	const signupTab = document.getElementById('signupTab');
	const signinForm = document.getElementById('signinForm');
	const signupForm = document.getElementById('signupForm');
	const forgotpassForm = document.getElementById('forgotpassForm');
	const forgotpassTrigger = document.getElementById('forgotpass_trigger');
	const forgotpassBack = document.getElementById('forgotpass_back');

	if (!modal) return;

	// Show modal
	window.openLoginModal = function() {
		modal.classList.remove('hidden');
		document.body.style.overflow = 'hidden';
	};

	// Hide modal
	function closeModal() {
		modal.classList.add('hidden');
		document.body.style.overflow = '';
	}

	// Close button and backdrop
	closeBtn.addEventListener('click', closeModal);
	backdrop.addEventListener('click', closeModal);

	// Close on Escape
	document.addEventListener('keydown', function(e) {
		if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
			closeModal();
		}
	});

	// Tab switching
	signinTab.addEventListener('click', function() {
		signinTab.classList.add('text-brand-700', 'border-brand-700');
		signinTab.classList.remove('text-ink-400', 'border-transparent');
		signupTab.classList.remove('text-brand-700', 'border-brand-700');
		signupTab.classList.add('text-ink-400', 'border-transparent');
		signinForm.classList.remove('hidden');
		signupForm.classList.add('hidden');
		forgotpassForm.classList.add('hidden');
	});

	signupTab.addEventListener('click', function() {
		signupTab.classList.add('text-brand-700', 'border-brand-700');
		signupTab.classList.remove('text-ink-400', 'border-transparent');
		signinTab.classList.remove('text-brand-700', 'border-brand-700');
		signinTab.classList.add('text-ink-400', 'border-transparent');
		signinForm.classList.add('hidden');
		signupForm.classList.remove('hidden');
		forgotpassForm.classList.add('hidden');
	});

	// Forgot password toggle
	forgotpassTrigger.addEventListener('click', function() {
		signinForm.classList.add('hidden');
		forgotpassForm.classList.remove('hidden');
	});

	forgotpassBack.addEventListener('click', function() {
		signinForm.classList.remove('hidden');
		forgotpassForm.classList.add('hidden');
	});

	// Form submissions - delegate to existing scripts or AJAX handlers
	document.getElementById('form_signin').addEventListener('submit', function(e) {
		e.preventDefault();
		const username = document.getElementById('signin_username').value;
		const password = document.getElementById('signin_password').value;
		const alertBox = document.getElementById('alert_signin');

		// Call existing login handler or AJAX endpoint
		fetch('ajax_login.php', {
			method: 'POST',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			body: 'user_name=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password) + '&rand=' + Math.random()
		})
		.then(r => r.text())
		.then(res => {
			if (res == 1) {
				alertBox.classList.add('hidden');
				closeModal();
				setTimeout(() => location.reload(), 500);
			} else {
				alertBox.textContent = 'Invalid email or password. Please try again.';
				alertBox.classList.remove('hidden');
			}
		})
		.catch(err => {
			alertBox.textContent = 'An error occurred. Please try again.';
			alertBox.classList.remove('hidden');
		});
	});

	// Signup form - reuse existing registration handler
	document.getElementById('form_signup').addEventListener('submit', function(e) {
		e.preventDefault();
		const username = document.getElementById('signup_username').value;
		const email = document.getElementById('signup_email').value;
		const password = document.getElementById('signup_password').value;
		const alertBox = document.getElementById('alert_signup');

		// Call existing signup handler or AJAX endpoint
		fetch('ajax_signup.php', {
			method: 'POST',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			body: 'name=' + encodeURIComponent(username) + '&email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password) + '&rand=' + Math.random()
		})
		.then(r => r.text())
		.then(res => {
			if (res == 1) {
				alertBox.classList.add('hidden');
				closeModal();
				setTimeout(() => location.reload(), 500);
			} else {
				alertBox.textContent = 'Registration failed. Please check your details and try again.';
				alertBox.classList.remove('hidden');
			}
		})
		.catch(err => {
			alertBox.textContent = 'An error occurred. Please try again.';
			alertBox.classList.remove('hidden');
		});
	});
})();
</script>
{/literal}
