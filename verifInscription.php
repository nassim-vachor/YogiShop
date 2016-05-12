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

       
        <title>Inscription</title>
    </head>
    <body>
        <div class="site-pusher">

    <?php include("header.php"); ?>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


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
                <h1 id ="erreurInscription">     
                <a href="inscriptionAdherent.php" onclick="alert('Erreur cet email existe deja!');">Revenir au formulaire d'inscription</a>
                </h1>
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