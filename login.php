
<?php 
	include("connectdb.php"); 
	$message='';

        if(isset($_POST['username'])|| isset($_POST['password']))
			{
					 $message = '<p>une erreur s\'est produite pendant votre identification.
						Vous devez remplir tous les champs</p>
						<p>Cliquez <a href="connexion.php">ici</a> pour revenir</p>';
						echo $message;

             	}

             
			 //On check le mot de passe
			    
             	else 
             	{
							//$email=trim($_POST['email']);     
					 $reponse=$dbh->prepare('SELECT idPerson
									FROM Person WHERE email=? and motDePasse=?');
					 $reponse->execute(array($_POST['username'],$_POST['password']));
					 

					 	$reponse2=$reponse->rowCount();  // compte le nombre de ligne retourne par le select 
					 	//echo $reponse;
					 
						
					if ($reponse2 ==0)  //  pas de ligne retournée
					{

						echo 'Email ou Mot de passe incorrecte';
						echo '<p>Cliquez <a href="connexion.php">ici</a> pour revenir</p>';

					}
					//header('location:'.$_SERVER["HTTP_REFERER"]);
					else // utilisateur trouvee 
					{
                             $row =$reponse->fetch();

                            // utilisateur trouvé, maintenant on va créer les cookies (s'il n'existe pas)
                            if(!isset($_COOKIE["idPerson"]) and !isset($_COOKIE["token"])) 
                            {echo "oui";
                              $tokenValue=uniqid(rand());   // création d'un nouveau token
                              $id=$row["idPerson"];
                              setcookie("idPerson",$id,time()+(3600),"/");  //création des cookies avec les valeurs $id et $tokenvalue
                              setcookie("token",$tokenValue,time()+(3600),"/");
                              $maj=$dbh->query("UPDATE Person SET token ='$tokenValue' WHERE idPerson = '$id' "); //on MAJ la BD
                             
                             header('location:index.php');
                             
                            }
            
			              else{
			                  echo"Vous etes deja connecte ";
			                  header('location:index.php');
			              		}
          			}

					
				}


			}
             
               	 ?>