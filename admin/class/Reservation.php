<?php
namespace classes;

/**
 * Classe Reservation représentant une réservation effectuée par un client pour une voiture.
 * 
 * Cette classe gère les informations liées à une réservation, telles que l'ID de la réservation,
 * l'ID du client, l'ID de la voiture, les dates de début et de fin de la réservation, ainsi que le statut de la réservation.
 */
class Reservation {
    /**
     * @var int ID de la réservation.
     */
    protected $id_reservation;

    /**
     * @var int ID du client ayant effectué la réservation.
     */
    protected $id_client;

    /**
     * @var int ID de la voiture réservée.
     */
    protected $id_voiture;

    /**
     * @var string Date de début de la réservation.
     */
    protected $date_debut;

    /**
     * @var string Date de fin de la réservation.
     */
    protected $date_fin;

    /**
     * @var string Statut de la réservation (par exemple, "en attente", "confirmée", "annulée").
     */
    protected $statut;

    /**
     * Constructeur pour initialiser les propriétés de la réservation.
     *
     * @param int|null $id_reservation L'ID de la réservation. Par défaut, null si non fourni.
     * @param int|null $id_client L'ID du client ayant effectué la réservation. Par défaut, null si non fourni.
     * @param int|null $id_voiture L'ID de la voiture réservée. Par défaut, null si non fourni.
     * @param string|null $date_debut La date de début de la réservation. Par défaut, null si non fourni.
     * @param string|null $date_fin La date de fin de la réservation. Par défaut, null si non fourni.
     * @param string|null $statut Le statut de la réservation. Par défaut, null si non fourni.
     */
    public function __construct($id_reservation = null, $id_client = null, $id_voiture = null, $date_debut = null, $date_fin = null, $statut = null) {
        $this->id_reservation = $id_reservation;
        $this->id_client = $id_client;
        $this->id_voiture = $id_voiture;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->statut = $statut;
    }

    /**
     * Méthode magique __set.
     * Permet de définir une valeur pour une propriété de l'objet de manière dynamique.
     * 
     * @param string $property Le nom de la propriété à modifier.
     * @param mixed $value La valeur à affecter à la propriété.
     */
    public function __set($property, $value) {
        $this->$property = $value;
    }

    /**
     * Méthode magique __get.
     * Permet d'accéder à une propriété de l'objet de manière dynamique.
     * 
     * @param string $property Le nom de la propriété à accéder.
     * @return mixed La valeur de la propriété demandée.
     */
    public function __get($property) {
        return $this->$property;
    }
}
?>
