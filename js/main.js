
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

	  //	alert(res.a.b); //c
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