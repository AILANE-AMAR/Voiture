<?php
/**
 * Page qui affiche la fiche d'un véhicule spécifique.
 * 
 * Cette page récupère les informations d'un véhicule spécifique basé sur son ID passé via l'URL.
 * Elle affiche les informations du véhicule, comme la marque, l'image, le modèle, le prix et la caution.
 * Un cookie est également mis en place pour mémoriser le dernier véhicule consulté par l'utilisateur.
 * 
 * @package Control
 * @category Vehicle Details
 * @version 1.0
 */

session_start(); // Démarre la session pour vérifier si l'utilisateur est connecté

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page d'accueil de l'admin
if (!isset($_SESSION['user_id'])) { 
    header("Location: /~uapv2500198/admin/index.php");
    exit(); // Arrête l'exécution du script après la redirection
}

$racine_path = '../'; // Définir le chemin vers le dossier racine

require($racine_path.'model/Voiture.php'); // Inclut le modèle de données pour les véhicules
use db\Voiture; // Utilise la classe Voiture du modèle de données

$voitureBD = new Voiture(); // Crée une instance de la classe Voiture

// Vérifie si l'ID du véhicule est passé dans l'URL
if (isset($_GET['id'])) {
    // Récupère les informations du véhicule correspondant à l'ID passé dans l'URL
    $voiture = $voitureBD->getVoiture($_GET['id']);
    
    // Assigne les valeurs récupérées du véhicule à des variables pour l'affichage
    $nom_voiture = $voiture->marque;
    $image_voiture = $voiture->image;
    $titre = $voiture->marque;
    $prix = $voiture->prix_journalier;
    $caution = $voiture->caution;
    $modele = $voiture->modele;
    
    // Définit la durée d'expiration du cookie (30 jours)
    $cookie_expiry = time() + 60 * 60 * 24 * 30; 
    // Crée un cookie pour mémoriser le dernier véhicule visité
    setcookie('last_visited_car', $_GET['id'], $cookie_expiry, '/'); 
    
    include($racine_path."templates/header.php"); // Inclut l'entête du site
    
    echo '<main>'; // Début du contenu principal
        
    include($racine_path."templates/fichevoiture.php"); // Inclut le modèle pour afficher la fiche du véhicule
    
    echo '</main>'; // Fermeture du contenu principal
} else {
    // Si l'ID du véhicule n'est pas fourni, renvoie une erreur 404
    header('HTTP/1.0 404 Not Found');
    exit(); // Arrête l'exécution du script
}

// Inclut le pied de page du site
include($racine_path."templates/footer.php");
?>
