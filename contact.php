<?php require_once("functions/modulo.php"); ?>
<html lang="it">
   <head>
        <title>Domenico Leonardo Grasso - Otorino-Laringoiatra</title>
        <link rel="stylesheet" href="css/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  

   </head> 
   <body>
        <div class="header">
            <?php require_once("header.php"); ?>
        </div>
        <div class="title">
            <h1>CHIAMA PER UN APPUNTAMENTO</h1>
        </div>
        <div class="contentContact">
            <select id="menu" onchange="mostraTelefono()">
                <option value="">Scegli un'opzione </option>
                <option value="Trieste">Studio privato TRIESTE</option>
                <option value="Conegliano">Centro di medicina CONEGLIANO</option>
                <option value="Treviso">Centro di medicina TREVISO</option>
                <option value="SanDona">Centro di medicina SAN DONA' DI PIAVE</option>
                <option value="Palmanova">Poliambulatorio San Marco PALMANOVA</option>
                <option value="Martignacco">Poliambulatorio Specialistico Citta' della Salute MARTIGNACCO</option>
                <option value="Pordenone">Centro di medicina PORDENONE</option>
                <option value="Monfalcone">Domus Sanitatis MONFALCONE</option>
                <option value="Gorizia">Nova Salus GORIZIA</option>
            </select>

            <div id="telefono"></div>

            <script>
                function mostraTelefono() {
                const menu = document.getElementById("menu").value;
                const telefono = document.getElementById("telefono");

                let numero = "";
                switch (menu) {
                    case "Trieste":
                    numero = "+393519646074";
                    break;
                    case "Conegliano":
                    numero = "+39043866191";
                    break;
                    case "Treviso":
                    numero = "+390422698111";
                    break;
                    case "SanDona":
                    numero = "+390421222221";
                    break;
                    case "Palmanova":
                    numero = "+390432924814";
                    break;
                    case "Martignacco":
                    numero = "+3904321833574";
                    break;
                    case "Pordenone":
                    numero = "+390434554130";
                    break;
                    case "Monfalcone":
                    numero = "+390481496077";
                    break;
                    case "Gorizia":
                    numero = "+390481547073";
                    break;
                    default:
                    numero = "";
                }

                telefono.innerHTML = numero 
                    ? `<a href="tel:${numero}"> ${numero}</a>` 
                    : "";
                }
        </script>
        </div>
   </body>
</html>