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
 	gMapStart();
    </script>  	  
  </body>
	<?
	$html = ob_get_clean();
	# Generate the web page
	$App->generatePage($theme, $Menu, NULL, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>