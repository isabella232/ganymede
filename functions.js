function validateForm() {
	var retVal = true;	
	var n = document.getElementById("name");
	var c = document.getElementById("city");
	var co = document.getElementById("country");
	var con = document.getElementById("content");
	var lat = document.getElementById('lat');
	var lng = document.getElementById('lng');
 	var url = document.getElementById('url');
 	var type = document.getElementsByName('type');
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
	if (con.value.length > 256)
	{
		con.value = con.value.substring(0, 255);
	}
	if (type[1].checked == true)
	{
		if (con.value.length == 0)
		{
			alert("Please specify a message.");
			return false;
		}
	}
	if (lat.value == 0 && lng.value == 0)
	{
		alert("Correct Lattitude and Longitude for your location could not be calculated. Please check your location information and resubmit.");
		return false;
	}
	if (type[1].checked == false)
	{
		if (url.value.length == 0)
		{ 
			alert("Please provide a url for your content.");
			return false;
		}
	}
	document.spotForm.submit();
	return retVal;
}


function checkReq(element) {
	var messageReq = document.getElementById('messageReq');
	var urlReq = document.getElementById('urlReq');
	if (element == '')
	{
		//if blank then were calling to resync the form.
		var b = document.getElementById('Blog');
		var m = document.getElementById('Message');
		var r = document.getElementById('Recording');
		if (b.checked == true)
		{ element = 'Blog';}
		if (m.checked == true)
		{ element = 'Message';}
		if (r.checked == true)
		{ element = 'Recording';}
	}
	if (element == 'Blog')
	{
		messageReq.className = "required invisible";
		urlReq.className = "required visible";	
	}
	if(element == 'Message')
	{
		messageReq.className = "required visible";
		urlReq.className = "required invisible";
	}	
	if(element == 'Recording')
	{
		messageReq.className = "required invisible";
		urlReq.className = "required visible";	
	}
}

function setAddress(address) {
	  var lat = document.getElementById('lat');
	  var lng = document.getElementById('lng');	
	  lat.value = 0;
	  lng.value = 0;
	  var geocoder = new GClientGeocoder();
	  geocoder.getLocations( address,
	  	 function(result) {
	  	 	if (result.Status.code == 200)
	  	 	{
		        lat.value = result.Placemark[0].Point.coordinates[1];
		        lng.value = result.Placemark[0].Point.coordinates[0];
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
		var address = c.value + ', ' + s.value + ', ' + co.value;
		setAddress(address);
	}
	
function toggleType(type)
  {
  	for (i=0; i<gmarkers.length; i++)
  	{
  		if (gmarkersType[i] == type)
  			if (gmarkers[i].isHidden())
  			{
  				gmarkers[i].show();
  			}
  			else {
  				gmarkers[i].hide();
  			}
  	}
  }
  
function checkVisibility(type)
{
	var e = document.getElementById(type);

	for (i=0; i<gmarkers.length; i++)
  	{
  		if (gmarkersType[i] == type) {
			if (e.checked == true)
				{ gmarkers[i].show(); }
  			else {	gmarkers[i].hide(); }
  		}
  	}
}
  
  
			