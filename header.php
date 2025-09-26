<div class="name">
    <p class="doctor-name">Dott. Domenico Leonardo Grasso</p>
</div>
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