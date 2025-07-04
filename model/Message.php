<?php
namespace db;
include ("../class/Message.php");
require_once 'GestionDB.php'; // Assurez-vous d'avoir un fichier qui gère la connexion à la BDD

use PDO;
use db\GestionDB;

/**
 * Classe représentant la gestion des messages dans la base de données.
 */
class Message {

    /**
     * Ajouter un message dans la base de données.
     *
     * Cette méthode permet d'ajouter un message dans la table "message" en 
     * liant un client à un message spécifique.
     *
     * @param int $id_client L'identifiant du client associé au message.
     * @param string $contenu Le contenu du message à ajouter.
     * 
     * @return bool Retourne vrai si le message a été ajouté avec succès, sinon faux.
     */
    public function ajouterMessage($id_client, $contenu) {
        $db= new GestionDB();
        $db->connexion();
        $sql = "INSERT INTO message (id_client, contenu) VALUES (:id_client, :contenu)";
        $stmt = $db->pdo->prepare($sql);
        return $stmt->execute([
            ':id_client' => $id_client,
            ':contenu' => $contenu
        ]);
        $db->deconnexion();
    }
}
?>
