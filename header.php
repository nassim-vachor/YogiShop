
<?php


       require_once("services/connectdb.php");
       $dbh = connect();
       require_once("services/authentification.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="css-Bootstrap/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel='stylesheet' type='text/css' href='https://code.jquery.com/ui/1.9.0/themes/smoothness/jquery-ui.css' />
        <link rel='stylesheet' type='text/css' href='css/jquery.weekcalendar.css' />
        
          <!-- utilisation de style.css pour les differents types d ecrans (responsives) 1024-->

        <link rel="stylesheet" media="screen and (min-width:1200px)"  href="css/grand.css" >
        <link rel="stylesheet" media="screen and (min-width:770px) and (max-width:1200px)  "  href="css/moyen.css"  >
        <link rel="stylesheet" media="screen and  (max-width:770px) "  href="css/petit.css"  >

       
        <title>YogiShop | <?php echo $title; ?></title>
    </head>
    <body>
        <div class="site-pusher">
<?php 
           
            if($_USER["isConnected"]) {
                if($_USER["isAdmin"]) {
                    include("menuOnAdmin.php");
                }
                else {
                    include("menuOnUser.php");
                }
            }
            else {
                include("menuOff.php");
            }


?>       
		