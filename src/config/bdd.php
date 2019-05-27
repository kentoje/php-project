<?php

include('../classes/database.class.php');

$database = new Database();
$database->connect_database('./parameters.php');