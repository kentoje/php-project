<?php 
  require '../config/bootstrap.php';
  
  echo $_SESSION['name']->getId();
  echo $_SESSION['mainevent'];
  echo '<pre>' . print_r($_SESSION, true) . '</pre>';

  $like = new App\Like('', $_SESSION['name']->getId(), $_SESSION['mainevent']);
  if ( $like->existBdd() != null ) {
    $like->deleteBdd();
    header('location: ../index.php');
  } else {
    $like->saveBdd();
    header('location: ../index.php');
  }
?>