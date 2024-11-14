<?php
require_once 'db.php';
require_once 'functions.php';

$bsdv_contacts = getContacts();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Contacts</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Contacts</h1>
        <?php if (empty($bsdv_contacts)): ?>
            <p>Aucun contact trouvé.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bsdv_contacts as $bsdv_contact): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($bsdv_contact['nom']); ?></td>
                            <td><?php echo htmlspecialchars($bsdv_contact['email']); ?></td>
                            <td><?php echo htmlspecialchars($bsdv_contact['telephone']); ?></td>
                            <td>
                                <a href="edit_contact.php?id=<?php echo $bsdv_contact['id']; ?>">Modifier</a> | 
                                <a href="delete_contact.php?id=<?php echo $bsdv_contact['id']; ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="add_contact.php">Ajouter un contact</a>
    </div>
</body>
</html>
