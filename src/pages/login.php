<!-- is not usefull anymore -->

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
<form action="../actions/connection.php" method="post">
  <label for="pseudo">pseudo</label>
  <input type="text" name="pseudo" id="pseudo">
  <label for="password">mot de passe</label>
  <input type="text" name="password" id="password">
  <input type="submit" name="ajouter" value="envoyer">
</form>

<form action="../actions/connection.php" method="post">
    <input type="submit" name="disconnected" value="deconnexion">
</form>
