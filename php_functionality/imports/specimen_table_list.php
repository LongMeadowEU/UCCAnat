<?php 
	include_once 'init.php';
	
	$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
	
	$result = mysql_query("SELECT * FROM import_specimens") or die($connect_error1);
												
	while($row = mysql_fetch_assoc($result)) {
		
			$date_of_delivery = $row['specimen_delivery_date'];
			$formatted_specimen_delivery_date = date('d-m-Y', strtotime($date_of_delivery));
			
			$date_of_cremation = $row['specimen_cremation_date'];
			$formatted_specimen_cremation_date = date('d-m-Y', strtotime($date_of_cremation));
			
			$specimen_images_yes_no = $row['specimen_images'] ;
			if($specimen_images_yes_no == "0") {
				$spec_im_text = "No";
			} else if($specimen_images_yes_no == "1") {
				$spec_im_text = "Yes";
			}
			
			$imports_removed_yes_no = $row['specimen_imports_removed'] ;
			if($imports_removed_yes_no == "0") {
				$imports_rem_text = "No";
			} else if($imports_removed_yes_no == "1") {
				$imports_rem_text = "Yes";
			}

		echo '<tr>';
			echo '<td>' . 	$row['specimen_reference_number']		 . '</td>';
			echo '<td>' . 	$row['specimen_item_number']	. '</td>';
			echo '<td>' . 	$row['specimen_user'] 	. '</td>';
			echo '<td>' . 	$row['type_of_specimen'] 	. '</td>';
			echo '<td>' . 	$formatted_specimen_delivery_date 		. '</td>';
			echo '<td>' . 	$formatted_specimen_cremation_date	. '</td>';
			echo '<td>' . 	$row['specimen_serology'] 	. '</td>';
			echo '<td>' . 	$row['imports_sex'] 	. '</td>';
			echo '<td>' . 	$spec_im_text 	. '</td>';
			echo '<td>' . 	$imports_rem_text 	. '</td>';
		echo '</tr>';
	}
?>

