<?php 

require_once("../services/updatePassword.php");

//Etape 1: on recupere les champs 
$oldPwd = $_POST["oldPwd"];
$idC = $_POST["idC"];
$inputPwd = $_POST["inputPwd"];
$newPwd = $_POST["newPwd"];
$newPwd1 = $_POST["newPwd1"];

$res= updatePwd($idC,$oldPwd, $inputPwd,$newPwd,$newPwd1);
echo json_encode($res);	       

?>