<?php

	//a function to cleanup/ sanitize the data. passing in data and returning it in sanitized
	function sanitize($cxn, $data) {
		return mysqli_real_escape_string ( $cxn, $data);
	}
	
	function output_errors($errors) {
		$output = array();
		
		// loop through the errors and put them in the output variable (which is an array)
		foreach($errors as $error) {
			$output[] = '<li>' . $error . '</li>';
		}
		
		return '<ul>' . implode('', $output) . '</ul>';
	}
	
	// for sanitizing the data when registering a user
	function array_sanitize(&$item) {
		
		// pass the item in, reassign it, and then pass the item to the values within register_data in users [register_users function]
		$item = mysql_real_escape_string($item);
	}
	
	function email($to, $subject, $body) {
		mail($to, $subject, $body, 'From: parsec@hotmail.com');
	}