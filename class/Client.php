<?php 
namespace classe;

include("../class/utilisateur.php");

/**
 * Classe représentant un client.
 * Hérite de la classe Utilisateur.
 */
class Client extends Utilisateur {

    /**
     * Constructeur de la classe Client.
     *
     * @param string $nom Le nom du client.
     * @param string $prenom Le prénom du client.
     * @param string $telephone Le téléphone du client.
     * @param string $email L'email du client.
     * @param string $motDePasse Le mot de passe du client.
     * @param string $role Le rôle de l'utilisateur (par défaut "Client").
     */
    public function __construct($nom='', $prenom='', $telephone='', $email='', $motDePasse='', $role = 'Client') {
        parent::__construct($nom, $prenom, $telephone, $email, $motDePasse, $role);
    }

}
