<?php include("connectdb.php"); ?> 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 
          <!-- utilisation de style.css pour les differents types d ecrans (responsives) -->
        <link rel="stylesheet" media="screen and (min-width:1200px)"  href="grand.css" >
        <link rel="stylesheet" media="screen and (min-width:770px) and (max-width:1200px)  "  href="moyen.css"  >
        <link rel="stylesheet" media="screen and  (max-width:770px) "  href="petit.css"  >

       
        <title>Contact</title>
    </head>
    <body>
        <div class="site-pusher">

	<?php include("header.php"); ?>

	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	      

	<section id="contactSection">
		
		<h1> Gérard Galindo </h1>
		<h2> Yoghishop </h2>
		<h3 id ="adress">9 Rue des Chasseurs</br> 34920 Le Crès </h3>
		<h3> <span style = " color: #d4444a" > Téléphone : </span> 06 19 53 58 55 </h3>

		<h3 id ="email">
			Email : <a href="mailto:g.naturo@gmail.com" >g.naturo@gmail.com</a>
		</h3>

		<h3> Lien de notre boutique de naturopathie en ligne :<a href = "http://www.yogishop.fr" target ="_blank"> http://www.yogishop.fr </a></h3>

	</section>

<section id="planAccessSection">
	
<h3 style = " color: #d4444a"> Plan d'accès </h3>
<h4> Notre établissement est situé au Crès, derrière Leclerc Drive </h4>

<div id="googleMap" ></div>
</section>

<?php include("footer.php"); ?>