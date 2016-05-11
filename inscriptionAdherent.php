<?php include("connectdb.php"); ?> 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 
          <!-- utilisation de style.css pour les differents types d ecrans (responsives) -->
        <link rel="stylesheet" media="screen and (min-width:1024px)"  href="grand.css" >
        <link rel="stylesheet" media="screen and (min-width:750px) and (max-width:1024px)  "  href="moyen.css"  >
        <link rel="stylesheet" media="screen and  (max-width:750px) "  href="petit.css"  >

       
        <title>Contact</title>
    </head>
    <body>
        <div class="site-pusher">

	<?php include("header.php"); ?>

	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <form action="index.php" method="post">
                
                          <label for="nom">Nom:</label>
                         <input type="text" required ="required" id="nom" name="nom" placeholder="Entrez votre nom"><br>
                      
                          <label for="prenom">Prenom:</label>
                          <input type="text" required ="required" id="prenom" name="prenom" placeholder="Entrez votre prenom"><br>
                       
                       
                          <label for="email">Email:</label>
                          <input type="email" required ="required" id="email" name="email" placeholder="Entrer email"><br>
                      
                          <label for="pwd">Mot de passe:</label>
                          <input type="password" required ="required"id="password"  name="password" placeholder="Entrer password"><br>
                     
                          <label for="telephone">Telephone:</label>
                          <input type="tel" required ="required" id="telephone" name="telephone" placeholder="Entrez votre numero de telephone"><br>
                      
                      <label for="profession"> Profession:</label>
                      <input type=>

                          <label for="Age">Date de naissance:</label>
                          <input type="number" min="0" required ="required" id="age" name="age" placeholder="Entrez votre date de naissance"><br>

                          <label for="Ville">Ville:</label>
                          <input type="text" pattern="[A-Za-z]*" required ="required" id="ville"  name="ville" placeholder="Entrez votre ville"><br>

                          <label for="codePostal">Code Postal : </label>
                          <input type="text" id="codePostal" name ="codePostal"><br>

                          <label for="rue"> Rue :</label>
                          <input type="text" id="rue" name="rue"><br>

                       <label for="Genre">Genre:</label>
                            <input type="radio" name="genre" value="femme">Femme
                            <input type="radio" name="genre" value="homme">Homme<br>
                     
                       
                        <button type="submit" class="btn btn-default">Submit</button>
                  
<?php include("footer.php"); ?>

