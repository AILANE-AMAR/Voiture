<?php 
/** 
 * un fichier pour valider une reseravtion 
 */
include("../model/Reservation.php");
include("../model/Voiture.php");
use bd\Reservation;
use bd\Voiture;

if( isset($_GET['id'])){

    $reservation = new Reservation();

    if($reservation->validerReservation($_GET['id'])){
        $voiture= new Voiture();
        $voiture->changerStatutVoiture($_GET['id_voiture']);
      header("location: /~uapv2500198/admin/gestionReservation");
      exit ;
    }
    else{
        die('erreur de suupression de Reservation  ');
    }
}