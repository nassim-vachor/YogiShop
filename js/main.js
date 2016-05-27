
/**
*
*
*/
function login() {

	//Etape 1: recuperer le email et le mdp et vérifier
	var username = $("#username").val();
	var password = $("#password").val();

	// un des champs est vide
	if(!username || !password) {
		$("#login_error").text("Veuillez remplir tous les champs");
	}

else{
	//Etape 2: faire la requete ajax
	$.ajax({
	  url: "ajax/login_ajax.php",
	  method: "POST",
	  data: {
	    username: username,
	    password: password
	  },
	  success: function(result) {
	  	console.log(result);
	  	var res = JSON.parse(result);

	  //	alert(res.a.b); //c
	    //Creation du cookie
	    // resultat requete nul
	  //  console.log(res);
	    if(!res.token) {
	    	$("#login_error").text("Mauvais email / mot de passe");

	    }
	    	// un resultat a ete retrouvé
	    else {
	    	//1/24 c'est égale à une heure 
	    	Cookies.set('token', res.token,{ expires: 1/24 });
	    	Cookies.set('id', res.idP, { expires: 1/24 });
	    	location.reload();
	    }
	  },
	  error: function(err) {
	  	$("#login_error").text("Erreur serveur");
	  
	  }
	});
}
}
function deleteAbo(idAbonnement) {
			
	//var type =  $("#typ").val(); 
	//console.log(type);
	//Etape 1: recuperer le email et le mdp et vérifier
	var x =confirm("êtes-vous sûr de vouloir supprimer cet abonnement?\n Verifiez bien qu'aucune personne n'est abonnée à cet abonnement");
	
	// un des champs est vide
	if(x) {
		

	//Etape 2: faire la requete ajax
	$.ajax({
	  url: "ajax/deleteAbonnement_ajax.php",
	  method: "POST",
	   data: {
	    id: idAbonnement
	   // type: type
	  },
	 
	  success: function(result) {
	  var res = JSON.parse(result);
	  console.log(res);
	  if (res.estSupp) {
	  
	 $("#abo_supp").text("Votre abonnement a été bien supprimé");
	 $(".row-"+idAbonnement).remove();
	  }
	  else{
	  	$("#abo_supp").text("Suppression non éffectuée");

	  }
	  },
	  error: function(err) {
	  	$("#abo_supp").text("Erreur serveur");
	  
	  }
	});
}
else{
	window.location.href = "abonnement.php";
}


}


function ajoutSeance(){
	//Etape 1: recuperer des champs
	var jourSeance = $("#jourSeance").val();
	var heureSeanceD = $("#heureSeanceD").val();
	var heureSeanceF = $("#heureSeanceF").val();
	var nbPlace = $("#nbPlace").val();
	var myselectCoach= $( "#myselectCoach option:selected" ).text();
	// un des champs est vide 
	if(!jourSeance || !heureSeanceF || !heureSeanceD || !nbPlace || !myselectCoach){
		$("#ajoutSeance_error").text("Veuillez remplir tous les champs");
	}

else{
	//Etape 2: faire la requete ajax

	$.ajax({
	  url: "ajax/ajoutSeance_ajax.php",
	  method: "POST",
	  data: {
	    jourSeance: jourSeance,
	    heureSeanceD: heureSeanceD,
	    heureSeanceF: heureSeanceF,
	    nbPlace: nbPlace,
	    myselectCoach : myselectCoach
	  },
	  success: function(result) {
	  	console.log('oui');
	  	
	  	var res = JSON.parse(result);
	  	console.log(res);
	    if(!res.estInserer) {
	    	$("#ajoutSeance_error").text("Créneau indisponible, veuillez récommencer !");
	    	

	    }
	    	// l'insertion s'est bien passé
	    else {
	    	$("#ajoutSeance_error").text("Félicitations, séance ajoutée");
	    	
	    	setTimeout(function(){location.reload();},3000);
	    }
	  },
	  error: function(err) {
	  	$("#ajoutSeance_error").text("Erreur serveur");
	  
	  }
	});
}
}


function getJourSeance()
{

var jourSeance2 = $("#jourSeance2").val();
if(jourSeance2 ){
		$.ajax({
	  url: "ajax/annulSelectSeance_ajax.php",
	  method: "POST",
	  data: {
	    jourSeance2: jourSeance2
	   
	  },
	  success: function(result) {
	  	console.log('oui');
	  
	  	var res = JSON.parse(result);
	  	console.log(res);

	  	// si aucune seance a cette date la 
	    if(jQuery.isEmptyObject(res)) {
	    	$("#myselectSeance").empty();
	    	$("#annulSeance_error").text("Pas de séance(s) disponible(s) à cette date, choisissez une autre date!");
	    	
	    	//location.reload();
	    }
	    	// des seances ont ete retournees
	    else {
	    		$("#myselectSeance").empty();
	    		$("#myselectSeance").append('<option> </option>')
	    	for (var i in res ){

	    		
	    		$("#myselectSeance").append('<option id ="seance_'+i+'">' +res[i]+'</option>')
			};
			//location.reload();
	    	}
	    	//e.empty();
	    	//location.reload();
	    
	  },
	  error: function(err) {
	  	$("#annulSeance_error").text("Erreur serveur");
	  
	  }
	});
}
}


