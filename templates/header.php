<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Elite Cars Rental</title>
    <link rel="stylesheet" href="/~uapv2500198/templates/css/style.css"> <!-- Lien vers ton fichier CSS -->
</head>
<body>
<header> 
    <nav>
        <!-- LOGO À GAUCHE -->
        <div class="logo">
            <a href="/~uapv2500198/index.php">Elite Cars Rental</a>
        </div>

        <!-- MENU CENTRÉ -->
        <ul class="nav-links">
            <li><a href="/~uapv2500198/">Accueil</a></li>
            <li><a href="/~uapv2500198/vehicules">Véhicules</a></li>
            <li><a href="/~uapv2500198/tarif">Tarifs</a></li>
        </ul>

        <!-- BOUTONS À DROITE -->
        <div class="account">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/~uapv2500198/reservation" class="btn-reserver">Réserver</a>
                <a href="/~uapv2500198/logout" class="btn-account">Se déconnecter</a>
            <?php else: ?>
                <a href="/~uapv2500198/connexion" class="btn-account">Se connecter</a>
            <?php endif; ?>
        </div>

        <!-- BOUTON MENU BURGER (Mobile) -->
        <button class="menu-toggle">☰</button>
    </nav>
</header>

<script src="/~uapv2500198/templates/js/script.js"></script> <!-- Lien vers ton fichier JavaScript -->

</body>
</html>
