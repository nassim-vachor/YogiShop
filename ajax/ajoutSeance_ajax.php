<?php 

require_once("../services/ajoutSeance.php");

//Etape 1: on recupere les champs 
$jourSeance = $_POST["jourSeance"]; 
$heureSeanceD = $_POST["heureSeanceD"]; 
$heureSeanceF = $_POST["heureSeanceF"]; 
$nbPlace = $_POST["nbPlace"]; 
$myselectCoach = $_POST["myselectCoach"]; 
$res = ajoutSeance($jourSeance,$heureSeanceD, $heureSeanceF,$nbPlace,$myselectCoach);
$estInserer = $res['estInserer'];
echo json_encode(array(
	"estInserer" => $estInserer
));
?>