<?php
/**
 * Page pour l'envoi de messages.
 *
 * Cette page permet aux utilisateurs de soumettre un message via un formulaire.
 * Le message est envoyé à un administrateur par email, et enregistré dans la base de données.
 *
 * @package Control
 * @category Contact Message Handling
 * @version 1.0
 */

session_start(); 

// Vérification de la présence d'un utilisateur connecté
if (!isset($_SESSION['user_id'])) { 
    header("Location: /~uapv2500198/connexion");
    exit();
}

// Génération d'un jeton CSRF s'il n'existe pas
if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

$racine_path = '../';
$titre = 'Envoyer un Message';
echo '<main class="row mb-2">';

require_once($racine_path . 'model/Client.php');
require_once($racine_path . 'model/Message.php'); 

use db\Client;
use db\Message;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données envoyées par le formulaire
    $email = trim($_POST['email']);
    $contenu = trim($_POST['contenu']);

    // Vérification basique des données du formulaire
    if (empty($email) || empty($contenu)) {
        die("<p>Erreur : tous les champs sont obligatoires.</p><a href='/~uapv2500198/'>Retour</a>");
    }

    // Validation de l'adresse email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("<p>Erreur : adresse email invalide.</p><a href='/~uapv2500198/'>Retour</a>");
    }

    // Vérification de l'existence de l'email dans la base de données
    $client = new Client();
    if (!$client->getClientIdByEmail($email)) {
        echo "<p> Erreur : l'email n'existe pas dans la base de données.</p><a href='/~uapv2500198/inscription'>Retour</a>";
        exit(); 
    } else {
        // Récupération de l'ID client et ajout du message dans la base de données
        $id_client = $client->getClientIdByEmail($email);
        $messageDB = new Message();
        $messageDB->ajouterMessage($id_client, $contenu); 
        
        // Envoi du message par email à l'administrateur
        $to = 'amar.ailane@alumni.univ-avignon.fr';
        $subject = 'Nouveau message depuis Elite Cars Rental';
        $message = "De : $email\n\nMessage :\n$contenu";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Vérification de l'envoi de l'email
        if (mail($to, $subject, $message, $headers)) {
            echo "<p> Message envoyé avec succès !</p><a href='/~uapv2500198/'>Retour</a>";
        } else {
            echo "<p>Erreur : le message n'a pas pu être envoyé.</p><a href='/~uapv2500198/'>Retour</a>";
        }
    }
    exit();
}

// Affichage du formulaire pour l'envoi de message
include($racine_path . "templates/header.php");
require($racine_path . 'templates/formulairemessage.php');
include($racine_path . "templates/footer.php");
?>
