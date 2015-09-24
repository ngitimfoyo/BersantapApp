window.console || (console = { log: function () { }, error: function () { } });

var TR = {	
	//map
	Map: {},
	
	// info window
	Infowindow: {},
	
	// property map
	MapOptions: {zoom: 15, streetViewControl: false, zoomControl: false, draggableCursor: 'pointer'},
	
	// markers
	Markers: [],
	UserMarker: [],
	
	// strings
	Constant: { 
		locationStr: "Lokasi mu!",
		countryRestrict: {"componentRestrictions" : {'country': 'ID'}},
		marker_blue: "../images/pin_blue.png",
		marker_green: "../images/pin_green.png",
		marker_orange: "../images/pin_orange.png",
		marker_purple: "../images/pin_purple.png",
		marker_red: "../images/pin_red.png",
		marker_user: "../images/pin_user.png",
		marker_manage_blue : "../../images/pin_blue.png",
		search_distance: 3, // in KM
		places_amount: 5
	},
	
	// user location
	User: {lat: '', lon: ''},		
};

// initial TR script
TR.Init = function() {
	var self = this;
	
	// attach google listener on Load
	self.LoadMap();
};

// load map
TR.LoadMap = function() {
	var self = this;
	
	// initialize map	
	self.Map = new google.maps.Map(document.getElementById('kotak-peta'), self.MapOptions);	

	// get User location
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);			
		  
			self.Infowindow = new google.maps.InfoWindow({
				map: self.Map,
				position: pos,
				content: self.Constant['locationStr']				
			});
			
			self.Map.setCenter(pos);
			self.Map.setZoom(self.MapOptions.zoom);
			self.User.lat = position.coords.latitude;
			self.User.lon = position.coords.longitude;
		}, function() {
		  handleNoGeolocation(true);
		});
	} else {
		// Browser doesn't support Geolocation
		handleNoGeolocation(false);
	}
	
	// handle for Error
	handleNoGeolocation = function(errorFlag) {
	  if (errorFlag) {
		var content = 'Error: The Geolocation service failed.';
	  } else {
		var content = 'Error: Your browser doesn\'t support geolocation.';
	  }

	  var options = {
		map: self.Map,
		position: new google.maps.LatLng(60, 105),
		content: content
	  };

	  self.Infowindow = new google.maps.InfoWindow(options);
	  self.Map.setCenter(options.position);
	};

	// initialize autocomplete textbox
	self.AutoComplete();	
};

// configure autocomplete textbox
TR.AutoComplete = function() {
	var self = this;
	
	// if path /manage use different autocomplete method
	if ($("#text-cari").parents(".manage").length){
		self.MapManage();
		return;
	}
		
	
	// autocomple textbox
	var input = document.getElementById('text-cari');
	var autocomplete = new google.maps.places.Autocomplete(input, self.Constant.countryRestrict);
	autocomplete.bindTo('bounds', self.Map);

	// place changed
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		// close infowindow
		self.Infowindow.close();
	
		// get location from autocomplete suggestion
		var place = autocomplete.getPlace();
					
		// place not found
		if ( !place.geometry.location ) {
			return;			
		}
		
		// configure map
		self.Map.setCenter(place.geometry.location);	
		self.Map.setOptions(self.MapOptions);
		
		// Save location found
		self.ClearMarkers(self.UserMarker);
		var marker = new google.maps.Marker({
			  map: self.Map,
			  position: place.geometry.location,
			  animation: google.maps.Animation.BOUNCE,
			  icon: self.Constant.marker_user			  
			});
		self.UserMarker.push(marker);
						
		// get near places
		self.CallAjax.getPlaces(place.geometry.location.k, place.geometry.location.D);		
	});
};

// call ajax request
TR.CallAjax = {
	getPlaces: function(lat, lon){
		var data = {lat : lat, 
					lon : lon, 
					dist : TR.Constant.search_distance, 
					amt : TR.Constant.places_amount
					};
		
		$.post('/place', 
				data,
				function(result){
					showPlaces(result);
				}
		);
		
		showPlaces = function(d){
			if (d.length){
				TR.SaveMarkers(d);
			}
		};
	}
};

// save markers to global variable
TR.SaveMarkers = function(places){
	var self = TR;	
	
	// clear markers from Map
	TR.ClearMarkers(self.Markers);
    
    // set marker to map
    $.each(places, function(key, value){
    	var loc = new google.maps.LatLng(value.latitude, value.longitude);
		self.SetMarker(loc, value.name);
	});
};

// clear markers global variable
TR.ClearMarkers = function(items){
	//var self = TR;	
	
	// Remove old markers
    for (var m = 0; m < items.length; m++) {
        items[m].setMap(null);
    }
    items = [];
};

// set marker icon to map
TR.SetMarker = function(loc, content){
	var self = TR;	
  
	// add marker into map
	var marker = new google.maps.Marker({
			  map: self.Map,
			  position: loc,
			  animation: google.maps.Animation.DROP,
			  icon: self.Constant.marker_blue
			});
	
	// save marker into global variable
	self.Markers.push(marker);
	
	// show tooltip
	google.maps.event.addListener(marker, 'click', function () {
        self.LoadInfoMap(marker, content);        
    });
};

// load info window on map
TR.LoadInfoMap = function(marker, content){
	var self = TR;
	
	// close and clear content
	self.Infowindow.close()
	self.Infowindow.setContent("");
	
	// set new content and open infowindow
	self.Infowindow.setContent(content);
	self.Infowindow.open(self.Map, marker);
};

// configure auto complete for map in manage form
TR.MapManage = function(){
	var self = this;
	
	// autocomple textbox
	var input = $(".manage.map #text-cari").get(0);
	var autocomplete = new google.maps.places.Autocomplete(input, self.Constant.countryRestrict);
	autocomplete.bindTo('bounds', self.Map);

	// place changed
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		// close infowindow
		self.Infowindow.close();
	
		// get location from autocomplete suggestion
		var place = autocomplete.getPlace();
					
		// place not found
		if ( !place.geometry.location ) {
			return;			
		}
		
		// configure map
		self.Map.setCenter(place.geometry.location);	
		self.Map.setOptions(self.MapOptions);		
		
		// clear markers from Map
		self.ClearMarkers(self.Markers);
		
		// show location and put marker
		// add marker into map
		var marker = new google.maps.Marker({
				  map: self.Map,
				  position: place.geometry.location,
				  animation: google.maps.Animation.DROP,
				  icon: self.Constant.marker_manage_blue
				});
		
		// save marker into global variable
		self.Markers.push(marker);
	});
	
	//add left click event handler
    google.maps.event.addListener(self.Map, 'click', function (event) {        
        $("form input#latitude").val(event.latLng.k);
        $("form input#longitude").val(event.latLng.D);
    });
};

// initial scripts
$(document).ready(function(){
	// setup X-CSRF token
	$.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
	
	// initialize scripts
	TR.Init();
});