function getjourSeanceModif()
{

var jourSeanceModif = $("#jourSeanceModif").val();
if(jourSeanceModif ){
		$.ajax({
	  url: "ajax/annulSelectSeanceModif_ajax.php",
	  method: "POST",
	  data: {
	    jourSeanceModif: jourSeanceModif
	   
	  },
	  success: function(result) {
	  	console.log('oui');
	  
	  	var res = JSON.parse(result);
	  	console.log(res);

	  	// si aucune seance a cette date la 
	    if(jQuery.isEmptyObject(res)) {
	    	$("#myselectSeanceModif").empty();
	    	$("#modifSeance_error").text("Pas de séances disponibles à cette date, choisissez une autre date!");
	    	
	    	//location.reload();
	    }
	    	// des seances ont ete retournees
	    else {
	    		$("#myselectSeanceModif").empty();
	    		$("#myselectSeanceModif").append('<option> </option>')
	    	for (var i in res ){

	    		
	    		$("#myselectSeanceModif").append('<option id ="seanceModif_'+i+'">' +res[i]+'</option>')
			};
			//location.reload();
	    	}
	    	//e.empty();
	    	//location.reload();
	    
	  },
	  error: function(err) {
	  	$("#modifSeance_error").text("Erreur serveur");
	  
	  }
	});
}
}


function modifInfoSeance(){


var jourSeanceModif= $("#jourSeanceModif").val();
var myselectSeanceModif = $( "#myselectSeanceModif option:selected" ).val();
$("#modifSeance_error").empty();$("#modifSeance_error2").empty();

	// un des champs est vide 
	if(!jourSeanceModif || !myselectSeanceModif ){
		//permet de vider les inputs
		$("#heureSeanceDModif").val(' ');
	    $("#heureSeanceFModif").val('');
		$("#nbPlaceModifPlace").val(' ');

		$("#modifSeance_error").text("Veuillez remplir les 2 premiers champs");

	}

	else{

	//Etape 2: faire la requete ajax
	console.log("oui");
	console.log(myselectSeanceModif);
	$.ajax({
	  url: "ajax/modifInfoSeance_ajax.php",
	  method: "POST",
	  data: {
	  	jourSeanceModif: jourSeanceModif,
	    myselectSeanceModif: myselectSeanceModif
	  },
	  success: function(result) {
	  	console.log(result);
	 	var res = JSON.parse(result);
	 	console.log(res.datefin);
	    if(res) {

	    	$("#heureSeanceDModif").val(res.datedeb);
	    	$("#heureSeanceFModif").val(res.datefin);
	    	$("#nbPlaceModifPlace").val(res.nbPlace);

	    }
	    	
	    else {
	    	$("#modifSeance_error").text("Pas de séances pour cette date, veuillez recommencez!!");
	    	//location.reload();
	    }
	  },
	  error: function(err) {
	  	$("#modifSeance_error").text("Erreur serveur");
	  
	  }
	});
}
}

function modifSeance(){

var jourSeanceModif= $("#jourSeanceModif").val();
var myselectSeanceModif = $( "#myselectSeanceModif option:selected" ).val();
var heureSeanceDModif= $("#heureSeanceDModif").val();
var heureSeanceFModif= $("#heureSeanceFModif").val();
var nbPlaceModifPlace= $("#nbPlaceModifPlace").val();
$("#modifSeance_error").empty();$("#modifSeance_error2").empty();
	// un des champs est vide 
	if(!jourSeanceModif || !myselectSeanceModif ){
		
		$("#modifSeance_error").text("Veuillez remplir les 2 premiers champs");

	}

	else{
	//Etape 2: faire la requete ajax
	console.log(myselectSeanceModif);
	//console.log(myselectSeanceModif);
	$.ajax({
	  url: "ajax/modifSeance_ajax.php",
	  method: "POST",
	  data: {
	  	jourSeanceModif: jourSeanceModif,
	    myselectSeanceModif: myselectSeanceModif,
	    heureSeanceDModif: heureSeanceDModif,
	    heureSeanceFModif: heureSeanceFModif,
	    nbPlaceModifPlace: nbPlaceModifPlace

	  },
	  success: function(result) {
	  	console.log(result);
	 	var res = JSON.parse(result);

	    if(res.deleted>0) {
	    	
	    	$("#modifSeance_error2").text("Félicitations la modification a bien été effectuée");
	    	$("#myselectSeanceModif option:selected").remove();
	    	setTimeout(function(){location.reload();},3000);
	    }
	    	
	    else {
	    	
	    	$("#modifSeance_error").text("Erreur, créneau indisponible, veuillez recommencez!!");
	    	//location.reload();
	    }
	  },
	  error: function(err) {
	
	  	$("#modifSeance_error").text("Erreur serveur");
	  
	  }
	});
}
}
 function annulSeance(){

var jourSeance2= $("#jourSeance2").val();
var myselectSeance = $( "#myselectSeance option:selected" ).val();

	// un des champs est vide 
	if(!jourSeance2 || !myselectSeance ){
		$("#annulSeance_error").text("Veuillez remplir tous les champs");

	}

	else{
	//Etape 2: faire la requete ajax
	console.log("oui");
	console.log(myselectSeance);
	$.ajax({
	  url: "ajax/annulSeance_ajax.php",
	  method: "POST",
	  data: {
	  	jourSeance2: jourSeance2,
	    myselectSeance: myselectSeance
	  },
	  success: function(result) {
	  	console.log(result);
	 	var res = JSON.parse(result);

	    if(res.deleted>0) {
	    	$("#annulSeance_error2").text("Félicitations la suppression a bien été effectuée");
	    	$("#myselectSeance option:selected").remove();
	    	setTimeout(function(){location.reload();},3000);
	    }
	    	
	    else {
	    	$("#annulSeance_error").text("Erreur, suppression non effectuée, veuillez recommencez!!");
	    	//location.reload();
	    }
	  },
	  error: function(err) {
	  	$("#annulSeance_error").text("Erreur serveur");
	  
	  }
	});
}
}
/*********retourne les abonnement du type choisi************/

