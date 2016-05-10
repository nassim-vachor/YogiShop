
<?php 
	include("connectdb.php"); 
	$message='';

        if(empty($_POST['username'])|| empty($_POST['password']))
			{
				?>	
					<script language="javascript">
						document.getElementById("login_error").innerHTML = "bonjour"
					</script>

				<?php
             	}

             
			 //On check le mot de passe
			    
             	else 
             	{
							//$email=trim($_POST['email']);     
					 $reponse=$dbh->prepare('SELECT idPerson
									FROM Person WHERE email=? and password=?');
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
             
               	 ?>