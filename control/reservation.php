<?php
/**
 * Page de réservation de voiture.
 * 
 * Cette page permet à un utilisateur connecté de réserver une voiture pour une période donnée.
 * Les utilisateurs doivent être connectés pour pouvoir faire une réservation. Le formulaire soumet les informations
 * nécessaires, comme l'email du client, la voiture, et les dates de début et de fin.
 * 
 * @package Control
 * @category Reservation Handling
 * @version 1.0
 */

session_start(); 

// Vérification de la connexion de l'utilisateur
if (!isset($_SESSION['user_id'])) { 
    header("Location: /~uapv2500198/connexion");
    exit();
}

// Génération d'un jeton CSRF pour la protection contre les attaques CSRF
if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

$racine_path = '../';
$titre = 'Nos Véhicules';
include($racine_path . "templates/header.php");

echo '<main class="row mb-2">';

require_once($racine_path . 'model/Voiture.php');
require_once($racine_path . 'model/Client.php');
require_once($racine_path . 'model/Reservation.php');

use db\Voiture;
use db\Client;
use db\Reservation;

$voitureDB =  new Voiture();
$message = "";

// Traitement des données du formulaire après soumission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification du jeton CSRF
    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die("<div class='message-box ERREUR'><p>Erreur CSRF : Jeton invalide.</p><a href='/~uapv2400040/' class='btn'>Retour</a></div>");
    }

    // Récupération et validation des données du formulaire
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $id_voiture = intval($_POST['id_voiture']);
    $date_debut = trim($_POST['date_debut']);
    $date_fin = trim($_POST['date_fin']);

    // Vérification de la validité des données saisies
    if (empty($email) || empty($id_voiture) || empty($date_debut) || empty($date_fin)) {
        $message = "Erreur : Tous les champs sont obligatoires.";
        $cas = "error";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Erreur : Email invalide.";
        $cas = "error";
    } else {
        // Vérification de l'existence du client dans la base de données
        $client = new Client();
        $id_client = $client->getClientIdByEmail($email);

        // Si le client n'existe pas
        if (!$id_client) {
            $message = "Erreur : Client non trouvé.";
            $cas = "error";
        } else {
            // Vérification de la disponibilité de la voiture pour la période demandée
            $reservation = new Reservation();
            if ($reservation->estVoitureReservee($id_voiture, $date_debut, $date_fin)) {
                $message = "Erreur : La voiture est déjà réservée pendant cette période.";
                $cas = "error";
            } else {
                // Ajout de la réservation si la voiture est disponible
                if ($reservation->ajouterReservation($id_client, $id_voiture, $date_debut, $date_fin)) {
                    $message = "Réservation ajoutée avec succès !";
                    $cas = "success";
                } else {
                    $message = "Erreur : Impossible d'ajouter la réservation.";
                    $cas = "error";
                }
            }
        }
    }

    // Affichage du message de succès ou d'erreur
    die("<div class='message-box $cas'><p>$message</p><a href='/~uapv2500198/' class='btn'>Retour</a></div>");
}

// Affichage du formulaire de réservation
require($racine_path . 'templates/formulairereservation.php');
include($racine_path . "templates/footer.php");

?>
