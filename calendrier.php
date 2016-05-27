
<?php
$secure_level = 2;

require_once("services/date.php");
require_once("model.php");

if (isset($_GET['startDate'])) {
  $debutSemaine = Date($_GET["startDate"]);
}
else{
  $debutSemaine = dateDebutSemaineActuelle();
}

$finSemaine = addDayswithdate($debutSemaine,6);
$nextSemaine= addDayswithdate($debutSemaine,7);
$previousSemaine= addDayswithdate($debutSemaine,-7);
?>  
  <?php include("header.php"); ?>
<div id= "buttonCalendrier">
  <p class="btAjoutSeance"><a   href="#ajoutSeance-box" class="ajoutSeance-window"><p class="ajoutButton" >Ajouter une séance</p></a></p>
  <div id="ajoutSeance-box" class="ajoutSeance-popup">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="close">
                      <img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="POST" action="" class="formSeance" >
                         <div id="titreSeance"> <label >Ajouter une séance</label></div>
                            <fieldset class="textboxSeance">
                             <span id="ajoutSeance_error2" style="color: red; font-size:14px"></span>
                            <label class="jourSeance"> Date de la séance
                            <input id="jourSeance" name="jourSeance" value="" type="date" autocomplete="on" placeholder="Saisissez le jour">
                            </label>

                            <label class="heureSeanceD">Heure de début
                            <input id="heureSeanceD" name="heureSeanceD" value="" type="time"  min="08:00" max="20:00" 
                            autocomplete="on" placeholder="heure de début">
                            </label>

                            <label class="heureSeanceF">Heure de fin
                            <input id="heureSeanceF" value="" type="time"  min="08:00" max="20:00" 
                            autocomplete="on" placeholder="heure de fin">
                            </label>

                            <label class="nbPlace">Nombre de places
                            <input id="nbPlace" name="nbPlace" value="" type="number" autocomplete="on" placeholder="nombre de place ">
                            </label>
                             <label class="coach">Nom du coach  
                              <select id="myselectCoach" >
                                <!-- Recuperation des coachs ds la bd -->
                                <?php 
                                  $requete=tousLesCoach();
                                  while($row=$requete->fetch())
                                  {

                                    ?>
                                    <option>
                                      <?php echo $row['Prenom']." ".$row['Nom'];?>
                                    </option>
                                    <?php
                              }
                                ?>
                              </select>
                              </label>
                    
                            <button class="buttonSubmit" name="connecter2" type="submit"  onClick="ajoutSeanceButton(); return false;">Ajouter</button>
                            </fieldset>
                      </form>
              
                    </div>

    <p class="btModifSeance"><a href="#modifSeance-box" class="modifSeance-window"><p class="modifButton" >Modifier une séance</p></a></p>

   <div id="modifSeance-box" class="modifSeance-popup">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="" action="" class="formSeance3" >
                         <div id="titreSeanceModif"> <label >Modifier une séance</label></div>
                            <fieldset class="textboxSeance3">
                             <span id="modifSeance_error" style="color: red; font-size:13px;"></span>
                              <span id="modifSeance_error2" style="color: #00E676;font-size:13px; font-style:bold;"></span>
                            <label class="jourSeanceModif"> Date de la séance
                            <input id="jourSeanceModif" name="jourSeanceModif" value="" type="date" onchange="getjourSeanceModif(); return false;" placeholder="Saisissez le jour">
                            </label>

                            <label class="heureSeanceDeb">Selectionner une séance
                                <select id="myselectSeanceModif" name="myselectSeanceModif"  onchange="modifInfoSeance(); return false;">

                                <!-- Recuperation des seaces de jourSeance2 ds la bd -->
                               
                                </select>

                            </label>

                               <label class="heureSeanceDModif">Heure de début
                            <input id="heureSeanceDModif" name="heureSeanceDModif" value="" type="time"  min="08:00" max="20:00" autocomplete="on" placeholder="heure de début">
                            </label>

                            <label class="heureSeanceFModif">Heure de fin
                            <input id="heureSeanceFModif" name="heureSeanceFModif" value="" type="time"  min="08:00" max="20:00" autocomplete="on" placeholder="heure de fin">
                            </label>

                            <label class="nbPlaceModif">Nombre de places
                            <input id="nbPlaceModifPlace" name="nbPlace" value="" type="number" autocomplete="on" placeholder="nombre de place ">
                            </label>
                             <label class="coachModif">Nom du coach  
                              <select id="myselectCoachModif" >
                                  <?php 
                                  $requete=tousLesCoach();
                                  while($row=$requete->fetch())
                                  {

                                    ?>
                                    <option>
                                      <?php echo $row['Prenom']." ".$row['Nom'];?>
                                    </option>
                                    <?php
                              }
                                ?>
                              </select>
                            </label>
                            <button class="buttonSubmit3" name="connecter" type="submit" onClick="modifSeance(); return false;">Modifier</button>
                           
                            </fieldset>
                      </form>
              
                    </div>

   <p class="btAnnulSeance"><a href="#annulSeance-box" class="annulSeance-window"><p class="annulButton" >Annuler une séance</p></a></p>
                    <div id="annulSeance-box" class="annulSeance-popup">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="" action="" class="formSeance2" >
                         <div id="titreSeanceAnnul"> <label >Annuler une séance</label></div>
                            <fieldset class="textboxSeance2">
                             <span id="annulSeance_error" style="color: red; font-size:13px;"></span>
                              <span id="annulSeance_error2" style="color: #00E676;font-size:13px; font-style:bold;"></span>
                            <label class="jourSeance2"> Date de la séance
                            <input id="jourSeance2" name="jourSeance2" value="" type="date" onchange="getJourSeance(); return false;" placeholder="Saisissez le jour">
                            </label>
                          

                            <label class="heureSeanceD">Selectionner une séance

                                <select id="myselectSeance" name="myselectSeance" >

                                <!-- Recuperation des seaces de jourSeance2 ds la bd -->
                               
                              </select>
                           
                            </label>
                            
                            <button class="buttonSubmit2" name="connecter" type="submit" onClick="annulSeance(); return false;">Supprimer</button>
                           
                            </fieldset>
                      </form>
              
                    </div>
                </div>



