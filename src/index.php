<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./scss/style.scss">
  <script defer src="./js/main.js"></script>
  <title>PHP Project</title>
</head>
<body>
  <header>
      <nav>
        <ul>
          <li>Food & Drink</li>
          <li>Soirées</li>
          <li>Expositions</li>
          <li>Home</li>
          <li class="logo"><img src="../img/logo.png"/></li>
        </ul>
      </nav>
    <h1 class="big__title">Découvrez les meilleurs évènements de la journée avec love to go out</h1>
  </header>
  <main>
    <h2>Évènement phare</h2>
    <article class="today">
      <div>
        <img src="./img/today.png">
      </div>
      <div>
        <div class="part">
          <h3>Découvrez l'exposition des lumières Van-Gogh</h3>
        </div>
        <div class="part avis">
          <div class="buttonlike">
            <img src="./img/like.png"/>
          </div>  
          <p>40</p>
          <P>Voir avis</p>
        </div>
        <div class="part">
          <div class="button"><p>Participer</p></div>
        </div>
      </div>    
    </article>
  </main>
  <?php 
    /* Ceci est un test et il marche plutôt bien ! :) */
    include('classes/test.class.php');
    $groot = new Humain();
    $groot->setNom('Groot');
    echo $groot->getNom();
  ?>
</body>
</html>