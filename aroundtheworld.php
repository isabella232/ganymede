<?php
/**
 * Copyright (c) 2015, 2018 Eclipse Foundation.
 *
 * This program and the accompanying materials are made
 * available under the terms of the Eclipse Public License 2.0
 * which is available at https://www.eclipse.org/legal/epl-2.0/
 *
 * Contributors:
 *   Nathan Gervais (Eclipse Foundation) - Initial implementation
 *   Eric Poirier (Eclipse Foundation)
 *
 * SPDX-License-Identifier: EPL-2.0
 */
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");

$App = new App();
$Theme = $App->getThemeClass();

include ($App->getProjectCommon());

// Begin: page-specific settings. Change these.
$pageTitle = "Ganymede Around the World Contest";
$Theme->setPageTitle($pageTitle);
$Theme->setPageKeywords("ganymede, world, contest, blog, podcast, video");
$Theme->setPageAuthor("Lynn Gayowski");

ob_start();
include ("content/en_" . $App->getScriptName());
$html = ob_get_clean();

$App->AddExtraHtmlHeader('<link type="text/css" href="/ganymede/style.css" rel="stylesheet"/>');
$Theme->setHtml($html);
$Theme->generatePage();