<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function(){
		$('.carousel').carousel();
		$('.dropdown-toggle').dropdown()

	})
	</script>
	<style type="text/css">
	#helper{
		border: solid black 1px;
		border-radius: 5px;
		height: 360px;
	}
	.active{
  width: auto;
  height: 350px;
  max-height: 350px;

	}
	.list{
  		height: 170px;
  		position: relative;
  		padding: 5px 5px 5px 5px;
  		border: 1px solid black;
  		margin: 5px 0 5px 5px;
	}
	.image{
		width:100%;
		height: 100%;
	}
	.overlay{
		position: absolute;
		top: 130px;
		left:50px;
		width: 100%;
	}
	p span{
	   color: white; 
	   font: bold 12px/25px Helvetica, Sans-Serif; 
	   letter-spacing: -1px;  
	   background: rgb(0, 0, 0);
	   background: rgba(0, 0, 0, 0.7);
	   padding: 10px;		
	}
	#categories{
		border-bottom: 2px solid lightgrey;
		margin-bottom: 20px;
	}
	.category{
		background: lightgrey;
		border: grey 1px solid;
	}
	.carousel_div{
		padding: 5px 5px 5px 5px; 
		border: 1px solid black;
		margin-bottom: 30px;
	}
	h3{
		border-bottom: 2px solid lightgrey;
		padding-bottom: 2px;
		margin-bottom: 20px;
	}
	</style>
</head>
<body>
<?php
$this->load->view('usernavbar');
?>


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

      <img class='image' src='../assets/{$image['source']}' alt='' />
      
      <p class='overlay'><span>Price: {$product['price']}</span></p>

</div>";




		// "<img class='col-sm-4 list' src='../assets/{$image['source']}'>";
	}
?>

	</div>


</body>
</html>