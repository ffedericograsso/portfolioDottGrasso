<?php require_once("functions/modulo.php"); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Articoli - Dott. Domenico Leonardo Grasso</title>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php require_once("header.php"); ?>
    
    <section class="articles-section">
        <h1 class="section-title">Articoli</h1>
        <p class="section-subtitle">Lista di tutti gli articoli a cui ho preso parte</p>
        
        <!-- Search Bar -->
        <div class="search-container">
            <div class="search-wrapper">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" id="searchInput" class="search-input" placeholder="Cerca articoli per titolo o contenuto...">
                <button id="clearSearch" class="clear-button" style="display: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>

        <div id="content"></div>
    </section>

    <?php require_once("footer.php"); ?>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
        const clearButton = document.getElementById("clearSearch");
        let searchTimeout;

        function loadArticoli(query = "") {
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "functions/getArticoli.php?query=" + encodeURIComponent(query), true);
            xhttp.onload = function() {
                if (this.status === 200) {
                    try {
                        const response = JSON.parse(this.responseText);
                        let articoli = "<table class='tableArticle'>";
                        
                        if (response.titolo.length === 0) {
                            articoli += "<tr><td colspan='2' class='no-results'>Nessun articolo trovato</td></tr>";
                        } else {
                            for (let i = 0; i < response.titolo.length; i++) {
                                let contenuto = response.contenuto[i].substring(0, 100) + "...";
                                articoli += "<tr class='article'>" +
                                    "<td style='width: 70%;'>" +
                                        "<form action='informazioniArticolo.php' method='get'>" +
                                            "<input type='hidden' name='id' value='" + response.id[i] + "'>" +
                                            "<button type='submit' id='bottoneTitolo'>" + response.titolo[i] + "</button>" +
                                        "</form>" +
                                    "</td>" +
                                    "<td style='color: #64748B;'>" + contenuto + "</td>" +
                                "</tr>";
                            }
                        }

                        articoli += "</table>";
                        document.getElementById("content").innerHTML = articoli;
                    } catch (e) {
                        console.error("Errore parsing:", e);
                    }
                } else {
                    console.error("Errore nella richiesta AJAX:", this.status);
                }
            };
            xhttp.send();
        }

        // Search functionality
        searchInput.addEventListener("input", function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();
            
            // Show/hide clear button
            clearButton.style.display = query ? "flex" : "none";
            
            // Debounce search
            searchTimeout = setTimeout(function() {
                loadArticoli(query);
            }, 300);
        });

        // Clear search
        clearButton.addEventListener("click", function() {
            searchInput.value = "";
            clearButton.style.display = "none";
            loadArticoli();
            searchInput.focus();
        });

        // Initial load
        loadArticoli();
    });
    </script>
</body>
</html>