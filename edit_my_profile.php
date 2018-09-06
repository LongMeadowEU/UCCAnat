<?php
	include_once 'init.php';
	
	$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
	$login = $_SESSION['user_id'];
	$result = mysql_query("SELECT * FROM anatomy_login WHERE user_id = $login") or die($connect_error1);
												
	while($record = mysql_fetch_assoc($result)) {

			$first_name = $record['first_name'];
			$sur_name = $record['sur_name'];
	}
    
	// users that are not logged in are not able to access this page. so it needds to be protected against users that are not logged in
	// use the protect_page() function created in part 13
	$showForm = true;
	
	if(empty($_POST) === false) {
		if($_POST['change_profile_btn']) {

			if(empty($_POST['first_name']) === false) {
				$new_first_name = $_POST['first_name'];
				mysql_query("UPDATE anatomy_login SET first_name = '$new_first_name' WHERE user_id = '$login'");
			}
			if(empty($_POST['sur_name']) === false) {
				$new_surname = $_POST['sur_name'];
				mysql_query("UPDATE anatomy_login SET sur_name = '$new_surname' WHERE user_id = '$login'");
			}

			$showForm = false;
				
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

    <title>Edit My Profile</title>

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
                                          <a href="edit_my_profile.php"><strong>Edit Profile</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
    
	<?php 
		if($showForm == true) {
	?>	
	<div class="col-md-6" style="margin-top: 3%">
	
		<h2 class="centred_text">Edit My Profile</h2>
			<form class="form-horizontal" role="form" action="" method="POST" style="margin-top: 8%">
				<div class="form-group centred_text">
					<table class="centred_text ">
						<tr>
							<td class="formLabel" align="left"><label class="float-left" id="landline_num_label_current" for="landline_num_current">Current Firstname:</label></td>
							<td class="formInput"><input type="text" class="form-control centred_text" name="landline_num_current" id="landline_num_current" value="<?php echo $first_name ?>" readonly/></td>
						</tr>
						<tr>
							<td class="formLabel" align="left"><label class="float-left" id="landline_num_label_new" for="first_name">New Firstname*:</label></td>
							<td class="formInput"><input type="text" class="form-control centred_text" name="first_name" id="first_name" placeholder="new firstname"/></td>
						</tr>
						<tr>
							<td class="formLabel" align="left"><label class="float-left" id="mobile_num_label_current" for="mobile_num_current">Current Surname:</label></td>
							<td class="formInput"><input type="text" class="form-control centred_text" name="mobile_num_current" id="mobile_num_current" value="<?php echo $sur_name ?>" readonly/></td>
						</tr>
						<tr>
							<td class="formLabel" align="left"><label class="float-left" id="mobile_num_label_new" for="mobile_num_new">Current Surname*:</label></td>
							<td class="formInput"><input type="text" class="form-control centred_text" name="sur_name" id="sur_name" placeholder="new surname"/></td>
						</tr>
					</table>
					
					<input type="submit" style="margin-top: 8%; width: 40%;" class="btn btn-info" name="change_profile_btn" id="change_profile_btn"  value="Change Profile"/>
				</div>
			</form>
		</div>
		
			<?php
				// if there are any errors we will loop through our errors
					if (empty($errors) === false) {
					
			?>
			<div class="col-md-4">
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
	  
	  <h3 class="centred_text" style="margin-top: 5%">Profile edited successfully!</h3>
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