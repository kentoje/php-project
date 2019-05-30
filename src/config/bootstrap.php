<?php

/* Composer */
require_once __DIR__ . '/../../vendor/autoload.php';

/* Start SESSION */
session_start();
$_SESSION['mainevent'] = 1;

/* MySQL */
App\Database::connect_database();

