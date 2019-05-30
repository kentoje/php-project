<?php 
require_once 'config/bootstrap.php';
$data = App\Database::$pdo;

if(!isset($_SESSION['mainevent'])) {
  $_SESSION['mainevent'] = 1;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png"/>
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/fonts.css">
  <link rel="stylesheet" href="./css/style.css">
  <script defer src="./js/main.js"></script>

  <title>Love to go out</title>
</head>
<body>

  <header>
      <nav class="site-nav">
        <?php 
          if(isset($_SESSION['name'])) {
        ?>

        <ul>
          <li class="button"><a href="./actions/disconnection.php"><p>Déconnexion</p></a></li>
          <li class="name"><?= $_SESSION['name']->getName(); ?></li>
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
        <h2 class="big__title2">Hello Friend !</h2>
        <p>Inscris-toi et reste au courant des évènements cool à Paris</p>
        <form method="post" action="./actions/register.php">
          <input type="text" name="name" placeholder="Nom">
          <input type="email" name="email" placeholder="E-mail">
          <input type="password" name="password" placeholder="Mot de passe">
          <input type="submit" name="submit" value="Envoyer">
          <div id="signin-close" class="close-icon"></div>
        </form>
      </div>

      <div class="pop-up s2" id="login-form">
        <h2 class="big__title2">Hello Friend !</h2>
        <p>Connecte-toi et reste au courant des évènements cool à Paris</p>        
        <form action="./actions/connection.php" method="post">
          <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
          <input type="password" name="password" id="password" placeholder="Mot de passe">
          <input type="submit" name="ajouter" value="Envoyer">
          <div id="login-close" class="close-icon"></div>
        </form>
      </div>

    <h1>Découvrez les meilleurs évènements sur Paris</h1>
  </header>

  <main>
      <div class="weather">
        <h2 class="weather__city"></h2>
        <h2 class="weather__type"></h2>
        <h2 class="weather__temp"></h2>
      </div>
  <?php 

    $result = $data->prepare('SELECT * FROM events WHERE id_event = :mainevent');
    $result->bindValue(':mainevent', $_SESSION['mainevent']);
    $result->execute();
    $event = $result->fetch(PDO::FETCH_ASSOC);
  ?>

  <div class="main-event">

  <article class="main-event-infos">
    <div class="main-event-header">
      <img src="./img/<?php echo $event['image']?>">
      <div class="main-event-title-section">
        <h3><?php echo $event['title']?></h3>
        <!-- <h4>24 mai - 27 mai</h4> -->
        <div class="part avis">
        <form action="./actions/like.php" method="post">
          <button class="like" type="submit" name="vote" value="<?php echo $event['id_event'] ?>"><img src="img/like.png" alt=""></button>
          <span class="number">
            <?php
              $res = $data->prepare('SELECT COUNT(id_user) FROM likes WHERE id_event = :idevent');
              $res->bindValue(':idevent', $_SESSION['mainevent']);
              $res->execute();
              $number = $res->fetch();
              echo $number[0];
            ?>
          </span>
        </form>

        <form action="./actions/dislike.php" method="post">
          <button class="like" type="submit" name="vote" value="<?php echo $event['id_event'] ?>"><img src="img/dislike.png" alt=""></button>
          <span class="number">
            <?php
              $res = $data->prepare('SELECT COUNT(id_user) FROM dislikes WHERE id_event = :idevent');
              $res->bindValue(':idevent', $_SESSION['mainevent']);
              $res->execute();
              $number = $res->fetch();
              echo $number[0];
            ?>
          </span>
        </form>


        </div>
        <div class="button"><a href="<?php echo $event['site']?>" target="_blank">Informations</a></div>
      </div>
    </div>

    <p class="event-description"><?php echo $event['description']?></p>
  </article>

    <div class="comments">
      <h2>Commentaires</h2>
      <?php 
        $result = $data->prepare("SELECT * FROM comments INNER JOIN users ON comments.id_user = users.id_user WHERE comments.id_event = :mainevent ORDER BY date_post");
        $result->bindValue(':mainevent', $_SESSION['mainevent']);
        $result->execute();
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
                <span class="post-date"><?php echo date('d-m-Y', strtotime($comment['date_post'])) ?></span>
              <p class="comment__description"><?= $comment['content']; ?></p>
              <?php 
                if(isset($_SESSION['name'])) {
                  if ($_SESSION['name']->getName() == $comment['pseudo']) {
                    ?>
                    <form class="delete-post" method="post" action="./actions/deletecomment.php">
                      <button class="button__tooling" type="submit" name="deletecomment" value="<?php echo $comment['id_comment']?>">Supprimer</button>
                    </form>

                    <form class="delete-post" method="post" action="./pages/edit.php">
                      <button class="button__tooling button__tooling--bottom" type="submit" name="editcomment" value="<?php echo $comment['id_comment']?>">Éditer</button>
                    </form>
                    
                    <?php
                  }
                }
              ?>
            </div>
          </div>
        <?php endforeach; ?>
        
      <form action="actions/comment.php" method="post">
        <div class="commentform">
            <div class="commentform__avatar">
            </div>
            <textarea id="comment__input" class="input commentform__field" name="comment"
              placeholder="Ajouter un commentaire..." width="800"></textarea>
            <input class="button commentform__button" name="submit" type="submit" value="Envoyer" />
        </div>
      </form>
    </div>

    </div>

    <?php 
      $result = $data->prepare('SELECT * FROM events WHERE id_event != :mainevent');
      $result->bindValue(':mainevent', $_SESSION['mainevent']);
      $result->execute();
      $events = $result->fetchAll(PDO::FETCH_ASSOC);
      foreach ($events as $event) : 
    ?>

    <article class="other-event">
      <div>
          <img src="./img/<?php echo $event['image'] ?>">
        </a>
      </div>
      <div>
        <div class="part">
          <h3><?php echo $event['title'] ?></h3>
        </div>



        <div class="part avis marwane">
          <div class="like"><img src="img/like.png" alt=""></div>
          <span class="number">
            <?php
              $res = $data->prepare('SELECT COUNT(id_user) FROM likes WHERE id_event = :idevent');
              $res->bindValue(':idevent', $event['id_event']);
              $res->execute();
              $number = $res->fetch();
              echo $number[0];
            ?>
          </span>
       
          <div class="like"><img src="img/dislike.png" alt=""></div>
          <span class="number">
            <?php
              $res = $data->prepare('SELECT COUNT(id_user) FROM dislikes WHERE id_event = :idevent');
              $res->bindValue(':idevent', $event['id_event']);
              $res->execute();
              $number = $res->fetch();
              echo $number[0];
            ?>
          </span>
        </div>


        <form method="post" action="./actions/event.php">
          <button class="button__event" type="submit" name="mainevent" value="<?php echo $event['id_event'] ?>">Voir</button>
        </form>
      </div>    
    </article>
    <?php endforeach; ?>
  </main>

  <footer>
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