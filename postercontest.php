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
	$pageTitle 		= "Ganymede Poster Contest";
	$pageKeywords	= "ganymede, poster, contest, movie";
	$pageAuthor		= "Lynn Gayowski";
	
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
<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		
		<p>
		<table align="top">
			<tr>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=102944" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=102944" height="200" border="0"></a><br>
				<b>Community created... Ganymede!</b></td>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=102971" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=102971" height="200" border="0"></a><br>
				<b>Lord Of The Rings</b></td>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=102974" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=102974" height="200" border="0"></a><br>
				<b>Uncle Eclipse</b></td>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103019" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103019" height="200" border="0"></a><br>
				<b>Wall E</b></td>
			</tr>
		</table>
		<table>
			<tr>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103021" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103021" height="200" border="0"></a><br>
				<b>Train to Catch</b></td>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103022" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103022" height="200" border="0"></a><br>
				<b>Train about to Leave</b></td>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103024" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103024" height="200" border="0"></a><br>
				<b>Ganymede Train</b></td>

			</tr>
		</table>
		<table>
			<tr>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103023" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103023" height="200" border="0"></a><br>
				<b>Closer than you Might Imagine</b></p></td>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103040" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103040" height="200" border="0"></a><br>
				<b>Gan - ee - meed</b></td>				
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103043" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103043" height="200" border="0"></a><br>
				<b>Sunshine</b></td>
			</tr>
		</table>
		<table>
			<tr>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103044" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103044" height="200" border="0"></a><br>
				<b>300</b></td>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103050" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103050" height="200" border="0"></a><br>
				<b>Lost in Translation</b></td>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103138" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103138" height="200" border="0"></a>><br>
				<b>Gene Simmons Never Had Ganymede</b></td>					
			</tr>
		</table>
		<table>
			<tr>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103199" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103199" height="200" border="0"></a><br>
				<b>Mars Attacks</b></td>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103205" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103205" height="200" border="0"></a><br>
				<b>Enchanted</b></td>
				<td align="center" width="200"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103391" targer="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103391" height="200" border="0"></a><br>
				<b>Transformers</b></td>
			</tr>
		</table>
		</p>
		
		<br><br>

	</div>

	<!-- remove the entire <div> tag to omit the right column!  -->
	<div id="rightcolumn">
		<div class="sideitem">
			<h6>Ganymede Around the World</h6>
			<ul>
				<li><a href="http://www.eclipse.org/ganymede/">Ganymede</a></li>
				<li><a href="map.php">Ganymede Map</a></li>
			</ul>
		</div>
	</div>	
	
	
</div>

	
EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>