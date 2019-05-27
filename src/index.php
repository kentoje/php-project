<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./scss/style.scss">
  <script defer src="./js/main.js"></script>
  <title>PHP Project</title>
</head>
<body>
  <h1>Ok</h1>
  <?php 
    /* Ceci est un test et il marche plutôt bien ! :) */
    include('classes/test.class.php');
    $groot = new Humain();
    $groot->setNom('Groot');
    echo $groot->getNom();
  ?>
</body>
</html>