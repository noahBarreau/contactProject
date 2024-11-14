<?php
$bsdv_dbhost = 'localhost';
$bsdv_dbname = 'contacts_db';
$bsdv_dbuser = 'root';
$bsdv_dbpass = '';

function connectDB() {
    global $bsdv_dbhost, $bsdv_dbname, $bsdv_dbuser, $bsdv_dbpass;
    try {
        $bsdv_conn = new PDO("mysql:host=$bsdv_dbhost;dbname=$bsdv_dbname", $bsdv_dbuser, $bsdv_dbpass);
        $bsdv_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bsdv_conn;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}
?>
