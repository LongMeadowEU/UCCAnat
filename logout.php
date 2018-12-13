<?php include_once 'init.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log Out Page</title>
    
    <!-- calm breeze css for login page -->
	<link href="css/style_calm_breeze_login.cs" type="text/css" rel="stylesheet"/>
	
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
    
<?php
	
	// destroy/end the session when the user logs out
	session_destroy();
?>

<div class="wrapper">
	<div class="container">
            <h1 style="font-weight: bold">You have been logged out. Come back soon!</h1>
		<div class="infront_of_bubbles">
        		<img id="logout_image" src="images/donor_logo.png" alt="UCC Donor Program logo image"> <br/>
            
            	<h3 class="return_to_login" style="font-weight: bold"><a href='login.php'>Click here</a> to return to the login page.</h3>
             </div>       
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