<div class="container">
        <!-- Formulaire pour ajouter un véhicule -->
        <form action="/~uapv2500198/admin/ajouterVoiture" method="POST">
            <input type="text" name="marque" placeholder="Marque du véhicule" required>
            <input type="text" name="modele" placeholder="Modèle du véhicule" required>
            <input type="text" name="immatriculation" placeholder="Immatriculation" required>
            <input type="number" name="annee" placeholder="Annee de voiture " required>
            <input type="number" name="prix" placeholder="Prix de location" required>
            <input type="number" name="Caution" placeholder="Caution" required>
            <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($_SESSION['csrf']); ?>">
            <label for="type">Type de voiture :</label>
                <select name="type" required>
                    <option value="SUV">SUV</option>
                    <option value="Luxe">Luxe</option>
                    <option value="Sport">Sport</option>
                    <option value="4x4">4x4</option>
                </select>
            <button type="submit">Ajouter Véhicule</button>
        </form>
</div>