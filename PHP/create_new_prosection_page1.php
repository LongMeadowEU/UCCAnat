<?php include_once 'init.php'; include_once 'functions/users.php';

error_reporting(0);
ini_set('display_errors', 0);

if(logged_in_prosections() !== true) {
	header("Location: index.php");
} 

$selected_subject_number_session = $_SESSION['selected_subject_number_session'];
//print_r($selected_subject_number_session);
$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
	
$show_form_new = true;
	
$which_subject_num_from_donor_table = mysql_query("SELECT * FROM donor_table WHERE subject_number = '$selected_subject_number_session'") or die($connect_error1);

while($record = mysql_fetch_assoc($which_subject_num_from_donor_table)) {
				
	  $selected_subject_number = $record['subject_number'];
	  $consent_part_1_new = $record['consent_part_1'];
	  $consent_part_1_3_years_options_new = $record['consent_part_1_3_years_options'];
	  $consent_part_2_new = $record['consent_part_2'];

}
// check does the subject number already have a prosection in the prosections table.
// if yes then take the last letter (e.g. A) and replace it with the next letter of the alphabet.
// this will be the prosection_id.
// if no then make the prosection_id = subject number + A
$does_subject_have_prosection = mysql_query("SELECT unique_id FROM prosections_table WHERE which_subject_number = '$selected_subject_number'") or die($connect_error1);

/*$result_1 = mysql_query("SELECT * FROM prosections_table WHERE which_subject_number = '$selected_subject_number'");
$array_for_subject = array();

while ($row_1 = mysql_fetch_array($result_1)){ 

	$array_for_subject[] = array('which_subject_number' => $row_1['which_subject_number'], 'prosection_id' => $row_1['prosection_id']);

}
$bar = each($array_for_subject);
print_r($bar);*/

