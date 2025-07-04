<?php
namespace bd;

include ("../class/Message.php");
require_once 'ConnexionDB.php';

use PDO;
use bd\ConnexionDB;

/**
 * Classe Message
 * Permet de gérer les messages dans la base de données (afficher, supprimer, etc.)
 */
class Message {

    /**
     * Récupère tous les messages de la base de données.
     * 
     * @return array Liste des messages (objets Message)
     */
    public function afficherTousLesMessages() {
        $db = new ConnexionDB();
        $db->connexion();
        $sql = "SELECT * FROM message";
        $stmt = $db->pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classes\Message');
        $stmt->execute();
        $messages = $stmt->fetchAll();    

        $db->deconnexion();
        return $messages;
    }

    /**
     * Supprime un message par son identifiant.
     * 
     * @param int $id L'identifiant du message à supprimer
     * @return bool Retourne true si la suppression a réussi, false sinon
     */
    public function supprimerMessage($id) {
        $BD = new ConnexionDB();
        $BD->connexion();

        $sql = "DELETE FROM message WHERE id_message = ?";
        $stat = $BD->pdo->prepare($sql);
        $success = $stat->execute([$id]);

        $BD->deconnexion();
        return $success;
    }
}
?>
