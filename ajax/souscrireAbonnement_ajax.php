<?php 

require_once("../services/souscrireAbo.php");

$idP = $_POST["idP"];
$dateS = $_POST["dateS"]; 
$Abonnement = $_POST["Abonnement"]; 
$type = $_POST["type"]; 
$tarif = $_POST["tarif"]; 
$nbS = $_POST["nbS"]; 
$duree = $_POST["duree"]; 

$res= souscrireAbonnement($idP, $dateS, $Abonnement, $type, $tarif, $nbS, $duree );
echo json_encode($res);	       

?>