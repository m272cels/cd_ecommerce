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

	<div id='registration' class='col-lg-4 col-lg-offset-2'>
		<form action='/login' method='post'>
			<h3>Login</h3>
			<p>Email</p>
			<input type='email' name='email'>
			<p>Password</p>
			<input type='password' name='password'>
			<button>Log in</button>
		</form>
	</div>


</body>
</html>