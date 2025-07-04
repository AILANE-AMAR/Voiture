<?php 
namespace classes;

/**
 * Classe Utilisateur représentant un utilisateur (par exemple, client, admin) du système.
 * 
 * Cette classe gère les informations de base d'un utilisateur telles que son nom, prénom, téléphone,
 * email, mot de passe, et son rôle dans le système (client, admin, etc.).
 */
class Utilisateur {
    /**
     * @var int L'ID de l'utilisateur.
     */
    protected $id;

    /**
     * @var string Le nom de l'utilisateur.
     */
    protected $nom;

    /**
     * @var string Le prénom de l'utilisateur.
     */
    protected $prenom;

    /**
     * @var string Le numéro de téléphone de l'utilisateur.
     */
    protected $telephone; 

    /**
     * @var string L'email de l'utilisateur.
     */
    protected $email;

    /**
     * @var string Le mot de passe de l'utilisateur (haché).
     */
    protected $motDePasse;

    /**
     * @var string Le rôle de l'utilisateur dans le système (par exemple, "client", "admin").
     */
    protected $role;

    /**
     * Constructeur pour initialiser les informations de l'utilisateur.
     * 
     * @param string $nom Le nom de l'utilisateur.
     * @param string $prenom Le prénom de l'utilisateur.
     * @param string $telephone Le téléphone de l'utilisateur.
     * @param string $email L'email de l'utilisateur.
     * @param string $motDePasse Le mot de passe de l'utilisateur (avant hachage).
     * @param string $role Le rôle de l'utilisateur (ex. "client", "admin").
     */
    public function __construct($nom, $prenom, $telephone, $email, $motDePasse, $role) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone; 
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->role = $role;
    }

    /**
     * Méthode magique __set.
     * 
     * @param string $property Le nom de la propriété à modifier.
     * @param  $value La valeur à affecter à la propriété.
     */
    public function __set($property, $value) {
        $this->$property = $value;
    }

    /**
     * Méthode magique __get.
     * 
     * @param string $property Le nom de la propriété à accéder.
     * @return  La valeur de la propriété demandée.
     */
    public function __get($property) {
        return $this->$property;
    }
}
?>
