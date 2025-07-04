<?php 
session_start();
/**
 * un fichier pour affciher tout les clients avec une option de supprimer un client de ma base de donnes 
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

require($racine_path.'model/Client.php'); 
use bd\Client; 

$ClientBD = new Client ();
include($racine_path."templates_back/tableautilisateur.php"); 
foreach ($ClientBD->afficherClient() as $tableau){
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
    <a href="ajouterClient" class="redirect-button">Ajouter un client</a>
</div>
   </div>
   </main>';
?>
<?php include("../templates_back/footer.php");?>
