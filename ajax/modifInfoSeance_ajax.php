<?php 

require_once("../services/modifInfoSeance.php");

//Etape 1: on recupere la seance selectionnee
$myselectSeanceModif = $_POST["myselectSeanceModif"]; 
$jourSeanceModif=$_POST["jourSeanceModif"];
$res = modifInfoSeance($jourSeanceModif,$myselectSeanceModif);
$dateDeb=$res['datedeb'];
$dateFin = $res['datefin'];
//$selected= $res["selected"];
echo json_encode(array(
	"datedeb"=>$dateDeb, "datefin"=>$dateFin
));
?>
