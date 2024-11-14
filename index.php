<?php
include 'db.php';

// Récupérer tous les contacts
$bsdv_conn = bsdv_connectDB();
$bsdv_stmt = $bsdv_conn->query("SELECT * FROM contacts ORDER BY nom");
$bsdv_contacts = $bsdv_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Contacts</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Gestion des Contacts</h1>
            <a href="add_contact.php" class="btn-primary">Ajouter un Contact</a>
        </div>
    </header>

    <main class="container">
        <h2>Liste des Contacts</h2>
        <table class="contact-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bsdv_contacts as $contact): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($contact['nom']); ?></td>
                        <td><?php echo htmlspecialchars($contact['email']); ?></td>
                        <td><?php echo htmlspecialchars($contact['telephone']); ?></td>
                        <td>
                            <a href="edit_contact.php?id=<?php echo $contact['id']; ?>" class="btn-edit">Modifier</a>
                            <a href="delete_contact.php?id=<?php echo $contact['id']; ?>" class="btn-delete">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
