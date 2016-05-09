<?php
$dsn = 'mysql:host=localhost;dbname=yogishop';
$user = 'root';
$password = '';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=yogishop', 'root', '');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>