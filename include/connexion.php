<?php
$conn = mysql_connect("localhost", "root");

if (!$conn){
    afficher_erreur("Probl�me de connexion � la base de donn�es !");
    exit;
}

$sel = mysql_select_db("aquaforme");

if (!$sel) {
   afficher_erreur("Connexion r�ussie mais la base de donn�es Aquaforme n'existe pas !");
   exit;
}
?>
