-- Base de données pour le formulaire d'inscription
-- (nom, email, mot de passe)

CREATE DATABASE IF NOT EXISTS revision_vac
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE revision_vac;

CREATE TABLE IF NOT EXISTS utilisateurs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  mail VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  date_inscription DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
