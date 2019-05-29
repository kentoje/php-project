<?php 
require_once '../config/bootstrap.php';
$data = App\Database::$pdo;


session_destroy();
header( 'location: ../index.php' );