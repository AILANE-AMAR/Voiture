<?php
namespace classes;

/**
 * Classe Message représentant un message envoyé par un client.
 * 
 * Cette classe contient les propriétés d'un message, telles que l'ID du message, l'ID du client,
 * la date et l'heure d'envoi, ainsi que le contenu du message.
 * Elle utilise des méthodes magiques `__get` et `__set` pour l'accès et la modification dynamiques des propriétés.
 */
class Message {
    /**
     * @var int ID du message.
     */
    private $_id_message;

    /**
     * @var int ID du client qui a envoyé le message.
     */
    private $_id_client;

    /**
     * @var string Date et heure d'envoi du message.
     */
    private $_date_heure;

    /**
     * @var string Contenu du message.
     */
    private $_contenu;

    /**
     * Méthode magique __get.
     * Permet d'accéder à une propriété privée de l'objet de manière dynamique.
     *
     * @param string $property Le nom de la propriété.
     * @return mixed La valeur de la propriété demandée.
     * @throws Exception Si la propriété n'existe pas.
     */
    public function __get($property) {
        if (property_exists($this, "_$property")) {
            return $this->{"_$property"};
        }
        throw new Exception("Propriété '$property' inexistante.");
    }

    /**
     * Méthode magique __set.
     * Permet de modifier une propriété privée de l'objet de manière dynamique.
     *
     * @param string $property Le nom de la propriété.
     * @param mixed $value La valeur à affecter à la propriété.
     * @throws Exception Si la propriété n'existe pas.
     */
    public function __set($property, $value) {
        if (property_exists($this, "_$property")) {
            $this->{"_$property"} = $value;
        } else {
            throw new Exception("Propriété '$property' inexistante.");
        }
    }

    /**
     * Retourne une chaîne représentant l'objet Message.
     * Utilisé notamment pour le débogage ou l'affichage des informations.
     *
     * @return string Représentation lisible du message.
     */
    public function __toString() {
        return "Message [ID: $this->_id_message, Contenu: $this->_contenu]";
    }
}
?>
