<?php

/* TODO: Revoir la sécurité, inexistantes. */

require_once '../config/bootstrap.php';

/* Variables */
$comment = '';
$errors = array();

/* Connection to DB */
$db = App\Database::connect_database();

$comment = $_POST['comment'];
/* Registration */
if ( !isset( $_POST['submit'] ) ) {
  array_push( $errors, 'Formulaire non envoyé.' );
  
  /* if ( empty($comment) ) {
    
  } */
} else {
  if ( empty($comment) ) {
    array_push( $errors, 'Votre commentaire est vide !' );
  } else {
    /* $comment = new App\Comment( $_SESSION[''] ); */
  }
}
