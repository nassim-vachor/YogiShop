<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=yogishop', 'root', '');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>