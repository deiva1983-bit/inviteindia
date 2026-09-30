<?php
/**
 * Global Configuration File
 *
 * IMPORTANT: This file contains sensitive credentials and should NOT be committed to git.
 * Add "includes/configs/globalconfigs.php" to .gitignore if not already there.
 *
 * Replace placeholder values with your actual credentials.
 */

/* =====================================================================
   PAYMENT GATEWAY - CCAvenue
   --------------------------------------------------------------------- */
$CC_workingKey = 'A49DF471EC07AB258E0595041DDCE072';
$CC_access_code = 'AVHA85GE53BW26AHWB';
$mid = '52161';

/* =====================================================================
   APPLICATION SETTINGS
   --------------------------------------------------------------------- */
$glb_site_url = 'https://www.inviteindia.com';
$ssl_path = 'https://';

/* Email Configuration */
$email_from = 'noreply@inviteindia.com';
$admin_email = 'support@inviteindia.com';

/* Pricing and Package Settings */
$price_1 = '999';      // Price 1 in INR
$price_2 = '1999';     // Price 2 in INR
$price_3 = '4999';     // Price 3 in INR
$free_price = '0';     // Free plan

$price_usd_1 = '12';   // Price 1 in USD
$price_usd_2 = '24';   // Price 2 in USD
$price_usd_3 = '60';   // Price 3 in USD

/* Wedding Settings */
$max_card_per_acc = '4';
$free_indays = '30';
$glb_convert_free = '7';

/* Domain Settings */
$own_domain_inr_in = '650';
$own_domain_inr_com = '550';
$own_domain_us_in = '8';
$own_domain_us_com = '10';

/* Other Settings */
$common_page_title_end = ' | InviteIndia';
$home_page_notes = 'Create your wedding website in minutes';
$local_add = '0';

/* =====================================================================
   IMPORTANT SECURITY NOTES
   --------------------------------------------------------------------- */
// 1. Update CCAvenue credentials above with your actual values
// 2. Never commit this file to version control
// 3. Keep .gitignore updated to exclude this file
// 4. Use strong, unique values for all credentials
// 5. Rotate credentials if this file is ever exposed
?>
