<?php  																										require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'
	
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
	$documentRoot = $_SERVER['DOCUMENT_ROOT'];
	require_once ($documentRoot .'/ganymede/scripts/projectsTable.php');
	
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Eclipse Ganymede Release Projects";
	$pageKeywords	= "eclipse ganymede, ganymede, ganymede release train";
	$pageAuthor		= "Nathan Gervais";	
	
	ob_start();
	?>
	<link rel="stylesheet" type="text/css" href="layout.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="header.css" media="screen" />
	<div id="ganymedeHeader">
		<div id="headerGraphic">&nbsp;</div>
	</div>
	<div id="widecontent">
		<div id="midcolumnwide">
		<?=projectTable(GANYMEDE);?><br/><br/>
		</div>
	</div>

<? 
$html = ob_get_contents();
ob_end_clean();

	# Generate the web page
	$App->generatePage($theme, $Menu, NULL, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>		