<?php
session_start();

/**
 * un ficher control pour l'ajouter d'une voiture vers la base de donnees . en utulisant la methode ajouteVoiture de la class admin 
 */
// Vérifie si l'utilisateur est connecté en vérifiant la session
if (!isset($_SESSION['user_id']) ) { 
    header("Location: /~uapv2400040/admin/");
    exit();
}
// Génère un jeton CSRF pour protéger contre les attaques de type CSRF
if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
$racine_path = '../';
$titre = 'Ajouter un Véhicule';

include($racine_path . "templates_back/header.php");
echo '<main class="row mb-2">';

// Importation de la classe nécessaire pour gérer l'ajout de véhicule
require_once($racine_path . 'model/Voiture.php');

use bd\Voiture;

$voitureDB = new Voiture();
$message = ""; // Variable pour stocker les messages d'erreur ou de succès

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die("<div class='message-box ERREUR'><p>Erreur CSRF : Jeton invalide.</p><a href='../templates_back/accueil.php' class='btn'>Retour</a></div>");
    }
    // Récupération et validation des données
    $marque = trim($_POST['marque']);
    $modele = trim($_POST['modele']);
    $immatriculation = trim($_POST['immatriculation']);
    $annee = intval($_POST['annee']);
    $prix = floatval($_POST['prix']);
    $caution = floatval($_POST['Caution']);
    $type = trim($_POST['type']);

    $imagePath='../images/'.$marque.'.jpg';

    // Vérification des champs
    if (empty($marque) || empty($modele) || empty($immatriculation) || empty($annee) || empty($prix) || empty($caution) || empty($type)) {
        $cas= 'error';
        $message = "Erreur : Tous les champs sont obligatoires.";
    } else {
        // Création d'une instance et ajout de la voiture
        $voiture = new Voiture();
        if ($voiture->ajouterVoiture($marque, $modele, $immatriculation, $annee, $prix, $caution, $type, $imagePath)) {
            $cas = 'success';
            $message = "Véhicule ajouté avec succès !";
        } else {
            $cas = 'error';
            $message = "Erreur : Impossible d'ajouter le véhicule.";
        }
    }

    die("<div class='message-box $cas'><p>$message</p><a href='/~uapv2400040/admin/accueil' class='btn'>Retour</a></div>");
}
require($racine_path . 'templates_back/ajoutervoiture.php');
include($racine_path . "templates_back/footer.php");
?>
