<?php require_once("functions/modulo.php");
?>
<html lang="it">
   <head>
        <title>Domenico Leonardo Grasso - Otorino-Laringoiatra</title>
        <link rel="stylesheet" href="css/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  

   </head> 
   <body>
        <div class="header">
            <?php require_once("header.php"); ?>
        </div>
        <div id="title">
        </div>
        <div id="content">
        </div>
   </body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const currentURL = window.location.href;
        const url = new URL(currentURL);
        const id = url.searchParams.get("id");
      
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            console.log(this.responseText);
            const response = JSON.parse(this.responseText);
            let title = "";
            title = title + "<h1>"+ response.titolo + "</h1>";
            const titleB = document.getElementById("title");
            titleB.innerHTML = title;

            let content = "";
            if(response.path != ""){
                content = content + "<img src='"+ response.path + "' alt='prova'>";
            }
            content = content + "<p>" + response.contenuto + "</p>";
            const contentB = document.getElementById("content");
            contentB.innerHTML = content;
        };

        xhttp.open("POST", "../sitopapa/functions/getArticolo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        const postData = "id=" + id;

        xhttp.send(postData)
    });
</script>