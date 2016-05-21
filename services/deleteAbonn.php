<?php

require_once("connectdb.php");

function deleteAb($id) {
						$dbh = connect();
						$estSupp=false;
						$req3=$dbh->query("SELECT type FROM abonnement WHERE
                            IdAbonnement='$id'");
                         $row2=$req3->fetch();
                         $type= $row2['type'];
	                     if ($type=='A la séance'){
                            $req3=$dbh->query("DELETE *  FROM souscrire WHERE IdAbonnement='$id'");
                            $req1=$dbh->query("DELETE FROM alacarte WHERE IdAbonnement='$id'");
                            $req=$dbh->query("DELETE FROM abonnement WHERE IdAbonnement='$id'");
                            $estSupp=true;
                            
                          }

                    else{
                      $req3=$dbh->query("DELETE FROM souscrire WHERE IdAbonnement='$id'");
                      $req2=$dbh->query("DELETE FROM temporel WHERE IdAbonnement='$id'");
                      $req=$dbh->query("DELETE FROM abonnement WHERE IdAbonnement='$id'");
                      $estSupp=true;
                     
                    }
                     $reslt=array("estSupp" =>$estSupp );
	       			 return $reslt;
	   }
	   ?>