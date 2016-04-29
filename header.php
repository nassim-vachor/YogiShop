<?php

try

{

    //$bdd = new PDO('mysql:host=127.12.109.130;dbname=php;charset=utf8', 'adminC3gxq8w', 'zt2Bn5kcHRit');


}

catch (Exception $e)

{

        die('Erreur : ' . $e->getMessage());

}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <title>YogiShop</title>
    </head>
    <body>
    	<section>
        	<header>
        		<p><a href="reservation.php"><img src="connexion.jpg" alt="connexion"></a></p>

        		
               	<nav>

               		<hr>

				   <ul>
				     
					<li><a href="accueil.php"><strong>Accueil</strong></a></li>
				    <li><a href="reservation.php"><strong>Reservation</strong></strong></strong></a></li>
				    <li><a href="stade.php"><strong>Stades</strong></strong></a></li>
				    <li><a href="contact.php"><strong>Contact</strong></a></li>
				    
				   </ul>
				</nav>
				  <div class="logo"></div>

        	</header>
        </section>
		