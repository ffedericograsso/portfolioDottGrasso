<?php
require_once("modulo.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['id'])) {
        echo json_encode(["error" => "ID non ricevuto"]);
        exit;
    }

    $id = intval($_POST['id']);

    $sql = "SELECT * FROM tarticolo WHERE id=$id";
    $rec = mysqli_query($db, $sql);

    if (!$rec) {
        echo json_encode(["error" => "Query fallita: " . mysqli_error($db)]);
        exit;
    }

    $result = [];

    if ($arr = mysqli_fetch_assoc($rec)) {
        $result = [
            "id" => $arr['id'],
            "titolo" => $arr['titolo'],
            "data" => $arr['dataPubblicazione'],
            "contenuto" => $arr['contenuto'],
            "path" => $arr['pathFoto']
        ];
    } else {
        $result = ["error" => "Nessun articolo trovato con id=$id"];
    }

    header('Content-Type: application/json');
    echo json_encode($result);
}
?>
