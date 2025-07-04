<?php
if (isset($_POST['accept_cookies']) && $_POST['accept_cookies'] == 'yes') {
    setcookie('accept_cookies', 'yes', time() + 60*60*24*365);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="templates_back/css/style.css">
</head>
<body>
    <?php
    if (!isset($_COOKIE['accept_cookies'])) {
        echo '<div class="cookie-banner">';
        echo '<p>Ce site utilise des cookies pour améliorer votre expérience. En continuant à utiliser ce site, vous acceptez notre politique de cookies.</p>';
        echo '<form method="POST" action="">';
        echo '<button type="submit" name="accept_cookies" value="yes">Accepter</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>
    <div class="login-container">
        <h2>Connexion Admin</h2>
        <form action="control/connexion.php" method="POST">
            <label for="email">Nom d'utilisateur</label>
            <input type="text" id="email" name="email" required>

            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>

            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
