<?php 
function rss_to_news_html($file_name, $category, $count) {
	$rss = simplexml_load_file($file_name);
	ob_start();
	?>
		<ul>
	<?
	try {
		foreach ($rss->channel as $channel) 
		{
			$colorToggle = 1;
		//	echo "<pre>"; var_dump($channel); echo "</pre>";			
			foreach ($channel->item as $item) 
			{
				if ($count == 0) break;
				$now = strtotime("now");
				$then = strtotime($item->pubDate);
				$stringDate = date("I", $now);
				if ($stringDate == 1){
				$then -= 3600; }
				$difference = $now - $then; 
				switch ($difference) {
					case $difference > 604800:
						$ago = floor($difference / 604800);
						if ($ago ==1)
						{
							$ago = "+$ago&nbsp;week&nbsp;ago";						
						}
						else 
						{
							$ago = "+$ago&nbsp;weeks&nbsp;ago";
						}
						break;
					case $difference > 86400:
						$ago = floor($difference / 84600);
						if ($ago == 1)
						{
							$ago = "+$ago&nbsp;day&nbsp;ago";						
						}
						else
						{
							$ago = "+$ago&nbsp;days&nbsp;ago";						
						}
						break;
					case $difference > 3600;
						$ago = floor($difference / 3600);
						if ($ago == 1)
						{
							$ago = "+$ago&nbsp;hour&nbsp;ago";						
						}
						else
						{
							$ago = "+$ago&nbsp;hours&nbsp;ago";						
						}
						break;
					case $difference > 0:
						$ago = floor($difference / 60);
						if ($ago == 1)
						{
							$ago = "+$ago&nbsp;minute&nbsp;ago";						
						}
						else
						{
							$ago = "+$ago&nbsp;minutes&nbsp;ago";						
						}
						break;
						
				}
				$pluginExists = strpos($item->title, "Plugin:");
				if ($pluginExists)
				{
					$pluginExists += 7;
					if (strpos($item->title, "New ") === 0)
					{
						$pluginImage = "/home/images/new.gif";
					}
					if (strpos($item->title, "Updated ") === 0)
					{
						$pluginImage = "/home/images/updated.gif";
					}
					$item->title = trim(substr($item->title, $pluginExists));
					$titleExploded = explode("- v", $item->title, 2);
					if ($titleExploded[1] != "")
						$item->title = $titleExploded[0] . "<span class=\"version\">v". $titleExploded[1] . "</span>";
					else {
						$item->title = $titleExploded[0];
					}	
					
				}
				
				if ($category != "")
				{
					foreach ($item->category as $categoryIterator)
				 	{
						if ($categoryIterator == $category)
						{
						?>   
							<li><a href="<?=$item->link;?>" target="_blank"><?=$item->title;?>
							</a> 
							<span class="posted"><?=$ago?></span>
							<p><?=$item->description;?></p>
							</li>
							<?
							$count--;
						}
				 	}
				}
				else
				{
					?><li><? if ($pluginImage != NULL){ ?><img src="<?=$pluginImage;?>"/><? } ?> <a href="<?=$item->link;?>"><?=$item->title;?></a> <span class="posted"><?=$ago?></span></li><?
					$count--;
				}
			 
			}
		}
	}
	catch (Exception $e){
		echo '<!-- Error in NewsFeed - $file_name - '. $e->getMessage() . " -->";
	}		
	?>

		</ul>
	<?
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}
?>