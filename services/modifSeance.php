<?php

require_once("connectdb.php");
// penser aussi a changer le jour de la seance 

function  modifSeance($jourSeanceModif,$myselectSeanceModif,$heureSeanceDModif , $heureSeanceFModif,$nbPlaceModifPlace){
	$dbh = connect();
	// construction de la date de deb de seance, comme a une heure donnee, il n ya qu une seule seance 
	// on n a pas besoin de recuperer la date de fin aussi 
	$deleted=0;
	 $dateDebAv = new DateTime($jourSeanceModif);

	 // avec le select recuperer: datedeb seance au format 14:00
	 $heure= intval(substr($myselectSeanceModif,0,2));
	 $min=intval(substr($myselectSeanceModif, 3,6));
	 //var_dump($heure);
	  $dateDebAv->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
  		$dateDebAv =$dateDebAv->format('Y-m-d H:i:s');

  		// nvelles heures 
  		$dateDebNv= new DateTime($jourSeanceModif);
  		  $dateDeb2=date_parse($heureSeanceDModif);
  		   // extraction de l heure et de la minute
		 $heure= $dateDeb2['hour'];
		$min=$dateDeb2['minute'];
		// concatenation avec date de la seance 
		 $dateDebNv->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
		  $dateDebNv =$dateDebNv->format('Y-m-d H:i:s');

		  $dateFinNv= new DateTime($jourSeanceModif);
  		  $dateFin2=date_parse($heureSeanceFModif);
  		   // extraction de l heure et de la minute
		 $heure2= $dateFin2['hour'];
		$min2=$dateFin2['minute'];
		// concatenation avec date de la seance 
		 $dateFinNv->add(new DateInterval('PT'.$heure2.'H'.$min2.'M'));
		  $dateFinNv =$dateFinNv->format('Y-m-d H:i:s');

// recuperation de l'id de l'element qu on veut mettre a jour 
		  $requetePrem=$dbh->query("SELECT * FROM Seance WHERE DateD='$dateDebAv'");
		  $row3 = $requetePrem->fetch();
		  $idPrec=$row3['IdSeance'];
// requete pour savoir si on peut inserer l'element 
  		  $requete = $dbh->query("SELECT * FROM Seance WHERE
	 ((DateD > '$dateDebNv' and DateD < '$dateFinNv') OR (DateF > '$dateDebNv' and DateF < '$dateFinNv')
	 OR  (DateD <= '$dateDebNv' and DateF = '$dateFinNv') OR (DateD <= '$dateDebNv' and '$dateFinNv' <=DateF)) AND (IdSeance != '$idPrec')");
	$row = $requete->rowCount();

		if ($row<1 and ($dateDebNv < $dateFinNv)) {
	

		$sql=$dbh->query("UPDATE  Seance  SET  DateF='$dateFinNv', DateD='$dateDebNv', PlaceDispo='$nbPlaceModifPlace' WHERE DateD='$dateDebAv'");
		$deleted=$sql->rowCount();
	
	}
	       $reslt=array("deleted" =>$deleted,"datedeb"=>$heure, "datemin" =>$row);
	       return $reslt;
	}
