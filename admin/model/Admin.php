<?php
namespace bd ;
use \PDO;
include ("../class/Admin.php");

include ("ConnexionDB.php");
use bd\ConnexionDB;
class Admin {
     /**
     * Récupère tous les administrateurs de la base de données.
     * 
     * @return array Liste des administrateurs (objets Admin)
     */
    function afficherAdmin(){
        $db = new ConnexionDB();
        $db->connexion();
        $sql = "SELECT * FROM utilisateurs WHERE role = 'admin';";
        $stat = $db->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classes\Admin');
        $stat->execute();
        $admins= $stat->fetchAll();
        $db->deconnexion();
    
        return $admins;
    }
        /**
     * Ajoute un nouvel administrateur dans la base de données.
     * 
     * @param string $nom Le nom de l'administrateur
     * @param string $prenom Le prénom de l'administrateur
     * @param string $email L'email de l'administrateur
     * @param string $telephone Le numéro de téléphone de l'administrateur
     * @param string $mot_de_passe Le mot de passe de l'administrateur
     * @param string $role Le rôle de l'administrateur (par exemple "admin")
     * @return bool Retourne true si l'ajout a réussi, false sinon
     */
    public function ajouterAdmin($nom, $prenom, $email, $telephone, $mot_de_passe, $role) {
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
}
    
