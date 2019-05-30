<?php 
  require_once '../config/bootstrap.php';
  $data = App\Database::$pdo;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/fonts.css">
  <link rel="stylesheet" href="../css/error.css">
  <link rel="stylesheet" href="../css/style.css">

  <title>Editer un commentaire</title>
</head>
<body>
  <main class="main">

  <?php
    $idcomment = $_POST['editcomment'];
    $result = $data->prepare('SELECT * FROM comments WHERE id_comment = :comment');
    $result->bindValue(':comment', $idcomment);
    $result->execute();
    $comment = $result->fetch(PDO::FETCH_ASSOC);
  ?>


  <form action="../actions/modify.php" method="post">
        <div class="commentform">
            <div class="commentform__avatar">
            </div>
            <textarea id="comment__input" class="input commentform__field" name="comment"><?php echo $comment['content']?></textarea>
            <button class="button" type="submit" name="idcomment" value="<?php echo $idcomment ?>">Modifier</button>
        </div>
      </form>
  </main>
</body>
</html>