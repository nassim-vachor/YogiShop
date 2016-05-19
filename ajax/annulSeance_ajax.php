<?php 

require_once("../services/annulSeance.php");

//Etape 1: on recupere la seance selectionnee
$myselectSeance = $_POST["myselectSeance"]; 
$jourSeance2=$_POST["jourSeance2"];
$res = annulSeance($jourSeance2,$myselectSeance);
$dateDeb=$res['datedeb'];
$deleted = $res['deleted'];
$datemin= $res["datemin"];
echo json_encode(array(
	"deleted" =>$deleted, "datedeb"=>$dateDeb, "datemin"=>$datemin
));
?>