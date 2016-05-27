
<?php

require_once("connectdb.php");
function oui($jourSeance,$nvJourSeance,$heureDebAncien,$heureDeb, $heureFin,$nbPlace){
	$dbh = connect();
	$isUpdated=false;

		    // conversion du string recuperee en date
		      list($d, $m, $y) = explode('/', $jourSeance);
			$mk=mktime(0, 0, 0, $m, $d, $y);
			$jourSeance=strftime('%Y-%m-%d',$mk);
			 $dateDebAv=new DateTime($jourSeance);
			list($heure, $min) = explode(':', $heureDebAncien);
						
			 $dateDebAv->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
			  $dateDebAv =$dateDebAv->format('Y-m-d H:i:s');

		      list($d, $m, $y) = explode('/', $nvJourSeance);
			$mk=mktime(0, 0, 0, $m, $d, $y);
			$nvJourSeance=strftime('%Y-%m-%d',$mk);

		 $dateDeb = new DateTime($nvJourSeance);

		list($heure, $min) = explode(':', $heureDeb);			
 		$dateDeb->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
 		$dateDeb =$dateDeb->format('Y-m-d H:i:s');

 		$dateFin = new DateTime($nvJourSeance);

 		list($heure, $min) = explode(':', $heureFin);			
 		$dateFin->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
 		$dateFin =$dateFin->format('Y-m-d H:i:s');
 		 $requetePrem=$dbh->query("SELECT * FROM Seance WHERE DateD='$dateDeb'");
		  $row3 = $requetePrem->fetch();
		  $idPrec=$row3['IdSeance'];

		$requete = $dbh->query("SELECT * FROM Seance WHERE
	 	((DateD > '$dateDeb' and DateD < '$dateFin') OR (DateF > '$dateDeb' and DateF < '$dateFin')
		 OR  (DateD <= '$dateDeb' and DateF = '$dateFin') OR (DateD <= '$dateDeb' and '$dateFin' <=DateF))
		AND (IdSeance != '$idPrec')");
		$row = $requete->rowCount();


		
		/*
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
				*/


		// si aucun element n'a ete retrouve 
		// penser a rajouter le coach S
		if ($row <1 and ($dateDeb <$dateFin)){
		$requete = $dbh->query("UPDATE SEANCE SET DateD='$dateDeb', DateF='$dateFin',PlaceDispo='$nbPlace'
							WHERE DateD='$dateDebAv'");
		$row2 = $requete->rowCount();

			if ($row2 >0)
				{
					$isUpdated=true;
				}
	 	}


	$reslt=array('isUpdated' =>$isUpdated);
	return $reslt;
}