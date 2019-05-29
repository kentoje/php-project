<?php 
/* TODO: Revoir la sécurité, inexistantes. */

require_once '../config/bootstrap.php';

/* Variables */
$email = '';
$username = '';
$errors = array();

/* Connection to DB */
$db = App\Database::connect_database();

/* Registration */
if ( isset( $_POST['submit'] ) ) {
  $email = $_POST['email'];
  $username = $_POST['name'];
  $password = password_hash( $_POST['password'], PASSWORD_DEFAULT );

  if ( empty($email) ) {
    array_push( $errors, 'Vous devez mettre un email !' );
  }

  if ( empty($username) ) {
    array_push( $errors, 'Vous devez mettre un pseudo !' );
  }

  if ( empty($password) ) {
    array_push( $errors, 'Vous devez mettre un mot de passe !' );
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
    }

    if ( $user['email'] == $email ) {
      array_push( $errors, 'Ce mail existe déjà !' );
    }
  }

  if ( count($errors) == 0 ) {
    $query = "INSERT INTO users(pseudo, email, password, photo) VALUES ('$username', '$email', '$password', '')";
    $insertReq = App\Database::$pdo->exec( $query );
    $_SESSION['name'] = $username;
    $_SESSION['success'] = 'Vous êtes connecté !';
    header( 'location: ../index.php' );
  }
}