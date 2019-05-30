<?php

/* Composer */
require_once __DIR__ . '/../../vendor/autoload.php';

/* Start SESSION */
session_start();

/* MySQL */
App\Database::connect_database();

