<?php

require_once("connectdb.php");
//require_once("model.php");

function ajoutSeance($jourSeance,$heureSeanceD, $heureSeanceF,$nbPlace,$myselectCoach) {
	$dbh = connect();
	$estInserer=false;

	 $dateDeb = new DateTime($jourSeance);
 // recuperation de l heure de debut de la seance dans un tableau
  $dateDeb2=date_parse($heureSeanceD);
  // extraction de l heure et de la minute
 $heure= $dateDeb2['hour'];
$min=$dateDeb2['minute'];
// concatenation avec date de la seance 
 $dateDeb->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
  $dateDeb =$dateDeb->format('Y-m-d H:i:s');


 $dateFin = new DateTime($jourSeance);
 // recuperation de l heure de debut de la seance dans un tableau
  $dateFin2=date_parse($heureSeanceF);
  // extraction de l heure et de la minute
 $heure2= $dateFin2['hour'];
$min2=$dateFin2['minute'];
// concatenation avec date de la seance 
 $dateFin->add(new DateInterval('PT'.$heure2.'H'.$min2.'M'));
  $dateFin=$dateFin->format('Y-m-d H:i:s');

 //echo $date;
	// 1ere etape on regarde si date de la seance est compris entre 8h et 20h
	// recherche des seances qui sont sur le meme creneau ou en chevauchement sur ce creneau
	$requete = $dbh->query("SELECT * FROM Seance WHERE
	 (DateD > '$dateDeb' and DateD < '$dateFin') OR (DateF > '$dateDeb' and DateF < '$dateFin')
	 OR  (DateD <= '$dateDeb' and DateF = '$dateFin') OR (DateD <= '$dateDeb' and '$dateFin' <=DateF)");
	$row = $requete->rowCount();

	// si aucun element n'a ete retrouve 
	// penser a rajouter le coach S
	if ($row <1 and ($dateDeb <$dateFin)){
		$requete = $dbh->query("INSERT INTO Seance (DateD,DateF,PlaceDispo) VALUES ('$dateDeb','$dateFin','$nbPlace')");
		$estInserer= true;
	}

	 $reslt=array('estInserer' =>$estInserer);		 
	
	return $reslt;
}


