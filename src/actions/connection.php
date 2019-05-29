<?php 
require_once '../config/bootstrap.php';
$data = App\Database::$pdo;

if($_POST['pseudo'] && $_POST['password']) {

  //check for existing user in DB
  $pseudo = $_POST['pseudo'];
  $password = $_POST['password'];  

  $users = $data->prepare('SELECT pseudo FROM users WHERE pseudo = :pseudo');
  $users->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
  $users->execute();
  $user = $users->fetch(PDO::FETCH_ASSOC);


  if (isset($user)) {
    $hash = $data->prepare('SELECT password FROM users WHERE pseudo = :pseudo');
    $hash->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $hash->execute();
    $hashPass = $hash->fetch(PDO::FETCH_ASSOC);
    $hashPass = $hashPass['password'];

    if ( password_verify($password , $hashPass )) {
      $_SESSION['name'] = $user['pseudo'];
      header( 'location: ../index.php' );
    } else {
      echo "mauavais mdp";
    }
  } else {
    echo "cet identifiant n'existe pas";
  }
}

if($_POST ['disconnected']) {
  unset($sessionUser);
  session_destroy();
  header( 'location: ../index.php' );
}