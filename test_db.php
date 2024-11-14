<?php
include 'db.php';

// Tester la connexion
$bsdv_conn = bsdv_connectDB();
if ($bsdv_conn) {
    echo "Connexion réussie à la base de données !";
}
?>
