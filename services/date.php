<?php


// ajoute K jour au jour actuel 
function jourPlusK($j){

$date = date('d-m-Y', strtotime($j . 'days'));
//echo strtotime($e . 'days');
return $date;
}
function addDayswithdate($date,$days){

    $date = strtotime("+".$days." days", strtotime($date));
    return  date("d-m-Y", $date);

}

// permet de connaitre les dates de la semaine actuelle
function dateDebutSemaineActuelle (){

	$debSemaine = 0;
	$jour= date("l");

	switch ($jour) {
		case 'Monday':
			$debSemaine =0;
			break;

		case 'Tuesday':
			$debSemaine =-1;
			break;

		case 'Wednesday':
			$debSemaine =-2;
			break;

		case 'Thursday':
			$debSemaine =-3;
			break;

		case 'Friday':
			$debSemaine =-4;
			break;

		case 'Saturday':
			$debSemaine =-5;
			break;
		
		default:
			$debSemaine =-6;
			break;
		}
		$dateD =jourPlusK($debSemaine);
		return $dateD;

}

function dateFinSemaineActuelle (){
return dateDebutSemaineActuelle() +6;

}

//affichage des dates de la semaine actuelle
function dateSemaineActuelle(){
	// recuperation de la date de debut
	$dateDeb=  dateDebutSemaineActuelle ();
	$dateD =jourPlusK($dateDeb);
	$dateF=jourPlusK($dateDeb + 6);
	$semaineActu= " Semaine du ". $dateD . " au " . $dateF;
	echo $semaineActu;

}

// fonction permettant de connaitre les dates de deb et fin de la semaine prec
function dateSemainePrec(){


$semAc=dateDebutSemaineActuelle ();
// date de debut semaine derniere
$dateDeb =jourPlusK($semAc -7); 
$dateFin = jourPlusK($semAc -1);
$semainePrec= " Semaine du ". $dateDeb . " au " . $dateFin;
echo $semainePrec;
}

function dateSemaineSuiv(){
$semAc=dateFinSemaineActuelle ();
// date de debut semaine derniere
$dateDeb =jourPlusK($semAc +1); 
$dateFin = jourPlusK($semAc +7);
$semaineSuiv= " Semaine du ". $dateDeb . " au " . $dateFin;
echo $semaineSuiv;
}



function convertDateToDatetime($date)
{

	  $date = new DateTime($date);

          return $date->format('Y-m-d H:i:s');

}
?>