 		var myCenter=new google.maps.LatLng(43.6612318,3.93681289999995); /* adresse correspondant a celui de Yogishop*/

		function initialize()
		{
		var mapProp = {
		  center:myCenter,
		  zoom:15,
		  mapTypeId:google.maps.MapTypeId.ROADMAP /* type de map a ajouter ici en mode 2D*/
		  };
		  /* creation d'un objet map avec id=googleMap*/
		  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);


		var marker=new google.maps.Marker({
		  position:myCenter,
		  });

		marker.setMap(map);

		/* text du marker */
		var infowindow = new google.maps.InfoWindow({
		  content:"Yogishop" });

		infowindow.open(map,marker);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
