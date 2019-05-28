<?php

include('../classes/database.class.php');

$database = new Database();
$pdo = $database->connect_database('./parameters.php');

$data = $pdo->query("SELECT * FROM users")->fetchAll();
foreach ($data as $row) {
    echo $row['pseudo']."<br />\n";
}