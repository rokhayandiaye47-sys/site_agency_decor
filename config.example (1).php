<?php
/**
 * Agency Decor - MODELE de configuration
 * A copier en "config.php" et remplir avec les vrais identifiants
 * (ne jamais commiter config.php sur Git).
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'revision_vac');
define('DB_USER', 'root');
define('DB_PASS', '');

function getConnexionBDD() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        error_log("Erreur de connexion a la base de donnees : " . $e->getMessage());
        die("Impossible de se connecter a la base de donnees.");
    }
}
