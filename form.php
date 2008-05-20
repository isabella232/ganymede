<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();	   # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# index.php
	#
	# Author: 	 	Nathan Gervais
	# Date:			2008-05-16
	#
	# Description: Ganymede Spotting Submission Form
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Ganymede Spotting";
	$pageKeywords	= "eclipse ganymede, ganymede, ganymede spotting form";
	$pageAuthor		= "Eclipse Foundation, Inc.";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank)
	# $Nav->addCustomNav("My Link", "mypage.php", "_self");
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank");

	# End: page-specific settings
	#
	
	# Place your html content in a file called content/en_pagename.php

	include($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/classes/projects/projectInfoList.class.php");
	$projectInfoList = new projectInfoList();
	$projectInfoList->selectProjectInfoList('','simultaneousrelease', 'ganymede', 1);
	$projectInfoList->alphaSortList();
	ob_start();
	
	?>
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA85Ct-u89MRBL6KQDW1oYFRRVZIdxFKFwDr3XyDwet7lo3BxWzRQ-OiA6LG0_IUfBnGsh0fZU1lolWA" type="text/javascript"></script>
	<script type="text/javascript" src="functions.js"></script>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<body>
		<div id="midcolumn">
			<h1><?=$pageTitle;?></h1>
			
			<div>Using Ganymede?  Post your information here to be included in our Mashup!</div><br/>
			<div class="homeitem">
				<h3>Spot Ganymede</h3>
					<form action="spotProcess.php" method="POST" name="spotForm">
					<table>
						<tr>
							<td width="280">Name<span class="required">*</span>:</td>
							<td><input type="text" name="name" id="name"/></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" name="email" id="email"/></td>
						</tr>
						<tr>
							<td>City<span class="required">*</span>:</td>
							<td><input type="text" name="city" id="city"/></td>
						</tr>
						<tr>
							<td>State or Province:</td>
							<td><input type="text" name="state" id="state"/></td>
						</tr>
						<tr>
							<td>Country<span class="required">*</span>:</td>
							<td><input type="text" name="country" id="country"/></td>
						</tr>
						<tr>
							<td>Content Type<span class="required">*</span>:</td>
							<td>
								<select name="type" id="type">
									<option value="video" selected>Video</option>
									<option value="podcast">Podcast</option>
									<option value="blog">Blog</option>
									<option value="image">Image</option>
									<option value="message">Message</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Content<span class="required">*</span>:</td>
							<td><textarea name="content" id="content"></textarea></td>
						</tr>
						<tr>
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
											<?
											$colreset = 6;
											$colcount = 0; 
											for ($i=0; $i < $projectInfoList->getCount(); $i++)
											{
												if ($colcount == 0)
												{
													?><td><?
												}
												elseif ($colcount == $colreset)
												{
													$colcount = -1;
													?></td><?
												}
												$projectInfoIterator = $projectInfoList->getItemAt($i);
												?><input type="checkbox" name="<?$projectInfoIterator->projectshortname;?>" value=""/><?$projectInfoIterator->projectshortname;?><br/><?
												$colcount++; 
											} ?>
											
										</tr>
									</table>
								</div>
							</td>
						</tr>
						<tr>	
							<td>&nbsp;</td>
							<td>
								<input type="button" value="Submit" onclick="validateForm();"/>
								<input type="button" value="Preview" onclick="previewLocation();"/>
							</td>
						</tr>						
					</table>
				</form>
			</div>
			<div class="homeitem">
				<div id="map" style="width: 300px; height: 300px"></div>
			</div>	
		</div>
		<script type="text/javascript">
		    var map = new GMap2(document.getElementById("map"));
     		map.addControl(new GSmallMapControl());
     		var geocoder = new GClientGeocoder();
     		
			function showAddress(address) {
			  geocoder.getLatLng(
			    address,
			    function(point) {
			      if (!point) {
			        alert(address + " not found");
			      } else {
			        map.setCenter(point,6);
			        var marker = new GMarker(point);
			        map.addOverlay(marker);
			        marker.openInfoWindowHtml(address);
			      }
			    }
			  );
			}
			
			function previewLocation() {
				var c = document.getElementById('city');
				var s = document.getElementById('state');
				var co = document.getElementById('country');
				
				var address = c.value + ' ' + s.value + ' ' + co.value;
				showAddress(address);
			}
			
			
		</script>
?>  </body>
	<?
	$html = ob_get_clean();
	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>