<div class="vl_detail">
    <!-- Image de la voiture -->
    <img class="vl_image" src="<?php echo $image_voiture; ?>" alt="Image de la voiture">

    <!-- Détails de la voiture -->
    <div class="vl_info">
        <h2><?php echo $nom_voiture; ?></h2>
        <p><strong>Modèle :</strong> <?php echo $modele; ?></p>
        <p><strong>Prix par jour :</strong> <?php echo $prix; ?> €</p>
        <p><strong>Caution :</strong> <?php echo $caution; ?> €</p>
        <a href="/~uapv2500198/control/reservation.php" class="btn btn-primary">Reserver maintenant </a>
    </div>
</div>
