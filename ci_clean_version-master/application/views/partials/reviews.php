<h5><span id="countrev"><?=$count['count']?></span> customer reviews</h5>
<?php

		if(empty($hasreview))
		{?>
			<div>
			<form id="addreview" method="post" class="">
				<p>Add A Review:</p>
				<div class="row lead">
			        <div class="col-sm-3">
			        	<div id="stars" class="starrr"></div>
			        </div>
			        	
				</div>
				<input id="pr_id" type="hidden" name="prod_id" value="<?=$product['id']?>">
				<input type="hidden" id="star_rating" name="rating" value="">
				<div id="reviewtxt" class="col-sm-7">
					<textarea id="review" name="review" class="form-control" row="5"></textarea>
				</div>
				<div class="col-sm-1">
					<button type="submit" class="btn btn-primary">Add Review</button>
				</div>
			</form>
		</div>
<?php	}
	foreach($reviews as $review) 
	{ ?>
	<div class="col-sm-12 user-reviews">
		<p class="written">By <?=$review['alias']?> on <?=$review['dt']?> - Rating: <?=$review['rating']?></p>
		<p class="txt"><?=$review['review']?></p>
		<div class="starrr" data-rating='<?=$review['rating']?>'></div>
	</div>
<?php	}
?>