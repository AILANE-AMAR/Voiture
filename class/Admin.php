<?php 
namespace classes;

include("../class/utilisateur.php");

/**
 * Classe représentant un administrateur.
 * Hérite de la classe Utilisateur.
 */
class Admin extends Utilisateur {

    /**
     * Constructeur de la classe Admin.
     *
     * @param string $nom Le nom de l'administrateur.
     * @param string $prenom Le prénom de l'administrateur.
     * @param string $telephone Le téléphone de l'administrateur.
     * @param string $email L'email de l'administrateur.
     * @param string $motDePasse Le mot de passe de l'administrateur.
     * @param string $role Le rôle de l'utilisateur (par défaut "admin").
     */
    public function __construct($nom, $prenom, $telephone, $email, $motDePasse, $role = 'admin') {
        parent::__construct($nom, $prenom, $telephone, $email, $motDePasse, $role);
    }
}
