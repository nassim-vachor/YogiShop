<?php

require_once("connectdb.php");
//require_once("model.php");

/*
function addSeance($jourSeance,$heureDeb, $heureFin,$nbPlace) {
	$dbh = connect();
	$estInserer=false;
		   
		   // conversion du string recuperee en date
		      list($d, $m, $y) = explode('/', $jourSeance);
			$mk=mktime(0, 0, 0, $m, $d, $y);
			$jourSeance=strftime('%Y-%m-%d',$mk);



	 $dateDeb = new DateTime($jourSeance);
 // recuperation de l heure et minute  de debut
  list($heure, $min) = explode(':', $heureDeb);
			
 $dateDeb->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
  $dateDeb =$dateDeb->format('Y-m-d H:i:s');


 $dateFin = new DateTime($jourSeance);
 // recuperation de l heure de fin 
 list($heure2, $min2) = explode(':', $heureFin);

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
	/*	$sql=$dbh->query("SELECT idPerson From person WHERE Prenom ='$nomCoach' and Nom='$prenomCoach'");
		$row2=$sql->rowCount();
		if($row2>0)
			{
				$coachId=$row2['idPerson'];
			}
		else
		{
			$coachId=0;
		}
*/
	/*	$requete = $dbh->query("INSERT INTO Seance (DateD,DateF,PlaceDispo) VALUES ('$dateDeb','$dateFin','$nbPlace')");
		$estInserer= true;
	}

	 $reslt=array('estInserer' =>$estInserer);		 
	
	return $reslt;
}
*/

function getSeanceClient($dateDeb,$dateFin){

		$dbh = connect();
	 $dateDeb =new DateTime($dateDeb);
	 $dateDeb =$dateDeb->format('Y-m-d H:i:s');

	  // echo $dateDeb;
	   // on ajoute un jour a la date de fin pour prendre compte des seances du dernier jour
	//$dateFin=strtotime("+ 1 days", strtotime($dateFin));
	 $dateFin =new DateTime($dateFin);
	 //$dateFin->add(new DateInterval('P100D'));
	 $dateFin =$dateFin->format('Y-m-d H:i:s');
	 $id= $_COOKIE["id"];
	 
	 $requete = $dbh->query("SELECT * FROM Seance s , s_incrire i 
	 	WHERE i.IdPerson='$id' and i.IdSeance=s.IdSeance
	 		and ( DateD BETWEEN  '$dateDeb' AND '$dateFin')
		");


	//$requete = $dbh->query("SELECT * FROM Seance WHERE DateD BETWEEN  '$dateDeb' AND '$dateFin'");
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

// recuperer les seances auxquelles ne sont pas inscrits le client 
function getOtherSeanceClient($dateDeb,$dateFin){

		$dbh = connect();
	 $dateDeb =new DateTime($dateDeb);
	 $dateDeb =$dateDeb->format('Y-m-d H:i:s');

	  // echo $dateDeb;
	   // on ajoute un jour a la date de fin pour prendre compte des seances du dernier jour
	//$dateFin=strtotime("+ 1 days", strtotime($dateFin));
	 $dateFin =new DateTime($dateFin);
	 //$dateFin->add(new DateInterval('P100D'));
	 $dateFin =$dateFin->format('Y-m-d H:i:s');
	 $id= $_COOKIE["id"];
	 
	 $requete = $dbh->query("SELECT * FROM Seance s 
	 	WHERE s.IdSeance  NOT IN (SELECT IdSeance FROM s_incrire WHERE IdPerson='$id' )
	 	AND  DateD BETWEEN  '$dateDeb' AND '$dateFin'
		");


	//$requete = $dbh->query("SELECT * FROM Seance WHERE DateD BETWEEN  '$dateDeb' AND '$dateFin'");
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


