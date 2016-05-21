


        	<header id="menuTop">
             <!-- id pour la partie javascript -->
        	<a href="#" class="header__icon" id="header__icon"></a>
           <?php 
            $id= $_COOKIE["id"];
            $reponse = $dbh->query("SELECT Nom from person where idPerson= '$id'");
            $row= $reponse->fetch();
             $Nom=$row['Nom'];
            ?>
            <p id="userProfil"><img src="images/userProfil.png"  alt="Bienvenue"><?php echo $Nom ?></p>
           <a href="services/deconnexion.php"><p class="btn" id="btnAdmin">Déconnexion</p></a>
				 <div class="logo"> </div>
                  
        
                        <nav class="navBarPetit">
                  <ul id="navAdmin">    
                    <li class="nav-item"><a href="index.php"><strong>Accueil</strong></a></li>
                    <li class="nav-item"><a><strong>Réservation</strong></a>
                        <ul>
                          <li><a href="calendrier.php">Préparer PLanning</a></li>
                          <li><a href="#">Gestion Séances</a></li>
                        </ul>
                   </li>
                    <li class="nav-item"><a href="abonnement.php"><strong>Abonnements</strong></a></li>
                    <li class="nav-item"><a><strong>Adhérents</strong></a>
                        <ul>
                          <li><a href="inscriptionAdherent.php">Nouvel Adhérent</a></li>
                          <li><a href="ficheAdherent.php">Fiche Adhérent</a></li>
                          <li><a href="#">Impression Etiquettes</a></li>
                        </ul>

                    </li>
                    <li class="nav-item"><a href="souscription.php"><strong>Souscription</strong></a></li>
                    <li class="nav-item"><a href="dates.php"><strong>Statistiques</strong></a>
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