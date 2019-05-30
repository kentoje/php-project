<?php
require_once '../config/bootstrap.php';
$data = App\Database::$pdo;


if(isset($_POST['deletecomment'])){

  $comment = $_POST['deletecomment'];

  $request = $data->prepare("DELETE FROM comments WHERE id_comment = :comment");
  $request->bindParam( ':comment', $comment );
  $request->execute();
}

header('location: ../index.php');