<ul id="pages">
<?php
	//echo $count;
	$pages = ceil(intval($count)/5);
	//echo $pages;
	$count = 0;
	for($i = 1; $i <= $pages; $i++)
	{ 
		if($i == $pages)
		{ ?>
			<li><a class="page" value="<?=$count?>" href=""><?=$i?></a></li>
<?php	}
		else 
		{ ?>
			<li><a class="page" value="<?=$count?>" href=""><?=$i?></a> | </li>
<?php	}
		$count += 5;
	}
?>
</ul>