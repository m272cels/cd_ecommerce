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
<?php
 if($this->session->flashdata("errors")) 
 {
  echo $this->session->flashdata("errors");
 }
?>

	<div id='space' class='col-lg-12'></div>

	<div id='registration' class='col-lg-4 col-lg-offset-2'>
		<form action='/users/register' method='post'>
			<h3>Registration</h3>
			<p>Name</p>
			<input type='text' name='name'>			
			<p>Email</p>
			<input type='email' name='email'>
			<p>Alias</p>
			<input type='text' name='alias'>
			<p>Password</p>
			<input type='password' name='password'>
			<p>Confirm Password</p>
			<input type='password' name='confirm_password'>
			<button>Register</button>
		</form>
	</div>


</body>
</html>