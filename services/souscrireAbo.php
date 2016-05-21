
<?php

require_once("connectdb.php");

function souscrireAbonnement($idP, $dateS, $Abonnement, $type, $tarif, $nbS, $duree ) {
				$estSouscrit=false;
				$dbh = connect();
				$req3=$dbh->query("SELECT IdAbonnement FROM abonnement WHERE
                 Libelle='$Abonnement'");           
           		 $row2=$req3->fetch();
				$idA= $row2["IdAbonnement"];

		if ($type=='A la séance') {
			$sql=$dbh->query("INSERT INTO souscrire( IdAbonnement, IdPerson,tarifEffective, DateSouscription, 
				nbSeanceEffective ) VALUES ('$idA', '$idP', '$tarif', '$dateS', '$nbS')");
			$req4=$dbh->query("SELECT NbSeances FROM person WHERE
                            IdPerson='$idP'");
			 $row=$req4->fetch();
             $dateE= $row["NbSeances"];
             $dateE=($dateE + $nbS);

			$req=$dbh->query("UPDATE person SET NbSeances='$dateE'
                            WHERE IdPerson='$idP'");
			$estSouscrit=true;
			
		}

		else {
			$sql=$dbh->query("INSERT INTO souscrire( IdAbonnement, IdPerson,tarifEffective, DateSouscription, 
				 dureeEffective ) VALUES ('$idA', '$idP', '$tarif', '$dateS','$duree')");
			$req4=$dbh->query("SELECT DateExpiration FROM person WHERE
                            IdPerson='$idP'");
                $row=$req4->fetch();
                $dateE= $row["DateExpiration"];
                if ($dateE==null ) {
                	$date = strtotime("+".$duree." days", strtotime($dateS));
    				$date= date("Y-m-d", $date);

                }
                else{
                $date = strtotime("+".$duree." days", strtotime($dateE));
    			$date= date("Y-m-d", $date);
    		}
			$req=$dbh->query("UPDATE person SET DateExpiration='$date'
                            WHERE IdPerson='$idP'");
			$estSouscrit=true;
			}

			    $reslt=array("estSouscrit" =>$estSouscrit);
	       		return $reslt;



}