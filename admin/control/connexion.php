<?php
session_start(); 
/**
 * un fichier pour se conneecter , en verifions si l'admin existe deja dans ma base de donnes 
 *  si il existe en crier la session si non affcihe un mesage d'erreur . 
 * 
 */
// verifier dans la session est ce que le user et connecter ou pas 
$racine_path = '../';
$titre = 'Connexion';

require($racine_path . "model/ConnexionDB.php");
use bd\ConnexionDB;

$message = "";  // Pour afficher les erreurs

if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
    $DB = new ConnexionDB();
    $DB->connexion();

    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    if (!$DB->pdo) {
        die("Erreur de connexion à la base de données.");
    }

    $stmt = $DB->pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $message = "Aucun utilisateur trouvé avec cet email et ce rôle.";
    } 
    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id'];
        setcookie($user['id'], $user['mot_de_passe'], time() +60*60);
        header('Location: /~uapv2500198/admin/accueil');
        exit;
    } else {
        die("Mot de passe incorrect.");
    }
}
?>
