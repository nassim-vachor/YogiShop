
<?php


       require_once("connectdb.php");
       $dbh = connect();

       $id=$_COOKIE['id'];


  // Suppression du cookie 
  setcookie('id', "", time()-3600, "/");
  // Suppression de la valeur du tableau $_COOKIE
  unset($_COOKIE['id']);
  setcookie('token', "", time()-3600, "/");
  unset($_COOKIE['token']);

header('location:index.php');

  

?>