bgcolor='#0099FF';
bgcolor2='#B6B6B6';
document.write('<style type="text/css">');
document.write('.popper { POSITION: absolute; VISIBILITY: hidden; z-index:3; }')
document.write('#topgauche { position:absolute;  z-index:10; }')
document.write('A:hover.ejsmenu {color:#FFFFFF; text-decoration:none;}')
document.write('A.ejsmenu {color:#FFFFFF; text-decoration:none;}')
document.write('</style>')
document.write('<div style="position:relative;height:25"><DIV class=popper id=topdeck></DIV>');
/*
LIENS
*/
zlien = new Array;
zlien[0] = new Array;
zlien[1] = new Array;
zlien[2] = new Array;
zlien[3] = new Array;
zlien[4] = new Array;
zlien[5] = new Array;
zlien[6] = new Array;
zlien[7] = new Array;
zlien[8] = new Array;

zlien[3][0] = '<A HREF="/aquaforme/adherents/nouveau.php" CLASS=ejsmenu>Nouvel adhérent</A>';
zlien[3][1] = '<A HREF="/aquaforme/adherents/consulter.php" CLASS=ejsmenu>Fiche Adhérent</A>';
zlien[3][2] = '<A HREF="/aquaforme/adherents/etiquettes.php" CLASS=ejsmenu>Impression etiquettes</A>';

zlien[4][0] = '<A HREF="/aquaforme/gym/abonnement.php" CLASS=ejsmenu>Formules d\'abonnement</A>';
zlien[4][1] = '<A HREF="/aquaforme/gym/carte.php" CLASS=ejsmenu>Formules à la carte</A>';
zlien[4][2] = '<A HREF="/aquaforme/gym/formule_mixte.php" CLASS=ejsmenu>Formules mixtes</A>';
zlien[5][0] = '<A HREF="/aquaforme/aquagym/formules.php" CLASS=ejsmenu>Formules</A>';
zlien[6][0] = '<A HREF="/aquaforme/balneo/formules.php" CLASS=ejsmenu>Formules</A>';
zlien[6][1] = '<A HREF="/aquaforme/balneo/formule_club.php" CLASS=ejsmenu>Formules club</A>';
zlien[7][0] = '<A HREF="/aquaforme/esthetique/soins.php" CLASS=ejsmenu>Soins</A>';
zlien[7][1] = '<A HREF="/aquaforme/esthetique/types_soins.php" CLASS=ejsmenu>Types de soins</A>';
zlien[7][2] = '<A HREF="/aquaforme/esthetique/forfaits.php" CLASS=ejsmenu>Forfaits</A>';
zlien[7][3] = '<A HREF="/aquaforme/esthetique/promotions.php" CLASS=ejsmenu>Promotions</A>';
zlien[8][0] = '<A HREF="/aquaforme/stats/echeancier.php" CLASS=ejsmenu>Echéancier d\'abonnements</A>';
zlien[8][1] = '<A HREF="/aquaforme/stats/chiffres.php" CLASS=ejsmenu>Chiffres d\'affaires</A>';
zlien[8][2] = '<A HREF="/aquaforme/stats/adherents.php" CLASS=ejsmenu>Nombres d\'adhérents</A>';

var nava = (document.layers);
var dom = (document.getElementById);
var iex = (document.all);
if (nava) { skn = document.topdeck }
else if (dom) { skn = document.getElementById("topdeck").style }
else if (iex) { skn = topdeck.style }
skn.top = 24;

