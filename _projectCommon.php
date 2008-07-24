<?php

	# Set the theme for your project's web pages.
	# See the Committer Tools "How Do I" for list of themes
	# https://dev.eclipse.org/committers/
	# Optional: defaults to system theme 
	$theme = "Phoenix";
	$pageAuthor="Equinox Committers";
	//$App->ExtraHtmlHeaders = '<link rel="stylesheet" type="text/css" href="/equinox/equinox.css">';
	# Define your project-wide Nav bars here.
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# these are optional
	$Nav->setLinkList( array() );
	$Nav->addNavSeparator("Ganymede", "/ganymede/");
	$Nav->addCustomNav("Download Ganymede", "/downloads/packages/", "_self", 1);
	$Nav->addCustomNav("Learn more about Ganymede", "/ganymede/learn.php", "_self", 1);
	$Nav->addCustomNav("Ganymede Buzz", "/ganymede/buzz.php", "_self", 1);
	$Nav->addCustomNav("Ganymede Around the World", "/ganymede/map.php", "_self", 1);
	$App->setPromotionPath("/ganymede/headerThin.php");
	$App->Promotion = TRUE;

?>