<div id="calendar">

          <div id="ajoutSeance-box2" class="ajoutSeance-popup">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="close">
                      <img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="POST" action="" class="formSeance" >
                         <div id="titreSeance"> <label >Ajouter une séance</label></div>
                            <fieldset class="textboxSeance">
                             <span id="ajoutSeance_error" style="color: red; font-size:14px"></span>
                            <label class="jourSeance"> Date de la séance
                            <input id="jourSeanceD" name="jourSeance" value="" type="text" autocomplete="on" placeholder="Saisissez le jour">
                            </label>

                            <label class="heureSeanceD">Heure de début
                            <input id="heureSeanceC" name="heureSeanceD" value="" type="text"  min="08:00" max="20:00" 
                            autocomplete="on" placeholder="heure de début">
                            </label>

                            <label class="heureSeanceF">Heure de fin
                            <input id="heureSeanceFin"  type="text"  data-time-format="H:i:s" />
                            </label>

                            <label class="nbPlace">Nombre de places
                            <input id="nbPlaces" name="nbPlace" value="" type="number" autocomplete="on" placeholder="nombre de place ">
                            </label>
                             <label class="coach">Nom du coach  
                              <select id="myselectCoach1" >
                                <!-- Recuperation des coachs ds la bd -->
                                <?php 
                                  $requete=tousLesCoach();
                                  while($row=$requete->fetch())
                                  {

                                    ?>
                                    <option>
                                      <?php echo $row['Prenom']." ".$row['Nom'];?>
                                    </option>
                                    <?php
                              }
                                ?>
                              </select>
                              </label>
                    
                            <button class="buttonSubmit" name="connecter2" type="submit" 
                            onClick="ajoutSeanceEvent(); return false;">Ajouter</button>
                            </fieldset>
                      </form>
              
                    </div>

                    <!-- suppression -->
            
                    <div id="annulSeance-box2" class="annulSeance-popup">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="" action="" class="formSeance3" >
                         <div id="titreSeanceAnnul" style="margin-bottom:10px;"> <label >Voulez vous supprimer cette séance?</label></div>
                            <fieldset class="textboxSeance3">
                                <span id="annulSeance_error3" style="color: red; font-size:14px"></span>
            
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
                             <button class="buttonSubmit2" name="connecter" type="submit" onClick=" return true;" style=" width: 100px; background:#00E676 ;border-color: #00E676;">Non</button>
                            <button class="buttonSubmit2" name="connecter" type="submit" onClick="annulSeanceEvent(); return false;"style=" width: 100px;">Oui</button>
                            </div>
                            </fieldset>
                      </form>
              
                    </div>


             <div id="modifSeance-box2" class="modifSeance-popup">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="" action="" class="formSeance3" >
                         <div id="titreSeanceModif"> <label >Modifier une séance</label></div>
                            <fieldset class="textboxSeance3">
                              <span id="modifSeance_error3" style="color: #00E676;font-size:13px; font-style:bold;"></span>
                            <label class="jourSeanceModif"> Date de la séance
                            <input id="jourSeanceModifDropNv" name="jourSeanceModif" type="text" placeholder="Saisissez le jour">
                            </label>
                            <input id="ancienJour" type= "hidden">
                            <input id="ancienHeureD" type= "hidden">
                               <label class="heureSeanceDModif">Heure de début
                            <input id="heureSeanceDModifDropNv" name="heureSeanceDModif" value="" type="text" placeholder="heure de début">
                            </label>

                            <label class="heureSeanceFModif">Heure de fin
                            <input id="heureSeanceFModifDropNv" name="heureSeanceFModif" value="" type="time"  min="08:00" max="20:00" autocomplete="on" placeholder="heure de fin">
                            </label>

                            <label class="nbPlaceModif">Nombre de places
                            <input id="nbPlaceModifPlaceDrop" name="nbPlace" value="" type="number" autocomplete="on" placeholder="nombre de place ">
                            </label>
                             <label class="coachModif">Nom du coach  
                              <select id="myselectCoachModifDrop" >
                                  <?php 
                                  $requete=tousLesCoach();
                                  while($row=$requete->fetch())
                                  {

                                    ?>
                                    <option>
                                      <?php echo $row['Prenom']." ".$row['Nom'];?>
                                    </option>
                                    <?php
                              }
                                ?>

                                
                              </select>
                            </label>
                            <button class="buttonSubmit3" name="connecter" type="submit" onClick="modifSeanceEvent(); return false;">Modifier</button>
                           
                            </fieldset>
                      </form>
              
                    </div>
                    </div>
<?php include("footer.php");?>