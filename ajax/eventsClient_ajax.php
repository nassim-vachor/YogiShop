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

	$resultat=getSeanceClient(date('Y-m-d\TH:i:s\Z', $dateDeb ),date('c', $dateFin ));
	echo json_encode(array_map("format", $resultat)); 
}
/*
elseif ($method === "POST") {
	//pour ajouter une seance 
	$jourSeance = $_POST["jourSeance"]; 
	$heureDeb = $_POST["heureSeanceD"]; 
	$heureFin = $_POST["heureSeanceF"]; 
	$nbPlace = $_POST["nbPlace"]; 
	//$nomCoach = $_POST["nomCoach"];
	//$prenomCoach=$_POST["prenomCoach"]; 
	$res = addSeance($jourSeance,$heureDeb, $heureFin,$nbPlace);
	$estInserer = $res['estInserer'];
	echo json_encode(array(
		"estInserer" => $estInserer
	));

}*/


?>