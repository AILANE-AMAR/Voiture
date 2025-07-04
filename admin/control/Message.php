<?php
session_start();
/** 
 * un fichier pour afficher tout les message de ma base de donnes 
 * avec une option de supprimer un message 
 */
if (!isset($_SESSION['user_id']) ) { 
    header("Location: /~uapv2500198/admin/");
    exit();
}
$racine_path = '../';

$titre = 'Nos Messages ';
include($racine_path."templates_back/header.php");

echo '<main class="row mb-2">';

require($racine_path.'model/Message.php'); // Inclure le fichier contenant la classe Voiture
use bd\Message;

$messageBD = new Message ();
include($racine_path."templates_back/tableaumessage.php"); 
foreach ($messageBD->afficherTousLesMessages() as $tableau){
    $id=$tableau->id_message;
    $client=$tableau->id_client;
    $date=$tableau->date_heure;
    $contenu=$tableau->contenu ;
    include($racine_path."templates_back/message.php");
}
echo " </table>
   </div>
   </main>";
include($racine_path."templates_back/footer.php");