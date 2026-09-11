<?php

require_once 'config.php';
session_start();

if (isset($_POST['connecter'])) {

    $mail = trim($_POST['mail']);
    $password = $_POST['password'];

    if ($mail == "" || $password == "") {
        header('Location: connexion.php?erreur=' . urlencode("Merci de remplir tous les champs."));
        exit;
    }

    $pdo = getConnexionBDD();

    $requete = $pdo->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
    $requete->execute(['mail' => $mail]);
    $utilisateur = $requete->fetch();

    // On verifie que l'utilisateur existe ET que le mot de passe correspond au hash enregistre
    if ($utilisateur && password_verify($password, $utilisateur['password'])) {
        $_SESSION['utilisateur_nom'] = $utilisateur['nom'];
        $_SESSION['utilisateur_mail'] = $utilisateur['mail'];
        header('Location: espace.php');
        exit;
    } else {
        header('Location: connexion.php?erreur=' . urlencode("Email ou mot de passe incorrect."));
        exit;
    }
}
