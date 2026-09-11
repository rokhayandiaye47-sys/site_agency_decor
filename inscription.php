<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency Decor - Inscription</title>
    <link rel="stylesheet" href="accueil.css">
</head>
<body>
<?php if (!empty($_GET['erreur'])): ?>
<p class="message erreur"><?= htmlspecialchars($_GET['erreur']) ?></p>
<?php endif; ?>
<div class="accueil">
 <a href="accueil.html"><img src="media/images/logo.png" alt="" width="100" height="100"></a>
<div class="menu">
<button><a href="accueil.html#accueil">Accueil</a></button>
<button><a href="accueil.html#propos">A propos</a></button>
<button><a href="accueil.html#proposition">Nous vous proposons</a></button>
<button><a href="accueil.html#projets">Nos projets</a></button>
<button><a href="accueil.html#contact">Contactez-nous</a></button>
</div>
<button><a href="connexion.php">SE CONNECTER</a></button>
</div>

<div class="form-page">
    <form class="form-box" action="traitement.php" method="post">
        <h1>INSCRIPTION</h1>
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>
        <label for="mail">Email</label>
        <input type="email" id="mail" name="mail" required>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" name="enregistrer">S'INSCRIRE</button>
        <p>Deja inscrit ? <a href="connexion.php">Se connecter</a></p>
    </form>
</div>

<footer>
<p>&copy; Agency Decor - Tous droits reserves</p>
</footer>
</body>
</html>
