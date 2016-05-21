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
<div id="calendar"></div>

<div id="ajoutSeance-box" class="ajoutSeance-popup">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="POST" action="" class="formSeance" >
                         <div id="titreSeance"> <label >Ajouter une séance</label></div>
                            <fieldset class="textboxSeance">
                             <span id="ajoutSeance_error" style="color: red; font-size:14px"></span>
                            <label class="jourSeance"> Date de la séance
                            <input id="jourSeanceD" name="jourSeance" value="" type="text" autocomplete="on" placeholder="Saisissez le jour">
                            </label>

                            <label class="heureSeanceD">Heure de début
                            <input id="heureSeanceC" name="heureSeanceD" value="" type="text"  min="08:00" max="20:00" autocomplete="on" placeholder="heure de début">
                            </label>

                            <label class="heureSeanceF">Heure de fin
                            <input id="heureSeanceFin" name="heureSeanceF" value="" type="text"  min="08:00" max="20:00" autocomplete="on" placeholder="heure de fin">
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
                    
                            <button class="buttonSubmit" name="connecter2" type="submit" onClick="ajoutSeance(); return false;">Ajouter</button>
                            </fieldset>
                      </form>
              
                    </div>
<?php include("footer.php");?>
