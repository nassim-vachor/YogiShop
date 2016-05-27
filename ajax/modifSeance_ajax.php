<?php 

require_once("../services/modifSeance.php");

//Etape 1: on recupere la seance selectionnee
$myselectSeanceModif = $_POST["myselectSeanceModif"]; 
$jourSeanceModif=$_POST["jourSeanceModif"];
$heureSeanceDModif=$_POST["heureSeanceDModif"];
$heureSeanceFModif=$_POST["heureSeanceFModif"];
$nbPlaceModifPlace=$_POST["nbPlaceModifPlace"];

$res = modifSeance($jourSeanceModif,$myselectSeanceModif,$heureSeanceDModif , $heureSeanceFModif,$nbPlaceModifPlace);
$dateDeb=$res['datedeb'];
$deleted = $res['deleted'];
$datemin= $res["datemin"];
echo json_encode(array(
	"deleted" =>$deleted, "datedeb"=>$dateDeb, "datemin"=>$datemin
));
?>