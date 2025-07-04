<div class="register-container">

        <h2>Inscription</h2>
        <form action="/~uapv2500198/inscription" method="POST">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
            
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required>
            
            <label for="telephone">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" required placeholder="Entrez votre numéro">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirmer le mot de passe</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
            <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($_SESSION['csrf']); ?>">
            <button type="submit">S'inscrire</button>
        </form>
        <p>Déjà un compte ? <a href="/~uapv2500198/connexion">Se connecter</a></p>
    </div>