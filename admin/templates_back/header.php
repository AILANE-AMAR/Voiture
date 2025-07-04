<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion de Location</title>
    <link rel="stylesheet" href="/~uapv2500198/admin/templates_back/css/style.css">
</head>
<body>
    <div class="navbar">
        <!-- Bouton de menu hamburger -->
        <div class="menu-toggle" id="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <!-- Liens de menu -->
        <div class="navbar-links" id="navbar-links">
            <a href="/~uapv2500198/admin/accueil">Accueil</a>
            <a href="/~uapv2500198/admin/gestionClient">Client</a>
            <a href="/~uapv2500198/admin/gestionAdmin">Admin</a>
            <a href="/~uapv2500198/admin/gestionReservation">Réservation</a>
            <a href="/~uapv2500198/admin/gestionVehicules">Voiture</a>
            <a href="/~uapv2500198/admin/Message">Messages</a>
            <a href="/~uapv2500198/admin/FAQ">FAQ</a>
            <a href="/~uapv2500198/admin/logout">Déconnexion</a>
        </div>
    </div>

   
    <script>
    // JavaScript pour le menu hamburger
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.querySelector('.navbar').classList.toggle('active');
    });
</script>
</body>
</html>
