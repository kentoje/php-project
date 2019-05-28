<?php

namespace App;

class Database {
  const DB_SGBD   = 'mysql';
  const DB_HOST   = 'localhost';
  const DB_DBNAME = 'social_events';
  const DB_USER   = 'root';
  const DB_PASS   = 'rootroot';
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
}