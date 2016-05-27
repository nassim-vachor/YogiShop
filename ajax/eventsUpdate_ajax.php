<?php 

include_once("../services/seancesUpdate.php");


	//update seance
	$jourSeance = $_POST["jourSeance"]; 
	$nvJourSeance = $_POST["nvJourSeance"];
	$heureDebAncien = $_POST["heureDebAncien"]; 
	$heureDeb = $_POST["heureDeb"]; 
	$heureFin = $_POST["heureFin"]; 
	$nbPlace = $_POST["nbPlace"]; 
	$res = oui($jourSeance,$nvJourSeance,$heureDebAncien,$heureDeb, $heureFin,$nbPlace);
	$isUpdated=$res['isUpdated'];
	echo json_encode(array(
		"isUpdated" => $isUpdated
	));
?>  
