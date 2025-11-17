<?php require_once("functions/modulo.php");
?>
<html lang="it">
   <head>
        <title>Domenico Leonardo Grasso - Otorino-Laringoiatra</title>
        <link rel="stylesheet" href="css/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  

   </head> 
   <body>
        <?php require_once("header.php"); ?>
        <div id="title">
        </div>
        <div id="content">
        </div>
        <?php require_once("footer.php"); ?>
   </body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const currentURL = window.location.href;
        const url = new URL(currentURL);
        const id = url.searchParams.get("id");

        //descrivi la funzione di escape per sicurezza
        /*
        Funzione per eseguire l'escape di caratteri speciali in HTML
        al fine di prevenire vulnerabilità XSS.
        */
        function escapeHtml(s) {
            return String(s)
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#39;");
        } 

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            try {
                const response = JSON.parse(this.responseText);

                const titleB = document.getElementById("title");
                titleB.innerHTML = "<h1>" + escapeHtml(response.titolo || "") + "</h1>";

                let content = "";
                if (response.path) {
                    content += "<img src='" + escapeHtml(response.path) + "' alt='immagine' style='max-width:100%;height:auto;'>";
                }

                // contenuto: escape, trasforma URL in link e mantiene newline
                const raw = response.contenuto || "";
                const escaped = escapeHtml(raw);

                // regex per URL (semplice)
                const urlRegex = /(https?:\/\/[^\s]+)/g;
                const withLinks = escaped.replace(urlRegex, function(url) {
                    return "<a href=\"" + url + "\" target=\"_blank\" rel=\"noopener noreferrer\">" + url + "</a>";
                });

                // mantieni i ritorni a capo
                const htmlContent = withLinks.replace(/\r\n|\r|\n/g, "<br>");

                content += "<p>" + htmlContent + "</p>";

                const contentB = document.getElementById("content");
                contentB.innerHTML = content;
            } catch (e) {
                console.error("Errore parsing/handling risposta:", e, this.responseText);
            }
        };

        xhttp.open("POST", "../sitopapa/functions/getArticolo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        const postData = "id=" + encodeURIComponent(id || "");
        xhttp.send(postData)
    });
</script>