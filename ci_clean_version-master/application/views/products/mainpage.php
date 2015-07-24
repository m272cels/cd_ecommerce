<html>
<head>
	<title>Main</title>
	<link rel="stylesheet" type="text/css" href="/assets/superhero.css">
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<script src="/assets/jquery-1.11.3.min.js"></script>
	<script src="/assets/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/mainpage.css">
	<script>
	$(document).ready(function(){
		$('.carousel').carousel();
		///Original get by price
		$.get("/products/mainpage_products_json_price", function(products) {
            html='';
            for(var i=0;i<products.length;i++)
            {
            	html+="<div class='col-sm-2 list'><a href='/showproduct/"+products[i]['product_id']+"'><img class='image' src='../assets/"+products[i]['source']+"' alt=''></a><p class='overlay'><span>Price: "+products[i]['price']+"</span></p></div>";
            }
            $('#listings').html(html);
        }, "json");
        ///If select option is changed, get depending on choice of category
        $(document).on("change",'#select', function() {
        	if($('#select').val()=='popular'){
	        	$.get("/products/mainpage_products_json_popularity/"+$('#sort_category').val(), function(popular) {
	            html='';
	            for(var j=0;j<popular.length;j++)
	            {
	            	html+="<div class='col-sm-2 list'><a href='/showproduct/"+popular[j]['id']+"'><img class='image' src='../assets/"+popular[j]['source']+"' alt=''></a><p class='overlay'><span>Price: "+popular[j]['price']+"</span></p></div>";
	            }
	            $('#listings').html(html);
	        	}, "json");
	        }
        	else
        	{
	        		$.get("/products/mainpage_products_json_price_default/"+$('#sort_category').val(), function(price) {
	            html='';
	            for(var k=0;k<price.length;k++)
	            {
	            	html+="<div class='col-sm-2 list'><a href='/showproduct/"+price[k]['product_id']+"'><img class='image' src='../assets/"+price[k]['source']+"' alt=''></a><p class='overlay'><span>Price: "+price[k]['price']+"</span></p></div>";
	            }
	            $('#listings').html(html);
	        	}, "json");
        	}
				})
		///if #name_select is chosen, query depending on value of search
        $(document).on("change",'#select_name', function() {
        	if($('#select_name').val()=='popular'){
	        	$.get("/products/search_json_sort_pop/"+$('#sort_category').val(), function(popular) {
	        		console.log(popular);
	            html='';
	            for(var j=0;j<popular.length;j++)
	            {
	            	html+="<div class='col-sm-2 list'><a href='/showproduct/"+popular[j]['id']+"'><img class='image' src='../assets/"+popular[j]['source']+"' alt=''></a><p class='overlay'><span>Price: "+popular[j]['price']+"</span></p></div>";
	            }
	            $('#listings').html(html);
	        	}, "json");
	        }
        	else
        	{
	        		$.get("/products/search_json_sort_price/"+$('#sort_category').val(), function(price) {
	        			console.log(price);
	            html='';
	            for(var k=0;k<price.length;k++)
	            {
	            	html+="<div class='col-sm-2 list'><a href='/showproduct/"+price[k]['product_id']+"'><img class='image' src='../assets/"+price[k]['source']+"' alt=''></a><p class='overlay'><span>Price: "+price[k]['price']+"</span></p></div>";
	            }
	            $('#listings').html(html);
	        	}, "json");
        	}
				})		
		///Select get by category
		$('button').click(function(){
			if($(this).attr('name')=='0')
			{
				$(this).attr('name','1');
				$.get('/products/category_json/'+$(this).attr('id'), function(category){
					html='';
					var tag = "<h4 class='col-sm-1 col-sm-offset-6'>Sort:</h4><div class='col-sm-2'><form><input type='hidden' name='sort_category' value='"+category[0]['category_id']+"' id='sort_category'><select id='select' class='form-control col-sm-1'><option value='price'>Price</option><option value='popular'>Popularity</option></select></form></div>";
		            for(var l=0;l<category.length;l++)
		            {
		            	html+="<div class='col-sm-2 list'><a href='/showproduct/"+category[l]['product_id']+"'><img class='image' src='../assets/"+category[l]['source']+"' alt=''></a><p class='overlay'><span>Price: "+category[l]['price']+"</span></p></div>";
		            }
		            $('#listings').html(html);
		            $('#the_form').html(tag);
					},'json');
				}
			else
			{
				$(this).attr('name','0');
				$.get("/products/mainpage_products_json_price", function(products) {
            	html='';
	            for(var i=0;i<products.length;i++)
	            {
	            	html+="<div class='col-sm-2 list'><a href='/showproduct/"+products[i]['product_id']+"'><img class='image' src='../assets/"+products[i]['source']+"' alt=''></a><p class='overlay'><span>Price: "+products[i]['price']+"</span></p></div>";
	            }
	            $('#listings').html(html);
	        	}, "json");
			}
		})
		///Search bar Ajax
		$('#search').keyup(function(){
			$.post('/products/search_json', $(this).serialize(), function(search){
				html='';
				var tag = "<h4 class='col-sm-1 col-sm-offset-6'>Sort:</h4><div class='col-sm-2'><form><input type='hidden' name='sort_category' value='"+$('#search').val()+"' id='sort_category'><select id='select_name' class='form-control col-sm-1'><option value='price'>Price</option><option value='popular'>Popularity</option></select></form></div>";

	            for(var l=0;l<search.length;l++)
	            {
	            	html+="<div class='col-sm-2 list'><a href='/showproduct/"+search[l]['product_id']+"'><img class='image' src='../assets/"+search[l]['source']+"' alt=''></a><p class='overlay'><span>Price: "+search[l]['price']+"</span></p></div>";
	            }
	            if(html=='')
	            {
	            	html+="<h3>No results</h3>"
	            }
	            $('#listings').html(html);
	            $('#the_form').html(tag);
				}, "json")
			})
		$(function() {
				$( 'input').focusin(function() {
					$('.has-feedback').addClass("showClass");
				});
				$('input').focusout(function() {
					$('.has-feedback').removeClass("showClass");
				});
			});
		$.get('/main/user_nav', function(res){
	        $('#nav').html(res);
	        })
	})
	</script>
	<style type="text/css">
	form{
		margin-top: 0px:;
		margin-bottom: 0px;
}
		</style>
