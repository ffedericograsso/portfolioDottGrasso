<?php
    require_once("functions/modulo.php");
    $date = date("Y-m-d H:i:s");
    $dest = "img/".$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $dest);
    $sql = "INSERT INTO tarticolo (dataPubblicazione, pathFoto, titolo, contenuto) 
            VALUES ('".$date."','".$dest."','".$_POST['titolo']."','".$_POST['contenuto']."')";
    if (mysqli_query($db, $sql)) {
        echo "<script type='text/javascript'>"; 
        echo "window.location='articoli.php';"; 
        echo "</script>";
    }
?>