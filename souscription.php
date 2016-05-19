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

  <?php include("header.php"); ?>

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
    require_once("connectdb.php");
    $dbh = connect();


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
        $age= date("d-m-Y",strtotime($age));
        $tel=$row["Tel"];
        $email=$row["email"];
        $ville=$row["Ville"];
        $cp=$row["CodePostal"];
        $rue=$row["Rue"];
        $job=$row["Profession"];
        $douleurs=$row["Douleurs"];
        $sexe=$row["Sexe"];


        ?>
 <fieldset class="fiche">
    <div id="ficheAdherent">
            
            <p class="titre">Informations Personnelles</p>
     <form  action="" method="post">
                <div id="genre">
                    <label for="Genre">Sexe:</label>   
                    <input type="radio" name="sexe" value="femme" <?php if ($sexe=="femme") {echo 'checked';} ?> disabled >Femme
                    <input type="radio" name="sexe" value="homme" <?php if ($sexe=="homme") {echo 'checked';} ?>>Homme<br>
                </div>
                     <label for="nom">Nom:</label>
                     <input type="text" name="nom1" class="form-control" id="nom1" value="<? echo $n; ?>"   disabled >
                    <label>Prénom:</label>
                    <input type="text" name="prenom1" class="form-control" id="prenom" value="<? echo $p; ?>"   disabled>
                    <label for="dateN">Date de naissance:</label>
                    <input type="dateN" name="age" class="form-control" disabled value="<? echo $age; ?>" >
                  <label for="email">Email:</label>
                <input type="email" name="email"class="form-control"  id="email" value="<? echo $email; ?>"  disabled>
               <label for="tel">Téléphone:</label>
              <input type="tel" name="tel" class="form-control" value="<? echo $tel; ?>" disabled >
             <label for="rue">Rue:</label>
             <input type="rue" name="rue" class="form-control" value="<? echo $rue; ?>" disabled >
            
            <label for="tel">Code Postal:</label>
            <input type="cp" name="cp" class="form-control" value="<? echo $cp; ?>" disabled >
            <label for="ville">Ville:</label>
            <input type="ville" name="ville" class="form-control"value="<? echo $ville; ?>" disabled>
        </form>         
        </div>    
         <div id="abonnement1">
              <table  style="width:100%">
                        <tr>
                            <td colspan= 5 class="enteteHistorique">Abonnements</td>
                        </tr>
                        <?php
                            $sql1=$dbh->query("SELECT NbSeances, DateExpiration FROM Person 
                              WHERE IdPerson= '$id' ");
                            $row =$sql1->fetch();
                            $dateE=$row["DateExpiration"];
                            if ($dateE=="0000-00-00" || is_null($dateE)){
                                        $dateE = NULL;
                                    }
                            else{
                                $dateE= date("d-m-Y",strtotime($dateE));

                            }
                        ?>
                        <tr>
                            <td colspan= 5>Séances restantes : <strong><?php echo $row["NbSeances"]; ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan=5 >Date expiration : <strong> <?php echo $dateE; ?> </strong> </td>
                        </tr>
                         <tr>
                            <td colspan=5 > <button   type="submit" name="creer"  class="btn"><a href="#log-box" class="login-window">Nouvelle Souscription</button>
                        </tr>
                        <tr>
                            <td colspan= 5 class="enteteHistorique" ></td>
                        </tr>
                         <tr>
                            <td colspan= 5 class="enteteHistorique" ></td>
                        </tr>
                          <tr>
                            <td colspan= 5 class="enteteHistorique" >Historique </td>
                        </tr>
                        <tr>
                            <th class ="th">Abonnement</th>
                            <th class ="th">Tarif</th>
                            <th class ="th">Date Souscription</th>
                            <th class ="th">Séances attribuées</th>
                            <th class ="th">Date Expiration</th>
                           
                           
                        </tr>

                        
                         <?php
                        
                             $sql=$dbh->query("SELECT Libelle, Tarif, DateSouscription, nbSeanceEffective, dateExpirationEffective FROM abonnement a , souscrire s 
                              WHERE a.IdAbonnement = s.IdAbonnement and s.IdPerson= '$id'
                              ORDER BY DateSouscription desc
                              LIMIT 3 ");
                              
                         while ( $row =$sql->fetch() ){
                             $dateS=$row["DateSouscription"];
                             $dateS= date("d-m-Y",strtotime($dateS));

                             $dateExp=$row["dateExpirationEffective"];
                             if ($dateExp=="0000-00-00"){
                                        $dateExp = NULL;
                                    }
                            else{
                                   $dateExp= date("d-m-Y",strtotime($dateExp));
                                  }
                             
                                ?>
                            <tr id="trH">
                              
                                        <td> 
                                              <? echo $row["Libelle"]; ?>
                                        </td>
                                        <td> 
                                            <? echo $row["Tarif"]; ?> €
                                        </td>
                                        <td>
                                            <? echo $dateS;?>
                                        </td>
                                        <td>
                                            <? echo $row["nbSeanceEffective"];?>
                                        </td>
                                        <td>
                                            <? echo $dateExp;?>
                                        </td>
                            </tr>
                         <?php
                            }
                            ?>     
                </table>            
        </div>
         <div id="log-box" class="login-popup">
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
  </fieldset>
           
   <?php
}
          
} 
  include("footer.php");
                  
?>