function getAbonnement()
{


var typeAbonnement = $("#typeAbo").val();
if((typeAbonnement== 'A la séance') ||(typeAbonnement== 'Temporel')  ){

	$.ajax({
	  url: "ajax/abonnementsTypeChoisi_ajax.php",
	  method: "POST",
	  data: {
	    typeAbonnement: typeAbonnement
	   
	  },
	  success: function(result) {
	
	  	var res = JSON.parse(result);
	  

	  	// si aucune seance a cette date la 
	    if(jQuery.isEmptyObject(res)) {
	    	$("#aboDuType").empty();
	    	$("#abo_error").text("Pas d'abonnements correspondant au type choisi!");
	    	
	    	//location.reload();
	    }
	    	// des seances ont ete retournees
	    else {
	    	if((typeAbonnement== 'A la séance')){
	    		$("#nbseance").empty();
	  			$("#dureeAbonnement").empty();
	    		$("#dureeT").css("display", "none");
	    	
	    		$("#nbS").show();
	    		
	    	}
	    	else {
	    		 	
	    		$("#nbseance").empty();
	  			$("#dureeAbonnement").empty();
	    		$("#nbS").css("display", "none");
	  			$("#dureeT").show();
	  				

	    	}
	    		
	    		$("#aboDuType").empty();
	    		$("#aboDuType").append('<option> </option>')

	    	res.forEach(function(d){
	    		$("#aboDuType").append('<option>' +d.Libelle+'</option>')

	    	});
	    	
			//location.reload();
	    	}
	    	//e.empty();
	    	//location.reload();
	    
	  },
	  error: function(err) {
	  	$("#annulSeance_error").text("Erreur serveur");
	  
	  }

	});
}
else{
	$("#aboDuType").empty();
	$("#dureeAbonnement").empty();
	$("#nbseance").empty();
}
}




function getdetailsAbo()
{

var Abonnement = $("#aboDuType").val();
  var type = $("#typeAbo").val();
	
	$.ajax({
	  url: "ajax/detailAbonnement-ajax.php",
	  method: "POST",
	  data: {
	    Abonnement: Abonnement,
	    type: type
	   
	  },
	  success: function(result) {
	  	var res = JSON.parse(result);
	  	
	  	if (type=='A la séance') {
	  	$("#dureeT").css("display", "none");
	  	$("#nbS").show();
	  	$("#nbseance").empty();
	  	$("#nbseance").val(res.NbSeance);
	  	}
	  	else {
	  
	  	$("#nbS").css("display", "none");
	  	$("#dureeT").show();
	  	$("#dureeAbonnement").empty();
	  	$("#dureeAbonnement").val(res.duree);
	     }
	    	
	    $("#tarif").val(res.Tarif);
	  },
	  error: function(err) {
	  	$("#annulSeance_error").text("Erreur serveur");
	  
	  }

	});
}

function souscrire()
{

var idP = $("#idperson").val();
var dateS = $("#dateS").val();
var type = $("#typeAbo").val();
var Abonnement = $("#aboDuType").val();
var tarif = $("#tarif").val();
var nbS = $("#nbseance").val();
var duree = $("#dureeAbonnement").val();
if ((!idP || !dateS || !type || !Abonnement || !tarif) || (! nbS && !duree)) {
		$("#abo_error2").text("Veuillez remplir tous les champs");
	}
else{
	$.ajax({
	  url: "ajax/souscrireAbonnement_ajax.php",
	  method: "POST",
	  data: {
	  	idP: idP,
	  	dateS: dateS,
	    Abonnement: Abonnement,
	    type: type,
	    tarif: tarif,
	    nbS: nbS,
	    duree : duree

	   
	  },
	  success: function(result) {
	  	var res = JSON.parse(result);
	  	console.log(res);
	  	if (res.estSouscrit) {

	  		$("#abo_error2").empty();
	  		$("#abo_error").text("Souscription enregistrées!");
	  		$("#Buttonsouscription").css("display", "none");
	  		$("#printB").show();
	  		$("#printB").css({
	  			"margin-left":"15%",
	  			"margin-top": "-40px",
	  			"background": "#F87666",
	  			"border": "#F87666"
	  			});
	  		//setTimeout(function(){location.reload();},1000);
	  	}
	  	else{
	  		console.log('no');
	  		$("#abo_error").text("Souscription echouée!");
	  	}

	  

	  },
	  error: function(err) {
	  	$("#abo_error").text("Erreur serveur!");
	  
	  }
	});
	}
}
	

	function printContrat(){
	$('#headPrint').css("display", "none");
	$('#imprimer').css("display", "none");

	window.print();
	
}

