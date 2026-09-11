<?php

require_once 'config.php';
session_start();

if (isset($_POST['enregistrer'])) {

    $nom = trim($_POST['nom']);
    $mail = trim($_POST['mail']);
    $password = $_POST['password'];

    // Verification simple des champs
    if ($nom == "" || $mail == "" || $password == "") {
        header('Location: inscription.php?erreur=' . urlencode("Merci de remplir tous les champs."));
        exit;
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header('Location: inscription.php?erreur=' . urlencode("L'adresse email n'est pas valide."));
        exit;
    }

    $pdo = getConnexionBDD();

    // Verifier si l'email existe deja
    $verif = $pdo->prepare("SELECT id FROM utilisateurs WHERE mail = :mail");
    $verif->execute(['mail' => $mail]);

    if ($verif->rowCount() > 0) {
        header('Location: inscription.php?erreur=' . urlencode("Cet email est deja enregistre."));
        exit;
    }

    // On hache le mot de passe avant de l'enregistrer (jamais en clair)
    $password_hache = password_hash($password, PASSWORD_DEFAULT);

    $insertion = $pdo->prepare("INSERT INTO utilisateurs (nom, mail, password) VALUES (:nom, :mail, :password)");
    $insertion->execute([
        'nom' => $nom,
        'mail' => $mail,
        'password' => $password_hache
    ]);

    // Inscription reussie : on connecte directement l'utilisateur
    $_SESSION['utilisateur_nom'] = $nom;
    $_SESSION['utilisateur_mail'] = $mail;

    header('Location: espace.php');
    exit;
}
