<div class="header">
    <div class="links">
        <p><a href="index.php">ABOUT</a></p>
        <p><a href="location.php">DOVE</a></p>
        <p><a href="articoli.php">ARTICOLI</a></p>
        <?php
            if(isset($_SESSION['idUtente'])){
                echo "<p><a href=\"logout.php\">LOGOUT</a></p>";
            } 
        ?>
    </div>
</div>