/***********************************upadate Pwd**********************************************/
 function updatePassword (){
var idC = $("#idC").val();
var oldPwd = $("#mdpold").val();
var inputPwd = $("#mdp1").val();
  var newPwd = $("#mdp2").val();
   var newPwd1 = $("#mdp3").val();
	console.log(inputPwd);
	console.log(idC);
	$.ajax({
	  url: "ajax/updatePassword_ajax.php",
	  method: "POST",
	  data: {
	  	idC: idC,
	    oldPwd: oldPwd,
	    inputPwd:inputPwd,
	    newPwd: newPwd,
	    newPwd1: newPwd1
	   
	  },
	  success: function(result) {
	  	var res = JSON.parse(result);
	  	console.log(res.pwdUpdated);
	  	if (res.pwdUpdated == true && res.mdpEqual==true) {
	  	$("#mdp_error3").empty();
	  	$("#mdp_error").empty();
	  	$("#mdp_error1").text("Votre  mot de passe a bien été mis à jour");
	  	setTimeout(function(){location.reload();},3000);
	  	}
	  	else {
			  	if (res.pwdUpdated == true && res.mdpEqual==false) {
			  	$("#mdp_error1").empty();
			  	$("#mdp_error").empty();

			  	$("#mdp_error3").text(" le nouveau mot de passe ne correspond pas au mot de passe confirmé ");

			  	}
			  	else{
			  	if (res.pwdUpdated == false){
			  			$("#mdp_error1").empty();
			  			$("#mdp_error3").empty();
					  	$("#mdp_error").text(" Mot de passe actuel incorrect, veuillez recommencer!");
					  }
	  			}
	     }
	  },
	  error: function(err) {
	  	$("##mdp_error").text("Erreur serveur");
	  
	  }

	});
}

///********************************************************************************************/
function getSeances(dateDeb, dateFin, success){
//console.log(dateDeb, dateFin);
if(!dateDeb || !dateFin){
	alert('Veuillez remplir tous les champs');
}

else{
	//Etape 2: faire la requete ajax
	//console.log("ok4")
	$.ajax({
	  url: "ajax/events_ajax.php",
	  method: "GET",
	  data: {
	  	dateDeb: dateDeb / 1000,
	  	dateFin: dateFin / 1000
	  },
	  success: function(result) {
	  //	console.log(result);
	 	var res = JSON.parse(result);
	 	success(res)
	  },
	  error: function(err) {
	  	alert("Erreur serveur");
	  
	  }
	});
}
}



function getSeancesClient(dateDeb, dateFin, success){
//console.log(dateDeb, dateFin);
if(!dateDeb || !dateFin){
	alert('Veuillez remplir tous les champs');
}

else{
	//Etape 2: faire la requete ajax
	//console.log("ok4")
	$.ajax({
	  url: "ajax/eventsClient_ajax.php",
	  method: "GET",
	  data: {
	  	dateDeb: dateDeb / 1000,
	  	dateFin: dateFin / 1000
	  },
	  success: function(result) {
	  //	console.log(result);
	 	var res = JSON.parse(result);
	 	success(res)

	  },
	  error: function(err) {
	  	alert("Erreur serveur");
	  
	  }
	});
}
}


function getOtherSeancesClient(dateDeb, dateFin, success){
//console.log(dateDeb, dateFin);
if(!dateDeb || !dateFin){
	alert('Veuillez remplir tous les champs');
}

else{
	//Etape 2: faire la requete ajax
	//console.log("ok4")
	$.ajax({
	  url: "ajax/eventsOtherClient_ajax.php",
	  method: "GET",
	  data: {
	  	dateDeb: dateDeb / 1000,
	  	dateFin: dateFin / 1000
	  },
	  success: function(result) {
	  //	console.log(result);
	 	var res = JSON.parse(result);
	 	success(res)
	  },
	  error: function(err) {
	  	alert("Erreur serveur");
	  
	  }
	});
}
}

function addSeance(jourSeance,heureDeb, heureFin,nvJourSeance,nvHeureDeb,nvHeureFin, nbPlace,nomCoach,prenomCoach){



	// un des champs est vide 
	if(!jourSeance || !heureDeb || !heureFin || !nbPlace){
		alert('Veuillez remplir tous les champs');

	}

	else{
	//Etape 2: faire la requete ajax
	$.ajax({
	  url: "ajax/events_ajax.php",
	  method: "POST",
	  data: {
	  	jourSeance:jourSeance,
	  	heureDeb: heureDeb,
	    heureFin: heureFin,
	    nvJourSeance: nvJourSeance,
	    nvHeureDeb: nvHeureDeb,
	    nvHeureFin: nvHeureFin,
	    nbPlace: nbPlace,
	    nomCoach: nomCoach,
	    prenomCoach: prenomCoach
	  },
	  success: function(result) {
	  	console.log(result);
	 	var res = JSON.parse(result);

	    if(res.estInserer) {
	    	alert("Félicitations la séance a bien été effectuée");
	    
	    }
	    	
	    else {
	    	alert("Erreur, ajout non effectué, veuillez recommencez!!");
	    	//location.reload();
	    }
	  },
	  error: function(err) {
	  	alert("Erreur serveur");
	  
	  }
	});
}
}
function updateSeance(jourSeance,heureDeb, heureFin,nvJourSeance,nvHeureDeb,nvHeureFin,nbPlace,nomCoach,prenomCoach){



	// un des champs est vide 
	if(!jourSeance || !heureDeb || !heureFin || !nvJourSeance || !nvHeureDeb || !nvHeureFin){
		alert('Veuillez remplir tous les champs');

	}

	else{
	//Etape 2: faire la requete ajax
	$.ajax({
	  url: "ajax/events_ajax.php",
	  method: "POST",
	  data: {
	  	jourSeance:jourSeance,
	  	heureDeb: heureDeb,
	    heureFin: heureFin,
	    nvJourSeance:nvJourSeance,
	    nvHeureDeb: nvHeureDeb,
	    nvHeureFin: nvHeureFin,
	    nbPlace: nbPlace,
	    nomCoach: nomCoach,
	    prenomCoach: prenomCoach
	  },
	  success: function(result) {
	  	console.log(result);
	 	var res = JSON.parse(result);

	    if(res.isUpdated) {
	    	alert("Félicitations la séance a bien été modifiée");
	    	setTimeout(function(){location.reload();},3000);
	    
	    }
	    	
	    else {
	    	alert("Erreur, mise à jour non effectué, veuillez recommencez!!");
	    	//location.reload();
	    }
	  },
	  error: function(err) {
	  	alert("Erreur serveur");
	  
	  }
	});
}
}


