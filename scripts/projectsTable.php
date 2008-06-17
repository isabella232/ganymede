

<? 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/smartconnection.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/classes/projects/projectInfoList.class.php");

function findGanymedeRelease($releases)
{
	$retval = array();
	foreach ($releases as $rr)
	{
		$earlydate = strtotime("2008-06-21");
		$latedate = strtotime("2008-07-01");
		$date = strtotime($rr->date);
		if (($date >= $earlydate) && ($date <= $latedate))
		{
			$retval['version'] = $rr->name;
		}
	}
	return $retval;
}

function projectTable($pillarType)
{
	ob_start();
	?>
	<table cellspacing=0 class="webinars">
		<tr class="header">
			<td width="35%">Project Name</td>
			<td width="12%" align="center">Version</td>
			<td width="10%" align="center">Project Summary</td>
			<? /*<td class="tableHeader" width="12%" align="center">New And Noteworthy</td>*/ ?>
			<td width="12%" align="center">Download</td>
		</tr>
	<?
	$projectInfoList = new projectInfoList();
	$projectInfoList->selectProjectInfoList(NULL, 'simultaneousrelease', 'ganymede');
	$projectInfoList->alphaSortList();
	
	$numProjects = $projectInfoList->getCount();
	
	for ($i = 0; $i < $numProjects; $i++)
	{
		$projectInfoIterator = $projectInfoList->getItemAt($i);
		var_dump ($projectInfoIterator);
		$projectName = $projectInfoIterator->projectname;
		$projectid = $projectInfoIterator->projectID;
		$projectShortName = $projectInfoIterator->projectshortname;
		$download = $projectInfoIterator->downloadsurl;
		$url = $projectInfoIterator->projecturl;
		$releases = $projectInfoIterator->releases;
		$downloadurl = $projectInfoIterator->downloadsurl;
		$releaseInfo = findGanymedeRelease($releases);
	?>	<tr class="tableRow">
			<td><b><?=$projectName;?></b></td>
			<td align="center"><?=$releaseInfo['version'];?></td>
			<td align="center"><a href=http://www.eclipse.org/projects/project_summary.php?projectid=<?=$projectid;?>"><img src="images/homepage.gif"></a></td>
			<td align="center"><? if ($downloadurl != "") {?><a href="<?=$downloadurl;?>">Download</a> <? } ?></td>
		</tr> <?
	}
	?> 
	</table>
	<?	
	$html = ob_get_contents();
	ob_end_clean();
	
	return $html;
} ?>
