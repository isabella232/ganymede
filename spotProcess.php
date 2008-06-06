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
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank)
	# $Nav->addCustomNav("My Link", "mypage.php", "_self");
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank");
	$pageTitle 		= "Ganymede Around the World";
	$pageKeywords	= "eclipse ganymede, ganymede, ganymede around the world";
	$pageAuthor		= "Nathan Gervais";
	# End: page-specific settings
	#

	extract($_POST);
	
	# Place your html content in a file called content/en_pagename.php
	require_once("/home/data/httpd/eclipse-php-classes/system/dbconnection_rw.class.php");
	$dbc = new DBConnectionRW();
	$dbh = $dbc->connect();
	
	$url = strtolower($url);
	$query = "INSERT INTO ganymede_spots (id, name, location_city, location_state, location_country, location_lat, location_lng, email) VALUES ('', '$name', '$city', '$state', '$country', $lat, $lng, '$email')";
	mysql_query($query, $dbh);// or die($query . " - " .mysql_error());
	$retVal = mysql_insert_id($dbh);
	$query = "INSERT INTO ganymede_content (id, type, content, url, title) VALUES ($retVal, '$type', '$content', '$url', '$title')";
	mysql_query($query, $dbh);// or die($query . " - " .mysql_error());
	ob_start();
	?>
	<div id="midcolumn">
		<h1>Ganymede Around the World</h1>
		<p>Thank you for supporting Ganymede Around the World.  You will be brought back to the map in 5 seconds. Click <a href="map.php">here</a> if you are not forwarded.</p>
	</div>
	<?
	$html = ob_get_clean();
	$App->AddExtraHtmlHeader('<META HTTP-EQUIV="Refresh" CONTENT="5; URL=map.php">');
	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>	
