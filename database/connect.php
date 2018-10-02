<?php

	$connect_error = 'Sorry, we\'re experiencing some connection issues.';
	// start the session
	//session_start();

	$db_connect = mysqli_connect('localhost', 'reoc1', 'ohleengi') or die($connect_error);
	mysqli_select_db($db_connect,'mscim2015_reoc1') or die($connect_error);


?>