<html>
<head>
	<title>Main</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/mainpage.css">
	<script>
	$(document).ready(function(){
		$('.carousel').carousel();

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
		<div class='col-sm-3 col-sm-offset-1'>
		<h5 id='categories'>Categories</h5>
<?php
	foreach($categories as $category)
	{
		$count=0;		
		foreach($products as $product)
		{

			if($product['category']==$category['category'])
			{
				$count++;
			}
		}
	echo "<button type='button' class='list-group-item category'><span class='badge'>$count</span>{$category['category']}</button>";
	}
?>
			<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
			<a href="">Show More</a>
		</div>




	<div class='col-sm-6 col-sm-offset-1 carousel_div'>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
			<ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img height='300' width='605' src="../assets/<?=$carosel[0]['source']?>" alt="...">
		      <div class="carousel-caption">
		        Twin lamps fsho
		      </div>
		    </div>
		    <div class="item">
		      <img height='300' width='605'  src="../assets/<?=$carosel[1]['source']?>" alt="...">
		      <div class="carousel-caption">
		        Leaves and flowers all up in this swag
		      </div>
		    </div>
		    <div class="item">
		      <img height='300' width='605' src="../assets/<?=$carosel[2]['source']?>" alt="...">
		      <div class="carousel-caption">
		        One awesome lamp
		      </div>
		    </div>
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
	<div class='col-sm-10 col-sm-offset-1'>
		<h3>Product listing</h3>
<?php
	foreach($images as $image)
	{
		echo "<div class='col-sm-2 list'>

      <a href='/showproduct/{$image['product_id']}''><img class='image' src='../assets/{$image['source']}' alt=''></a>
      
      <p class='overlay'><span>Price: {$product['price']}</span></p>

</div>";




		// "<img class='col-sm-4 list' src='../assets/{$image['source']}'>";
	}
?>

	</div>
	</div>
	


</body>
</html>