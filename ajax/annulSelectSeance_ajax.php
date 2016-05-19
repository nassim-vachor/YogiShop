<?php 

require_once("../services/annulSelectSeance.php");

//Etape 1: on recupere les champs 
$jourSeance2 = $_POST["jourSeance2"]; 
$res2 = jourSelectSeances($jourSeance2);
$res = array();
	for ($i=0;$i<sizeof($res2);$i++)
	{
	    $res[]=$res2[$i];
	}
echo json_encode($res);	       

?>


