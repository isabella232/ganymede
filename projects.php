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
	$pageTitle 		= "Eclipse Europa Release Projects";
	$pageKeywords	= "Eclipse Europa Simultaneous Release";
	$pageAuthor		= "Nathan Gervais";	
	
	ob_start();
	?>
	<link rel="stylesheet" type="text/css" href="layout.css" media="screen" />
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
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>		