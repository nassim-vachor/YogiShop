
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


	function annulSeanceEvent($jourSeance2,$heureDeb) {
	$dbh = connect();
	// construction de la date de deb de seance, comme a une heure donnee, il n ya qu une seule seance 
	// on n a pas besoin de recuperer la date de fin aussi 

		   // conversion du string recuperee en date
		      list($d, $m, $y) = explode('/', $jourSeance2);
			$mk=mktime(0, 0, 0, $m, $d, $y);
			$jourSeance2=strftime('%Y-%m-%d',$mk);
 			$dateDeb = new DateTime($jourSeance2);


  list($heure, $min) = explode(':', $heureDeb);
			
 $dateDeb->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
  $dateDeb =$dateDeb->format('Y-m-d H:i:s');

	$deleted =0;

// recuperation des personnnes qui sont inscrites a ce cours 
	   $requete = $dbh->query("DELETE FROM s_incrire 
		 	WHERE IdSeance   IN (SELECT IdSeance FROM SEANCE WHERE DateD='$dateDeb' )
		 	
			");

	   // si il n ya personne qui est inscrit a ce cours alors on peut effectuer la suppression 
	/*	if ($requete->rowCount() <1){*/

			$sql=$dbh->query("DELETE FROM  Seance WHERE DateD='$dateDeb'");
				$deleted=$sql->rowCount();

				//}

	
	       $reslt=array("deleted" =>$deleted,"datedeb"=>$heure, "datemin" =>$min);
	       return $reslt;
	}
// fonction permettant d'annuler une seance pour un client donne 
function annulSeanceClient($jourSeance2,$heureDeb){
	$dbh = connect();
		  list($d, $m, $y) = explode('/', $jourSeance2);
					$mk=mktime(0, 0, 0, $m, $d, $y);
					$jourSeance2=strftime('%Y-%m-%d',$mk);
		 			$dateDeb = new DateTime($jourSeance2);


		  list($heure, $min) = explode(':', $heureDeb);
					
		 $dateDeb->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
		  $dateDeb =$dateDeb->format('Y-m-d H:i:s');

			$deleted =0;

			  $id = $_COOKIE['id'];

			  //  verifier que date +12h  < dateSeance  
			 $dateActu = new DateTime();
			 $date= Date('Y-m-d');
			 $dateActu->add(new DateInterval(('PT12H')));
		     $dateActu =$dateActu->format('Y-m-d H:i:s');

		     // selection de nbPlace dans seance 
		   /*  $req=$dbh->query("SELECT * FROM SEANCE WHERE DateD='$dateDeb'");
		     $row=$req->fetch();
		     $place=$row["PlaceDispo"];*/

		     // selection des donnes du clients
		     $req=$dbh->query("SELECT * FROM Person WHERE IdPerson='$id'");
		     $row=$req->fetch();
		     $duree=$row['DateExpiration'];
		     $NbSeance=$row['NbSeances'];
		     $NbSeance=$NbSeance+1;

			  if ($dateActu < $dateDeb ){
			  	// client a un abonnement a la seance
				  	if($duree< $date){

				  		 $req3=$dbh->query("UPDATE Person SET NbSeances='$NbSeance' WHERE IdPerson='$id'");
				  	}


				  	  // modifier nbre de placedispo pour cette seance: incrementation 
				  		$req4=$dbh->query("SELECT * FROM Seance WHERE DateD='$dateDeb'");
				  		$row2=$req4->fetch();
				  		$place=$row2['PlaceDispo'];
				  		$place=$place+1;
				  		$idSeance=$row2['IdSeance'];
				  			$req4=$dbh->query("UPDATE Seance  SET PlaceDispo = $place WHERE DateD='$dateDeb'");

				  			// suppresioon dans la table inscrire du client 
				  		 $req5=$dbh->query("DELETE FROM s_incrire WHERE IdSeance='$idSeance ' and IdPerson=' $id'");
				  		 $deleted=$req5->rowCount();
			}
			  // annulation impossible car trop tard 
			else{
			  	$deleted=-1;
			}

			 $reslt=array("deleted" =>$deleted);
	       return $reslt;

}