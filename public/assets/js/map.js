var mapa = L.map('mapid').setView([43.326353,-1.971578], 14);

	var baselayer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets',
	}).addTo(mapa);

var toplayer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets-satellite',
	});

	var layers = {
		'Basico': baselayer,
		'Satelite': toplayer
	};

	L.control.layers(layers).addTo(mapa);

	var searchControl = L.esri.Geocoding.geosearch({
  	useMapBounds:false,																			//quitar filtración de mapa
  	providers: [ L.esri.Geocoding.arcgisOnlineProvider() ] //de donde pilla la data
	}).addTo(mapa);

	 // create an empty layer group to store the results and add it to the map
	 var results = L.layerGroup().addTo(mapa);

	 // listen for the results event and add every result to the map
	 /*searchControl.on("results", function(data) {
			 results.clearLayers();
			 for (var i = data.results.length - 1; i >= 0; i--) {
					 results.addLayer(L.marker(data.results[i].latlng));
			 }
	 });*/

	var cocheIcon = L.icon({
	    iconUrl: '/assets/images/car-marker.png',

	    iconSize:     [95, 85], // size of the icon
	    shadowSize:   [50, 64], // size of the shadow
		iconAnchor:   [12, 35], // point of the icon which will correspond to marker's location
	    shadowAnchor: [4, 62],  // the same for the shadow
	    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
	});
	var marker=L.marker([43.326353,-1.971578],{icon:cocheIcon}).addTo(mapa);