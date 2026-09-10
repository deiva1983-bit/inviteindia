 function search() {
	$('#results').html("Loading...");
      var type, finres='';
      for (var i = 0; i < document.controls.type.length; i++) {
        if (document.controls.type[i].checked) {
          type = document.controls.type[i].value;
        }
      }

      autocomplete.setBounds(map.getBounds());

      var search = {
        bounds: map.getBounds()
      };

      if (type != 'establishment') {
        search.types = [ type ];
      }

	places.search(search, function(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
          clearResults();
          clearMarkers();
          for (var i = 0; i < results.length; i++) {
            markers[i] = new google.maps.Marker({
              position: results[i].geometry.location,
              animation: google.maps.Animation.DROP
            });
            google.maps.event.addListener(markers[i], 'click', getDetails(results[i], i));
            setTimeout(dropMarker(i), i * 100);
			var tres=addResult(results[i], i);
            finres = finres + tres; 
          }
        }
      })
		if (typeof finres === "undefined") {} else {
	  	$('#results').html("<table>"+finres+"</table>");	 }

    }
	function addResult(result, i) {
      var bgcolor = (i% 2 == 0 ? '#F0F0F0' : '#FFFFFF');
	  var iconTd = "<td><img src='"+result.icon+"' class=placeIcon></td>";
	  var nameTd = "<td>"+result.name+"</td>";
	  totres = '<tr bgcolor='+bgcolor+' onclick =  openPop('+i+')>'+iconTd+ nameTd+"</tr>";
	  return totres; 
    }

	function openPop(i)
	{
	google.maps.event.trigger(markers[i], 'click');
	}

	 

    function clearResults() {
	  $('#results').html("");
    }