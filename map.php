<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();	   # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# index.php
	#
	# Author: 	 	Nathan Gervais
	# Date:			2008-04-21
	#
	# Description: Ganymede Landing Page
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Ganymede Release Train";
	$pageKeywords	= "eclipse ganymede, ganymede, ganymede release train";
	$pageAuthor		= "Eclipse Foundation, Inc.";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank)
	# $Nav->addCustomNav("My Link", "mypage.php", "_self");
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank");

	# End: page-specific settings
	#
	
	# Place your html content in a file called content/en_pagename.php

	ob_start();
	?>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA85Ct-u89MRBL6KQDW1oYFRRVZIdxFKFwDr3XyDwet7lo3BxWzRQ-OiA6LG0_IUfBnGsh0fZU1lolWA"
      type="text/javascript"></script>
  
    <body onunload="GUnload()">
  	 <div id="midcolumn">
  	   <h1>Ganymede Spotting</h1>
	  	<table width="100%">
  			<tr>
  	  			<td>
  	  			  <div id="map" style="width:550px; height: 400px"></div>
  	  			</td>
  	  			<td valign="top">
  	  				<div id="filters">
  	  					<input type="checkbox" name="media" checked onclick="toggleType('video')"/>Video<br/>
  	  					<input type="checkbox" name="podcast" checked onclick="toggleType('podcast')"/>Podcast<br/>
  	  					<input type="checkbox" name="image" checked onclick="toggleType('image')"/>Image<br/>
  	  					<input type="checkbox" name="blog" checked onclick="toggleType('blog')"/>Blog<br/>
  	  					<input type="checkbox" name="text" checked onclick="toggleType('text')"/>Text<br/>
  	  				</div>
  	  			</td>
  	  		</tr>
  	  	</table>
  	 </div>
  	 <div id="rightcolumn">
  	 	<div class="sideitem">
  	 		<h6>Ganymeded Spotting</h6>
  	 		<ul><li><a href="form.php">Add a Marker</a></li></ul>
  	 	</div>
  	 </div>
 <script type="text/javascript">
    //<![CDATA[
    if (GBrowserIsCompatible()) {
      // this variable will collect the html which will eventualkly be placed in the side_bar
      var list_html = "";
    
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

      // This function picks up the click and opens the corresponding info window
      function myclick(i) {
        GEvent.trigger(gmarkers[i], "click");
      }


      // create the map
      var map = new GMap2(document.getElementById("map"));
      map.addControl(new GSmallMapControl());
      map.setCenter(new GLatLng( 37.345739 ,-75.765338), 1);  //Center on Eclipse Foundation HQ


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
            var html = '<div class="infoWindow"><b>' + author + '</b><br/>' + markers[i].textContent + '</div>';
            var label = markers[i].getAttribute("label");
            var type = markers[i].getAttribute("type");
            // create the marker
            var marker = createMarker(point, html, type);
            map.addOverlay(marker);
          }
        }
      }
      request.send(null);
    }

    else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }

    //]]>
    </script>  	  
  </body>
	<?
	$html = ob_get_clean();
	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>