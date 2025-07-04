
<tr>
<td><?php echo $id?></td>
<td><?php echo $marque ?></td>
<td><?php echo$model ?></td>
<td><?php echo$annee?></td>
<td><?php echo $immatriculation ?></td>
<td> <?php echo $prix.'€'?> </td>
<td><?php echo $caution. "€ "?></td>
<td>
<?php 
if ($disponible == 1) {
    echo 'Oui';
} else {
    echo 'Non';
}
?>
</td>

<td> <?php echo $type ?></td>
<td><a href="supprimerVoiture?id=<?php echo $id; ?>" class="redirect-button">Supprimer</a></td>
</tr>

