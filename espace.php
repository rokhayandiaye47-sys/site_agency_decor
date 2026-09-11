<?php
session_start();

if (empty($_SESSION['utilisateur_mail'])) {
    header('Location: connexion.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency Decor - Mon espace</title>
    <link rel="stylesheet" href="accueil.css">
</head>
<body>
<div class="accueil">
 <a href="accueil.html"><img src="media/images/logo.png" alt="" width="100" height="100"></a>
<div class="menu">
<button><a href="accueil.html#accueil">Accueil</a></button>
<button><a href="accueil.html#propos">A propos</a></button>
<button><a href="accueil.html#proposition">Nous vous proposons</a></button>
<button><a href="accueil.html#projets">Nos projets</a></button>
<button><a href="accueil.html#contact">Contactez-nous</a></button>
</div>
<button><a href="deconnexion.php">SE DECONNECTER</a></button>
</div>

<div class="espace">
    <h1>Bienvenue, <?= htmlspecialchars($_SESSION['utilisateur_nom']) ?> !</h1>
    <p>Vous etes connecte avec l'adresse <?= htmlspecialchars($_SESSION['utilisateur_mail']) ?></p>
</div>

<footer>
<p>&copy; Agency Decor - Tous droits reserves</p>
</footer>
</body>
</html>
