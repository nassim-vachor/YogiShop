<?php

require_once("connectdb.php");

function updatePwd( $idC,$oldPwd, $inputPwd, $newPwd, $newPwd1 ){
            $pwdUpdated =false;
            $mdpEqual= false;
            $inputPwd = sha1($inputPwd);
						$dbh = connect();
            if ($oldPwd == $inputPwd ) {
              if( $newPwd == $newPwd1){
               $newPwd = sha1($newPwd);
               $req=$dbh->query("UPDATE Person SET Password='$newPwd'
                     WHERE IdPerson='$idC'");
                    $mdpEqual = true;
                    $pwdUpdated = true;
                  }
              else{
                  $mdpEqual= false;
                  $pwdUpdated = true;
              }
          
          }
            
          else {
                  $pwdUpdated = false;


            }
						
            $res=array(
                "pwdUpdated" => $pwdUpdated,
                "mdpEqual"=> $mdpEqual); 

   			       return $res;
	   }
	   ?>