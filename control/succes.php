<?php
/**
 * Récupère les paramètres 'cas' et 'message' depuis l'URL et affiche un message basé sur ces paramètres.
 * 
 * Ce script sert à afficher un message en fonction des paramètres de l'URL. Par exemple, il peut afficher un message
 * de succès ou d'erreur, selon la valeur du paramètre 'cas'.
 * 
 * Les données sont récupérées via la méthode GET et ensuite passées au template HTML pour l'affichage.
 * Le script se termine après l'affichage du message en appelant 'die()'.
 * 
 * @package Control
 * @category Message Display
 * @version 1.0
 */

// Récupérer les données depuis l'URL
$cas = isset($_GET['cas']) ? $_GET['cas'] : ''; // Récupère le paramètre 'cas' (ex : 'succes' ou 'error')
$message = isset($_GET['message']) ? $_GET['message'] : ''; // Récupère le paramètre 'message'

// Inclure le template HTML (où tu fais l'affichage visuel)
include('../templates/succes.php'); // Inclut le fichier HTML pour afficher le message en fonction des variables

// Stopper le script après affichage
die(); // Met fin à l'exécution du script une fois le message affiché
?>
