<?php
session_start(); 
/**
 * un fichier pour l'ajoute de reservation , on utulisant methode ajouteReservation 
 *  et la methode de getidByEmail pour verfifie est ce que le client existe deja si non il vas s'insrcrire pour faire une reservation .  
 */
// Vérifie si l'utilisateur est connecté en vérifiant la session
if (!isset($_SESSION['user_id']) ) { 
    header("Location: /~uapv2500198/admin/");
    exit();
}
// Génère un jeton CSRF pour protéger contre les attaques de type CSRF
if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
$racine_path = '../';
$titre = 'Nos Véhicules';
include($racine_path . "templates_back/header.php");


echo '<main class="row mb-2">';

require_once($racine_path . 'model/Voiture.php');
require_once($racine_path . 'model/Client.php');
require_once($racine_path . 'model/Reservation.php');

use bd\Voiture;
use bd\Client;
use bd\Reservation;

$voitureDB =  new Voiture();
$message = ""; // Variable pour afficher les erreurs ou succès

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die("<div class='message-box ERREUR'><p>Erreur CSRF : Jeton invalide.</p><a href='/~uapv2500198/admin/accueil' class='btn'>Retour</a></div>");
    } 
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $id_voiture = intval($_POST['id_voiture']);
    $date_debut = trim($_POST['date_debut']);
    $date_fin = trim($_POST['date_fin']);

    // Vérifier si les champs sont vides
    if (empty($email) || empty($id_voiture) || empty($date_debut) || empty($date_fin)) {
        $message = "Erreur : Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Erreur : Email invalide.";
    } else {
        // Vérifier si le client existe
        $client = new Client();
        $id_client = $client->getClientIdByEmail($email);

        if (!$id_client) {
            $message = "Erreur : Client non trouvé.";
        } else {
            // Ajouter la réservation
            $reservation = new Reservation();
            if ($reservation->addReservation($id_client, $id_voiture, $date_debut, $date_fin)) {
                $cas= 'success';
                $message= "Réservation ajoutée avec succès !";

            } else {
                $cas = 'error';
                $message = "Erreur : Impossible d'ajouter la réservation.";            }
        }

    }
    die("<div class='message-box $cas'><p>$message</p><a href='/~uapv2500198/admin/accueil' class='btn'>Retour</a></div>");
}




require($racine_path . 'templates_back/formulairereservation.php');
include($racine_path . "templates_back/footer.php");
?>
