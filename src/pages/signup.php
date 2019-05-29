<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css">
  <title>Sign Up</title>
</head>
<body>


  <?php 
    require_once '../config/bootstrap.php';
  ?>
  <form method="post" action="../actions/register.php">
    <label for="email">E-mail</label>
    <input type="text" name="email">
    <label for="name">Nom</label>
    <input type="text" name="name">
    <label for="password">Mot de passe</label>
    <input type="text" name="password">
    <button type="submit" name="submit">Submit</button>
  </form>
</body>
</html>