function modifSeanceEvent(){
var jourSeance= $("#ancienJour").val();
var nvJourSeance = $( "#jourSeanceModifDropNv" ).val();
console.log(jourSeance);
console.log(nvJourSeance);
var heureDebAncien = $( "#ancienHeureD" ).val();

var heureDeb = $( "#heureSeanceDModifDropNv" ).val();
var heureFin = $( "#heureSeanceFModifDropNv" ).val();
var nbPlace = $( "#nbPlaceModifPlaceDrop" ).val();
console.log("non");
console.log(nbPlace);

	// un des champs est vide 
	if(!jourSeance || !nvJourSeance || !heureDebAncien || !heureDeb || !heureFin || !nbPlace){
		console.log("ok");
		$("#modifSeance_error3").text('Veuillez remplir tous les champs');

	}
	else{
		// verification des formats de date et heure 
			var dateVerif =/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/;
			var dateValid = dateVerif.test(nvJourSeance);
			var heureVerif =/^(2[0-3]|[01][0-9]):([0-5][0-9])$/;
			var heureValid1= heureVerif.test(heureDeb);
			var heureValid2= heureVerif.test(heureFin);

				if (!dateValid){
								$("#modifSeance_error3").text("Erreur, saisissez la date au format jj/mm/aaaa");
				}

				else {


					if (!heureValid1 || !heureValid2){

						$("#modifSeance_error3").text("Erreur, saisissez l'heure au format hh:mm");
					}


					else{
					//Etape 2: faire la requete ajax
					$.ajax({
					  url: "ajax/eventsUpdate_ajax.php",
					  method: "POST",
					  data: {
					  	jourSeance:jourSeance,
					    nvJourSeance:nvJourSeance,
					    heureDebAncien:heureDebAncien,
						heureDeb: heureDeb,
					    heureFin: heureFin,
					    nbPlace: nbPlace
					
					  },
					  success: function(result) {
					  	console.log(result);
					 	var res = JSON.parse(result);

					    if(res.isUpdated) {
					    	$("#modifSeance_error3").text("Félicitations la séance a bien été modifiée");
					    	setTimeout(function(){location.reload();},3000);
					    
					    }
					    	
					    else {
					    	$("#modifSeance_error3").text("Erreur, mise à jour non effectuée, veuillez recommencez!!");
					    	//location.reload();
					    }
					  },
					  error: function(err) {
					  	alert("Erreur serveur");
					  
					  }
					});
				}
		}
	}
}

function ajoutSeanceButton(){
	//Etape 1: recuperer des champs
	var jourSeance = $("#jourSeance").val();
	var heureSeanceD = $("#heureSeanceD").val();
	var heureSeanceF = $("#heureSeanceF").val();
	var nbPlace = $("#nbPlace").val();
	var myselectCoach= $( "#myselectCoach option:selected" ).text();
	// un des champs est vide 
	if(!jourSeance || !heureSeanceF || !heureSeanceD || !nbPlace || !myselectCoach){
		$("#ajoutSeance_error2").text("Veuillez remplir tous les champs");
	}

else{
	//Etape 2: faire la requete ajax

	$.ajax({
	  url: "ajax/ajoutSeance_ajax.php",
	  method: "POST",
	  data: {
	    jourSeance: jourSeance,
	    heureSeanceD: heureSeanceD,
	    heureSeanceF: heureSeanceF,
	    nbPlace: nbPlace,
	    myselectCoach : myselectCoach
	  },
	  success: function(result) {
	  	console.log('oui');
	  	
	  	var res = JSON.parse(result);
	  	console.log(res);
	    if(!res.estInserer) {
	    	$("#ajoutSeance_error2").text("Créneau indisponible, veuillez récommencer !");
	    	

	    }
	    	// l'insertion s'est bien passé
	    else {
	    	$("#ajoutSeance_error2").text("Félicitations, séance ajoutée");
	    	
	    	//location.reload();
	    }
	  },
	  error: function(err) {
	  	$("#ajoutSeance_error2").text("Erreur serveur");
	  
	  }
	});
}
}


function ajoutSeanceEvent(){
	//Etape 1: recuperer des champs
	var jourSeance = $("#jourSeanceD").val();
	var heureSeanceD = $("#heureSeanceC").val();
	var heureSeanceF = $("#heureSeanceFin").val();
	var nbPlace = $("#nbPlaces").val();
	var myselectCoach= $( "#myselectCoach1 option:selected" ).text();
	// un des champs est vide 
	if(!jourSeance || !heureSeanceF || !heureSeanceD || !nbPlace || !myselectCoach){
		$("#ajoutSeance_error").text("Veuillez remplir tous les champs");
	}

	var dateVerif =/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/;
	var dateValid = dateVerif.test(jourSeance);
	var heureVerif =/^(2[0-3]|[01][0-9]):([0-5][0-9])$/;
	var heureValid1= heureVerif.test(heureSeanceD);
	var heureValid2= heureVerif.test(heureSeanceF);
	if (!dateValid){
	$("#ajoutSeance_error").text("Erreur, saisissez la date au format jj/mm/aaaa");
}

else if(!heureValid1 || !heureValid2){

	$("#ajoutSeance_error").text("Erreur, saisissez l'heure au format hh:mm");
}


else{
	//Etape 2: faire la requete ajax

	$.ajax({
	  url: "ajax/events_ajax.php",
	  method: "POST",
	  data: {
	    jourSeance: jourSeance,
	    heureSeanceD: heureSeanceD,
	    heureSeanceF: heureSeanceF,
	    nbPlace: nbPlace,
	    myselectCoach : myselectCoach
	  },
	  success: function(result) {
	  	console.log('oui');
	  	
	  	var res = JSON.parse(result);
	  	console.log(res);
	    if(!res.estInserer) {
	    	$("#ajoutSeance_error").text("Créneau indisponible, veuillez récommencer !");
	    	

	    }
	    	// l'insertion s'est bien passé
	    else {
	    	$("#ajoutSeance_error").text("Félicitations, séance ajoutée");
	    		setTimeout(function(){location.reload();},3000);
	    	//location.reload();
	    }
	  },
	  error: function(err) {
	  	$("#ajoutSeance_error").text("Erreur serveur");
	  
	  }
	});
}
}

