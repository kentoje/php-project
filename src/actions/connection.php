<?php 
require_once '../config/bootstrap.php';
$data = App\Database::$pdo;



if($_POST['pseudo'] && $_POST['password']) {

  //check for existing user in DB
  $pseudo = trim(htmlspecialchars($_POST['pseudo']));
  $password = htmlspecialchars($_POST['password']);

  $users = $data->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
  $users->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
  $users->execute();
  $user = $users->fetch(PDO::FETCH_ASSOC);


  if (isset($user)) {
    $hash = $data->prepare('SELECT password FROM users WHERE pseudo = :pseudo');
    $hash->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $hash->execute();
    $hashPass = $hash->fetch(PDO::FETCH_ASSOC);
    $hashPass = $hashPass['password'];

    if ( password_verify( $password , $hashPass ) == true) {
      $utilisateur = new App\User( $user['id_user'], $user['pseudo'], $user['email'], $user['password'], $user['photo'] );
      $_SESSION['name'] = $utilisateur;
      header( 'location: ../index.php' );
    } else {
      header('location: ../pages/wronglogin.php');
    }
  } else {
    header('location: ../pages/wronglogin.php');    
  }
} else {
  header('location: ../pages/passandlogin.php');
}
