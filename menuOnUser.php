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
            <p class="btn"><a href="#login-box" class="login-window" ></a> Déconnexion</p>

				 <div class="logo"> </div>
                  
        
                        <nav class="navBarPetit">
                  <ul>
                     
                    <li class="nav-item"><a href="index.php"><strong>Accueil</strong></a></li>
                    <li class="nav-item"><a href="reservation.php"><strong>Reservation</strong></strong></strong></a></li>
                    <li class="nav-item"><a href="yogaInfo.php"><strong>YogiShop</strong></strong></a></li>
                    <li class="nav-item"><a href="contact.php"><strong>Nous contacter</strong></a></li>
                    
                   </ul>

                </nav>
           
                    <div id="login-box" class="login-popup">
                    <a href="index.php" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="post" class="signin" action="#">
                            <fieldset class="textbox">
                             <div><img  class="user" src="images/user.png"  title="user" alt="user" /></div>
                            <label class="username">
                            <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Saisissez votre e-mail">
                            </label>
                            
                            <label class="password">
                            <input id="password" name="password" value="" type="password" placeholder="Mot de passe">
                            </label>
                            
                            <button class="submit button" type="button">Connexion</button>
                            
                            </fieldset>
                      </form>
              
                    </div>

        	</header>
        <script type="text/javascript" src="petit.js"></script>
        <script type="text/javascript" src="connex.js"></script>
        <div id="mainContainer">
            <section id="content"> 