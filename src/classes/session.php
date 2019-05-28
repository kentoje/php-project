<?php 
require_once '../config/bootstrap.php';
?>

<form action="session.php" method="post">
  <label for="pseudo">pseudo</label>
  <input type="text" name="pseudo" id="pseudo">
  <label for="password">mot de passe</label>
  <input type="text" name="password" id="password">
  <input type="submit" name="ajouter" value="envoyer">
</form>

<form action="session.php" method="post">
    <input type="submit" name="disconnected" value="deconnexion">
</form>


<?php

class Session {
  
  private $pseudo;

  public function __construct($pseudo)
  {
    $this->setPseudo($pseudo);
  }

  public function setPseudo($pseudo) {
    $this->_pseudo = $pseudo;
  }

  public function checkUserInDB($pdo) {
    $users = $pdo->query('SELECT * FROM users WHERE pseudo =' . $this->_pseudo);
    $user = $users->fetch(PDO::FETCH_ASSOC);
    echo '<pre>' . print_r($user, true) . '</pre>';
  }

  public function startSession($pdo) {
    if ($this->_pseudo === $this->checkUserInDB($pdo)) {
      $_SESSION['pseudo'] = $this->_pseudo;
      echo '<pre>' . print_r($_SESSION, true) . '</pre>';
    } else {
      echo "pas bon mdp ou pseudo";
    }
  }

  public function destroySession(){
    $this->_pseudo = null;
  }
}


if($_POST ['pseudo']) {

  $users = $db->query('SELECT * FROM users WHERE pseudo = "emilie"');
    $user = $users->fetch(PDO::FETCH_ASSOC);
    echo '<pre>' . print_r($user, true) . '</pre>';

  // $sessionUser = new Session($_POST ['pseudo']); 
  // $sessionUser->startSession($pdo);
}

if($_POST ['disconnected']) {
  unset($sessionUser);
  session_destroy();
}