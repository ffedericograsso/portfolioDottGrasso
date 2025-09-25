<?php require_once("functions/modulo.php"); ?>
<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
    $sql = "SELECT * FROM tdati WHERE nomeUtente = '".$_POST['nome']."' AND pw = '".$_POST['pass']."'";
    $verifica = false;
    $rec = mysqli_query($db , $sql);

    if(mysqli_num_rows($rec) == 1) {
        $verifica = true;
        $array = mysqli_fetch_array($rec);
        $_SESSION['idUtente'] = $array['id'];
    }

    if($verifica) {
        header("Location:index.php");
        exit;
    } else {
?>
    <div id="header">
        <?php require_once("header.php"); ?>
    </div>
    <div id="content">
        ACCESSO NEGATO
    </div>
<?php
    }
?>
</body>
</html>
