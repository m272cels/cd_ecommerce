<!DOCTYPE html>
<html>
<head>
	<title>(Dashboard Orders)</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/assets/superhero.css">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
    <script src="/assets/jquery-1.11.3.min.js"></script>
	<script src="/assets/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
			$.get('/orders/orderspartial/1/0', function(res){
				$('#orders').html(res);
			})

			$.get('/orders/getpages',function(res){
				$('#pagenumbers').html(res);
			})

			$.get('/main/admin_nav', function(res){
				$('#nav').html(res);
			})

			$(function() {
				$( 'input').focusin(function() {
					$('.has-feedback').addClass("showClass");
				});
				$('input').focusout(function() {
					$('.has-feedback').removeClass("showClass");
				});

			});

			$(document).on('click', '.page', function(){
				var status = $('#status_drop').val();
				var page = $(this).attr('value');
				$('#pagenum').val(page);
				$.get('/orders/orderspartial/'+status+'/'+page, function(res){
					$('#orders').html(res);
				})
				return false;
			})

			$(document).on('change','#status_drop', function(){
				var status = $('#status_drop').val();
				$.post('/orders/orderspartial/'+status+'/0', $(this).serialize(),function(res){
					$('#orders').html(res);
				})

			})

			$(document).on('keyup', '#search', function(){
				var status = $('#status_drop').val();
				var search = $('#search').val();
				if(search.length != 0){
					$.get('/orders/searchorders/'+status+'/'+search, function(res){
					$('#orders').html(res);
				})
				}
				else{
					$.post('/orders/orderspartial/'+status+'/0', $(this).serialize(),function(res){
					$('#orders').html(res);
				})
				}
				
			})

			$(document).on('change', '.status_change', function(){
				var status = $(this).val();
				var id = $(this).parent().first().serializeArray()[0].value;
				var pagenum = $('#pagenum').val();
				var info = {'status' : status, 'id' : id};
				// $.post('/orders/updatestatus', info, function(res){
				// 	$('#orders').html(res);
				// })

				$.get('/orders/updatestatus/'+status+'/'+id+'/'+pagenum, function(res){
					$('#orders').html(res);
				})
			})
		})
    </script>
</head>
<body>
	<div class="container">
		<div id="nav" class="row">

		</div>
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

		    <div class="col-sm-2 col-sm-offset-7">
		    	<form method="post" >
		    		<input type="hidden" id="pagenum" value="0">
					<select id="status_drop" name="status" class="form-control" >
						<option value="1">Show All</option>
						<option value="2">Order in Process</option>
						<option value="3">Need to ship</option>
						<option value="4">Shipped</option>
						<option value="5">Cancelled</option>
					</select>
				</form>
		    </div>
		</div>
		<div class="row">
			<div id="orders" class="col-sm-10 col-sm-offset-1">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3" id="pagenumbers">
			</div>
		</div>
	</div>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.js" />
</body>
</html>
