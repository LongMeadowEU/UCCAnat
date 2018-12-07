<?php include_once 'init.php'; include_once 'functions/users.php';

//error_reporting(0);
//ini_set('display_errors', 0);

if(logged_in_prosections() !== true) {
	header("Location: index.php");
} 

$selected_subject_number_session = $_SESSION['selected_subject_number_session'];
$selected_prosection_id = $_SESSION['selected_prosection_id'];

//print_r($selected_subject_number_session);
$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
	
$show_form_new = true;

$which_subject_num_from_donor_table = mysqli_query($db_connect,"SELECT * FROM donor_table WHERE subject_number = '$selected_subject_number_session'") or die($connect_error1);

while($record = mysqli_fetch_assoc($which_subject_num_from_donor_table)) {
				
	  $selected_subject_number = $record['subject_number'];
	  $consent_part_1_new = $record['consent_part_1'];
	  $consent_part_1_3_years_options_new = $record['consent_part_1_3_years_options'];
	  $consent_part_2_new = $record['consent_part_2'];

}

$which_prosectionID_from_prosec_table = mysqli_query($db_connect,"SELECT * FROM prosections_table WHERE prosection_id = '$selected_prosection_id'") or die($connect_error1);
while($row = mysqli_fetch_assoc($which_prosectionID_from_prosec_table)) {
	$date_var = $row['date_of_disposal_prosec'];;
	$prosec_disposal_date = date('d-m-Y', strtotime($date_var));
	$prosec_send_to_archive = $row['send_to_archive'];
	$prosec_disposal_method = $row['disposal_method'];
	$prosec_comments = $row['prosec_comments'];
	$prosec_plastinated = $row['plastinated'];
	
	$prosection_type_1 = $row['prosection_type'];
	$prosection_type_2 = $row['prosection_type_1'];
	$prosection_type_3 = $row['prosection_type_2'];
	$prosection_type_4 = $row['prosection_type_3'];
	$prosection_type_5 = $row['prosection_type_4'];
	
	$prosection_region_1 = $row['prosection_region'];
	$prosection_region_2 = $row['prosection_region_1'];
	$prosection_region_3 = $row['prosection_region_2'];
	$prosection_region_4 = $row['prosection_region_3'];
	$prosection_region_5 = $row['prosection_region_4'];
	
	$prosection_feature_region_specific_1 = explode(', ', $row['prosection_feature_specific']);
	$prosection_feature_region_specific_2 = explode(', ', $row['prosection_feature_specific_1']);
	$prosection_feature_region_specific_3 = explode(', ', $row['prosection_feature_specific_2']);
	$prosection_feature_region_specific_4 = explode(', ', $row['prosection_feature_specific_3']);
	$prosection_feature_region_specific_5 = explode(', ', $row['prosection_feature_specific_4']);
	
	$storage_type = $row['storage_type'];
	$storage_unit = $row['storage_unit'];
	$storage_shelf = $row['storage_shelf'];
	
}

