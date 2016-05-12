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
           <a href="deconnexion.php"><p class="btn" id="btnAdmin">Déconnexion</p></a>
				 <div class="logo"> </div>
                  
        
                        <nav class="navBarPetit">
                  <ul id="navAdmin">    
                    <li class="nav-item"><a href="index.php"><strong>Accueil</strong></a></li>
                    <li class="nav-item"><a href="reservationAdmin.php"><strong>Reservation</strong></a>
                        <ul>
                          <li><a href="#">Préparer PLanning</a></li>
                          <li><a href="#">Gestion Séances</a></li>
                        </ul>
                   </li>
                    <li class="nav-item"><a href="gestionAbonnement.php"><strong>Abonnements</strong></a></li>
                    <li class="nav-item"><a href="adherents.php"><strong>Adhérents</strong></a>
                        <ul>
                          <li><a href="inscriptionAdherent.php">Nouvel Adhérent</a></li>
                          <li><a href="ficheAdherent.php">Fiche Adhérent</a></li>
                          <li><a href="#">Impression Etiquettes</a></li>
                        </ul>

                    </li>
                    <li class="nav-item"><a href="souscription.php"><strong>Souscription</strong></a></li>
                    <li class="nav-item"><a href="statistiques.php"><strong>Statistiques</strong></a>
                          <ul>
                          <li><a href="#">Entreprise</a></li>
                          <li><a href="#">Suivi Adhérent</a></li>
                        </ul>
                    </li>
                    
                   </ul>

                </nav>
           
                 

        	</header>
        <script type="text/javascript" src="js/petit.js"></script>
        <script type="text/javascript" src="js/connex.js"></script>
        <div id="mainContainer">
            <section id="content"> 