</head>
<body>
	<div class="container">
		<div id="nav" class="row">
		</div>
	<div class='col-sm-8 col-sm-offset-2 carousel_div'>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
			<ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides height='300' width='605' -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="../assets/<?=$carosel[0]['source']?>" alt="...">
		      <div class="carousel-caption font_border">
		       <?= $carosel[0]['name']?>
		      </div>
		    </div>
		    <div class="item">
		      <img   src="../assets/<?=$carosel[1]['source']?>" alt="...">
		      <div class="carousel-caption font_border">
		        <?= $carosel[0]['description']?>
		      </div>
		    </div>
		    <div class="item">
		      <img src="../assets/<?=$carosel[2]['source']?>" alt="...">
		      <div class="carousel-caption font_border">
		        <?= $carosel[0]['price']?>
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
	<div class="row">
		<div class='col-sm-3'>
			<h4 id='categories'>Categories</h4>
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
		echo "<button type='submit' id='{$category['id']}' name='0' class='list-group-item category'><span class='badge'>$count</span>{$category['category']}</button>";
		}
	?>
				<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
				<a href="">Show More</a>
			</div>
		<div class='col-sm-9'>
			<h4 id="products_header">Product listing</h4>
			<div class="row">
				<div class="col-sm-3 ">
		            <form method="post" class="search-form">
		                <div class="form-group has-feedback">
		            		<label for="search" class="sr-only">Search</label>
		            		<input type="text" class="form-control" name="search" id="search" placeholder="Search">
		              		<span class="glyphicon glyphicon-search form-control-feedback"></span>
		            	</div>
		            </form>
		        </div>
		        <div id='the_form'>
				</div>
			</div>
			
			
			
			<div id='listings'>
			</div>

		</div>
	</div>
	
	</div>



</body>
</html>
