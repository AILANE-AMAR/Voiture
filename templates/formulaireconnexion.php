<section class="login-container">
    <h2>Se connecter</h2>
    <p>Accédez à votre espace personnel</p>

    <?php if (!empty($message)) : ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <form action="<?php echo $action; ?>" method="<?php echo $method; ?>">
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Entrez votre email">
        </div>

        <div class="input-group">
            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required placeholder="Entrez votre mot de passe">
        </div>
        <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($_SESSION['csrf']); ?>">
        <button type="submit" class="btn-primary">Connexion</button>

        <p class="register-link">
            Pas encore de compte ? <a href="/~uapv2500198/inscription">Inscrivez-vous</a>
        </p>
    </form>
</section>
