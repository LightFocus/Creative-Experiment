<?php
// Enforce the use of HTTPS
header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
// Prevent Clickjacking
header("X-Frame-Options: SAMEORIGIN");
// Block Access If XSS Attack Is Suspected
header("X-XSS-Protection: 1; mode=block");
// Prevent MIME-Type Sniffing
header("X-Content-Type-Options: nosniff");
// Referrer Policy
header("Referrer-Policy: no-referrer-when-downgrade");

//header("Content-Security-Policy: script-src 'self'");

//header("Feature-Policy: vibrate 'none'");
?>