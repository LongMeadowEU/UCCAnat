<?php

	$connect_error = 'Sorry, we\'re experiencing some connection issues.';
	// start the session
	//session_start();

	$db_connect = mysql_connect('cs1.ucc.ie', 'reoc1', 'ohleengi') or die($connect_error);
	mysql_select_db('mscim2015_reoc1') or die($connect_error);


?>