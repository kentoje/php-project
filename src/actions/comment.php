<?php


require_once '../config/bootstrap.php';

/* Variables */
$comment = '';
$errors = array();

/* Connection to DB */
$db = App\Database::connect_database();


/* Registration */
if ( !isset( $_POST['submit'] ) ) {
  array_push( $errors, 'Formulaire non envoyé.' );
  // var_dump( $errors );
} else {
  if ( !$_SESSION['name'] ) {
    header('location: ../pages/notconnected.php');
  }
  $comment = htmlspecialchars($_POST['comment']);
  date_default_timezone_set('Europe/Paris');
  $date = date("Y/m/d");

  if ( empty($comment) ) {
    array_push( $errors, 'Votre commentaire est vide !' );
    // var_dump( $errors );
  } else { 
    $comment = new App\Comment('', $_SESSION['name']->getId(), $_SESSION['mainevent'], $comment, $date);
    // var_dump($comment);
    $comment->sendDb();
    header('location: ../index.php');
  }
}