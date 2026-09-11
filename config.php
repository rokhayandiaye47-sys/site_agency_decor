<?php
// Identifiants de connexion à la base de données
// Sous WAMP, DB_USER est souvent 'root' et DB_PASS vide.

define('DB_HOST', 'localhost');
define('DB_NAME', 'revision_vac');
define('DB_USER', 'root');
define('DB_PASS', '');

function getConnexionBDD() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER,
            DB_PASS
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        error_log("Erreur de connexion à la base de données : " . $e->getMessage());
        die("Impossible de se connecter a la base de donnees.");
    }
}
