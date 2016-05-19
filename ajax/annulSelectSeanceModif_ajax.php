<?php 

require_once("../services/annulSelectSeance.php");

//Etape 1: on recupere les champs 
$jourSeanceModif = $_POST["jourSeanceModif"]; 
$res2 = jourSelectSeances($jourSeanceModif);
$res = array();
	for ($i=0;$i<sizeof($res2);$i++)
	{
	    $res[]=$res2[$i];
	}
echo json_encode($res);	       

?>
