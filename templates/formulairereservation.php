
<section class="reservation-container">
    <h2>Réservez une voiture</h2>
    <form action="/~uapv2500198/reservation" method="POST">
        <label for="car">Choisissez une voiture :</label>
        <select name="id_voiture" id="car" required>
            <option value="">-- Sélectionnez une voiture --</option>
            <?php foreach ($voitureDB->afficherVoiture() as $tableau) :  ?>
                <option value="<?php echo $tableau->id_voiture; ?>"><?php echo $tableau->marque; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="start_date">Date de début :</label>
        <input type="date" id="start_date" name="date_debut" required>

        <label for="end_date">Date de fin :</label>
        <input type="date" id="end_date" name="date_fin" required>

        <label for="name">Votre Nom :</label>
        <input type="text" id="name" name="nom" required>

        <label for="email">Votre Email :</label>
        <input type="email" id="email" name="email" required>
        <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($_SESSION['csrf']); ?>">
        <button type="submit" class="btn-primary">Réserver</button>
    </form>
</section>
