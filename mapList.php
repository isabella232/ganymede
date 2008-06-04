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
	include ($_SERVER['DOCUMENT_ROOT'] . '/eclipse.org-common/system/smartconnection.class.php');
	$dbc = new DBConnection();
	$dbh = $dbc->connect();
	
	if (isset($_GET['sort'])) {
		$sortBy = " ORDER BY " . $_GET['sort'] . " ASC";
	}
	else 
		$sortBy = " ORDER BY GS.id DESC";
	
	$sql = "SELECT * FROM ganymede_spots AS GS INNER JOIN ganymede_content AS GC ON GS.id = GC.id" . $sortBy . " LIMIT 25";
	$result = mysql_query($sql);
	
	ob_start();
	?>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<body>
		<div id="midcolumn">
  			<h1><?=$pageTitle;?></h1><br/>
			<table cellspacing=0 cellpadding=0 class="list" width="850">
				<tr class="header">	
					<td><a href="<?$_SERVER['PHP_SELF'];?>?sort=name">Name</a></td>
					<td width="150"><a href="<?$_SERVER['PHP_SELF'];?>?sort=type">Type</a></td>
					<td><a href="<?$_SERVER['PHP_SELF'];?>?sort=location_country">Location</a></td>
					<td>Content</td>
				</tr>
				<? while ($rr = mysql_fetch_array($result)) { ?>
				<tr>
					<td><?=$rr['name']; ?></td>
					<td><?=ucfirst($rr['type']); ?></td>
					<td><?=$rr['location_city'];?>, <?=$rr['location_country'];?></td>
					<td>
						<? if ($rr['type'] != "Message") 
							{ ?>
							<a href="<?=$rr['url'];?>" target="_blank"><?=$rr['url'];?></a>
						<? } 
						else { ?>
							<?=$rr['content']; }?>
					</td>
				</tr>
				<? } ?>	
			</table><br/><br/>
		</div>
		<div id="rightcolumn">
			<div class="sideitem">
				<h6>Ganymede Around the World</h6>
					<ul>
						<li><a href="./map.php">Ganymede Around the World</a></li>
						<li><a href="./aroundtheworld.php">Contest Details</a></li>
					</ul>
			</div>
		</div>
 	</body>
	<?
	$html = ob_get_clean();
	# Generate the web page
	$App->generatePage($theme, $Menu, NULL, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>