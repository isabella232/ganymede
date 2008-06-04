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
	$pageTitle 		= "Ganymede Around the World Contest";
	$pageKeywords	= "ganymede, world, contest, blog, podcast, video";
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
	
		<p>We want to hear how you are using the Eclipse projects in the <a href="http://www.eclipse.org/ganymede/">Ganymede</a> release. 
		Write a blog post telling people what you like and dislike, create a screencast/video showing people what you dig or record a podcast 
		telling the world what is great about Ganymede.  For your efforts we will even send you an Eclipse shirt.</p>
		
		<p> Once you have posted your review, then add it to the <a href="map.php">Ganymede Around the World map</a>.  Eclipse is a global community, so
		would encourage people to create their reviews in your native language.  </p>
		
	 <p>If you want to show your support but don&#146;t have the time to prepare a review, you can still add yourself to the <a href="map.php">Ganymede Around the World map</a>.  
	 Just enter your name, address and a short message or image about how you use Eclipse.  
     Everyone who enters their name will be entered into a random draw for 5 Eclipse jackets.  </p>		
		
		
		<p>To enter the contest, a review must be of sufficient technical content. Long essays aren&#146;t
		necessary, but as a guideline, you need to include at least 3-5 points of what you like or don&#146;t like about the Ganymede projects. The top 3 
		reviews will win an Eclipse jacket and the best entry will win their choice of a pass to
		 <a href="http://www.eclipsecon.org/2009/">EclipseCon 2009</a> or
		 <a href="http://eclipsesummit.org/summiteurope2008/">Eclipse Summit Europe 2008</a>!</p></p>

		 
		 <p>The deadline for submissions to the contest is <b>July 31, 2008</b>.  The top 3 and best reviews will be selected by a panel of
		 judges.

		 <p>Important Details:
		 	<ul>
		 		<li>You can submit multiple reviews but only one shirt per person will be sent.</li>
		 		<li>Shirt quantities are limited so shirts will be distributed to reviewers on a first come, first served basis.</li>		 		
				<li>The EclipseCon or Eclipse Summit Europe pass only covers the conference registration.
				It does not include any travel expenses. The pass is non-transferable, non-refundable and
				has no cash value. So if you can&#146;t go to either conference or you received a free pass
				some other way (such as a speaker pass), you won&#146;t be able to take advantage of the prize.</li>
				<li>Informed, insightful, educated reviews &#150; positive and negative &#150; are always welcome.
				However, FUD-spewers, propagandists and mean-spirited curmudgeons need not apply.</li>
				<li>A review needs to be submitted to the <a href="map.php">Ganymede Around the World </a>map to participate in the contest.</li>
			</ul>
		</p>
		
		<br><br>

	</div>

	<!-- remove the entire <div> tag to omit the right column!  -->
	<div id="rightcolumn">
		<div class="sideitem">
			<h6>Related Links</h6>
			<ul>
				<li><a href="map.php">Around the World Map</a></li>
			</ul>
		</div>
	</div>	
	
	
</div>

	
EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>