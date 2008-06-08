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
			alert("Please provide a URL for your content.");
			return false;
		}
		if (url.value.search('/^http\:\/\//') != -1)
		{
			alert("The URL provided does not contain http://");
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
	typeFilter = type + 'Filter';
	var e = document.getElementById(typeFilter);

	for (i=0; i<gmarkers.length; i++)
  	{
  		if (gmarkersType[i] == type) {
			if (e.checked == true)
				{ gmarkers[i].show(); }
  			else {	gmarkers[i].hide(); }
  		}
  	}
}
  
function gMapStart() {
   if (GBrowserIsCompatible()) {
      // arrays to hold copies of the markers used by the side_bar
      // because the function closure trick doesnt work there
      var gmarkers = [];
      var gmarkersType = [];
      var i = 0;
      // A function to create the marker and set up the event window
      function createMarker(point,html,type) {
        var marker = new GMarker(point);
        GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });
        gmarkers[i] = marker;
        gmarkersType[i] = type;
        i++;
        return marker;
      }
      // This function picks up the click and opens the corresponding info window
      function myclick(i) {
        GEvent.trigger(gmarkers[i], "click");
      }
      // create the map
      var map = new GMap2(document.getElementById("map"));
      map.addControl(new GSmallMapControl());
      map.setCenter(new GLatLng(38.345739 ,-75.765338), 1);  //Center on Eclipse Foundation HQ
	  //map.setMapType(G_HYBRID_MAP);
      // Read the data from example.xml
      var request = GXmlHttp.create();
      request.open("GET", "mapData.php", true);
      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          var xmlDoc = GXml.parse(request.responseText);
          // obtain the array of markers and loop through it
          var markers = xmlDoc.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < markers.length; i++) {
            // obtain the attribues of each marker
            var lat = parseFloat(markers[i].getAttribute("lat"));
            var lng = parseFloat(markers[i].getAttribute("lng"));
            var point = new GLatLng(lat,lng);
            var author = markers[i].getAttribute("author");
            var location = markers[i].getAttribute("location");
            var url = markers[i].getAttribute("url");
            var type = markers[i].getAttribute("type");
            var typeText = type;    
            var title = markers[i].getAttribute('title');
			if (url == "http://")
			{
				url = "";
			}
           	if ((title.length == 0) && (url.length > 0)) // No title supplied so just display URL
           	{
           		typeText = type + ' - <a href="' + url + '" target=_"blank">' + url.substring(7) + '</a>';    		
			}
			else if ((title.length > 0) && (url.length == 0)) // No URL supplied so just display the title;
			{
				typeText = type + ' - ' + title;
			}
			else if ((title.length > 0) && (url.length > 0)) // We have both lets display both.
			{			            
            	typeText = type + ' - <a href="' + url + '" target=_"blank">' + title + '</a>';    
            }
            else 
            {
            	typeText = type;
            }
            
            var html = '<div class="infoWindow"><b>' + author + '</b><br/>' + location + '<br/>' + typeText + '<br/><br/>' + markers[i].textContent + '</div>';
            // create the marker
            var marker = createMarker(point, html,type );
            map.addOverlay(marker);
          }
          // Markers have all been added, lets check to see if they should be visible

          checkVisibility('Blog');
          checkVisibility('Message');
          checkVisibility('Recording');
        }
      }
      request.send(null);
    }
    else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }	
}
}
  
			