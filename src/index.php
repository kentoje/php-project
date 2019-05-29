<?php 
require_once 'config/bootstrap.php';
$data = App\Database::$pdo;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="img/favicon.png"
    />
  <link rel="stylesheet" href="./css/style.css">
  <script defer src="./js/main.js"></script>
  <title>Love to go out</title>
</head>
<body>

  <header>
      <nav>
      <?php 
      
      if($_SESSION) {
        ?>
        <ul>
          <li class="button"> <a  href="./actions/disconnection.php"><p>Déconnexion</p></a></li>
          <li class="logo"><img src="./img/logo.png"/></li>
        </ul>
         
        <?php
      } else {
        ?>
        <ul>
          <li id="signin-button" class="button"><p>Inscrivez-vous</p></li>
          <li id="login-button" class="connexion">Se connecter</li>
          <li class="logo"><img src="./img/logo.png"/></li>
        </ul>
        <?php
      }

      ?>
    
      </nav>


      <div class="pop-up" id="signin-form">
        <h1 class="big__title2">Hello Friend !</h1>
        <p>Inscris-toi et reste au courant des évènements cool à Paris</p>
        <form method="post" action="./actions/register.php">
          <input type="text" name="name" placeholder="Nom">
          <input type="text" name="email" placeholder="E-mail">
          <input type="text" name="password" placeholder="Mot de passe">
          <input type="submit" name="submit" value="Envoyer">
          <div id="signin-close" class="close-icon"></div>
        </form>
      </div>

      <div class="pop-up s2" id="login-form">
        <h1 class="big__title2">Hello Friend !</h1>
        <p>Connecte-toi et reste au courant des évènements cool à Paris</p>        
        <form action="./actions/connection.php" method="post">
          <input type="text" name="pseudo" id="pseudo" placeholder="E-mail">
          <input type="text" name="password" id="password" placeholder="Mot de passe">
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
  <?php 
    echo '<pre>' . print_r($_SESSION, true) . '</pre>'; 
  ?>
    <article>
      <div>
        <img src="./img/vangogh.png">
      </div>
      <div>
        <div class="part">
          <h3>Découvrez l'exposition des lumières Van-Gogh</h3>
        </div>
        <div class="part avis">
          <div class="buttonlike">
            <img src="./img/like.png"/>
          </div>  
          <p>97</p>
          <p><a>Voir avis</a></p>
        </div>
        <div class="part">
          <div class="button"><p>Participer</p></div>
        </div>
      </div>    
    </article>

    <div class="comments">
      <?php 
        $result = $data->query('SELECT * FROM comments INNER JOIN users ON comments.id_user = users.id_user');
        $comments = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($comments as $comment) : ?>
          <div class="comment">
            <div class="comment__avatar">
              <img class="avatar"
                src="img/user.jpg"
                alt="user" />
            </div>
            <div class="comment__text">
              <p class="comment__author">
                <?php 
                  echo $comment['pseudo'];
                ?></p>
              <p class="comment__description"><?= $comment['content']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <form action="actions/comment.php" method="post">
        <div class="commentform">
            <div class="commentform__avatar">
            
            </div>
            <input id="comment__input" class="input commentform__field" name="comment"
              placeholder="Ajouter un commentaire..."/>
            <input class="button commentform__button" name="submit" type="submit" value="Envoyer" />
        </div>
      </form>
    </div>

    <form action="like.php" method="post"></form>

    <article>
      <div>
        <img src="./img/welovegreen.jpg">
      </div>
      <div>
        <div class="part">
          <h3>Découvrez le festival we love green</h3>
        </div>
        <div class="part avis">
          <div class="buttonlike">
            <img src="./img/like.png"/>
          </div>  
          <p>77</p>
          <p><a>Voir avis</a></p>
        </div>
        <div class="part">
          <div class="button"><p>Participer</p></div>
        </div>
      </div>    
    </article>

    <article>
      <div>
        <img src="./img/poissonlune.jpg">
      </div>
      <div>
        <div class="part">
          <h3>Découvrez le bar éphémère poisson lune</h3>
        </div>
        <div class="part avis">
          <div class="buttonlike">
            <img src="./img/like.png"/>
          </div>  
          <p>67</p>
          <p><a>Voir avis</a></p>
        </div>
        <div class="part">
          <div class="button"><p>Participer</p></div>
        </div>
      </div>    
    </article>

    <article>
      <div>
        <img src="./img/ocean.jpg">
      </div>
      <div>
        <div class="part">
          <h3>Découvrez la fête de l'ocean 2019 à Paris</h3>
        </div>
        <div class="part avis">
          <div class="buttonlike">
            <img src="./img/like.png"/>
          </div>  
          <p>28</p>
          <p><a>Voir avis</a></p>
        </div>
        <div class="part">
          <div class="button"><p>Participer</p></div>
        </div>
      </div>
  </main>

  <footer>
    <nav>
      <ul>
        <li>Communiquer sur<img src="./img/logo.png"></li>
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