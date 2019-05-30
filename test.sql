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

CREATE TABLE dislikes (
  id_dislike INT(5) NOT NULL AUTO_INCREMENT,
  id_user INT(3) NOT NULL,
  id_event INT(4) NOT NULL,
  PRIMARY KEY (id_dislike)
) ENGINE=INNODB;

INSERT INTO events (id_event, title, description, image, site) VALUES
(1, 'Atelier des lumières Van-Gogh', 'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.', 'vangogh.png', 'https://www.atelier-lumieres.com/fr/van-gogh-nuit-etoilee'),
(2, 'We love green', 'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.', 'welovegreen.jpg', 'https://www.welovegreen.fr/'), 
(3, 'Le terasse éphémère Poisson Lune', 'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.', 'poissonlune.jpg', 'http://www.palais-portedoree.fr/fr/poisson-lune'),
(4, "La fête de l'ocean 2019", 'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.', 'ocean.jpg', 'https://www.mnhn.fr/fr/visitez/agenda/evenement/fete-ocean');