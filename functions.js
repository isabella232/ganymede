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

function setAddress(address, html) {
	  geocoder.getLatLng(
	    address,
	    function(point) {
	    	if (!point) {
	        //alert(address + " not found");
	      	} else {
		        //map.setCenter(point,6);
		        var marker = new GMarker(point);
		        var lat = document.getElementById('lat');
		        var lng = document.getElementById('lng');
		        lat.value = point.y;
		        lng.value = point.x;
		        //map.clearOverlays();
		        //map.addOverlay(marker);
		        //marker.openInfoWindowHtml(html);
	      	}
			validateForm();
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
		setAddress(address, html);
	}
			