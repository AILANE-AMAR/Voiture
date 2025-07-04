<?php
namespace bd;

use \PDO;
include ("../class/Voiture.php");

require_once('ConnexionDB.php');
use bd\ConnexionDB;

/**
 * Classe Voiture
 * Gère les opérations liées aux voitures : affichage, ajout, suppression, etc.
 */
class Voiture {

    /**
     * Récupère toutes les voitures de la base de données.
     * 
     * @return array Liste des voitures (objets Voiture)
     */
    function afficherVoiture() {
        $db = new ConnexionDB();
        $db->connexion();
        $sql = 'SELECT * FROM voiture;';
        $stat = $db->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classes\Voiture');
        $stat->execute();
        $voitures = $stat->fetchAll();
        $db->deconnexion();

        return $voitures;
    }

    /**
     * Récupère une voiture spécifique par son identifiant.
     * 
     * @param int $id ID de la voiture
     * @return object Voiture trouvée
     */
    public function getVoiture($id) {
        $BD = new ConnexionDB(); 
        $BD->connexion();
        $sql = 'SELECT * FROM voiture WHERE id_voiture = :id_voiture'; 
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_voiture', $id, PDO::PARAM_INT);
        $stat->execute();
        $voiture = $stat->fetch(PDO::FETCH_OBJ);
        $BD->deconnexion();

        if (!$voiture) {
            header('HTTP/1.0 404 Not Found');
            exit;
        }

        return $voiture;
    }

    /**
     * Ajoute une nouvelle voiture à la base de données.
     * 
     * @param string $marque
     * @param string $modele
     * @param string $immatriculation
     * @param int $annee
     * @param float $prix
     * @param float $caution
     * @param string $type
     * @param string $image
     * @return bool Succès ou échec de l'insertion
     */
    public function ajouterVoiture($marque, $modele, $immatriculation, $annee, $prix, $caution, $type, $image) {
        $db = new ConnexionDB();
        $db->connexion();

        if (!$db->pdo) {
            die("Erreur : Connexion à la base de données échouée.");
        }

        $sql = "INSERT INTO voiture (marque, modele, immatriculation, annee, prix_journalier, caution, \"type\", image, disponible)
                VALUES (:marque, :modele, :immatriculation, :annee, :prix, :caution, :type, :image, :disponible)";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':marque', $marque);
        $stmt->bindParam(':modele', $modele);
        $stmt->bindParam(':immatriculation', $immatriculation);
        $stmt->bindParam(':annee', $annee, PDO::PARAM_INT);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':caution', $caution);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':image', $image);
        $stmt->bindValue(':disponible', true, PDO::PARAM_BOOL);

        $resultat = $stmt->execute();

        if (!$resultat) {
            die("Erreur SQL : " . implode(" - ", $stmt->errorInfo()));
        }

        $db->deconnexion();
        return $resultat;
    }

    /**
     * Supprime une voiture de la base de données.
     * 
     * @param int $id ID de la voiture à supprimer
     * @return bool Succès ou échec de la suppression
     */
    public function supprimerVoiture($id) {
        $BD = new ConnexionDB();
        $BD->connexion();

        $sql = "DELETE FROM voiture WHERE id_voiture = ?";
        $stat = $BD->pdo->prepare($sql);
        $success = $stat->execute([$id]);

        $BD->deconnexion();
        return $success;
    }

    /**
     * Change le statut de disponibilité d'une voiture (à indisponible).
     * 
     * @param int $id_voiture ID de la voiture
     * @return bool Succès ou échec de la mise à jour
     */
    public function changerStatutVoiture($id_voiture) {
        $BD = new ConnexionDB();
        $BD->connexion();

        $nouveau_statut = 0; 
        $stmt = $BD->pdo->prepare("UPDATE voiture SET disponible = :statut WHERE id = :id");
        $stmt->bindParam(':id', $id_voiture, PDO::PARAM_INT);
        $stmt->bindParam(':statut', $nouveau_statut, PDO::PARAM_INT);

        $success = $stmt->execute();

        $BD->deconnexion();
        return $success;
    }
}
?>
