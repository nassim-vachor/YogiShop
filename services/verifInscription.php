

<?php
 require_once("connectdb.php");
  //  fonction appelée par inscription pour effectuer toutes les verification nécessaires

function updateClientByAdmin() {
    
   $dbh = connect();
    if(isset($_POST['modif']))
    {
    
      $id=$_POST['idPerson'];
      $nom=$_POST['nom1'];
      $prenom=$_POST['prenom1'];
      $email=$_POST['email'];
      $age=$_POST['age'];
      $genre=$_POST['sexe'];
      $telephone=$_POST['tel'];
      $ville=$_POST['ville'];
      $cp=$_POST['cp'];
      $rue=$_POST['rue'];
      $job=$_POST['job'];
      $douleurs=$_POST['douleurs'];
      $req=$dbh->query("UPDATE Person SET Nom='$nom', Prenom='$prenom', DateNais='$age',tel='$telephone'
                    ,email = '$email',Ville = '$ville',CodePostal='$cp',Rue='$rue',Douleurs='$rue',Sexe='$genre', Profession='$job' 
                     WHERE idPerson='$id'")
          ?>     
      
        <p id ="modifSaved"><?php echo "le profil du client \"$nom $prenom\"  a été bien mis à jour";?></p>
    <?php 
           
    }
      
}









function verif() {
    $dbh = connect();
    if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['password']) and isset($_POST['email']))
    {
       
        $nom=$_POST['nom'];
        $genre;
        $prenom=$_POST['prenom'];
        $age=$_POST['age'];
        $genre=$_POST['sexe'];
        $email=$_POST['email'];
        $password= sha1($_POST['password']);
        $telephone=$_POST['telephone'];
        $ville=$_POST['ville'];
        $cp=$_POST['codePostal'];
        $rue=$_POST['rue'];
        $job=$_POST['profession'];
        $douleurs=$_POST['douleurs'];
        $admin= 0;
        $coach=0;

           //  requete pour voir si l'email n'est pas deja ds la bd
        $requete = $dbh->query("SELECT idPerson FROM Person WHERE email = '$email'");
        $row=$requete->rowCount();

        if ($row >0)
            {


?>



<script type="text/javascript">
    
 
    alert("Cet e-mail existe déja!! veuillez choisir un autre")
   
    

</script>
               
<?php
            }

        else{
                $req=$dbh->prepare('INSERT INTO person(Nom, Prenom,DateNais,tel,email,Ville,CodePostal,Rue,Douleurs,Password,Sexe, Profession, EstAdmin, EstCoach)
                VALUES ( :nom,:prenom,:age,:tel,:mail,:ville,:cp,:rue,:douleurs,:motDePasse,:sexe ,:job,:admin,:coach)');
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
                'job' => $job,
                'admin' =>$admin,
                'coach' =>$coach));
      ?>  
         <script type="text/javascript">
    
 
        alert("inscription Réussite")
    </script>
<?php

       // echo '<script> document.location.href = "index.php"</script>';
    }
}


}


?>
