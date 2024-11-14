<?php
$bsdv_host = 'localhost';
$bsdv_dbname = 'contacts_db';
$bsdv_username = 'root';
$bsdv_password = '';

function bsdv_connectDB() {
    global $bsdv_host, $bsdv_dbname, $bsdv_username, $bsdv_password;
    try {
        $bsdv_conn = new PDO("mysql:host=$bsdv_host;dbname=$bsdv_dbname;charset=utf8", $bsdv_username, $bsdv_password);
        $bsdv_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bsdv_conn;
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
        exit();
    }
}
?>
