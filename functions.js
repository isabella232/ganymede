function validateForm() {
	var retVal = true;	
	var n = document.getElementById("name");
	var c = document.getElementById("city");
	var co = document.getElementById("country");
	var con = document.getElementById("content");
	var lat = document.getElementById('lat');
	var lng = document.getElementById('lng');
 	var url = document.getElementById('url');
 	var type = document.getElementById('type');
 	if (n.value.length == 0)
 	{
 		alert("Please specify your name.");
		return false;
	}
	if (c.value.length == 0)
	{
		alert("Please specify a city name.");
		return false;
	}
	if (co.value.length == 0)
	{
		alert("Please specify a country name");
		return false;
	}
	if (con.value.length == 0)
	{
		alert("Please specify a message.");
		return false;
	}
	if (lat.value == 0 && lng.value == 0)
	{
		alert("Correct Lattitude and Longitude for your location could not be calculated. Please check your location information and resubmit.");
		return false;
	}
	if (type.value != "message")
	{
		if (url.value.length == 0)
		alert("Please provide a url for your content.");
		return false;
	}	
	document.spotForm.submit();
	return retVal;
}

function showProjects() {
	var e = document.getElementById('selectProjects');
	var f = document.getElementById('projects');
	e.className = "visible";
	f.className = "invisible";
}

function showURL(element) {
	var e = document.getElementById('urlDiv');
	var f = document.getElementById('urlDiv2');
	if (element.value != "message")
	{
		e.className = "visible";
		f.className = "visible";
	}
	else 
	{
		e.className = "invisible";
		f.className = "invisible";
	}
	
}

function setAddress(address) {
	  var geocoder = new GClientGeocoder();
	  
	        // ====== Array for decoding the failure codes ======
      var reasons=[];
      reasons[G_GEO_SUCCESS]            = "Success";
      reasons[G_GEO_MISSING_ADDRESS]    = "Missing Address: The address was either missing or had no value.";
      reasons[G_GEO_UNKNOWN_ADDRESS]    = "Unknown Address:  No corresponding geographic location could be found for the specified address.";
      reasons[G_GEO_UNAVAILABLE_ADDRESS]= "Unavailable Address:  The geocode for the given address cannot be returned due to legal or contractual reasons.";
      reasons[G_GEO_BAD_KEY]            = "Bad Key: The API key is either invalid or does not match the domain for which it was given";
      reasons[G_GEO_TOO_MANY_QUERIES]   = "Too Many Queries: The daily geocoding quota for this site has been exceeded.";
      reasons[G_GEO_SERVER_ERROR]       = "Server error: The geocoding request could not be successfully processed.";
      
	  geocoder.getLocations( address,
	  	 function(result) {
	  	 	alert("Google Return:" + result.Status.code);
//	    	if (!point) {
//	        //alert(address + " not found");
//	      	} else {
//		        //map.setCenter(point,6);
//		        var marker = new GMarker(point);
//		        var lat = document.getElementById('lat');
//		        var lng = document.getElementById('lng');
//		        lat.value = point.y;
//		        lng.value = point.x;
//	      	}
		//	validateForm();
	    }
	  );
	}
	
	function fetchLocation() {
		var c = document.getElementById('city');
		var s = document.getElementById('state');
		var co = document.getElementById('country');
		var name = document.getElementById('name');
		var content = document.getElementById('content');
   		var html = '<b>' + name.value + '</b><br/>' + content.value;
		var address = c.value + ' ' + s.value + ' ' + co.value;
		setAddress(address);
	}
			