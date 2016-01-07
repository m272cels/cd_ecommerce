<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="/assets/superhero.css">
	<link rel="stylesheet" type="text/css" href="/assets/login.css">
	<script src="/assets/jquery-1.11.3.min.js"></script>
	<script src="/assets/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/style.css">
	<script type="text/javascript">
		$(document).ready(function(){
			$(function() {
			    $('#login-form-link').click(function(e) {
					$("#login-form").delay(100).fadeIn(100);
			 		$("#register-form").fadeOut(100);
					$('#register-form-link').removeClass('active');
					$(this).addClass('active');
					e.preventDefault();
				});
				$('#register-form-link').click(function(e) {
					$("#register-form").delay(100).fadeIn(100);
			 		$("#login-form").fadeOut(100);
					$('#login-form-link').removeClass('active');
					$(this).addClass('active');
					e.preventDefault();
				});

			});

			<?php
 if($this->session->flashdata("errors")) 
 {
  echo "$(window).load(function(){
        $('#myModal').modal('show');
    });";
 }
 if($this->session->flashdata("success")) 
 {
 	echo "$(window).load(function(){
        $('#myModal').modal('show');
    });";
 }
?>	
		})


	</script>
</head>
<body>
	<div class="container">
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
 if($this->session->flashdata('success'))
 {
 	echo $this->session->flashdata('success');
 }
?>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
<?php 
					if($this->session->userdata('failreg') == 0)
					{ ?>
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link"><b>Login</b></a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link"><b>Register</b></a>
							</div>
<?php				}
					else 
					{ ?>
							<div class="col-xs-6">
								<a href="#"  id="login-form-link"><b>Login</b></a>
							</div>
							<div class="col-xs-6">
								<a href="#" class="active" id="register-form-link"><b>Register</b></a>
							</div>
<?php	}
?>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
<?php  		if($this->session->userdata('failreg') == 0)
			{ ?>
								<form id="login-form" action="/users/login" method="post" role="form" style="display: block;">
<?php		} else { ?>
								<form id="login-form" action="/users/login" method="post" role="form" style="display: none;">
<?php } ?>
								
									<div class="form-group">
										<input type="text" name="email_login" id="username" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password_login" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>

								</form>
<!-- THIS NEEDS TO BE FIXED -->
<?php  		if($this->session->userdata('failreg') == 0)
			{ ?>
									<form id="register-form" action="/users/register" method="post" role="form" style="display: none;">
<?php		} else { ?>
									<form id="register-form" action="/users/login" method="post" role="form" style="display: block;">
<?php } ?>
<!-- THIS NEEDS TO BE FIXED -->
								<form id="register-form" action="/users/register" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="alias" id="alias" tabindex="1" class="form-control" placeholder="Alias" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
