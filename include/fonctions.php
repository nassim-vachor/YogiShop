<?php
function datediff($a,$b)
// Prend deux dates au format YYYY-MM-JJ et retourne le nombre de mois de diff�rence entre elles
// Ceci, sans tenir compte des jours : c'est une diff�rence approximative qui ne sert qu'� calculer des ages.
{
    $date1 = intval(substr($a,0,4))*12+intval(substr($a,5,2));
    $date2 = intval(substr($b,0,4))*12+intval(substr($b,5,2));
    return abs($date1-$date2); //abs pour �viter les r�sultas n�gatifs suivant l'ordre des arguments de la fonction
}

function affiche_date ($wday, $mday, $mon, $year){
// affiche une date "� la fran�aise" : Vendredi 3 janvier 2005
    $jour_semaine=array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    $mois=array(1 => 'Janvier', 'F�vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao�t', 'Septembre', 'Octobre', 'Novembre', 'D�cembre');
    echo "$jour_semaine[$wday] $mday $mois[$mon] $year";
}

function affiche_date_simple ($d){
// affiche la date � la fran�aise, en simple, pass�e au format YYYY-MM-DD
    $mois=array(0=>'', 'Janvier', 'F�vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao�t', 'Septembre', 'Octobre', 'Novembre', 'D�cembre');
    echo substr($d,8,2)." ".$mois[intval(substr($d,5,2))]." ".substr($d,0,4);
}

function prochain_numero($tablename, $keyname) {
// renvoie le prochain num�ro � utiliser comme cl� dans la table indiqu�e en param�tre
   $req = mysql_query("select max(".$keyname.") from ".$tablename."");
   $row = mysql_fetch_row($req);
   $num=$row[0]+1; // $num contient le numero de l'adherent � saisir
   return $num;
}

function afficher_erreur($msg) {
// affiche un message d'erreur � l'�cran
    echo "<div class=warning>$msg</div>";
}

function incrementer_date($nom_jour, $jour_save, $mois_save, $an_save) {
// Incr�mente la date d'un jour.
// $nom_jour : de 0 � 6 avec 0=>Dimanche, 1=>Lundi, ...
    // v�rification si on est dans une ann�e bissextile
    if (checkdate(2,29,$an_save)){
         $tab_mois=array(1 => 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    }
    else {
         $tab_mois=array(1 => 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    }

    $nom_jour=($nom_jour+1) % 7;
    $jour=(($jour_save)% ($tab_mois[$mois_save]))+1;
    if ($jour==1){
      $mois=($mois_save%12)+1;
    }
    else{
        $mois=$mois_save;
    }
    if ($jour==1&&$mois==1){
      $an=$an_save+1;
    }
    else{
        $an=$an_save;
    }
    return ("$nom_jour-$jour-$mois-$an");
}

function decrementer_date($nom_jour, $jour_save, $mois_save, $an_save){
// M�me fonction, mais d�cr�mente la date pass�e en param�tre de un jour.
    // v�rification si on est dans une ann�e bissextile
    if (checkdate(2,29,$an_save)){
       $tab_mois=array(1 => 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    }
    else{
         $tab_mois=array(1 => 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    }
    
    if ($nom_jour == 0){
       $nom_jour = 6;
    }
    else{
         $nom_jour=$nom_jour -1;
    }
    
    // cas o� on est pas en fin de mois
    if ($jour_save!=1){
       $jour=$jour_save-1;
       $mois=$mois_save;
       $an=$an_save;
    }
    else{
         // on est en d�but de mois
         
         // cas o� on est en d�but d'ann�e
         if ($mois_save==1){
            $mois=12;
            $an=$an_save-1;
            $jour=31;
         }
         else{
         // autre mois que janvier
            $mois=$mois_save-1;
            $jour=$tab_mois[$mois];
            $an=$an_save;
         }
    }
    return ("$nom_jour-$jour-$mois-$an");
}
?>
