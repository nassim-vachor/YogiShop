<?php

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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="css-Bootstrap/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 
          <!-- utilisation de style.css pour les differents types d ecrans (responsives) -->
        <link rel="stylesheet" media="screen and (min-width:1024px)"  href="css/grand.css" >
        <link rel="stylesheet" media="screen and (min-width:750px) and (max-width:1024px)  "  href="css/moyen.css"  >
        <link rel="stylesheet" media="screen and  (max-width:750px) "  href="css/petit.css"  >

       
        <title>Planning</title>
    </head>
    <body>
        <div class="site-pusher">

  <?php include("header.php"); ?>
       <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
      
      <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    margin: auto;
    border: 1px solid #ddd;

}

th{
    padding: 8px;
  }

th, td {
    border: none;
    text-align: center;

}
tr{
  height: 5px;
}
td:nth-child(1){

width: 5%;
background-color: pink;

}

td:nth-child(2),td:nth-child(3),td:nth-child(4),td:nth-child(5),td:nth-child(6),td:nth-child(7),td:nth-child(8){

}

tr:nth-child(even){
  background-color: #f2f2f2;
}
</style>


<div id= "buttonCalendrier">
  <p class="btAjoutSeance"><a   href="#ajoutSeance-box" class="ajoutSeance-window"><p class="ajoutButton" >Ajouter une séance</p></a></p>
                    <div id="ajoutSeance-box" class="ajoutSeance-popup">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                      <form method="POST" action="" class="formSeance" >
                         <div id="titreSeance"> <label >Ajouter une séance</label></div>
                            <fieldset class="textboxSeance">
                             <span id="ajoutSeance_error" style="color: red; font-size:14px"></span>
                            <label class="jourSeance"> Date de la séance
                            <input id="jourSeance" name="jourSeance" value="" type="date" autocomplete="on" placeholder="Saisissez le jour">
                            </label>

                            <label class="heureSeanceD">Heure de début
                            <input id="heureSeanceD" name="heureSeanceD" value="" type="time"  min="08:00" max="20:00" autocomplete="on" placeholder="heure de début">
                            </label>

                            <label class="heureSeanceF">Heure de fin
                            <input id="heureSeanceF" name="heureSeanceF" value="" type="time"  min="08:00" max="20:00" autocomplete="on" placeholder="heure de fin">
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

<?php 
if (isset($_POST['jourSeance']))
{
  // recuperation du jour de la seance
 $date = new DateTime($_POST['jourSeance']);
 // recuperation de l heure de debut de la seance dans un tableau
  $date2=date_parse($_POST['heureSeanceD']);
  // extraction de l heure et de la minute
 $heure= $date2['hour'];
$min=$date2['minute'];
// concatenation avec date de la seance 
 $date->add(new DateInterval('PT'.$heure.'H'.$min.'M'));
$date= $date->format('Y-m-d H:i:s');
 echo $date;
var_dump( $date);

}

 ?>
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
                                <select id="myselectSeanceModif" name="myselectSeanceModif" onchange="modifInfoSeance(); return false;" >

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

                              </select>
                            </label>
                            <button class="buttonSubmit3" name="connecter" type="submit" onClick="modifSeance(); return false;">Modifier</button>
                           
                            </fieldset>
                      </form>
              
                    </div>
                 </div>

<div style="overflow-x:auto; overflow-y: hidden">
  <table >
    <nav>
        <a href="calendrier.php?startDate=<?php echo $previousSemaine;?>"style="float : left;">Precedent </a>
        <a href="calendrier.php "style="float : left;">Aujourd'hui </a>

        <a href="calendrier.php?startDate=<?php echo $nextSemaine;?>" style="float : right;">Suivant </a>
    </nav>
    <br> <h1> <?php seanceSemaineActuelle($debutSemaine, $finSemaine); tousLesCoach();?></h1><br>
    <caption>  

      <?php
          echo $debutSemaine;
          echo "<br>";
          echo $finSemaine; echo " oui   ";
        // convertDateToDatetime($finSemaine);
        
         //$dates = date('d-m-Y'); $jour= date('l'); echo dateSemaineActuelle($jour,$dates);
      ?>
    </caption>
    <tr>
      <th>Horaires </th>
      <th>Lundi</th>
      <th>Mardi</th>
      <th>Mercredi</th>
      <th>Jeudi</th>
      <th>Vendredi</th>
      <th>Samedi</th>
      <th>Dimanche</th>
     
    </tr>
    <tr>
      <td>8h00 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
       <td> </td>
    </tr>
    <tr>
      <td> 8h15 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
    <tr>
       <td> 8h30</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td> 8h45 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>9h00 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>9h15 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>9h30 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>9h45 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>10h00 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>10h15 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>10h30 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>10h45 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>11h </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>11h15 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td> 11h30</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>11h45 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>12h00 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>12h15 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td> 12h30</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td> 12h45</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td> 13h00</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>13h15 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>

     <tr>
       <td> 13h30</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>13h45 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td> 14h00</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>14h15 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>14h30 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>

     <tr>
       <td>14h45 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>15h </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td> 15h15</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>15h30 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>15h45 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>

      <td>16h </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td> 16h15</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>16h30 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>16h45 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>


      <td>17h </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td> 17h15</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>17h30 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>17h45 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
      <td>18h </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td> 18h15</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>18h30 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>18h45 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
      <td>19h </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td> 19h15</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>19h30 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
     <tr>
       <td>19h45 </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
      <td>20h </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>

  </table>
</div>

<?php include("footer.php");?>
