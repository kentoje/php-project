<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/style.css">
  <script defer src="./js/main.js"></script>
  <title>PHP Project</title>
</head>
<body>

  <header>
      <nav>
        <ul>
          <li id="signin-button" class="button"><p>Inscrivez-vous</p></li>
          <li id="login-button">Se connecter</li>
          <li class="logo"><img src="./img/logo.png"/></li>
        </ul>
      </nav>
      <div class="pop-up" id="signin-form">
        <h1 class="big__title2">Hello Friend !</h1>
        <p>Inscris-toi et restes au courant des évènements cool à Paris</p>
        <form method="post" action="./actions/register.php">
          <input type="text" name="name" placeholder="Nom">
          <input type="text" name="email" placeholder="E-mail">
          <input type="password" name="password" placeholder="Mot de passe">
          <input type="submit" name="submit" value="Envoyer">
          <div id="signin-close" class="close-icon"></div>
        </form>
      </div>

      <div class="pop-up s2" id="login-form">
        <h1 class="big__title2">Hello Friend !</h1>
        <p>Connecte-toi et restes au courant des évènements cool à Paris</p>        
        <form action="./actions/connection.php" method="post">
          <input type="text" name="pseudo" id="pseudo" placeholder="E-mail">
          <input type="password" name="password" id="password" placeholder="Mot de passe">
          <input type="submit" name="ajouter" value="Envoyer">
          <div id="login-close" class="close-icon"></div>
        </form>
      </div>

    <h1 class="big__title">Découvrez les meilleurs évènements de la journée avec love to go out</h1>
  </header>

  <nav class="categorie">
      <ul>
        <li class="button">Évènements phare</li>
        <li>Expositions</li>
        <li>Théatre</li>
        <li>Concerts</li>
        <li>Feu d'artifice</li>
      </ul>
    </nav>

  <main>
    <!-- <?php /* var_dump($_SESSION); */ ?> -->
    <article>
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
    <form action="./actions/comment.php" method="post">
      <label for="comment">Comment</label>
      <input type="text" name="comment">
      <button type="submit">Submit</button>
    </form>
    <article>
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

    <article>
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

    <article>
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
  </main>

  <footer>
    <nav>
      <ul>
        <li>Communiquer sur<img classe="img" src="./img/logo.png"></li>
        <li>Réfèrencier votre lieu ou évènement</li>
        <li>Autres demandes</li>
      </ul>
    </nav>
    
    <nav>
      <ul class="socialnetwork">
        <li><img src="./img/facebook.png"/></li>
        <li><img src="./img/pinterest.png"/></li>
        <li><img src="./img/twitter.png"/></li>
      </ul>
    </nav>
    
  </footer>  
</body>
</html>