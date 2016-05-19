<?php

include("connectdb.php");
 $dbh = connect();
$output = array();
// recuperation de la donnée contenu dans le champs recherché
 if(isset($_POST['searchVal'])){

 	$searchq = $_POST['searchVal'];
 	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
 	// recherche de ce motif dans la bd
 	$requete = $dbh->query("SELECT * FROM Person WHERE Prenom LIKE '$searchq%' OR Nom LIKE '$searchq%'");
 	$row=$requete->rowCount();
 	if($row == 0)
 	{

 		$output[]=array(
 				"idP"  => "-1",
 				"Nom" => "aucun adhérent n'a ce nom!!",
 				"Prenom" => "Erreur,"
 				);

 		//$output = ["Erreur, aucun adhérent n'a ce nom !"];
 		
 	}
 	else{
 		// on parcours les adherents trouves dans la bd qui matchent 
 		while($row2 =$requete->fetch())
 		{   

 			$prenom= $row2["Prenom"];
 			
 			$nom= $row2["Nom"];
 			$id = $row2["IdPerson"];

 			$output[]=array(
 				"idP" => $id,
 				"Nom" => $nom,
 				"Prenom" => $prenom

 				);
 			
 			// concatenation du nom et prenom 
 			//$output .= '<div id="in">'.$prenom.' '.$nom.'</div>';
 		}
 	}
 }
 	echo json_encode($output);
	//echo ($output);

?>

