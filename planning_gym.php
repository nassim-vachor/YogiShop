<!-- planning gym personnalisée -->

<html>
    <head>
        <title> Gestion AQUAFORME Planning Gymnastique </title>
        <?php 
            include("../include/includes.php");
            
            $today=getDate();
            $nom_jour=$today['wday'];
            $jour=$today['mday'];
            $mois=$today['mon'];
            $an=$today['year'];
            
            // suppression des séances gym de la base de données 
            $annee=$an-1;
            $res_del_dec=mysql_query ("delete from seance_decouverte 
                                     where date < STR_TO_DATE('$annee-1-1', '%Y-%m-%d')");
            if ($res_del_dec==0){afficher_erreur("Erreur lors du vidage des anciens rendez-vous de la base de données");}
            
            $res_del_sean=mysql_query ("delete from seance_gym 
                                     where date < STR_TO_DATE('$annee-1-1', '%Y-%m-%d')");
            if ($res_del_sean==0){afficher_erreur("Erreur lors du vidage des anciens rendez-vous de la base de données");}
            
            if (isset($_GET['decouverte'])||isset($_GET['rdv'])||isset($_GET['confirmer_rdv'])||isset($_GET['supprimer_rdv'])){
               $nom_jour=$_GET['nom_jour'];
               $jour=$_GET['jour'];
               $mois=$_GET['mois'];
               $an=$_GET['an'];
               $creno=$_GET['creno'];
               $heure=$_GET['heure'];
               $num_client=$_GET['num_client'];
               if (isset($_GET['decouverte'])){
                  // cas où un adhérent vient de prendre une séance découverte
                  $res_dec=mysql_query("insert into seance_decouverte values('$num_client', STR_TO_DATE('$an-$mois-$jour', '%Y-%m-%d'), '$heure', '$creno', '0')");
                  if ($res_dec==0){afficher_erreur("Erreur lors de la prise en compte de la séance découverte");}
                  else{
                       echo "<div class=titreCentreNoir>La séance découverte a été ajoutée avec succès !</div>";
                  }
               }
               if (isset($_GET['rdv'])){
                  // cas où un adhérent vient de prendre un rendez-vous dans le cadre de son forfait
                  $contrat_adherent=$_GET['forfait_adherent'];
                  $res_rdv=mysql_query("insert into seance_gym values ('$contrat_adherent', STR_TO_DATE('$an-$mois-$jour', '%Y-%m-%d'), '$heure', '0', '$creno')");
                  if ($res_rdv==0){afficher_erreur("Erreur lors de la prise en compte du rendez-vous");}
                  else{
                       echo "<div class=titreCentreNoir>Le rendez-vous a été ajouté avec succès !</div>";
                  }
               }
               if (isset($_GET['confirmer_rdv'])){
                  // cas où on confirme un rendez-vous
                  if (isset($_GET['con_decouverte'])){
                     // confirmation d'une séance découverte
                     $res_update=mysql_query("update seance_decouverte set venu=1
                                                     where numero_adherent='$num_client'
                                                     and date=STR_TO_DATE('$an-$mois-$jour', '%Y-%m-%d')
                                                     and creneau='$creno'
                                                     and heure='$heure'");
                     if ($res_update==0){afficher_erreur("Erreur lors de la confirmation de la séance découverte");}
                     else{
                          echo "<div class=titreCentreNoir>La venue de l'adhérent lors de la séance découverte a été enregistrée avec succès !</div>";
                     }
                  }
                  else{
                       // confirmation d'une séance qui est dans le cadre d'un forfait
                       $num_contrat=$_GET['numero_contrat'];
                       $res_update=mysql_query("update seance_gym set venu=1
                                                       where numero_contrat_gym='$num_contrat'
                                                       and date=STR_TO_DATE('$an-$mois-$jour', '%Y-%m-%d')
                                                       and creneau='$creno'
                                                       and heure='$heure'");
                       if ($res_update==0){afficher_erreur("Erreur lors de la confirmation de la venue de l'adhérent à sa séance");}
                       else{
                            echo "<div class=titreCentreNoir>La venue de l'adhérent lors de la séance a été enregistrée avec succès !</div>";
                       }
                       $res_rech_carte=mysql_query("select * from carte where numero_contrat_gym='$num_contrat'");
                       if ($res_rech_carte==0){afficher_erreur("erreur");}
                       else{
                            $nb=mysql_num_rows($res_rech_carte);
                            if ($nb!=0){
                                $res_update_carte=mysql_query("update carte set nb_effectue=nb_effectue+1 where numero_contrat_gym='$num_contrat'");
                                if ($res_update_carte==0){afficher_erreur("erreur MAJ");}
                                else{
                                     echo "<div class=titreCentreNoir>Le nombre de séances réalisées sur la carte a été incrémenté !</div>";
                                }
                            }
                       }
                  }
               }
               
               if (isset($_GET['supprimer_rdv'])){
                  // cas où on supprime un rendez-vous
                  if (isset($_GET['supp_decouverte'])){
                     // le rendez-vous à supprimer est une séance découverte
                     $res_supp=mysql_query("delete from seance_decouverte
                                                   where numero_adherent='$num_client'
                                                   and heure='$heure'
                                                   and date=STR_TO_DATE('$an-$mois-$jour', '%Y-%m-%d')
                                                   and creneau='$creno'");
                     if ($res_supp==0){afficher_erreur("Erreur lors de la suppression du rendez-vous en séance découverte !");}
                     else{
                          echo "<div class=titreCentreNoir>La séance découverte a été annulée avec succès !</div>";
                     }
               
                  }
                  else{
                       // le rendez-vous à supprimer est compris dans un forfait
                       $num_contrat=$_GET['numero_contrat'];
                       $res_supp=mysql_query("delete from seance_gym
                                                    where numero_contrat_gym='$num_contrat'
                                                    and date=STR_TO_DATE('$an-$mois-$jour', '%Y-%m-%d')
                                                    and heure='$heure'
                                                    and creneau='$creno'");
                       if ($res_supp==0){afficher_erreur("Erreur lors de la suppression du rendez-vous !");}
                       else{
                            echo "<div class=titreCentreNoir>Le rendez-vous a été annulé avec succès !</div>";
                       }
                  }
               }
            }
            
            if (isset($_GET['semaine'])||isset($_GET['decouverte'])||isset($_GET['rdv'])||isset($_GET['confirmer_rdv'])||isset($_GET['supprimer_rdv'])||isset($_GET['retour_annulation_horaire'])||isset($_GET['validation_annulation_horaire'])){
               $nom_jour=$_GET['nom_jour'];
               $jour=$_GET['jour'];
               $mois=$_GET['mois'];
               $an=$_GET['an'];
               
               if (isset($_GET['semaine'])&&$_GET['semaine']=='prochaine'){
                  // on avance la date du jour de une semaine
                  for ($i=0;$i<7;$i++){
                      $date_jour=incrementer_date($nom_jour, $jour, $mois, $an);
                      list($nom_jour, $jour, $mois, $an) = sscanf($date_jour, "%d-%d-%d-%d");
                  }
                  //echo "proc -> nj : $nom_jour / j : $jour / m : $mois / an : $an";
               }
               elseif(isset($_GET['semaine'])&&$_GET['semaine']=='precedente'){
                    // on recule la date du jour de une semaine
                    for ($i=0;$i<7;$i++){
                        $date_jour=decrementer_date($nom_jour, $jour, $mois, $an);
                        list($nom_jour, $jour, $mois, $an) = sscanf($date_jour, "%d-%d-%d-%d");
                    }
                    //echo "prec -> nj : $nom_jour / j : $jour / m : $mois / an : $an";
               }
            }
            else{
                 // récupération par défaut de la date du jour
                $today=getDate();
                $nom_jour=$today['wday'];
                $jour=$today['mday'];
                $mois=$today['mon'];
                $an=$today['year'];
            }
            
            
            
            // recherche du premier jour de la semaine en cours
            $date_jour="$nom_jour-$jour-$mois-$an";
            while ($nom_jour!=1){
                  $date_jour=decrementer_date($nom_jour, $jour, $mois, $an);
                  list($nom_jour, $jour, $mois, $an) = sscanf($date_jour, "%d-%d-%d-%d");
            }
            $nom_jour_deb_sem=$nom_jour;
            $jour_deb_sem=$jour;
            $mois_deb_sem=$mois;
            $an_deb_sem=$an;
            $tab_sem=array();
            $tab_sem[$nom_jour]=$date_jour;
            
            // recherche du dernier jour de la semaine en cours
            while ($nom_jour!=6){
                  $date_jour=incrementer_date($nom_jour, $jour, $mois, $an);
                  list($nom_jour, $jour, $mois, $an) = sscanf($date_jour, "%d-%d-%d-%d");
                  $tab_sem[$nom_jour]=$date_jour;
            }
            
            $nom_jour_fin_sem=$nom_jour;
            $jour_fin_sem=$jour;
            $mois_fin_sem=$mois;
            $an_fin_sem=$an;
            
            
            // initialisation du tableau contenant toutes les séances de la semaine
            $seance_semaine= array(1=> array(9=>array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","","")),
                                       array(9=>array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","","")),
                                       array(9=>array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","","")),
                                       array(9=>array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","","")),
                                       array(9=>array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","","")),
                                       array(9=>array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","",""), array(1=>"","","","","","","","","","")));
            
            // recherche de tous les rendez-vous pris dans le cadre des séances découvertes
            $res_decouverte=mysql_query("select * from seance_decouverte
                                                where date >=STR_TO_DATE('$an_deb_sem-$mois_deb_sem-$jour_deb_sem', '%Y-%m-%d')
                                                and date <= STR_TO_DATE('$an_fin_sem-$mois_fin_sem-$jour_fin_sem', '%Y-%m-%d')");
            if ($res_decouverte==0){afficher_erreur("Erreur lors de la recherche des séances découvertes de la semaine !");}
            else{
                 // on remplit le tableau avec les séances découvertes
                 while ($row=mysql_fetch_array($res_decouverte)){
                       $d=$row["date"];
                       list($a, $m, $j) = sscanf($d, "%d-%d-%d");
                       $day=getdate(mktime(0, 0, 0, $m, $j, $a));
                       $nj=$day["wday"];
                       $seance_semaine[$nj][$row["heure"]][$row["creneau"]]=$row["numero_adherent"];
                 }
            
            }
            
            // recherche de tous les rendez-vous des adhérents qui ont un forfait ou une carte
            $res_seance=mysql_query("select cg.numero_adherent, sg.date, sg.heure, sg.creneau
                                     from seance_gym sg, contrat_gym cg
                                     where sg.date>=STR_TO_DATE('$an_deb_sem-$mois_deb_sem-$jour_deb_sem', '%Y-%m-%d')
                                     and sg.date <= STR_TO_DATE('$an_fin_sem-$mois_fin_sem-$jour_fin_sem', '%Y-%m-%d')
                                     and cg.numero_contrat_gym=sg.numero_contrat_gym");
            if ($res_seance==0){afficher_erreur("Il a y eu une erreur lors de la recherche des rendez-vous de la semaine !");}
            else{
                 // on remplit le tableau avec toutes les séances qui ont été réservées pour les adhérents qui ont un forfait
                 while ($row=mysql_fetch_array($res_seance)){
                       $d=$row["date"];
                       list($a, $m, $j) = sscanf($d, "%d-%d-%d");
                       $day=getdate(mktime(0, 0, 0, $m, $j, $a));
                       $nj=$day["wday"];
                       $seance_semaine[$nj][$row["heure"]][$row["creneau"]]=$row["numero_adherent"];
                 }
            }
            
            $annuler_semaine=array(1=> array(9=>0,0,0,0,0,0,0,0,0,0,0),
                                       array(9=>0,0,0,0,0,0,0,0,0,0,0),
                                       array(9=>0,0,0,0,0,0,0,0,0,0,0),
                                       array(9=>0,0,0,0,0,0,0,0,0,0,0),
                                       array(9=>0,0,0,0,0,0,0,0,0,0,0),
                                       array(9=>0,0,0,0,0,0,0,0,0,0,0));
            $res_annul=mysql_query("select * 
                                from annulation_horaire
                                where date_annulation >=STR_TO_DATE('$an_deb_sem-$mois_deb_sem-$jour_deb_sem', '%Y-%m-%d')
                                and date_annulation <= STR_TO_DATE('$an_fin_sem-$mois_fin_sem-$jour_fin_sem', '%Y-%m-%d')");

                                
            if ($res_annul==0){echo "<div class=warning>Il a y eu une erreur lors de la recherche des annulations de la semaine !</div>";}
            else{
                 while ($row=mysql_fetch_array($res_annul)){
                     $d=$row["date_annulation"];
                     list($a, $m, $j) = sscanf($d, "%d-%d-%d");
                     $day=getdate(mktime(0, 0, 0, $m, $j, $a));
                     $nj=$day["wday"];
                     for ($i=$row["heure_debut"];$i<$row["heure_fin"];$i++){
                         $annuler_semaine[$nj][$i]=$row["heure_debut"];
                     }
                 }
            }
            
        ?>
        <table width=100%>
            <tr>
                <td align="center"> <div class=titreCentreNoir> Planning gym personnalisée <br>Semaine du 
                <?affiche_date($nom_jour_deb_sem, $jour_deb_sem, $mois_deb_sem, $an_deb_sem);?>
                 au 
                 <?affiche_date($nom_jour_fin_sem, $jour_fin_sem, $mois_fin_sem, $an_fin_sem);?>
                 </div>
                </td>
            </tr>
        </table>
    </head>
    <body>
            <!-- haut de page du planning gym personnalisée -->
        <table style="width:100%;cols:3">
            <tr>
                <td style="width:20%">
                    <img src="/aquaforme/images/semaine_precedente.gif" onclick="javascript:location.replace('./planning_gym.php?nom_jour=<?echo$nom_jour;?>&jour=<?echo$jour;?>&semaine=precedente&mois=<?echo$mois;?>&an=<?echo$an;?>');" />
                </td>
                <td style="width:60%" align=center>
                    <img src="/aquaforme/images/annuler_horaire.gif" onclick="javascript:location.replace('./annulation_horaire.php?first_jour=<?echo$tab_sem[1];?>');" />
                </td>
                <td style="width:20%;text-align:right">
                    <img src="/aquaforme/images/semaine_suivante.gif" onclick="javascript:location.replace('./planning_gym.php?nom_jour=<?echo$nom_jour;?>&jour=<?echo$jour;?>&semaine=prochaine&mois=<?echo$mois;?>&an=<?echo$an;?>');" />
                </td>
            </tr>
        </table>
        <!-- affichage du planning gym sous forme de tableau -->
        <table BORDER=4 CELLSPACING=4 CELLPADDING=0 BORDERCOLORDARK=#60a0e0 BORDERCOLORLIGHT=#80a0ff style="width:100%;cols:7" >
            <th style="width:2%" ></th>
            <th style="width:16.33%" ></th>
            <th style="width:16.33%" ></th>
            <th style="width:16.33%" ></th>
            <th style="width:16.33%" ></th>
            <th style="width:16.33%" ></th>
            <th style="width:16.33%" ></th>
            <!-- affichage des jours du planning gym -->
            <tr>
            <td></td>
            <?
            $tab_jour=array ('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
            for ($i=1;$i<7;$i++){
            ?>
              <td class=enteteCentre>
                  <?
                  list($nom_jour, $jour, $mois, $an) = sscanf($tab_sem[$i], "%d-%d-%d-%d");
                  echo"$tab_jour[$i] $jour";
                  ?>
              </td>
            <?}?>
            </tr>
             <?php
            for ($heure=9;$heure<20;$heure++){
            ?>
            <tr>
                <td class=enteteCentre><?echo$heure;?></td>
                <?
                for ($j=1;$j<7;$j++){
                    list($nom_jour, $jour, $mois, $an) = sscanf($tab_sem[$j], "%d-%d-%d-%d");
                    if ($annuler_semaine[$j][$heure]==0){
                    // le créneau n'a pas été annulé
                ?>
                        <td>
                            <table style="cols:1;width:100%">
                            <?
                            for ($kreno=1;$kreno<11;$kreno++){
                                list($nom_jour, $jour, $mois, $an) = sscanf($tab_sem[$j], "%d-%d-%d-%d");
                                if ($seance_semaine[$j][$heure][$kreno]==""){
                                // cas où le créneau est libre
                            ?>
                                   <a href="./rdv_gym.php?nom_jour=<?echo$nom_jour;?>&jour=<?echo$jour;?>&mois=<?echo$mois;?>&an=<?echo$an;?>&heure=<?echo$heure;?>&creno=<?echo$kreno;?>">
                                   <tr>
                                       <td bgcolor="#00FF99">&nbsp;
                                       </td>
                                   </tr>
                                   </a>
                            <?  }
                                else{
                                     $num_cli=$seance_semaine[$j][$heure][$kreno];
                                     $res_cli=mysql_query("select a1.nom, a1.prenom, sd.venu
                                                       from adherent a1, seance_decouverte sd
                                                       where sd.numero_adherent='$num_cli'
                                                       and date=STR_TO_DATE('$an-$mois-$jour', '%Y-%m-%d')
                                                       and heure='$heure'
                                                       and creneau='$kreno'
                                                       and a1.numero_adherent=sd.numero_adherent
                                                union
                                                select a2.nom, a2.prenom, sg.venu
                                                       from adherent a2, seance_gym sg, contrat_gym cg
                                                       where a2.numero_adherent='$num_cli'
                                                       and a2.numero_adherent=cg.numero_adherent
                                                       and cg.numero_contrat_gym=sg.numero_contrat_gym
                                                       and sg.date=STR_TO_DATE('$an-$mois-$jour', '%Y-%m-%d')
                                                       and sg.heure='$heure'
                                                       and sg.creneau='$kreno'");
                                     if ($res_cli==0){afficher_erreur("Erreur recherche nom adhérent !");}
                                     else{
                                          $row=mysql_fetch_array($res_cli);
                                          if ($row["venu"]==0){
                                          // cas où le rendez-vous pris mais pas confirmé
                                          ?>
                                              <a href="./confirmation_gym.php?nom_jour=<?echo$nom_jour;?>&jour=<?echo$jour;?>&mois=<?echo$mois;?>&an=<?echo$an;?>&heure=<?echo$heure;?>&creno=<?echo$kreno;?>&num_client=<?echo$num_cli;?>">
                                              <tr>
                                                  <td bgcolor="#FFCC99"><??>
                                          <?
                                          }
                                          else{
                                          // cas où le rendez-vous est pris et confirmé
                                          ?>
                                              <tr>
                                                  <td bgcolor="#D5D5D5">
                                                  
                                          
                                          <?
                                          }
                                          echo "$row[nom] $row[prenom]";
                                          ?>
                                                  </td>
                                              </tr>
                                              </a>
                                          <?
                                     }
                                
                                }
                            }
                            ?>
                            </table>
                        </td>        
                <?
                  }
                  else{
                       // le créneau a été annulé
                  ?>
                    <a href="./changer_annulation.php?nom_jour=<?echo$nom_jour;?>&jour=<?echo$jour;?>&mois=<?echo$mois;?>&an=<?echo$an;?>&heure_debut=<?echo$annuler_semaine[$j][$heure];?>">
                       <td bgcolor="#0099FF">
                       </td>
                    </a>
                  <?
                  }
                }
                ?>
            </tr>
            <?
            }
            ?>
        </table>
    </body>
    <?mysql_close();?>
</html>