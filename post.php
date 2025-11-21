<?php require_once("functions/modulo.php"); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>POST - Dott. Domenico Leonardo Grasso</title>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php require_once("header.php"); ?>
    
    <section class="articles-section">
        <h1 class="section-title">Blog</h1>
        <p class="section-subtitle">Elenco di concetti fondamentali, semplificati per garantirne l'immediata comprensione</p>
        
        <!-- Search Bar -->
        <div class="search-container">
            <div class="search-wrapper">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" id="searchInput" class="search-input" placeholder="Cerca post per titolo o contenuto...">
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

        function loadPosts(query = "") {
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "functions/getPosts.php?query=" + encodeURIComponent(query), true);
            xhttp.onload = function() {
                if (this.status === 200) {
                    try {
                        const response = JSON.parse(this.responseText);
                        let posts = "<table class='tableArticle'>";
                        <?php
                        if(isset($_SESSION['idUtente'])){
                                 echo "posts += '<tr><td colspan=\"2\" style=\"text-align: center; padding: 20px;\"><a href=\"inserisciPost.php\" class=\"btnInserisciArticolo\">INSERISCI POST</a></td></tr>';";
                        }
                        ?>
                        if (response.titolo.length === 0) {
                            posts += "<tr><td colspan='2' class='no-results'>Nessun post trovato</td></tr>";
                        } else {
                            for (let i = 0; i < response.titolo.length; i++) {
                                let contenuto = response.contenuto[i].substring(0, 20) + "...";
                                posts += "<tr class='article'>" +
                                    "<td style='width: 70%;'>" +
                                        "<form action='informazioniPost.php' method='get'>" +
                                            "<input type='hidden' name='id' value='" + response.id[i] + "'>" +
                                            "<button type='submit' id='bottoneTitolo'>" + response.titolo[i] + "</button>" +
                                        "</form>" +
                                    "</td>" +
                                    "<td style='color: #64748B;'>" + contenuto + "</td>" +
                                "</tr>";
                            }
                        }

                        

                        posts += "</table>";
                        document.getElementById("content").innerHTML = posts;
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
                loadPosts(query);
            }, 300);
        });

        // Clear search
        clearButton.addEventListener("click", function() {
            searchInput.value = "";
            clearButton.style.display = "none";
            loadPosts();
            searchInput.focus();
        });

        // Initial load
        loadPosts();
    });
    </script>
</body>
</html>