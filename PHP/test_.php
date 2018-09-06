<?php ob_start(); include_once 'init.php';include_once 'functions/users.php';
if(logged_in_prosections() !== true) {
	header("Location: index.php");
} 
error_reporting(E_ERROR | E_PARSE);

		include 'php_functionality/prosections/navigation_menu_prosections.php';
		$show_form = true;
		
		$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
		$search = $_POST['prosection_search_box'];
		
		$which_subject_num_from_donor_table = mysql_query("SELECT * FROM donor_table WHERE subject_number = '$search'") or die($connect_error1);

		while($record = mysql_fetch_assoc($which_subject_num_from_donor_table)) {
					  
			$selected_subject_number = $record['subject_number'];
			$consent_part_1_new = $record['consent_part_1'];
			$consent_part_1_3_years_options_new = $record['consent_part_1_3_years_options'];
			$consent_part_2_new = $record['consent_part_2'];
		
		}
		//print_r($which_subject_num_from_donor_table);
		//print_r($selected_subject_number);
	$_SESSION['selected_subject_number_session'] = $selected_subject_number;
	
	
	
	$array1 = array();
	$result = mysql_query("SELECT prosection_id FROM prosections_table WHERE which_subject_number = '$selected_subject_number'");
	
	while ($row = mysql_fetch_assoc($result)) {
  	 $array1 = array_merge($array1, array_map('trim', explode(",", $row['prosection_id'])));
	}
	print_r($array1);
	$last_element = end($array1);
	print_r($last_element);
	$last_letter = substr($last_element, -1);
	print_r($last_letter);
	$next_letter = ++$last_letter;
	print_r($next_letter);
	
	?>

