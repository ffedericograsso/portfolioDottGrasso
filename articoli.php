<?php
     require_once("functions/modulo.php");
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Domenico Leonardo Grasso - Otorino-Laringoiatra</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/listaArticoli.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
</head> 
<body>
    <div class="header">
            <?php require_once("header.php"); ?>
    </div>
    <div class="title">
        <h1>ARTICOLI</h1>
    </div>
    <div id="content"></div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Funzione per caricare tutti gli articoli
            function loadArticoli(query = "") {
                const xhttp = new XMLHttpRequest();
                xhttp.open("POST", "functions/getArticoli.php?query=" + encodeURIComponent(query), true);
                xhttp.onload = function() {
                    if (this.status === 200) {
                        try {
                            const response = JSON.parse(this.responseText);
                            let articoli = "<table class='tableArticle'>";
                            for (let i = 0; i < response.titolo.length; i++) {
                            let contenuto = response.contenuto[i].substring(0,40) + "...";
                            articoli += "<tr class='article'>" +
                                            "<td>" +
                                            "<form action='informazioniArticolo.php' method='get'>" +
                                                "<input type='hidden' name='id' value='" + response.id[i] + "'>" +
                                                "<button type='submit' id='bottoneTitolo'>" + response.titolo[i] + "</button>" +
                                            "</form>" +
                                            "</td>" +
                                            "<td>" + contenuto + "</td>" +
                                        "</tr>";
                            }
<?php
                            if(isset($_SESSION['idUtente'])){
                                echo "articoli += '<tr><td><a href=\"inserisciArticolo.php\" class=\"btnInserisciArticolo\">INSERISCI ARTICOLO</a></td></tr>';";
                            }
                    ?>
articoli += "</table>";
                    document.getElementById("content").innerHTML = articoli;

                        } catch (e) {
                        }
                    } else {
                        console.error("Errore nella richiesta AJAX:", this.status);
                    }
                };
                xhttp.send();
            }

            // Carica articoli inizialmente
            loadArticoli();


        });
    </script>
</body>
</html>
