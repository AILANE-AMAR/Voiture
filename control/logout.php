<?php
/**
 * Page de déconnexion.
 *
 * Cette page permet à l'utilisateur de se déconnecter de la session en cours.
 * Elle détruit la session active et affiche un message de confirmation de déconnexion.
 * L'utilisateur peut également retourner à la page d'accueil.
 *
 * @package Control
 * @category User Logout
 * @version 1.0
 */

// Démarre la session pour accéder aux variables de session
session_start();

// Détruit la session active, ce qui déconnecte l'utilisateur
session_destroy(); 
$racine_path = '../';
include($racine_path . "templates/header.php");
// Affiche un message de déconnexion réussie ?>
<div class="message-box success">
    <p>Vous avez été déconnecté avec succès.</p>
    <p>Merci de votre visite ! Nous espérons vous revoir très bientôt.</p>
    <a href="/~uapv2500198/admin" class="btn">Retour</a>
</div>
<?php
include($racine_path . "templates/footer.php");
?>
