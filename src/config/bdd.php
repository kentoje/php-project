<?php

require_once 'bootstrap.php';

$pdo = App\Database::connect_database();

$data = $pdo->query("SELECT * FROM users")->fetchAll();
foreach ($data as $row) {
    echo $row['pseudo']."<br />\n";
}