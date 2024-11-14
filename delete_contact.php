<?php
include 'db.php';

if (isset($_GET['id'])) {
    $bsdv_id = $_GET['id'];
    $bsdv_conn = bsdv_connectDB();

    $bsdv_stmt = $bsdv_conn->prepare("DELETE FROM contacts WHERE id = ?");
    $bsdv_stmt->execute([$bsdv_id]);
}

header("Location: index.php");
exit();
?>
