<?php require_once("functions/modulo.php"); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Inserisci Post - Dott. Domenico Leonardo Grasso</title>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php 
    if(!isset($_SESSION['idUtente'])){
        header("Location: post.php");
        exit();
    }
    require_once("header.php"); ?>
    
    <section class="form-section">
        <div class="form-container">
            <div class="form-header">
                <h1 class="form-title">Inserisci Nuovo Post</h1>
                <p class="form-subtitle">Crea un nuovo articolo per il blog</p>
            </div>
            
            <form action="dbArticolo.php" method="post" enctype="multipart/form-data" class="modern-form">
                <div class="form-group">
                    <label for="titolo" class="form-label">
                        <svg class="label-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 7V4h16v3"></path>
                            <path d="M9 20h6"></path>
                            <path d="M12 4v16"></path>
                        </svg>
                        Titolo del Post
                    </label>
                    <input type="text" name="titolo" id="titolo" class="form-input" placeholder="Inserisci il titolo del post" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="contenuto" class="form-label">
                        <svg class="label-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <line x1="10" y1="9" x2="8" y2="9"></line>
                        </svg>
                        Contenuto
                    </label>
                    <textarea name="contenuto" id="contenuto" class="form-textarea" placeholder="Scrivi il contenuto del post..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="immagine" class="form-label">
                        <svg class="label-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        Immagine di Copertina
                    </label>
                    <div class="file-input-wrapper">
                        <input type="file" name="immagine" id="immagine" class="file-input" accept="image/*" required>
                        <label for="immagine" class="file-input-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="17 8 12 3 7 8"></polyline>
                                <line x1="12" y1="3" x2="12" y2="15"></line>
                            </svg>
                            <span>Clicca per selezionare un'immagine</span>
                        </label>
                        <span class="file-name" id="fileName"></span>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="operazione" class="btn-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                            <polyline points="7 3 7 8 15 8"></polyline>
                        </svg>
                        Pubblica Post
                    </button>
                    <a href="post.php" class="btn-cancel">Annulla</a>
                </div>
            </form>
        </div>
    </section>

    <?php require_once("footer.php"); ?>
    
    <script>
        // File input display
        const fileInput = document.getElementById('immagine');
        const fileName = document.getElementById('fileName');
        const fileLabel = document.querySelector('.file-input-label span');
        
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const name = this.files[0].name;
                fileName.textContent = 'File selezionato: ' + name;
                fileLabel.textContent = 'Cambia immagine';
            }
        });
    </script>
</body>
</html>