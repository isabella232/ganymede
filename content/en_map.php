<?php
/*******************************************************************************
 * Copyright(c) 2015 Eclipse Foundation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *    Nathan Gervais (Eclipse Foundation) - Initial implementation
 *    Eric Poirier (Eclipse Foundation)
 *******************************************************************************/
?>
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
	  	  							<div class="form">
					<form action="" method="POST" name="spotForm">
					<table width="240" class="formBox">
						<tr>
							<td>Name<span class="required">*</span>:</td>
							<td><input type="text" name="name" id="name"/></td>
						</tr>
						<tr>
							<td>City<span class="required">*</span>:</td>
							<td><input type="text" name="city" id="city"/></td>
						</tr>
						<tr>
							<td>State/Prov:</td>
							<td><input type="text" name="state" id="state"/></td>
						</tr>
						<tr>
							<td>Country<span class="required">*</span>:</td>
							<td><input type="text" name="country" id="country"/></td>
						</tr>
						<tr>
							<td colspan="2">
								<input name="type" type="radio" value="Blog" id="Blog" checked onclick="checkReq('Blog');"/>Blog
								<input name="type" type="radio" value="Message" id="Message" onclick="checkReq('Message');"/>Message
								<input name="type" type="radio" value="Recording" id="Recording" onclick="checkReq('Recording');"/>Recording
							</td>
						</tr>
						<tr>
							<td><div id="">Title:</div></td>
							<td><div id=""><input type="text" name="title" id="title" value=""/></div></td>
						</tr>
						<tr>
							<td>URL<span id="urlReq"class="required">*</span>:</td>
							<td><input type="text" name="url" id="url" value="http://"/></td>
						</tr>
						<tr>
							<td valign="top">Message<span id="messageReq" class="required invisible">*</span>:</td>
							<td valign="top"><textarea cols=15 name="content" id="content"></textarea><br/><span style="font-size:80%;">(256 Character Max)</span></td>
						</tr>
						<tr>
							<td colspan="2"><br/></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" name="email" id="email"/></td>
						</tr>
						<tr>
							<td><span id="urlReq"class="required">12 - 18=</span></td>
							<td><input type="text" name="useranswer"/></td>
						<tr>
							<td colspan="2" style="font-size:80%;">To be included in the <a href="./aroundtheworld.php">Ganymede Around the World Contest</a> be sure to provide us with your email address.</td>
						</tr>
						<!--  <tr>
							<td valign="top">Ganymede Projects:</td>
							<td>
								<div id="projects"><a class="expandProjects" onclick="showProjects()">Click here to choose which Ganymede Projects you are using.</a></div>
							</td>
						</tr>
						<tr>
							<td colspan=2>
								<div id="selectProjects" class="invisible">
									<table width="100%">
										<tr>

										</tr>
									</table>
								</div>
							</td>
						</tr> -->
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" id="lat" name="lat" value="0"/>
								<input type="hidden" id="lng" name="lng" value="0"/>
								<input type="hidden" name="securityanswer" value="czoxMzoidGUuT3RoYXNUSTV6cyI7"/>
								<input type="button" value="Submit" onclick="fetchLocation();"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
	  	  			</td>
	  	  		</tr>
	  	  		<tr>
	  	  			<td align="center" class="left">
	  	  				<div id="filters">
	  	  					<input type="checkbox" id="BlogFilter" checked onclick="toggleType('Blog')"/>Blog (298)
	  	  					<input type="checkbox" id="MessageFilter" checked onclick="toggleType('Message')"/>Message (417)
	  	  					<input type="checkbox" id="RecordingFilter" checked onclick="toggleType('Recording')"/>Recording (14)
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
    </script>
