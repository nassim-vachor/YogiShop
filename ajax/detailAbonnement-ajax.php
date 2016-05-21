<?php 

require_once("../services/abonnementDetail.php");

//Etape 1: on recupere les champs 
$Abonnement = $_POST["Abonnement"];
$type = $_POST["type"]; 

$res= abonnementDetail($Abonnement, $type );
echo json_encode($res);	       

?>