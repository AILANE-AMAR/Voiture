<?php
/**
 * Affiche la liste des véhicules et leurs informations tarifaires.
 * 
 * Ce script récupère et affiche la liste des véhicules disponibles pour la location, 
 * avec leurs prix journaliers et cautions associées. Il vérifie d'abord si un utilisateur est connecté 
 * via la session, puis affiche les véhicules sous forme de tableau en utilisant des données extraites de la base de données.
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

require($racine_path.'model/Voiture.php'); // Inclut le modèle de données pour les véhicules
use db\Voiture; // Utilise la classe Voiture du modèle de données

$voitureBD = new Voiture(); // Crée une instance de la classe Voiture
require($racine_path.'templates/tableautarif.php'); // Inclut le tableau des tarifs des véhicules

// Parcourt chaque véhicule de la base de données et affiche les informations associées
foreach ($voitureBD->afficherVoiture() as $tableau) {
    $id_voiture = $tableau->id_voiture; // Récupère l'ID du véhicule
    $lien_image_voiture = $tableau->image; // Récupère le lien de l'image du véhicule
    $marque_voiture = $tableau->getMarque(); // Récupère la marque du véhicule
    $model = $tableau->modele; // Récupère le modèle du véhicule
    $prix = $tableau->prix_journalier; // Récupère le prix journalier du véhicule
    $caution = $tableau->caution; // Récupère la caution du véhicule
    $lien_fiche_voiture = $racine_path."control/voiture.php?id=$id_voiture"; // Crée le lien vers la fiche détaillée du véhicule

    include($racine_path."templates/menutarif.php"); // Inclut le modèle de menu pour chaque véhicule
}

include($racine_path."templates/footertarif.php"); // Inclut le pied de page des tarifs
include($racine_path."templates/footer.php"); // Inclut le pied de page général
?>
