<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/eclipse.org-common/system/smartconnection.class.php');
	
function ganymedeBlogs($count=10) {
	$dbc = new DBConnection();
	$dbh = $dbc->connect();
	$query = "SELECT * from ganymede_spots as GS INNER JOIN ganymede_content as GC on GS.id = GC.id WHERE GC.type = 'Blog' ORDER by id DESC LIMIT $count";
	$result = mysql_query ($query) or die ($query . mysql_error());
	ob_start();
	echo "<ul>";
	while ($rr = mysql_fetch_array($result))
	{
		$author = $rr['author'];
		$title  = $rr['title'];
		$url    = $rr['url'];
		?>
		<li>
			<a href="<?=$url;?>" target="_blank"><? if ($title != "") { echo $title; } else { $url; } ?></a> - <?=$author;?>
		</li>
	<? }
	echo "</ul>";
	$output = ob_get_clean();
	return $output;
} ?>