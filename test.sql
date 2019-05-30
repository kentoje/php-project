CREATE DATABASE test CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE test;

CREATE TABLE users (
  id_user INT(3) NOT NULL AUTO_INCREMENT,
  pseudo VARCHAR(25) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_user)
) ENGINE=INNODB;

CREATE TABLE events (
  id_event INT(4) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  image TEXT NOT NULL,
  site TEXT NULL NULL,
  PRIMARY KEY (id_event)
) ENGINE=INNODB;

CREATE TABLE comments (
  id_comment INT(5) NOT NULL AUTO_INCREMENT,
  id_user INT(3) NOT NULL,
  id_event INT(4) NOT NULL,
  content TEXT NOT NULL,
  PRIMARY KEY (id_comment)
) ENGINE=INNODB;

CREATE TABLE likes (
  id_like INT(5) NOT NULL AUTO_INCREMENT,
  id_user INT(3) NOT NULL,
  id_event INT(4) NOT NULL,
  PRIMARY KEY (id_like)
) ENGINE=INNODB;