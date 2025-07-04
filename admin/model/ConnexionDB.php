<?php
namespace bd;
include('config_db.php');

class ConnexionDB {
    public $pdo;

    public function connexion() {
        try {
            $this->pdo = new \PDO(
                "pgsql:host=" . hostname . ";dbname=" . dbname,
                username,
                password
            );
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("❌ Erreur PDO : " . $e->getMessage());
        }
    }

    public function deconnexion() {
        $this->pdo = null;
    }
}
?>