if(isset($_POST['save_and_edit_prosection'])) {
	  $prosection_types_array = array();
	  $prosection_regions_array = array();
	  $prosection_features_array = array();
	  
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
		  
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_type_1 = '$type_of_prosection_1' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_region_1 = '$prosection_region_1' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_feature_specific_1 = '$prosection_feature_specific_1' WHERE prosection_id = '$selected_prosection_id'");
		  
	  } else {
		   $type_of_prosection_1 = "0";
		   $prosection_region_1 = "0";
		   $prosection_feature_specific_1 = "0";
		   
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_type_1 = '$type_of_prosection_1' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_region_1 = '$prosection_region_1' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_feature_specific_1 = '$prosection_feature_specific_1' WHERE prosection_id = '$selected_prosection_id'");
	  }
	  
	  if(isset($_POST['type_of_prosection_2'])) {
		  $type_of_prosection_2 = $_POST['type_of_prosection_2'];
		  array_push($prosection_types_array, $type_of_prosection_2);
		  $prosection_region_2 = $_POST['prosection_region_2'];
		  array_push($prosection_regions_array, $prosection_region_2);
		  $select_pro_features_2 = $_POST['prosection_region_specific_2'];
	  	  $prosection_feature_specific_2 = implode(', ', $_POST['prosection_region_specific_2']);
		  array_push($prosection_features_array, $prosection_feature_specific_2);
		  
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_type_2 = '$type_of_prosection_2' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_region_2 = '$prosection_region_2' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_feature_specific_2 = '$prosection_feature_specific_2' WHERE prosection_id = '$selected_prosection_id'");
		  
	  } else {
		   $type_of_prosection_2 = "0";
		   $prosection_region_2 = "0";
		   $prosection_feature_specific_2 = "0";
		   
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_type_2 = '$type_of_prosection_2' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_region_2 = '$prosection_region_2' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_feature_specific_2 = '$prosection_feature_specific_2' WHERE prosection_id = '$selected_prosection_id'");
	  }
	  
	  if(isset($_POST['type_of_prosection_3'])) {
		  $type_of_prosection_3 = $_POST['type_of_prosection_3'];
		  array_push($prosection_types_array, $type_of_prosection_3);
		  $prosection_region_3 = $_POST['prosection_region_3'];
		  array_push($prosection_regions_array, $prosection_region_3);
		  $select_pro_features_3 = $_POST['prosection_region_specific_3'];
	  	  $prosection_feature_specific_3 = implode(', ', $_POST['prosection_region_specific_3']);
		  array_push($prosection_features_array, $prosection_feature_specific_3);
		  
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_type_3 = '$type_of_prosection_3' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_region_3 = '$prosection_region_3' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_feature_specific_3 = '$prosection_feature_specific_3' WHERE prosection_id = '$selected_prosection_id'");
		  
	  } else {
		   $type_of_prosection_3 = "0";
		   $prosection_region_3 = "0";
		   $prosection_feature_specific_3 = "0";
		   
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_type_3 = '$type_of_prosection_3' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_region_3 = '$prosection_region_3' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_feature_specific_3 = '$prosection_feature_specific_3' WHERE prosection_id = '$selected_prosection_id'");
	  }
	  
	  if(isset($_POST['type_of_prosection_4'])) {
		  $type_of_prosection_4 = $_POST['type_of_prosection_4'];
		  array_push($prosection_types_array, $type_of_prosection_4);
		  $prosection_region_4 = $_POST['prosection_region_4'];
		  array_push($prosection_regions_array, $prosection_region_4);
		  $select_pro_features_4 = $_POST['prosection_region_specific_4'];
	  	  $prosection_feature_specific_4 = implode(', ', $_POST['prosection_region_specific_4']);
		  array_push($prosection_features_array, $prosection_feature_specific_4);
		  
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_type_4 = '$type_of_prosection_4' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_region_4 = '$prosection_region_4' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_feature_specific_4 = '$prosection_feature_specific_4' WHERE prosection_id = '$selected_prosection_id'");
		  
	  } else {
		   $type_of_prosection_4 = "0";
		   $prosection_region_4 = "0";
		   $prosection_feature_specific_4 = "0";
		   
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_type_4 = '$type_of_prosection_4' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_region_4 = '$prosection_region_4' WHERE prosection_id = '$selected_prosection_id'");
		  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_feature_specific_4 = '$prosection_feature_specific_4' WHERE prosection_id = '$selected_prosection_id'");
		  
	  }
	  $prosection_types_array_insert = implode(', ', $prosection_types_array);
	  $prosection_regions_array_insert = implode(', ', $prosection_regions_array);
	  $prosection_features_array_insert = implode(', ', $prosection_features_array);
  
  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_type = '$prosection_type' WHERE prosection_id = '$selected_prosection_id'");
  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_region = '$prosection_region' WHERE prosection_id = '$selected_prosection_id'");
  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_feature_specific = '$prosection_feature_specific' WHERE prosection_id = '$selected_prosection_id'");
  
  mysqli_query($db_connect,"UPDATE prosections_table SET storage_type = '$storage_type' WHERE prosection_id = '$selected_prosection_id'");
  mysqli_query($db_connect,"UPDATE prosections_table SET storage_unit = '$storage_unit' WHERE prosection_id = '$selected_prosection_id'");
  mysqli_query($db_connect,"UPDATE prosections_table SET storage_shelf = '$storage_shelf' WHERE prosection_id = '$selected_prosection_id'");
  
  mysqli_query($db_connect,"UPDATE prosections_table SET plastinated = '$plastinated' WHERE prosection_id = '$selected_prosection_id'");
  mysqli_query($db_connect,"UPDATE prosections_table SET date_of_disposal_prosec = '$disposal_date' WHERE prosection_id = '$selected_prosection_id'");
  mysqli_query($db_connect,"UPDATE prosections_table SET send_to_archive = '$send_to_archive' WHERE prosection_id = '$selected_prosection_id'");
  mysqli_query($db_connect,"UPDATE prosections_table SET disposal_method = '$disposal_method' WHERE prosection_id = '$selected_prosection_id'");
  mysqli_query($db_connect,"UPDATE prosections_table SET prosec_comments = '$prosec_comments' WHERE prosection_id = '$selected_prosection_id'");
  
  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_types_list = '$prosection_types_array_insert' WHERE prosection_id = '$selected_prosection_id'");
  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_regions_list = '$prosection_regions_array_insert' WHERE prosection_id = '$selected_prosection_id'");
  mysqli_query($db_connect,"UPDATE prosections_table SET prosection_features_list = '$prosection_features_array_insert' WHERE prosection_id = '$selected_prosection_id'");
	  
	$new_row_to_add = false;
	header("Location: edit_selected_prosection.php");
	  
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

    <title>Edit Prosection</title>

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

