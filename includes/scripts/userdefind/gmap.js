var map;
	var infoWindow;

      function initialize() {
        var myOptions = {
          zoom: 15,
          center: new google.maps.LatLng(12.841072, 79.706834),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

		
        var map = new google.maps.Map(document.getElementById('map_canvas'),
            myOptions); alert (map );
	var contentString = '<div id="content">Udhaya Mazal Thirumana Mandabam. <br />Kanchipuram.</div>';

var infowindow = new google.maps.InfoWindow({
    content: contentString
});

		var myLatlng = new google.maps.LatLng(12.841072, 79.706834);
	


	  var marker = new google.maps.Marker({
		  position: myLatlng,
		  map: map,
		  title:"Udhaya Mazal"
	  });
	 google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
});
	  
				
      }
	

      function loadScript() { 
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'http://maps.googleapis.com/maps/api/js?sensor=false&' +
            'callback=initialize()';
        document.body.appendChild(script);
      }

      window.onload = loadScript();
