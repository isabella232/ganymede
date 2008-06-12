

<? 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/smartconnection.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/classes/projects/projectInfoList.class.php");

function findGanymedeRelease($releases)
{
	$retval = array();
	foreach ($releases as $rr)
	{
		if ($rr->date == "2008-06-25")
		{
			$retval['download'] =  $rr->download;
			$retvla['version'] = $rr->name;
		}
	}

}

function projectTable($pillarType)
{
	ob_start();
	?>
	<table cellspacing=0 class="projectTable">
		<tr>
			<td colspan=5 class="tableHeaderTitle">Eclipse Ganymede Projects</td>
		</tr>
		<tr>
			<td class="tableHeader" width="35%">Project Name</td>
			<td class="tableHeader" width="10%" align="center">Homepage</td>
			<td class="tableHeader" width="12%" align="center">Version</td>
			<td class="tableHeader" width="12%" align="center">New And Noteworthy</td>
			<td class="tableHeader" width="12%" align="center">Download</td>
		</tr>
	<?
	$projectInfoList = new projectInfoList();
	$projectInfoList->selectProjectInfoList(NULL, 'simultaneousrelease', 'ganymede');
	$projectInfoList->alphaSortList();
	
	$numProjects = $projectInfoList->getCount();
	
	for ($i = 0; $i < $numProjects; $i++)
	{
		$projectInfoIterator = $projectInfoList->getItemAt($i);
		$projectName = $projectInfoIterator->projectname;
		$projectShortName = $projectInfoIterator->projectshortname;
		$download = $projectInfoIterator->downloadsurl;
		$url = $projectInfoIterator->projecturl;
		$releases = $projectInfoIterator->releases;
		$releaseInfo = findGanymedeRelease($releases);
	?>	<tr class="tableRow">
			<td><b><?=$projectName;?></b></td>
			<td align="center"><a href="<?=$url;?>"><img src="images/homepage.gif"></a></td>
			<td align="center"><?=$releaseInfo['version'];?></td>
			<td align="center"><a href="http://www.eclipse.org/ajdt/whatsnew15/">New</a></td>
			<td align="center"><a href="<?=$releaseInfo['download'];?>/">Download</a></td>
		</tr> 
	<?
	}
	?> 
	</table>
	<?	
	$html = ob_get_contents();
	ob_end_clean();
	
	return $html;
} ?>
