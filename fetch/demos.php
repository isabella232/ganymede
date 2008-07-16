<?php
	$documentRoot = $_SERVER['DOCUMENT_ROOT'];
	require_once($documentRoot . "/eclipse.org-common/system/smartconnection.class.php");
	$liveConnection = new DBConnectionLIVE();
	$liveConnection->connect();
	?>
	<table class="webinars" cellspacing=0 cellpadding=0>
	<tr class="header">
		<td width="70%">Title</td>
		<td width="15%">Format</td>
	</tr>
	<?
	$sql = "SELECT cn.nid, n.title, nn.title as format, ncr.field_abstract_value as abstract from category_node as cn
			INNER JOIN node as n on n.nid = cn.nid
			INNER JOIN category_node as cat_node on cat_node.nid = cn.nid
			INNER JOIN node as nn on nn.nid = cat_node.cid
      		INNER JOIN node_content_resource as ncr on ncr.nid = cn.nid
			WHERE cn.cid = 542 AND cat_node.cid IN (18, 19, 20) AND n.status = 1 ORDER by n.created desc";
	$result = mysql_query($sql);
	
	while ($rr = mysql_fetch_array($result))
	{
		$title = mb_convert_encoding($rr['title'], "HTML-ENTITIES");
		$format = $rr['format'];
		$id = $rr['nid'];
		$abstract = strip_tags($rr['abstract']);
		$url = 'http://live.eclipse.org/node/'. $id;
		?>		<tr>
					<td>
						<div id="<?=$id;?>" class="invisible">
							<a class="norgie" onclick="t('<?=$id;?>', '<?=$id;?>a');" name='<?=$name?>'></a>
						</div>
						<a href="<?=$url;?>"><?=$title;?></a>
					</td>
					<td><?=$format;?></td>
				</tr>
				<tr>
					<td colspan="2" class="hidden">
						<div class="invisible" id="<?=$id;?>a">
							<div class="item_contents"><?=$abstract;?></div>
						</div>
					</td>
				</tr>
		<?
	}
?></table>