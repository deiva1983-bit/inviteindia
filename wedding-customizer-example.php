<?php
/**
 * Wedding Invitation Customizer Example Page
 *
 * File: wedding-customizer-example.php
 * Description: Complete example showing how to integrate the global header and
 *              wedding invitation builder on your pages
 *
 * Usage: Access this page at https://www.inviteindia.com/wedding-customizer-example.php
 */

// Include the global header component
include_once('includes/global-header.php');

// Configuration for this page
$pageConfig = [
    'page_title' => 'Interactive Wedding Invitation Builder | InviteIndia',
    'page_desc' => 'Create and customize your wedding invitation with our interactive builder. Choose from multiple themes, customize colors, fonts, and add special features.',
    'page_keywords' => 'wedding invitation builder, customize invitation, wedding design, interactive invitation creator',
    'canonical_url' => 'https://www.inviteindia.com/wedding-customizer-example.php',
    'current_nav' => 'themes',
    'show_auth' => isset($_SESSION['sess_user_id']) && !empty($_SESSION['sess_user_id']) ? 1 : 0
];

// Render the global header (includes navigation, modals, styles, and scripts)
renderGlobalHeader(null, $pageConfig);
?>

<!-- Main Content Section -->
<main style="padding: 40px 20px; background: #f5f5f5;">
    <div class="container">
        <div class="page-header" style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-size: 42px; font-weight: 700; color: #333; margin: 0 0 15px 0;">
                Create Your Perfect Wedding Invitation
            </h1>
            <p style="font-size: 16px; color: #666; margin: 0;">
                Design, customize, and share your beautiful wedding invitation in minutes
            </p>
        </div>

        <!-- Wedding Invitation Builder Container -->
        <div id="wedding-builder-root"></div>
    </div>
</main>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Import the Wedding Invitation Builder -->
<script src="<?php echo isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'; ?>://<?php echo $_SERVER['HTTP_HOST']; ?>/static/js/wedding-invitation-builder.js"></script>

<!-- Initialize the Builder -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Create an instance of the Wedding Invitation Builder
    const builder = new WeddingInvitationBuilder('wedding-builder-root');

    // Optional: Add custom event handlers or data
    console.log('Wedding Invitation Builder initialized successfully');

    // Example: Load invitation data from localStorage (for persistence)
    const savedData = localStorage.getItem('wedding-invitation-data');
    if (savedData) {
        try {
            builder.data = JSON.parse(savedData);
            builder.render();
            builder.setupEventListeners();
            builder.updatePreview();
            console.log('Loaded saved invitation data');
        } catch (e) {
            console.warn('Could not load saved data:', e);
        }
    }

    // Save data to localStorage when user makes changes (debounced)
    let saveTimeout;
    const autoSave = () => {
        clearTimeout(saveTimeout);
        saveTimeout = setTimeout(() => {
            localStorage.setItem('wedding-invitation-data', JSON.stringify(builder.data));
            console.log('Invitation data saved');
        }, 2000);
    };

    // Hook into updates (you can enhance the builder to emit events)
    const originalUpdatePreview = builder.updatePreview.bind(builder);
    builder.updatePreview = function() {
        originalUpdatePreview();
        autoSave();
    };
});
</script>

<!-- Footer -->
<?php include_once('templates/default/footer.tpl'); ?>

</html>
