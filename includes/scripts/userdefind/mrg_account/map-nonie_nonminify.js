function search() {
      var type;
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
            addResult(results[i], i);
          }
        }
      })
    }

	   function addResult(result, i) {
      var results = document.getElementById("results");
      var tr = document.createElement('tr');
      tr.style.backgroundColor = (i% 2 == 0 ? '#F0F0F0' : '#FFFFFF');
      tr.onclick = function() {
        google.maps.event.trigger(markers[i], 'click');
      };

      var iconTd = document.createElement('td');
      var nameTd = document.createElement('td');
      var icon = document.createElement('img');
      icon.src = result.icon;
      icon.setAttribute("class", "placeIcon");
      var name = document.createTextNode(result.name);
      iconTd.appendChild(icon);
      nameTd.appendChild(name);
      tr.appendChild(iconTd);
      tr.appendChild(nameTd);
      results.appendChild(tr);
    }

    function clearResults() {
      var results = document.getElementById("results");
      while (results.childNodes[0]) {
        results.removeChild(results.childNodes[0]);
      }
    }