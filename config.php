<?php
// Identifiants de connexion à la base de données
// Sous WAMP, DB_USER est souvent 'root' et DB_PASS vide.
define('DB_HOST', 'sql213.infinityfree.com');
define('DB_NAME', 'if0_42894244_revision_vac');
define('DB_USER', 'if0_42894244');
define('DB_PASS', 'DmY8KYdAgyAZ');

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
