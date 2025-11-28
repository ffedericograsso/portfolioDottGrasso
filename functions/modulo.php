<?php
require_once(__DIR__ . "/config.php"); 

session_set_cookie_params([
    'secure' => true,      
    'httponly' => true,    
    'samesite' => 'Strict' 
]);
session_start();

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$db) {
    error_log("Errore connessione DB: " . mysqli_connect_error()); 
    die("Errore di connessione al sistema.");
}
?>