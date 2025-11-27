<?php
session_set_cookie_params([
    'secure' => true,      // Solo su HTTPS
    'httponly' => true,    // Non accessibile via JS (protegge da XSS)
    'samesite' => 'Strict' // Protegge da CSRF
]);
session_start();
$db = mysqli_connect("localhost","dott","b0RRaCIn2777!?..","articolipapa");
?>