<script language="javascript">
  function controle_numerique(name,valeur) {
  //V�rifie si le champs saisi dans un formulaire est de type num�rique
  if (isNaN(valeur))
  { 
    alert("Le tarif doit avoir une valeur num�rique");
    //Fixe la valeur de ce champs, identifi� par son id � vide
    document.getElementById(name).value="";
    //document.getElementById("tarifSoin").reset();
    //document.getElementById("tarifSoin").focus();
  } 
 }
 function remplirchamp(name, valeur) {
   document.getElementById(name).value=valeur;
 }
 
  function majListeDynamique(value,partie1,partie2)
  /*L'utilisateur s�l�ctionne une valeur value dans une premi�re liste d�roulante. 2 listes sont pr�sentes dans le code html car la premi�re liste poss�ed 2 valeurs
  Selon cette valeur on affiche l'une ou l'autre des parties chacune incluse dans une balide div.
  */ 
  {
   if(value=="soin_esthetique")  
   {                                     
       document.getElementById(partie1).style.visibility="visible";
       document.getElementById(partie2).style.visibility="hidden";
   }
   else if(value=="forfait_esthetique")  
   {
       document.getElementById(partie2).style.visibility="visible";
       document.getElementById(partie1).style.visibility="hidden";
   }   
   else if (value=="0")  
   {
        document.getElementById(partie2).style.visibility="hidden";
        document.getElementById(partie1).style.visibility="hidden";
   }
  }
 
 </script>                                    
