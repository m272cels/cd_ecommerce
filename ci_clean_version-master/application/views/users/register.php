<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	<title>Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="/assets/superhero.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
<?php
 if($this->session->flashdata("errors")) 
 {
  echo "$(window).load(function(){
        $('#myModal').modal('show');
    });";
 }
 if($this->session->flashdata("success")) 
 {

 }
?>	

		})
	</script>
	<style type="text/css">
	#space{
		height: 75px;
	}
	#registration{
		margin-top: 100px;
		background: #757575;
		height: 440px;
		border-radius: 20px;
		padding-top: 15px;
		border: 2px solid black;
	}
	#background{
		background-color: #212121;
		height:650px;
	}
	#red{
		color: red;
	}
	form{
		color: black;
		margin-bottom: 10px;
	}
	button{
		margin-top: 10px;
	}

	</style>
</head>

<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Errors</h4>
      </div>
      <div class="modal-body">
<?php
 if($this->session->flashdata("errors")) 
 {
  echo $this->session->flashdata("errors");
 }
?>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div id='background'class='col-sm-12'>
	<div id='registration'class='col-sm-4 col-sm-offset-4'>
		<form class='col-sm-10 col-sm-offset-1' action='/users/register' method='post'>
			<h1>Registration</h1>
			<p>Name</p>
			<input class='col-sm-12'type='text' name='name'>
			<p>Email</p>
			<input class='col-sm-12'type='email' name='email'>
			<p>Alias</p>
			<input class='col-sm-12'type='text' name='alias'>
			<p>Password</p>
			<input class='col-sm-12'type='password' name='password'>
			<p>Confirm Password</p>
			<input class='col-sm-12'type='password' name='confirm_password'>
			<button>Register</button>
		</form>
	</div>
</div>

</body>
</html>
