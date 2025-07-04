<?php
session_start();
/**
 * un fichier pour afficher les reservation avec une option de supprimer une reservation 
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

require($racine_path.'model/Voiture.php'); // Inclure le fichier contenant la classe Voiture
use bd\Voiture;  // Utiliser l'espace de noms

$voitureBD = new Voiture ();
include($racine_path."templates_back/tableauvoiture.php"); 
foreach ($voitureBD->afficherVoiture() as $tableau){
    // Affectation des variables (identiques à celles qui se trouvent dans les templates)
    $id = $tableau->id_voiture;
    $marque=$tableau->marque;
    $model=$tableau->modele;
    $annee=$tableau->annee;
    $type=$tableau->type;
    $prix=$tableau->prix_journalier;
    $disponible=$tableau->disponible;
    $caution=$tableau->caution;
    $immatriculation=$tableau->immatriculation;

    include($racine_path."templates_back/vehiculeshtml.php"); 
}

echo ' 
 </table>
    <div class="zone-actions">
        <a href="ajouterVoiture" class="redirect-button">Ajouter une voiture </a>
    </div>
   </div>
   </main>';
?>
<?php include("../templates_back/footer.php");?>
