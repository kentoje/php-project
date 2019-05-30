<?php 
  require '../config/bootstrap.php';
  
  if ( !$_SESSION['name'] ) {
    header('location: ../pages/notconnected.php');
  } else {
      $like = new App\Like('', $_SESSION['name']->getId(), $_SESSION['mainevent']);
    if ( $like->existBdd() != null ) {
      $like->deleteBdd();
      header('location: ../index.php');
    } else {
      $like->saveBdd();
      header('location: ../index.php');
    }
  }
?>