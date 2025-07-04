<tr>
    <td><?php echo $id ; ?></td>
    <td><?php echo $id_client ; ?></td>
    <td><?php echo $id_voiture ;  ?></td>
    <td><?php echo $date_debut ; ?></td>
    <td><?php echo $date_fin ; ?></td>
    <td><?php echo $status ; ?></td>
    <td> 
    <?php if ($status=='en attente'):?>
    <a href="supprimerReservation?id=<?php echo $id; ?>" class="redirect-button">Supprimer</a>
    <a href="annulerReservation?id=<?php echo $id; ?>" class="redirect-button">Annuler</a>
    <a href="validerReservation?id=<?php echo $id; ?>&voiture_id=<?php echo $id_voiture; ?>" class="redirect-button">Valider</a>
    <?php endif ?>
    <?php if ($status=='confirmée'):?>
    <a href="supprimerReservation?id=<?php echo $id; ?>" class="redirect-button">Supprimer</a>
    <a href="annulerReservation?id=<?php echo $id; ?>" class="redirect-button">Annuler</a>
    <?php endif ?>
    <?php if ($status=='annulée'):?>
    <a href="supprimerReservation?id=<?php echo $id; ?>" class="redirect-button">Supprimer</a>
    <a href="validerReservation?id=<?php echo $id; ?>&id_voiture=<?php echo $id_voiture; ?>" class="redirect-button">Valider</a>
    <?php endif ?>
    </td>
    
</tr>
