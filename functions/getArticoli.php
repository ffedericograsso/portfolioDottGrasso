<?php
require_once("modulo.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT id, titolo, dataPubblicazione, contenuto FROM tarticolo";
    $rec = mysqli_query($db, $sql);

    $ids = [];
    $titoli = [];
    $date = [];
    $contenuti = [];

    while ($arr = mysqli_fetch_assoc($rec)) {
        $ids[] = $arr['id'];
        $titoli[] = $arr['titolo'];
        $date[] = $arr['dataPubblicazione'];
        $contenuti[] = $arr['contenuto'];
    }

    $result = [
        "id" => $ids,
        "titolo" => $titoli,
        "data" => $date,
        "contenuto" => $contenuti
    ];

    header('Content-Type: application/json');
    echo json_encode($result);
}
?>
