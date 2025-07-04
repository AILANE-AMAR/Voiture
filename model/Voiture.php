<?php
namespace db ;
use \PDO;
include ("../class/Voiture.php");

require_once('../model/GestionDB.php');

use db\GestionDB;

/**
 * Classe représentant la gestion des voitures dans la base de données.
 */
class Voiture {

    /**
     * Afficher toutes les voitures disponibles dans la base de données.
     *
     * Cette méthode récupère toutes les informations des voitures disponibles 
     * dans la base de données et retourne les résultats sous forme d'un tableau.
     * 
     * @return array Un tableau d'objets représentant les voitures disponibles.
     */
    function afficherVoiture(){
        $db = new GestionDB();
        $db->connexion();
        $sql = 'SELECT * from voiture;';
        $stat = $db->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Voiture');
        $stat->execute();
        $voitures = $stat->fetchAll();
        $db->deconnexion();

        return $voitures;
    }

    /**
     * Récupérer une voiture spécifique par son identifiant.
     *
     * Cette méthode récupère les informations d'une voiture spécifique
     * à partir de son identifiant.
     *
     * @param int $id L'identifiant de la voiture à récupérer.
     * @return object|false L'objet représentant la voiture ou false si la voiture n'existe pas.
     */
    public function getVoiture($id) {
        $BD = new GestionDB(); 
        $BD->connexion();
        $sql = 'SELECT * from voiture WHERE id_voiture = :id_voiture'; 
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_voiture', $id, PDO::PARAM_INT);
        $stat->execute();
        $voiture = $stat->fetch(PDO::FETCH_OBJ);
        $BD->deconnexion();
        if (!$voiture) {
            header('HTTP/1.0 404 Not Found');
            exit;
        }
        return $voiture;
    }
}
?>
