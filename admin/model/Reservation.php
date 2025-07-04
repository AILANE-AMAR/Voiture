<?php
namespace bd;

use \PDO;
include ("../class/Reservation.php");

require_once('ConnexionDB.php');
use bd\ConnexionDB;

/**
 * Classe Reservation
 * Gère les opérations liées aux réservations : afficher, ajouter, supprimer, valider, annuler, etc.
 */
class Reservation {

    /**
     * Récupère toutes les réservations de la base de données.
     * 
     * @return array Liste des réservations (objets Reservation)
     */
    function afficherReservations() {
        $db = new ConnexionDB();
        $db->connexion();
        $sql = 'SELECT * FROM reservation;';
        $stat = $db->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classes\Reservation');
        $stat->execute();
        $reservations = $stat->fetchAll();
        $db->deconnexion();

        return $reservations;
    }

    /**
     * Récupère une réservation spécifique par son identifiant.
     * 
     * @param int $id ID de la réservation
     * @return object Reservation trouvée
     */
    public function getreservation($id) {
        $BD = new ConnexionDB(); 
        $BD->connexion();
        $sql = 'SELECT * FROM reservation WHERE id_reservation = :id_reservation'; 
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_reservation', $id, PDO::PARAM_INT);
        $stat->execute();
        $reservation = $stat->fetch(PDO::FETCH_OBJ);
        $BD->deconnexion();

        if (!$reservation) {
            header('HTTP/1.0 404 Not Found');
            exit;
        }

        return $reservation;
    }

    /**
     * Ajoute une nouvelle réservation dans la base de données.
     * 
     * @param int $id_client ID du client
     * @param int $id_voiture ID de la voiture réservée
     * @param string $date_debut Date de début de la réservation
     * @param string $date_fin Date de fin de la réservation
     * @return bool Succès ou échec de l'ajout
     */
    public function addReservation($id_client, $id_voiture, $date_debut, $date_fin) {
        $BD = new ConnexionDB(); 
        $BD->connexion();

        try {
            $sql = "INSERT INTO reservation (id_client, id_voiture, date_debut, date_fin, statut) 
                    VALUES (?, ?, ?, ?, 'en attente')";
            $stat = $BD->pdo->prepare($sql);
            $success = $stat->execute([$id_client, $id_voiture, $date_debut, $date_fin]);

            $BD->deconnexion();
            return $success; 
        } catch (PDOException $e) {
            echo "Erreur SQL : " . $e->getMessage();
            return false;
        }
    }

    /**
     * Supprime une réservation de la base de données.
     * 
     * @param int $id ID de la réservation à supprimer
     * @return bool Succès ou échec de la suppression
     */
    public function supprimerReservation($id) {
        $BD = new ConnexionDB();
        $BD->connexion();

        $sql = "DELETE FROM reservation WHERE id_reservation = ?";
        $stat = $BD->pdo->prepare($sql);
        $success = $stat->execute([$id]);

        $BD->deconnexion();
        return $success;
    }

    /**
     * Valide une réservation, en changeant son statut à "confirmée".
     * 
     * @param int $id ID de la réservation à valider
     * @return bool Succès ou échec de la validation
     */
    public function validerReservation($id) {
        $BD = new ConnexionDB();
        $BD->connexion();

        $sql = "UPDATE reservation SET statut = 'confirmée' WHERE id_reservation = ?";
        $stat = $BD->pdo->prepare($sql);
        $success = $stat->execute([$id]);

        $BD->deconnexion();
        return $success;
    }

    /**
     * Annule une réservation, en changeant son statut à "annulée".
     * 
     * @param int $id ID de la réservation à annuler
     * @return bool Succès ou échec de l'annulation
     */
    public function annulerReservation($id) {
        $BD = new ConnexionDB();
        $BD->connexion();

        $sql = "UPDATE reservation SET statut = 'annulée' WHERE id_reservation = ?";
        $stat = $BD->pdo->prepare($sql);
        $success = $stat->execute([$id]);

        $BD->deconnexion();
        return $success;
    }
}
?>
