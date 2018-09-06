<?php include_once 'init.php'; 

// processing of the form data will be done here
		if (empty($_POST) === false) {
			//check: echo "Form submitted!";
			
			// create an array to store the required fields
			$required_fields = array('first_name', 'sur_name', 'username', 'password', 'password_again', 't_and_c');
			// check: see the array: echo '<pre>', print_r($_POST, true), '<pre>';
			
			// iterate through the POST data and check each one. Inarray function will detetct if an empty field is in this array (it's required so it's an error!)
			foreach($_POST as $key=>$value){
				if (empty($value) && in_array($key, $required_fields) === true){
						$errors[] = 'Fields marked with an asterisk are required';
						break 1;
				}
			}
			
			if(empty($errors) === true) {

				//if(user_exists($_POST['username']) === true) {
					//$errors[] = 'Sorry, the username \'' . $_POST[username] . '\' is already taken.';
				//}
				
				// if the password string length is greater than 10 then convey an error
				if(strlen($_POST['password']) <= 6) {
					$errors[] = 'Your password must be at least 6 characters.';
				}
				
				// check the password against the 2nd password that has been enetered to see if they match
				if($_POST['password'] !== $_POST['password_again']) {
					$errors[] = 'Your passwords do not match.';
				}
				
				// check if the email address is valid
				if(filter_var($_POST['username'], FILTER_VALIDATE_EMAIL) === false) {
					$errors[] = 'A valid email address is required.';
				}
					 
				if (email_exists($_POST['username']) === true) {
					$errors[] = 'Sorry, the email \'' . $_POST['username'] . '\' is already taken.';
				}
				
				if(!$_POST['t_and_c']) {
					$errors[] = 'Sorry, you must agree to the terms and conditions to register.';
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
    
    <title>Registration Page</title>
    
    <!-- calm breeze css for login page -->
	<link href="css/style_calm_breeze_login" type="text/css" rel="stylesheet"/>
	
	<!-- For the Google Font -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

 
  </head>

<body id="regBody">
<?php
	
	if(isset($_GET['success']) && empty($_GET['success'])) {
			echo 'You have been registered successfully! Please check your email to activate your account.';				
	} else {
	
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if(empty($_POST) === false && empty($errors) === true) {
				// resitster the user
				
				// create an associative array to hold the user to register's data
				$register_data = array(
									   'first_name' 					=> 	$_POST['first_name'],
									   'sur_name' 						=> 	$_POST['sur_name'],
									   'username'						=> 	$_POST['username'],
									   'password' 						=> 	$_POST['password'],
									   'email_code' 					=>	md5($_POST['username'] + microtime()), 
									   'terms_and_conditions_agree'		=>$_POST['t_and_c']
									   );
				
				register_user($register_data);
				//redirect the user
				header('Location: resigter.php?success');
				//exit if the user's browser doesn't interpret redirect properly kill the script
				exit();
			} else if(empty($errors) === false){
			// otherwise output the errors
				echo output_errors($errors);
			}
	
?>

	<div class="wrapper_new">
		<div class="container_new">
			<h1>Please Sign Up!</h1>
		
			<form class="form" action="" method="POST" id="register_form">
				<div id="form_width">
					<div>
						<input type="text" class="input_box" name="first_name" id="first_name" placeholder="First Name *" tabindex="1" required/>
	
						<input type="text" class="input_box" name="sur_name" id="last_name" placeholder="Last Name *" tabindex="2" required/>
					</div>
					<div>
						<input type="email" class="input_box" name="username" id="email" placeholder="Email Address *" tabindex="4" required/>
					</div>
					<div>
						<input type="password" class="input_box" name="password" id="password" placeholder="Password *" tabindex="5" required/>
						<input type="password" class="input_box" name="password_again" id="password_confirmation" placeholder="Confirm Password *" tabindex="6" required/>
					</div>
					<div style="max-width: 84%; margin-left:auto; margin-right:auto;">
						<table style="width: 100%; padding-top:10px; padding-bottom:10px;">
							<tr style="width: 100%;">
								<td style="width: 20%;" valign="middle">
									<button class="div_for_reg" id="i_agree_btn" tabindex="7">I Agree <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1" required/></button>
								</td>
								<td style="width: 80%;" valign="top">
									<p id="t_and_c_agree_para">By clicking Register, you agree to the <a href="#" id="t_and_c_click" style="display:inline">Terms and Conditions</a> set out by this site, including our Cookie Use.</p>	
								</td>
							</tr>
						</table>			
					</div>
					<div>
						<input type="submit" id="submit_register_btn" value="Register" tabindex="7"/>
						<button type="button" onclick="redirect_to_login()">Sign In</button>
					</div>
				</div>
			</form>
			<div id="dialog" title="Terms and Conditions" style="font-family: 'Source Sans Pro', sans-serif; font-weight: 300;" hidden>
  				<p style="font-family: 'Source Sans Pro', sans-serif; font-weight: 300; text-align: justify;">This website is operated by PARSEC. Throughout the site, the terms 'we', 'us' and 'our'refer to PARSEC. PARSEC offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>
				<br/><p style="font-family: 'Source Sans Pro', sans-serif; font-weight: 300; text-align: justify;">Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.</p>
				<br/>
				<p style="font-family: 'Source Sans Pro', sans-serif; font-weight: 300; text-align: justify;"><em>Acceptable use</em><br/>
You must not:<br/>
(a)	use our website in any way or take any action that causes, or may cause, damage to the website or impairment of the performance, availability or accessibility of the website;
<br/>(b)	use our website in any way that is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, illegal, fraudulent or harmful purpose or activity;
<br/>(c)	use our website to copy, store, host, transmit, send, use, publish or distribute any material which consists of (or is linked to) any spyware, computer virus, Trojan horse, worm, keystroke logger, rootkit or other malicious computer software;
<br/>(d)	conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction and data harvesting) on or in relation to our website without our express written consent;
<br/>(e)	[access or otherwise interact with our website using any robot, spider or other automated means;]
<br/>(f)	[violate the directives set out in the robots.txt file for our website; or]
<br/>(g)	[use data collected from our website for any direct marketing activity (including without limitation email marketing, SMS marketing, telemarketing and direct mailing).]
<br/>	You must not use data collected from our website to contact individuals, companies or other persons or entities.	You must ensure that all the information you supply to us through our website, or in relation to our website, is [true, accurate, current, complete and non-misleading].
</p>
				<br/><p style="font-family: 'Source Sans Pro', sans-serif; font-weight: 300; text-align: justify;"><em>Variation</em><br/>
We may revise these terms and conditions from time to time.
[The revised terms and conditions shall apply to the use of our website from the date of publication of the revised terms and conditions on the website, and you hereby waive any right you may otherwise have to be notified of, or to consent to, revisions of these terms and conditions. / We will give you written notice of any revision of these terms and conditions, and the revised terms and conditions will apply to the use of our website from the date that we give you such notice; if you do not agree to the revised terms and conditions, you must stop using our website.]
If you have given your express agreement to these terms and conditions, we will ask for your express agreement to any revision of these terms and conditions; and if you do not give your express agreement to the revised terms and conditions within such period as we may specify, we will disable or delete your account on the website, and you must stop using the website.
</p>
			</div>
		</div>
	</div>


<?php
	}
?>
    
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/jquery/dist/jquery.ui.1.11.4.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script> 
    
    <script>
$(document).ready(function(){

$(function() {
    $("#dialog").dialog({
      autoOpen: false,
      height: 500,
      width: 600,
      buttons: {
        Close: function() {
          $("#dialog").dialog( "close" );
        }
      },
      show: {
        effect: "blind",
        duration: 500
      },
      hide: {
        effect: "blind",
        duration: 500
      }
    });
 
    $( "#t_and_c_click" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
  });
});
	function redirect_to_login() {
		window.location = "login.php";
	}
    </script>  
    
</body>
</html>
