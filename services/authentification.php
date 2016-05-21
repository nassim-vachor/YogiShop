<?php
$_USER = array(
	"isAdmin" => false,
	"isConnected" => false,
	"id" => -1
);

if(!isset($secure_level)) {
	$secure_level = 2; //Par défault
}

if (isset($_COOKIE['id']) && isset($_COOKIE['token']))
{
    // si oui on les stocke dans des variables
    $id = $_COOKIE['id'];
    $requete = $dbh->query("SELECT Token, idPerson, EstAdmin FROM Person WHERE idPerson = '$id'");
    $row=$requete->fetch();

    //on verifie si le token est vide ou si le token recuperé est different de celle de la bd 
    // ou si son token est egal a 0 (dans ce cas, la personne est deconnectée)
    if(isset($_COOKIE['token']) && $_COOKIE['token'] != '0' && $row['Token'] == $_COOKIE['token'])
    {
    	$_USER["id"] = $row["idPerson"];
    	$_USER["isConnected"] = true;
    	$_USER["isAdmin"] = $row["EstAdmin"] === "1";
    } 
}

if((!$_USER["isConnected"] && $secure_level > 0)
	|| (!$_USER["isAdmin"] && $secure_level > 1))
{
	header('Location: index.php');
}

?>