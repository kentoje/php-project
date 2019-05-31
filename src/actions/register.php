<?php 

require_once '../config/bootstrap.php';

/* Variables */
$email = '';
$username = '';
$errors = array();

/* Connection to DB */
$db = App\Database::connect_database();

/* Registration */
if ( isset( $_POST['submit'] ) ) {
  if ( filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
    $email = htmlspecialchars($_POST['email']);
  } else {
    header('location: ../pages/wrong.php');
  }
  
  if ( empty($email) ) {
    array_push( $errors, 'Vous devez mettre un email !' );
    header('location: ../pages/noemail.php');
  }

  if ( empty($_POST['password']) ) {
    array_push( $errors, 'Vous devez mettre un mot de passe !' );
    header('location: ../pages/nopassword.php');
  } else {
    $password = password_hash( $_POST['password'], PASSWORD_DEFAULT );
  }

  if ( empty($_POST['name']) ) {
    array_push( $errors, 'Vous devez mettre un pseudo !' );
    header('location: ../pages/nopseudo.php');
  } else {
    $username = trim(htmlspecialchars($_POST['name']));
  }

  /* Check DB if user exists */
  $userCheckQuery = "SELECT * FROM users WHERE pseudo = :name OR email = :email LIMIT 1";
  $req = App\Database::$pdo->prepare( $userCheckQuery );
  $req->bindParam( ':name', $_POST['name'] );
  $req->bindParam( ':email', $_POST['email'] );
  $req->execute();

  $user = $req->fetch( PDO::FETCH_ASSOC );

  if ($user) {
    if ( $user['pseudo'] == $username ) {
      array_push( $errors, 'Ce pseudo existe déjà !' );
      header('location: ../pages/existingpseudo.php');
    }

    if ( $user['email'] == $email ) {
      array_push( $errors, 'Ce mail existe déjà !' );
      header('location: ../pages/existingemail.php');
    }
  }
  
  if ( count($errors) == 0 ) {
    $query = "INSERT INTO users(pseudo, email, password) VALUES ('$username', '$email', '$password')";
    $insertReq = App\Database::$pdo->exec( $query );
    $lastId = App\Database::getLastIdUser();
    $utilisateur = new App\User( $lastId[0], $_POST['name'], $_POST['email'], $password, '' );
    $_SESSION['name'] = $utilisateur;
    $_SESSION['success'] = 'Vous êtes connecté !';
    header( 'location: ../index.php' );
  }
}