<body onload="go_function()">

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
                                  <h2 class="page-header" id="homepageHeader">Edit Prosection</h2>
                                  <ol class="breadcrumb">
                                      <li>
										<a href="prosections_homepage.php">Home</a>
                                      </li>
                                      <li class="active">
                                          <a href="edit_selected_prosection.php"><strong>Edit Prosection <?php echo $selected_prosection_id;?> (for Subject Number <?php echo $selected_subject_number_session; ?> )</strong></a>
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
                                                 <table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell"></td>
															<td class="buttons_table_cell">
																<button type="button" class="btn btn-md btn-success form_1_button" value="edit" id="edit_button"><i class="fa fa-pencil"></i> Edit</button>
															</td>
															<td class="buttons_table_cell"></td>
														</tr>
													</table>
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table" style="margin-top:10px">
                                                   		<tr>
															<td class="formLabel" align="left"><label id="prosection_id_Label" for="prosection_id">Prosection ID:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="prosection_id" ame="prosection_id" value='<?php echo $selected_prosection_id; ?>' disabled></td>
		 												</tr>
                                                     </table>
                                                     <table id="genInfoFormTable" class="centred_text add_patient_table prosec_table">    
														<tr style="width:100%;">
															<td align="left" style="width:33%;">
																<select class="form-control enable_disable" id="type_of_prosection" name="type_of_prosection" required>
																	<?php 	
																	
																	if($prosection_type_1 == "ul") { 
																		echo '<option value="ul" name="ul" selected="selected">UL</option>';
																	} else {
																		echo '<option value="ul" name="ul">UL</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_1 == "ll") { 
																		echo '<option value="ll" name="ll" selected="selected">LL</option>';
																	} else {
																		echo '<option value="ll" name="ll">LL</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_1 == "tx") { 
																		echo '<option value="tx" name="tx" selected="selected">TX</option>';
																	} else {
																		echo '<option value="tx" name="tx">TX</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_1 == "ab") { 
																		echo '<option value="ab" name="ab" selected="selected">AB</option>';
																	} else {
																		echo '<option value="ab" name="ab">AB</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_1 == "gu") { 
																		echo '<option value="gu" name="gu" selected="selected">GU</option>';
																	} else {
																		echo '<option value="gu" name="gu">GU</option>';
																	}
																	?>
                                                                     <?php 	
																	if($prosection_type_1 == "head_and_neck") { 
																		echo '<option value="head_and_neck" name="head_and_neck" selected="selected">Head and Neck</option>';
																	} else {
																		echo '<option value="head_and_neck" name="head_and_neck">Head and Neck</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_1 == "back") { 
																		echo '<option value="back" name="back" selected="selected">Back</option>';
																	} else {
																		echo '<option value="back" name="back">Back</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_1 == "neuro") { 
																		echo '<option value="neuro" name="neuro" selected="selected">Neuro</option>';
																	} else {
																		echo '<option value="neuro" name="neuro">Neuro</option>';
																	}
																	?>
																</select>
															</td>
															<td align="left" style="width:33%;">
																<select class="form-control enable_disable" id="prosection_region" name="prosection_region" required>
																		<option id="prosection_region_placeholder" name="prosection_region_placeholder" disabled selected>Prosection Region</option>
																</select>
															</td>
                                                            <td align="left" style="width:33%;">
                                                            	<select multiple="multiple" class="enable_disable" id="prosection_region_specific" name="prosection_region_specific[]" style="width:100%" required>
																		<option id="prosection_region_specific_placeholder" name="prosection_region_specific_placeholder" disabled selected>Prosection Region Specific</option>
																</select>
                                                            </td>
														</tr>
                                                    <?php 
													   if($prosection_type_2 != "0") {
													?>
                                                        <tr style="width:100%;">
															<td align="left" style="width:33%;">
																<select class="form-control enable_disable" id="type_of_prosection_1" name="type_of_prosection_1">
																	<?php 	
																	
																	if($prosection_type_2 == "ul") { 
																		echo '<option value="ul" name="ul" selected="selected">UL</option>';
																	} else {
																		echo '<option value="ul" name="ul">UL</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_2 == "ll") { 
																		echo '<option value="ll" name="ll" selected="selected">LL</option>';
																	} else {
																		echo '<option value="ll" name="ll">LL</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_2 == "tx") { 
																		echo '<option value="tx" name="tx" selected="selected">TX</option>';
																	} else {
																		echo '<option value="tx" name="tx">TX</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_2 == "ab") { 
																		echo '<option value="ab" name="ab" selected="selected">AB</option>';
																	} else {
																		echo '<option value="ab" name="ab">AB</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_2 == "gu") { 
																		echo '<option value="gu" name="gu" selected="selected">GU</option>';
																	} else {
																		echo '<option value="gu" name="gu">GU</option>';
																	}
																	?>
                                                                     <?php 	
																	if($prosection_type_2 == "head_and_neck") { 
																		echo '<option value="head_and_neck" name="head_and_neck" selected="selected">Head and Neck</option>';
																	} else {
																		echo '<option value="head_and_neck" name="head_and_neck">Head and Neck</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_2 == "back") { 
																		echo '<option value="back" name="back" selected="selected">Back</option>';
																	} else {
																		echo '<option value="back" name="back">Back</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_2 == "neuro") { 
																		echo '<option value="neuro" name="neuro" selected="selected">Neuro</option>';
																	} else {
																		echo '<option value="neuro" name="neuro">Neuro</option>';
																	}
																	?>
                                                                   
																</select>
															</td>
															<td align="left" style="width:33%;">
																<select class="form-control enable_disable" id="prosection_region_1" name="prosection_region_1" required>
																		<option id="prosection_region_placeholder" name="prosection_region_placeholder" disabled selected>Prosection Region</option>
																</select>
															</td>
                                                            <td align="left" style="width:33%;">
                                                            	<select multiple="multiple" id="prosection_region_specific_1" name="prosection_region_specific_1[]" style="width:100%" required>
																		<option id="prosection_region_specific_placeholder" name="prosection_region_specific_placeholder" disabled selected>Prosection Region Specific</option>
																</select>
                                                            </td>
														</tr>
                                                        <?php 
													  		 }
													   ?>
                                                    <?php 
													   if($prosection_type_3 != "0") {
														  
													?>
                                                        <tr style="width:100%;">
															<td align="left" style="width:33%;">
																<select class="form-control enable_disable" id="type_of_prosection_2" name="type_of_prosection_2">
																	<?php 	
																	
																	if($prosection_type_3 == "ul") { 
																		echo '<option value="ul" name="ul" selected="selected">UL</option>';
																	} else {
																		echo '<option value="ul" name="ul">UL</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_3 == "ll") { 
																		echo '<option value="ll" name="ll" selected="selected">LL</option>';
																	} else {
																		echo '<option value="ll" name="ll">LL</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_3 == "tx") { 
																		echo '<option value="tx" name="tx" selected="selected">TX</option>';
																	} else {
																		echo '<option value="tx" name="tx">TX</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_3 == "ab") { 
																		echo '<option value="ab" name="ab" selected="selected">AB</option>';
																	} else {
																		echo '<option value="ab" name="ab">AB</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_3 == "gu") { 
																		echo '<option value="gu" name="gu" selected="selected">GU</option>';
																	} else {
																		echo '<option value="gu" name="gu">GU</option>';
																	}
																	?>
                                                                     <?php 	
																	if($prosection_type_3 == "head_and_neck") { 
																		echo '<option value="head_and_neck" name="head_and_neck" selected="selected">Head and Neck</option>';
																	} else {
																		echo '<option value="head_and_neck" name="head_and_neck">Head and Neck</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_3 == "back") { 
																		echo '<option value="back" name="back" selected="selected">Back</option>';
																	} else {
																		echo '<option value="back" name="back">Back</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_3 == "neuro") { 
																		echo '<option value="neuro" name="neuro" selected="selected">Neuro</option>';
																	} else {
																		echo '<option value="neuro" name="neuro">Neuro</option>';
																	}
																	?>
                                                                   
																</select>
															</td>
															<td align="left" style="width:33%;">
																<select class="form-control enable_disable" id="prosection_region_2" name="prosection_region_2" required>
																		<option id="prosection_region_placeholder" name="prosection_region_placeholder" disabled selected>Prosection Region</option>
																</select>
															</td>
                                                            <td align="left" style="width:33%;">
                                                            	<select multiple="multiple" id="prosection_region_specific_2" name="prosection_region_specific_2[]" style="width:100%" required>
																		<option id="prosection_region_specific_placeholder" name="prosection_region_specific_placeholder" disabled selected>Prosection Region Specific</option>
																</select>
                                                            </td>
														</tr>
                                                        <?php 
													  		 }
													   ?>
                                                       
                                                    <?php 
													   if($prosection_type_4 != "0") {
														
													?>
																<tr style="width:100%;">
															<td align="left" style="width:33%;">
																<select class="form-control enable_disable" id="type_of_prosection_3" name="type_of_prosection_3">
																	<?php 	
																	
																	if($prosection_type_4 == "ul") { 
																		echo '<option value="ul" name="ul" selected="selected">UL</option>';
																	} else {
																		echo '<option value="ul" name="ul">UL</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_4 == "ll") { 
																		echo '<option value="ll" name="ll" selected="selected">LL</option>';
																	} else {
																		echo '<option value="ll" name="ll">LL</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_4 == "tx") { 
																		echo '<option value="tx" name="tx" selected="selected">TX</option>';
																	} else {
																		echo '<option value="tx" name="tx">TX</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_4 == "ab") { 
																		echo '<option value="ab" name="ab" selected="selected">AB</option>';
																	} else {
																		echo '<option value="ab" name="ab">AB</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_4 == "gu") { 
																		echo '<option value="gu" name="gu" selected="selected">GU</option>';
																	} else {
																		echo '<option value="gu" name="gu">GU</option>';
																	}
																	?>
                                                                     <?php 	
																	if($prosection_type_4 == "head_and_neck") { 
																		echo '<option value="head_and_neck" name="head_and_neck" selected="selected">Head and Neck</option>';
																	} else {
																		echo '<option value="head_and_neck" name="head_and_neck">Head and Neck</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_4 == "back") { 
																		echo '<option value="back" name="back" selected="selected">Back</option>';
																	} else {
																		echo '<option value="back" name="back">Back</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_4 == "neuro") { 
																		echo '<option value="neuro" name="neuro" selected="selected">Neuro</option>';
																	} else {
																		echo '<option value="neuro" name="neuro">Neuro</option>';
																	}
																	?>
                                                                   
																</select>
															</td>
															<td align="left" style="width:33%;">
																<select class="form-control enable_disable" id="prosection_region_3" name="prosection_region_3" required>
																		<option id="prosection_region_placeholder" name="prosection_region_placeholder" disabled selected>Prosection Region</option>
																</select>
															</td>
                                                            <td align="left" style="width:33%;">
                                                            	<select multiple="multiple" id="prosection_region_specific_3" name="prosection_region_specific_3[]" style="width:100%" required>
																		<option id="prosection_region_specific_placeholder" name="prosection_region_specific_placeholder" disabled selected>Prosection Region Specific</option>
																</select>
                                                            </td>
														</tr>
                                                       <?php
													   }
													   ?>
                                                       
                                                    <?php 
													   if($prosection_type_5 != "0") {
														
													?>
														<tr style="width:100%;">
															<td align="left" style="width:33%;">
																<select class="form-control enable_disable" id="type_of_prosection_4" name="type_of_prosection_4">
																	<?php 	
																	
																	if($prosection_type_5 == "ul") { 
																		echo '<option value="ul" name="ul" selected="selected">UL</option>';
																	} else {
																		echo '<option value="ul" name="ul">UL</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_5 == "ll") { 
																		echo '<option value="ll" name="ll" selected="selected">LL</option>';
																	} else {
																		echo '<option value="ll" name="ll">LL</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_5 == "tx") { 
																		echo '<option value="tx" name="tx" selected="selected">TX</option>';
																	} else {
																		echo '<option value="tx" name="tx">TX</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_5 == "ab") { 
																		echo '<option value="ab" name="ab" selected="selected">AB</option>';
																	} else {
																		echo '<option value="ab" name="ab">AB</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_5 == "gu") { 
																		echo '<option value="gu" name="gu" selected="selected">GU</option>';
																	} else {
																		echo '<option value="gu" name="gu">GU</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_5 == "head_and_neck") { 
																		echo '<option value="head_and_neck" name="head_and_neck" selected="selected">Head and Neck</option>';
																	} else {
																		echo '<option value="head_and_neck" name="head_and_neck">Head and Neck</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_5 == "back") { 
																		echo '<option value="back" name="back" selected="selected">Back</option>';
																	} else {
																		echo '<option value="back" name="back">Back</option>';
																	}
																	?>
                                                                    <?php 	
																	if($prosection_type_5 == "neuro") { 
																		echo '<option value="neuro" name="neuro" selected="selected">Neuro</option>';
																	} else {
																		echo '<option value="neuro" name="neuro">Neuro</option>';
																	}
																	?>
                                                                    
																</select>
															</td>
															<td align="left" style="width:33%;">
																<select class="form-control enable_disable" id="prosection_region_4" name="prosection_region_4" required>
																		<option id="prosection_region_placeholder" name="prosection_region_placeholder" disabled selected>Prosection Region</option>
																</select>
															</td>
                                                            <td align="left" style="width:33%;">
                                                            	<select multiple="multiple" id="prosection_region_specific_4" name="prosection_region_specific_4[]" style="width:100%" required>
																		<option id="prosection_region_specific_placeholder" name="prosection_region_specific_placeholder" disabled selected>Prosection Region Specific</option>
																</select>
                                                            </td>
														</tr>
                                                       <?php
													   }
													   ?>
                                                      </table>
                                                       <br/>
                                                      <a class="btn btn-sm btn-success form_1_button enable_disable" id="insert-more">Add Row</a>
                                                      
                                                     <table id="genInfoFormTable" class="centred_text add_patient_table">  
                                                        <tr>
															<td align="left" style="width:20%">
																<select class="form-control enable_disable" id="storage" name="storage" required>
                                                                        <?php 	
																			if($storage_type == "fridge") { 
																				echo '<option value="fridge" name="fridge" selected="selected">Fridge</option>';
																			} else {
																				echo '<option value="fridge" name="fridge">Fridge</option>';
																			}
																			
																			if($storage_type == "freezer") { 
																				echo '<option value="freezer" name="freezer" selected="selected">Freezer</option>';
																			} else {
																				echo '<option value="freezer" name="freezer">Freezer</option>';
																			}
																			
																			if($storage_type == "tank") { 
																				echo '<option value="tank" name="tank" selected="selected">Tank</option>';
																			} else {
																				echo '<option value="tank" name="tank">Tank</option>';
																			}
																		?>
																		
																</select>
															</td>
															<td style="width:20%">
																<select class="form-control enable_disable" id="unit" name="unit" required>
																		<option id="unit_placeholder" name="unit_placeholder" disabled selected>Unit</option>
																</select>
															</td>
                                                            <td style="width:20%">
                                                            	<select class="form-control enable_disable" id="shelf" name="shelf" required>
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
                                                                <?php if($prosec_plastinated == "1") {
																echo '<input type="radio" class="enable_disable" name="plastinated" id="plastinated"  value="1" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="plastinated" id="plastinated"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($prosec_plastinated == "0") {
																echo '<input type="radio" class="enable_disable" name="plastinated" id="plastinated"  value="0" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="plastinated" id="plastinated"  value="0"/>';
																}; ?>
                                                                No</label>
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
																	<input type="text" class="form-control enable_disable" name="disposal_date" id="disposal_date" value="<?php echo $prosec_disposal_date;?>" required/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                         <tr>
															<td class="formLabel" align="left"><label id="send_to_archive_Label" for="send_to_archive">Send to Archive:</label></td>
                                                           <td class="formInput">
                                                           	<label class="radio-inline">
                                                                <?php if($prosec_send_to_archive == "1") {
																echo '<input type="radio" class="enable_disable" name="send_to_archive" id="send_to_archive"  value="1" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="send_to_archive" id="send_to_archive"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($prosec_send_to_archive == "0") {
																echo '<input type="radio" class="enable_disable" name="send_to_archive" id="send_to_archive"  value="0" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="send_to_archive" id="send_to_archive"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="dispoal_method_Label" for="dispoal_method">Method of Disposal:</label></td>
                                                           <td class="formInput">
                                                            <label class="radio-inline">
                                                                <?php if($prosec_disposal_method == "1") {
																echo '<input type="radio" class="enable_disable" name="dispoal_method" id="dispoal_method"  value="1" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="dispoal_method" id="dispoal_method"  value="1"/>';
																}; ?>
                                                                Cremation</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($prosec_disposal_method == "0") {
																echo '<input type="radio" class="enable_disable" name="dispoal_method" id="dispoal_method"  value="0" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="dispoal_method" id="dispoal_method"  value="0"/>';
																}; ?>
                                                                Burial</label>
                                                            </td>
		 												</tr>
                                                          <tr>
                                                              <td class="formLabel" align="left"><label id="comments_Label" for="comments">Comments:</label></td>
                                                              <td class="formInput"><textarea type="text" class="form-control enable_disable" id="comments" name="comments" style="resize: none"><?php echo $prosec_comments ?></textarea></td>
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
													<table id="save_cancel_table" class="buttons_table centred_text">
														<tr class="buttons_table_row">
															<td class="save_cancel_cell"><button type="button" class="btn btn-lg btn-danger save_cancel_btn" name="cancel_editing" id="cancel_editing" value="Cancel" onclick="refresh_page()">Cancel</button></td>
															<td class="space_cell"></td>
															<td class="save_cancel_cell"><input class="btn btn-lg btn-primary save_cancel_btn" type="submit" name="save_and_edit_prosection" id="save_and_edit_prosection" value="Save"/></td>
														</tr>
													</table>
                                            </div>
                                        </form>
    								<?php
    									}
    									mysqli_close($db_connect);
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
    <script src="javascript/selection_boxes_edit_page.js"></script>
    
    <!-- For the populating of the selection boxes for the storage options -->
    <script src="javascript/prosection_storage_edit.js"></script>
     
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
	//console.log(showextraornot);
	
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
	
