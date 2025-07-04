<div class="container">
    <h1>Ajouter un Client</h1>
    <form action="/~uapv2500198/admin/ajouterClient" method="POST">
        <input type="text" name="nom" placeholder="Nom du client" required>
        <input type="text" name="prenom" placeholder="Prénom du client" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="telephone" placeholder="Téléphone" required>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
        <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($_SESSION['csrf']); ?>">
        <button type="submit">Ajouter Client</button>
    </form>
</div>
