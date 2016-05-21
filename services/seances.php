<?php

require_once("connectdb.php");
//require_once("model.php");

function addSeance($jourSeance,$heureDeb, $heureFin,$nbPlace,$nomCoach,$prenomCoach) {
	$dbh = connect();
	$estInserer=false;

	 $dateDeb = new DateTime($jourSeance);
 // recuperation de l heure de debut de la seance dans un tableau
  $dateDeb2=date_parse($heureDeb);
  // extraction de l heure et de la minute
 $heure= $dateDeb2['hour'];
$min=$dateDeb2['minute'];
// concatenation avec date de la seance 
 $dateDeb->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
  $dateDeb =$dateDeb->format('Y-m-d H:i:s');


 $dateFin = new DateTime($jourSeance);
 // recuperation de l heure de debut de la seance dans un tableau
  $dateFin2=date_parse($heureFin);
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
		///recuperation id coach
		$sql=$dbh->query("SELECT idPerson From person WHERE Prenom ='$nomCoach' and Nom='$prenomCoach'");
		$row2=$sql->rowCount();
		if($row2>0)
			{
				$coachId=$row2['idPerson'];
			}
		else
		{
			$coachId=0;
		}

		$requete = $dbh->query("INSERT INTO Seance (DateD,DateF,PlaceDispo,Coach) VALUES ('$dateDeb','$dateFin','$nbPlace',$coachId)");
		$estInserer= true;
	}

	 $reslt=array('estInserer' =>$estInserer);		 
	
	return $reslt;
}


function getSeance($dateDeb,$dateFin){

		$dbh = connect();
	 $dateDeb =new DateTime($dateDeb);
	 $dateDeb =$dateDeb->format('Y-m-d H:i:s');

	  // echo $dateDeb;
	   // on ajoute un jour a la date de fin pour prendre compte des seances du dernier jour
	//$dateFin=strtotime("+ 1 days", strtotime($dateFin));
	 $dateFin =new DateTime($dateFin);
	 //$dateFin->add(new DateInterval('P100D'));
	 $dateFin =$dateFin->format('Y-m-d H:i:s');
	 

	$requete = $dbh->query("SELECT * FROM Seance WHERE DateD BETWEEN  '$dateDeb' AND '$dateFin'");
	$res = array();
	while($row=$requete->fetch()){
		$id=$row["IdSeance"];
		$start=$row["DateD"];
		$end=$row["DateF"];
		$place=$row["PlaceDispo"];
		//$coach=$row["Coach"];
		  $res[]=array(
                    "idS" => $id,
                    "start" => $start,
                    "end" =>$end,
                    "place"=>$place,
                    //"coach"=>$coach
                    );
	}
	return $res;
}


function updateSeance($jourSeance,$heureDeb, $heureFin,$nvJourSeance,$nvHeureDeb,$nvHeureFin,$nbPlace,$nomCoach,$prenomCoach) {
	$dbh = connect();
	$isUpdated=false;

		 $dateDeb = new DateTime($jourSeance);
	 // recuperation de l heure de debut de la seance dans un tableau
	  $dateDeb2=date_parse($heureDeb);
	  // extraction de l heure et de la minute
	 $heure= $dateDeb2['hour'];
	$min=$dateDeb2['minute'];
	// concatenation avec date de la seance 
	 $dateDeb->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
	  $dateDeb =$dateDeb->format('Y-m-d H:i:s');


 $dateFin = new DateTime($jourSeance);
 // recuperation de l heure de debut de la seance dans un tableau
  $dateFin2=date_parse($heureFin);
  // extraction de l heure et de la minute
 $heure2= $dateFin2['hour'];
$min2=$dateFin2['minute'];
// concatenation avec date de la seance 
 $dateFin->add(new DateInterval('PT'.$heure2.'H'.$min2.'M'));
  $dateFin=$dateFin->format('Y-m-d H:i:s');

// nv dates de deb et fin 
  $dateDebNv = new DateTime($nvJourSeance);
    $dateDebNv2=date_parse($nvHeureDeb);
     $heureNv= $dateDebNv2['hour'];
	 $minNv=$dateDebNv2['minute'];
	  $dateDebNv ->add(new DateInterval('PT'.$heureNv.'H'.$minNv.'M'));
 	 $dateDebNv  =$dateDebNv ->format('Y-m-d H:i:s');

 	 $dateFinNv = new DateTime($nvJourSeance);
 	 $dateFinNv2=date_parse($nvHeureFin);
 	 $heureNv2= $dateFinNv2['hour'];
	 $minNv2=$dateFInNv2['minute'];
	  $dateFinNv ->add(new DateInterval('PT'.$heureNv2.'H'.$minNv2.'M'));
 	 $dateFinNv  =$dateFinNv ->format('Y-m-d H:i:s');

$sql=$dbh->query("SELECT idPerson From person WHERE Prenom ='$nomCoach' and Nom='$prenomCoach'");
		$row2=$sql->rowCount();
		if($row2>0)
			{
				$coachId=$row2['idPerson'];
			}
		else
		{
			$coachId=0;
		}

	$requete = $dbh->query("UPDATE FROM SEANCE SET DateD='$dateDebNv', DateF='$dateFinNv',PlaceDispo='$nbPlace',Coach='$coachId'
							WHERE DateD='$dateDeb'");
	$row = $requete->rowCount();

			if ($row >0)
		{
			$isUpdated=true;
		}
	 $reslt=array('isUpdated' =>$$isUpdated);		 
	
	return $reslt;
}
