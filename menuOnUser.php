
<?php


       require_once("connectdb.php");
       $dbh = connect();


?>


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
            <p id="userProfil"><img src="images/userProfil.png"  alt="Bienvenue"><?php echo $Nom ?></p>
            <a href="deconnexion.php"><p class="btn">Déconnexion</p></a>


				 <div class="logo"> </div>
                  
        
                        <nav class="navBarPetit">
                  <ul>
                     
                    <li class="nav-item"><a href="index.php"><strong>Accueil</strong></a></li>
                    <li class="nav-item"><a href="inscriptionAdherent.php"><strong>Reservation</strong></strong></strong></a></li>
                    <li class="nav-item"><a href="yogaInfo.php"><strong>YogiShop</strong></strong></a></li>
                    <li class="nav-item"><a href="contact.php"><strong>Nous contacter</strong></a></li>
                    
                   </ul>

                </nav>
           
                  

        	</header>
        <script type="text/javascript" src="petit.js"></script>
        <script type="text/javascript" src="connex.js"></script>
        <div id="mainContainer">
            <section id="content"> 