<?php
namespace classes;

/**
 * Classe représentant une voiture dans le système de location.
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
     * Constructeur pour initialiser les propriétés de la voiture.
     *
     * @param string|null $marque La marque de la voiture.
     * @param string|null $modele Le modèle de la voiture.
     * @param int|null $annee L'année de fabrication de la voiture.
     * @param float $caution Le montant de la caution.
     * @param string|null $immatriculation L'immatriculation de la voiture.
     * @param float|null $prix_journalier Le prix journalier de la voiture.
     * @param bool $disponible La disponibilité de la voiture.
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
     * Getter magique pour accéder aux propriétés privées de la voiture.
     *
     * @param string $property Le nom de la propriété à récupérer.
     * @return mixed La valeur de la propriété.
     */
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null; // Retourne null si la propriété n'existe pas.
    }

    /**
     * Setter magique pour définir la valeur d'une propriété privée.
     *
     * @param string $property Le nom de la propriété à définir.
     * @param mixed $value La valeur à attribuer à la propriété.
     */
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}
?>
