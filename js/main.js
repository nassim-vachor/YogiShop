
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
	    	
	    	location.reload();
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
	    	$("#modifSeance_error").text("Pas de séance(s) disponible(s) à cette date, choisissez une autre date!");
	    	
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

	// un des champs est vide 
	if(!jourSeanceModif || !myselectSeanceModif ){
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

	    if(res.deleted>0) {
	    	$("#modifSeance_error2").text("Félicitations la suppression a bien été effectuée");
	    	$("#myselectSeanceModif option:selected").remove();
	    }
	    	
	    else {
	    	$("#modifSeance_error").text("Erreur, suppression non effectuée, veuillez recommencez!!");
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

	// un des champs est vide 
	if(!jourSeanceModif || !myselectSeanceModif ){
		$("#modifSeance_error").text("Veuillez remplir les 2 premiers champs");

	}

	else{
	//Etape 2: faire la requete ajax
	console.log("oui");
	console.log(myselectSeanceModif);
	$.ajax({
	  url: "ajax/modifSeance_ajax.php",
	  method: "POST",
	  data: {
	  	jourSeanceModif: jourSeanceModif,
	    myselectSeanceModif: myselectSeanceModif
	  },
	  success: function(result) {
	  	console.log(result);
	 	var res = JSON.parse(result);

	    if(res.deleted>0) {
	    	$("#modifSeance_error2").text("Félicitations la suppression a bien été effectuée");
	    	$("#myselectSeanceModif option:selected").remove();
	    }
	    	
	    else {
	    	$("#modifSeance_error").text("Erreur, suppression non effectuée, veuillez recommencez!!");
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
	  		console.log('yes');
	  		$("#abo_error2").empty();
	  		$("#abo_error").text("Souscription enregistrées!");
	  		setTimeout(function(){location.reload();},1000);
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


///********************************************************************************************/
function getSeances(dateDeb, dateFin, success){
console.log(dateDeb, dateFin);
if(!dateDeb || !dateFin){
	alert('Veuillez remplir tous les champs');
}

else{
	//Etape 2: faire la requete ajax
	console.log("ok4")
	$.ajax({
	  url: "ajax/events_ajax.php",
	  method: "GET",
	  data: {
	  	dateDeb: dateDeb / 1000,
	  	dateFin: dateFin / 1000
	  },
	  success: function(result) {
	  	console.log(result);
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

$(document).ready(function() {
	var year = new Date().getFullYear();
var month = new Date().getMonth();
var day = new Date().getDate();

var eventData = {
events : [
  {'id':1, 'start': new Date(year, month, day, 12), 'end': new Date(year, month, day, 13, 35),'title':'Lunch with Mike'},
  {'id':2, 'start': new Date(year, month, day, 14), 'end': new Date(year, month, day, 14, 45),'title':'Dev Meeting'},
  {'id':3, 'start': new Date(year, month, day + 1, 18), 'end': new Date(year, month, day + 1, 18, 45),'title':'Hair cut'},
  {'id':4, 'start': new Date(year, month, day - 1, 8), 'end': new Date(year, month, day - 1, 9, 30),'title':'Team breakfast'},
  {'id':5, 'start': new Date(year, month, day + 1, 14), 'end': new Date(year, month, day + 1, 15),'title':'Product showcase'}
]
};
console.log("ok2")
var endDate = new Date()
// rajoute 300 jours au debut du mois 
endDate.setDate(endDate.getDate() + 300);

getSeances(new Date(), endDate, function(seances) {
	console.log(seances);
	$('#calendar').weekCalendar({
	  timeslotsPerHour: 6,
	  timeslotHeigh: 30,
	  hourLine: true,
	  use24Hour: true,
	  dateFormat: "d-M-Y",
	  useShortDayNames: false,
	  buttonText: { today: "Aujourd'hui" },
	  businessHours: {
	  	start: 8,
	  	end: 20,
	  	limitDisplay: true
	  },
	  data: {
	  	events: seances
	  },
	  height: function($calendar) {
	  	 console.log("ok");
	     return $(window).height();
	  },
	  eventRender : function(calEvent, $event) {
	    if (calEvent.end.getTime() < new Date().getTime()) {
	      $event.css('backgroundColor', '#aaa');
	      $event.find('.time').css({'backgroundColor': '#999', 'border':'1px solid #888'});
	    }
	  },
	  eventNew: function(calEvent, $event) {

	    displayMessage('<strong>Added event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end + calEvent.title);
	    $("#jourSeanceD").val( calEvent.end.getDate()+"/"+ calEvent.end.getMonth()+"/"+calEvent.end.getFullYear() );
	     $("#heureSeanceC").val(calEvent.start.getHours()+":" +calEvent.start.getMinutes());
	      $("#heureSeanceFin").val(calEvent.end.getHours()+":" +calEvent.end.getMinutes());
	  //  console.log(calEvent.start.format('h:mm:ss A'));
	    showModal("#ajoutSeance-box");
	  },
	  eventDrop: function(calEvent, $event) {
	    displayMessage('<strong>Moved Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
	  },
	  eventResize: function(calEvent, $event) {
	    displayMessage('<strong>Resized Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
	  },
	  eventClick: function(calEvent, $event) {
	    displayMessage('<strong>Clicked Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
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
});
