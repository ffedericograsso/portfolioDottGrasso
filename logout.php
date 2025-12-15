<?php 
require_once("functions/modulo.php");
if(isset($_SESSION['idUtente'])){
    unset($_SESSION['idUtente']);
    header("Location:index.php");
    exit();
}
?>