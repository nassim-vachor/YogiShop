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
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
          <!-- utilisation de style.css pour les differents types d ecrans (responsives) -->
        <link rel="stylesheet" media="screen and (min-width:1024px)"  href="grand.css" >
        <link rel="stylesheet" media="screen and (min-width:800px) and (max-width:1024px)  "  href="moyen.css"  >
        <link rel="stylesheet" media="screen and (min-width:300px) and (max-width:800px) "  href="petit.css"  >

       
        <title>YogiShop</title>
    </head>
    <body>
    	<section>
        	<header>
        	
    <p><a href="reservation.php"><img src="connexion.png" class="connexButton" alt="connexion"></a></p>
               	<nav>
				  <ul class="navBarPetit">
				     
					<li class="nav-item"><a href="accueil.php"><strong>Accueil</strong></a></li>
				    <li class="nav-item"><a href="reservation.php"><strong>Reservation</strong></strong></strong></a></li>
				    <li class="nav-item"><a href="stade.php"><strong>YogiShop</strong></strong></a></li>
				    <li class="nav-item"><a href="contact.php"><strong>Nous contacter</strong></a></li>
				    
				   </ul>

				</nav>
               
    
				 <div class="logo"> </div>

        	</header>

        </section>

                
		