 <?php
            if (isset($_SESSION['idUtente'])) {
                $user = $_SESSION['idUtente'];
            }
        ?>
<a href="index.php">ABOUT</a>
<a href="location.php">DOVE</a>
<a href="articoli.php">ARTICOLI</a>
<a href="contact.php">CONTATTI</a>
<div id="bottone"></div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let form = "";

    <?php
        if(isset($_SESSION['idUtente'])){
                    echo "form = '<form action=\"logout.php\">".
                        "<input type=\"submit\" value=\"LOGOUT\" id=\"logout\">" .
                    "</form>';";
        }
    ?>

    const bottoneBody = document.getElementById("bottone");
    bottoneBody.innerHTML = form;
    });
</script>