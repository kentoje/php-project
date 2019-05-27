<?php

class Database {
  
  public function connect_database($parameters) 
  {
    try {
      include($parameters);
      $pdo = new PDO(
      DB_SGBD.':host='.DB_HOST.';dbname='.DB_DBNAME.';',
      DB_USER,
      DB_PASS,
      [
        PDO::ATTR_ERRMODE             => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND  => 'SET NAMES utf8',
      ]);
      echo "J'adore les bases de données c'est vraiment très sympa !";
      return $pdo;
    } catch(Exception $e) {
      die('Erreur de connexion à la base de données'. $e->getMessage());
    }
  }
}