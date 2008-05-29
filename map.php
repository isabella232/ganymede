<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu(); $theme = "Phoenix";	   # All on the same line to unclutter the user's desktop'

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
	$pageTitle 		= "Ganymede Around the World";
	$pageKeywords	= "eclipse ganymede, ganymede, ganymede around the world";
	$pageAuthor		= "Nathan Gervais";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank)
	# $Nav->addCustomNav("My Link", "mypage.php", "_self");
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank");

	# End: page-specific settings
	#
	
	# Place your html content in a file called content/en_pagename.php
	include ($_SERVER['DOCUMENT_ROOT'] . '/eclipse.org-common/system/smartconnection.class.php');
	$dbc = new DBConnection();
	$dbh = $dbc->connect();
	
	function getTypeCount($_type) {
		$sql = "SELECT count(*) as count from ganymede_content where type='$_type'";
		$result = mysql_query($sql);
		$retVal = mysql_fetch_array($result);
		return $retVal['count'];
	}
	
	ob_start();
	?>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<script type="text/javascript" src="functions.js"></script>
	<script language="JavaScript" src="http://j.maxmind.com/app/geoip.js"></script>
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA85Ct-u89MRBL6KQDW1oYFRRVZIdxFKFwDr3XyDwet7lo3BxWzRQ-OiA6LG0_IUfBnGsh0fZU1lolWA"
      type="text/javascript"></script>
  
    <body onunload="GUnload()">
  	 <div id="midcolumn">

  	   <div class="mapDiv">
 		<div class="dialog">
 		<div class="dialogContent">
  			<div class="t"></div>
  			<!-- Your content goes here -->
		  	<table class="dialogTable" cellspacing=0 cellpadding=0>
	  			<tr>
	  	  			<td class="left">
	  	  			  <h2><u>Ganymede Around the World</u></h2>
	  	  			</td>
	  	  			<td class="right">
	  	  			  
	  	  			</td>
	  	  		</tr>
				<tr>
					<td colspan="2" class="contestText">We want to hear how you and the rest of the Eclipse community are using the Eclipse projects being released as part of <a href="/ganymede/">Ganymede</a>.  All submissions will be included in our Around the World map.  Video, podcast and blog reviews will receive an Eclipse shirt (see <a href="./aroundtheworld.php">full contest details</a>) and messages and images will be eligible to win Eclipse wear in a random draw.  Anyone is welcome to participate and all languages are welcome.  Contest closes July 31, 2008.<br/></td>
				</tr>
	  	  			<td valign="top" class="left">
	  	  			  <div id="map" style="width:550px; height: 400px"></div>
	  	  			  <div style="font-size:80%;text-align:right;padding-right:5px;"><a href="mapList.php">See a list of all the entries.</a></div>
	  	  			</td>
	  	  			<td valign="top" class="right">
	  	  				<h2>Tell us how you're using Ganymede</h2>
	  	  				<? include ('form.php') ?>
	  	  			</td>
	  	  		</tr>
	  	  		<tr>
	  	  			<td align="center" class="left">
	  	  				<div id="filters">
	  	  					<input type="checkbox" name="media" checked onclick="toggleType('video')"/>Video (<?=getTypeCount('video');?>)
	  	  					<input type="checkbox" name="podcast" checked onclick="toggleType('podcast')"/>Podcast (<?=getTypeCount('podcast');?>)
	  	  					<input type="checkbox" name="image" checked onclick="toggleType('image')"/>Image (<?=getTypeCount('image');?>)
	  	  					<input type="checkbox" name="blog" checked onclick="toggleType('blog')"/>Blog (<?=getTypeCount('blog');?>) 
	  	  					<input type="checkbox" name="message" checked onclick="toggleType('message')"/>Message (<?=getTypeCount('message');?>)
	  	  				</div>
	  	  			</td>
	  	  			<td class="right">&nbsp;</td>
	  	  		</tr>
	  	  	</table>
			</div>
 			<div class="b"><div></div></div>
		</div>
		</div>
		<div class="geoIP">GeoIP Lookup provided by <a href="http://www.maxmind.com/">http://www.maxmind.com/</a></div> 		  	  	
  	 </div>
	<hr class="clearer"/><br/><br/><br/><br/>
	<hr class="clearer"/>

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
      
	
      	
      map.setCenter(new GLatLng( geoip_latitude() , geoip_longitude()), 3);  //Center on Eclipse Foundation HQ
	  map.setMapType(G_HYBRID_MAP);

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
	$App->generatePage($theme, $Menu, NULL, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>