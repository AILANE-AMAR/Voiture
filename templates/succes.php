<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($cas); ?></title>
    <link rel="stylesheet" href="../templates/css/style.css">
</head>
<body>
<div class="message-box <?php echo htmlspecialchars($cas); ?>">
    <p><?php echo htmlspecialchars($message); ?></p>
    <a href="../index.php" class="btn">Retour</a>
  </div>
</body>
</html>
