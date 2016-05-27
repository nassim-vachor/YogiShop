<?php 

require_once("../services/seancesClient.php");

$method = $_SERVER['REQUEST_METHOD'];

function format($tab) {
	return array(
		"id" => $tab["idS"],
		"start" => $tab["start"],
		"end" => $tab["end"],
		"title" => 'Nombre de places: '.$tab["place"],
		"place" => $tab["place"],
		//"Coach" => 'Nom du coach : Gerard' 

	);
}

if($method === "GET") {
		//getlesseances entre deux dates
	$dateDeb=$_GET["dateDeb"]; //timestamp
	$dateFin=$_GET["dateFin"]; //timestamp

	$resultat=getOtherSeanceClient(date('Y-m-d\TH:i:s\Z', $dateDeb ),date('c', $dateFin ));
	echo json_encode(array_map("format", $resultat)); 
}


?>