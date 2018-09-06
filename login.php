<?php include_once 'init.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Login - UCC Donor Program</title>
    
    <!-- calm breeze css for login page -->
	<link href="css/style_calm_breeze_login" type="text/css" rel="stylesheet"/>
	
	<!-- For the Google Font -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300' rel='stylesheet' type='text/css'>
    <style>
	#main_homepage_link {
		position:absolute; 
		top:0; 
		left:0; 
		font-weight: bold;
		color: #777;
		height: 50px;
		padding: 15px 15px;
		font-size: 18px;
		line-height: 20px;
		text-decoration:none;
	}
	</style>
 
  </head>

  <body>
 <nav>
 	<a id="main_homepage_link" class="navbar-brand" href="anatomy_homepage.php">UCC Anatomy</a>
 </nav>

<div class="wrapper">
	<div class="container">
		<h1>Welcome back!</h1>
		
		<form role="form" action='log_in.php' method='POST' class="form" id="sign_in_form">

					<input class="input_box" placeholder="E-mail address" name="username" type="email" id="inputEmail"  required>

					<input class="input_box" placeholder="Password" name="password" type="password" id="inputPassword" required>
		
					<div class="check_box">
						<label>Remember Me:</label>
						<input name="remember" type="checkbox" value="yes">
					</div>
					
				<div>
					<button type="submit" id="login-button" style="color:#50a3a2">Sign in</button>
				</div>
				
				<div id="notregistered">
					<p id="register_now" class="centred_text">Not registered? <a href="register.php" id="register_link">Click here</a> to sign up.</p>
				</div>
	
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
   
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>   
    
  </body>
</html>
