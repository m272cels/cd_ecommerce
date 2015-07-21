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
 if($this->session->flashdata("success")) 
 {
  echo $this->session->flashdata("success");
 }
?>	
	<div id='space' class='col-lg-12'></div>

	<div id='login' class='col-lg-4 col-lg-offset-4'>
		<form action='/users/login' method='post'>
			<h3>Log-in</h3>
			<p>Email</p>
			<input type='email' name='email'>
			<p>Password</p>
			<input type='password' name='password'>
			<button>Log-in</button>
		</form>
		<a href="/register">Not a user? Register here</a>
	</div>
</body>
</html>