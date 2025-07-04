<?php
namespace classe ;

/**
 * Classe représentant une voiture disponible à la location.
 * Contient des informations concernant la voiture comme sa marque, son modèle, son année, sa caution, son immatriculation, son prix journalier et sa disponibilité.
 */
class Voiture {
    private $id_voiture;
    private $marque;
    private $modele;
    private $annee;
    private $caution;
    private $immatriculation;
    private $prix_journalier;
    private $disponible;

    /**
     * Constructeur de la classe Voiture.
     * Initialise les attributs de la voiture avec les valeurs fournies.
     * 
     * @param string|null $marque La marque de la voiture.
     * @param string|null $modele Le modèle de la voiture.
     * @param int|null $annee L'année de la voiture.
     * @param float $caution La caution de la voiture (par défaut 0).
     * @param string|null $immatriculation L'immatriculation de la voiture.
     * @param float|null $prix_journalier Le prix journalier de la voiture.
     * @param bool $disponible La disponibilité de la voiture (par défaut true).
     */
    public function __construct($marque = null, $modele = null, $annee = null, $caution = 0, $immatriculation = null, $prix_journalier = null, $disponible = true) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->caution = $caution;
        $this->immatriculation = $immatriculation;
        $this->prix_journalier = $prix_journalier;
        $this->disponible = $disponible;
    }

    /**
     * Getter pour l'ID de la voiture.
     * 
     * @return int L'ID de la voiture.
     */
    public function getIdVoiture() {
        return $this->id_voiture;
    }

    /**
     * Getter pour la marque de la voiture.
     * 
     * @return string La marque de la voiture.
     */
    public function getMarque() {
        return $this->marque;
    }

    /**
     * Getter pour le modèle de la voiture.
     * 
     * @return string Le modèle de la voiture.
     */
    public function getModele() {
        return $this->modele;
    }

    /**
     * Getter pour l'année de la voiture.
     * 
     * @return int L'année de la voiture.
     */
    public function getAnnee() {
        return $this->annee;
    }

    /**
     * Getter pour la caution de la voiture.
     * 
     * @return float La caution de la voiture.
     */
    public function getCaution() {
        return $this->caution;
    }

    /**
     * Getter pour l'immatriculation de la voiture.
     * 
     * @return string L'immatriculation de la voiture.
     */
    public function getImmatriculation() {
        return $this->immatriculation;
    }

    /**
     * Getter pour le prix journalier de la voiture.
     * 
     * @return float Le prix journalier de la voiture.
     */
    public function getPrixJournalier() {
        return $this->prix_journalier;
    }

    /**
     * Getter pour la disponibilité de la voiture.
     * 
     * @return bool La disponibilité de la voiture.
     */
    public function getDisponible() {
        return $this->disponible;
    }

    // Setters

    /**
     * Setter pour la marque de la voiture.
     * 
     * @param string $marque La marque de la voiture.
     */
    public function setMarque($marque) {
        $this->marque = $marque;
    }

    /**
     * Setter pour le modèle de la voiture.
     * 
     * @param string $modele Le modèle de la voiture.
     */
    public function setModele($modele) {
        $this->modele = $modele;
    }

    /**
     * Setter pour l'année de la voiture.
     * 
     * @param int $annee L'année de la voiture.
     */
    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    /**
     * Setter pour la caution de la voiture.
     * 
     * @param float $caution La caution de la voiture.
     */
    public function setCaution($caution) {
        $this->caution = $caution;
    }

    /**
     * Setter pour l'immatriculation de la voiture.
     * 
     * @param string $immatriculation L'immatriculation de la voiture.
     */
    public function setImmatriculation($immatriculation) {
        $this->immatriculation = $immatriculation;
    }

    /**
     * Setter pour le prix journalier de la voiture.
     * 
     * @param float $prix_journalier Le prix journalier de la voiture.
     */
    public function setPrixJournalier($prix_journalier) {
        $this->prix_journalier = $prix_journalier;
    }

    /**
     * Setter pour la disponibilité de la voiture.
     * 
     * @param bool $disponible La disponibilité de la voiture.
     */
    public function setDisponible($disponible) {
        $this->disponible = $disponible;
    }

    // Méthodes magiques

    /**
     * Méthode magique pour modifier une propriété de l'objet.
     * 
     * @param string $property Le nom de la propriété.
     * @param mixed $value La valeur à attribuer à la propriété.
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
     * Méthode magique pour afficher les informations de la voiture sous forme de chaîne.
     * 
     * @return string Les informations de la voiture.
     */
    public function __toString() {
        return "Voiture: {$this->marque} {$this->modele}, Année: {$this->annee}, Immatriculation: {$this->immatriculation}, Prix Journalier: {$this->prix_journalier} EUR, Disponible: " . ($this->disponible ? "Oui" : "Non");
    }
}
?>
