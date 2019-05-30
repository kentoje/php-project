CREATE DATABASE to_go_out_db CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE to_go_out_db;

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
  date_post DATE NOT NULL,
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
(1, 'Atelier des lumières Van-Gogh', "L'atelier des Lumières nous entraine dans l'univers de Van Gogh, le temps d'une nouvelle exposition immersive du 22 février au 31 décembre 2019. Pendant 35 minutes, on se promène dans les plus beaux tableaux de Van Gogh, à la redécouverte de ce génie incompris de son époque.", 'vangogh.png', 'https://www.atelier-lumieres.com/fr/van-gogh-nuit-etoilee'),
(2, 'We love green', "Cette semaine du 27 mai au 2 juin 2019, Paris acceuille le festival We love green, une grande tyrolienne depuis la tour Eiffel, le tournois de Roland Garis et le forum de la météo.", 'welovegreen.jpg', 'https://www.welovegreen.fr/'), 
(3, 'La terasse éphémère Poisson Lune', "Poisson Lune : La nouvelle terasse éphémère au Palais de la Porte Dorée à Paris. Pour sa saison estivale 2019, le palais de la porte Dorée dévoile une nouvelle terasse éphémère.", 'poissonlune.jpg', 'http://www.palais-portedoree.fr/fr/poisson-lune'),
(4, "La fête de l'ocean 2019", "À l'occasion des Journées de la mer et de la Journée mondiale des océans, l'Aquarium tropical de la Porte Dorée organise la Fête de l'Océan et s'ouvre gratuitement à vous du 6 au 9 juin 2019. L'occasion de découvrir les expositions temporaires du moment et de participer aux conférences et ateliers à votre disposition.", 'ocean.jpg', 'https://www.mnhn.fr/fr/visitez/agenda/evenement/fete-ocean');