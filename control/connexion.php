<?php
/**
 * Script de gestion de la connexion à l'espace utilisateur.
 *
 * Ce script gère la logique de connexion à l'application. Il vérifie si l'utilisateur a accepté les cookies,
 * génère un jeton CSRF pour sécuriser le formulaire, et valide les informations de connexion fournies par l'utilisateur.
 * Si les informations sont correctes, l'utilisateur est redirigé vers la page d'accueil.
 * 
 * @package Control
 * @category Connexion
 * @version 1.0
 */

// Démarre la session pour gérer les variables de session
session_start();

// Affichage de la demande d'acceptation des cookies si non acceptés
if (!isset($_COOKIE['accept_cookies'])) {
    // Afficher le message d'acceptation des cookies
    echo '<div class="cookie-banner">';
    echo '<p>Ce site utilise des cookies pour améliorer votre expérience. En continuant à utiliser ce site, vous acceptez notre politique de cookies.</p>';
    echo '<form method="POST" action="">';
    echo '<button type="submit" name="accept_cookies" value="yes">Accepter</button>';
    echo '</form>';
    echo '</div>';
}

// Vérifie si l'utilisateur a accepté les cookies et crée un cookie pour cette acceptation
if (isset($_POST['accept_cookies']) && $_POST['accept_cookies'] == 'yes') {
    setcookie('accept_cookies', 'yes', time() + 60*60*24, '/~uapv2500198/');
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

/**
 * Génération du token CSRF s'il n'existe pas
 */
if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32)); // Génération d'un jeton CSRF
}

$racine_path = '../'; // Définir le chemin de base
$titre = 'Connexion'; // Titre de la page

// Inclure l'en-tête de la page
include($racine_path . "templates/header.php");

$message = ""; // Initialisation du message

// Inclusion de la gestion de la base de données
require($racine_path . "model/GestionDB.php");
use db\GestionDB;

// Vérification si le formulaire a été soumis via la méthode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérification du token CSRF pour sécuriser le formulaire
    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die("<div class='message-box ERREUR'><p>Erreur CSRF : Jeton invalide.</p><a href='../index.php' class='btn'>Retour</a></div>");
    }

    // Connexion à la base de données
    $DB = new GestionDB();
    $DB->connexion();

    // Récupération et sécurisation des entrées utilisateur
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe', FILTER_SANITIZE_STRING);

    // Vérification que l'email et le mot de passe sont bien renseignés
    if (!$email || !$mot_de_passe) {
        die("<div class='message-box ERREUR'><p>Veuillez remplir tous les champs correctement.</p><a href='../index.php' class='btn'>Retour</a></div>");
    }

    // Recherche de l'utilisateur dans la base de données
    $stmt = $DB->pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fermeture de la connexion
    $DB->deconnexion();

    // Vérification des informations de l'utilisateur
    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id']; // Stockage de l'ID utilisateur dans la session
        setcookie($user['id'], $user['mot_de_passe'], time() +60*60); // Création d'un cookie pour l'utilisateur
        header('Location: /~uapv2500198/index.php'); // Redirection vers la page d'accueil
        exit;
    } else {
        $message = "Identifiants incorrects !"; // Message d'erreur si les informations sont incorrectes
    }
}

$action = ""; // Action par défaut du formulaire
$method = "POST"; // Méthode HTTP utilisée pour soumettre le formulaire

// Inclusion du formulaire de connexion
include($racine_path . "templates/formulaireconnexion.php");

// Inclusion du pied de page
include($racine_path . "templates/footer.php");
?>
