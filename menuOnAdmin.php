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


        	<header id="menuTop">
             <!-- id pour la partie javascript -->
        	<a href="#" class="header__icon" id="header__icon"></a>
           <a href="deconnexion.php"><p class="btn">Déconnexion</p></a>
				 <div class="logo"> </div>
                  
        
                        <nav class="navBarPetit">
                  <ul>
                     
                    <li class="nav-item"><a href="index.php"><strong>Accueil</strong></a></li>
                    <li class="nav-item"><a href="reservationAdmin.php"><strong>Reservation</strong></a></li>
                    <li class="nav-item"><a href="gestionAbonnement.php"><strong>Gestion Abonnements</strong></a></li>
                    <li class="nav-item"><a href="adherents.php"><strong>Adhérents</strong></a></li>
                     <li class="nav-item"><a href="souscription.php"><strong>Souscription</strong></a></li>
                    <li class="nav-item"><a href="statistiques.php"><strong>Statistiques</strong></a></li>
                    
                   </ul>

                </nav>
           
                 

        	</header>
        <script type="text/javascript" src="petit.js"></script>
        <script type="text/javascript" src="connex.js"></script>
        <div id="mainContainer">
            <section id="content"> 