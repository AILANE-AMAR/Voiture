<?php
/**
 * un fichier pour supprimer un utulisatuer soit admin soit client , tout depend d'ou sa vient le get 
 */
require_once '../model/Client.php';
use bd\client ;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $client = new Client();

    if ($client->supprimerClient($id)) {
        die("Utilisateur supprimé avec succès ! <br><a href='/~uapv2500198/admin/'>Retour</a>");
    } else {
        die("Erreur lors de la suppression ! <br><a href='/~uapv2500198/admin/'>Retour</a>");
    }
} else {

    die("ID utilisateur invalide ! <br><a href='/~uapv2500198/admin/'>Retour</a>");
}
?>