// make all input boxes disabled on page load. Toggle enabled/disabled state when edit button is clicked
$(document).ready(function() {
	
	$(".enable_disable").prop('disabled', true);
	$('#cancel_editing').attr("disabled", true);
	$('#save_and_edit_prosection').attr("disabled", true);
	$('#insert-more').attr("disabled", true);
				
    $('#edit_button').click(function() {
			$('.enable_disable').each(function() {
				if ($(this).attr('disabled')) {
					$(this).removeAttr('disabled');
					$('#cancel_editing').attr("disabled", false);
					$('#save_and_edit_prosection').attr("disabled", false);
					$('#insert-more').attr("disabled", false);
					$('#prosection_region_specific').multipleSelect("enable");
					$('#prosection_region_specific_1').multipleSelect("enable");
					$('#prosection_region_specific_2').multipleSelect("enable");
					$('#prosection_region_specific_3').multipleSelect("enable");
					$('#prosection_region_specific_4').multipleSelect("enable");
				}
				else {
					$(this).attr({
						'disabled': 'disabled'
					});
					$('#cancel_editing').attr("disabled", true);
					$('#save_and_edit_prosection').attr("disabled", true);
					$('#insert-more').attr("disabled", true);
					$('#prosection_region_specific').multipleSelect("disable");
					$('#prosection_region_specific_1').multipleSelect("disable");
					$('#prosection_region_specific_2').multipleSelect("disable");
					$('#prosection_region_specific_3').multipleSelect("disable");
					$('#prosection_region_specific_4').multipleSelect("disable");
				}
			});
		});
});

	function refresh_page() {
		window.location = "edit_selected_prosection.php";
	}
	
	var php_var = "<?php echo $storage_unit; ?>";
	//console.log("storage unit val selected from PHP = " + php_var);
	
	var php_var_shelf = "<?php echo $storage_shelf; ?>";
	//console.log("storage shelf val selected from PHP = " + php_var_shelf);
	
	var php_var_prosec_type1 = "<?php echo $prosection_type_1; ?>";
	//console.log("prosec type 1 selected from PHP = " + php_var_prosec_type1);
	
	var php_var_prosec_type2 = "<?php echo $prosection_type_2; ?>";
	//console.log("prosec type 2 selected from PHP = " + php_var_prosec_type2);
	
	var php_var_prosec_type3 = "<?php echo $prosection_type_3; ?>";
	//console.log("prosec type 3 selected from PHP = " + php_var_prosec_type3);
	
	var php_var_prosec_type4 = "<?php echo $prosection_type_4; ?>";
	//console.log("prosec type 4 selected from PHP = " + php_var_prosec_type4);
	
	var php_var_prosec_type5 = "<?php echo $prosection_type_5; ?>";
	//console.log("prosec type 5 selected from PHP = " + php_var_prosec_type5);
	
	var php_var_prosec_region1 = "<?php echo $prosection_region_1; ?>";
	var php_var_prosec_region2 = "<?php echo $prosection_region_2; ?>";
	var php_var_prosec_region3 = "<?php echo $prosection_region_3; ?>";
	var php_var_prosec_region4 = "<?php echo $prosection_region_4; ?>";
	var php_var_prosec_region5 = "<?php echo $prosection_region_5; ?>";
	
	//alert(php_var_prosec_region1);
	
	var php_feature_specific_array_1 = <?php echo json_encode($prosection_feature_region_specific_1); ?>;
	var php_feature_specific_array_2 = <?php echo json_encode($prosection_feature_region_specific_2); ?>;
	var php_feature_specific_array_3 = <?php echo json_encode($prosection_feature_region_specific_3); ?>;
	var php_feature_specific_array_4 = <?php echo json_encode($prosection_feature_region_specific_4); ?>;
	var php_feature_specific_array_5 = <?php echo json_encode($prosection_feature_region_specific_5); ?>;
	
	//alert(php_feature_specific_array_1);
	
