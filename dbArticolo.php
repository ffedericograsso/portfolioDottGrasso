<?php
require_once("functions/modulo.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

if (!isset($_FILES['immagine'])) {
    exit('Nessun file inviato. Verifica name="immagine" nel form e enctype="multipart/form-data".');
}

$err = $_FILES['immagine']['error'] ?? UPLOAD_ERR_NO_FILE;
if ($err !== UPLOAD_ERR_OK) {
    $map = [
        UPLOAD_ERR_INI_SIZE => 'Il file supera upload_max_filesize in php.ini.',
        UPLOAD_ERR_FORM_SIZE => 'Il file supera MAX_FILE_SIZE nel form.',
        UPLOAD_ERR_PARTIAL => 'Upload parziale del file.',
        UPLOAD_ERR_NO_FILE => 'Nessun file inviato.',
        UPLOAD_ERR_NO_TMP_DIR => 'Cartella temporanea mancante.',
        UPLOAD_ERR_CANT_WRITE => 'Impossibile scrivere il file su disco.',
        UPLOAD_ERR_EXTENSION => 'Upload bloccato da estensione PHP.'
    ];
    $msg = $map[$err] ?? "Errore upload codice $err";
    exit('Errore upload: ' . $msg);
}

// limiti
$maxFileSize = 5 * 1024 * 1024; // 5 MB
if ($_FILES['immagine']['size'] > $maxFileSize) {
    exit('File troppo grande (max 5 MB).');
}

// verifica sia immagine reale
if (!is_uploaded_file($_FILES['immagine']['tmp_name'])) {
    exit('File temporaneo non valido.');
}

$check = @getimagesize($_FILES['immagine']['tmp_name']);
if ($check === false) {
    exit('Il file caricato non è un\'immagine valida.');
}

// verifica mime e mappa estensioni consentite
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($_FILES['immagine']['tmp_name']);
$allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif', 'image/webp' => 'webp'];

if (!isset($allowed[$mime])) {
    exit('Tipo di immagine non consentito. Consentiti: jpg, png, gif, webp.');
}

$ext = $allowed[$mime];

// genera nome file unico e sicuro
try {
    $filename = bin2hex(random_bytes(16)) . '.' . $ext;
} catch (Exception $e) {
    $filename = time() . '_' . bin2hex(openssl_random_pseudo_bytes(8)) . '.' . $ext;
}

$destDir = __DIR__ . '/img';
if (!is_dir($destDir)) {
    if (!mkdir($destDir, 0755, true)) {
        exit('Impossibile creare la cartella di destinazione.');
    }
}

$destPath = $destDir . '/' . $filename;
$webPath = 'img/' . $filename;

// sposta il file (usa tmp_name da $_FILES)
if (!move_uploaded_file($_FILES['immagine']['tmp_name'], $destPath)) {
    exit('Errore nel salvataggio dell\'immagine.');
}

// prendi titolo/contenuto (sanitizzazione per XSS deve avvenire in output)
$titolo = $_POST['titolo'] ?? '';
$contenuto = $_POST['contenuto'] ?? '';

// inserimento sicuro nel DB
$stmt = $db->prepare("INSERT INTO tpost (titolo, contenuto, pathFoto, dataPubblicazione) VALUES (?, ?, ?, NOW())");
if ($stmt === false) {
    @unlink($destPath);
    exit('Errore prepare DB: ' . $db->error);
}
$stmt->bind_param("sss", $titolo, $contenuto, $webPath);

if ($stmt->execute()) {
    $stmt->close();
    $db->close();
    header("Location: index.php");
    exit();
} else {
    // rimuovi file appena caricato se fallisce l'inserimento DB
    @unlink($destPath);
    $stmt->close();
    $db->close();
    exit('Errore inserimento DB: ' . $db->error);
}
?>