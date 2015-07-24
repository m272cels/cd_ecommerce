<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="/assets/superhero.css">
	<script src="/assets/jquery-1.11.3.min.js"></script>
	<script src="/assets/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/stars.css">
	<script src="/assets/star.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var id = $('#pro_id').val();
			console.log(id);
	        $.get('/main/user_nav', function(res){
	        $('#nav').html(res);
	        })

	        $.get('/products/show_reviews/'+id, function(res){
	        	$('#cust_reviews').html(res);
	        })

	        $(document).on('submit', '#addreview', function(){
	        	$.post('/products/addreview/', $(this).serialize(),function(res){
	        		$('#cust_reviews').html(res);
	        	})
	        	return false;
	        })
	    })
	</script>
</head>

<body>

	<div class="container">
		<div id="nav" class="row">
		</div>
	<div id="title" class="col-lg-offset-1">
		<a href="/products">Go Back</a>
		<h2><?=$product['name']?></h2>
	</div>
	<div id="pictures" class="col-lg-3 col-lg-offset-1">
		<div id="main_pic">
			<img src="<?="/assets/".$main_img['source']?>" alt="main picture">
		</div>

		<div id="small-pics">
<?php
			foreach ($images as $img)
			{ ?>
			<div class="other_images">
				<img src="<?="/assets/".$img['source']?>" alt="<?=$img['alt']?>">

			</div>
<?php		}
		
?>
		</div>
	</div>
	<div id="description" class="col-lg-7 col-lg-offset-1">
		<p><?=$product['description']?></p>
<?php
		if ($product['count_in_stock'] < 1) { ?>
		<div class="col-sm-2">
			<p>Product Unavailable</p>
			<form>
				<input id="pro_id" type="hidden" name="prod_id" value="<?=$product['id']?>">
			</form>
		</div>
			
<?php
		} else {
?>
		<p>Quantity in stock: <?=$product['count_in_stock']?></p>
		<form action="/addproduct/<?=$product['id']?>" method="post">
			<div class="form-group col-sm-2">
				<input type="number" name="quantity" min="1" max="10" value="1" class="form-control"> 
			</div>
			<input id="pro_id" type="hidden" name="prod_id" value="<?=$product['id']?>">
			<button type="submit" class="btn btn-primary">Buy</button>
			<!-- <input class="" type="submit" value="Buy"> -->
		</form>
	
	
<?php  }
?>
</div>
		<div id="similar" class="col-lg-10 col-lg-offset-1">
		<h4>Similar Items</h3>
<?php
	if(empty($similar_products))
		{ ?>
		<h5>No similar items!</h5>
<?php	}
	else {
		foreach ($similar_products as $index => $products) {
?>
		<div class="col-lg-2">
			<a href="/showproduct/<?=$products['id']?>"><img class="similar-products" src="/assets/<?=$products['source']?>" alt="/assets/<?=$products['alt']?>"></a>
			<p>$<?=$products['price']?></p>
			<p><?=$products['name']?></p>
		</div>
<?php	}
	

	}
?>
	</div>
	<div id="reviews" class="col-lg-10 col-lg-offset-1">
		<h4>Customer Reviews</h4>
		<div id="cust_reviews" class="col-sm-10">
		</div>


	</div>


	</div>


</body>
</html>
