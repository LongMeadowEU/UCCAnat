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
				$_SESSION['user_id'] = $login;
				
				// redirect the user to the homepage
				header('Location: dashboard.php');
				exit();
			}
		}
		
		// provides a visual representation of the errors array.
		print_r($errors);
	} else {
		$errors[] = 'No data received.';
	}


// if there are any errors we will loop through our errors
if (empty($errors) === false) {
?>
    
    <h2>We tried to log you in but... </h2>
    
<?php

	echo output_errors($errors);
	
	
}


?>
