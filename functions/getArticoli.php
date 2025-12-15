<?php
require_once("modulo.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = isset($_GET['query']) ? trim($_GET['query']) : '';
    
    if (!empty($query)) {
        $searchTerm = '%' . $db->real_escape_string($query) . '%';
        $sql = "SELECT id, titolo, contenuto FROM tarticolo 
                WHERE titolo LIKE ? OR contenuto LIKE ? 
                ORDER BY id DESC";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $rec = $stmt->get_result();
    } else {
        $sql = "SELECT id, titolo, contenuto FROM tarticolo ORDER BY id DESC";
        $rec = mysqli_query($db, $sql);
    }

    $ids = [];
    $titoli = [];
    $contenuti = [];

    while ($arr = mysqli_fetch_assoc($rec)) {
        $ids[] = $arr['id'];
        $titoli[] = $arr['titolo'];
        $contenuti[] = $arr['contenuto'];
    }

    $result = [
        "id" => $ids,
        "titolo" => $titoli,
        "contenuto" => $contenuti
    ];

    header('Content-Type: application/json');
    echo json_encode($result);
}
?>