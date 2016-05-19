<?php

require_once("connectdb.php");

function annulSeance($jourSeance2,$myselectSeance) {
	$dbh = connect();
	// construction de la date de deb de seance, comme a une heure donnee, il n ya qu une seule seance 
	// on n a pas besoin de recuperer la date de fin aussi 

	 $dateDeb = new DateTime($jourSeance2);

	 // avec le select recuperer: datedeb seance au format 14:00
	 $heure= intval(substr($myselectSeance,0,2));
	 $min=intval(substr($myselectSeance, 3,6));
	 //var_dump($heure);
	  $dateDeb->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
  		$dateDeb =$dateDeb->format('Y-m-d H:i:s');



	$sql=$dbh->query("DELETE FROM  Seance WHERE DateD='$dateDeb'");
		$deleted=$sql->rowCount();
	
	       $reslt=array("deleted" =>$deleted,"datedeb"=>$heure, "datemin" =>$min);
	       return $reslt;
	}
