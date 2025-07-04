<?php 
/**
 * un fichier pour supprimer un Message 
 */
include("../model/Message.php");

use bd\Message;

if( isset($_GET['id'])){

    $Message = new Message();

    if($Message->supprimerMessage($_GET['id'])){
      header("location: Message");
      exit ;
    }
    else{
        die('erreur de suupression de Message  ');
    }
}