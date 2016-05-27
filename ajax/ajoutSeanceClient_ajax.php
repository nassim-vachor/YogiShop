<?php 

require_once("../services/ajoutSeance.php");

//Etape 1: on recupere la seance selectionnee
$jourSeance2 = $_POST["jourSeance2"]; 
$heureDeb=$_POST["heureDeb"];

$res = ajoutSeanceClient($jourSeance2,$heureDeb);
//$dateDeb=$res['datedeb'];
$inserer = $res['inserer'];
//$datemin= $res["datemin"];
echo json_encode(array(
	"inserer" =>$inserer
));
?>