<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in() !== true) {
	header("Location: index.php");
} 

// Prevent user from opening the patient history tabs without first selecting a patient
if(no_donor_selected() != true) {
	header("Location: donors_table.php");
}

$selected_donor_ref_hist = $_SESSION['selected_donor_ref_hist'];

    	$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
		$result = mysql_query("SELECT * FROM donor_table WHERE donor_reference_number = $selected_donor_ref_hist") or die($connect_error1);
					
		while($record = mysql_fetch_assoc($result)) {
				$new_first_name = ucwords($record['first_name']);
				$new_sur_name = ucwords($record['sur_name']);
				
				$mort_subject_number = $record['subject_number'];
				$mort_age = $record['mort_age'];
				$mort_sex = $record['sex'];
				$unit_rack_number = $record['unit_rack_number'];
				$permission_to_retain_parts = $record['permission_to_retain_parts'];
				$embalming = $record['embalming'];	
				$mort_notes = $record['mort_notes'];
				
				$proposed_use = $record['proposed_use'];	
				$student_permission = $record['student_permission'];
				$academic_year = $record['academic_year'];
				$student_notes = $record['student_notes'];
				
				$num_prosections_taken = $record['num_prosections_taken'];
				$prosection_number = $record['prosection_number'];
				$prosection_title = $record['prosection_title'];
				$prosection_unit_rack_number = $record['prosection_unit_rack_number'];
				$prosection_store_location = $record['prosection_store_location'];
				
				$is_doc_cert_received = $record['doc_cert_received'];
				
				$selected_subject_number = $record['subject_number'];
				$does_subject_have_prosection = mysql_query("SELECT unique_id FROM prosections_table WHERE which_subject_number = '$selected_subject_number'") or die($connect_error1);
				$array_prosections = array();
				
				if(mysql_num_rows($does_subject_have_prosection) == 0) {
					$prosection_yes_no = "There are currently no prosections for this subject";
					$number_of_prosections = 0;
				} else if(mysql_num_rows($does_subject_have_prosection) == 1){
					$number_of_prosections = mysql_num_rows($does_subject_have_prosection);
					$prosection_yes_no = "This subject currently has " . $number_of_prosections . " prosection";
				} else if(mysql_num_rows($does_subject_have_prosection) > 1){
					$number_of_prosections = mysql_num_rows($does_subject_have_prosection);
					$prosection_yes_no = "This subject currently has " . $number_of_prosections . " prosections";
				}
				
		}

		if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['save_new_info_pg6']) {
				$new_mort_subject_number = $_POST['mort_subject_number'];
				$new_mort_age = $_POST['mort_age'];
				$new_mort_sex = $_POST['mort_sex'];
				$new_unit_rack_number = $_POST['unit_rack_number'];
				$new_permission_to_retain_parts = $_POST['permission_to_retain_parts'];	
				$new_embalming = $_POST['embalming'];
				$new_mort_notes = $_POST['mort_notes'];
				
				if($is_doc_cert_received == "1") {
				
					$new_proposed_use = $_POST['proposed_use'];	
					$new_student_permission = $_POST['student_permission'];
					$new_academic_year = $_POST['academic_year'];
					$new_student_notes = $_POST['student_notes'];
					
					mysql_query("UPDATE donor_table SET proposed_use = '$new_proposed_use' WHERE donor_reference_number = '$selected_donor_ref_hist'");
					mysql_query("UPDATE donor_table SET student_permission = '$new_student_permission' WHERE donor_reference_number = '$selected_donor_ref_hist'");
					mysql_query("UPDATE donor_table SET academic_year = '$new_academic_year' WHERE donor_reference_number = '$selected_donor_ref_hist'");
					mysql_query("UPDATE donor_table SET student_notes = '$new_student_notes' WHERE donor_reference_number = '$selected_donor_ref_hist'");
					
					$new_num_prosections_taken = $_POST['num_prosections_taken'];
					$new_prosection_number = $_POST['prosection_number'];
					$new_prosection_title = $_POST['prosection_title'];
					$new_prosection_unit_rack_number = $_POST['prosection_unit_rack_number'];
					$new_prosection_store_location = $_POST['prosection_store_location'];	
					
					mysql_query("UPDATE donor_table SET num_prosections_taken = '$new_num_prosections_taken' WHERE donor_reference_number = '$selected_donor_ref_hist'");
					mysql_query("UPDATE donor_table SET prosection_number = '$new_prosection_number' WHERE donor_reference_number = '$selected_donor_ref_hist'");
					mysql_query("UPDATE donor_table SET prosection_title = '$new_prosection_title' WHERE donor_reference_number = '$selected_donor_ref_hist'");
					mysql_query("UPDATE donor_table SET prosection_unit_rack_number = '$new_prosection_unit_rack_number' WHERE donor_reference_number = '$selected_donor_ref_hist'");
					mysql_query("UPDATE donor_table SET prosection_store_location = '$new_prosection_store_location' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				}
							

				// update the correct row for the new patient info added on page 1 of the form with the new changes
				mysql_query("UPDATE donor_table SET subject_number = '$new_mort_subject_number' WHERE donor_reference_number = '$selected_donor_ref_hist'");	
				mysql_query("UPDATE donor_table SET mort_age = '$new_mort_age' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET sex = '$new_mort_sex' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET unit_rack_number = '$new_unit_rack_number' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET permission_to_retain_parts = '$new_permission_to_retain_parts' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET embalming = '$new_embalming' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET mort_notes = '$new_mort_notes' WHERE donor_reference_number = '$selected_donor_ref_hist'");

				header("Location: donor_history_6_mortuary_info.php");
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

    <title>Donor History - Mortuary Information</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- breadcrumb trail grayscale except for the page user is currently on -->
    <style>
		#medicalInfoPic1 {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		#medicalInfoPic2 {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		#examinationInfoPic {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		#successPic {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		#qualOfLifeSurvey {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		#generalInfoPic {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		#consentInfoPic {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		.popover{
			width:250px;    
		}	
    </style>

</head>

<body>

<?php
        
    	include_once 'php_functionality/navigation_menu.php';
		
?>
    <div id="wrapper">
		
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                                    
                        <div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">Donor History: Mortuary Information</h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="dashboard.php">Home</a>
                                      </li>
                                      <li>
                                      	<a href="donors_table.php">Donors</a>
                                      </li>
                                      <li>
                                      	<a href="#">Donor History</a>
                                      </li>
                                      <li class="active">
                                          <a href="donor_history_6_mortuary_info.php"><strong>Donor History: Mortuary Information - <?php echo $new_first_name; ?> <?php echo $new_sur_name; ?></strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
                					
                					<div class="centred_text" style="margin-top:2%">
											<img class="addPatBreadcrumb" id="generalInfoPic" src="images/general_info.png"/>
											<img class="arrowBreadCrumb" id="arrow1" src="images/arrow_new.png"/>
											<img class="addPatBreadcrumb" id="medicalInfoPic1" src="images/contact_details.png" />
											<img class="arrowBreadCrumb" id="arrow2" src="images/arrow_new.png"/>
											<img class="addPatBreadcrumb" id="medicalInfoPic2" src="images/witness_info.png" />
											<img class="arrowBreadCrumb" id="arrow3" src="images/arrow_new.png"/>
											<img class="addPatBreadcrumb" id="examinationInfoPic" src="images/examination.png" />
											<img class="arrowBreadCrumb" id="arrow4" src="images/arrow_new.png"/>
                                            <img class="addPatBreadcrumb" id="consentInfoPic" src="images/consent_icon.png" />
                                            <img class="arrowBreadCrumb" id="arrow4" src="images/arrow_new.png"/>
											<img class="addPatBreadcrumb" id="successPic" src="images/donor_receipt.png" />
                                            <img class="arrowBreadCrumb" id="arrow5" src="images/arrow_new.png"/>
											<img class="addPatBreadcrumb" id="mortInfoPic" src="images/mort_info.png" />
									<div>
										
									<div class="row">

											<form class="form-horizontal" role="form" id="page_1_pat_hist_form" action="" method="POST" onsubmit="return confirm('Are you sure you want to edit this patient?');">
                                        		<div class="form-group centred_text">
                                                <table class="buttons_table">	 												
														<tr class="buttons_table_row">
															<td class="buttons_table_cell"><a href="donor_history_5_donor_receipt_details.php">	
																<button type="button" class="btn btn-lg btn-default form_1_button" value="page_5" id="first_visit_page_5"><i class="fa fa-arrow-left"></i> Donor Receipt Details </button></a>
														</td>
															<td class="buttons_table_cell">
																<button type="button" class="btn btn-lg btn-success form_1_button" value="edit" id="edit_button"><i class="fa fa-pencil"></i> Edit</button>
															</td>
															<td class="buttons_table_cell"></td>
														</tr>
                                                        </table>
                                                  <table id="undertakertable" class="centred_text add_patient_table">
                                                            <tr id="undertakerRow">
                                                              <td class="formLabel" align="middle" colspan=2><label id="undertakernameLabel" for="new_undertakername"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Mortuary Details</label></td>
                                                            </tr>
                                                            
                                                            <tr class="undertakerInfo">
                                                                <td class="formLabel" align="left"><label id="undertakernameLabel" for="mort_subject_number">Subject Number:</label></td>
                                                                <td class="formInput"><input type="number" class="form-control enable_disable" id="mort_subject_number" name="mort_subject_number" value="<?php echo $mort_subject_number ?>" required></td>
                                                            </tr>
                                                            <tr class="undertakerInfo">
                                                                <td class="formLabel" align="left"><label id="undertakernameLabel" for="mort_age">Age:</label></td>
                                                                <td class="formInput"><input type="number" class="form-control enable_disable" id="mort_age" name="mort_age" value="<?php echo $mort_age ?>" required></td>
                                                            </tr>
                                                             <tr class="undertakerInfo">
                                                                <td class="formLabel" align="left"><label id="sexLabel" for="mort_sex">Sex:</label></td>
                                                                <!-- <td class="formInput"><input type="text" class="form-control" id="sex" name="sex" placeholder="< echo $sex_1 ?>" disabled></td>												-->
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($mort_sex == "Male") {
                                                                    echo '<input type="radio" class="enable_disable" name="mort_sex" id="mort_sex"  value="Male" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="mort_sex" id="mort_sex"  value="Male" disabled/>';
                                                                    }; ?>
                                                                    Male</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($mort_sex == "Female") {
                                                                    echo '<input type="radio" class="enable_disable" name="mort_sex" id="mort_sex"  value="Female" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="mort_sex" id="mort_sex"  value="Female" disabled/>';
                                                                    }; ?>
                                                                    Female</label>
                                                                </td>
                                                        </tr>
                                                        <tr class="undertakerInfo">
                                                                <td class="formLabel" align="left"><label id="undertakernameLabel" for="unit_rack_number">Unit/Rack Number:</label></td>
                                                                <td class="formInput"><input type="number" class="form-control enable_disable" id="unit_rack_number" name="unit_rack_number" value="<?php echo $unit_rack_number ?>" required></td>
                                                            </tr>
                                                            <tr class="undertakerInfo">
                                                                <td class="formLabel" align="left"><label id="sexLabel" for="permission_to_retain_parts">Permission to Retain Parts:</label></td>
                                                                
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($permission_to_retain_parts == "1") {
                                                                    echo '<input type="radio" class="enable_disable" name="permission_to_retain_parts" id="permission_to_retain_parts"  value="1" checked="checked"/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="permission_to_retain_parts" id="permission_to_retain_parts"  value="1"/>';
                                                                    }; ?>
                                                                    Yes</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($permission_to_retain_parts == "0") {
                                                                    echo '<input type="radio" class="enable_disable" name="permission_to_retain_parts" id="permission_to_retain_parts"  value="0" checked="checked"/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="permission_to_retain_parts" id="permission_to_retain_parts"  value="0"/>';
                                                                    }; ?>
                                                                    No</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="undertakerInfo">
                                                                <td class="formLabel" align="left"><label id="embalmingLabel" for="embalming">Type of Embalming:</label></td>
                                                                <td class="formInput"><textarea type="text" class="form-control enable_disable" id="embalming" name="embalming" style="resize: none"><?php echo $embalming ?></textarea></td>
                                                            </tr>
                                                            <tr class="undertakerInfo">
                                                                <td class="formLabel" align="left"><label id="notesLabel" for="mort_notes">Notes:</label></td>
                                                                <td class="formInput"><textarea type="text" class="form-control enable_disable" id="mort_notes" name="mort_notes" style="resize: none"><?php echo $mort_notes ?></textarea></td>
                                                            </tr>
                                                      </table>
                                                      
                                                      
                                                  <?php 
												  	if($is_doc_cert_received == "1") {
														?>    
                                                      <table id="next_of_kintable" class="centred_text add_patient_table">
                                                          <tr id="next_of_kinRow">
                                                          <td class="formLabel" align="middle" colspan=2><label id="next_of_kinnameLabel" for="next_of_kinname"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Student Use</label></td>
                                                        </tr>
                                                        <tr class="next_of_kinInfo">
                                                            <td class="formLabel" align="left"><label id="proposed_useLabel" for="proposed_use">Proposed Use:</td>
                                                            <td class="formInput">
                                                              <select class="form-control enable_disable" id="proposed_use" name="proposed_use" required>
                                                              <?php if($proposed_use == "undergraduate") { echo '<option value="undergraduate"  selected="selected">Undergraduate</option>'; } else { echo '<option value="undergraduate"  >Undergraduate</option>';}?>
                                                              <?php if($proposed_use == "graduate") { echo '<option value="graduate"  selected="selected">Graduate</option>'; } else { echo '<option value="graduate"  >Graduate</option>';}?>
                                                              <?php if($proposed_use == "research") { echo '<option value="research"  selected="selected">Research</option>'; } else { echo '<option value="research"  >Research</option>';}?>
                                                             <?php if($proposed_use == "other") { echo '<option value="research"  selected="selected">Other</option>'; } else { echo '<option value="other"  >Other</option>';}?>   
                                                                  </select>
                                                               </td>
                                                           </tr>
                                                         <!-- <tr class="next_of_kinInfo">
                                                            <td class="formLabel" align="left"><label id="next_of_kinnameLabel" for="graduate_training">Graduate Training:</label></td>
                                                            <td class="formInput"><input type="text" class="form-control enable_disable" id="graduate_training" name="graduate_training" value="<php echo $graduate_training ?>" required></td>
                                                        </tr> -->
                                                        <tr class="next_of_kinInfo">
                                                                  <td class="formLabel" align="left"><label id="sexLabel" for="student_permission">Permission:</label></td>
                                                                  
                                                                  <td class="formInput">
                                                                      <label class="radio-inline">
                                                                      <?php if($student_permission == "1") {
                                                                      echo '<input type="radio" class="enable_disable" name="student_permission" id="student_permission"  value="1" checked="checked"/>';
                                                                  }
                                                                          else {
                                                                      echo '<input type="radio" class="enable_disable" name="student_permission" id="student_permission"  value="1"/>';
                                                                      }; ?>
                                                                      Yes</label> 
                                                                      <label class="radio-inline">
                                                                          <?php if($student_permission == "0") {
                                                                      echo '<input type="radio" class="enable_disable" name="student_permission" id="student_permission"  value="0" checked="checked"/>';
                                                                  }
                                                                          else {
                                                                      echo '<input type="radio" class="enable_disable" name="student_permission" id="student_permission"  value="0"/>';
                                                                      }; ?>
                                                                      No</label>
                                                                  </td>
                                                              </tr>
                                                        <tr class="next_of_kinInfo">
                                                            <td class="formLabel" align="left"><label id="next_of_kinnameLabel" for="academic_year">Academic Year:</label></td>
                                                            <td class="formInput"><input type="number" class="form-control enable_disable" id="academic_year" name="academic_year" value="<?php echo $academic_year ?>" required></td>
                                                        </tr>
                                                        <tr class="next_of_kinInfo">
                                                                <td class="formLabel" align="left"><label id="student_notesLabel" for="student_notes">Notes:</label></td>
                                                                <td class="formInput"><textarea type="text" class="form-control enable_disable" id="student_notes" name="student_notes" style="resize: none"><?php echo $student_notes ?></textarea></td>
                                                            </tr>
                                                      </table>
                                                      <?php
													}
													?>
                                                    <?php 
												  	if($is_doc_cert_received == "1") {
														?>   
                                                      <table id="prosections_table" class="centred_text add_patient_table">
                                                          <tr id="prosections_Row">
                                                          <td class="formLabel" align="middle" colspan=2><label id="next_of_kinnameLabel" for="next_of_kinname"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Prosections</label></td>
                                                        </tr>
                                                          <tr class="prosections_info">
                                                            <td class="formLabel" align="left"><label id="next_of_kinnameLabel" for="num_prosections_taken">Number of Prosections Taken from Donor:</label></td>
                                                            <td class="formInput"><input type="text" class="form-control enable_disable" id="num_prosections_taken" name="num_prosections_taken" value="<?php echo $prosection_yes_no ?>" readonly></td>
                                                        </tr>
                                                        <table class="table table-striped table-bordered table-hover sortable" id="prosection_table_edit">
                                  <thead>
                                      <tr>
                                          <th>Subject Number</th>
                                          <th>Unique ID</th>
                                          <th>Prosection ID</th>
                                          <th>Prosection Type</th>
                                          <th>Prosection Region</th>
                                          <th>Prosection Feature</th>
                                          <th>Storage Type</th>
                                          <th>Unit/Shelf Number</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                                        <?php
                                                        	if(mysql_num_rows($does_subject_have_prosection) == 0) {
		 echo '<tr class="non_selectable">';
				  echo '<td>' . 'There are currently no prosections for this subject.' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
		echo '</tr>';
	} else {
		while($row = mysql_fetch_array($does_subject_have_prosection)) {
			$unique_id = $row['unique_id'];
			
			$unique_id_form_table = mysql_query("SELECT * FROM prosections_table WHERE unique_id = '$unique_id'") or die($connect_error1);
			while($row_1 = mysql_fetch_array($unique_id_form_table)) {

				 $storage_unit = $row_1['storage_unit'];
				 $storage_shelf =$row_1['storage_shelf'];
				
			  echo '<tr>';
				  echo '<td>' . $row_1['which_subject_number'] . '</td>';
				  echo '<td>' . $row_1['unique_id'] . '</td>';
				  echo '<td>' . $row_1['prosection_id'] . '</td>';
				  echo '<td>' . $row_1['prosection_types_list'] . '</td>';
				  echo '<td>' . $row_1['prosection_regions_list'] . '</td>';
				  echo '<td>' . $row_1['prosection_features_list'] . '</td>';
				  echo '<td>' . $storage_type =  $row_1['storage_type'] . '</td>';
				  echo '<td>' . $storage_unit . ' ' .  $storage_shelf . '</td>';
				  
			  echo '</tr>';
			}
		}
		$prosection_yes_or_no = "yes";
		
	}								  
							  
?>
  </tbody>
                                </table>
                                                     
                                                      </table>
                                                      
													<?php
													}
													?>

													<table class="buttons_table" >	 												
														<tr class="buttons_table_row">
															<td class="buttons_table_cell"><a href="donor_history_5_donor_receipt_details.php">	
																<button type="button" class="btn btn-lg btn-default form_1_button" value="page_5" id="first_visit_page_5_1"><i class="fa fa-arrow-left"></i> Donor Receipt Details </button></a>
														</td>
															<td class="buttons_table_cell">
															</td>
															<td class="buttons_table_cell"></td>
														</tr>
                                                        </table>
													<table id="save_cancel_table" class="buttons_table centred_text">
														<tr class="buttons_table_row">
															<td class="save_cancel_cell"><button type="button" class="btn btn-lg btn-danger save_cancel_btn" name="cancel_editing" id="cancel_editing" value="Cancel" onclick="refresh_page()">Cancel</button></td>
															<td class="space_cell"></td>
															<td class="save_cancel_cell"><input class="btn btn-lg btn-primary save_cancel_btn" type="submit" name="save_new_info_pg6" id="save_new_info_pg6" value="Save"/></td>
														</tr>
													</table>
                                        		</div>
                                        	</form>
                                	
									</div><!-- /.row -->
									
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
   
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
     <!-- <script src="bower_components/jquery/dist/jquery.ui.1.11.4.js"></script> for the JQuery DatePicker -->

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Javascript for the datapicker http://jqueryui.com/datepicker/#dropdown-month-year -->
    <script type="text/javascript">
        
    // make all input boxes disabled on page load. Toggle enabled/disabled state when edit button is clicked
	$(document).ready(function() {
	
	$(".enable_disable").prop('disabled', true);
	$('#cancel_editing').attr("disabled", true);
	$('#save_new_info_pg6').attr("disabled", true);
				
    $('#edit_button').click(function() {
			$('.enable_disable').each(function() {
				if ($(this).attr('disabled')) {
					$(this).removeAttr('disabled');
					$('#first_visit_page_5').attr("disabled", true);
					$('#first_visit_page_5_1').attr("disabled", true);
					$('#cancel_editing').attr("disabled", false);
					$('#save_new_info_pg6').attr("disabled", false);
				}
				else {
					$(this).attr({
						'disabled': 'disabled'
					});
					$('#first_visit_page_5').attr("disabled", false);
					$('#first_visit_page_5_1').attr("disabled", false);
					$('#cancel_editing').attr("disabled", true);
					$('#save_new_info_pg6').attr("disabled", true);
				}
			});
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
	
	// for the help popovers
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({
			html:true,
		}); 
	});
	
		// code for the show/hide table button
     var n2 = 1;
     $('#undertakerRow').click(function(){
        	if(n2 == 0) {
        		$(".undertakerInfo").show();
				$(this).html('<td class="formLabel" align="middle" colspan=2><label id="undertakernameLabel" for="undertakername"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Mortuary Details</label></td>');
        		n2 = 1;
        	} else if(n2 == 1) {
        		$(".undertakerInfo").hide();
				 $(this).html('<td class="formLabel" align="middle" colspan=2><label id="undertakernameLabel" for="undertakername"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span> Mortuary Details</label></td>');
        		n2 = 0;
        	}  	
        });
		
			// code for the show/hide table button
     var n1 = 1;
     $('#next_of_kinRow').click(function(){
        	if(n1 == 0) {
        		$(".next_of_kinInfo").show();
				$(this).html('<td class="formLabel" align="middle" colspan=2><label id="next_of_kinnameLabel" for="next_of_kinname"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Student Use</label></td>');
        		n1 = 1;
        	} else if(n1 == 1) {
        		$(".next_of_kinInfo").hide();
				 $(this).html('<td class="formLabel" align="middle" colspan=2><label id="next_of_kinnameLabel" for="next_of_kinname"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span> Student Use</label></td>');
        		n1 = 0;
        	}  	
        });
		
					// code for the show/hide table button
     var n5 = 1;
     $('#prosections_Row').click(function(){
        	if(n5 == 0) {
        		$(".prosections_info").show();
				$(this).html('<td class="formLabel" align="middle" colspan=2><label id="next_of_kinnameLabel" for="next_of_kinname"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Prosections</label></td>');
        		n5 = 1;
				$("#prosection_table_edit").show();
        	} else if(n5 == 1) {
        		$(".prosections_info").hide();
				 $(this).html('<td class="formLabel" align="middle" colspan=2><label id="next_of_kinnameLabel" for="next_of_kinname"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span> Prosections</label></td>');
        		n5 = 0;
				$("#prosection_table_edit").hide();
        	}  	
        });

function refresh_page() {
	window.location = "donor_history_6_mortuary_info.php";
}
	</script>
    

</body>

</html>