// suppression d'une seance par l'admin
function annulSeanceEvent(){

var jourSeance2= $("#jourSeanceSuppr").val();
var heureDeb = $( "#heurDSeanceSuppr" ).val();
var heureFin = $( "#heurFSeanceSuppr" ).val();
var x =confirm("êtes-vous sûr de vouloir supprimer cette séance ?\n Verifiez bien qu'aucune personne n'est inscrite à cette séance ");

if (x){
	//Etape 2: faire la requete ajax
	console.log("oui");
	$.ajax({
	  url: "ajax/annulSeanceEvent_ajax.php",
	  method: "POST",
	  data: {
	  	jourSeance2: jourSeance2,
	    heureDeb: heureDeb,
	     heureFin: heureFin
	  },
	  success: function(result) {
	  	console.log(result);
	 	var res = JSON.parse(result);
	 	console.log(res);
	    if(res.deleted>0) {
	    	$("#annulSeance_error3").text("Félicitations la suppression a bien été effectuée");
	    	setTimeout(function(){location.reload();},3000);
	    	
	    }
	    	
	    else {
	    	$("#annulSeance_error3").text("Erreur, suppression non effectuée, veuillez recommencez!!");
	    	//location.reload();
	    }
	  },
	  error: function(err) {
	  	$("#annulSeance_error3").text("Erreur serveur");
	  
	  }
	});
	}
}


function getOtherSeancesClient(dateDeb, dateFin, success){
//console.log(dateDeb, dateFin);
if(!dateDeb || !dateFin){
	alert('Veuillez remplir tous les champs');
}

else{
	//Etape 2: faire la requete ajax
	//console.log("ok4")
	$.ajax({
	  url: "ajax/eventsOtherClient_ajax.php",
	  method: "GET",
	  data: {
	  	dateDeb: dateDeb / 1000,
	  	dateFin: dateFin / 1000
	  },
	  success: function(result) {
	  //	console.log(result);
	 	var res = JSON.parse(result);
	 	success(res)
	  },
	  error: function(err) {
	  	alert("Erreur serveur");
	  
	  }
	});
}
}

function modifSeanceEvent(){
var jourSeance= $("#ancienJour").val();
var nvJourSeance = $( "#jourSeanceModifDropNv" ).val();
console.log(jourSeance);
console.log(nvJourSeance);
var heureDebAncien = $( "#ancienHeureD" ).val();

var heureDeb = $( "#heureSeanceDModifDropNv" ).val();
var heureFin = $( "#heureSeanceFModifDropNv" ).val();
var nbPlace = $( "#nbPlaceModifPlaceDrop" ).val();
console.log("non");
console.log(nbPlace);

	// un des champs est vide 
	if(!jourSeance || !nvJourSeance || !heureDebAncien || !heureDeb || !heureFin || !nbPlace){
		console.log("ok");
		$("#modifSeance_error3").text('Veuillez remplir tous les champs');

	}
	else{
		// verification des formats de date et heure 
			var dateVerif =/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/;
			var dateValid = dateVerif.test(nvJourSeance);
			var heureVerif =/^(2[0-3]|[01][0-9]):([0-5][0-9])$/;
			var heureValid1= heureVerif.test(heureDeb);
			var heureValid2= heureVerif.test(heureFin);

				if (!dateValid){
								$("#modifSeance_error3").text("Erreur, saisissez la date au format jj/mm/aaaa");
				}

				else {


					if (!heureValid1 || !heureValid2){

						$("#modifSeance_error3").text("Erreur, saisissez l'heure au format hh:mm");
					}


					else{
					//Etape 2: faire la requete ajax
					$.ajax({
					  url: "ajax/eventsUpdate_ajax.php",
					  method: "POST",
					  data: {
					  	jourSeance:jourSeance,
					    nvJourSeance:nvJourSeance,
					    heureDebAncien:heureDebAncien,
						heureDeb: heureDeb,
					    heureFin: heureFin,
					    nbPlace: nbPlace
					
					  },
					  success: function(result) {
					  	console.log(result);
					 	var res = JSON.parse(result);

					    if(res.isUpdated) {
					    	$("#modifSeance_error3").text("Félicitations la séance a bien été modifiée");
					    	setTimeout(function(){location.reload();},3000);
					    
					    }
					    	
					    else {
					    	$("#modifSeance_error3").text("Erreur, mise à jour non effectuée, veuillez recommencez!!");
					    	setTimeout(function(){location.reload();},3000);
					    }
					  },
					  error: function(err) {
					  	alert("Erreur serveur");
					  
					  }
					});
				}
		}
	}
}

/////////////////////////////////////////////////

