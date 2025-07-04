<?php 
include("../model/Reservation.php");
/**
 * un fichier control pour annuler une reservation  avec une methode annulerreservation 
 */
use bd\Reservation;

if( isset($_GET['id'])){

    $reservation = new Reservation();

    if($reservation->annulerReservation($_GET['id'])){
      header("location: /~uapv2500198/admin/gestionReservation");
      exit ;
    }
    else{
        die('erreur de suupression de Reservation  ');
    }
}