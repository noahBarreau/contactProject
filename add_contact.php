<?php
require_once 'db.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bsdv_nom = htmlspecialchars($_POST['nom']);
    $bsdv_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $bsdv_telephone = htmlspecialchars($_POST['telephone']);

    if (filter_var($bsdv_email, FILTER_VALIDATE_EMAIL)) {
        addContact($bsdv_nom, $bsdv_email, $bsdv_telephone);
        header('Location: index.php');
        exit;
    } else {
        $bsdv_error = "L'email n'est pas valide.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un contact</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter un contact</h1>
        <?php if (isset($bsdv_error)): ?>
            <p style="color: red;"><?php echo $bsdv_error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="telephone">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" required>
            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>
