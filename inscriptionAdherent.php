  <?php include("header.php"); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <form  action="" method="post">

                <div class= "formInscrip">
                     <h1>Formulaire d'inscription</h1>
  <p>Les champs obligatoires sont suivis d'un <strong id="obliga">*</strong>.</p>
                <div id ="contenuInLab">
                      <div id="genre">
                       <label for="Genre">Sexe:</label>
                            
                            <input type="radio" name="sexe"  required ="required" value="femme">Femme
                            <input type="radio" name="sexe" required ="required" value="homme">Homme<br>
                            </div>

                          <label for="nom">Nom:</label>
                         <input  autocomplete="off" type="text" required ="required" id="nom" name="nom" placeholder="Entrez votre nom"><strong id="obliga"> *</strong id="obliga"><br>
                      
                          <label for="prenom">Prenom:</label>
                          <input  autocomplete="off" type="text" required ="required" id="prenom" name="prenom" placeholder="Entrez votre prenom"><strong id="obliga"> *</strong><br>
                           <label for="Age">Date de naissance:</label>
                          <input type="date" name="age" placeholder="Entrez votre date de naissance"><br>
                       
                          <label for="email">Email:</label>
                          <input  autocomplete="off" type="email" required ="required" id="email" name="email" placeholder="Entrer email" pattern="^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$"><strong id="obliga" > *</strong><br>
                      
                          <label for="pwd">Mot de passe:</label>
                          <input type="password" required ="required"id="password"  name="password" placeholder="Entrer password" ><strong id="obliga"> *</strong><br>
                     
                          <label for="telephone">Téléphone:</label>
                          <input autocomplete="off" type="tel" id="telephone" name="telephone" placeholder="Entrez votre numero de telephone" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"><br>
                      
                      <label for="profession"> Profession:</label>
                      <input type="text" id="profession"  name="profession" placeholder="Entrez votre profession"><br>
                        <label for="rue"> Rue :</label>
                          <input type="text" id="rue" name="rue"><br> 
                       <label for="codePostal">Code Postal : </label>
                      <input type="number" id="codePostal" name ="codePostal"><br>
                      <label for="Ville">Ville:</label>
                       <input type="text" pattern="[A-Za-z]*" id="ville"  name="ville"><br>
                   
                     <div id="messageDouleur">
                     <label for="douleurs"> Autres : </label>
                       <textarea rows="4" cols="50" name="douleurs" placeholder="Antécédents médicaux / Douleurs... "></textarea>

                    </div>
                        <br>

                        <button type="submit" id="insc" >Inscrire</button><br><br>
                    </div>
                        </div>
                        </form>
                <br>         
<?php 
 require_once("services/verifInscription.php");
 verif();       

include("footer.php"); ?>

