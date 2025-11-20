<?php require_once("functions/modulo.php"); ?>
<html lang="it">
   <head>
        <title>Domenico Leonardo Grasso - Otorino-Laringoiatra</title>
        <link rel="stylesheet" href="css/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
   </head> 
   <body>
        <?php require_once("header.php"); ?>
        
        <article class="post-detail-section">
            <div class="post-container">
                <div id="title" class="post-title-container"></div>
                <div id="content" class="post-content-container"></div>
                <div class="post-back-link">
                    <a href="post.php" class="btn-back">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                        Torna ai post
                    </a>
                </div>
            </div>
        </article>

        <?php require_once("footer.php"); ?>
   </body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const currentURL = window.location.href;
        const url = new URL(currentURL);
        const id = url.searchParams.get("id");

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
                titleB.innerHTML = "<h1 class='post-detail-title'>" + escapeHtml(response.titolo || "") + "</h1>";

                let content = "";
                if (response.path) {
                    content += "<div class='post-image-wrapper'><img src='" + escapeHtml(response.path) + "' alt='immagine post' class='post-detail-image'></div>";
                }

                const raw = response.contenuto || "";
                const escaped = escapeHtml(raw);

                const urlRegex = /(https?:\/\/[^\s]+)/g;
                const withLinks = escaped.replace(urlRegex, function(url) {
                    return "<a href=\"" + url + "\" target=\"_blank\" rel=\"noopener noreferrer\" class='post-link'>" + url + "</a>";
                });

                const htmlContent = withLinks.replace(/\r\n|\r|\n/g, "<br>");

                content += "<div class='post-text'>" + htmlContent + "</div>";

                const contentB = document.getElementById("content");
                contentB.innerHTML = content;
            } catch (e) {
                console.error("Errore parsing/handling risposta:", e, this.responseText);
            }
        };

        xhttp.open("POST", "../sitopapa/functions/getPost.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        const postData = "id=" + encodeURIComponent(id || "");
        xhttp.send(postData)
    });
</script>