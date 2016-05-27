	<?php

	$secure_level = 1;

	 include("header.php"); ?>

	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	      
<div id="calendar2" class="calenda">
    

                    <div id="annulSeance-box2" class="annulSeance-popup">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="" action="" class="formSeance3" >
                         <div id="titreSeanceAnnul" style="margin-bottom:20px;"> <label >Voulez vous annuler votre réservation?</label></div>
                            <fieldset class="textboxSeance3">
                                <span id="annulSeance_error3" style="color: red; font-size:14px"></span>
                                 <span id="annulSeance_err" style="color: red; font-size:14px"></span>
            
                            <label class="jourSeance"> Date de la séance
                            <input id="jourSeanceSuppr" name="jourSeance2" value=" " disabled style=" float: right" >
                            </label>
                             <label class="heureSeanceD"> Heure de début
                            <input id="heurDSeanceSuppr" name="jourSeance2" value=" "disabled style=" float: right">
                            </label>
                          
                           <label class="heureSeanceD"> Heure de fin
                            <input id="heurFSeanceSuppr"  value=" "disabled  style=" float: right">
                            </label>
                            <div style="margin-top:30px;">
                             <button class="buttonSubmit2"  id ="btnAnnulOui"  name="connecter" type="submit"  style=" width: 100px">Oui</button>
                            <button class="buttonSubmit2" id ="btnAnnulNon" name="connecter" type="submit"
                                       style=" width: 100px; background:#00E676 ;border-color: #00E676;" >Non</button>
                            </div>
                            </fieldset>
                      </form>
                    </div>

                    <div id="ajoutSeance-box4" class="ajoutSeance-popup">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="close">
                      <img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="POST" action="" class="formSeance" >
                         <div id="titreSeance"> <label >Voulez vous réserver une séance? </label></div>
                            <fieldset class="textboxSeance">
                             <span id="ajoutSeance_error" style="color: red; font-size:14px"></span>

                            <label class="jourSeance"> Date de la séance
                            <input id="jourSeanceD" name="jourSeance" value="" type="text" autocomplete="on" placeholder="Saisissez le jour" disabled>
                            </label>

                            <label class="heureSeanceD">Heure de début
                            <input id="heureSeanceC" name="heureSeanceD" value="" type="text"  min="08:00" max="20:00" 
                            autocomplete="on" placeholder="heure de début" disabled>
                            </label>

                            <label class="heureSeanceF">Heure de fin
                            <input id="heureSeanceFin"  type="text"  data-time-format="H:i:s" disabled />
                            </label>

                            <label class="nbPlace">Nombre de places
                            <input id="nbPlaces" name="nbPlace" value="" type="number" autocomplete="on" placeholder="nombre de place " disabled >
                            </label>

                            <div style="margin-top:30px;">
                               <button class="buttonSubmit2" id ="btnNon1" type="submit" name="connecter"  style=" width: 100px">Non</button>
                              <button class="buttonSubmit2" id="btnOui1" name="connecter" type="submit"
                              style=" width: 100px; background:#00E676 ;border-color: #00E676;">Oui</button>
                              </div>
                            
                            </fieldset>
                      </form>
              
                    </div>

</div>


<?php include("footer.php"); ?>