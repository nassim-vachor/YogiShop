<?php

require_once("connectdb.php");

function login($username, $password) {
	$dbh = connect();
	$sql=$dbh->query("SELECT idPerson FROM Person WHERE email='$username' and password='$password'");
	$rowCount=$sql->rowCount();			 
	// compte le nombre de ligne retourne par le select 				 				
	if ($rowCount ==0)  //  pas de ligne retournée
	{
		return false;
		//throw new Exception('Invalid', 1);
	}
	else // utilisateur trouvee 
	{
        $row =$sql->fetch();           
	    $tokenValue=sha1(uniqid(rand()));   // création d'un nouveau token
	    $id=$row["idPerson"];
	    //*setcookie(name)
	    $maj=$dbh->query("UPDATE Person SET token ='$tokenValue' WHERE idPerson = '$id' "); //on MAJ la BD 
	  //  return $tokenValue;
	       $reslt=array("idPerson" =>$id ,"token"=> $tokenValue);
	       return $reslt;
	}
}