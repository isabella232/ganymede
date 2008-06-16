<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/eclipse.org-common/system/smartconnection.class.php');
	
function ganymedeBlogs($count=10) {
	$dbc = new DBConnection();
	$dbh = $dbc->connect();
	$query = "SELECT * from ganymede_spots as GS INNER JOIN ganymede_content as GC on GS.id = GC.id WHERE GC.type = 'Blog' ORDER by GS.id DESC LIMIT $count";
	$result = mysql_query ($query) or die ($query . mysql_error());
	ob_start();
	echo "<ul>";
	while ($rr = mysql_fetch_array($result))
	{
		$author = $rr['name'];
		$title  = $rr['title'];
		$url    = $rr['url'];
		?>
		<li>
			<a href="<?=$url;?>" target="_blank"><? if ($title != "") { echo $title; } else { echo $url; } ?></a> - <?=$author;?>
		</li>
	<? } ?>
	<li class="more">
		<div class="more">
			<a href="mapList.php">Read More</a>
		</div>
	</li>	
	<?
	echo "</ul>";
	$output = ob_get_clean();
	mb_convert_encoding($output, "HTML-ENTITIES", "UTF-8");
	return $output;
} ?>