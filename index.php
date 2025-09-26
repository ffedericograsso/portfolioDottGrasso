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
            <h1>Dott. Domenico Leonardo Grasso - Otorino Laringoiatra</h1>
            <img src="https://cittasalute.it/wp-content/uploads/2023/01/grasso-1.jpg" alt="fotoProfilo" id="fotoProfilo">
            <a href="contact.php" class="button">PRENOTA UNA VISITA</a>
        </div>
        <div class="content">
            <h2>Biografia</h2>
            <p>Nato a Catania il 24 ottobre 1968, si e' laureato in Medicina e Chirurgia nel 1994. Ha conseguito la specializzazione in Audiologia nel 1998 presso l'Università di Catania e in Otorinolaringoiatria nel 2002 presso l'Università degli Studi di Ferrara</p>
            <a href="pdf/cv_dottGrasso.pdf" target="_blank" class="cv">CURRICULUM</a>
            <h2 class="hidden">Tipi di visite</h2>
            <p><div class="tipiVisita hidden"><b>Audiometria</b><br>
              L'audiometria e' un esame non invasivo che permette di valutare la capacita' uditiva di un individuo. Viene eseguita utilizzando un apparecchio chiamato audiometro, che emette suoni a diverse frequenze e intensita'. Durante l'esame, il paziente deve segnalare ogni volta che sente il suono emesso.<br></div>
             
              <div class="tipiVisita hidden"><b>Endoscopia ORL</b><br>
              L'endoscopia ORL e' una procedura medica che permette di esaminare le vie respiratorie superiori, ovvero naso, gola e laringe, attraverso l'utilizzo di uno strumento chiamato endoscopio. Questa tecnica e' utilizzata per diagnosticare e valutare varie patologie, come ad esempio sinusiti, otiti, laringiti, polipi nasali e molto altro. L'esame e' semplice, indolore e non invasivo.<br></div>

              <div class="tipiVisita hidden"><b>Visita ORL pediatrica</b><br>
              La visita ORL pediatrica e' un esame clinico che viene eseguito dal medico specialista in otorinolaringoiatria su neonati, bambini e adolescenti. Durante la visita, il dottore esegue una serie di esami per verificare la presenza di eventuali patologie dell'orecchio, del naso e della gola. L'esame e' indolore e non invasivo.<br></div>

              <div class="tipiVisita hidden"><b>Visita Foniatrica</b><br>
              La visita foniatrica e' un esame medico specialistico che si occupa della valutazione, diagnosi e trattamento dei disturbi della voce, del linguaggio e della comunicazione. Durante la visita, il dottore esamina le corde vocali, la respirazione, la postura e la muscolatura coinvolta nella produzione della voce. Inoltre, valuta anche le abilita' linguistiche e comunicative del paziente, al fine di individuare eventuali difficolta' o disturbi.<br></div>

              <div class="tipiVisita hidden"><b>Visita ORL</b><br>
              La visita otorinolaringoiatrica, o visita ORL, e' una prestazione medica che permette di valutare la salute dell'orecchio, del naso e della gola. Durante la visita, il dottore effettua una valutazione completa delle strutture dell'area testa e collo, utilizzando strumenti specifici per l'ispezione e l'esame funzionale.<br></div>

        </div>
   </body>
</html>
<script>
  const hiddenElements = document.querySelectorAll('.hidden');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show');
      }
    });
  }, { threshold: 0.1 });

  hiddenElements.forEach(el => observer.observe(el));
</script>