<?php
namespace classe ;

/**
 * Classe représentant un message.
 * Contient des informations sur l'expéditeur, le contenu et l'heure du message.
 */
class Message {
    private $id_message;
    private $id_client;
    private $date_heure;
    private $contenu;
    private $pdo;

    /**
     * Constructeur de la classe Message.
     * Initialise la connexion à la base de données via la classe Database.
     */
    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    /**
     * Méthode magique pour accéder à une propriété de l'objet.
     * 
     * @param string $property Le nom de la propriété.
     * @return mixed La valeur de la propriété.
     */
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    /**
     * Méthode magique pour modifier une propriété de l'objet.
     * 
     * @param string $property Le nom de la propriété.
     * @param mixed $value La nouvelle valeur de la propriété.
     */
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}
