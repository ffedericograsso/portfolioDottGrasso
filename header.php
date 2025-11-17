<div class="header">
    <div class="links">
        <p><a href="index.php">ABOUT</a></p>
        <p><a href="location.php">DOVE</a></p>
        <p><a href="articoli.php">ARTICOLI</a></p>
        <?php
            $current = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
            if ($current === '' || $current === 'index.php') {
                echo '<a href="#contattiTitolo" class="buttonTitle">PRENOTA UNA VISITA</a>';
            }
            if(isset($_SESSION['idUtente'])){
                echo "<p><a href=\"logout.php\">LOGOUT</a></p>";
            } 
        ?>
    </div>
</div>