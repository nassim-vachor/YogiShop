<?php

require_once("connectdb.php");

function modifInfoSeance($jourSeanceModif,$myselectSeanceModif) {
	$dbh = connect();
	// construction de la date de deb de seance, comme a une heure donnee, il n ya qu une seule seance 
	// on n a pas besoin de recuperer la date de fin aussi 

	 $dateDeb = new DateTime($jourSeanceModif);

	 // avec le select recuperer: datedeb seance au format 14:00
	 $heure= intval(substr($myselectSeanceModif,0,2));
	 $min=intval(substr($myselectSeanceModif, 3,6));
	 //var_dump($heure);
	  $dateDeb->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
  		$dateDeb =$dateDeb->format('Y-m-d H:i:s');



	$sql=$dbh->query("SELECT * FROM  Seance WHERE DateD='$dateDeb'");
		//$selected=$sql->rowCount();
		 $row =$sql->fetch();  
		//$dateDeb=$row["DateD"];
		//$dateDeb->format('H:i');
		$dateFin=$row["DateF"];
		//$dateFin->format('H:i');
	
	       $reslt=array("datedeb"=>$dateDeb, "datefin" =>$dateFin);
	       return $reslt;
	}
