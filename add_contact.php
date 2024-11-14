<?php
include 'db.php';

$bsdv_errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bsdv_nom = trim($_POST['bsdv_nom']);
    $bsdv_email = trim($_POST['bsdv_email']);
    $bsdv_telephone = trim($_POST['bsdv_telephone']);

    // Validation des champs
    if (empty($bsdv_nom)) {
        $bsdv_errors[] = "Le nom est requis.";
    }
    if (empty($bsdv_email)) {
        $bsdv_errors[] = "L'email est requis.";
    } elseif (!filter_var($bsdv_email, FILTER_VALIDATE_EMAIL)) {
        $bsdv_errors[] = "L'email n'est pas valide.";
    }
    if (empty($bsdv_telephone)) {
        $bsdv_errors[] = "Le téléphone est requis.";
    } elseif (!preg_match('/^[0-9]{10,15}$/', $bsdv_telephone)) {
        $bsdv_errors[] = "Le numéro de téléphone doit contenir entre 10 et 15 chiffres.";
    }

    // Si pas d'erreurs, ajouter le contact
    if (empty($bsdv_errors)) {
        $bsdv_conn = bsdv_connectDB();
        $bsdv_stmt = $bsdv_conn->prepare("INSERT INTO contacts (nom, email, telephone) VALUES (?, ?, ?)");
        $bsdv_stmt->execute([$bsdv_nom, $bsdv_email, $bsdv_telephone]);
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Contact</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Ajouter un Contact</h1>
            <a href="index.php" class="btn-secondary">Retour</a>
        </div>
    </header>

    <main class="container">
        <?php if (!empty($bsdv_errors)): ?>
            <div class="error">
                <ul>
                    <?php foreach ($bsdv_errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <form action="add_contact.php" method="POST" class="form-contact">
            <input type="text" name="bsdv_nom" placeholder="Nom" required>
            <input type="email" name="bsdv_email" placeholder="Email" required>
            <input type="text" name="bsdv_telephone" placeholder="Téléphone" required>
            <button type="submit" class="btn-primary">Ajouter</button>
        </form>
    </main>
</body>
</html>
