<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# buzz.php
	#
	# Author: 		Nathan Gervais
	# Date:			2005-06-16
	#
	# Description: Ganymede Buzz page.
	#
	#
	#****************************************************************************

	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Ganymede  Buzz";
	$pageKeywords	= "ganymede, release, ganymede release train, buzz, press";
	$pageAuthor		= "Nathan Gervais";
	$App->PageRSS = "/home/eclipseinthenews.rss";
	$App->PageRSSTitle = "Eclipse In The News";
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
	# $Nav->addCustomNav("My Link", "mypage.php", "_self", 1);
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 1);

	# End: page-specific settings
	#
		
	# The next two lines load the $news variable with the HTML equivalent to the contents of the eclipsenews.rss file.
	# Reference the $news variable to drop the HTML into your content...
	$documentRoot = $_SERVER['DOCUMENT_ROOT'];
	require_once('scripts/functions.php');
	require_once('scripts/blogs.php');
	$filepath = $documentRoot . '/community/news/2005inthenewsarchive.rss';
	$eclipsenews = rss_to_news_html($filepath, 'ganymede',100);
	$ganymedeBlogs = ganymedeBlogs(10);
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML
	<link rel="stylesheet" type="text/css" href="layout.css" media="screen" />
	<style>
		li.more {
			display:none!important;
		}
	</style>
	<div id="midcolumn">
	
		<h1>$pageTitle</h1>
				
		<div class="homeitem3col">
			<h3>Community Buzz</h3>
			$eclipsenews
		</div>
		
		<div class="homeitem3col">
			<h3>Ganymede Blogs</h3>
			$ganymedeBlogs
		</div>
	</div>
	<div id="rightcolumn">
		<div class='sideitem'>
			<h6>Related Links</h6>
			<ul>
				<li><a href="map.php">Ganymede Around the World</a></li>
				<li><a href="friends.php">Friends of Ganymede</a></li>
			</ul>
		</div>
	</div>
</div>

EOHTML;

	$html = mb_convert_encoding($html, "HTML-ENTITIES", "auto");
	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
