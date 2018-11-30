<?php 
session_start();
	
	//error_reporting(0);
	// useful for debugging. It'll tell you about errors
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	// this connect.php is required and anything below can use this connection
	require 'database/connect.php';
	require 'functions/general.php';
	require 'functions/users.php';
	
	// returns data from the database. we can use that database anywhere on the site
	if(logged_in() === true) {
		
		$session_user_id = $_SESSION['user_id'];
		//$user_data = getUserDetail($session_user_id);
		
	}
	
	$errors = array();
	
	$onHomePage = false;
    
?>
