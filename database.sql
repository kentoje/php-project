CREATE DATABASE social_events CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE social_events;

CREATE TABLE users (
  id_user INT(3) NOT NULL AUTO_INCREMENT,
  pseudo VARCHAR(25) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
	photo VARCHAR(255),
  PRIMARY KEY (id_user)
) ENGINE=INNODB;


CREATE TABLE events (
  id_event INT(4) NOT NULL AUTO_INCREMENT,
  id_user INT(3) NOT NULL,
  title VARCHAR(255) NOT NULL,
	description TEXT,
	address VARCHAR(255) NOT NULL,
	email VARCHAR(255),
	website VARCHAR(255),
	price DECIMAL(10,2) NOT NULL,
	image VARCHAR(255) NOT NULL,
	date_start DATETIME NOT NULL,
	date_end DATETIME NOT NULL,
	id_category INT(2) NOT NULL,
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

CREATE TABLE participations (
  id_participation INT(5) NOT NULL AUTO_INCREMENT,
  id_user INT(3) NOT NULL,
	id_event INT(4) NOT NULL,
  PRIMARY KEY (id_participation)
) ENGINE=INNODB;

CREATE TABLE category (
  id_category INT(2) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_category)
) ENGINE=INNODB;