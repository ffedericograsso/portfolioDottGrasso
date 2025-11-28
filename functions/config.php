<?php
// Rileva se siamo su localhost (sviluppo) o in produzione
// Aggiungi '127.0.0.1' per sicurezza se usi quell'IP locale
if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') {
    
    // --- AMBIENTE DI SVILUPPO (Il tuo PC) ---
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');  // Di solito 'root' su XAMPP/MAMP
    define('DB_PASS', '');      // Di solito vuota su XAMPP
    define('DB_NAME', 'articolipapa');

} else {
    
    // --- AMBIENTE DI PRODUZIONE (DigitalOcean) ---
    define('DB_HOST', 'localhost');
    define('DB_USER', 'otorinoGrasso');              // L'utente che hai creato
    define('DB_PASS', '4Jo1St3/1ks^=');  // La password sicura
    define('DB_NAME', 'articolipapa');
    
}
?>