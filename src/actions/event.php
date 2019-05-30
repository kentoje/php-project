<?php
require_once '../config/bootstrap.php';


if(isset($_POST['mainevent'])){
  $_SESSION['mainevent'] = $_POST['mainevent'];
}

header('location: ../index.php');