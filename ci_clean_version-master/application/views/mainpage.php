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
	</style>
</head>
<body>
<?php
$this->load->view('usernavbar');
?>


	<div class='col-lg-3 col-lg-offset-1'>
    		<button type="button" class="list-group-item"><span class="badge">25</span>Cras justo odio</button>
			<button type="button" class="list-group-item"><span class="badge">22</span>Dapibus ac facilisis in</button>
			<button type="button" class="list-group-item"><span class="badge">17</span>Morbi leo risus</button>
			<button type="button" class="list-group-item"><span class="badge">12</span>Porta ac consectetur ac</button>
			<button type="button" class="list-group-item"><span class="badge">8</span>Vestibulum at eros</button>
			<button type="button" class="list-group-item"><span class="badge">8</span>Vestibulum at eros</button>
			<button type="button" class="list-group-item"><span class="badge">8</span>Vestibulum at eros</button>
			<button type="button" class="list-group-item"><span class="badge">8</span>Vestibulum at eros</button>
			<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
			<a href="">Show More</a>
		</div>




	<div class='col-lg-6 col-lg-offset-1'>
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
		      <img height='300' width='605' src="http://41.media.tumblr.com/f2bc71b199760a69cfb138e28e5e254d/tumblr_my7g0wvn0I1r6w81vo1_500.png" alt="...">
		      <div class="carousel-caption">
		        This is hobbit swag 1
		      </div>
		    </div>
		    <div class="item">
		      <img height='300' width='605'  src="https://babbleon5.files.wordpress.com/2012/07/hobbit.jpg" alt="...">
		      <div class="carousel-caption">
		        This is hobbit swag 2
		      </div>
		    </div>
		    <div class="item">
		      <img height='300' width='605' src="http://33.media.tumblr.com/1b1d510db32585cec31ec3bad9f91553/tumblr_mz5acetFVi1togp1no1_500.gif" alt="...">
		      <div class="carousel-caption">
		        This is hobbit swag 3
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


</body>
</html>