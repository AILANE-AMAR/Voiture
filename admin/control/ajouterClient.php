<?php
session_start();
/**
 * un ficher control pour l'ajouter d'un client vers la base de donnees . en utulisant la methode ajouteClient de la class admin 
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
$titre = 'Ajouter un Client';

include($racine_path . "templates_back/header.php");
echo '<main class="row mb-2">';

// Importation de la classe nécessaire pour gérer l'ajout de client
require_once($racine_path . 'model/Client.php');

use bd\Client;

$clientDB = new Client();
$message = ""; // Variable pour stocker les messages d'erreur ou de succès

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die("<div class='message-box ERREUR'><p>Erreur CSRF : Jeton invalide.</p><a href='/~uapv2500198/admin/accueil' class='btn'>Retour</a></div>");
    } 
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $telephone = trim($_POST['telephone']);
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $role = 'client'; // On ajoute toujours un client par défaut

    // Vérification des champs
    if (empty($nom) || empty($prenom) || empty($email) || empty($telephone) || empty($mot_de_passe)) {
        $cas = 'error';
        $message = "Erreur : Tous les champs sont obligatoires.";
    } else {
        // Création d'une instance et ajout du client
        $client = new Client();
        if ($client->ajouterClient($nom, $prenom, $email, $telephone, $mot_de_passe, $role)) {
            $cas = 'success';
            $message= "Client ajouté avec succès !";
        } else {
            $cas= 'error';
            $message= "Erreur : Impossible d'ajouter le client.";
        }
    }

    die("<div class='message-box $cas'><p>$message</p><a href='/~uapv2500198/admin/accueil' class='btn'>Retour</a></div>");
}

require($racine_path . 'templates_back/ajouteclient.php');
include($racine_path . "templates_back/footer.php");
?>
