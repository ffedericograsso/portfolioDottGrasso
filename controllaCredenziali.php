<html>
    <head>
        <title>Controllo Credenziali</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php
        require_once("functions/modulo.php");

        if (isset($_POST['nome'], $_POST['pass'])) {
            $stmt = $db->prepare("SELECT id, pass FROM tutente WHERE nome = ?");
            $stmt->bind_param("s", $_POST['nome']);
            $stmt->execute();
            $result = $stmt->get_result();

            $verifica = false;
            if($result->num_rows === 1) {
                $array = $result->fetch_assoc();
                // Verifica password hashata
                if (password_verify($_POST['pass'], $array['pass'])) {
                    $verifica = true;
                    $_SESSION['idUtente'] = $array['id'];
                }
            }
            $stmt->close();

            if ($verifica) {
                echo "<h1>LOGIN EFFETTUATO CON SUCCESSO (STOP FORZATO)</h1>";
                echo "Sto salvando questi dati in sessione:<br>";
                echo "<pre>";
                var_dump($_SESSION);
                echo "</pre>";
                die("Mi sono fermato qui per farti leggere.");
                exit;
            } else {
                ?>
                <div class="header">
                    <?php require_once("header.php"); ?>
                </div>
                <div class="content">
                    ACCESSO NEGATO
                </div>
                <?php
            }
        } else {
            ?>
            <div class="header">
                <?php require_once("header.php"); ?>
            </div>
            <div class="content">
                Errore: Compila tutti i campi!
            </div>
            <?php
        }
        ?>
    </body>
</html>