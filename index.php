<?php require_once("functions/modulo.php"); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dott. Domenico Leonardo Grasso - Otorinolaringoiatra</title>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Specialista in Otorinolaringoiatria e Audiologia. Diagnosi e trattamento delle patologie di orecchio, naso e gola.">
</head>
<body>
    <?php require_once("header.php"); ?>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Dott. Domenico Leonardo Grasso</h1>
                <p class="subtitle">Specialista in Otorinolaringoiatria</p>
                <p>Otorinolaringoiatra con esperienza pluriennale in audiologia e chirurgia ORL. Specializzato in diagnosi e trattamento delle patologie dell'orecchio, naso e gola.</p>
                <div class="hero-buttons">
                    <a href="#contattiTitolo" class="btn-primary">Prenota una Visita</a>
                    <a href="pdf/cv_dottGrasso.pdf" target="_blank" class="btn-secondary">Curriculum</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="img/fotoPapa.png" alt="Dott. Domenico Leonardo Grasso" id="fotoProfilo">
            </div>
        </div>
    </section>

    <!-- Biography Section -->
    <section class="bio-section hidden">
        <h2>Chi Sono</h2>
        <p><strong>Nascita:</strong> 24 Ottobre 1968, Catania</p>
        <p><strong>Laurea:</strong> Medicina e Chirurgia, 1994</p>
        <p><strong>Specializzazioni:</strong> Audiologia, Otorinolaringoiatria</p>
        <p style="margin-top: 20px;">Nato a Catania il 24 ottobre 1968, mi sono laureato in Medicina e Chirurgia nel 1994, iniziando un percorso di eccellenza nel campo dell'otorinolaringoiatria.</p>
        <p>Ho conseguito la specializzazione in Audiologia nel 1998 presso l'Università di Catania, approfondendo le competenze nella diagnosi e trattamento dei disturbi uditivi.</p>
        <p>Nel 2002 ho completato la specializzazione in Otorinolaringoiatria presso l'Università degli Studi di Ferrara, consolidando la mia expertise nella cura delle patologie di orecchio, naso e gola.</p>
        <p>Nel 2024 inoltre, ho conseguito un Master in riabilitazione maxillo-facciale presso l'Unicamillus di Roma, ampliando le mie competenze nel trattamento delle disfunzioni maxillo-facciali.</p>
    </section>

    <!-- Services Section -->
    <section class="services-section hidden">
        <h2 class="section-title">Servizi Offerti</h2>
        <p class="section-subtitle">Diagnosi e trattamento completo per tutte le patologie otorinolaringoiatriche</p>
        
        <div class="services-grid">
            <div class="service-card">
                <span class="service-icon">🔊</span>
                <h3>Audiometria</h3>
                <p>Esame non invasivo che permette di valutare la capacità uditiva attraverso l'utilizzo di un audiometro che emette suoni a diverse frequenze e intensità.</p>
            </div>

            <div class="service-card">
                <span class="service-icon">🔬</span>
                <h3>Endoscopia ORL</h3>
                <p>Procedura medica per esaminare le vie respiratorie superiori (naso, gola e laringe) attraverso l'endoscopio. Utilizzata per diagnosticare sinusiti, otiti, laringiti e polipi nasali.</p>
            </div>

            <div class="service-card">
                <span class="service-icon">👶</span>
                <h3>Visita ORL Pediatrica</h3>
                <p>Esame clinico su neonati, bambini e adolescenti per verificare la presenza di eventuali patologie dell'orecchio, del naso e della gola. Esame indolore e non invasivo.</p>
            </div>

            <div class="service-card">
                <span class="service-icon">🗣️</span>
                <h3>Visita Foniatrica</h3>
                <p>Valutazione, diagnosi e trattamento dei disturbi della voce, del linguaggio e della comunicazione. Esame delle corde vocali, respirazione e muscolatura vocale.</p>
            </div>

            <div class="service-card">
                <span class="service-icon">👂</span>
                <h3>Visita ORL Completa</h3>
                <p>Valutazione completa della salute dell'orecchio, del naso e della gola utilizzando strumentazione moderna e precisa per diagnosi accurate.</p>
            </div>

            <div class="service-card">
                <span class="service-icon">✅</span>
                <h3>Approccio Personalizzato</h3>
                <p>Trattamento su misura per ogni paziente con assistenza continua nel percorso di cura e follow-up dedicato.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section hidden" id="contattiTitolo">
        <h3>Prenota un Appuntamento</h3>
        <p style="color: #64748B; margin-bottom: 30px;">Contattami per fissare una visita o per maggiori informazioni sui servizi offerti</p>
        
        <select id="menu" onchange="mostraTelefono()">
            <option value="">Scegli uno studio</option>
            <option value="Trieste">Studio privato TRIESTE</option>
            <option value="Conegliano">Centro di medicina CONEGLIANO</option>
            <option value="Treviso">Centro di medicina TREVISO</option>
            <option value="SanDona">Centro di medicina SAN DONA' DI PIAVE</option>
            <option value="Palmanova">Poliambulatorio San Marco PALMANOVA</option>
            <option value="Martignacco">Poliambulatorio Specialistico Città della Salute MARTIGNACCO</option>
            <option value="Pordenone">Centro di medicina PORDENONE</option>
            <option value="Monfalcone">Domus Sanitatis MONFALCONE</option>
            <option value="Gorizia">Nova Salus GORIZIA</option>
        </select>
        <div id="telefono"></div>
    </section>

    <?php require_once("footer.php"); ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const hiddenElements = document.querySelectorAll('.hidden');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, { threshold: 0.1 });

        hiddenElements.forEach(el => observer.observe(el));
    });

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
            ? `<a href="tel:${numero}">${numero}</a>` 
            : "";
    }
    </script>
</body>
</html>