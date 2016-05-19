<?php

/*
try {
    $dbh = new PDO('mysql:host=localhost;dbname=yogishop', 'root', '');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
*/

function connect() {
	try {
    	$dbh = new PDO('mysql:host=localhost;dbname=yogishop', 'root', '');
    	 $dbh -> exec("set names utf8");

    	 return $dbh;
	} catch (PDOException $e) {
    	echo 'Connexion échouée : ' . $e->getMessage();
	}
}

?>