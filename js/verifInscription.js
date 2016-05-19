$("#insc").click(function(){
	<?php
					       require_once("connectdb.php");
					       $dbh = connect();

	  if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['password']) and isset($_POST['email']))
					    {
					       
					        $nom=$_POST['nom'];
					        $genre;
					        $prenom=$_POST['prenom'];
					        $age=$_POST['age'];
					        
					        if(isset($_POST['sexe']) )
					            {
					                $genre=$_POST['sexe'];
					            }

					        $email=$_POST['email'];
					        $password=$_POST['password'];
					        $telephone=$_POST['telephone'];
					        $ville=$_POST['ville'];
					        $cp=$_POST['codePostal'];
					        $rue=$_POST['rue'];
					        $douleurs=$_POST['douleurs'];
					        $admin= 0;
					        $coach=0;

					           //  requete pour voir si l'email n'est pas deja ds la bd
					        $requete = $dbh->query("SELECT idPerson FROM Person WHERE email = '$email'");
					        $row=$requete->rowCount();

						 if ($row >0)
						            {
						?>
						      alert("cet email existe deja")  

						<?php
						            }


					        else{
					                $req=$dbh->prepare('INSERT INTO person(Nom, Prenom,DateNais,tel,email,Ville,CodePostal,Rue,Douleurs,Password,Sexe, EstAdmin, EstCoach)
					                VALUES ( :nom,:prenom,:age,:tel,:mail,:ville,:cp,:rue,:douleurs,:motDePasse,:sexe,:admin,:coach)');
					                $req->execute(array(
					                'nom' => $nom,
					                'prenom' =>$prenom,
					                'age' =>$age,
					                'tel' => $telephone,
					                'mail' =>$email,
					                'ville' =>$ville,
					                'cp' =>$cp,
					                'rue' =>$rue,
					                'douleurs' =>$douleurs,
					                'motDePasse' =>$password,
					                'sexe' =>$genre,
					                'admin' =>$admin,
					                'coach' =>$coach));

					        header('location:index.php');
					       
					    }
					}


					?>
						//alert($("#in").text());
						
					});
