<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();	$theme = "Phoenix";include($App->getProjectCommon());   # All on the same line to unclutter the user's desktop'

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
	$pageTitle 		= "Learn more about Ganymede";
	$pageKeywords	= "eclipse ganymede, ganymede, ganymede release train";
	$pageAuthor		= "Eclipse Foundation, Inc.";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank)
	# $Nav->addCustomNav("My Link", "mypage.php", "_self");
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank");

	# End: page-specific settings
	#
	
	# Place your html content in a file called content/en_pagename.php

	$documentRoot = $_SERVER['DOCUMENT_ROOT'];
	$cookie = @$_COOKIE['activeTabGanymede'];
	ob_start();
	?>
	<script type="text/javascript" src="scripts/functions.js"></script>
	<link rel="stylesheet" type="text/css" href="layout.css" media="screen" />
	<div id="midcolumn">
		<div class="title">
			<img align="absbottom" src="http://dev.eclipse.org/large_icons/actions/system-search.png"/> 
			<h1 class="inline"><?=$pageTitle; ?></h1>
		</div>
		<div id="intro">
			<p>Browse our Ganymede Demos from <a href="http://live.eclipse.org" target="_blank">Eclipse Live, or view the list of Ganymede Projects.</p>
		</div>
		<div id="dataBox">
		<div id="tabSelection">
			<ul>
				<li><a <? if ($cookie == "demos") echo "class=\"active\""; ?> id="webinar" onClick="updateTable('demos');SetActive('demos', 'projects');">Ganymede Demos</a></li>
				<li><a <? if ($cookie == "projects") echo "class=\"active\""; ?>id="resources" onClick="updateTable('projects');SetActive('projects', 'demos');">Ganymede Projects</a></li>
			</ul>
		</div>
		<div id="tabData">
			<? 
				if ($cookie != "")
					include ('fetch/'.$cookie. '.php');
				else
					include ('fetch/demos.php'); 
			?>
		</div>
		<hr class="clearer"/>
		</div>
	</div>
<?	$html = ob_get_clean();

	# Generate the web page
	// Date in the past
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	// always modified
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	// HTTP/1.1
	header("cache-Control: no-store, no-cache, must-revalidate");
	header("cache-Control: post-check=0, pre-check=0", false);
	// HTTP/1.0
	header("Pragma: no-cache"); 
	$App->Promotion = TRUE;
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
	