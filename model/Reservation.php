<?php
namespace db ;
use \PDO;
include ("../class/Reservations.php");

require_once('../model/GestionDB.php');

use db\GestionDB;

/**
 * Classe représentant la gestion des réservations dans la base de données.
 */
class Reservation {

    /**
     * Afficher toutes les réservations dans la base de données.
     *
     * Cette méthode récupère toutes les réservations enregistrées dans la base de données
     * et retourne les informations sous forme d'un tableau d'objets.
     * 
     * @return array Un tableau d'objets représentant les réservations.
     */
    function afficherreservation(){
        $db = new GestionDB();
        $db->connexion();
        $sql = 'SELECT * from reservation ;';
        $stat = $db->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Reservation');
        $stat->execute();
        $voitures = $stat->fetchAll();
        $db->deconnexion();

        return $voitures;
    }

    /**
     * Récupérer une réservation spécifique par son identifiant.
     *
     * Cette méthode récupère les informations d'une réservation spécifique
     * à partir de son identifiant.
     *
     * @param int $id L'identifiant de la réservation.
     * @return object|false L'objet représentant la réservation ou false si la réservation n'existe pas.
     */
    public function getreservation($id) {
        $BD = new GestionDB(); 
        $BD->connexion();
        $sql = 'SELECT * from reservation WHERE id_reservation = :id_reservation'; 
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_reservation', $id, PDO::PARAM_INT);
        $stat->execute();
        $voiture = $stat->fetch(PDO::FETCH_ASSOC);
        $BD->deconnexion();
        if (!$reservation) {
            header('HTTP/1.0 404 Not Found');
            exit;
        }
        return $reservation;
    }

    /**
     * Ajouter une réservation à la base de données.
     *
     * Cette méthode permet d'ajouter une nouvelle réservation en précisant
     * l'identifiant du client, de la voiture et les dates de début et de fin.
     *
     * @param int $id_client L'identifiant du client.
     * @param int $id_voiture L'identifiant de la voiture.
     * @param string $date_debut La date de début de la réservation.
     * @param string $date_fin La date de fin de la réservation.
     * @return bool Retourne true si la réservation a été ajoutée avec succès, sinon false.
     */
    public function ajouterReservation($id_client, $id_voiture, $date_debut, $date_fin) {
        $db = new GestionDB();
        $db->connexion();
    
        try {
            $sql = "INSERT INTO reservation (id_client, id_voiture, date_debut, date_fin, statut) 
                    VALUES (?, ?, ?, ?, 'en attente')";
            $stat = $db->pdo->prepare($sql);
            $stat->execute([$id_client, $id_voiture, $date_debut, $date_fin]);
    
            // Retourner vrai si l'insertion réussie
            return true;
        } catch (Exception $e) {
            // Si une erreur se produit, afficher l'erreur
            echo 'Erreur lors de l\'ajout de la réservation : ' . $e->getMessage();
            return false;
        } finally {
            $db->deconnexion();
        }
    }

    /**
     * Vérifier si une voiture est déjà réservée pendant une période donnée.
     *
     * Cette méthode permet de vérifier si une voiture est déjà réservée pour
     * la période définie par les dates de début et de fin.
     *
     * @param int $id_voiture L'identifiant de la voiture à vérifier.
     * @param string $date_debut La date de début de la réservation.
     * @param string $date_fin La date de fin de la réservation.
     * @return bool Retourne true si la voiture est réservée, sinon false.
     */
    public function estVoitureReservee($id_voiture, $date_debut, $date_fin) {
        $db=new GestionDB();
        $db->connexion();
        $query = "SELECT * FROM reservation 
                  WHERE id_voiture = :id_voiture 
                  AND statut = 'validée'
                  AND (
                      (:date_debut BETWEEN date_debut AND date_fin)
                      OR (:date_fin BETWEEN date_debut AND date_fin)
                      OR (date_debut BETWEEN :date_debut AND :date_fin)
                  )";
        
        $stmt = $db->pdo->prepare($query);
        $stmt->execute([
            ':id_voiture' => $id_voiture,
            ':date_debut' => $date_debut,
            ':date_fin' => $date_fin
        ]);
        
        return $stmt->rowCount() > 0;
    }
}
?>
