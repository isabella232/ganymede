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
	include ($_SERVER['DOCUMENT_ROOT'] . '/eclipse.org-common/system/smartconnection.class.php');
	$dbc = new DBConnection();
	$dbh = $dbc->connect();
	ob_start();
	extract($_POST);
	
	$query = "INSERT INTO ganymede_spots (id, name, location_city, location_state, location_country, location_lat, location_lng email) VALUES ('', '$name', '$city', '$state', '$country', '$lat', '$lng', '$email')";
	mysql_query($query, $dbh) or die($query . " - " .mysql_error());
	$retVal = mysql_insert_id($dbh);
	$query = "INSERT INTO ganymede_content (id, type, content) VALUES ($retVal, '$type', '$content')";
	mysql_query($query, $dbh) or die($query . " - " .mysql_error());
	?>

	<script type="text/javascript" src="functions.js"></script>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<body>
		Submitted Information.. Translating Location<br/>
		
		<?=$city?> - <?=$state?> - <?=$country?> - <?=$lat?> - <?=$lng?>
	
	</body>
	<?
	$html = ob_get_clean();
	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>