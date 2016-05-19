
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
	var x =confirm("êtes-vous sûr de vouloir supprimer cet abonnement?");
	
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
