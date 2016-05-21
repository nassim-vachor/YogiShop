<?php

include("connectdb.php");
 $dbh = connect();
$output = '';
// recuperation de la donnée contenu dans le champs recherché
 if(isset($_POST['searchVal'])){

 	$searchq = $_POST['searchVal'];
 	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
 	// recherche de ce motif dans la bd
 	$requete = $dbh->query("SELECT * FROM Person WHERE Prenom LIKE '$searchq%' OR Nom LIKE '$searchq%'");
 	$row=$requete->rowCount();
 	if($row == 0)
 	{
 		$output = "Erreur, aucun adhérent n'a ce nom !";
 		
 	}
 	else{
 		// on parcours les adherents trouves dans la bd qui matchent 
 		while($row2 =$requete->fetch())
 		{

 			$prenom= $row2["Prenom"];
 			
 			$nom= $row2["Nom"];
 			$id = $row2["IdPerson"];
 			// concatenation du nom et prenom 
 			$output .= '<div id="in">'.$prenom.' '.$nom.'</div>';
 		}
 	}
 }
	echo ($output);

?>

<script type="text/javascript">
$("#in").click(function(){
	//alert($("#in").text());
	$("#nom").val($("#in").text());
});

</script>