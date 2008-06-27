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
	$pageTitle 		= "Ganymede Around the World";
	$pageKeywords	= "eclipse ganymede, ganymede, ganymede spotting form";
	$pageAuthor		= "Eclipse Foundation, Inc.";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank)
	# $Nav->addCustomNav("My Link", "mypage.php", "_self");
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank");

	# End: page-specific settings
	#
	
	# Place your html content in a file called content/en_pagename.php

	include ($_SERVER['DOCUMENT_ROOT'] . '/eclipse.org-common/system/form_security.class.php');
	$security = new FormSecurity();
	
	?>
			<div class="form">
					<form action="spotProcess.php" method="POST" name="spotForm">
					<table width="240" class="formBox">
						<tr>
							<td>Name<span class="required">*</span>:</td>
							<td><input type="text" name="name" id="name"/></td>
						</tr>
						<tr>
							<td>City<span class="required">*</span>:</td>
							<td><input type="text" name="city" id="city"/></td>
						</tr>
						<tr>
							<td>State/Prov:</td>
							<td><input type="text" name="state" id="state"/></td>
						</tr>
						<tr>
							<td>Country<span class="required">*</span>:</td>
							<td><input type="text" name="country" id="country"/></td>
						</tr>
						<tr>
							<td colspan="2">
								<input name="type" type="radio" value="Blog" id="Blog" checked onclick="checkReq('Blog');"/>Blog
								<input name="type" type="radio" value="Message" id="Message" onclick="checkReq('Message');"/>Message
								<input name="type" type="radio" value="Recording" id="Recording" onclick="checkReq('Recording');"/>Recording
							</td>
						</tr>
						<tr>
							<td><div id="">Title:</div></td>
							<td><div id=""><input type="text" name="title" id="title" value=""/></div></td>
						</tr>
						<tr>
							<td>URL<span id="urlReq"class="required">*</span>:</td>
							<td><input type="text" name="url" id="url" value="http://"/></td>
						</tr>
						<tr>
							<td valign="top">Message<span id="messageReq" class="required invisible">*</span>:</td>
							<td valign="top"><textarea cols=15 name="content" id="content"></textarea><br/><span style="font-size:80%;">(256 Character Max)</span></td>
						</tr>						
						<tr>
							<td colspan="2"><br/></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" name="email" id="email"/></td>
						</tr>
						<tr>
							<td>Human Validation: <?=$security->EasySecureQuestion("text", 20); ?></td>
							<td><input type="text" name="useranswer"/></td>
						<tr>
							<td colspan="2" style="font-size:80%;">To be included in the <a href="./aroundtheworld.php">Ganymede Around the World Contest</a> be sure to provide us with your email address.</td>
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
								<input type="hidden" name="securityanswer" value="<?=$security->getStoredCrypt();?>"/>
								<input type="button" value="Submit" onclick="fetchLocation();"/>
							</td>
						</tr>						
					</table>
				</form>
			</div>
