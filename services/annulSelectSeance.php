<?php


require_once("connectdb.php");

function jourSelectSeances($jour){
	$dbh = connect();
// conversion de la date de deb en datetime
	  $jour1 = new DateTime($jour);
	 $dateDeb =$jour1->format('Y-m-d H:i:s');
//  rajoute un jour a la date actuelle pour avoir date de fin
	 $jour2 = strtotime("+1 days", strtotime($jour));
	 $dateFin=date("d-m-Y", $jour2);

// conversion de la date de fin en datetime
	 $dateFin = new DateTime($dateFin);
	 $dateFin = $dateFin->format('Y-m-d H:i:s');

// requete dans la base
	$requete = $dbh->query("SELECT * FROM Seance WHERE DateD BETWEEN  '$dateDeb' AND '$dateFin'");
    $reslt = array();
	while ($row =$requete->fetch())
	{
	    $reslt[]=(new DateTime($row['DateD']))->format('H:i').'-'.(new DateTime($row['DateF']))->format('H:i');
	  
	
}
	       return $reslt;
}