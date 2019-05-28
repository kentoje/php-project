<?php

require_once 'bootstrap.php';

$data = App\Database::$pdo->query("SELECT * FROM users")->fetchAll();
foreach ($data as $row) {
    echo $row['pseudo']."<br />\n";
}