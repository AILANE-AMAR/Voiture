<?php 
session_start();

// Détruit la session active, ce qui déconnecte l'utilisateur
session_destroy(); 
$racine_path = '../';
include($racine_path . "templates_back/header.php");
// Affiche un message de déconnexion réussie ?>
<div class="message-box success">
    <p>Vous avez été déconnecté avec succès.</p>
    <p>Merci de votre visite ! Nous espérons vous revoir très bientôt.</p>
    <a href="/~uapv2500198/admin"admi class="btn">Retour</a>
</div>
<?php
include($racine_path . "templates_back/footer.php");
?>