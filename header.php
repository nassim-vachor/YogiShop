
<?php


       require_once("connectdb.php");
       $dbh = connect();

            // Pour tester s'il a des cookies "idPerson" et "token"
        if (isset($_COOKIE['id']) && isset($_COOKIE['token']))
        {
            // si oui on les stocke dans des variables
            $id = $_COOKIE['id'];
            $requete = $dbh->query("SELECT Token FROM Person WHERE idPerson = '$id'");
            $row=$requete->fetch();
 
            //on verifie si le token est vide ou si le token recuperé est different de celle de la bd 
            // ou si son token est egal a 0 (dans ce cas, la personne est deconnectée)
            if(!isset($_COOKIE['token']) || $_COOKIE['token'] == '0' || $row['Token'] != $_COOKIE['token'])
            {
                // tu est deconnecte => button connexion
                

                include("menuOff.php");
            }
            else 
            {
               // la personne est connectée => button connexion

                // on selectionne les admin 

                $requete = $dbh->query("SELECT idPerson FROM Person WHERE $id = idPerson and EstAdmin = 1");
                $row =$requete->fetch();

                // verification du type de personne : admin ou adherent
                // user connecte :
                if($row>0){
              
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
		