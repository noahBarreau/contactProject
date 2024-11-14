<?php
require_once 'db.php';
require_once 'functions.php';

if (isset($_GET['id'])) {
    deleteContact($_GET['id']);
}

header('Location: index.php');
exit;
