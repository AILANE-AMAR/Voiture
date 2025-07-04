<?php include("../templates_back/header.php");?>

<div class="container">
    <h2>🚗 1. Quelles sont les catégories de voitures disponibles ?</h2>
    <p>Nous proposons trois grandes catégories de véhicules pour répondre à tous les besoins :</p>
    <ul>
      <li><strong>SUV</strong> : Idéaux pour les longues routes, les voyages en famille, et les déplacements tout-terrain.</li>
      <li><strong>Luxe</strong> : Pour ceux qui veulent rouler avec élégance et confort. Mercedes, BMW, Audi...</li>
      <li><strong>Sport</strong> : Vivez des sensations fortes avec nos voitures puissantes et dynamiques.</li>
    </ul>
    <p>Chaque voiture affichée sur le site indique clairement sa catégorie, son modèle, et ses disponibilités.</p>

    <h2>👥 2. Qui peut utiliser ce site ?</h2>
    <p><strong>Client :</strong></p>
    <ul>
      <li>Peut s’inscrire et se connecter à son espace personnel.</li>
      <li>Peut consulter les véhicules, faire une demande de réservation.</li>
      <li>Peut envoyer un message au support (via formulaire de contact).</li>
    </ul>
    <p><strong>Administrateur :</strong></p>
    <ul>
      <li>Gère l’ensemble du site.</li>
      <li>Valide ou refuse les réservations des clients.</li>
      <li>Ajoute, modifie ou supprime des voitures.</li>
      <li>Gère les comptes clients et les messages.</li>
    </ul>

    <h2>📆 3. Comment réserver une voiture ?</h2>
    <ul>
      <li>Inscrivez-vous ou connectez-vous à votre compte client.</li>
      <li>Accédez à la section "Réserver une voiture".</li>
      <li>Choisissez la catégorie, la voiture, et les dates.</li>
      <li>Validez votre demande.</li>
      <li>La réservation passe en "en attente".</li>
      <li>Un administrateur analysera votre demande et vous enverra une confirmation ou un refus.</li>
    </ul>

    <h2>✉️ 4. Comment contacter Elite Cars Rental ?</h2>
    <ul>
      <li><strong>Formulaire de contact :</strong> depuis votre compte, vous pouvez envoyer un message. Notre équipe vous répondra dès que possible.</li>
      <li><strong>Téléphone :</strong> +213 555 00 00 00 (du lundi au samedi, 9h à 18h).</li>
    </ul>

    <h2>🛠️ 5. Technologies utilisées pour le site</h2>
    <ul>
      <li><strong>HTML</strong> : Pour structurer les pages web.</li>
      <li><strong>CSS</strong> : Pour styliser et rendre les pages agréables.</li>
      <li><strong>PHP</strong> : Pour la logique côté serveur.</li>
      <li><strong>PostgreSQL (PSQL)</strong> : Pour stocker les données de manière sécurisée.</li>
    </ul>

    <h2>🔒 6. Est-ce que mes données sont sécurisées ?</h2>
    <p>Oui, vos données personnelles, vos réservations et vos messages sont stockés dans une base de données PostgreSQL sécurisée. Elles ne sont jamais partagées avec des tiers. 
    De plus, les mots de passe des utilisateurs sont automatiquement hachés avant d'être enregistrés dans la base de données. Cela signifie qu'ils sont transformés en une version cryptée illisible, renforçant ainsi la protection contre les accès non autorisés ou les piratages. </p>

    <h2>🧾 7. Puis-je annuler ou modifier ma réservation ?</h2>
    <p>Seul un administrateur peut modifier ou annuler une réservation. Contactez-nous pour toute modification.</p>

    <h2>✅ 8. À quoi ressemble l’état d’une réservation ?</h2>
    <ul>
      <li><strong>En attente</strong> : Demande envoyée, en cours de validation.</li>
      <li><strong>Acceptée</strong> : Votre réservation est confirmée.</li>
      <li><strong>Refusée</strong> : Votre demande n’a pas pu être acceptée.</li>
    </ul>
  </div>

    <?php include("../templates_back/footer.php");?>