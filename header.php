
<?php
       
            // Pour tester s'il a des cookies "idPerson" et "token"
        if (isset($_COOKIE['idPerson']) && isset($_COOKIE['token']))
        {
            // si oui on les stocke dans des variables
            $id = $_COOKIE['idPerson'];
            $requete = $dbh->query("SELECT token FROM Person WHERE idPerson = '$id'");
            $row =$requete->fetch();

            //on verifie si le token est vide ou si le token recuperé est different de celle de la bd 
            // ou si son token est egal a 0 (dans ce cas, la personne est deconnectée)
            if(!isset($_COOKIE['token']) || $_COOKIE['token'] == '0' || $row['token'] != $_COOKIE['token'])
            {
                include("menuOff.php");
            }
            else 
            {
               
                $requete = $dbh->query("SELECT idPerson FROM Admin WHERE idPerson = '$id'");
                $row =$requete->fetch();

                // verification du type de personne : admin ou adherent
                if($rowCount>0){
              
                include("menuOnAdmin.php");
                }
                else 
                {
                      include("menuOnUser.php");
                }
            } 
        }
        else
        {
            include("menuOff.php"); 
        }

?>       
		