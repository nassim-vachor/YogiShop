<?php 

require_once("../services/modifSeance.php");

//Etape 1: on recupere la seance selectionnee
$myselectSeanceModif = $_POST["myselectSeanceModif"]; 
$jourSeanceModif=$_POST["jourSeanceModif"];
$res = modifSeance($jourSeanceModif,$myselectSeanceModif);
$dateDeb=$res['datedeb'];
$deleted = $res['deleted'];
$datemin= $res["datemin"];
echo json_encode(array(
	"deleted" =>$deleted, "datedeb"=>$dateDeb, "datemin"=>$datemin
));
?>