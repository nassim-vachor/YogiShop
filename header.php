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
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 
          <!-- utilisation de style.css pour les differents types d ecrans (responsives) -->
        <link rel="stylesheet" media="screen and (min-width:1024px)"  href="grand.css" >
        <link rel="stylesheet" media="screen and (min-width:750px) and (max-width:1024px)  "  href="moyen.css"  >
        <link rel="stylesheet" media="screen and  (max-width:750px) "  href="petit.css"  >

       
        <title>YogiShop</title>
    </head>
    <body>
        <div class="site-pusher">
        	<header id="menuTop">
             <!-- id pour la partie javascript -->
        	<a href="#" class="header__icon" id="header__icon"></a>
            <p><a href="#login-box" class="login-window"><img src="connexion.png" class="connexButton" alt="connexion"></a></p>

				 <div class="logo"> </div>
                  
        
                        <nav class="navBarPetit">
                  <ul>
                     
                    <li class="nav-item"><a href="accueil.php"><strong>Accueil</strong></a></li>
                    <li class="nav-item"><a href="reservation.php"><strong>Reservation</strong></strong></strong></a></li>
                    <li class="nav-item"><a href="stade.php"><strong>YogiShop</strong></strong></a></li>
                    <li class="nav-item"><a href="contact.php"><strong>Nous contacter</strong></a></li>
                    
                   </ul>

                </nav>
           
                    <div id="login-box" class="login-popup">
                    <a href="index.php" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="post" class="signin" action="#">
                            <fieldset class="textbox">
                             <div><img  class="user" src="user.png"  title="user" alt="user" /></div>
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
		