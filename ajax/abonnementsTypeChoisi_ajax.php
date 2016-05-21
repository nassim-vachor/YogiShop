<?php 

require_once("../services/abonnementDuType.php");

//Etape 1: on recupere les champs 
$typeAbonnement = $_POST["typeAbonnement"]; 

$res= abonnementsType($typeAbonnement);
echo json_encode($res);	       

?>