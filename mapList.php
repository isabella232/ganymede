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
	header("Cache-control: no-cache");
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank)
	# $Nav->addCustomNav("My Link", "mypage.php", "_self");
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank");

	# End: page-specific settings
	#
	function displayPager($_start, $_pageValue, $_pageCount)
	{
		ob_start();
		?>
		<table width="700">
				<tr>
					<td align="left">
				<?
					if ($_start >= $_pageValue)
					{
						?><a href="mapList.php?start=<?=$_start-$_pageValue;?>"><< Previous Page</a><?
					}
				?>&nbsp;</td>
					<td align="right">
				<?
					if (($_start + $_pageValue) < $_pageCount)
					{
						?><a href="mapList.php?start=<?=$_start+$_pageValue;?>">Next Page >></a><?
					}
				?>
					</td>
				</tr>
			</table>
		<?
		return ob_get_clean();
	}	
	if (isset($_GET['start']))
		$start = $_GET['start'];
	$pageValue = 25;
	if (!$start)
		$start = 0;
		
	$pager = " LIMIT $start, $pageValue";
	
	# Place your html content in a file called content/en_pagename.php
	include ($_SERVER['DOCUMENT_ROOT'] . '/eclipse.org-common/system/smartconnection.class.php');
	$dbc = new DBConnection();
	$dbh = $dbc->connect();
	
	if (isset($_GET['sort'])) {
		$sortBy = " ORDER BY " . $_GET['sort'] . " ASC";
	}
	else 
		$sortBy = " ORDER BY GS.id DESC";
	
	$sql = "SELECT count(*) AS count FROM ganymede_spots";
	$result = mysql_fetch_array(mysql_query($sql));
	$count = $result['count'];
		
	$sql = "SELECT * FROM ganymede_spots AS GS INNER JOIN ganymede_content AS GC ON GS.id = GC.id" . $sortBy . $pager;
	$result = mysql_query($sql);
	
	ob_start();
	?>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<body>
		<div id="midcolumn">
  			<h1><?=$pageTitle;?></h1><br/>
  			<?=displayPager($start, $pageValue, $count);?>
			<table cellspacing=0 cellpadding=0 class="list" width="700">
				<tr class="header">	
					<td width="200"><a href="<?$_SERVER['PHP_SELF'];?>?sort=name">Name</a></td>
					<td width="200"><a href="<?$_SERVER['PHP_SELF'];?>?sort=location_country">Location</a></td>
					<td width="300">Content</td>
				</tr>
				<? while ($rr = mysql_fetch_array($result)) { ?>
				<tr>
					<td><?=$rr['name']; ?></td>
					<td><?=$rr['location_city'];?>, <?=$rr['location_country'];?></td>
					<td>
						<? echo ucfirst($rr['type']);
						$url = $rr['url'];
						$titleStart = "";
						$titleEnd = "";
						if ($url != "") {
							if (strpos($url, 'http://') === FALSE) {
								$url = "http://" . $url;
							}
							$titleStart = ' - <a href="'.$url.'" target="_blank">';
							$titleEnd = '</a>'; 
						}
						if ($rr['title'] != "") {  
							$title = $titleStart . $rr['title'] . $titleEnd;
						} 
						else { 
							$title = $titleStart . $url . $titleEnd;
						}
						echo $title . '<br/>' . $rr['content'];
						?>
					</td>
				</tr>
				<? } ?>	
			</table>
			<?=displayPager($start, $pageValue, $count);?><br/><br/>
		</div>
		<div id="rightcolumn">
			<div class="sideitem">
				<h6>Ganymede Around the World</h6>
					<ul>
						<li><a href="./">Ganymede</a></li>
						<li><a href="./map.php">Ganymede Map</a></li>
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