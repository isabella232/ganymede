<?php
	header("Cache-control: no-cache");
	header('Content-type: application/xml;"',true);
	include ($_SERVER['DOCUMENT_ROOT'] . '/eclipse.org-common/system/smartconnection.class.php');
	$dbc = new DBConnection();
	$dbh = $dbc->connect();
	$query = "SELECT * from ganymede_spots as GS INNER JOIN ganymede_content as GC on GS.id = GC.id";
	$result = mysql_query ($query) or die ($query . mysql_error());
?>
<markers>
<?
	while ($rr = mysql_fetch_array($result))
	{
		
		$name = $rr['name'];
		$location_city = $rr['location_city'];
		$location_state = $rr['location_state'];
		$location_country = $rr['location_country'];
		$randLat = rand (-99, 99) / 1000;
		$randLng = rand (-99, 99) / 1000;
		$location_lat = $rr['location_lat'] + $randLat;
		$location_lng = $rr['location_lng'] + $randLng;
		$location = $location_city . ', ' . $location_country;
		$email = $rr['email'];
		$title = $rr['title'];
		$type = ucfirst($rr['type']);
		if ($type != "Message")
		{
			$url = $rr['url'];
			if (strpos($url, "http://") === FALSE) 
			{
				$url = "http://" . $url;
			}
			
		}
		
		$content = $rr['content'];
		?><marker lat="<?=$location_lat;?>" lng="<?=$location_lng;?>" location="<?=$location;?>" author="<?=$name;?>" title="<?=$title;?>" type="<?=$type;?>" <? if (isset($url)) { ?>url="<?=$url;?>" <? } ?>>
			<![CDATA[<?=$content;?>]]>
		</marker> 
		<?
	} ?>
</markers>
