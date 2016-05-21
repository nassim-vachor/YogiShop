<?php

require_once("connectdb.php");

function abonnementsType($typeAbonnement) {
            $res = array();
						$dbh = connect();
						$req3=$dbh->query("SELECT IdAbonnement, Libelle FROM abonnement WHERE
                            type='$typeAbonnement'");           
        while( $row2=$req3->fetch())
    {   

                  $idA= $row2["IdAbonnement"];
                  
                  $lib= $row2["Libelle"];
                  $res[]=array(
                    "idA" => $idA,
                    "Libelle" => $lib
                    );
    }
	       			 return $res;
	   }
	   ?>