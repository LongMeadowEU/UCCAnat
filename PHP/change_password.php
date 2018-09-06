<?php
	include_once 'init.php';
	
	// users that are not logged in are not able to access this page. so it needds to be protected against users that are not logged in
	// use the protect_page() function created in part 13
	$showForm = true;
	
	if(empty($_POST) === false) {
		if($_POST['change_password_btn']) {
	
			$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
			$login = $_SESSION['user_id'];
			$result = mysql_query("SELECT * FROM anatomy_login WHERE user_id = $login") or die($connect_error1);
												
			while($record = mysql_fetch_assoc($result)) {
			
					$passWord = $record['password'];
			}
			
					// check if the current_password entered is correct
					// need to encrypt the password that the user types in and compare it with the encrypted password in our database
					if(md5($_POST['current_password']) === $passWord) {
				
							// make sure that the new_password and new_password_again match
							// trim() removes whitespace from the left and right-hand side. If the user hits the space bar by accident
							if(trim($_POST['new_password']) !== trim($_POST['new_password_again'])) {
									$errors[]  = 'Your new passwords do not match';
							} else if(strlen($_POST['new_password']) <= 6) {
									$errors[] = 'Your new password must be at least 6 characters.';
							}
					} else {
							$errors[]  = 'Your current password is incorrect';
					}
			
	
			// if we have posted data (it's not empty) and the errors are empty. this means we've posted the form and no errors have occurred !! 
			if(empty($_POST) === false && empty($errors) === true) {
					// use this function. The arguments are the user id and the md5 version of the new password - place the new password into the database
					change_password($session_user_id, $_POST['new_password']);
			
					// once the password has been changed we will redirect the user to a success page
					//header('Location: change_password.php?success');
			
					// make showForm var false. Don't show the form instead show the success message
					$showForm = false;
			}	
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Change Password</title>

	<!-- my custom css -->
	<link href="css/my_customized.css" type="text/css" rel="stylesheet"/>
    
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

	<?php
        
    	include_once 'php_functionality/navigation_menu.php';
    
    ?>
    
    <div id="wrapper">
	
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
            
                		 <div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">My Profile</h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="dashboard.php">Home</a>
                                      </li>
                                      <li>
                                      	<a href="my_profile.php">My Profile</a>
                                      </li>
                                      <li class="active">
                                          <a href="change_password.php"><strong>Change Password</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
    
	<?php 
		if($showForm == true) {
	?>	
	<div class="col-md-5" style="margin-top: 3%">
	
		<h2>Change Password</h2>
			<form class="form-horizontal" role="form" action="" method="POST" style="margin-top: 8%">
				<div class="form-group">
					<ul style="list-style-type: none;">
						<li>
							<label>Current password*: <br/>
							<input type="password" name="current_password" id="current_password" required/>
							</label>
						 </li>
						<li>
							<label style="margin-top: 4%">New password*: <br/>
							<input type="password" name="new_password" id="new_password" required/>
							</label>
						 </li>
						 <li>
							<label style="margin-top: 4%">New password again*: <br/>
							<input type="password" name="new_password_again" id="new_password_again" required/>
							</label>
						 </li>
						<li>
							<input type="submit" style="margin-top: 8%" class="btn btn-info" name="change_password_btn" id="change_password_btn"  value="Change Password"/>
						</li>
					</ul>
				</div>
			</form>
		</div>
		
			<?php
				// if there are any errors we will loop through our errors
					if (empty($errors) === false) {
					
			?>
			<div class="col-md-5">
				<div style="margin-top: 35%; border: 1px solid #eee; padding: 5%;">
					<h4>Oops! Something went wrong. </h4>

			<?php
					echo output_errors($errors);
			?>
				</div>
			</div>
			<?php
				}
			?>
		
     <?php
	 }
	 ?>
	 <?php 
		if($showForm == false) {
	  ?>
	  
	  <h3 class="centred_text" style="margin-top: 5%">Password changed successfully!</h3>
	  <div style="margin-top: 5%" class="centred_text">
	  	<a href="my_profile.php">Return to <i>My Profile</i> page.</a>
	  </div>
	  <?php 
	  }
	  ?>
		</div><!-- /.container-fluid -->
	</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->
  <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
	<script>	
	// check what browser is in use
    var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
    var is_explorer = navigator.userAgent.indexOf('MSIE') > -1;
    var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;
    var is_safari = navigator.userAgent.indexOf("Safari") > -1;
    var is_opera = navigator.userAgent.toLowerCase().indexOf("op") > -1;
    if ((is_chrome)&&(is_safari)) {is_safari=false;}
    if ((is_chrome)&&(is_opera)) {is_chrome=false;}
    
    //Required attribute fallback for SAFARI (doesn't support the required attribute) 
    // so if the browser in use is safari, don't allow the form to be submitted unless it's all filled in!
    if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
    
    console.log('The browser being used is Safari');    
    
		var forms = document.getElementsByTagName('form');
		
		for (var i = 0; i < forms.length; i++) {
			forms[i].noValidate = true;

			forms[i].addEventListener('submit', function(event) {
				//Prevent submission if checkValidity on the form returns false.
				if (!event.target.checkValidity()) {
					event.preventDefault();
					//Implement you own means of displaying error messages to the user here.
					alert("All fields must be filled in!\n\nYou cannot have blank fields when adding a patient.");
				}
			}, false);
		}
	}
		
    </script>

</body>

</html>