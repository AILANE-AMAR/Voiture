<?php
/**
 * Page qui affiche la liste des véhicules disponibles avec leurs informations et liens.
 * 
 * Cette page vérifie d'abord si un utilisateur est connecté en utilisant la session.
 * Ensuite, elle récupère toutes les voitures disponibles dans la base de données et les affiche sous forme de carte.
 * Chaque voiture est affichée avec son image, marque et un lien vers sa fiche détaillée.
 * 
 * @package Control
 * @category Vehicle Display
 * @version 1.0
 */

session_start(); // Démarre la session pour vérifier l'authentification de l'utilisateur

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de connexion
if (!isset($_SESSION['user_id'])) { 
    header("Location: /~uapv2500198/connexion"); // Redirige vers la page de connexion
    exit(); // Arrête l'exécution du script après la redirection
}

$racine_path = '../'; // Définir le chemin vers le dossier racine

$titre = 'Nos Véhicules'; // Titre de la page
include($racine_path."templates/header.php"); // Inclut l'entête du site

echo '<main class="row mb-2">'; // Début du contenu principal
echo '<div class="vehicle-grid">'; // Conteneur pour afficher les véhicules sous forme de grille

require($racine_path.'model/Voiture.php'); // Inclut le modèle de données pour les véhicules
use db\Voiture; // Utilise la classe Voiture du modèle de données

$voitureBD = new Voiture(); // Crée une instance de la classe Voiture

// Parcourt chaque véhicule de la base de données et affiche les informations associées
foreach ($voitureBD->afficherVoiture() as $tableau){
    $id_voiture = $tableau->id_voiture; // Récupère l'ID du véhicule
    $lien_image_voiture = $tableau->image; // Récupère le lien de l'image du véhicule
    $marque_voiture = $tableau->getMarque(); // Récupère la marque du véhicule
    $lien_fiche_voiture = "/~uapv2500198/voiture-$id_voiture"; // Crée le lien vers la fiche détaillée du véhicule

    include($racine_path."templates/carte_voiture.php"); // Inclut le modèle pour chaque carte de véhicule
}

echo '</div>'; // Fermeture du conteneur de la grille
echo '</main>'; // Fermeture du contenu principal

include($racine_path."templates/footer.php"); // Inclut le pied de page du site
?>
