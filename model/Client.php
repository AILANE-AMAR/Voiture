<?php 
namespace db ;
use \PDO;
include ("../class/Client.php");

require_once('../model/GestionDB.php');


use db\GestionDB;
class Client {
/**
 * recurper tout les informations  d'un dlient a l'aide de son id 
 * @param le id de client 
 * @return l'objet de client 
 */
public   function getClient($id) {
    $BD = new ConnexionDB(); 
    $BD->connexion();
    $sql = 'SELECT * from utilisateurs WHERE id = :id'; 
    $stat = $BD->pdo->prepare($sql);
    $stat->bindParam('id', $id, PDO::PARAM_INT);
    $stat->execute();
    $client = $stat->fetch(PDO::FETCH_ASSOC);
    $BD->deconnexion();
    if (!$client) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
    return $client;
}
/**
 * une methode pour ajouter un client a l'aide de ces information
 * @param tout les attributs 
 */
public function ajouterClient($nom, $prenom, $email, $mot_de_passe, $telephone) {
    try {
        $BD = new GestionDB(); 
        $BD->connexion();

        $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, telephone, role)
                VALUES (:nom, :prenom, :email, :mot_de_passe, :telephone, 'client')";

        $stmt = $BD->pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);

        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe_hash);

        $stmt->bindParam(':telephone', $telephone);

        $stmt->execute();
        $BD->deconnexion();

        return true;
    } catch (PDOException $e) {
        echo "Erreur SQL : " . $e->getMessage(); // Debug
        return false;
    }
}

/**
 * une methode ou je vais recuperer le id d'un clint a l'aide de email 
 * @param email de client 
 * @return le id de client  
 */
public function getClientIdByEmail($email) {
    $db = new GestionDB();
    $db->connexion();
    $sql = "SELECT id FROM utilisateurs WHERE email = ?";
    $stmt = $db->pdo->prepare($sql);
    $stmt->execute([$email]);
    $client = $stmt->fetch();
    $db->deconnexion();
    return $client ? $client['id'] : null;
}
}