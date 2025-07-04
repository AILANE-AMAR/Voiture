<?php
namespace db;
require_once('config_db.php');

/**
 * Classe pour la gestion de la connexion à la base de données
 * 
 * Cette classe permet de se connecter et de se déconnecter à la base de données
 * en utilisant PDO avec les informations de connexion définies dans le fichier de configuration.
 */
class GestionDB{
    /**
     * @var PDO Instance de la connexion PDO
     */
    public $pdo;
    
    /**
     * Établit la connexion à la base de données à l'aide des informations
     * de configuration.
     *
     * @return void
     * @throws PDOException Si la connexion échoue.
     */
    public function connexion(){
        // recuperer le fichier conf et faire une connexion
        try{
            $this->pdo = new \PDO("pgsql:host=".hostname.";dbname=".dbname, username, password );
        }catch(PDOException $e){
            echo 'Exception PDO : '.$e->getMessage(); 
        }
    }
    
    /**
     * Ferme la connexion à la base de données
     *
     * @return void
     */
    public function deconnexion(){
        // faire la deconnexion
        $this->pdo = null;
    }
}
?>
