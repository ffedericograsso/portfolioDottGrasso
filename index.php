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

    <section class="bio-section hidden">
        <h2>Chi Sono</h2>
        <p><strong>Nascita:</strong> 24 Ottobre 1968, Catania</p>
        <p><strong>Laurea:</strong> Medicina e Chirurgia, 1994</p>
        <p><strong>Specializzazioni:</strong> Audiologia, Otorinolaringoiatria</p>
        <p style="margin-top: 20px;">Nato a Catania il 24 ottobre 1968, mi sono laureato in Medicina e Chirurgia nel 1994, iniziando un percorso di eccellenza nel campo dell'otorinolaringoiatria.</p>
        <p>Ho conseguito la specializzazione in Audiologia nel 1998 presso l'Università di Catania, approfondendo le competenze nella diagnosi e trattamento dei disturbi uditivi.</p>
        <p>Nel 2002 ho completato la specializzazione in Otorinolaringoiatria presso l'Università degli Studi di Ferrara, consolidando la mia expertise nella cura delle patologie di orecchio, naso e gola.</p>
        <p>Dal 2003 lavoro come dirigente medico presso IRCCS OSPEDALE BURLO GAROFOLO a Trieste.</p>
        <p>Nel 2024 inoltre, ho conseguito un Master in riabilitazione maxillo-facciale presso l'Unicamillus di Roma, ampliando le mie competenze nel trattamento delle disfunzioni maxillo-facciali.</p>
    </section>

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

    <section class="contact-section hidden" id="contattiTitolo">
        <h3>Prenota un Appuntamento</h3>

        <div class="booking-tabs">
            <button class="tab-button active" onclick="showTab('online')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                    <line x1="8" y1="21" x2="16" y2="21"></line>
                    <line x1="12" y1="17" x2="12" y2="21"></line>
                </svg>
                Prenota Online
            </button>
            <button class="tab-button" onclick="showTab('phone')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                Prenota per Telefono
            </button>
        </div>

        <div id="onlineTab" class="tab-content active">
            <div class="miodottore-widget-container">
                <a id="zl-url" class="zl-url" href="https://www.miodottore.it/domenico-leonardo-grasso/otorino/trieste" rel="nofollow" data-zlw-doctor="domenico-leonardo-grasso" data-zlw-type="big_with_calendar" data-zlw-opinion="false" data-zlw-hide-branding="true" data-zlw-saas-only="false" data-zlw-a11y-title="Widget di prenotazione visite mediche">Domenico Leonardo Grasso - MioDottore.it</a>
            </div>
            <p class="widget-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
                Seleziona data e orario disponibili direttamente dal calendario
            </p>
        </div>

        <div id="phoneTab" class="tab-content">
            <p style="color: #64748B; margin-bottom: 20px;">Scegli uno studio per visualizzare il numero di telefono</p>
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
                <option value="Mestre">Centro di medicina MESTRE</option>
            </select>
            <div id="telefono"></div>
        </div>
    </section>

    <?php require_once("footer.php"); ?>

    <!-- MioDottore Widget Script -->
    <script>!function($_x,_s,id){var js,fjs=$_x.getElementsByTagName(_s)[0];if(!$_x.getElementById(id)){js = $_x.createElement(_s);js.id = id;js.src = "//platform.docplanner.com/js/widget.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","zl-widget-s");</script>

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

    function showTab(tabName) {
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });
        document.querySelectorAll('.tab-button').forEach(btn => {
            btn.classList.remove('active');
        });

        // Show selected tab
        if (tabName === 'online') {
            document.getElementById('onlineTab').classList.add('active');
            document.querySelectorAll('.tab-button')[0].classList.add('active');
        } else {
            document.getElementById('phoneTab').classList.add('active');
            document.querySelectorAll('.tab-button')[1].classList.add('active');
        }
    }

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
            case "Mestre":
                numero = "0415322500";
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