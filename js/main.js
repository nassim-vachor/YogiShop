
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
	  url: "login_ajax.php",
	  method: "POST",
	  data: {
	    username: username,
	    password: password
	  },
	  success: function(result) {
	  	var res = JSON.parse(result);

	  //	alert(res.a.b); //
	    //Creation du cookie
	    // resultat requete nul
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
	  url: "deleteAbonnement_ajax.php",
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