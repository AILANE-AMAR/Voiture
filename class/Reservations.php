<?php
namespace classe;

/**
 * Classe représentant une réservation.
 * Contient des informations sur le client, la voiture réservée, les dates de début et de fin, et le statut de la réservation.
 */
class Reservation {
    private $id_reservation;
    public $id_client;
    public $id_voiture;
    public $date_debut;
    public $date_fin;
    public $statut;

    /**
     * Constructeur de la classe Reservation.
     * Initialise les valeurs de la réservation avec les informations passées en paramètre.
     * 
     * @param int|null $id_client L'ID du client.
     * @param int|null $id_voiture L'ID de la voiture réservée.
     * @param string|null $date_debut La date de début de la réservation.
     * @param string|null $date_fin La date de fin de la réservation.
     * @param string $statut Le statut de la réservation (par défaut "En attente").
     */
    public function __construct($id_client = null, $id_voiture = null, $date_debut = null, $date_fin = null, $statut = 'En attente') {
        $this->id_client = $id_client;
        $this->id_voiture = $id_voiture;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->statut = $statut;
    }

    /**
     * Getter pour l'ID de la réservation.
     * 
     * @return int L'ID de la réservation.
     */
    public function getIdReservation() {
        return $this->id_reservation;
    }

    /**
     * Getter pour l'ID du client.
     * 
     * @return int L'ID du client.
     */
    public function getIdClient() {
        return $this->id_client;
    }

    /**
     * Getter pour l'ID de la voiture réservée.
     * 
     * @return int L'ID de la voiture réservée.
     */
    public function getIdVoiture() {
        return $this->id_voiture;
    }

    /**
     * Getter pour la date de début de la réservation.
     * 
     * @return string La date de début de la réservation.
     */
    public function getDateDebut() {
        return $this->date_debut;
    }

    /**
     * Getter pour la date de fin de la réservation.
     * 
     * @return string La date de fin de la réservation.
     */
    public function getDateFin() {
        return $this->date_fin;
    }

    /**
     * Getter pour le statut de la réservation.
     * 
     * @return string Le statut de la réservation.
     */
    public function getStatut() {
        return $this->statut;
    }

    /**
     * Setter pour l'ID du client.
     * 
     * @param int $id_client L'ID du client.
     */
    public function setIdClient($id_client) {
        $this->id_client = $id_client;
    }

    /**
     * Setter pour l'ID de la voiture réservée.
     * 
     * @param int $id_voiture L'ID de la voiture réservée.
     */
    public function setIdVoiture($id_voiture) {
        $this->id_voiture = $id_voiture;
    }

    /**
     * Setter pour la date de début de la réservation.
     * 
     * @param string $date_debut La date de début de la réservation.
     */
    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
    }

    /**
     * Setter pour la date de fin de la réservation.
     * 
     * @param string $date_fin La date de fin de la réservation.
     */
    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
    }

    /**
     * Setter pour le statut de la réservation.
     * 
     * @param string $statut Le statut de la réservation.
     */
    public function setStatut($statut) {
        $this->statut = $statut;
    }

    /**
     * Méthode magique pour modifier une propriété de l'objet.
     * 
     * @param string $property Le nom de la propriété.
     * @param mixed $value La nouvelle valeur de la propriété.
     */
    public function __set($property, $value) {
        $this->$property = $value;
    }

    /**
     * Méthode magique pour accéder à une propriété de l'objet.
     * 
     * @param string $property Le nom de la propriété.
     * @return mixed La valeur de la propriété.
     */
    public function __get($property) {
        return $this->$property;
    }

    /**
     * Retourne une chaîne décrivant la réservation sous un format lisible.
     * 
     * @return string La description de la réservation.
     */
    public function __toString() {
        return "Réservation: Client ID {$this->id_client}, Voiture ID {$this->id_voiture}, Dates: {$this->date_debut} - {$this->date_fin}, Statut: {$this->statut}";
    }
}
?>
