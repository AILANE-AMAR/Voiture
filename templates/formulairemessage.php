
<section class="contact-section">
<h1>Contactez-nous</h1>
<p>Remplissez le formulaire ci-dessous pour toute demande d'information.</p>
<div class="contact-container">
    <!--  Informations de contact -->
    <div class="contact-info">
        <h2><i class="fas fa-map-marker-alt"></i> Adresse</h2>
        <p>  6 ROUTE DE LYON , Avignon , France</p>

        <h2><i class="fas fa-phone-alt"></i> Téléphone</h2>
        <p><a href="tel:+33123456789">+33 1 23 45 67 89</a></p>

        <h2><i class="fas fa-envelope"></i> Email</h2>
        <p><a href="mailto:contact@elitecars.com">contact@elitecars.com</a></p>

        <h2><i class="fas fa-clock"></i> Horaires</h2>
        <p>Lundi - Samedi : 9h00 - 19h00</p>
    </div>

    <!-- le formulaire de contacter que on vas gerer dans control -->
    <div class="contact-form">
        <form action="/~uapv2500198/Message" method="POST">
            <div class="input-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="input-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="message">Message :</label>
                <textarea id="message" name="contenu" rows="5" required></textarea>
            </div>
            <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($_SESSION['csrf']); ?>">
            <button type="submit" class="btn-primary">Envoyer</button>
        </form>
    </div>
</div>
</section>


