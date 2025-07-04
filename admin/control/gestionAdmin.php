<?php 
session_start();
/**
 * un fichier pour l'affcihage des admin de mon site avec une option de suuprimer un admin 
 */
// verifier dans la session est ce que le user et connecter ou pas 

if (!isset($_SESSION['user_id']) ) { 
    header("Location: /~uapv2500198/admin/");
    exit();
}
$racine_path = '../';

$titre = 'Nos Véhicules';
include($racine_path."templates_back/header.php");

echo '<main class="row mb-2">';

require($racine_path.'model/Admin.php'); 
use bd\Admin; 

$AdminBD = new Admin ();
include($racine_path."templates_back/tableautilisateur.php"); 
foreach ($AdminBD->afficherAdmin() as $tableau){
     $id=$tableau->id;
     $nom=$tableau->nom;
     $prenom=$tableau->prenom;
     $email=$tableau->email;
     $mot_de_passe=$tableau->motDePasse;
     $telephone=$tableau->telephone;
    include($racine_path."templates_back/utilisateur.php");
}

echo ' 
 </table>
    <div class="zone-actions">
        <a href="ajouterAdmin" class="redirect-button">Ajouter un administrateur </a>
    </div>
   </div>
   </main>';
?>
<?php include("../templates_back/footer.php");?>
