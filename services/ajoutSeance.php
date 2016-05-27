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



function ajoutSeanceClient($jourSeance2,$heureDeb){

$dbh = connect();
		  list($d, $m, $y) = explode('/', $jourSeance2);
					$mk=mktime(0, 0, 0, $m, $d, $y);
					$jourSeance2=strftime('%Y-%m-%d',$mk);
		 			$dateDeb = new DateTime($jourSeance2);


		  list($heure, $min) = explode(':', $heureDeb);
					
		 $dateDeb->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
		  $dateDeb =$dateDeb->format('Y-m-d H:i:s');

			$inserer =0;

			  $id = $_COOKIE['id'];

			  //  verifier que date  < dateSeance  
			 $dateActu = new DateTime();
			 $date= Date('Y-m-d');
			 $dateActu->add(new DateInterval(('PT0H')));
		     $dateActu =$dateActu->format('Y-m-d H:i:s');

		     // selection de nbPlace dans seance 
		     $req=$dbh->query("SELECT * FROM SEANCE WHERE DateD='$dateDeb'");
		     $row=$req->fetch();
		     $place=$row["PlaceDispo"];
		     $idSeance=$row['IdSeance'];

		     // selection des donnes du clients
		     $req=$dbh->query("SELECT * FROM Person WHERE IdPerson='$id'");
		     $row=$req->fetch();
		     $dateExpiration=$row['DateExpiration'];
		     $NbSeance=$row['NbSeances'];
		    // $NbSeance=$NbSeance-1;


		     	// plus de place pour ce cours ou seance dans le passe
			  if ($dateActu < $dateDeb and $place >0 ){

			  	// client a un abonnement a la seance
				  	if($dateExpiration< $date and $NbSeance>0){
				  		$NbSeance=$NbSeance-1;
				  		 $req3=$dbh->query("UPDATE Person SET NbSeances='$NbSeance' WHERE IdPerson='$id'");

				  		  // modifier nbre de placedispo pour cette seance: decrementation
				  		$place=$place-1;
				  		$req4=$dbh->query("UPDATE Seance  SET PlaceDispo = $place WHERE IdSeance='$idSeance'");

				  			// suppresioon dans la table inscrire du client 
				  		 $req5=$dbh->query("INSERT INTO  s_incrire (IdSeance,IdPerson) VALUES
				  		 	('$idSeance', '$id')");
				  		 $inserer=$req5->rowCount();
				  	}
				  	// client a un abonnement temporel 
				  	else if ($dateExpiration>= $date){
				  		  // modifier nbre de placedispo pour cette seance: decrementation
				  		$place=$place-1;
				  		$req4=$dbh->query("UPDATE Seance  SET PlaceDispo = $place WHERE IdSeance='$idSeance'");

				  			// suppresioon dans la table inscrire du client 
				  		 $req5=$dbh->query("INSERT INTO  s_incrire (IdSeance,IdPerson) VALUES
				  		 	('$idSeance', '$id')");
				  		 $inserer=$req5->rowCount();

				  	}
				  	// pas d abonnement a la seance ni temporel
				  	else {

				  		$inserer= -1;

				  	}


				  	
			}
			  // reservation impossible car trop tard 
			else if ($place <1) {
			  	$inserer=-2;
			}

			// impossible d annuler seance dans le passe
			else {

				$inserer=-3;
			}

			 $reslt=array("inserer" =>$inserer);
	       return $reslt;

}

