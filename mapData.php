<?php
	header('Content-type: application/xml; charset="utf-8"',true);
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
		$location_lat = $rr['location_lat'];
		$location_lng = $rr['location_lng'];
		$email = $rr['email'];
		$type = $rr['type'];
		$content = $rr['content'];
		?><marker lat="<?=$location_lat;?>" lng="<?=$location_lng;?>" author="<?=$name;?>" type="<?=$type;?>">
			<![CDATA[<?=$content;?>]]>
		</marker> 
		<?
	} ?>
</markers>
