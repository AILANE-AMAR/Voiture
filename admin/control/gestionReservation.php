<?php 
session_start();
/**
 * un fichier qui affiche les Reservation qui j'ai avec une option de annuler, valider ou supprimer une reservation 
 * on affiche tout les reservation en utulisant affciherreservation , et appelont le tableau html Reservationhtml.php 
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

require($racine_path.'model/Reservation.php'); 
use bd\Reservation; 

$ReservationBD = new Reservation ();
include($racine_path."templates_back/tableaureservation.php"); 
foreach ($ReservationBD->afficherReservations() as $tableau){

         $id=$tableau->id_reservation;
         $id_client=$tableau->id_client;
         $id_voiture=$tableau->id_voiture;
         $date_debut=$tableau->date_debut;
         $date_fin=$tableau->date_fin;
         $status=$tableau->statut;
    include($racine_path."templates_back/Reservationhtml.php"); 
}

echo ' 
 </table>
    <div class="zone-actions">
        <a href="ajouterReservation" class="redirect-button">Ajouter une Réservation</a>
    </div>
   </div>
   </main>';
?>
<?php include("../templates_back/footer.php");?>
