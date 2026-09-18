<?php
/* =============================================================================
   DISABLED - UNAUTHENTICATED PAYMENT CONFIRMATION ENDPOINT
   -----------------------------------------------------------------------------
   Byte-for-byte the same vulnerability as store/store_payment_callback.php,
   just reachable at a second URL. Both were live, so BOTH had to be closed:

       curl -X POST https://www.inviteindia.com/store_payment_callback.php \
            -d "order_id=123&status=success"

   ...marked order 123 paid. No signature, no secret, no gateway verification.
   Omitting "amount" skipped the amount check entirely, because the guard was
   "if ($amount > 0 && ...)".

   No caller for this file exists anywhere in the codebase. CCAvenue posts to
   pay/ccavResponseHandler.php and PayPal to paypal_res.php, so nothing
   legitimate breaks by refusing requests here.

   See store/store_payment_callback.php for the full explanation and for the
   requirements any future server-to-server callback must meet.

   Having two copies of the same payment endpoint at two URLs is itself the
   underlying problem: this codebase has duplicate payment files (checkout.php
   and store/checkout.php, several ccavResponseHandler_*.php variants, plus
   *_bk.php backups) and a fix applied to one copy silently leaves the others
   exploitable. Consolidating those is listed in the audit.
   ========================================================================== */

http_response_code(410);
header('Content-Type: text/plain; charset=utf-8');
echo "Gone. This endpoint has been disabled for security reasons.\n";
exit;
