<?php
/**
 * Page de gestion de l'inscription des clients.
 *
 * Cette page permet aux utilisateurs de s'inscrire en créant un nouveau compte sur le site.
 * Elle inclut la validation des informations du formulaire, l'ajout d'un nouveau client dans la base de données, 
 * ainsi que la gestion de la sécurité avec un token CSRF pour éviter les attaques de type Cross-Site Request Forgery.
 *
 * @package Control
 * @category User Registration
 * @version 1.0
 */

// Démarrage de la session
session_start();

// Inclusion du fichier header pour afficher le début de la page HTML
include("../templates/header.php");

// Inclusion du modèle Client pour la gestion des clients dans la base de données
require("../model/Client.php");
use db\Client;

// Génération d'un jeton CSRF si non déjà présent
if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));  // Génération d'un jeton CSRF unique
}

$message = ""; // Variable pour stocker les messages à afficher à l'utilisateur
$db = new Client(); // Instantiation de la classe Client pour interagir avec la base de données

// Vérification de la méthode de requête (ici POST, donc soumission de formulaire)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Vérification du jeton CSRF pour sécuriser le formulaire contre les attaques CSRF
    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die("<div class='message-box ERREUR'><p>Erreur CSRF : Jeton invalide.</p><a href='../index.php' class='btn'>Retour</a></div>");
    }

    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];
    $confirm = $_POST['confirm-password'];
    $telephone = $_POST['telephone'];

    // Validation des mots de passe
    if ($mot_de_passe !== $confirm) {
        $message = "Les mots de passe ne correspondent pas.";
    } else {

        // Tentative d'ajout du client à la base de données
        $success = $db->ajouterClient($nom, $prenom, $email, $mot_de_passe, $telephone);

        // Vérification du succès de l'opération
        if ($success) {
            $message = "Compte créé avec succès ! Vous pouvez maintenant vous connecter.";
            $cas = 'succes';
        } else {
            $message = "Une erreur est survenue lors de l'enregistrement.";
            $cas = 'ERROR';
        }
    }

    // Affichage du message de succès ou d'erreur et redirection
    die("<div class='message-box $cas'><p>$message</p><a href='/~uapv2500198/' class='btn'>Retour</a></div>");
}

// Inclusion du formulaire d'inscription
include("../templates/formulaireregestrer.php");

// Inclusion du footer de la page
include("../templates/footer.php");
?>
