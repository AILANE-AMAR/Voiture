<?php 
namespace bd ;
use \PDO;
include ("../class/Client.php");

require_once('ConnexionDB.php');

use bd\ConnexionDB;
class Client {
        /**
     * Récupère tous les clients de la base de données.
     * 
     * @return array Liste des clients (objets Client)
     */
function afficherClient(){
    $db = new ConnexionDB();
    $db->connexion();
    $sql = "SELECT * FROM utilisateurs WHERE role = 'client';";
    $stat = $db->pdo->prepare($sql);
    $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classes\Client');
    $stat->execute();
    $clients= $stat->fetchAll();
    $db->deconnexion();

    return $clients;
}
    /**
     * Récupère un client spécifique en fonction de son ID.
     * 
     * @param int $id L'identifiant du client
     * @return object Client L'objet représentant le client
     * @throws 404 Si le client n'est pas trouvé
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
     * Ajoute un nouveau client dans la base de données.
     * 
     * @param string $nom Le nom du client
     * @param string $prenom Le prénom du client
     * @param string $email L'email du client
     * @param string $telephone Le numéro de téléphone du client
     * @param string $mot_de_passe Le mot de passe du client
     * @param string $role Le rôle du client (par exemple "client")
     * @return bool Retourne true si l'ajout a réussi, false sinon
     */
public function ajouterClient($nom, $prenom, $email, $telephone, $mot_de_passe, $role) {
    $db = new ConnexionDB();
    $db->connexion();

    if (!$db->pdo) {
        die("Erreur : La connexion à la base de données a échoué.");
    }

    $sql = "INSERT INTO utilisateurs (nom, prenom, email, telephone, mot_de_passe, role, date_inscription) 
            VALUES (:nom, :prenom, :email, :telephone, :mot_de_passe, :role, NOW())";

    $stmt = $db->pdo->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe);
    $stmt->bindParam(':role', $role);

    $resultat = $stmt->execute();
    $db->deconnexion();
    
    return $resultat;
}
    /**
     * Récupère l'ID d'un client en fonction de son email.
     * 
     * @param string $email L'email du client
     * @return int|null L'ID du client ou null si non trouvé
     */
public function getClientIdByEmail($email) {
    $db = new ConnexionDB();
    $db->connexion();
    $sql = "SELECT id FROM utilisateurs WHERE email = ?";
    $stmt = $db->pdo->prepare($sql);
    $stmt->execute([$email]);
    $client = $stmt->fetch();
    $db->deconnexion();
    return $client ? $client['id'] : null;
}
    /**
     * Supprime un client de la base de données.
     * 
     * @param int $id L'identifiant du client à supprimer
     * @return bool Retourne true si la suppression a réussi, false sinon
     */
public function supprimerClient($id) {
    $db = new ConnexionDB();
    $db->connexion();
    $sql = "DELETE FROM utilisateurs WHERE id = :id";
    $stmt = $db->pdo->prepare($sql);
    return $stmt->execute([':id' => $id]);
    $db=deconnexion();
}

}