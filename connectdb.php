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
    	return new PDO('mysql:host=localhost;dbname=yogishop', 'root', '');
	} catch (PDOException $e) {
    	echo 'Connexion échouée : ' . $e->getMessage();
	}
}

?>