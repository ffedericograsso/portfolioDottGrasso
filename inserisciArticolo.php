<?php require_once("functions/modulo.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Domenico Leonardo Grasso - Otorino-Laringoiatra</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class = 'header'> <?php require_once("header.php"); ?> </div>
    <div class="content">
    <form action="dbArticolo.php" method="post">
        <p>Inserisci titolo</p>
        <input type = "text" name = "titolo" autocomplete="off" required>

        <br>

        <p>Inserisci contenuto</p>
        <input type = "text" name = "contenuto" autocomplete="off" required>

        <p>Inserisci immagine di copertina:</p>
        <input type="file" name="image" accept="image/*">

        <input name = "operazione" type = "submit" value = "Inserisci Articolo">

        <br><br>
        </form>
    </div>
</body>
</html>