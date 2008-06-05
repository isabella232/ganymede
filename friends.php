<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# template.php
	#
	# Author: 		Denis Roy
	# Date:			2005-06-16
	#
	# Description: Type your page comments here - these are not sent to the browser
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Friends of Ganymede";
	$pageKeywords	= "Ganymede marketing, friends of Ganymede";
	$pageAuthor		= "Nathan Gervais";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
	# $Nav->addCustomNav("My Link", "mypage.php", "_self", 1);
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 1);

	# End: page-specific settings
	#
	// This file is linked to from lots of different places.
	// Use absolute paths to make sure that we can actually test
	// that the file renders properly (i.e. testing using) "/index.php",
	// and "/home/index.php" both work.

		
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML
<link rel="stylesheet" type="text/css" href="layout.css" media="screen" />
<div id="midcolumn">
	<div>
        <h1>$pageTitle</h1>
		<p>Want to join the Friends of Ganymede?  Put one of these images up on your website.</p>
		<div>
			<h2>Square Button (160 x 160 px)</h2>
			<img border=0 alt="Ganymede is Coming" title="Eclipse Ganymede" src="images/ganymedeFriend.jpg"><br /><br />
			<textarea class="smallType" cols=60 rows=4 readonly>&lt;a href="http://www.eclipse.org/ganymede/"&gt;&lt;img src="http://www.eclipse.org/ganymede/images/ganymedeFriend.jpg" border=0 alt="Ganymede is coming!" title="Ganymede is coming!" &gt;&lt;/a&gt;</textarea>
		</div><br/><br/>
		<div>
			<h2>Ganymede Wallpapers</h2>
				<img border=0 alt="Ganymede Wallpaper" src="images/wallpaperThumb.jpg"><br/><br/>
				Decorate your Desktop with one of these Ganymede Wallpapers.<br/>
				<a href="images/wallpaper1024.jpg">1024x768</a> - <a href="images/wallpaper1280.jpg">1280x960</a> - <a href="images/wallpaper1600.jpg">1600x1200</a> - <a href="images/wallpaper1680.jpg">1680x1050</a><br/><br/>
			</div>
	    </div>
</div>


EOHTML;

	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
        