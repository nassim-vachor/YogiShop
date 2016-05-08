<?php
$conn = mysql_connect("localhost", "root");

if (!$conn){
    afficher_erreur("Problème de connexion à la base de données !");
    exit;
}

$sel = mysql_select_db("aquaforme");

if (!$sel) {
   afficher_erreur("Connexion réussie mais la base de données Aquaforme n'existe pas !");
   exit;
}
?>
