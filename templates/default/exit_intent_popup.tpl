{* Exit-intent popup - triggers when user moves mouse to close the page *}

<div id="exitPopup" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4" style="background: rgba(0,0,0,0.6);">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 relative">
        <!-- Close button -->
        <button onclick="closeExitPopup()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl leading-none">
            ×
        </button>

        <!-- Main content -->
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Wait! Don't leave yet</h2>
            <p class="text-gray-600 mb-6">Get your free wedding website in 10 minutes. Join thousands of happy Indian couples.</p>

            <!-- Social proof -->
            <div class="bg-blue-50 rounded-lg p-4 mb-6 text-sm">
                <div class="flex items-center justify-center gap-2 mb-2">
                    <span class="text-yellow-400">★★★★★</span>
                </div>
                <p class="text-gray-700 italic">"Created our wedding site in 15 minutes. Guests loved the WhatsApp share!"</p>
                <p class="text-gray-600 text-xs mt-2">- Priya & Rahul, Bangalore</p>
            </div>

            <!-- Quick form -->
            <form id="exitPopupForm" class="space-y-3 text-left">
                <div>
                    <input type="text" id="exitName" name="couple_name" placeholder="Your names" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <input type="email" id="exitEmail" name="email" placeholder="Email address" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                    Get Free Wedding Website
                </button>
            </form>

            <p class="text-xs text-gray-500 mt-4">No credit card needed • Takes 2 minutes</p>
        </div>
    </div>
</div>

{literal}
<script>
let exitPopupShown = false;

// Detect exit intent
document.addEventListener('mouseleave', function(e) {
    if (e.clientY <= 0 && !exitPopupShown) {
        showExitPopup();
    }
});

// Also trigger on ESC key (browser might be closing)
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && !exitPopupShown) {
        // Don't auto-show on ESC, only on mouse leaving
    }
});

function showExitPopup() {
    if (exitPopupShown) return;
    exitPopupShown = true;

    const popup = document.getElementById('exitPopup');
    if (popup) {
        popup.classList.remove('hidden');
    }
}

function closeExitPopup() {
    const popup = document.getElementById('exitPopup');
    if (popup) {
        popup.classList.add('hidden');
    }
}

// Handle exit popup form submission
const exitForm = document.getElementById('exitPopupForm');
if (exitForm) {
    exitForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const coupleName = document.getElementById('exitName').value;
        const email = document.getElementById('exitEmail').value;

        const formData = new FormData();
        formData.append('couple_name', coupleName);
        formData.append('email', email);
        formData.append('phone', '');
        formData.append('wedding_date', '');

        fetch('save_lead.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to signup
                window.location.href = 'signup.php';
            } else {
                alert(data.error || 'Error saving lead');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            window.location.href = 'signup.php';
        });
    });
}

// Close popup when clicking outside
document.getElementById('exitPopup').addEventListener('click', function(e) {
    if (e.target === this) {
        closeExitPopup();
    }
});
</script>
{/literal}
