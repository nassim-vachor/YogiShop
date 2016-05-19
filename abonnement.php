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

       
        <title>Fiche Adhrent</title>
    </head>
    <body>
        <div class="site-pusher">

	<?php include("header.php");
     
     ?>

	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

            <fieldset class="abonnement" >
                  <div id="creationAbo" >
                         <p id="creationTitre">Créer un nouvel abonnement</p> 
                    <form method="POST" action="">
                            <label for="type">Type abonnement:</label> 
                            <select name="type"class="form-control" required ="required">
                                    <option></option>
                                    <option>A la séance</option>
                                    <option>Temporel</option>
                             </select>
                             <label style="display:none" id="nb" for="nb">Nombre de séances :</label> 
                             <input type= hidden  name="nbS" class="form-control" id="nbS"   
                              required ="required" autocomplete="off" >
                             <label id="dureeLib" style="display:none">Durée (en jour):</label>                    
                             <input type= hidden  name="duree" class="form-control" id="duree" required ="required" autocomplete="off" >
                             <label  for="lib">Désignation abonnement :</label> 
                             <input type="text" name="lib1" class="form-control" id="lib1"    required ="required" >
                             <label for="tarif" >Tarif (€) :</label>                    
                             <input type="number" name="tarif1" class="form-control" id="tarif1" required ="required" autocomplete="off" >
                            <button   type="submit" name="creer"  id="btcreer" class="btn">Créer</button>                    
                 </form>
                
              

                     <script type="text/javascript">
                    $('select[name=type]').change(function () {
                                if ($(this).val() == 'A la séance') {
                                    $('#nbS').prop("type", "number")
                                    $('#nb').show();
                                    $('#dureeLib').hide();
                                    $('#duree').prop("type", "hidden")
                                } else if ($(this).val() == 'Temporel')
                                        {
                                            $('#dureeLib').show();
                                            $('#duree').prop("type", "number");
                                            $('#nb').hide();
                                            $('#nbS').prop("type", "hidden");
                                        } 
                                       else{
                                             $('#nbS').prop("type", "hidden");
                                              $('#nb').hide();
                                             $('#duree').prop("type", "hidden")
                                            $('#dureeLib').hide();
                                       }    
                            });
                 </script>
                </div>
                  <?php    
                         
                        if(isset($_POST['nbS']) )
                        {
                          
                                  $type=$_POST['type'];
                                  $lib1=$_POST['lib1'];
                                  $tarif1=$_POST['tarif1'];
                                  $duree=$_POST['duree'];
                                  $nbs=$_POST['nbS'];
                          $sql=$dbh->query("INSERT INTO abonnement ( Libelle, Tarif,type)
                                        VALUES ('$lib1', '$tarif1', '$type')");
                          $rq=$dbh->query("SELECT LAST_INSERT_ID()");
                          $row=$rq->fetch();
                          $lastID =$row['LAST_INSERT_ID()'];
                          $req=$dbh->query("SELECT type FROM abonnement WHERE
                            IdAbonnement='$lastID'");
                           $row2=$req->fetch();
                            $type= $row2['type'];
                            if ($type=='A la séance') {
                            $sql=$dbh->query("INSERT INTO alacarte ( IdAbonnement, NbSeance)
                                        VALUES ('$lastID', '$nbs')");
                              
                                
                            }
                            else if ($type=='Temporel'){
                                $sql=$dbh->query("INSERT INTO Temporel ( IdAbonnement, duree)
                                        VALUES ('$lastID', '$duree')");

                            }
                                    }
                    ?>

                <table id="tableAbbo">
                    <?php
                      if(isset($_POST['modif']) and !empty($_POST['lib'])){
                          $lib=$_POST['lib'];
                          $tarif=$_POST['tarif'];
                          $id=$_POST['numero'];
                          $req=$dbh->query("UPDATE abonnement SET Libelle='$lib', Tarif='$tarif'
                            WHERE IdAbonnement='$id'");
                          
                       }
                    
                            ?>
                           
                        <tr>
                            <td colspan= 5 class="enteteCentre">Liste des abonnements existants</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <th>Désignation</th>
                            <th>Tarif</th>
                            <th>Modification</th>
                            <th>Suppression</th>
                           
                        </tr>

                        
                         <?php
                        
                             $sql=$dbh->query("SELECT * FROM abonnement  ORDER BY type");
                              
                         while ( $row =$sql->fetch() ){
                             
                                ?>
                            <tr class="row-<? echo $row["IdAbonnement"]; ?>">
                                 <form method="post" action="">
                                          <td> 
                                                <input type="text" name="type2" class="form-control" id="typ" value="<? echo $row["type"]; ?>"   required ="required" readonly="readonly" >
                                         </td>
                                        <td> 
                                                <input type="text" name="lib" class="form-control" id="lib" value="<? echo $row["Libelle"]; ?> "  required ="required" autocomplete="off" >
                                         </td>
                                        <td>
                                            <input type="text" name="tarif" class="form-control" id="tarif" 
                                             value="<? echo $row["Tarif"];?> €"   required ="required" autocomplete="off">
                                        </td>
                                         <td>

                                        <input type=hidden name="numero" id ="id2" value="<? echo $row["IdAbonnement"]; ?>" />
                                        <button   type="submit" name="modif"  id="btModif" class="btn">Enregistrer</button>
                                        </td>
                                        <td>
                                          <button   type="submit" name="supp"  id="btSupp" class="btn" onclick="deleteAbo(<? echo $row["IdAbonnement"];?>); return false;">Supprimer</button>
                                        </td>
                                </form>
                         </tr>
                         <?php
                            }
                            ?>
                   <tr>
                      <td colspan= 5 id="abo_supp"  ></td>
                   </tr>       
                </table>


            </fieldset> 
            

            <?php include("footer.php"); ?>
             
    
        