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
		Eclipse community members are showing off their Photoshop and Gimp skills by redesigning movie posters to showcase
		Ganymede.  Review the poster submissions below and reward a hard working designer by
		<a href="http://www.surveymonkey.com/s.aspx?sm=Jz7pU_2bHvyMaAidVDaEiXow_3d_3d" target="blank">voting for your favourite</a>.
		Click on any poster to see its full-size version.  Voting is open until June 24, 2008, 5:00 pm EDT.
		</p>

		<p><h2><a href="http://www.surveymonkey.com/s.aspx?sm=Jz7pU_2bHvyMaAidVDaEiXow_3d_3d" target="blank">VOTE HERE</a></h2></p>
		
		<p>
		A very special thank you to Eclipse committer <a href="http://divby0.blogspot.com/2008/05/ganymede-poster-contest.html">Nick Boldt</a>
		for creating, organizing and sponsoring the Ganymede poster contest.
		</p>
		
		<p>
		<strong>Prizes</strong><br>
		1st place: an Eclipse jacket and $50 to your favourite open source organization or free service provider<br>
		2nd place: an Eclipse jacket and $30 to your favourite open source organization or free service provider<br>
		3rd place: an Eclipse shirt and $20 to your favourite open source organization or free service provider<br>
		4th & 5th place: an Eclipse shirt<br>
		
		<font size=0.4px><br>Note: Individuals are allowed to submit multiple entries, but only one prize per person will be awarded.</font>
		</p>
		
		<p>
		<table align="top">
			<tr height="250">
				<td valign="top" width="148"><a href="http://bp3.blogger.com/_i21-98vOfTA/SD-AtQANotI/AAAAAAAAAVs/YoAOZpvpuE8/s200/Attack_of_the_15_Projects.png" target="blank"><img src="http://bp3.blogger.com/_i21-98vOfTA/SD-AtQANotI/AAAAAAAAAVs/YoAOZpvpuE8/s200/Attack_of_the_15_Projects.png" height="200" width="138" border="0"></a><br>
				<b>Attack of the 50 Foot Woman</b></td>	
				<td valign="top" width="112"><a href="http://bp0.blogger.com/_i21-98vOfTA/SFIT5xQhm9I/AAAAAAAAAWs/BfKXpprXpeA/s400/children-of-the-code.png" target="blank"><img src="http://bp0.blogger.com/_i21-98vOfTA/SFIT5xQhm9I/AAAAAAAAAWs/BfKXpprXpeA/s400/children-of-the-code.png" height="200" width="102" border="0"></a><br>
				<b>Children of the Corn</b></td>
				<td valign="top" width="140"><a href="http://bp1.blogger.com/_i21-98vOfTA/SFIT6BQhm-I/AAAAAAAAAW0/FALIOzx_fMo/s400/children-of-the-code-ganymede.png" target="blank"><img src="http://bp1.blogger.com/_i21-98vOfTA/SFIT6BQhm-I/AAAAAAAAAW0/FALIOzx_fMo/s400/children-of-the-code-ganymede.png" height="200" width="130" border="0"></a><br>
				<b>Children of the Corn II</b></td>
				<td valign="top" width="151"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=102944" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=102944" height="200" width="141" border="0"></a><br>
				<b>Community created... Ganymede!</b></td>
				<td valign="top" width="143"><a href="http://bp1.blogger.com/_i21-98vOfTA/SFIULBQhm_I/AAAAAAAAAW8/OXjw8LTv168/s400/Day-of-the-Dead-Ganymede.png" target="blank"><img src="http://bp1.blogger.com/_i21-98vOfTA/SFIULBQhm_I/AAAAAAAAAW8/OXjw8LTv168/s400/Day-of-the-Dead-Ganymede.png" height="200" width="133" border="0"></a><br>
				<b>Day of the Dead</b></td>
			</tr>
		</table>
		<table>
			<tr height="250">
				<td valign="top" width="143"><a href="http://bp1.blogger.com/_i21-98vOfTA/SFIULBQhnAI/AAAAAAAAAXE/GjseOlNSN60/s400/Death-Proof-Friends-of-Ganymede.png" target="blank"><img src="http://bp1.blogger.com/_i21-98vOfTA/SFIULBQhnAI/AAAAAAAAAXE/GjseOlNSN60/s400/Death-Proof-Friends-of-Ganymede.png" height="200" width="133" border="0"></a><br>
				<b>Death Proof</b></td>
				<td valign="top" width="145"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103205" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103205" height="200" width="135" border="0"></a><br>
				<b>Enchanted</b></td>
				<td valign="top" width="180"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103024" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103024" height="200" width="170" border="0"></a><br>
				<b>Ganymede Train</b></td>
				<td valign="top" width="278"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103138" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103138" height="200" width="268" border="0"></a><br>
				<b>Gene Simmons Never Had Ganymede</b></td>
			</tr>
		</table>
		<table>
			<tr height="250">	
				<td valign="top" width="145"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=104993" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=104993"  height="200" width="135" border="0"></a><br>
				<b>Harry Potter</b></td>
				<td valign="top" width="147"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=104847" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=104847"  height="200" width="137" border="0"></a><br>
				<b>Ice Age</b></td>	
				<td valign="top" width="268"><a href="http://bp0.blogger.com/_i21-98vOfTA/SD98ggANosI/AAAAAAAAAVk/z01lgDfe5gA/s200/p2_Came_From_Beneath_Equinox.png" target="blank"><img src="http://bp0.blogger.com/_i21-98vOfTA/SD98ggANosI/AAAAAAAAAVk/z01lgDfe5gA/s200/p2_Came_From_Beneath_Equinox.png" height="200" width="258" border="0"></a><br>
				<b>It Came from Beneath the Sea</b></td>
				<td valign="top" width="277"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=105349" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=105349"  height="200" width="267" border="0"></a><br>
				<b>Kill Bill, Vol. 1</b></td>
			</tr>
		</table>
		<table>
			<tr height="250">
				<td valign="top" width="277"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=105326" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=105326"  height="200" width="267" border="0"></a><br>
				<b>Kill Bill, Vol. 2</b></td>
				<td valign="top" width="260"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=105350" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=105350"  height="200" width="250" border="0"></a><br>
				<b>Kill Bill, Vol. 3</b></td>
				<td valign="top" width="138"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=104070" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=104070" height="200" width="128" border="0"></a><br>
				<b>Kung Fu Panda</b></td>
				<td valign="top" width="167"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=102971" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=102971" height="200" width="157" border="0"></a><br>
				<b>Lord Of The Rings</b></td>
			</tr>
		</table>
		<table>
			<tr height="250">
				<td valign="top" width="140"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103050" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103050" height="200" width="130" border="0"></a><br>
				<b>Lost In Translation</b></td>
				<td valign="top" width="144"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103199" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103199" height="200" width="134" border="0"></a><br>
				<b>Mars Attacks</b></td>
				<td valign="top" width="260"><a href="http://www.eclipse.org/ganymede/images/GanymedeMoon1Poster.jpg" target="blank"><img src="http://www.eclipse.org/ganymede/images/GanymedeMoon1Poster.jpg" height="200" width="250" border="0"></a><br>
				<b>Objects on mirrors</b></p></td>
				<td valign="top" width="243"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=104052" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=104052" height="200" width="233" border="0"></a><br>
				<b>Prepare yourself for Ganymede</b></td>
			</tr>
		</table>
		<table>
			<tr height="250">		
				<td valign="top" width="145"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103040" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103040" height="200" width="135" border="0"></a><br>
				<b>Ratatouille</b></td>	
				<td valign="top" width="277"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=105324" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=105324"  height="200" width="267" border="0"></a><br>
				<b>Sin City</b></td>
				<td valign="top" width="145"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103043" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103043" height="200" width="135" border="0"></a><br>
				<b>Sunshine</b></td>	
				<td valign="top" width="148"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=104165" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=104165" height="200" width="138" border="0"></a><br>
				<b>The Blues Brothers</b></td>
			</tr>
		</table>
		
		<table>
			<tr height="250">		
				<td valign="top" width="270"><a href="http://bp3.blogger.com/_i21-98vOfTA/SD92SQANorI/AAAAAAAAAVc/tl4Qo4LYiBM/s200/Day_The_Net_Stood_Still.png" target="blank"><img src="http://bp3.blogger.com/_i21-98vOfTA/SD92SQANorI/AAAAAAAAAVc/tl4Qo4LYiBM/s200/Day_The_Net_Stood_Still.png" height="200" width="260" border="0"></a><br>
				<b>The Day the Earth Stood Still</b></td>
				<td valign="top" width="151"><a href="http://bp3.blogger.com/_i21-98vOfTA/SD8eTQANopI/AAAAAAAAAVM/3PnY8S9Ho9s/s200/smthing_gany.png" target="blank"><img src="http://bp3.blogger.com/_i21-98vOfTA/SD8eTQANopI/AAAAAAAAAVM/3PnY8S9Ho9s/s200/smthing_gany.png" height="200" width="141" border="0"></a><br>
				<b>There&#146;s Something About Mary</b></td>
				<td valign="top" width="232"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103022" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103022" height="200" width="222" border="0"></a><br>
				<b>Train about to Leave</b></td>
				<td valign="top" width="210"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103021" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103021" height="200" width="200" border="0"></a><br>
				<b>Train to Catch</b></td>
			</tr>
		</table>

		<table>
			<tr height="250">
				<td valign="top" width="163"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103391" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103391" height="200" width="153" border="0"></a><br>
				<b>Transformers</b></td>
				<td valign="top" width="151"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=102974" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=102974" height="200" width="141" border="0"></a><br>
				<b>Uncle Eclipse</b></td>
				<td valign="top" width="161"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103019" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103019" height="200" width="151" border="0"></a><br>
				<b>Wall E</b></td>
				<td valign="top" width="142"><a href="https://bugs.eclipse.org/bugs/attachment.cgi?id=103044" target="blank"><img src="https://bugs.eclipse.org/bugs/attachment.cgi?id=103044" height="200" width="132" border="0"></a><br>
				<b>300</b></td>
				<td valign="top" width="210"><a href="http://bp3.blogger.com/_i21-98vOfTA/SFITehQhm8I/AAAAAAAAAWk/dKynQpV7vmo/s400/ide-science.png" target="blank"><img src="http://bp3.blogger.com/_i21-98vOfTA/SFITehQhm8I/AAAAAAAAAWk/dKynQpV7vmo/s400/ide-science.png" height="200" width="200" border="0"></a><br>
				<b>Weird Science</b></td>
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