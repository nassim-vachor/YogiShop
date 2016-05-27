
<!DOCTYPE html>
<html>
    <head id="headPrint">
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="css-Bootstrap/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel='stylesheet' type='text/css' href='https://code.jquery.com/ui/1.9.0/themes/smoothness/jquery-ui.css' />
        <link rel='stylesheet' type='text/css' href='css/jquery.weekcalendar.css' />
        
          <!-- utilisation de style.css pour les differents types d ecrans (responsives) 1024-->

        <link rel="stylesheet" media="screen and (min-width:1200px)"  href="css/grand.css" >
        <link rel="stylesheet" media="screen and (min-width:770px) and (max-width:1200px)  "  href="css/moyen.css"  >
        <link rel="stylesheet" media="screen and  (max-width:770px) "  href="css/petit.css"  >

       
        <title>Impression Contrat</title>
					<?php 
					$title="Impression Contrat";
					
						$id=$_POST['iddd'];
						$nom=$_POST['nom'];
						$prenom= $_POST['prenom'];
						$date=$_POST['date'];
						$date= date("d-m-Y",strtotime($date));
						$type=$_POST['type'];
						$abo=$_POST['abonnementType'];
						$nbs=$_POST['nbS'];
						$duree=$_POST['duree1'];
						$tarif= $_POST['tarif'];
						
						 require_once("services/connectdb.php");
     				  $dbh = connect();

					$sql=$dbh->query("SELECT * FROM Person WHERE idPerson='$id'");
				    $rowCount=$sql->rowCount(); 
				    if ($rowCount >0)  //  pas de ligne retournée
				   
				        $row =$sql->fetch();          
				        $age=$row["DateNais"];
				        $age= date("d-m-Y",strtotime($age));
				        $tel=$row["Tel"];
				        $email=$row["email"];
				        $ville=$row["Ville"];
				        $cp=$row["CodePostal"];
				        $rue=$row["Rue"];
				        


					?>
    </head>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	  </script>
	   <section id="tout">	
		<section id ="secYogishop">
			<div id="imagePrint"> <img src="images/logo.png"></div>
			<div id="YogiS">        
					<h1> Gérard Galindo </h1>
						<p> <strong>Yoghishop</strong></p>
						<p id ="adress">9 Rue des Chasseurs</br> 34920 Le Crès </p>
						<p> <span style = " color: #d4444a" > Téléphone : </span> 06 19 53 58 55 </p>

						<p id ="email">
							Email : g.naturo@gmail.com
						</p>

						<p> Boutique en ligne : http://www.yogishop.fr</p>

			</div>




			<div id="titreContrat"> 
				<h1> Contrat YogiShop </h1>
			</div>
		</section>

		<section id="infoContrat" >
				<div id="infoPerso">
					<div>
                    <label>Nom:</label>
                    <input type= "text"  value="<?php echo $nom; ?>"  class="form-control" disabled >
                     </div>
                      <div >
                     <label>Prénom :</label>
                     <input type= "text" value="<?php echo $prenom; ?>"  class="form-control" disabled>
                     </div>
                     <div>
                     <label>Date de naissance :</label>
                     <input type= "text" value="<?php echo $age; ?>"  class="form-control" disabled>
                     </div>
                      <div>
                     <label>Télephone :</label>
                     <input type= "text" value="<?php echo $tel; ?>"  class="form-control" disabled>
                     </div>
                     <div>
                     <label>E-mail :</label>
                     <input type= "text" value="<?php echo $email; ?>"  class="form-control" disabled>
                     </div>
                     <div>
                     <label>Rue :</label>
                     <input type= "text" value="<?php echo $rue; ?>"  class="form-control" disabled>
                     </div>
                      <div>
                     <label>Ville :</label>
                     <input type= "text" value="<?php echo $ville; ?>"  class="form-control" disabled>
                     </div>
                      <div>
                     <label>Code postal :</label>
                     <input type= "text" value="<?php echo $cp; ?>"  class="form-control" disabled>
                     </div>
                </div>
				<div id="detailAbo">
					<div id="date">
                     <label>Date de souscription:</label>              
                     <input type="text"  value="<?php echo $date; ?>"  class="form-control" disabled>
                     </div> 
                     <div>
                     <label>Type d'abonnement :</label>              
                     <input type="text"  value="<?php echo $type; ?>"  class="form-control" disabled>
                     </div> 
                     <div>
                     <label>Nom de l'abonnement :</label>              
                     <input type="text"  value="<?php echo $abo; ?>"  class="form-control" disabled>
                     </div> 
                     
                     <?php 
                      if ($duree == 0 || $duree == NULL  ) {
                      	?>
                      <div>
                     <label>Nombre de séances :</label>              
                     <input type="text"  value="<?php echo $nbs;?>"  class="form-control" disabled>
                     </div>
                     <?php
                      }

                      else {
                      
                      ?>
                       <div>
                     <label>Durée de l'abonnement :</label>              
                     <input type="text"  value="<?php echo $duree;?>"  class="form-control" disabled>
                     </div>
                     <?php
                 		}
                 	?>
                 	<div>
                     <label>Tarif(€) :</label>
                    <input type="text"  value="<?php echo $tarif;?>"  class="form-control" disabled >
                     </div >
                     <div style="margin-top:20px;">
					<p>NB: Toute annulation de réservation doit être effectuée au plus tard 10 heures avant le début de la séance</p>
					</div>
                     <div style="margin-top:80px">
                     	<p style="font-size:20px; text-align:center;">Signature du Client</p>
                     </div>	
                	

				</div>
		</section>
				<div>
				<button class="submit button" id="imprimer" name="connecter" type="submit" onClick="printContrat(); return false;">Imprimer</button>
				</div>

</section>
<script type="text/javascript" src="js/main.js"></script>	

</html>