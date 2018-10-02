<?php
include_once 'init.php';
	
	if(empty($_POST) === false) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(empty($username) === true || empty($password) === true) {
			$errors[] = 'You need to enter a username and password';
		} else if(user_exists($username) === false) {
			$errors[] = 'We can\'t find that username. have you registered?';
		} else if(user_active($username) === false) {
			// if the user is not active append another element onto the errors array
			$errors[] = 'You have not activated your account yet';
		} else {
			// test the login process here. Check if username and password match, etc.
			$login = login($username, $password);
			
			if($login === false) {
				$errors[] = 'That username/password combination is incorrect.';
			} else {
				
				// set the user session
				$_SESSION['user_id_imports'] = $login;
				
				// redirect the user to the homepage
				header('Location: imports_home.php');
				exit();
			}
		}
		
		// provides a visual representation of the errors array.
		//print_r($errors);
	} else {
		$errors[] = 'No data received.';
	}


// if there are any errors we will loop through our errors
if (empty($errors) === false) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Login - Imports - UCC Donor Program</title>
    
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

   <div class="wrapper_import">
  <div id="show_errors_div" style="background-color: #D3D3D3;width:20%;position:absolute;margin-top: 5%;">
  	<div style="margin: 10px">
	<h2 style="color: black;font-weight: bold;">Oops! Something went wrong. </h2><br/>
	<h3 style="color: black;">We tried to log you in but... </h3>
    </br>
<?php

	echo '<h3 style="color: black; padding-left: 5%;">'.output_errors($errors).'</h3>';
?>	
	</div>
   </div>
	<div class="container">
		<h1>Imports Login</h1>
		
		<form role="form" action='imports_log_in.php' method='POST' class="form" id="sign_in_form">

					<input class="input_box input_box_imports" placeholder="E-mail address" name="username" type="email" id="inputEmail"  required>

					<input class="input_box input_box_imports" placeholder="Password" name="password" type="password" id="inputPassword" required>
		
					<div class="check_box">
						<label>Remember Me:</label>
						<input name="remember" type="checkbox" value="yes">
					</div>
					
				<div>
					<button type="submit" id="login-button">Sign in</button>
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
<?php	
	
}


?>
