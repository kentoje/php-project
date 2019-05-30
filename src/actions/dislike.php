<?php 
  require '../config/bootstrap.php';
  
  if ( !$_SESSION['name'] ) {
    header('location: ../pages/notconnected.php');
  } else {
      $dislike = new App\Dislike('', $_SESSION['name']->getId(), $_SESSION['mainevent']);
    if ( $dislike->existBdd() != null ) {
      $dislike->deleteBdd();
      header('location: ../index.php');
    } else {
      $dislike->saveBdd();
      header('location: ../index.php');
    }
  }
?>