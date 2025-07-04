<?php
session_start();
/**
 * un ficher control pour l'ajouter d'un admin vers la base de donnees . en utulisant la methode ajouteAdmin de la class admin 
 */

// Vérifie si l'utilisateur est connecté en vérifiant la session

// Génère un jeton CSRF pour protéger contre les attaques de type CSRF
if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
$racine_path = '../';
$titre = 'Ajouter un Client';

include($racine_path . "templates_back/header.php");
echo '<main class="row mb-2">';

require_once($racine_path . 'model/Admin.php');

use bd\Admin;

$message = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die("<div class='message-box ERREUR'><p>Erreur CSRF : Jeton invalide.</p><a href='../templates_back/accueil.php' class='btn'>Retour</a></div>");
    } 
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $telephone = trim($_POST['telephone']);
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $role = 'admin';


    if (empty($nom) || empty($prenom) || empty($email) || empty($telephone) || empty($mot_de_passe)) {
        $cas= 'error';
        $message = "Erreur : Tous les champs sont obligatoires.";
    } else {

        $Admin = new Admin();

        if ($Admin->ajouterAdmin($nom, $prenom, $email, $telephone, $mot_de_passe, $role)) {
            $cas = 'success';
            $message = "Admin ajouté avec succès !";
        } else {
            $cas = 'error';
            $message = "Erreur : Impossible d'ajouter l'Admin.";
        }
        
    }
    die("<div class='message-box $cas'><p>$message</p><a href='/~uapv2500198/admin/accueil' class='btn'>Retour</a></div>");
    exit();
}

require($racine_path . 'templates_back/ajouterAdmin.php');
include($racine_path . "templates_back/footer.php");
?>
