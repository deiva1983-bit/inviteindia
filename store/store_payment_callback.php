<?php
/* =============================================================================
   DISABLED - UNAUTHENTICATED PAYMENT CONFIRMATION ENDPOINT
   -----------------------------------------------------------------------------
   THE VULNERABILITY (critical, and it was live):
   This endpoint accepted a plain POST and marked any order as paid. It had no
   signature check, no shared secret, no gateway IP allowlist, and no callback
   to the gateway to verify the transaction actually happened. Anyone on the
   internet could run:

       curl -X POST https://www.inviteindia.com/store/store_payment_callback.php \
            -d "order_id=123&status=success&gateway=ccavenue&txn_id=anything"

   ...and order 123 became payment_status='paid', order_status='processing'.
   Free goods, repeatable, for any order id.

   The amount check that was on line 34 did not help, because it read:

       if ($amount > 0 && abs($amount - $expectedAmount) > 0.01) { reject }

   Omitting the amount parameter entirely made $amount = 0, so the first
   condition was false and the whole check was skipped.

   WHY IT IS SAFE TO TURN OFF:
   A search of the whole codebase found NO caller for this file - not in the
   store flow, not in checkout.php, not in the CCAvenue or PayPal handlers.
   CCAvenue posts its result to pay/ccavResponseHandler.php, and PayPal to
   paypal_res.php. This file was dead code that only an attacker would ever
   reach, so failing closed removes the hole and changes nothing legitimate.

   IF YOU DO NEED A SERVER-TO-SERVER CALLBACK LATER, it must have all of:
     1. An HMAC signature over the raw request body, using a secret shared with
        the caller, compared with hash_equals() - never ==.
     2. Amount verified against orders.total_amount with NO "skip if zero"
        branch - a missing amount must be a hard rejection.
     3. Idempotency: reject if the order is already paid, and store a unique
        index on payments.transaction_id so a replayed callback cannot create a
        second payment row.
     4. Verification against the gateway's own status API before trusting the
        payload, which is the only thing that actually proves money moved.
     5. Prepared statements throughout (see note in the audit about addslashes).
   ========================================================================== */

http_response_code(410);
header('Content-Type: text/plain; charset=utf-8');
echo "Gone. This endpoint has been disabled for security reasons.\n";
exit;