function pop(msg,pos)
{
    skn.visibility = "hidden";
    a=true
    skn.left = pos;
    var content ="<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 BGCOLOR=#000000 WIDTH=150><TR><TD><TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=1>";
    pass = 0
    while (pass < msg.length)
    	{
    	content += "<TR><TD BGCOLOR="+bgcolor+" onMouseOver=\"this.style.background='"+bgcolor2+"'\" onMouseOut=\"this.style.background='"+bgcolor+"'\" HEIGHT=20><FONT SIZE=1 FACE=\"Arial\">&nbsp;&nbsp;"+msg[pass]+"</FONT></TD></TR>";
    	pass++;
    	}
    content += "</TABLE></TD></TR></TABLE>";
    if (nava)
      {
        skn.document.write(content);
    	  skn.document.close();
    	  skn.visibility = "visible";
      }
        else if (dom)
      {
    	  document.getElementById("topdeck").innerHTML = content;
    	  skn.visibility = "visible";
      }
        else if (iex)
      {
    	  document.all("topdeck").innerHTML = content;
    	  skn.visibility = "visible";
      }
}
function kill()
{
	skn.visibility = "hidden";
}
document.onclick = kill;
document.write('<DIV ID=topgauche><TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 BGCOLOR=#000000 WIDTH=900><TR><TD><TABLE CELLPADING=0 CELLSPACING=1 BORDER=0 WIDTH=100% HEIGHT=25><TR>')
document.write('<TD WIDTH=100 ALIGN=center BGCOLOR='+bgcolor+' onMouseOver="this.style.background=\''+bgcolor2+'\';pop(zlien[0],0)" onMouseOut="this.style.background=\''+bgcolor+'\'"><A onMouseOver="pop(zlien[0],0)" href=/aquaforme/planning_gym/planning_gym.php CLASS=ejsmenu><FONT SIZE=1 FACE="Arial">Planning Gym</FONT></a></TD>')
document.write('<TD WIDTH=100 ALIGN=center BGCOLOR='+bgcolor+' onMouseOver="this.style.background=\''+bgcolor2+'\';pop(zlien[1],100)" onMouseOut="this.style.background=\''+bgcolor+'\'"><A onMouseOver="pop(zlien[1],100)" href=/aquaforme/planning_esthetique/planning_esthetique.php CLASS=ejsmenu><FONT SIZE=1 FACE="Arial">Planning Esthétique</FONT></a></TD>')
document.write('<TD WIDTH=100 ALIGN=center BGCOLOR='+bgcolor+' onMouseOver="this.style.background=\''+bgcolor2+'\';pop(zlien[2],200)" onMouseOut="this.style.background=\''+bgcolor+'\'"><A onMouseOver="pop(zlien[2],100)" href=/aquaforme/adherents/consulter.php CLASS=ejsmenu><FONT SIZE=1 FACE="Arial">Souscription</FONT></a></TD>')

document.write('<TD WIDTH=100 ALIGN=center BGCOLOR='+bgcolor+' onMouseOver="this.style.background=\''+bgcolor2+'\';pop(zlien[3],300)" onMouseOut="this.style.background=\''+bgcolor+'\'"><A onClick="return(false)" onMouseOver="pop(zlien[3],200)" href=# CLASS=ejsmenu><FONT SIZE=1 FACE="Arial">Adhérents</FONT></a></TD>')
document.write('<TD WIDTH=100 ALIGN=center BGCOLOR='+bgcolor+' onMouseOver="this.style.background=\''+bgcolor2+'\';pop(zlien[4],400)" onMouseOut="this.style.background=\''+bgcolor+'\'"><A onClick="return(false)" onMouseOver="pop(zlien[4],300)" href=# CLASS=ejsmenu><FONT SIZE=1 FACE="Arial">Gestion Gym</FONT></a></TD>')
document.write('<TD WIDTH=100 ALIGN=center BGCOLOR='+bgcolor+' onMouseOver="this.style.background=\''+bgcolor2+'\';pop(zlien[5],500)" onMouseOut="this.style.background=\''+bgcolor+'\'"><A onClick="return(false)" onMouseOver="pop(zlien[5],400)" href=# CLASS=ejsmenu><FONT SIZE=1 FACE="Arial">Gestion Aquagym</FONT></a></TD>')
document.write('<TD WIDTH=100 ALIGN=center BGCOLOR='+bgcolor+' onMouseOver="this.style.background=\''+bgcolor2+'\';pop(zlien[6],600)" onMouseOut="this.style.background=\''+bgcolor+'\'"><A onClick="return(false)" onMouseOver="pop(zlien[6],500)" href=# CLASS=ejsmenu><FONT SIZE=1 FACE="Arial">Gestion Balnéo</FONT></a></TD>')
document.write('<TD WIDTH=100 ALIGN=center BGCOLOR='+bgcolor+' onMouseOver="this.style.background=\''+bgcolor2+'\';pop(zlien[7],700)" onMouseOut="this.style.background=\''+bgcolor+'\'"><A onClick="return(false)" onMouseOver="pop(zlien[7],600)" href=# CLASS=ejsmenu><FONT SIZE=1 FACE="Arial">Gestion Esthétique</FONT></a></TD>')
document.write('<TD WIDTH=100 ALIGN=center BGCOLOR='+bgcolor+' onMouseOver="this.style.background=\''+bgcolor2+'\';pop(zlien[8],800)" onMouseOut="this.style.background=\''+bgcolor+'\'"><A onClick="return(false)" onMouseOver="pop(zlien[8],700)" href=# CLASS=ejsmenu><FONT SIZE=1 FACE="Arial">Statistiques</FONT></a></TD>')
document.write('</TR></TABLE></TD></TR></TABLE></DIV></div>')
