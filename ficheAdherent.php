    <?php 
    $title="Fiche Adhérent";
    $secure_level = 2;

    include("header.php"); ?>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>



<section>
 <script type="text/javascript" >
// fonction pour rechercher le nom et prenom de l'adherent
function searchq(){
    $("#output").empty();
    var searchText = $("input[name='search']").val();
    console.log(searchText);
    if(searchText.length) {
            $.post("services/search.php" , {searchVal : searchText}, function(output){
                var data =  JSON.parse(output);
                data.forEach(function(d){
                    var e = $("<div class=\"adherent_preview\">"+ d.Prenom+" "+d.Nom+"</div>");
                    e.on("click",function(){
                        $("#nom").val(d.Prenom+" "+d.Nom);
                        $("#idHidden").val(d.idP);
                    });

                    $("#output").append(e);
                    //$output .= '<div id="in">'.$prenom.' '.$nom.'</div>';
                });
                //$("#output").html(output);
            });
    }
    

}

</script>

<form id="barRecherche" action="" method="post">
    <input type="text" required ="required" id = "nom" name= "search" autocomplete="off" placeholder="Rechercher un adhérent" oninput= "searchq();"/>
    <input type="hidden" name="idPerson" id="idHidden">
    <input  type= "submit" name="selectionner" value="Sélectionner" id="selectionner" />
</form>

<div id ="output"> 
</div>

<?php
   
if(isset($_POST['search']) and isset($_POST['idPerson']) and isset($_POST['selectionner']))
{
    $id=$_POST['idPerson'];
    $sql=$dbh->query("SELECT * FROM Person WHERE idPerson='$id'");
    $rowCount=$sql->rowCount(); 
    if ($rowCount ==0)  //  pas de ligne retournée
    {
    ?>
    <p><?php echo "Cet Adhérent n'existe pas, veuillez recommencer!"; ?></p>
    
    <?php    //throw new Exception('Invalid', 1);
    }
    else // utilisateur trouvee 
    {
        $row =$sql->fetch();          
        $n= $row["Nom"];
        $p=$row["Prenom"];
        $age=$row["DateNais"];
        $tel=$row["Tel"];
        $email=$row["email"];
        $ville=$row["Ville"];
        $cp=$row["CodePostal"];
        $rue=$row["Rue"];
        $job=$row["Profession"];
        $douleurs=$row["Douleurs"];
        $sexe=$row["Sexe"];
        $nbs= $row["NbSeances"];
        $duree=$row["DateExpiration"];
        ?>
 <fieldset class="fiche">
    <p style=" width: 40%; margin-left: 30%; text-align: center; margin-top: 40px; font-size: 30px; color:#2c4271; "><? echo $p; ?> <? echo $n; ?></p>
    <div id="ficheAdherent">
            <p class="titre">Informations Personnelles</p>
     <form  action="" method="post">
                <div id="genre">
                    <label for="Genre">Sexe:</label>   
                    <input type="radio" name="sexe" value="femme" required ="required" <?php if ($sexe=="femme") {echo 'checked';} ?> >Femme
                    <input type="radio" name="sexe" value="homme" <?php if ($sexe=="homme") {echo 'checked';} ?>>Homme<br>
                </div>
                     <label for="nom">Nom:</label>
                     <input type="text" name="nom1" class="form-control" id="nom1" value="<?php echo $n; ?>"   required ="required" >
                    <label>Prénom:</label>
                    <input type="text" name="prenom1" class="form-control" id="prenom" value="<?php echo $p; ?>"   required ="required">
                    <label for="dateN">Date de naissance:</label>
                    <input type="date" name="age" class="form-control" value="<?php echo $age; ?>" >
                    <input type="hidden" name="idPerson" id="idHidden" value="<?php echo $id; ?>">
                  <label for="email">Email:</label>
                <input type="email" name="email"class="form-control"  id="email" value="<?php echo $email; ?>"  required ="required">
                    
               <label for="tel">Téléphone:</label>
              <input type="tel" name="tel" class="form-control" value="<?php echo $tel; ?>" >
              <label for="job">Profession:</label>
              <input type="job" name="job" class="form-control" value="<?php echo $job; ?>"  >
        
             <label for="rue">Rue:</label>
             <input type="rue" name="rue" class="form-control" value="<?php echo $rue; ?>" >
            
            <label for="tel">Code Postal:</label>
            <input type="cp" name="cp" class="form-control" value="<?php echo $cp; ?>" >
            <label for="ville">Ville:</label>
            <input type="ville" name="ville" class="form-control"value="<?php echo $ville; ?>"   >
            <label for="doul">Autres:</label>
            <textarea rows="4" cols="50"  class="form-control" name="douleurs"><?php echo $douleurs; ?> </textarea>
            <button type="submit" name="modif" class="btn btn-default">Enregistrer</button>
        </form>         
        </div>    
         <div id="abonnement">
                         <p class="titre">Abonnements</p>
                            <form method="POST" action="" role="form">
                                <div class="form-group">
                                    <label for="nbs">Nombre de séances restantes:</label>
                                    <input type="nbs" name="nbs"class="form-control" id="nbs" value="<?php echo $nbs; ?>" >
                                
                                </div>
                                <div class="form-group">
                                    <label for="duree">Date expiration</label>
                                    <input type="date" name="duree" class="form-control" id="duree" value="<?php echo $duree; ?>">
                                </div>
                                    <input type=hidden name="idPerso" id="idHidden" value="<?php echo $id; ?>">
                                     <input type=hidden name="nom2" class="form-control" value="<?php echo $n; ?>">
                                  <input type=hidden name="prenom2" class="form-control"  value="<?php echo $p; ?>">
                                  <button type="submit" name="enreg" class="btn btn-default">Enregistrer modifications</button>
                            </form>



        </div>
  </fieldset>
           
   <?php


    }    
                

  } 
  require_once("services/verifInscription.php");
updateClientByAdmin();
modifabonnementClient(); 
  include("footer.php");
                  
?>
