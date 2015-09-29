<?php
/*******************************************************************************
 * Copyright(c) 2015 Eclipse Foundation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *    Nathan Gervais (Eclipse Foundation) - Initial implementation
 *    Eric Poirier (Eclipse Foundation)
 *******************************************************************************/
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");

$App = new App();
$Nav = new Nav();
$Menu = new Menu();
include($App->getProjectCommon()); // All on the same line to unclutter the user's desktop'


// Begin: page-specific settings. Change these.
$pageTitle 		= "Ganymede Around the World";
$pageKeywords	= "eclipse ganymede, ganymede, ganymede around the world";
$pageAuthor		= "Nathan Gervais";

// Place your html content in a file called content/en_pagename.php
ob_start();
include("content/en_" . $App->getScriptName());
$html = ob_get_clean();

# Generate the web page
$App->AddExtraHtmlHeader('<link type="text/css" href="/ganymede/style.css" rel="stylesheet"/>');
$App->AddExtraHtmlHeader('<link type="text/css" href="/ganymede/layout.css" rel="stylesheet"/>');
$App->generatePage(NULL, $Menu, NULL, $pageAuthor, $pageKeywords, $pageTitle, $html);