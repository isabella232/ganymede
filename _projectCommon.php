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

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");

$theme = NULL;
$App->Promotion = FALSE;

$App->setOutDated('2011-11-11', '<a href="https://projects.eclipse.org/releases/ganymede">Ganymede</a> is a past version of Eclipse. Please visit our <a href="/downloads/">download</a> page for the latest version of Eclipse. ');

$Nav = new Nav();
$Nav->addNavSeparator("Ganymede", "");
$Nav->addCustomNav("Download Ganymede", "/downloads/packages/", "_self", 1);
$Nav->addCustomNav("Learn more about Ganymede", "/ganymede/learn.php", "_self", 1);
$Nav->addCustomNav("Ganymede Buzz", "/ganymede/buzz.php", "_self", 1);
$Nav->addCustomNav("Ganymede Around the World", "/ganymede/mapList.php", "_self", 1);
$Theme->setNav($Nav);
