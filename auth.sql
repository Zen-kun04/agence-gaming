-- Début su script
START TRANSACTION;


-- Supprimer une bdd si elle existe, utile pour repartir de 0
DROP DATABASE IF EXISTS `Auth`;


-- Créer une bdd
CREATE DATABASE IF NOT EXISTS `Auth`;


-- Utiliser une bdd
USE `Auth`;


-- Créer une table si elle n'existe pas
CREATE TABLE IF NOT EXISTS `users`(
    id INTEGER NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    hash VARCHAR(32) NOT NULL UNIQUE,
    PRIMARY KEY(id)
);

INSERT INTO `users` (username, hash) VALUES
("Baguette", "482c811da5d5b4bc6d497ffa98491e38");

-- Finir/Sauvegarder le script
COMMIT;