<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	<title>Login and Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<style type="text/css">
	#space{
		height: 75px;
	}
	</style>
</head>

<body>
	<div id='space' class='col-lg-12'></div>
	<div id="title" class="col-lg-offset-1">
		<a href="">Go Back</a>
		<h2>Black Belt for Staff (product name)</h2>
	</div>
	<div id="pictures" class="col-lg-3 col-lg-offset-1">
		<img src="" alt="main picture">
		<div id="small-pics">
			<img src="" alt="smallpics">
			<img src="" alt="smallpics">
			<img src="" alt="smallpics">
			<img src="" alt="smallpics">
			<img src="" alt="smallpics">
			<img src="" alt="smallpics">
		</div>
	</div>
	<div id="description" class="col-lg-7">
		<p>Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...Description about the product...</p>
		<p>Quantity in stock: 9001</p>
		<form action="" method="post">
			<input type="number" name="quantity">
			<button>Buy</button>
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
</body>
</html>