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
        <div id="content"></div>
    </section>

    <?php require_once("footer.php"); ?>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        function loadArticoli(query = "") {
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "functions/getArticoli.php?query=" + encodeURIComponent(query), true);
            xhttp.onload = function() {
                if (this.status === 200) {
                    try {
                        const response = JSON.parse(this.responseText);
                        let articoli = "<table class='tableArticle'>";
                        
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

                        <?php
                        if(isset($_SESSION['idUtente'])){
                            echo "articoli += '<tr><td colspan=\"2\" style=\"text-align: center; padding: 20px;\"><a href=\"inserisciArticolo.php\" class=\"btnInserisciArticolo\">INSERISCI ARTICOLO</a></td></tr>';";
                        }
                        ?>

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

        loadArticoli();
    });
    </script>
</body>
</html>