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
	header("Cache-control: no-cache");
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
	  	  			<td style="text-align:center;font-size:120%" colspan="2">
	  	  			  <h1>Ganymede Around the World</h1>
	  	  			  <div align="center" style="width:100%"><p class="contestText">Join the Eclipse global community.  Write a blog, record a video/podcast, or leave a message on how you are using the new Ganymede release and have an opportunity to <b>win cool Eclipse stuff</b>. <a href="./aroundtheworld.php">Full details here</a>.</p> </div>
	  	  			</td>
	  	  		</tr>
				<tr>	
					<td colspan="2"> <br/></td>
				</tr>
	  	  			<td valign="top" class="left">
	  	  			  <div id="map" style="width:610px; height: 400px"></div>
	  	  			  <div style="font-size:80%;text-align:right;padding-right:5px;"><a href="mapList.php">See a list of all the entries.</a></div>
	  	  			</td>
	  	  			<td valign="top" class="right">
	  	  				<? include ('form.php') ?>
	  	  			</td>
	  	  		</tr>
	  	  		<tr>
	  	  			<td align="center" class="left">
	  	  				<div id="filters">
	  	  					<input type="checkbox" id="BlogFilter" checked onclick="toggleType('Blog')"/>Blog (<?=getTypeCount('blog');?>) 
	  	  					<input type="checkbox" id="MessageFilter" checked onclick="toggleType('Message')"/>Message (<?=getTypeCount('message');?>)
	  	  					<input type="checkbox" id="RecordingFilter" checked onclick="toggleType('Recording')"/>Recording (<?=getTypeCount('recording');?>)
	  	  				</div>
	  	  			</td>
	  	  			<td class="right">&nbsp;</td>
	  	  		</tr>
	  	  	</table>
			</div>
 			<div class="b"><div></div></div>
		</div>
		</div>
  	 </div>
	<hr class="clearer"/><br/><br/><br/><br/>
	<hr class="clearer"/>

 <script type="text/javascript">
    checkReq('');
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

           	if ((title.length == 0) && (url.length > 0) // No title supplied so just display URL
           	{
           		typeText = type + ' - <a href="' + url + '" target=_"blank">' + url.substring(7) + '</a>';    		
			}
			elseif ((title.length > 0) && (url.length == 0) // No URL supplied so just display the title;
			{
				typeText = type + ' - ' + title;
			}
			elseif ((title.lenght >0) && (url.length > 0) // We have both lets display both.
			{			            
            	typeText = type + ' - <a href="' + url + '" target=_"blank">' + title + '</a>';    
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
    </script>  	  
  </body>
	<?
	$html = ob_get_clean();
	# Generate the web page
	$App->generatePage($theme, $Menu, NULL, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>