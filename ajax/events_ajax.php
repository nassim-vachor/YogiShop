<?php 

require_once("../services/seances.php");

$method = $_SERVER['REQUEST_METHOD'];

function format($tab) {
	return array(
		"id" => $tab["idS"],
		"start" => $tab["start"],
		"end" => $tab["end"],
		"title" => 'Nombre de places: '.$tab["place"],
		//"Coach" => 'Nom du coach : Gerard' 

	);
}

if($method === "GET") {
		//getlesseances entre deux dates
	$dateDeb=$_GET["dateDeb"]; //timestamp
	$dateFin=$_GET["dateFin"]; //timestamp

	$resultat=getSeance(date('Y-m-d\TH:i:s\Z', $dateDeb ),date('c', $dateFin ));
	echo json_encode(array_map("format", $resultat)); 
}

elseif ($method === "POST") {
	//pour ajouter une seance 
	$jourSeance = $_POST["jourSeance"]; 
	$heureDeb = $_POST["heureDeb"]; 
	$heureFin = $_POST["heureFin"]; 
	$nbPlace = $_POST["nbPlace"]; 
	$nomCoach = $_POST["nomCoach"];
	$prenomCoach=$_POST["prenomCoach"]; 
	$res = addSeance($jourSeance,$heureDeb, $heureFin,$nbPlace,$nomCoach,$prenomCoach);
	$estInserer = $res['estInserer'];
	echo json_encode(array(
		"estInserer" => $estInserer
	));

}

elseif ($method === "PUT") {
	//update seance
	$jourSeance = $_POST["jourSeance"]; 
	$heureDeb = $_POST["heureDeb"]; 
	$heureFin = $_POST["heureFin"]; 
	$nvJourSeance = $_POST["nvJourSeance"]; 
	$nvHeureDeb = $_POST["nvHeureDeb"]; 
	$nvHeureFin = $_POST["nvHeureFin"]; 
	$nbPlace = $_POST["nbPlace"]; 
	$nomCoach = $_POST["nomCoach"];
	$prenomCoach=$_POST["prenomCoach"]; 
	$resUpdate = updateSeance($jourSeance,$heureDeb, $heureFin,$nvJourSeance,$nvHeureDeb,$nvHeureFin,$nbPlace,$nomCoach,$prenomCoach);
	$isUpdated=$resUpdate['isUpdated'];
	echo json_encode(array(
		"isUpdated" => $isUpdated
	));
}





?>