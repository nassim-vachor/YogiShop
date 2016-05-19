  
<?php
      require_once("services/deleteAbonn.php");

                    
                   $id=$_POST['id'];
//$type=$_POST['type'];

                    $res = deleteAb($id);
                    $estSupp= $res['estSupp'];
                    echo json_encode(array(
                        "estSupp" => $estSupp
                      ));
                 
                      ?>