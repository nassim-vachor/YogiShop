
<?php
include("services/connectdb.php");
require_once("services/date.php");
 

function seanceSemaineActuelle($dateDeb, $dateFin){
	$dbh = connect();
	 $dateDeb =convertDateToDatetime($dateDeb);
	  // echo $dateDeb;
	   // on ajoute un jour a la date de fin pour prendre compte des seances du dernier jour
	$dateFin=addDayswithdate($dateFin,1);
	 $dateFin =convertDateToDatetime($dateFin);
	 

	$requete = $dbh->query("SELECT * FROM Seance WHERE DateD BETWEEN  '$dateDeb' AND '$dateFin'");
		

	$tabDate= array("tabDateDeb" =>array() ,"tabDateFin" =>array());
	 while ( $row=$requete->fetch()){
		$tabDate['tabDateDeb'][]=$row['DateD'];
		$tabDate['tabDateFin']=$row['DateF'];
	 }
//echo $tabDate['tabDateDeb'][0]; 
		// pour parcourir le tableau 
		for($i=0;$i<sizeof($tabDate['tabDateDeb']);$i++){
		 	
		 	echo $tabDate['tabDateDeb'][$i]; 

		 }
	

//	return $tabDate;
}

// verification avant insertion : date compris entre 8h et 20h
function ajouterSeance($dateDeb,$dateFin,$nbPlaceDispo){
	$dbh = connect();
	$insertReussi =false;
	

	// 1ere etape on regarde si date de la seance est compris entre 8h et 20h

	// recherche des seances qui sont sur le meme creneau ou en chevauchement sur ce creneau
	$requete = $dbh->query("SELECT * FROM Seance WHERE
	 (DateD > '2016-05-14 09:00:00' and DateD < '2016-05-14 13:00:00') OR (DateF > '2016-05-14 09:00:00' and DateF < '2016-05-14 13:00:00')
	 OR  (DateD <= '2016-05-14 09:00:00' and DateF = '2016-05-14 13:00:00')");
	$row = $requete->rowCount();

	// si aucun element n'a ete retrouve 
	if ($row <1)
	{
		$requete = $dbh->query("INSERT INTO Seance (DateD,DateF,PlaceDispo) VALUES ('2016-05-14 11:30:00','2016-05-14 11:30:00','$nbPlaceDispo')");
		$insertReussi = true;

	}
	return $insertReussi;
}

// supprime une seance choisi soit en cliquant sur une des seance apparaissant sur agenda soit en le selectionnant dans les seances deja crees 
function supprimerSeance($dateDeb){
	$dbh = connect();
	$requete = $dbh->query("DELETE FROM Seance WHERE DateD = '2016-05-14 11:30:00'");
}




function tousLesCoach(){
		$dbh = connect();
	$requete = $dbh->query("SELECT Nom,Prenom From  Person  WHERE EstCoach = 1");
	return $requete;

}

function tousLesSeanceJourJ($jour){
	$dbh = connect();
	 $dateDeb =convertDateToDatetime($jour);
	 
	$dateFin=addDayswithdate($jour,1);
	 $dateFin =convertDateToDatetime($dateFin);
	$requete = $dbh->query("SELECT * FROM Seance WHERE DateD BETWEEN  '$dateDeb' AND '$dateFin'");
	return $requete;
}

?>