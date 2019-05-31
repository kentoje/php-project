<?php

namespace App;

use PDO;
/* hello */
class Database {
  const DB_SGBD   = 'mysql';
  const DB_HOST   = '127.0.0.1';
  const DB_DBNAME = 'test';
  const DB_USER   = 'root';
  const DB_PASS   = 'root';
  public static $pdo;

  public static function connect_database() 
  {
    try {
      self::$pdo = new PDO(
      self::DB_SGBD.':host='.self::DB_HOST.';dbname='.self::DB_DBNAME.';',
      self::DB_USER,
      self::DB_PASS,
      [
        PDO::ATTR_ERRMODE             => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND  => 'SET NAMES utf8',
      ]);
    } catch(Exception $e) {
      die('Erreur de connexion à la base de données'. $e->getMessage());
    }
  }

  public static function getLastIdUser(){
    $stmt = self::$pdo->query("SELECT LAST_INSERT_ID() FROM users");
    $lastId = $stmt->fetch();
    return $lastId;
  }
}