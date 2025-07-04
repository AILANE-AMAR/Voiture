<?php 
/**
 * un fichier pour supprimer une voiture 
 */
include("../model/Voiture.php");

use bd\Voiture;

if( isset($_GET['id'])){

    $voiture = new Voiture();

    if($voiture->supprimerVoiture($_GET['id'])){
      header("location: /~uapv2500198/admin/gestionVehicules");
      exit ;
    }
    else{
        die('erreur de suupression de Voiture ');
    }
}