


        	<header id="menuTop">

             <!-- id pour la partie javascript -->
        	<a href="#" class="header__icon" id="header__icon"></a>

            <!-- recuperation du nom de la personne pour afficher son profil -->
            
            <?php 
            $id= $_COOKIE["id"];
            $reponse = $dbh->query("SELECT Nom from person where idPerson= '$id'");
            $row= $reponse->fetch();
             $Nom=$row['Nom'];
            ?>
            <p id="userProfil"> <a href="changePassword.php"><img src="images/userProfil.png"  alt="Bienvenue"><?php echo $Nom ?></p>
            <a href="services/deconnexion.php"><p class="btn">Déconnexion</p></a>


				 <div class="logo"> </div>
                  
        
                        <nav class="navBarPetit">
                  <ul>
                     
                    <li class="nav-item"><a href="index.php"><strong>Accueil</strong></a></li>
                    <li class="nav-item"><a href="reservationClient.php"><strong>Réservation</strong></strong></strong></a></li>
                    <li class="nav-item"><a href="yogaInfo.php"><strong>YogiShop</strong></strong></a></li>
                    <li class="nav-item"><a href="contact.php"><strong>Nous contacter</strong></a></li>
                    
                   </ul>

                </nav>
           
                  

        	</header>
        <div id="mainContainer">
            <section id="content"> 