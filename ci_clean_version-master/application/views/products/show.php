<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	<title>Login and Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/style.css">
	<script type="text/javascript">
		$(document).ready(function() {
	        $.get('/main/user_nav', function(res){
	        $('#nav').html(res);
	        })
	    })
	</script>
</head>

<body>
	<div class="container">
		<div id="nav" class="row">
		</div>
	<div id="title" class="col-lg-offset-1">
		<a href="">Go Back</a>
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
	<div id="description" class="col-lg-7">
		<p><?=$product['description']?></p>
		<p>Quantity in stock: <?=$product['count_in_stock']?></p>
		<form action="/addproduct/<?=$product['id']?>" method="post">
			<input type="number" name="quantity">
			<input type="submit" value="Buy">
		</form>
	</div>
	<div id="similar" class="col-lg-10 col-lg-offset-1">
		<h2>Similar Items</h2>
<?php
	for ($i = 0; $i < 3; $i++) {
?>
		<div class="col-lg-1">
			<a href="/products/show/1"><img src="" alt="similar"></a>
			<p>$19.99</p>
			<p>Black belt</p>
		</div>
<?php
	}
?>
	</div>


	</div>


</body>
</html>