// fonction js transformannt une date en string
function dateHeureToString(dateS){
	return (("0" + dateS.getHours()).substr(-2)+":" +("0" + dateS.getMinutes()).substr(-2));
	}


	function dateJourToString(dateS){
	return ( ("0" + dateS.getDate()).substr(-2)+"/"+("0" +(dateS.getMonth()+1)).substr(-2)+"/"+dateS.getFullYear() );
	}


$(document).ready(function() {


//console.log("ok2")
var endDate = new Date()
// rajoute 300 jours a partir du debut du mois 
endDate.setDate(endDate.getDate() + 300);
var endDate4 = new Date()
endDate4.setDate(endDate4.getDate() - 300);
/// partie administrateur 

function testAdmin(){
getSeances(endDate4, endDate, function(seances) {
	console.log("call getseance");
	//console.log(seances);
	$('#calendar').weekCalendar({
	  timeslotsPerHour: 6,
	  timeslotHeigh: 30,
	  hourLine: true,
	  use24Hour: true,
	  dateFormat: "d-M-Y",
	  useShortDayNames: false,
	  firstDayOfWeek : 1,
	  buttonText: { today: "Aujourd'hui" },
	  businessHours: {
	  	start: 8,
	  	end: 21,
	  	limitDisplay: true
	  },
	  data: {
	  	events: seances
	  },
	  height: function($calendar) {
	  	// console.log("ok");
	     return $(window).height();
	  },
	  eventRender : function(calEvent, $event) {
	    if (calEvent.end.getTime() < new Date().getTime()) {
	      $event.css('backgroundColor', '#aaa');
	      $event.find('.time').css({'backgroundColor': '#999', 'border':'1px solid #888'});
	    }
	  },

	  //creation nv evenement
	  eventNew: function(calEvent, $event) {

	    displayMessage('<strong>Added event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end + calEvent.title);
	    $("#jourSeanceD").val(dateJourToString(calEvent.start));
	     $("#heureSeanceC").val(dateHeureToString(calEvent.start));
	     $("#heureSeanceFin").val(dateHeureToString(calEvent.end));
	    showModal("#ajoutSeance-box2");
	  },
	  eventDrop: function(calEvent, $event) {
	    displayMessage('<strong>Moved Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
	  
	    $("#ancienJour").val(dateJourToString($event.start));
	    $("#ancienHeureD").val(dateHeureToString($event.start));
	      $("#jourSeanceModifDropNv").val(dateJourToString(calEvent.start));
	     $("#heureSeanceDModifDropNv").val(dateHeureToString(calEvent.start));
	     $("#heureSeanceFModifDropNv").val(dateHeureToString(calEvent.end));
	     $("#nbPlaceModifPlaceDrop").val(calEvent.place);
	    showModalModif("#modifSeance-box2");
	  },
	  eventResize: function(calEvent, $event) {
	    displayMessage('<strong>Resized Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
	    $("#ancienJour").val(dateJourToString($event.start));
	    $("#ancienHeureD").val(dateHeureToString($event.start));
	      $("#jourSeanceModifDropNv").val(dateJourToString(calEvent.start));
	     $("#heureSeanceDModifDropNv").val(dateHeureToString(calEvent.start));
	     $("#heureSeanceFModifDropNv").val(dateHeureToString(calEvent.end));
	     console.log($event);
	     $("#nbPlaceModifPlaceDrop").val(calEvent.place);
	    showModalModif("#modifSeance-box2"); //quand on redimensionne donc correspond a update
	  },

	  // pour supprimer un evenement
	  eventClick: function(calEvent, $event) {
	    displayMessage('<strong>Clicked Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
	    	       $("#jourSeanceSuppr").val(dateJourToString(calEvent.start));
	     $("#heurDSeanceSuppr").val(dateHeureToString(calEvent.start));
	     $("#heurFSeanceSuppr").val(dateHeureToString(calEvent.end));
	     showModalSuppri("#annulSeance-box2");
	  },
	  eventMouseover: function(calEvent, $event) {
	    displayMessage('<strong>Mouseover Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
	     
	  },
	  eventMouseout: function(calEvent, $event) {
	    displayMessage('<strong>Mouseout Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);

	  },
	  noEvents: function() {
	    displayMessage('There are no events for this week');
	  }
	});
});

function displayMessage(message) {
  $('#message').html(message).fadeIn();
}
}
//console.log("main");



var endDate2 = new Date()
// rajoute 300 jours a partir du debut du mois 
endDate2.setDate(endDate2.getDate() + 300);

var endDate1 = new Date()
endDate1.setDate(endDate1.getDate() - 300);
function testClient() {
	console.log("call testClient");

getOtherSeancesClient(endDate1, endDate2, function(OtherSeanceClient) {
	OtherSeanceClient.forEach(function(o) {
		o.other = true;
	})
	getSeancesClient(endDate1, endDate2, function(seancesClient) {
		console.log("seanceClients");
		console.log(seancesClient);

	  $('#calendar2').weekCalendar({
	    timeslotsPerHour: 6,
	    timeslotHeigh: 30,
	    hourLine: true,
	    use24Hour: true,
	    dateFormat: "d-M-Y",
	    useShortDayNames: false,
	    firstDayOfWeek : 1,
	    readonly: true,
	    buttonText: { today: "Aujourd'hui" },
	    businessHours: {
	      start: 8,
	      end: 21,
	      limitDisplay: true
	    },
	    data: {
	      events: seancesClient.concat(OtherSeanceClient)
	    },
	    height: function($calendar) {
	      // console.log("ok");
	       return $(window).height();
	    },
	    eventRender : function(calEvent, $event) {
	     /* if (calEvent.end.getTime() < new Date().getTime()) {*/
	     	console.log($event);
	     	if(calEvent.other) {
	     		$event.addClass("eventSubscribed")
	        	//$event.css('backgroundColor', '#999');
	      		//$event.find('.time').css({'backgroundColor': '#999', 'border':'1px solid #888'});
	     	}

	      /*}*/
	    },
	    eventAfterRender: function(calEvent, $event) {
	    	var labelButton = calEvent.other ? "S'inscrire" : "Se désinscrire"
	    	if(!calEvent.other) {
	    				$event.removeClass("eventNotSubscribed")
	    				$event.addClass("eventSubscribed")
	    				  
	    			}
	    			else {
	    				$event.addClass("eventNotSubscribed")
	    				$event.removeClass("eventSubscribed")
	    			}
	    	var div = $("<div></div>")
	    	var button = $("<input type=\"submit\"/>");
	    	button.addClass("calendar-subscribe-input")
	    	button.click(function() {

	    		toggleEvent(calEvent, function() {
	    			calEvent.other = !calEvent.other
	    			button.val(calEvent.other ? "S'inscrire" : "Se désinscrire");
	    			if(!calEvent.other) {
	    				$event.addClass("eventSubscribed")
	    				  
	    			}
	    			else {
	    			
	    				$event.removeClass("eventSubscribed")
	    			}
	    			setTimeout(function(){location.reload();},3000);
	    		})

	    	})
	    	button.attr({value: labelButton})
	    	div.append(button)
	    	$event.find(".wc-title").after(div);
	    },
	
	 
	  });
	});
});
}



testAdmin();
testClient();

//callback est appelé quand succés

function toggleEvent(event, callback) {
	//alert(event.other === true);
  // pour s'inscrire 
  console.log("...")
/// s il veut se desinscr
	if( event.other){
		console.log("..")
				 $("#jourSeanceD").val(dateJourToString(event.start));
	     $("#heureSeanceC").val(dateHeureToString(event.start));
	     $("#heureSeanceFin").val(dateHeureToString(event.end));
	      $("#nbPlaces").val(event.place);
				console.log("....")
		     	 showModal("#ajoutSeance-box4");

	    				var jourSeance2=dateJourToString(event.start);
	    				var heureDeb=dateHeureToString(event.start);
	    				var heureFin=dateHeureToString(event.end);
	    			console.log("test")
	    			$("#btnOui1").click(function() {
	    				console.log("oui callback");
	    				$.ajax({
								  url: "ajax/ajoutSeanceClient_ajax.php",
								  method: "POST",
								  data: {
								  	jourSeance2: jourSeance2,
								    heureDeb: heureDeb,
								     heureFin: heureFin
								  },
								  success: function(result) {
								  	console.log(result);
								 	var res = JSON.parse(result);
								 	console.log(res);
								      
								   
								    if(res.inserer ==-3) {
								    	$("#ajoutSeance_error").text("Séance déjà clôturée, veuillez recommencer ");
								    	//location.reload();
								    	
								    }
								    	
								    else {
								    	if(res.deleted==-2){

								    	$("#ajoutSeance_error").text("Creneau complet, veuillez en choisir un autre!!");
								    	//location.reload();
								    	}
								    	else{

								    		if(res.deleted==-1){

								    	$("#ajoutSeance_error").text("Votre abonnement est expiré, veuillez contacter M. Galindo");
								    	//location.reload();
								    	}
								    	else{
								    		$("#ajoutSeance_error").text("Votre réservation a bien été pris en compte");
								    		callback();
								    	}
								    		
								    	}
								    }

								  },
								  error: function(err) {
								  	$("#ajoutSeance_error").text("Erreur serveur");
								  
								  }
								  
								});
					return false

					});			

}

// pour annuler reservation 
	else
	{
		$("#jourSeanceSuppr").val(dateJourToString(event.start));
	    		$("#heurDSeanceSuppr").val(dateHeureToString(event.start));
		     	$("#heurFSeanceSuppr").val(dateHeureToString(event.end));
	     showModalSuppri("#annulSeance-box2");
	     var jourSeance2=dateJourToString(event.start);
	    				var heureDeb=dateHeureToString(event.start);
	    				var heureFin=dateHeureToString(event.end);
	    			console.log("test")
	   
	   				 $("#btnAnnulOui").click(function() {


	    				console.log("oui callback");
	    				$.ajax({
								  url: "ajax/annulSeanceClient_ajax.php",
								  method: "POST",
								  data: {
								  	jourSeance2: jourSeance2,
								    heureDeb: heureDeb,
								     heureFin: heureFin
								  },
								  success: function(result) {
								  	console.log(result);
								 	var res = JSON.parse(result);
								 	console.log(res);
								      
								   
								    if(res.deleted<0) {
								    	$("#annulSeance_error3").text("Impossible d'annuler cette réservation");
								    	 $("#annulSeance_err").text("NB: tout désistement doit être fait 10h avant le début de la séance ");
								    	//location.reload();
								    	
								    }
								    	
								    else {
								    	if(res.deleted==0){

								    	$("#annulSeance_error3").text("Erreur, suppression non effectuée, veuillez recommencez!!");
								    	//location.reload();
								    	}
								    	else{
								    		$("#annulSeance_error3").text("Votre annulation a bien été pris en compte");
								    		callback();
								    	}
								    }

								  },
								  error: function(err) {
								  	$("#ajoutSeance_error").text("Erreur serveur");
								  
								  }
								  
								});
					return false

					});			

	}


}

});

