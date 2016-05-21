<?php

require_once("connectdb.php");

function abonnementDetail($Abonnement, $type) {
            
						$dbh = connect();
						$req3=$dbh->query("SELECT IdAbonnement, Tarif FROM abonnement WHERE
                            Libelle='$Abonnement'");           
            $row2=$req3->fetch();
              $idA= $row2["IdAbonnement"];
              $tarif=$row2["Tarif"];
            if ($type=='A la séance') {
              $req4=$dbh->query("SELECT NbSeance FROM alacarte WHERE
                            IdAbonnement='$idA'");
                $row=$req4->fetch();
                $nbS= $row["NbSeance"];
                 $res=array(
                "NbSeance" => $nbS,
                 "Tarif" => $tarif  ); 
            }
            else {
              $req4=$dbh->query("SELECT duree FROM temporel WHERE
                            IdAbonnement='$idA'");
                $row=$req4->fetch();
                $duree= $row["duree"];
                 $res=array(
                "duree" => $duree,
                 "Tarif" => $tarif); 

            }
            
   			       return $res;
	   }
	   ?>