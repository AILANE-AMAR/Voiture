<?php 
namespace classes;
include("../class/utilisateur.php");

/**
 * Classe représentant un client dans le système, héritée de la classe Utilisateur.
 */
class Client extends Utilisateur {

    /**
     * Constructeur pour initialiser un client.
     *
     * @param string $nom Le nom du client.
     * @param string $prenom Le prénom du client.
     * @param string $telephone Le téléphone du client.
     * @param string $email L'email du client.
     * @param string $motDePasse Le mot de passe du client.
     * @param string $role Le rôle du client, par défaut "Client".
     */
    public function __construct($nom = "", $prenom = "", $telephone = "", $email = "", $motDePasse = "", $role = 'Client') {
        parent::__construct($nom, $prenom, $telephone, $email, $motDePasse, $role);
    }
}
?>
