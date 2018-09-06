<?php 
	include_once 'init.php';
	
	$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
	
	$result = mysql_query("SELECT * FROM donor_table") or die($connect_error1);
												
	while($record = mysql_fetch_assoc($result)) {
		
			// format the date to appear from database as day - month - year (DATABASE stores dates as Year - Month - Day)
			$var1 = $record['date_of_birth'];
			$newDate1 = date('d-m-Y', strtotime($var1));
	
			echo '<tr>';
			echo '<td>' . 	$record['donor_reference_number']		 	. '</td>';
			echo '<td>' . 	ucwords($record['first_name']) 	. '</td>';
			echo '<td>' . 	ucwords($record['sur_name']) 	. '</td>';
			echo '<td>' . 	$newDate1 		. '</td>';
			echo '<td>' . 	$record['sex'] 		. '</td>';
			echo '<td>' . 	$record['religion'] 	. '</td>';
			echo '</tr>'; 
	}
?>

