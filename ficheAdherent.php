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




 <script type="text/javascript" >
// fonction pour rechercher le nom et prenom de l'adherent
function searchq(){

	var searchText = $("input[name='search']").val();

	$.post("search.php" , {searchVal : searchText}, function(output){
		$("#output").html(output);
	});
}

</script>

<form action="ficheAdherent.php" method="post">
	<input type="text" id = "nom" name= "search" placeholder="Rechercher un adhérent" onkeydown= "searchq();"/>
	<input type= "submit" value=">>" />


</form>

<div id ="output"> 
</div>

<br><br>

	<?php include("footer.php"); ?>
