<?php 
namespace classe;

/**
 * Classe représentant un utilisateur.
 * Contient des informations de base sur l'utilisateur, y compris son nom, prénom, téléphone, email, mot de passe et rôle.
 */
class Utilisateur {
    protected $id;
    protected $nom;
    protected $prenom;
    protected $telephone; 
    protected $email;
    protected $motDePasse;
    protected $role;

    /**
     * Constructeur de la classe Utilisateur.
     * Initialise les informations de l'utilisateur.
     * 
     * @param string $nom Le nom de l'utilisateur.
     * @param string $prenom Le prénom de l'utilisateur.
     * @param string $telephone Le numéro de téléphone de l'utilisateur.
     * @param string $email L'email de l'utilisateur.
     * @param string $motDePasse Le mot de passe de l'utilisateur.
     * @param string $role Le rôle de l'utilisateur (ex: 'client', 'admin').
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
     * Getter pour l'ID de l'utilisateur.
     * 
     * @return int L'ID de l'utilisateur.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Setter pour l'ID de l'utilisateur.
     * 
     * @param int $id L'ID de l'utilisateur.
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Getter pour le nom de l'utilisateur.
     * 
     * @return string Le nom de l'utilisateur.
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Setter pour le nom de l'utilisateur.
     * 
     * @param string $nom Le nom de l'utilisateur.
     */
    public function setNom($nom) {
        $this->nom = $nom;
    }

    /**
     * Getter pour le prénom de l'utilisateur.
     * 
     * @return string Le prénom de l'utilisateur.
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * Setter pour le prénom de l'utilisateur.
     * 
     * @param string $prenom Le prénom de l'utilisateur.
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    /**
     * Getter pour le numéro de téléphone de l'utilisateur.
     * 
     * @return string Le téléphone de l'utilisateur.
     */
    public function getTelephone() {
        return $this->telephone;
    }

    /**
     * Setter pour le numéro de téléphone de l'utilisateur.
     * 
     * @param string $telephone Le numéro de téléphone de l'utilisateur.
     */
    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    /**
     * Getter pour l'email de l'utilisateur.
     * 
     * @return string L'email de l'utilisateur.
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Setter pour l'email de l'utilisateur.
     * 
     * @param string $email L'email de l'utilisateur.
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Getter pour le mot de passe de l'utilisateur.
     * 
     * @return string Le mot de passe de l'utilisateur.
     */
    public function getMotDePasse() {
        return $this->motDePasse;
    }

    /**
     * Setter pour le mot de passe de l'utilisateur.
     * 
     * @param string $motDePasse Le mot de passe de l'utilisateur.
     */
    public function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }

    /**
     * Getter pour le rôle de l'utilisateur.
     * 
     * @return string Le rôle de l'utilisateur (ex: 'client', 'admin').
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * Setter pour le rôle de l'utilisateur.
     * 
     * @param string $role Le rôle de l'utilisateur.
     */
    public function setRole($role) {
        $this->role = $role;
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
}
?>
