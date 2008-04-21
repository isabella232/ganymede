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
		<body>
			<div id="midcolumn">
				<h2><?=$pageTitle; ?></h2><br/><br/>
				<table width="100%" align="center">
					<tr>
						<td align="center">
							<a href="http://wiki.eclipse.org/Ganymede"><img src="images/wikibutton.jpg"/></a><br/>
							<a href="http://wiki.eclipse.org/Ganymede">Ganymede Development Wiki</a>
						</td>
						<td align="center">
							<a href="http://phoenix.eclipse.org/packages/"><img src="images/milestonebutton.jpg"/></a><br/>
							<a href="http://phoenix.eclipse.org/packages/">Ganymede Milestone Releases</a>
						</td>
					</tr>
				</table>
			</div>
		</body>
	<?
	$html = ob_get_clean();
	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>