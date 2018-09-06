<?php 
	include_once 'init.php';
	
	$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
	
	$result = mysql_query("SELECT * FROM historical_pieces_table") or die($connect_error1);
												
	while($row = mysql_fetch_assoc($result)) {
		
			$date_of_disposal = $row['date_disposed_of'];
												$formatted_date_of_disposal = date('d-m-Y', strtotime($date_of_disposal));
												
												$date_of_aquisition = $row['date_aquired_on'];
												$formatted_date_of_aquisition = date('d-m-Y', strtotime($date_of_aquisition));
												
												if(!empty($row['other_specimen_type'])) {
													$other_spec_type = ', ' . $row['other_specimen_type'];
												} else {
													$other_spec_type = "";
												}
			
											echo '<tr>';
												echo '<td>' . 	$row['donor_reference_num_hist_pieces']		 . '</td>';
												echo '<td>' . 	$row['type_of_specimen']  . $other_spec_type 	. '</td>';
												echo '<td>' . 	$formatted_date_of_disposal 	. '</td>';
												echo '<td>' . 	$formatted_date_of_aquisition 	. '</td>';
											echo '</tr>';
	}
?>