if(mysql_num_rows($does_subject_have_prosection) == 0) {
	$new_row_to_add = true;
	$this_prosection_id = $selected_subject_number . '_A';
} else {
	$new_row_to_add = true;
	$array1 = array();
	$result = mysql_query("SELECT prosection_id FROM prosections_table WHERE which_subject_number = '$selected_subject_number'");
	
	while ($row = mysql_fetch_assoc($result)) {
  	 $array1 = array_merge($array1, array_map('trim', explode(",", $row['prosection_id'])));
	}
	//print_r($array1);
	$last_element = end($array1);
	//print_r($last_element);
	$last_letter = substr($last_element, -1);
	//print_r($last_letter);
	$next_letter = ++$last_letter;
	//print_r($next_letter);
	
	$this_prosection_id = $selected_subject_number . '_' . $next_letter;
	
}
if($show_form_new == true){
  if($new_row_to_add == true) {
	if(isset($_POST['save_and_create_new_prosection'])) {
	  $prosection_types_array = array();
	  $prosection_regions_array = array();
	  $prosection_features_array = array();
	  
	  $new_prosection_id = $_POST['prosection_id'];
	  $prosection_type = $_POST['type_of_prosection'];
	  array_push($prosection_types_array, $prosection_type);
	  $prosection_region = $_POST['prosection_region'];
	  array_push($prosection_regions_array, $prosection_region);
	  
	  $select_pro_features = $_POST['prosection_region_specific'];
	  $prosection_feature_specific = implode(', ', $_POST['prosection_region_specific']);
	  array_push($prosection_features_array, $prosection_feature_specific);
	  
	  $storage_type = $_POST['storage'];
	  $storage_unit = $_POST['unit'];
	  $storage_shelf = $_POST['shelf'];
	  
	  $plastinated = $_POST['plastinated'];
	  $var_date = $_POST['disposal_date'];
	  $disposal_date = date('Y-m-d', strtotime($var_date));
	  
	  $send_to_archive = $_POST['send_to_archive'];
	  $disposal_method = $_POST['dispoal_method'];
	  $prosec_comments = $_POST['comments'];
	  
	  if(isset($_POST['type_of_prosection_1'])) {
		  $type_of_prosection_1 = $_POST['type_of_prosection_1'];
		  array_push($prosection_types_array, $type_of_prosection_1);
		  $prosection_region_1 = $_POST['prosection_region_1'];
		  array_push($prosection_regions_array, $prosection_region_1);
		  $select_pro_features_1 = $_POST['prosection_region_specific_1'];
	  	  $prosection_feature_specific_1 = implode(', ', $_POST['prosection_region_specific_1']);
		  array_push($prosection_features_array, $prosection_feature_specific_1);
		  
	  } else {
		   $type_of_prosection_1 = "0";
		   $prosection_region_1 = "0";
		   $prosection_feature_specific_1 = "0";
	  }
	  
	  if(isset($_POST['type_of_prosection_2'])) {
		  $type_of_prosection_2 = $_POST['type_of_prosection_2'];
		  array_push($prosection_types_array, $type_of_prosection_2);
		  $prosection_region_2 = $_POST['prosection_region_2'];
		  array_push($prosection_regions_array, $prosection_region_2);
		  $select_pro_features_2 = $_POST['prosection_region_specific_2'];
	  	  $prosection_feature_specific_2 = implode(', ', $_POST['prosection_region_specific_2']);
		  array_push($prosection_features_array, $prosection_feature_specific_2);
		  
	  } else {
		   $type_of_prosection_2 = "0";
		   $prosection_region_2 = "0";
		   $prosection_feature_specific_2 = "0";
	  }
	  
	  if(isset($_POST['type_of_prosection_3'])) {
		  $type_of_prosection_3 = $_POST['type_of_prosection_3'];
		  array_push($prosection_types_array, $type_of_prosection_3);
		  $prosection_region_3 = $_POST['prosection_region_3'];
		  array_push($prosection_regions_array, $prosection_region_3);
		  $select_pro_features_3 = $_POST['prosection_region_specific_3'];
	  	  $prosection_feature_specific_3 = implode(', ', $_POST['prosection_region_specific_3']);
		  array_push($prosection_features_array, $prosection_feature_specific_3);
		  
	  } else {
		   $type_of_prosection_3 = "0";
		   $prosection_region_3 = "0";
		   $prosection_feature_specific_3 = "0";
	  }
	  
	  if(isset($_POST['type_of_prosection_4'])) {
		  $type_of_prosection_4 = $_POST['type_of_prosection_4'];
		  array_push($prosection_types_array, $type_of_prosection_4);
		  $prosection_region_4 = $_POST['prosection_region_4'];
		  array_push($prosection_regions_array, $prosection_region_4);
		  $select_pro_features_4 = $_POST['prosection_region_specific_4'];
	  	  $prosection_feature_specific_4 = implode(', ', $_POST['prosection_region_specific_4']);
		  array_push($prosection_features_array, $prosection_feature_specific_4);
		  
	  } else {
		   $type_of_prosection_4 = "0";
		   $prosection_region_4 = "0";
		   $prosection_feature_specific_4 = "0";
	  }
	  $prosection_types_array_insert = implode(', ', $prosection_types_array);
	  $prosection_regions_array_insert = implode(', ', $prosection_regions_array);
	  $prosection_features_array_insert = implode(', ', $prosection_features_array);
	  
	  $_SESSION['new_prosection_sesh'] = $this_prosection_id;
  
	  $new_prosection_info_data = array(
							 'which_subject_number' 	=> 	$selected_subject_number_session,
							 'prosection_id' 			=> 	$this_prosection_id, 
							 'prosection_type' 		=> 	$prosection_type, 
							 'prosection_region'		=> 	$prosection_region,
							 'prosection_feature_specific' => 	$prosection_feature_specific, 
							 'storage_type' 			=> $storage_type,
							 'storage_unit' 			=> $storage_unit,
							 'storage_shelf' 			=> $storage_shelf,
							 'plastinated'				=> $plastinated, 
							 'date_of_disposal_prosec' => $disposal_date, 
							 'send_to_archive'		=> $send_to_archive,
							 'disposal_method' 		=>  $disposal_method, 
							 'prosec_comments'		=>	$prosec_comments,
							 'prosection_type_1' 		=> 	$type_of_prosection_1, 
							 'prosection_region_1'		=> 	$prosection_region_1,
							 'prosection_feature_specific_1' => 	$prosection_feature_specific_1,
							 'prosection_type_2' 		=> 	$type_of_prosection_2, 
							 'prosection_region_2'		=> 	$prosection_region_2,
							 'prosection_feature_specific_2' => 	$prosection_feature_specific_2,
							 'prosection_type_3' 		=> 	$type_of_prosection_3, 
							 'prosection_region_3'		=> 	$prosection_region_3,
							 'prosection_feature_specific_3' => 	$prosection_feature_specific_3, 
							 'prosection_type_4' 		=> 	$type_of_prosection_4, 
							 'prosection_region_4'		=> 	$prosection_region_4,
							 'prosection_feature_specific_4' => 	$prosection_feature_specific_4, 
							 'prosection_types_list' => $prosection_types_array_insert, 
							 'prosection_regions_list' => $prosection_regions_array_insert,
							 'prosection_features_list' => $prosection_features_array_insert
							 );
  
	  make_new_prosection_entry($new_prosection_info_data);
	  
	  $new_prosection_sesh = $_SESSION['new_prosection_sesh'];
	  $new_row_to_add = false;
	  
	  $show_form_new = false;
	  
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

    <title>Create New Prosection</title>

	<!-- my custom css -->
	<link href="css/my_customized.css" type="text/css" rel="stylesheet"/>
    
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Include Bootstrap Datepicker -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    
     <!-- Multiple Selection Box -->
    <link rel="stylesheet" href="bower_components/multiple-select_plugin/multiple-select.css" type="text/css"> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- breadcrumb trail grayscale except for the page user is currently on -->
    <style>
		.popover{
			width:250px;    
		}
    </style>

</head>

<body>

<?php
        
    	include_once 'php_functionality/prosections/navigation_menu_prosections.php';
    	$show_form = true;

		
?>
    
    <div id="wrapper">
	
        <!-- Page Content -->
        <div id="page-wrapper-1">
            <div class="container-fluid">
                                    
                       <div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">Create New Prosection</h2>
                                  <ol class="breadcrumb">
                                      <li>
										<a href="prosections_homepage.php">Home</a>
                                      </li>
                                      <li>
										<a href="prosection_searched.php">Searched</a>
                                      </li>
                                      <li class="active">
                                          <a href="create_new_prosection_page1.php"><strong>Create New Prosection (for Subject Number <?php echo $selected_subject_number; ?> )</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
                					
										
									<div class="row">
									<?php 
										if($show_form_new == true) {
									?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                   		<tr>
															<td class="formLabel" align="left"><label id="prosection_id_Label" for="prosection_id">Prosection ID:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="prosection_id" ame="prosection_id" value='<?php echo $this_prosection_id; ?>' disabled></td>
		 												</tr>
                                                     </table>
                                                      
                                                     <table id="prosec_table_3rows" class="centred_text add_patient_table">    
														<tr style="width:100%;" id="row_0">
															<td align="left" style="width:33%;">
																<select class="form-control" id="type_of_prosection" name="type_of_prosection" required>
																		<option id="search_query_placeholder_criteria_1" name="search_query_placeholder_criteria_1" disabled selected>Type of Prosection</option>
																		<option id="ul" name="ul" value="ul">UL</option>
																		<option id="ll" name="ll" value="ll">LL</option>
                                                                        <option id="tx" name="tx" value="tx">TX</option>
                                                                        <option id="ab" name="ab" value="ab">AB</option>
                                                                        <option id="gu" name="gu" value="gu">GU</option>
                                                                        <option id="head_and_neck" name="head_and_neck" value="head_and_neck">Head and Neck</option>
                                                                        <option id="back" name="back" value="back">Back</option>
                                                                        <option id="neuro" name="neuro" value="neuro">Neuro</option>
                                                                        
																</select>
															</td>
															<td align="left" style="width:33%;">
																<select class="form-control" id="prosection_region" name="prosection_region" required>
																		<option id="prosection_region_placeholder" name="prosection_region_placeholder" disabled selected>Prosection Region</option>
																</select>
															</td>
                                                            <td align="left" style="width:33%;">
                                                            	<select multiple="multiple" id="prosection_region_specific" name="prosection_region_specific[]" style="width:100%" required>
																		<option id="prosection_region_specific_placeholder" name="prosection_region_specific_placeholder" disabled selected>Prosection Region Specific</option>
																</select>
                                                            </td>
														</tr>
                                                        
                                                        <tr style="width:100%;" id="row_1">
															<td align="left" style="width:33%;">
																<select class="form-control" id="type_of_prosection_1" name="type_of_prosection_1">
																		<option id="search_query_placeholder_criteria_1" name="search_query_placeholder_criteria_1" disabled selected>Type of Prosection</option>
																		<option id="ul" name="ul" value="ul">UL</option>
																		<option id="ll" name="ll" value="ll">LL</option>
                                                                        <option id="tx" name="tx" value="tx">TX</option>
                                                                        <option id="ab" name="ab" value="ab">AB</option>
                                                                        <option id="gu" name="gu" value="gu">GU</option>
                                                                        <option id="head_and_neck" name="head_and_neck" value="head_and_neck">Head and Neck</option>
                                                                        <option id="back" name="back" value="back">Back</option>
                                                                        <option id="neuro" name="neuro" value="neuro">Neuro</option>
                                                                        
																</select>
															</td>
															<td align="left" style="width:33%;">
																<select class="form-control" id="prosection_region_1" name="prosection_region_1">
																		<option id="prosection_region_placeholder" name="prosection_region_placeholder" disabled selected>Prosection Region</option>
																</select>
															</td>
                                                            <td align="left" style="width:33%;">
                                                            	<select multiple="multiple" id="prosection_region_specific_1" name="prosection_region_specific_1[]" style="width:100%">
																		<option id="prosection_region_specific_placeholder" name="prosection_region_specific_placeholder" disabled selected>Prosection Region Specific</option>
																</select>
                                                            </td>
														</tr>
                                                        
                                                        <tr style="width:100%;" id="row_2">
															<td align="left" style="width:33%;">
																<select class="form-control" id="type_of_prosection_2" name="type_of_prosection_2">
																		<option id="search_query_placeholder_criteria_1" name="search_query_placeholder_criteria_1" disabled selected>Type of Prosection</option>
																		<option id="ul" name="ul" value="ul">UL</option>
																		<option id="ll" name="ll" value="ll">LL</option>
                                                                        <option id="tx" name="tx" value="tx">TX</option>
                                                                        <option id="ab" name="ab" value="ab">AB</option>
                                                                        <option id="gu" name="gu" value="gu">GU</option>
                                                                        <option id="head_and_neck" name="head_and_neck" value="head_and_neck">Head and Neck</option>
                                                                        <option id="back" name="back" value="back">Back</option>
                                                                        <option id="neuro" name="neuro" value="neuro">Neuro</option>
                                                                        
																</select>
															</td>
															<td align="left" style="width:33%;">
																<select class="form-control" id="prosection_region_2" name="prosection_region_2">
																		<option id="prosection_region_placeholder" name="prosection_region_placeholder" disabled selected>Prosection Region</option>
																</select>
															</td>
                                                            <td align="left" style="width:33%;">
                                                            	<select multiple="multiple" id="prosection_region_specific_2" name="prosection_region_specific_2[]" style="width:100%">
																		<option id="prosection_region_specific_placeholder" name="prosection_region_specific_placeholder" disabled selected>Prosection Region Specific</option>
																</select>
                                                            </td>
														</tr>
                                                        
                                                         <tr style="width:100%;" id="row_3">
															<td align="left" style="width:33%;">
																<select class="form-control" id="type_of_prosection_3" name="type_of_prosection_3">
																		<option id="search_query_placeholder_criteria_1" name="search_query_placeholder_criteria_1" disabled selected>Type of Prosection</option>
																		<option id="ul" name="ul" value="ul">UL</option>
																		<option id="ll" name="ll" value="ll">LL</option>
                                                                        <option id="tx" name="tx" value="tx">TX</option>
                                                                        <option id="ab" name="ab" value="ab">AB</option>
                                                                        <option id="gu" name="gu" value="gu">GU</option>
                                                                        <option id="head_and_neck" name="head_and_neck" value="head_and_neck">Head and Neck</option>
                                                                        <option id="back" name="back" value="back">Back</option>
                                                                        <option id="neuro" name="neuro" value="neuro">Neuro</option>
                                                                       
																</select>
															</td>
															<td align="left" style="width:33%;">
																<select class="form-control" id="prosection_region_3" name="prosection_region_3">
																		<option id="prosection_region_placeholder" name="prosection_region_placeholder" disabled selected>Prosection Region</option>
																</select>
															</td>
                                                            <td align="left" style="width:33%;">
                                                            	<select multiple="multiple" id="prosection_region_specific_3" name="prosection_region_specific_3[]" style="width:100%">
																		<option id="prosection_region_specific_placeholder" name="prosection_region_specific_placeholder" disabled selected>Prosection Region Specific</option>
																</select>
                                                            </td>
														</tr>
                                                        
                                                         <tr style="width:100%;" id="row_4">
															<td align="left" style="width:33%;">
																<select class="form-control" id="type_of_prosection_4" name="type_of_prosection_4">
																		<option id="search_query_placeholder_criteria_1" name="search_query_placeholder_criteria_1" disabled selected>Type of Prosection</option>
																		<option id="ul" name="ul" value="ul">UL</option>
																		<option id="ll" name="ll" value="ll">LL</option>
                                                                        <option id="tx" name="tx" value="tx">TX</option>
                                                                        <option id="ab" name="ab" value="ab">AB</option>
                                                                        <option id="gu" name="gu" value="gu">GU</option>
                                                                        <option id="head_and_neck" name="head_and_neck" value="head_and_neck">Head and Neck</option>
                                                                        <option id="back" name="back" value="back">Back</option>
                                                                        <option id="neuro" name="neuro" value="neuro">Neuro</option>
                                                                        
																</select>
															</td>
															<td align="left" style="width:33%;">
																<select class="form-control" id="prosection_region_4" name="prosection_region_4">
																		<option id="prosection_region_placeholder" name="prosection_region_placeholder" disabled selected>Prosection Region</option>
																</select>
															</td>
                                                            <td align="left" style="width:33%;">
                                                            	<select multiple="multiple" id="prosection_region_specific_4" name="prosection_region_specific_4[]" style="width:100%">
																		<option id="prosection_region_specific_placeholder" name="prosection_region_specific_placeholder" disabled selected>Prosection Region Specific</option>
																</select>
                                                            </td>
														</tr>
                                                      </table>
                                                      <br/>
                                                      <a class="btn btn-sm btn-success form_1_button" id="insert-more">Add Row</a>
                                                      
                                                     <table id="genInfoFormTable" class="centred_text add_patient_table">  
                                                        <tr>
															<td align="left" style="width:20%">
																<select class="form-control" id="storage" name="storage" required>
																		<option id="storage_placeholder" name="storage_placeholder" disabled selected>Storage</option>
																		<option id="fridge" name="fridge" value="fridge">Fridge</option>
																		<option id="freezer" name="freezer" value="freezer">Freezer</option>
                                                                        <option id="tank" name="tank" value="tank">Tank</option>
																</select>
															</td>
															<td style="width:20%">
																<select class="form-control" id="unit" name="unit" required>
																		<option id="unit_placeholder" name="unit_placeholder" disabled selected>Unit</option>
																</select>
															</td>
                                                            <td style="width:20%">
                                                            	<select class="form-control" id="shelf" name="shelf" required>
																		<option id="shelf_placeholder" name="shelf_placeholder" disabled selected>Shelf</option>
																</select>
                                                            </td>
														</tr>
													
                                                     </table> 
                                                    <table id="genInfoFormTable" class="centred_text add_patient_table">
                                                      <tr>
															<td class="formLabel" align="left"><label id="plastinated_Label" for="plastinated">Plastinated:</label></td>
                                                           <td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="plastinated" id="plastinated" value="1" required>Yes
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="plastinated" id="plastinated" value="0" checked="checked">No
                                                                </label>
                                                            </td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left">
                                                            	<label id="disposal_dateLabel" for="disposal_date">Date of Disposal:
                                                                		<a data-toggle="popover" data-placement="right" title="Date of Disposal" data-content="Insert the Date of Disposal in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="disposal_date_picker">
																	<input type="text" class="form-control" name="disposal_date" id="disposal_date" placeholder="Date of Disposal" required/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                         <tr>
															<td class="formLabel" align="left"><label id="send_to_archive_Label" for="send_to_archive">Send to Archive:</label></td>
                                                           <td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="send_to_archive" id="send_to_archive" value="1" required>Yes
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="send_to_archive" id="send_to_archive" value="0" checked="checked">No
                                                                </label>
                                                            </td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="dispoal_method_Label" for="dispoal_method">Method of Disposal:</label></td>
                                                           <td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="dispoal_method" id="dispoal_method" value="1" checked="checked" required>Cremation
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="dispoal_method" id="dispoal_method" value="0">Burial
                                                                </label>
                                                            </td>
		 												</tr>
                                                          <tr>
                                                              <td class="formLabel" align="left"><label id="comments_Label" for="comments">Comments:</label></td>
                                                              <td class="formInput"><textarea type="text" class="form-control" id="comments" name="comments" style="resize: none"></textarea></td>
                                                          </tr>
                                                     </table>
                                                  <table id="genInfoFormTable" class="centred_text add_patient_table">
                                        				
                                                   		<tr style="border:2px #1ab394 solid"> 
															<td class="formLabel" align="left"><label>Consent Part 1:</label></td>
															<td class="formInputConsent"  align="left">
                                                               <div class="radio">
                                                               <?php if($consent_part_1_new == "consent_permanently_retained") {
																   echo '
                                                              	<label><input type="radio" name="consent_part_1" value="consent_permanently_retained" checked="checked" disabled>I consent to my body or body parts being permanently preserved and retained.</label>
																';
															   } else {
																    echo '
                                                              	<label><input type="radio" name="consent_part_1" value="consent_permanently_retained" disabled>I consent to my body or body parts being permanently preserved and retained.</label>
																';
															   }
															   ?>
																   
                                                              </div>
                                                              <div class="radio">
                                                               <?php if($consent_part_1_new == "consent_retained_3_years") {
																   echo '
                                                              	<label><input type="radio" name="consent_part_1" value="consent_retained_3_years" checked="checked" disabled>My body can be retained up to 3 years and</label>';
															   } else {
															   	echo '
                                                              	<label><input type="radio" name="consent_part_1" value="consent_retained_3_years" disabled>My body can be retained up to 3 years and</label>';
															   }
															   ?>
                                                              </div>
                                                            </td>
		 												</tr> 
                                                        <tr>
                                                        	<td class="formLabel" align="left"></td>
                                                        	<td class="formInputConsent"  align="left"></td>
                                                        </tr>
                                                        
                                                        <tr id="consent_retained_3_years_checked" style="border:2px #1ab394 solid">
                                                        	<td class="formLabel" align="left"><label></label></td>
                                                        	<td class="formInputConsent"  align="left">
															
                                                            	<label class="radio">
                                                                <?php if($consent_part_1_3_years_options_new == "1") {
																	echo '
                                                                    <input type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="1" checked="checked" disabled>Parts of my body may be retained upon conclusion of anatomical examination.
																	';
																} else {
																	echo '
                                                                    <input  type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="1" disabled>Parts of my body may be retained upon conclusion of anatomical examination.
																	';
																}
																?>
                                                                </label> 
                                                                <label class="radio">
                                                                 <?php if($consent_part_1_3_years_options_new == "0") {
																	 echo '
                                                                    <input type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="0" checked="checked" disabled>No part of my body may be retained upon conclusion of anatomical examination.';
																 } else {
																	 echo '
                                                                    <input type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="0" disabled>No part of my body may be retained upon conclusion of anatomical examination.';
																 }
																 ?>
                                                                </label>
                                                              
                                                            </td>
                                                        </tr>
                                                         
                                                        <tr>
                                                        	<td class="formLabel" align="left"></td>
                                                        	<td class="formInputConsent"  align="left"></td>
                                                        </tr>
                                                        <tr style="border:2px #9c31b8 solid"> 
															<td class="formLabel" align="left" ><label>Consent Part 2:</label></td>
															<td class="formInputConsent"  align="left">
                                                               <div class="radio">
                                                               <?php if($consent_part_2_new == "consent_images_yes") {
																   echo '
                                                              	<label><input type="radio" name="consent_part_2" value="consent_images_yes" checked="checked" disabled>I consent to the use of images derived from my unidentifiable body or body parts.</label>
																';
															   } else {
																    echo '
                                                              	<label><input type="radio" name="consent_part_2" value="consent_images_yes" disabled>I consent to the use of images derived from my unidentifiable body or body parts.</label>
																';
															   }
															   ?>
                                                              </div>
                                                              <div class="radio">
                                                               <?php if($consent_part_2_new == "consent_images_no") {
																   echo '
                                                              	<label><input type="radio" name="consent_part_2" id="consent_part_2" value="consent_images_no" checked="checked" disabled>I do not consent to the use of images of my body or body parts.</label>
																';
															   } else {
																   echo '
																   <label><input type="radio" name="consent_part_2" id="consent_part_2" value="consent_images_no" disabled>I do not consent to the use of images of my body or body parts.</label>
																';
															   }
															   ?>
                                                              </div>
                                                        </tr>
											</table>
                                            
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="save_and_create_new_prosection" value="Save"/></td>
															<td class="buttons_table_cell pull-right"></td>
														</tr>
													</table>
                                        		</div>
                                        	</form>
                                        <?php
											} else if($show_form_new == false) {
								?>
											
                                        	<div class="form-group centred_text" style="margin-top: 10%">
                                        			<p class="lead">Success - Prosection Added</p>
												</div>
                                                <div style="text-align: center">
												<div id="yourdiv" style="display: inline-block; margin-top:5%;">
													<button class="btn btn-lg btn-primary form_1_button span7 text-center" id="go_home_btn" name="go_home_btn" onclick="go_home()">Home</button>
												</div>
											</div>
                                       

											
    								<?php
    									}
    									mysql_close($db_connect);
    								?>
                                        	
									</div><!-- /.row -->
									
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
   
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
    <!-- Bootstrap datepicker JavaScript-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    
    <!-- For the populating of the selection boxes for the prosection type and regions -->
    <script src="javascript/prosection_type_and_region_selection.js"></script>
    
    <!-- For the populating of the selection boxes for the storage options -->
    <script src="javascript/prosection_storage.js"></script>
     
    <!-- Multiple Selection Box -->
    <script src="bower_components/multiple-select_plugin/multiple-select.js"></script>
    
    <!-- Javascript for the datapicker http://jqueryui.com/datepicker/#dropdown-month-year -->
    <script type="text/javascript">

// function for the datepicker    
$(function () {
	$('#disposal_date').datepicker({
		format: "dd-mm-yyyy", 
		clearBtn: true, 
		changeMonth: true,
		changeYear: true
	});
});

// check what browser is in use
var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
var is_explorer = navigator.userAgent.indexOf('MSIE') > -1;
var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;
var is_safari = navigator.userAgent.indexOf("Safari") > -1;
var is_opera = navigator.userAgent.toLowerCase().indexOf("op") > -1;
if ((is_chrome)&&(is_safari)) {is_safari=false;}
if ((is_chrome)&&(is_opera)) {is_chrome=false;}
    
    //Required attribute fallback for SAFARI (doesn't support the required attribute) 
    // so if the browser in use is safari, don't allow the form to be submitted unless it's all filled in!
    if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
    
    console.log('The browser being used is Safari');    
    
		var forms = document.getElementsByTagName('form');
		
		for (var i = 0; i < forms.length; i++) {
			forms[i].noValidate = true;

			forms[i].addEventListener('submit', function(event) {
				//Prevent submission if checkValidity on the form returns false.
				if (!event.target.checkValidity()) {
					event.preventDefault();
					//Implement you own means of displaying error messages to the user here.
					alert("All fields must be filled in!\n\nYou cannot have blank fields when adding a patient.");
				}
			}, false);
		}
	}

	$('#searchForm').submit(function() {
	  if (!attributeSupported("required") || ($.browser.safari)) {
	   //If required attribute is not supported or browser is Safari (Safari thinks that it has this attribute, but it does not work), then check all fields that has required attribute
	   $("#searchForm [required]").each(function(index) {
		if (!$(this).val()) {
		 //If at least one required value is empty, then ask to fill all required fields.
		 alert("Please fill all required fields.");
		 return false;
		}
	   });
	  }
	  return false; //This is a test form and I'm not going to submit it
	});
	
// function for the CONSENT >> either show the optional consent q or not	
$(document).ready(function(){
		
	var showextraornot = "<?php echo $consent_part_1_new; ?>";
	if(showextraornot == "consent_retained_3_years") {
		$("#consent_retained_3_years_checked").show();
	} else {
		$("#consent_retained_3_years_checked").hide();
	}
	console.log(showextraornot);
	
	$('input[name="consent_part_1"]').click(function(){
		if($(this).attr("value")=="consent_retained_3_years"){
			$("#consent_retained_3_years_checked").show();
		}
		if($(this).attr("value") == "consent_permanently_retained"){
			$("#consent_retained_3_years_checked").hide();
		}
		
	});
});

	// for the help popovers
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({
			html:true,
		}); 
	});
	
	function go_home() {
		window.location = "prosections_homepage.php";
	}
/*	
$(document).ready(function(){
	   var table_row_id = 1;	

	  $("#insert-more").click(function () {
	   $("#prosec_table_3rows").each(function () {
		   var tds = "<tr id='row_" + table_row_id + "'>";
		   jQuery.each($('tr:last td', this), function () {
			   tds += '<td>' + $(this).html() + '</td>';
		   });
		   tds += '</tr>';
		   table_row_id++;
		   console.log(tds);
		   if ($('tbody', this).length > 0) {
			   $('tbody', this).append(tds);
		   } else {
			   $(this).append(tds);
		   }
	   });
	  });

});
*/	
$(document).ready(function(){
	$("#row_1").hide();
	$("#row_2").hide();
	$("#row_3").hide();
	$("#row_4").hide();
	
	var click_counter = 1;
	
	$("#insert-more").click(function () {
		$("#row_" + click_counter).show();
		
		click_counter++;
		if(click_counter == 5) {
			$("#insert-more").hide();
		}
	});
	
});
	</script>
    

</body>

</html>
