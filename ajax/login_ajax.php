<?php 

require_once("../services/login.php");

//Etape 1: on recupere les logins
$username = $_POST["username"]; 
$password = sha1($_POST["password"]);

//$token = login($username, $password);
$res = login($username, $password);
$token = $res['token'];
$id = $res['idPerson'];
echo json_encode(array(
	"token" => $token,
	"idP"=> $id
));
?>