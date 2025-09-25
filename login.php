<?php require_once("functions/modulo.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>DOTTOR GRASSO LOGIN</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class = 'header'> <?php require_once("header.php"); ?> </div>
    <div class="content">
    <form action="controllaCredenziali.php" method="post">
        <p>Inserisci nome</p>
        <input type = "text" name = "nome" autocomplete="off" required>

        <br>

        <p>Inserisci password</p>
        <input type = "password" name = "pass" autocomplete="off" required>

        <br>

        <input name = "operazione" type = "submit" value = "Login">

        <br><br>
        </form>
    </div>
</body>
</html>