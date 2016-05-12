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

       
        <title>Inscription</title>
    </head>
    <body>
        <div class="site-pusher">

	<?php include("header.php"); ?>

	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <form action="verifInscription.php" method="post">

                <div class= "formInscrip">
                     <h1>Formulaire d'inscription</h1>
  <p>Les champs obligatoires sont suivis d'un <strong id="obliga">*</strong>.</p>
                <div id ="contenuInLab">
                         <div id="genre">
                       <label for="Genre">Sexe:</label>
                            
                            <input type="radio" name="sexe" value="femme">Femme
                            <input type="radio" name="sexe" value="homme">Homme<br>
                            </div>

                          <label for="nom">Nom:</label>
                         <input type="text" required ="required" id="nom" name="nom" placeholder="Entrez votre nom"><strong id="obliga"> *</strong id="obliga"><br>
                      
                          <label for="prenom">Prenom:</label>
                          <input type="text" required ="required" id="prenom" name="prenom" placeholder="Entrez votre prenom"><strong id="obliga"> *</strong><br>
                       
                       
                          <label for="email">Email:</label>
                          <input type="email" required ="required" id="email" name="email" placeholder="Entrer email" pattern="^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$"><strong id="obliga" > *</strong><br>
                      
                          <label for="pwd">Mot de passe:</label>
                          <input type="password" required ="required"id="password"  name="password" placeholder="Entrer password" ><strong id="obliga"> *</strong><br>
                     
                          <label for="telephone">Telephone:</label>
                          <input type="tel" id="telephone" name="telephone" placeholder="Entrez votre numero de telephone" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"><br>
                      
                      <label for="profession"> Profession:</label>
                      <input type="text" id="profession"  name="profession" placeholder="Entrez votre profession"><br>

                          <label for="Age">Date de naissance:</label>
                          <input type="date" name="age" placeholder="Entrez votre date de naissance"><br>

                          <label for="Ville">Ville:</label>
                          <input type="text" pattern="[A-Za-z]*" id="ville"  name="ville"><br>

                          <label for="codePostal">Code Postal : </label>
                          <input type="number" id="codePostal" name ="codePostal"><br>

                          <label for="rue"> Rue :</label>
                          <input type="text" id="rue" name="rue"><br> 
                   
                   <div id="messageDouleur">
                     <label for="douleurs"> Autres : </label>
                       <textarea rows="4" cols="50" name="douleurs" placeholder="Antécédents médicaux / Douleurs... "></textarea>

                    </div>
                        <br>

                        <button type="submit" >Inscrire</button><br><br>
                    </div>
                        </div>
                        </form>
                <br>


                  
<?php include("footer.php"); ?>

