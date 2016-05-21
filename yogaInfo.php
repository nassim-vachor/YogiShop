
<?php 
$secure_level = 1;
include("header.php"); ?>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	  </script>
	   		
		<section id = "yoga">
			<div class="yogaImage"> 
		<img src="images/yoga.jpg" alt="yoga" width="100%">
	</div>
			<div class="textYoga"> 
				<h1> YOGA </h1>
				<p> Le Yoga permet le lien entre l'esprit et le corps. </p>
				<p> Il vise à libérer l'esprit des contraintes du corps par la maîtrise de son mouvement, de son rythme et du souffle. </p>
				<p> Effets prouvés sur la santé, nous serons heureux de vous retrouver parmi nous. </p>

			</div>
		</section>

		<section id = "naturopathie">
			<div class="naturoImage"> 
				<img src="images/naturopathie.jpg" alt="naturopathie" width="100%">
			</div>
			<div class="textNaturo">
				<h1> NATUROPATHIE </h1>
				<p> La naturopathie ou la médécine non conventionnelle vise à équilibrer le fonctionnement de l'organisme par des moyens naturels. </p>
				<p> Gérard Galindo dans sa boutique, propose des formations "hygiéniste de vie" et des séances de naturaphie </p>
				<p> N'attendez plus, venez vite le découvrir </p>
			</div>
		</section>
		<section id = "tarif">
			<table id ="tableTarifYoga">
				<th> YOGA</th>
				
				<tr>
					<td> Carte de 10 séances</td>
					<td> 170 €</td>
				</tr>

				<tr>
					<td>Une séance </td>
					<td> 20 €</td>
				</tr>

				<tr>
					<td>Une séance individuelle </td>
					<td> 50 €</td>
				</tr>

			</table>

			<table id ="tableTarifNaturo">
				<th> NATUROPATHIE</th>
				
				<tr>
					<td> Séance 2 h</td>
					<td> 50 €</td>
				</tr>

				<tr>
					<td>Forfait année </td>
					<td> 20 €</td>
				</tr>

				<tr>
					<td>Formation "hygiéniste de vie" (20h de base)</td>
					<td> 495 €</td>
				</tr>

			</table>



		</section>

		
<?php include("footer.php"); ?>