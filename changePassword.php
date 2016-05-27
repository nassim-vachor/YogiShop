<?php 
  $title="change Profil";
  $secure_level = 1;

  include("header.php"); 

    $id = $_COOKIE['id'];
    $requete = $dbh->query("SELECT * FROM Person WHERE idPerson = '$id'");
    $row=$requete->fetch();
    $n= $row["Nom"];
    $pwd= $row["Password"];
        $p=$row["Prenom"];
        $age=$row["DateNais"];
        $tel=$row["Tel"];
        $email=$row["email"];
        $ville=$row["Ville"];
        $cp=$row["CodePostal"];
        $rue=$row["Rue"];
        $job=$row["Profession"];
        $sexe=$row["Sexe"];
        $nbs=$row["NbSeances"];
        $dateE=$row["DateExpiration"];
                            if ($dateE=="0000-00-00" || is_null($dateE)){
                                        $dateE = NULL;
                                    }
                            else{
                                $dateE= date("d - m - Y",strtotime($dateE));

                            }

  ?>

   <fieldset class="fiche">
    <?php require_once("services/verifInscription.php");
              updateProfil(); 

              ?>
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
            <button type="submit" name="modif" class="btn btn-default">Enregistrer</button>
        </form>         
        </div>    
         <div id="abonnement">
                         <p class="titre">Mot de passe</p>
                            <form method="get" action="" role="form">
                            	
                                <div class="form-group">
                                	<span id="mdp_error1" style="color:#00E676; font-size:20px; "></span><br>
                                    <label for="mdp">Mot de passe actuel:</label>
                                    <input type="text" name="mdp1"class="form-control" id="mdp1" 
                                   	placeholder="Veuillez saisir votre mot de passe" >
                                   	<span id="mdp_error" style="color:red; font-size:16px; "></span>
                                </div>
                                <div class="form-group">
                                    <label for="pwd1"> Nouveau mot de passe</label>
                                    <input type="password" name="mdp" class="form-control" id="mdp2"
                                     placeholder="Veuillez saisir votre nouveau mot de passe" >
                                    <span id="mdp_error3" style="color:red; font-size:16px; "></span><br>
                                </div>
                                <div class="form-group">
                                    <label for="pwd1"> Confirmer votre nouveau mot de passe</label>
                                    <input type="password" name="mdp3" class="form-control" id="mdp3"
                                     placeholder="Veuillez saisir votre nouveau mot de passe" >
                                </div>
                				<div class="form-group">

                                    <input type=hidden name="mdpold"class="form-control" id="mdpold" 
                                    value= <?php echo $pwd; ?> >
                                    <input type=hidden name="mdpold"class="form-control" id="idC" 
                                    value= <?php echo $id; ?> >
                                </div>
                                  <button type="submit" name="connecter" class="btn btn-default"
                                   onClick="updatePassword(); return false;" >Enregistrer</button>
                            </form>
                        <p class="titre" style="margin-top:30px;">Abonnement</p>
                         <div class="form-group">
                                    <label for="pwd1"> Nombre de séances restantes</label>
                                    <input type="tetx" name="mdp3" class="form-control" value="<?php echo $nbs; ?>"  disabled>
                        </div>
                         <div class="form-group">
                                    <label for="pwd1"> Date expiration</label>
                                    <input type="tetx" name="mdp3" class="form-control" value="<?php echo $dateE; ?>"  disabled>
                        </div>



        </div>
  </fieldset>
  <?php 

  include("footer.php"); ?>