$(document).ready(function(){
	
	var click_counter = 1;
	
	var prosection_type_2_ya_no = "<?php echo $prosection_type_2; ?>";
	console.log("prosection_type_2_ya_no = " + prosection_type_2_ya_no);
	if(prosection_type_2_ya_no === "0") {
		 var php_is_prosection_2_present = "no";
	} else if(prosection_type_2_ya_no !== "0"){
		 var php_is_prosection_2_present = "yes";
		 click_counter ++;
	}
	console.log("is php_is_prosection_2_present? = " + php_is_prosection_2_present);
	
	var prosection_type_3_ya_no = "<?php echo $prosection_type_3; ?>";
	console.log("prosection_type_3_ya_no = " + prosection_type_3_ya_no);
	if(prosection_type_3_ya_no === "0") {
		 var php_is_prosection_3_present = "no";
	} else if(prosection_type_3_ya_no !== "0"){
		 var php_is_prosection_3_present = "yes";
		 click_counter ++;
	}
	console.log("is php_is_prosection_3_present? = " + php_is_prosection_3_present);
	
	var prosection_type_4_ya_no = "<?php echo $prosection_type_4; ?>";
	console.log("prosection_type_4_ya_no = " + prosection_type_4_ya_no);
	if(prosection_type_4_ya_no === "0") {
		 var php_is_prosection_4_present = "no";
	} else if(prosection_type_4_ya_no !== "0"){
		 var php_is_prosection_4_present = "yes";
		 click_counter ++;
	}
	console.log("is php_is_prosection_4_present? = " + php_is_prosection_4_present);
	
	var prosection_type_5_ya_no = "<?php echo $prosection_type_5; ?>";
	console.log("prosection_type_5_ya_no = " + prosection_type_5_ya_no);
	if(prosection_type_5_ya_no === "0") {
		 var php_is_prosection_5_present = "no";
	} else if(prosection_type_5_ya_no !== "0"){
		 var php_is_prosection_5_present = "yes";
		 click_counter ++;
	}
	console.log("is php_is_prosection_5_present? = " + php_is_prosection_5_present);
	
	$("#row_1").hide();
	$("#row_2").hide();
	$("#row_3").hide();
	$("#row_4").hide();
	
	console.log("initial click counter value = " + click_counter);
	if(click_counter == 5) {
		$("#insert-more").hide();
	}
	
	$("#insert-more").click(function () {
		$("#row_" + click_counter).show();
		
		click_counter++;
		console.log("click counter value = " + click_counter);
		
		if(click_counter == 2) {
			$('.prosec_table').append('<tr id="row_'+(2)+'" style="width:100%;" ></tr>');
			 	$('#row_'+ 2).html("<td align='left' style='width:33%;'><select class='form-control' id='type_of_prosection_1' name='type_of_prosection_1'><option id='search_query_placeholder_criteria_1' name='search_query_placeholder_criteria_1' disabled selected>Type of Prosection</option><option id='ul' name='ul' value='ul'>UL</option><option id='ll' name='ll' value='ll'>LL</option><option id='tx' name='tx' value='tx'>TX</option><option id='ab' name='ab' value='ab'>AB</option><option id='gu' name='gu' value='gu'>GU</option><option id='head_and_neck' name='head_and_neck' value='head_and_neck'>Head and Neck</option><option id='back' name='back' value='back'>Back</option><option id='neuro' name='neuro' value='neuro'>Neuro</option></select></td><td align='left' style='width:33%;'><select class='form-control' id='prosection_region_1' name='prosection_region_1'><option id='prosection_region_placeholder' name='prosection_region_placeholder' disabled selected>Prosection Region</option></select></td><td align='left' style='width:33%;'><select multiple='multiple' id='prosection_region_specific_1' name='prosection_region_specific_1[]' style='width:100%'><option id='prosection_region_specific_placeholder' name='prosection_region_specific_placeholder' disabled selected>Prosection Region Specific</option></select></td>");
				$('#prosection_region_specific_1').multipleSelect({
				  placeholder: "Select specific region", 
				  filter: true
			  });
		}	
		
		if(click_counter == 3) {
			$('.prosec_table').append('<tr id="row_'+(3)+'" style="width:100%;" ></tr>');
			 	$('#row_'+ 3).html("<td align='left' style='width:33%;'><select class='form-control' id='type_of_prosection_2' name='type_of_prosection_2'><option id='search_query_placeholder_criteria_2' name='search_query_placeholder_criteria_2' disabled selected>Type of Prosection</option><option id='ul' name='ul' value='ul'>UL</option><option id='ll' name='ll' value='ll'>LL</option><option id='tx' name='tx' value='tx'>TX</option><option id='ab' name='ab' value='ab'>AB</option><option id='gu' name='gu' value='gu'>GU</option><option id='head_and_neck' name='head_and_neck' value='head_and_neck'>Head and Neck</option><option id='back' name='back' value='back'>Back</option><option id='neuro' name='neuro' value='neuro'>Neuro</option></select></td><td align='left' style='width:33%;'><select class='form-control' id='prosection_region_2' name='prosection_region_2'><option id='prosection_region_placeholder' name='prosection_region_placeholder' disabled selected>Prosection Region</option></select></td><td align='left' style='width:33%;'><select multiple='multiple' id='prosection_region_specific_2' name='prosection_region_specific_2[]' style='width:100%'><option id='prosection_region_specific_placeholder' name='prosection_region_specific_placeholder' disabled selected>Prosection Region Specific</option></select></td>");
				$('#prosection_region_specific_2').multipleSelect({
				  placeholder: "Select specific region", 
				  filter: true
			  });

		}	
		
		if(click_counter == 4) {
			$('.prosec_table').append('<tr id="row_'+(4)+'" style="width:100%;" ></tr>');
			 	$('#row_'+ 4).html("<td align='left' style='width:33%;'><select class='form-control' id='type_of_prosection_3' name='type_of_prosection_3'><option id='search_query_placeholder_criteria_3' name='search_query_placeholder_criteria_3' disabled selected>Type of Prosection</option><option id='ul' name='ul' value='ul'>UL</option><option id='ll' name='ll' value='ll'>LL</option><option id='tx' name='tx' value='tx'>TX</option><option id='ab' name='ab' value='ab'>AB</option><option id='gu' name='gu' value='gu'>GU</option><option id='head_and_neck' name='head_and_neck' value='head_and_neck'>Head and Neck</option><option id='back' name='back' value='back'>Back</option><option id='neuro' name='neuro' value='neuro'>Neuro</option></select></td><td align='left' style='width:33%;'><select class='form-control' id='prosection_region_3' name='prosection_region_3'><option id='prosection_region_placeholder' name='prosection_region_placeholder' disabled selected>Prosection Region</option></select></td><td align='left' style='width:33%;'><select multiple='multiple' id='prosection_region_specific_3' name='prosection_region_specific_3[]' style='width:100%'><option id='prosection_region_specific_placeholder' name='prosection_region_specific_placeholder' disabled selected>Prosection Region Specific</option></select></td>");
				$('#prosection_region_specific_3').multipleSelect({
				  placeholder: "Select specific region", 
				  filter: true
			  });


		}	
		
		if(click_counter == 5) {
			$('.prosec_table').append('<tr id="row_'+(5)+'" style="width:100%;" ></tr>');
			 	$('#row_'+ 5).html("<td align='left' style='width:33%;'><select class='form-control' id='type_of_prosection_4' name='type_of_prosection_4'><option id='search_query_placeholder_criteria_4' name='search_query_placeholder_criteria_4' disabled selected>Type of Prosection</option><option id='ul' name='ul' value='ul'>UL</option><option id='ll' name='ll' value='ll'>LL</option><option id='tx' name='tx' value='tx'>TX</option><option id='ab' name='ab' value='ab'>AB</option><option id='gu' name='gu' value='gu'>GU</option><option id='head_and_neck' name='head_and_neck' value='head_and_neck'>Head and Neck</option><option id='back' name='back' value='back'>Back</option><option id='neuro' name='neuro' value='neuro'>Neuro</option></select></td><td align='left' style='width:33%;'><select class='form-control' id='prosection_region_4' name='prosection_region_4'><option id='prosection_region_placeholder' name='prosection_region_placeholder' disabled selected>Prosection Region</option></select></td><td align='left' style='width:33%;'><select multiple='multiple' id='prosection_region_specific_4' name='prosection_region_specific_4[]' style='width:100%'><option id='prosection_region_specific_placeholder' name='prosection_region_specific_placeholder' disabled selected>Prosection Region Specific</option></select></td>");
				$('#prosection_region_specific_4').multipleSelect({
				  placeholder: "Select specific region", 
				  filter: true
			  });



		}													
														
		if(click_counter == 5) {
			$("#insert-more").hide();
		}
	});
	
});
	
	</script>
    

</body>

</html>
