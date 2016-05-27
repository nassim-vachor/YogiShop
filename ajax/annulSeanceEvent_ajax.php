<?php 

require_once("../services/annulSeance.php");

//Etape 1: on recupere la seance selectionnee
$jourSeance2 = $_POST["jourSeance2"]; 
$heureDeb=$_POST["heureDeb"];

$res = annulSeanceEvent($jourSeance2,$heureDeb);
$dateDeb=$res['datedeb'];
$deleted = $res['deleted'];
$datemin= $res["datemin"];
echo json_encode(array(
	"deleted" =>$deleted, "datedeb"=>$dateDeb, "datemin"=>$datemin
));
?>  	