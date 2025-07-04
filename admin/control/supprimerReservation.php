<?php 
/**
 * un fichier pour supprimer une Reservation
 */
include("../model/Reservation.php");

use bd\Reservation;

if( isset($_GET['id'])){

    $reservation = new Reservation();

    if($reservation->supprimerReservation($_GET['id'])){
      header("location: /~uapv2500198/admin/gestionReservation");
      exit ;
    }
    else{
        die('erreur de suupression de Reservation  ');
    }
}