<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();	   # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# index.php
	#
	# Author: 	 	Nathan Gervais
	# Date:			2008-05-16
	#
	# Description: Ganymede Spotting Submission Form
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Ganymede Spotting";
	$pageKeywords	= "eclipse ganymede, ganymede, ganymede spotting form";
	$pageAuthor		= "Eclipse Foundation, Inc.";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank)
	# $Nav->addCustomNav("My Link", "mypage.php", "_self");
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank");

	# End: page-specific settings
	#
	
	# Place your html content in a file called content/en_pagename.php

	include($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/classes/projects/projectInfoList.class.php");
	$projectInfoList = new projectInfoList();
	$projectInfoList->selectProjectInfoList('','simultaneousrelease', 'ganymede', 1);
	$projectInfoList->alphaSortList();
	
	?>	<script type="text/javascript">
		    var geocoder = new GClientGeocoder();
		</script>
			<div class="form">
					<form action="spotProcess.php" method="POST" name="spotForm">
					<table width="300" class="formBox">
						<tr>
							<td colspan="2"><h5>Who are you?</h5></td>
						</tr>
						<tr>
							<td width="280">Name<span class="required">*</span>:</td>
							<td><input type="text" name="name" id="name"/></td>
						</tr>
						<tr>
							<td colspan="2"><br/><h5>Where are you?</h5></td>
						</tr>
						<tr>
							<td>City<span class="required">*</span>:</td>
							<td><input type="text" name="city" id="city"/></td>
						</tr>
						<tr>
							<td>State or Province:</td>
							<td><input type="text" name="state" id="state"/></td>
						</tr>
						<tr>
							<td>Country<span class="required">*</span>:</td>
							<td><input type="text" name="country" id="country"/></td>
						</tr>
						<tr>
							<td colspan="2"><br/><h5>How are you using Ganymede?</h5></td>
						</tr>
							<td>Content Type<span class="required">*</span>:</td>
							<td>
								<select name="type" id="type" onchange="showURL(this)">
									<option value="video" selected>Video</option>
									<option value="podcast">Podcast</option>
									<option value="blog">Blog</option>
									<option value="image">Image</option>
									<option value="message">Message</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><div id="urlDiv">Content URL<span class="required">*</span>:</div></td>
							<td><div id="urlDiv2"><input type="text" name="url" id="url"/></div></td>
						<tr>
						</div>
							<td valign="top">Message<span class="required">*</span>:</td>
							<td><textarea name="content" id="content"></textarea></td>
						</tr>						
						<tr>
							<td colspan="2"><br/></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" name="email" id="email"/></td>
						</tr>						
						<!--  <tr>
							<td valign="top">Ganymede Projects:</td>
							<td>
								<div id="projects"><a class="expandProjects" onclick="showProjects()">Click here to choose which Ganymede Projects you are using.</a></div>
							</td>
						</tr>
						<tr>
							<td colspan=2>
								<div id="selectProjects" class="invisible">
									<table width="100%">
										<tr>
											<?/*
											$colreset = 6;
											$colcount = 0; 
											for ($i=0; $i < $projectInfoList->getCount(); $i++)
											{
												if ($colcount == 0)
												{
													?><td><?
												}
												elseif ($colcount == $colreset)
												{
													$colcount = -1;
													?></td><?
												}
												$projectInfoIterator = $projectInfoList->getItemAt($i);
												?><input type="checkbox" name="<?$projectInfoIterator->ProjectID;?>" value=""/><?$projectInfoIterator->projectshortname;?><br/>
												<?
												$colcount++; 
											}*/?>
											
										</tr>
									</table>
								</div>
							</td>
						</tr> -->
						<tr>	
							<td>&nbsp;</td>
							<td>
								<input type="hidden" id="lat" name="lat" value="0"/>
								<input type="hidden" id="lng" name="lng" value="0"/>
								<input type="button" value="Submit" onclick="previewLocation();"/>
							</td>
						</tr>						
					</table>
				</form>
			</div>
