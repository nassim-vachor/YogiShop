

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="css-Bootstrap/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 
          <!-- utilisation de style.css pour les differents types d ecrans (responsives) 1024-->

        <link rel="stylesheet" media="screen and (min-width:1200px)"  href="css/grand.css" >
        <link rel="stylesheet" media="screen and (min-width:770px) and (max-width:1200px)  "  href="css/moyen.css"  >
        <link rel="stylesheet" media="screen and  (max-width:770px) "  href="css/petit.css"  >

       
        <title>YogiShop</title>
    </head>
    <body>
        <div class="site-pusher">


<?php include("header.php"); ?> 
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

			<article id="carousel">
			 		
		      		<div id="car" class="container" >
						  <div id="myCarousel" class="carousel slide" data-ride="carousel">
						    <!-- Indicators -->
						   	 <ol class="carousel-indicators">
						      <li data-target="#myCarousel" data-slide-to="0" class="active"  ></li>
						      <li data-target="#myCarousel" data-slide-to="1" ></li>
						      <li data-target="#myCarousel" data-slide-to="2"></li>
						      <li data-target="#myCarousel" data-slide-to="3"></li>
						    </ol>

						    <!-- Wrapper for slides -->
						    <div class="carousel-inner" role="listbox">

						      <div class="item active">
						        <img src="images/back.jpg" alt="yoga" width="460" height="345">
						      </div>

						      <div class="item">
						        <img src="images/back.jpg" alt="yoga" width="460" height="345">
						      </div>
						    
						      <div class="item">
						        <img src="images/back.jpg" alt="yoga" width="460" height="345">
						      </div>

						      <div class="item">
						        <img src="images/back.jpg" alt="yoga" width="460" height="345">
						      </div>

						    </div>

						    <!-- Left and right controls -->
						    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						      <span class="sr-only">Previous</span>
						    </a>
						    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						      <span class="sr-only">Next</span>
						    </a>
						  </div>
					</div>
					
		      </article>
<?php include("footer.php"); ?>