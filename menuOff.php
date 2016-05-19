
        	<header id="menuTop">
             <!-- id pour la partie javascript -->
        	<a href="#" class="header__icon" id="header__icon"></a>
            <p class="btOn"><a href="#login-box" class="login-window"><img src="images/connexion.png" class="connexButton" alt="connexion"></a></p>

				 <div class="logo"> </div>
                  
        
                        <nav class="navBarPetit">
                  <ul>
                     
                    <li class="nav-item"><a href="index.php"><strong>Accueil</strong></a></li>
                    <li class="nav-item"><a href="reservation.php"><strong>Réservation</strong></a></li>
                    <li class="nav-item"><a href="yogaInfo.php"><strong>YogiShop</strong></a></li>
                    <li class="nav-item"><a href="contact.php"><strong>Nous contacter</strong></a></li>
                    
                   </ul>

                </nav>
           
                    <div id="login-box" class="login-popup">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="" action="" class="signin" >
                            <fieldset class="textbox">
                             <div><img  class="user" src="images/user.png"  title="user" alt="user" /></div>
                             <span id="login_error" style="color: red; font-size:12px"></span>
                            <label class="username">
                            <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Saisissez votre e-mail">
                            </label>
                            
                            <label class="password">
                            <input id="password" name="password" value="" type="password" placeholder="Mot de passe">
                            </label>
                            
                            <button class="submit button" name="connecter" type="submit" onClick="login(); return false;">Connexion</button>
                            </fieldset>
                      </form>
              
                    </div>

        	</header>
        <script type="text/javascript" src="js/petit.js"></script>
        <script type="text/javascript" src="js/connex.js"></script>
        <div id="mainContainer">
            <section id="content"> 