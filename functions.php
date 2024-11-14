<?php
function addContact($bsdv_nom, $bsdv_email, $bsdv_telephone) {
    $bsdv_conn = connectDB();
    $bsdv_query = $bsdv_conn->prepare("INSERT INTO contacts (nom, email, telephone) VALUES (:nom, :email, :telephone)");
    $bsdv_query->bindParam(':nom', $bsdv_nom);
    $bsdv_query->bindParam(':email', $bsdv_email);
    $bsdv_query->bindParam(':telephone', $bsdv_telephone);
    $bsdv_query->execute();
}

function getContacts() {
    $bsdv_conn = connectDB();
    $bsdv_query = $bsdv_conn->query("SELECT * FROM contacts");
    return $bsdv_query->fetchAll(PDO::FETCH_ASSOC);
}

function getContact($bsdv_id) {
    $bsdv_conn = connectDB();
    $bsdv_query = $bsdv_conn->prepare("SELECT * FROM contacts WHERE id = :id");
    $bsdv_query->bindParam(':id', $bsdv_id, PDO::PARAM_INT);
    $bsdv_query->execute();
    return $bsdv_query->fetch(PDO::FETCH_ASSOC);
}

function updateContact($bsdv_id, $bsdv_nom, $bsdv_email, $bsdv_telephone) {
    $bsdv_conn = connectDB();
    $bsdv_query = $bsdv_conn->prepare("UPDATE contacts SET nom = :nom, email = :email, telephone = :telephone WHERE id = :id");
    $bsdv_query->bindParam(':id', $bsdv_id, PDO::PARAM_INT);
    $bsdv_query->bindParam(':nom', $bsdv_nom);
    $bsdv_query->bindParam(':email', $bsdv_email);
    $bsdv_query->bindParam(':telephone', $bsdv_telephone);
    $bsdv_query->execute();
}

function deleteContact($bsdv_id) {
    $bsdv_conn = connectDB();
    $bsdv_query = $bsdv_conn->prepare("DELETE FROM contacts WHERE id = :id");
    $bsdv_query->bindParam(':id', $bsdv_id, PDO::PARAM_INT);
    $bsdv_query->execute();
}
?>
