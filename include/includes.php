
<link rel = "stylesheet" type = "text/css"	href = "/YogiShop/include/style.css" />    
<table width="100%">
       <tr>
           <td style="text-align:center"> 
           <img src="/aquaforme/images/banniere.jpg" width="100%" onclick="javascript:location.replace('/YogiShop/index.php');" />
           </td>
       </tr>
       <tr>
           <td>
                <?php
                    include("fonctions.php");
                    include("fonctions.js");
                    include("connexion.php");
                ?>
                <SCRIPT LANGUAGE="JavaScript" SRC="/YogiShop/include/ejs_menu_dyn.js"></SCRIPT>
                <SCRIPT LANGUAGE="JavaScript">
                    window.moveTo(0,0);
                    window.resizeTo(screen.width,screen.height);
                </SCRIPT>    
              </td>         
       </tr>
</table>

