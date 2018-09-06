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
				
				$date_of_death_a = $record['date_of_death'];
				$date_of_receipt_a = $record['date_of_receipt'];
				$place_of_death = $record['place_of_death'];
				$cause_of_death = $record['cause_of_death'];
			
				$doctor_name = $record['doctor_name'];
				$doctor_phone_number = $record['doctor_phone_number'];
				$doctor_email = $record['doctor_email'];
				$doc_cert_received = $record['doc_cert_received'];
				$doctor_address_line_1 = $record['doctor_address_line_1'];
				$doctor_address_line_2 = $record['doctor_address_line_2'];
				$doctor_address_line_3 = $record['doctor_address_line_3'];
				$doctor_address_line_4 = $record['doctor_address_line_4'];
				$doctor_address_line_postcode = $record['doctor_address_line_postcode'];
				$extra_med_info = $record['extra_med_info'];
				
				$subject_number = $record['subject_number'];
				$coffin_store_number = $record['coffin_store_number'];
				$permission_to_retain_parts = $record['permission_to_retain_parts'];
				
				$undertakername = $record['undertakername'];
				$undertakeraddress_line_1 = $record['undertakeraddress_line_1'];
				$undertakeraddress_line_2 = $record['undertakeraddress_line_2'];
				$undertakeraddress_line_3 = $record['undertakeraddress_line_3'];
				$new_undertakeraddress_4 = $record['undertakeraddress_line_4'];
				$undertaker_phone_number = $record['undertaker_phone_number'];
				$undertakeraddress_line_postcode = $record['undertakeraddress_line_postcode'];
				
				$next_of_kin_name = $record['next_of_kin_name'];
				$next_of_kin_line_1 = $record['next_of_kin_line_1'];
				$next_of_kin_line_2 = $record['next_of_kin_line_2'];
				$next_of_kin_line_3 = $record['next_of_kin_line_3'];
				$next_of_kin_address_line_4 = $record['next_of_kin_address_line_4'];
				$next_of_kin_line_postcode = $record['next_of_kin_line_postcode'];
				$next_of_kin_phone_number = $record['next_of_kin_phone_number'];
				$next_of_kin_email = $record['next_of_kin_email'];
				$next_of_kin_acknow = $record['next_of_kin_acknow'];
				
				$archived = $record['archived'];
				
				$var_a = $date_of_death_a;
				if($var_a == "0000-00-00") {
					$date_of_death = "Enter date of death";
				} else {
					$date_of_death = date('d-m-Y', strtotime($var_a));
				}
				
				$var_b = $date_of_receipt_a;
				if($var_b == "0000-00-00") {
					$date_of_receipt = "Enter date of receipt";
				} else {
					$date_of_receipt = date('d-m-Y', strtotime($var_b));
				}
				
				$acceptance = $record['acceptance'];
				
		}

		if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['save_new_info_pg5']) {	
				
				$var_ab = $_POST['date_of_death'];
				$new_date_of_death = date('Y-m-d', strtotime($var_ab));
				
				$var_ba = $_POST['date_of_receipt'];
				$new_date_of_receipt = date('Y-m-d', strtotime($var_ba));
				
				$new_place_of_death = $_POST['place_of_death'];
				$new_cause_of_death = $_POST['cause_of_death'];
				$new_doctor_name = $_POST['doctor_name'];
				$new_doctor_phone_number = $_POST['doctor_phone_number'];
				$new_doctor_email = $_POST['doctor_email_address'];
				$new_doc_cert_received = $_POST['doc_cert_received'];
				$new_doctor_address_line_1 = $_POST['doctor_address_line_1'];
				$new_doctor_address_line_2 = $_POST['doctor_address_line_2'];
				$new_doctor_address_line_3 = $_POST['doctor_address_line_3'];
				$new_doctor_address_line_4 = $_POST['doctor_address_line_4'];
				$new_doctor_address_line_postcode = $_POST['doctor_address_line_postcode'];
				$extra_med_info = $_POST['extra_med_info'];
				
				$new_subject_number = $_POST['subject_number'];
				$new_coffin_store_number = $_POST['coffin_store_number'];
				$new_permission_to_retain_parts = $_POST['permission_to_retain_parts'];
				
				$new_undertakername = $_POST['new_undertakername'];
				$new_undertakeraddress_line_1 = $_POST['new_undertaker_1_address_line_1'];
				$new_undertakeraddress_line_2 = $_POST['new_undertaker_1_address_line_2'];
				$new_undertakeraddress_line_3 = $_POST['new_undertakeraddress_line_3'];
				$new_undertakeraddress_line_4 = $_POST['new_undertakeraddress_4'];
				$new_undertakeraddress_line_postcode = $_POST['new_undertakeraddress_line_postcode'];
				$new_undertaker_phone_number = $_POST['new_undertaker_1_phone_number'];
				
				$new_next_of_kin_name = $_POST['next_of_kin'];
				$new_next_of_kin_line_1 = $_POST['next_of_kin_address_line_1'];
				$new_next_of_kin_line_2 = $_POST['next_of_kin_address_line_2'];
				$new_next_of_kin_line_3 = $_POST['next_of_kin_line_3'];
				$new_next_of_kin_address_line_4 = $_POST['next_of_kin_address_line_4'];
				$new_next_of_kin_line_postcode = $_POST['next_of_kin_line_postcode'];
				$new_next_of_kin_phone_number = $_POST['next_of_kin_phone_number'];
				$next_of_kin_email = $_POST['next_of_kin_email'];
				$new_next_of_kin_acknow = $_POST['next_of_kin_acknow'];
				
				$acceptance = $_POST['acceptance'];
				$archived_new = $_POST['archived'];
				
				mysql_query("UPDATE donor_table SET date_of_death = '$new_date_of_death' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET date_of_receipt = '$new_date_of_receipt' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET place_of_death = '$new_place_of_death' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET cause_of_death = '$new_cause_of_death' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				
				mysql_query("UPDATE donor_table SET doctor_name = '$new_doctor_name' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET doctor_phone_number = '$new_doctor_phone_number' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET doctor_email = '$new_doctor_email' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET doc_cert_received = '$new_doc_cert_received' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET doctor_address_line_1 = '$new_doctor_address_line_1' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET doctor_address_line_2 = '$new_doctor_address_line_2' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET doctor_address_line_3 = '$new_doctor_address_line_3' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET doctor_address_line_4 = '$new_doctor_address_line_4' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET doctor_address_line_postcode = '$new_doctor_address_line_postcode' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET extra_med_info = '$extra_med_info' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				
				mysql_query("UPDATE donor_table SET subject_number = '$new_subject_number' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET coffin_store_number = '$new_coffin_store_number' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET permission_to_retain_parts = '$new_permission_to_retain_parts' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				
				mysql_query("UPDATE donor_table SET undertakername = '$new_undertakername' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET undertakeraddress_line_1 = '$new_undertakeraddress_line_1' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET undertakeraddress_line_2 = '$new_undertakeraddress_line_2' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET undertakeraddress_line_3 = '$new_undertakeraddress_line_3' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET undertakeraddress_line_4 = '$new_undertakeraddress_line_4' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET undertakeraddress_line_postcode = '$new_undertakeraddress_line_postcode' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET undertaker_phone_number = '$new_undertaker_phone_number' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				
				mysql_query("UPDATE donor_table SET next_of_kin_name = '$new_next_of_kin_name' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET next_of_kin_line_1 = '$new_next_of_kin_line_1' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET next_of_kin_line_2 = '$new_next_of_kin_line_2' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET next_of_kin_line_3 = '$new_next_of_kin_line_3' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET next_of_kin_address_line_4 = '$new_next_of_kin_address_line_4' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET next_of_kin_line_postcode = '$new_next_of_kin_line_postcode' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET next_of_kin_phone_number = '$new_next_of_kin_phone_number' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET next_of_kin_email = '$next_of_kin_email' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET next_of_kin_acknow = '$new_next_of_kin_acknow' WHERE donor_reference_number = '$selected_donor_ref_hist'");	
				
				mysql_query("UPDATE donor_table SET acceptance = '$acceptance' WHERE donor_reference_number = '$selected_donor_ref_hist'");	
				mysql_query("UPDATE donor_table SET archived = '$archived_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");			

						header("Location: donor_history_5_donor_receipt_details.php");
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

    <title>Donor History - Donor Receipt Details</title>

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
		#qualOfLifeSurvey {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		#generalInfoPic {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		#mortInfoPic {
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
                                  <h2 class="page-header" id="homepageHeader">Donor History: Donor Receipt Details</h2>
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
                                          <a href="donor_history_5_donor_receipt_details.php"><strong>Donor History: Donor Receipt Details - <?php echo $new_first_name; ?> <?php echo $new_sur_name; ?></strong></a>
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
															<td class="buttons_table_cell"><a href="donor_history_7_consent_info.php">	
																<button type="button" class="btn btn-lg btn-default form_1_button" value="page_4" id="first_visit_page_4"><i class="fa fa-arrow-left"></i> Consent Information</button></a>
														</td>
															<td class="buttons_table_cell">
																<button type="button" class="btn btn-lg btn-success form_1_button" value="edit" id="edit_button"><i class="fa fa-pencil"></i> Edit</button>
															</td>
															<td class="buttons_table_cell"><a href="donor_history_6_mortuary_info.php"><button type="button" class="btn btn-lg btn-default form_1_button" value="page6" id="first_visit_page_6">Mortuary Information <i class="fa fa-arrow-right"></i></button>
															</a></td>
														</tr>
                                                        </table>
                                        			<table id="genInfoFormTable_1_1" class="centred_text add_patient_table">
                                                       <tr>
															<td class="formLabel" align="left">
                                                            	<label id="dobLabel" for="donorDOB">Date of Death:
                                                                		<a data-toggle="popover" data-placement="right" title="Date of Death" data-content="Insert the date of death in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-2015.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="date_of_death_date_picker">
																	<input type="text" class="form-control enable_disable" name="date_of_death" id="date_of_death" value="<?php echo $date_of_death ?>" required>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left">
                                                            	<label id="dobLabel" for="donorDOB">Date of Receipt:
                                                                		<a data-toggle="popover" data-placement="right" title="Date of Receipt" data-content="Insert the date of receipt in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-2015.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="date_of_receipt_date_picker">
																	<input type="text" class="form-control enable_disable" name="date_of_receipt" id="date_of_receipt" value="<?php echo $date_of_receipt ?>" required>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                   		<tr>
															<td class="formLabel" align="left"><label id="place_of_deathLabel" for="place_of_death">Place of Death:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="place_of_death" name="place_of_death" value="<?php echo $place_of_death ?>" required></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="cause_of_deathLabel" for="cause_of_death">Cause of Death:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="cause_of_death" name="cause_of_death" value="<?php echo $cause_of_death ?>" required></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="subject_numberLabel" for="subject_number">Subject Number:</label></td>
															<td class="formInput"><input type="number" class="form-control enable_disable" id="subject_number" name="subject_number" value="<?php echo $subject_number ?>" required></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="coffin_store_number_label" for="coffin_store_number">Coffin Store Number:</label></td>
															<td class="formInput"><input type="number" class="form-control enable_disable" id="coffin_store_number" name="coffin_store_number" value="<?php echo $coffin_store_number ?>" required></td>
		 												</tr>
                                                        <tr>
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
                                                        <table id="doctortable" class="centred_text">
                                                              <tr id="doctorRow">
                                                              	<td class="formLabel" align="middle" colspan=2><label id="doctornameLabel"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Doctor</label></td>
                                                              </tr>
                                                             
                                                              <tr class="doctorInfo">
                                                                  <td class="formLabel" align="left"><label id="doctor_name_Label" for="doctor_name">Name of Doctor:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="doctor_name" name="doctor_name" value="<?php echo $doctor_name ?>" required></td>
                                                              </tr>
                                                               <tr class="doctorInfo">
                                                                  <td class="formLabel" align="left"><label id="doctoraddressLabel" for="doctor_address_line_1">Doctor's Address:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="doctor_address_line_1" name="doctor_address_line_1" value="<?php echo $doctor_address_line_1 ?>" required></td>
                                                              </tr>
                                                              <tr class="doctorInfo">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="doctor_address_line_2" name="doctor_address_line_2" value="<?php echo $doctor_address_line_2 ?>"></td>
                                                              </tr>
                                                              <tr class="doctorInfo">
																<td class="formLabel" align="left"></td>
																<td class="formInput"><input type="text" class="form-control enable_disable" id="doctor_address_line_4" name="doctor_address_line_4" value="<?php echo $doctor_address_line_4 ?>"></td>
		 													</tr>
                                                              <tr class="doctorInfo">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput">
                                                                  <input type="text" class="form-control enable_disable" id="doctor_address_line_postcode" name="doctor_address_line_postcode" value="<?php echo $doctor_address_line_postcode ?>" style="float:left; width:50%">
                                                                  <select class="form-control enable_disable" id="doctor_address_line_3" name="doctor_address_line_3" required style="float:left; width:50%">
                                                                  <?php if($doctor_address_line_3 == "antrim") { echo '<option value="antrim"  selected="selected">Antrim</option>'; } else { echo '<option value="antrim"  >Antrim</option>';}?>
																	  <?php if($doctor_address_line_3 == "armagh") { echo '<option value="armagh"  selected="selected">Armagh</option>'; } else { echo '<option value="armagh"  >Armagh</option>';}?>
																	  <?php if($doctor_address_line_3 == "carlow") { echo '<option value="carlow"  selected="selected">Carlow</option>'; } else { echo '<option value="carlow"  >Carlow</option>';}?>
																	  <?php if($doctor_address_line_3 == "cavan") { echo '<option value="cavan"  selected="selected">Cavan</option>'; } else { echo '<option value="cavan"  >Cavan</option>';}?>
																	  <?php if($doctor_address_line_3 == "clare") { echo '<option value="clare"  selected="selected">Clare</option>'; } else { echo '<option value="clare"  >Clare</option>';}?>
																	  <?php if($doctor_address_line_3 == "cork") { echo '<option value="cork"  selected="selected">Cork</option>'; } else { echo '<option value="cork"  >Cork</option>';}?>
																	  <?php if($doctor_address_line_3 == "derry") { echo '<option value="derry"  selected="selected">Derry</option>'; } else { echo '<option value="derry"  >Derry</option>';}?>
																	  <?php if($doctor_address_line_3 == "donegal") { echo '<option value="donegal"  selected="selected">Donegal</option>'; } else { echo '<option value="donegal"  >Donegal</option>';}?>
																	  <?php if($doctor_address_line_3 == "down") { echo '<option value="down"  selected="selected">Down</option>'; } else { echo '<option value="down"  >Down</option>';}?>
																	  <?php if($doctor_address_line_3 == "dublin") { echo '<option value="dublin"  selected="selected">Dublin</option>'; } else { echo '<option value="dublin"  >Dublin</option>';}?>
																	  <?php if($doctor_address_line_3 == "fermanagh") { echo '<option value="fermanagh"  selected="selected">Fermanagh</option>'; } else { echo '<option value="fermanagh"  >Fermanagh</option>';}?>
																	  <?php if($doctor_address_line_3 == "galway") { echo '<option value="galway"  selected="selected">Galway</option>'; } else { echo '<option value="galway"  >Galway</option>';}?>
																	  <?php if($doctor_address_line_3 == "kerry") { echo '<option value="kerry"  selected="selected">Kerry</option>'; } else { echo '<option value="kerry"  >Kerry</option>';}?>
																	  <?php if($doctor_address_line_3 == "kildare") { echo '<option value="kildare"  selected="selected">Kildare</option>'; } else { echo '<option value="kildare"  >Kildare</option>';}?>
																	  <?php if($doctor_address_line_3 == "kilkenny") { echo '<option value="kilkenny"  selected="selected">Kilkenny</option>'; } else { echo '<option value="kilkenny"  >Kilkenny</option>';}?>
																	  <?php if($doctor_address_line_3 == "laois") { echo '<option value="laois"  selected="selected">Laois</option>'; } else { echo '<option value="laois"  >Laois</option>';}?>
																	  <?php if($doctor_address_line_3 == "leitrim") { echo '<option value="leitrim"  selected="selected">Leitrim</option>'; } else { echo '<option value="leitrim"  >Leitrim</option>';}?>
																	  <?php if($doctor_address_line_3 == "limerick") { echo '<option value="limerick"  selected="selected">Limerick</option>'; } else { echo '<option value="limerick"  >Limerick</option>';}?>
																	  <?php if($doctor_address_line_3 == "longford") { echo '<option value="longford"  selected="selected">Longford</option>'; } else { echo '<option value="longford"  >Longford</option>';}?>
																	  <?php if($doctor_address_line_3 == "louth") { echo '<option value="louth"  selected="selected">Louth</option>'; } else { echo '<option value="louth"  >Louth</option>';}?>
                                                                      <?php if($doctor_address_line_3 == "mayo") { echo '<option value="mayo"  selected="selected">Mayo</option>'; } else { echo '<option value="mayo"  >Mayo</option>';}?>
																	  <?php if($doctor_address_line_3 == "meath") { echo '<option value="meath"  selected="selected">Meath</option>'; } else { echo '<option value="meath"  >Meath</option>';}?>
																	  <?php if($doctor_address_line_3 == "monaghan") { echo '<option value="monaghan"  selected="selected">Monaghan</option>'; } else { echo '<option value="monaghan"  >Monaghan</option>';}?>
																	  <?php if($doctor_address_line_3 == "offaly") { echo '<option value="offaly"  selected="selected">Offaly</option>'; } else { echo '<option value="offaly"  >Offaly</option>';}?>
																	  <?php if($doctor_address_line_3 == "roscommon") { echo '<option value="roscommon"  selected="selected">Roscommon</option>'; } else { echo '<option value="roscommon"  >Roscommon</option>';}?>
																	  <?php if($doctor_address_line_3 == "sligo") { echo '<option value="sligo"  selected="selected">Sligo</option>'; } else { echo '<option value="sligo"  >Sligo</option>';}?>
																	  <?php if($doctor_address_line_3 == "tipperary") { echo '<option value="tipperary"  selected="selected">Tipperary</option>'; } else { echo '<option value="tipperary"  >Tipperary</option>';}?>
																	  <?php if($doctor_address_line_3 == "tyrone") { echo '<option value="tyrone"  selected="selected">Tyrone</option>'; } else { echo '<option value="tyrone"  >Tyrone</option>';}?>
																	  <?php if($doctor_address_line_3 == "waterford") { echo '<option value="waterford"  selected="selected">Waterford</option>'; } else { echo '<option value="waterford"  >Waterford</option>';}?>
																	  <?php if($doctor_address_line_3 == "westmeath") { echo '<option value="westmeath"  selected="selected">Westmeath</option>'; } else { echo '<option value="westmeath"  >Westmeath</option>';}?>
																	  <?php if($doctor_address_line_3 == "wexford") { echo '<option value="wexford"  selected="selected">Wexford</option>'; } else { echo '<option value="wexford"  >Wexford</option>';}?>
																	  <?php if($doctor_address_line_3 == "wicklow") { echo '<option value="wicklow"  selected="selected">Wicklow</option>'; } else { echo '<option value="wicklow"  >Wicklow</option>';}?>
                                                                      
                                                                      </select>
                                                                     </td>
                                                              </tr>
                                                              <tr class="doctorInfo">
                                                                  <td class="formLabel" align="left"><label id="doctor_phone_number_Label" for="doctor_phone_number">Doctor's Phone Number:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="doctor_phone_number" name="doctor_phone_number" value="<?php echo $doctor_phone_number ?>" required></td>
                                                              </tr>
                                                              <tr class="doctorInfo">
                                                                  <td class="formLabel" align="left"><label id="doctor_phone_email_Label" for="doctor_email_address">Doctor's Email Address:</label></td>
                                                                  <td class="formInput"><input type="email" class="form-control enable_disable" id="doctor_email_address" name="doctor_email_address" value="<?php echo $doctor_email ?>" ></td>
                                                              </tr>
                                                             <tr class="doctorInfo">
															<td class="formLabel" align="left"><label id="sexLabel" for="signature_present">Doctor's Certificate Received:</label></td>
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($doc_cert_received == "1") {
																echo '<input type="radio" class="enable_disable" name="doc_cert_received" id="doc_cert_received"  value="1" checked="checked"/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="doc_cert_received" id="doc_cert_received"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($doc_cert_received == "0") {
																echo '<input type="radio" class="enable_disable" name="doc_cert_received" id="doc_cert_received"  value="0" checked="checked"/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="doc_cert_received" id="doc_cert_received"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
                                                        <tr class="doctorInfo">
                                                                <td class="formLabel" align="left"><label id="extra_med_infoLabel" for="extra_med_info">Extra Medical Information:</label></td>
                                                                <td class="formInput"><textarea type="text" class="form-control enable_disable" id="extra_med_info" name="extra_med_info" style="resize: none"><?php echo $extra_med_info ?></textarea></td>
                                                            </tr>
                                                        </table>
                                                        <table id="undertakertable" class="centred_text">
                                                              <tr id="undertakerRow">
                                                              	<td class="formLabel" align="middle" colspan=2><label id="undertakernameLabel" for="new_undertakername"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Undertaker</label></td>
                                                              </tr>
                                                              
                                                              <tr class="undertakerInfo">
                                                                  <td class="formLabel" align="left"><label id="undertakernameLabel" for="new_undertakername">Name of Undertaker:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_undertakername" name="new_undertakername" value="<?php echo $undertakername ?>" required></td>
                                                              </tr>
                                                              <tr class="undertakerInfo">
                                                                  <td class="formLabel" align="left"><label id="undertakeraddressLabel" for="new_undertaker_1_address_line_1">Undertaker's Address:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_undertaker_1_address_line_1" name="new_undertaker_1_address_line_1" value="<?php echo $undertakeraddress_line_1 ?>" required></td>
                                                              </tr>
                                                              <tr class="undertakerInfo">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_undertaker_1_address_line_2" name="new_undertaker_1_address_line_2" value="<?php echo $undertakeraddress_line_2 ?>"></td>
                                                              </tr>
                                                              <tr class="undertakerInfo">
																<td class="formLabel" align="left"><label id="undertakeraddressLabel4" for="new_undertakeraddress_4"></label></td>
																<td class="formInput"><input type="text" class="form-control enable_disable" id="new_undertakeraddress_4" name="new_undertakeraddress_4" value="<?php echo $new_undertakeraddress_4 ?>"></td>
		 													</tr>
                                                              <tr class="undertakerInfo">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput">
                                                                  <input type="text" class="form-control enable_disable" id="new_undertakeraddress_line_postcode" name="new_undertakeraddress_line_postcode" value="<?php echo $undertakeraddress_line_postcode ?>" style="float:left; width:50%">
                                                                  <select class="form-control enable_disable" id="new_undertakeraddress_line_3" name="new_undertakeraddress_line_3" required style="float:left; width:50%">
                                                                  <?php if($undertakeraddress_line_3 == "antrim") { echo '<option value="antrim"  selected="selected">Antrim</option>'; } else { echo '<option value="antrim"  >Antrim</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "armagh") { echo '<option value="armagh"  selected="selected">Armagh</option>'; } else { echo '<option value="armagh"  >Armagh</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "carlow") { echo '<option value="carlow"  selected="selected">Carlow</option>'; } else { echo '<option value="carlow"  >Carlow</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "cavan") { echo '<option value="cavan"  selected="selected">Cavan</option>'; } else { echo '<option value="cavan"  >Cavan</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "clare") { echo '<option value="clare"  selected="selected">Clare</option>'; } else { echo '<option value="clare"  >Clare</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "cork") { echo '<option value="cork"  selected="selected">Cork</option>'; } else { echo '<option value="cork"  >Cork</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "derry") { echo '<option value="derry"  selected="selected">Derry</option>'; } else { echo '<option value="derry"  >Derry</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "donegal") { echo '<option value="donegal"  selected="selected">Donegal</option>'; } else { echo '<option value="donegal"  >Donegal</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "down") { echo '<option value="down"  selected="selected">Down</option>'; } else { echo '<option value="down"  >Down</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "dublin") { echo '<option value="dublin"  selected="selected">Dublin</option>'; } else { echo '<option value="dublin"  >Dublin</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "fermanagh") { echo '<option value="fermanagh"  selected="selected">Fermanagh</option>'; } else { echo '<option value="fermanagh"  >Fermanagh</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "galway") { echo '<option value="galway"  selected="selected">Galway</option>'; } else { echo '<option value="galway"  >Galway</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "kerry") { echo '<option value="kerry"  selected="selected">Kerry</option>'; } else { echo '<option value="kerry"  >Kerry</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "kildare") { echo '<option value="kildare"  selected="selected">Kildare</option>'; } else { echo '<option value="kildare"  >Kildare</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "kilkenny") { echo '<option value="kilkenny"  selected="selected">Kilkenny</option>'; } else { echo '<option value="kilkenny"  >Kilkenny</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "laois") { echo '<option value="laois"  selected="selected">Laois</option>'; } else { echo '<option value="laois"  >Laois</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "leitrim") { echo '<option value="leitrim"  selected="selected">Leitrim</option>'; } else { echo '<option value="leitrim"  >Leitrim</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "limerick") { echo '<option value="limerick"  selected="selected">Limerick</option>'; } else { echo '<option value="limerick"  >Limerick</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "longford") { echo '<option value="longford"  selected="selected">Longford</option>'; } else { echo '<option value="longford"  >Longford</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "louth") { echo '<option value="louth"  selected="selected">Louth</option>'; } else { echo '<option value="louth"  >Louth</option>';}?>
                                                                      <?php if($undertakeraddress_line_3 == "mayo") { echo '<option value="mayo"  selected="selected">Mayo</option>'; } else { echo '<option value="mayo"  >Mayo</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "meath") { echo '<option value="meath"  selected="selected">Meath</option>'; } else { echo '<option value="meath"  >Meath</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "monaghan") { echo '<option value="monaghan"  selected="selected">Monaghan</option>'; } else { echo '<option value="monaghan"  >Monaghan</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "offaly") { echo '<option value="offaly"  selected="selected">Offaly</option>'; } else { echo '<option value="offaly"  >Offaly</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "roscommon") { echo '<option value="roscommon"  selected="selected">Roscommon</option>'; } else { echo '<option value="roscommon"  >Roscommon</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "sligo") { echo '<option value="sligo"  selected="selected">Sligo</option>'; } else { echo '<option value="sligo"  >Sligo</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "tipperary") { echo '<option value="tipperary"  selected="selected">Tipperary</option>'; } else { echo '<option value="tipperary"  >Tipperary</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "tyrone") { echo '<option value="tyrone"  selected="selected">Tyrone</option>'; } else { echo '<option value="tyrone"  >Tyrone</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "waterford") { echo '<option value="waterford"  selected="selected">Waterford</option>'; } else { echo '<option value="waterford"  >Waterford</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "westmeath") { echo '<option value="westmeath"  selected="selected">Westmeath</option>'; } else { echo '<option value="westmeath"  >Westmeath</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "wexford") { echo '<option value="wexford"  selected="selected">Wexford</option>'; } else { echo '<option value="wexford"  >Wexford</option>';}?>
																	  <?php if($undertakeraddress_line_3 == "wicklow") { echo '<option value="wicklow"  selected="selected">Wicklow</option>'; } else { echo '<option value="wicklow"  >Wicklow</option>';}?>
                                                                      
                                                                      </select>
                                                                     </td>
                                                              </tr>
                                                              <tr class="undertakerInfo">
                                                                  <td class="formLabel" align="left"><label id="undertakerphoneLabel" for="new_undertaker_1_phone_number">Undertaker's Phone Number:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_undertaker_1_phone_number" name="new_undertaker_1_phone_number" value="<?php echo $undertaker_phone_number ?>" required></td>
                                                              </tr>
                                                        </table>
                                                        
                                                        <table id="next_of_kintable" class="centred_text">
                                                              <tr id="next_of_kinRow">
                                                              	<td class="formLabel" align="middle" colspan=2><label id="next_of_kinnameLabel" for="next_of_kinname"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Next of Kin/Person to be Contacted at time of Burial</label></td>
                                                              </tr>
                                                              
                                                              <tr class="next_of_kinInfo">
                                                                  <td class="formLabel" align="left"><label id="next_of_kinnameLabel" for="next_of_kin">Name of Next of Kin:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="next_of_kin" name="next_of_kin" value="<?php echo $next_of_kin_name ?>" required></td>
                                                              </tr>
                                                              <tr class="next_of_kinInfo">
                                                                  <td class="formLabel" align="left"><label id="next_of_kinaddressLabel" for="next_of_kin_address_line_1">Next of Kin's Address:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="next_of_kin_address_line_1" name="next_of_kin_address_line_1" value="<?php echo $next_of_kin_line_1 ?>" required></td>
                                                              </tr>
                                                              <tr class="next_of_kinInfo">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="next_of_kin_address_line_2" name="next_of_kin_address_line_2" value="<?php echo $next_of_kin_line_2 ?>"></td>
                                                              </tr>
                                                              <tr class="next_of_kinInfo">
																<td class="formLabel" align="left"><label id="next_of_kinaddressLabel4" for="next_of_kin_address_line_4"></label></td>
																<td class="formInput"><input type="text" class="form-control enable_disable" id="next_of_kin_address_line_4" name="next_of_kin_address_line_4" value="<?php echo $next_of_kin_address_line_4 ?>"></td>
		 													</tr>
                                                              <tr class="next_of_kinInfo">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput">
                                                                  <input type="text" class="form-control enable_disable" id="next_of_kin_line_postcode" name="next_of_kin_line_postcode" value="<?php echo $next_of_kin_line_postcode ?>" style="float:left; width:50%">
                                                                  <select class="form-control enable_disable" id="next_of_kin_line_3" name="next_of_kin_line_3" required style="float:left; width:50%">
                                                                  <?php if($next_of_kin_line_3 == "antrim") { echo '<option value="antrim"  selected="selected">Antrim</option>'; } else { echo '<option value="antrim"  >Antrim</option>';}?>
																	  <?php if($next_of_kin_line_3 == "armagh") { echo '<option value="armagh"  selected="selected">Armagh</option>'; } else { echo '<option value="armagh"  >Armagh</option>';}?>
																	  <?php if($next_of_kin_line_3 == "carlow") { echo '<option value="carlow"  selected="selected">Carlow</option>'; } else { echo '<option value="carlow"  >Carlow</option>';}?>
																	  <?php if($next_of_kin_line_3 == "cavan") { echo '<option value="cavan"  selected="selected">Cavan</option>'; } else { echo '<option value="cavan"  >Cavan</option>';}?>
																	  <?php if($next_of_kin_line_3 == "clare") { echo '<option value="clare"  selected="selected">Clare</option>'; } else { echo '<option value="clare"  >Clare</option>';}?>
																	  <?php if($next_of_kin_line_3 == "cork") { echo '<option value="cork"  selected="selected">Cork</option>'; } else { echo '<option value="cork"  >Cork</option>';}?>
																	  <?php if($next_of_kin_line_3 == "derry") { echo '<option value="derry"  selected="selected">Derry</option>'; } else { echo '<option value="derry"  >Derry</option>';}?>
																	  <?php if($next_of_kin_line_3 == "donegal") { echo '<option value="donegal"  selected="selected">Donegal</option>'; } else { echo '<option value="donegal"  >Donegal</option>';}?>
																	  <?php if($next_of_kin_line_3 == "down") { echo '<option value="down"  selected="selected">Down</option>'; } else { echo '<option value="down"  >Down</option>';}?>
																	  <?php if($next_of_kin_line_3 == "dublin") { echo '<option value="dublin"  selected="selected">Dublin</option>'; } else { echo '<option value="dublin"  >Dublin</option>';}?>
																	  <?php if($next_of_kin_line_3 == "fermanagh") { echo '<option value="fermanagh"  selected="selected">Fermanagh</option>'; } else { echo '<option value="fermanagh"  >Fermanagh</option>';}?>
																	  <?php if($next_of_kin_line_3 == "galway") { echo '<option value="galway"  selected="selected">Galway</option>'; } else { echo '<option value="galway"  >Galway</option>';}?>
																	  <?php if($next_of_kin_line_3 == "kerry") { echo '<option value="kerry"  selected="selected">Kerry</option>'; } else { echo '<option value="kerry"  >Kerry</option>';}?>
																	  <?php if($next_of_kin_line_3 == "kildare") { echo '<option value="kildare"  selected="selected">Kildare</option>'; } else { echo '<option value="kildare"  >Kildare</option>';}?>
																	  <?php if($next_of_kin_line_3 == "kilkenny") { echo '<option value="kilkenny"  selected="selected">Kilkenny</option>'; } else { echo '<option value="kilkenny"  >Kilkenny</option>';}?>
																	  <?php if($next_of_kin_line_3 == "laois") { echo '<option value="laois"  selected="selected">Laois</option>'; } else { echo '<option value="laois"  >Laois</option>';}?>
																	  <?php if($next_of_kin_line_3 == "leitrim") { echo '<option value="leitrim"  selected="selected">Leitrim</option>'; } else { echo '<option value="leitrim"  >Leitrim</option>';}?>
																	  <?php if($next_of_kin_line_3 == "limerick") { echo '<option value="limerick"  selected="selected">Limerick</option>'; } else { echo '<option value="limerick"  >Limerick</option>';}?>
																	  <?php if($next_of_kin_line_3 == "longford") { echo '<option value="longford"  selected="selected">Longford</option>'; } else { echo '<option value="longford"  >Longford</option>';}?>
																	  <?php if($next_of_kin_line_3 == "louth") { echo '<option value="louth"  selected="selected">Louth</option>'; } else { echo '<option value="louth"  >Louth</option>';}?>
                                                                      <?php if($next_of_kin_line_3 == "mayo") { echo '<option value="mayo"  selected="selected">Mayo</option>'; } else { echo '<option value="mayo"  >Mayo</option>';}?>
																	  <?php if($next_of_kin_line_3 == "meath") { echo '<option value="meath"  selected="selected">Meath</option>'; } else { echo '<option value="meath"  >Meath</option>';}?>
																	  <?php if($next_of_kin_line_3 == "monaghan") { echo '<option value="monaghan"  selected="selected">Monaghan</option>'; } else { echo '<option value="monaghan"  >Monaghan</option>';}?>
																	  <?php if($next_of_kin_line_3 == "offaly") { echo '<option value="offaly"  selected="selected">Offaly</option>'; } else { echo '<option value="offaly"  >Offaly</option>';}?>
																	  <?php if($next_of_kin_line_3 == "roscommon") { echo '<option value="roscommon"  selected="selected">Roscommon</option>'; } else { echo '<option value="roscommon"  >Roscommon</option>';}?>
																	  <?php if($next_of_kin_line_3 == "sligo") { echo '<option value="sligo"  selected="selected">Sligo</option>'; } else { echo '<option value="sligo"  >Sligo</option>';}?>
																	  <?php if($next_of_kin_line_3 == "tipperary") { echo '<option value="tipperary"  selected="selected">Tipperary</option>'; } else { echo '<option value="tipperary"  >Tipperary</option>';}?>
																	  <?php if($next_of_kin_line_3 == "tyrone") { echo '<option value="tyrone"  selected="selected">Tyrone</option>'; } else { echo '<option value="tyrone"  >Tyrone</option>';}?>
																	  <?php if($next_of_kin_line_3 == "waterford") { echo '<option value="waterford"  selected="selected">Waterford</option>'; } else { echo '<option value="waterford"  >Waterford</option>';}?>
																	  <?php if($next_of_kin_line_3 == "westmeath") { echo '<option value="westmeath"  selected="selected">Westmeath</option>'; } else { echo '<option value="westmeath"  >Westmeath</option>';}?>
																	  <?php if($next_of_kin_line_3 == "wexford") { echo '<option value="wexford"  selected="selected">Wexford</option>'; } else { echo '<option value="wexford"  >Wexford</option>';}?>
																	  <?php if($next_of_kin_line_3 == "wicklow") { echo '<option value="wicklow"  selected="selected">Wicklow</option>'; } else { echo '<option value="wicklow"  >Wicklow</option>';}?>
                                                                      
                                                                      </select>
                                                                     </td>
                                                              </tr>
                                                              <tr class="next_of_kinInfo">
                                                                  <td class="formLabel" align="left"><label id="next_of_kinphoneLabel" for="next_of_kin_phone_number">Next of Kin's Phone Number:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="next_of_kin_phone_number" name="next_of_kin_phone_number" value="<?php echo $next_of_kin_phone_number ?>" required></td>
                                                              </tr>
                                                              <tr class="next_of_kinInfo">
                                                                  <td class="formLabel" align="left"><label id="next_of_kinemailLabel" for="next_of_kin_email">Next of Kin's Email:</label></td>
                                                                  <td class="formInput"><input type="email" class="form-control enable_disable" id="next_of_kin_email" name="next_of_kin_email" value="<?php echo $next_of_kin_email ?>"></td>
                                                              </tr>
                                                               <tr class="next_of_kinInfo">
															<td class="formLabel" align="left"><label for="next_of_kin_acknow">Next of Kin Acknowledgement and Info Sent:</label></td>
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($next_of_kin_acknow == "1") {
																echo '<input type="radio" class="enable_disable" name="next_of_kin_acknow" id="next_of_kin_acknow"  value="1" checked="checked"/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="next_of_kin_acknow" id="next_of_kin_acknow"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($next_of_kin_acknow == "0") {
																echo '<input type="radio" class="enable_disable" name="next_of_kin_acknow" id="next_of_kin_acknow"  value="0" checked="checked"/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="next_of_kin_acknow" id="next_of_kin_acknow"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
                                                        </table>
                                                         <table id="acceptancetable" class="centred_text">
                                                              <tr id="acceptanceRow">
                                                              	<td class="formLabel" align="left" colspan=2><label id="acceptanceLabel" for="new_undertakername">Acceptance:</label></td>
                                                                <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($acceptance == "1") {
																echo '<input type="radio" class="enable_disable" name="acceptance" id="acceptance"  value="1" checked="checked"/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="acceptance" id="acceptance"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($acceptance == "0") {
																echo '<input type="radio" class="enable_disable" name="acceptance" id="acceptance"  value="0" checked="checked"/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="acceptance" id="acceptance"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
                                                              </tr>
                                                          </table>
                                                            <table id="acceptancetable" class="centred_text">
                                                              <tr id="acceptanceRow">
                                                              	<td class="formLabel" align="left" colspan=2><label id="archivedLabel" for="archived">Archived:</label></td>
                                                                <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($archived == "1") {
																echo '<input type="radio" class="enable_disable" name="archived" id="archived"  value="1" checked="checked"/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="archived" id="archived"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($archived == "0") {
																echo '<input type="radio" class="enable_disable" name="archived" id="archived"  value="0" checked="checked"/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="archived" id="archived"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
                                                              </tr>
                                                          </table>
													</table>
                                                    <table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell"><a href="donor_history_7_consent_info.php">	
																<button type="button" class="btn btn-lg btn-default form_1_button" value="page_4" id="first_visit_page_4_1"><i class="fa fa-arrow-left"></i> Consent Information</button></a>
														</td>
															<td class="buttons_table_cell">
																
															</td>
															<td class="buttons_table_cell"><a href="donor_history_6_mortuary_info.php"><button type="button" class="btn btn-lg btn-default form_1_button" value="page6" id="first_visit_page_6_1">Mortuary Information <i class="fa fa-arrow-right"></i></button>
															</a></td>
														</tr>
                                                        </table>
													<table id="save_cancel_table" class="buttons_table centred_text">
														<tr class="buttons_table_row">
															<td class="save_cancel_cell"><button type="button" class="btn btn-lg btn-danger save_cancel_btn" name="cancel_editing" id="cancel_editing" value="Cancel" onclick="refresh_page()">Cancel</button></td>
															<td class="space_cell"></td>
															<td class="save_cancel_cell"><input class="btn btn-lg btn-primary save_cancel_btn" type="submit" name="save_new_info_pg5" id="save_new_info_pg5" value="Save"/></td>
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
    
    <!-- Javascript for the datapicker http://jqueryui.com/datepicker/#dropdown-month-year -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	<link rel="stylesheet" href="/resources/demos/style.css">

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
    <!-- Javascript for the datapicker http://jqueryui.com/datepicker/#dropdown-month-year -->
    <script type="text/javascript">
  $(function() {
    $( "#date_of_death" ).datepicker({
      changeMonth: true,
      changeYear: true, 
	  showButtonPanel: true, 
	  dateFormat: "dd-mm-yy", 
	  defaultDate:"Now", 
	  yearRange: "1920:Now"
    });
  });
  $(function() {
    $( "#date_of_receipt" ).datepicker({
      changeMonth: true,
      changeYear: true, 
	  showButtonPanel: true, 
	  dateFormat: "dd-mm-yy", 
	  defaultDate:"Now", 
	  yearRange: "1920:Now"
    });
  });
  $(function() {
    $( "#date_of_burial_or_cremation" ).datepicker({
      changeMonth: true,
      changeYear: true, 
	  showButtonPanel: true, 
	  dateFormat: "dd-mm-yy", 
	  defaultDate:"Now", 
	  yearRange: "1920:Now"
    });
  });
        
    // make all input boxes disabled on page load. Toggle enabled/disabled state when edit button is clicked
	$(document).ready(function() {
	
	$(".enable_disable").prop('disabled', true);
	$('#cancel_editing').attr("disabled", true);
	$('#save_new_info_pg5').attr("disabled", true);
				
    $('#edit_button').click(function() {
			$('.enable_disable').each(function() {
				if ($(this).attr('disabled')) {
					$(this).removeAttr('disabled');
					$('#first_visit_page_4').attr("disabled", true);
					$('#first_visit_page_4_1').attr("disabled", true);
					$('#first_visit_page_6').attr("disabled", true);
					$('#first_visit_page_6_1').attr("disabled", true);
					$('#cancel_editing').attr("disabled", false);
					$('#save_new_info_pg5').attr("disabled", false);
				}
				else {
					$(this).attr({
						'disabled': 'disabled'
					});
					$('#first_visit_page_4').attr("disabled", false);
					$('#first_visit_page_4_1').attr("disabled", false);
					$('#first_visit_page_6').attr("disabled", false);
					$('#first_visit_page_6_1').attr("disabled", false);
					$('#cancel_editing').attr("disabled", true);
					$('#save_new_info_pg5').attr("disabled", true);
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
				$(this).html('<td class="formLabel" align="middle" colspan=2><label id="undertakernameLabel" for="undertakername"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Undertaker</label></td>');
        		n2 = 1;
        	} else if(n2 == 1) {
        		$(".undertakerInfo").hide();
				 $(this).html('<td class="formLabel" align="middle" colspan=2><label id="undertakernameLabel" for="undertakername"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span> Undertaker</label></td>');
        		n2 = 0;
        	}  	
        });
		
			// code for the show/hide table button
     var n1 = 1;
     $('#next_of_kinRow').click(function(){
        	if(n1 == 0) {
        		$(".next_of_kinInfo").show();
				$(this).html('<td class="formLabel" align="middle" colspan=2><label id="next_of_kinnameLabel" for="next_of_kinname"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Next of Kin/Person to be Contacted at time of Burial</label></td>');
        		n1 = 1;
        	} else if(n1 == 1) {
        		$(".next_of_kinInfo").hide();
				 $(this).html('<td class="formLabel" align="middle" colspan=2><label id="next_of_kinnameLabel" for="next_of_kinname"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span> Next of Kin/Person to be Contacted at time of Burial</label></td>');
        		n1 = 0;
        	}  	
        });
		
	// code for the show/hide table button
     var n5 = 1;
     $('#doctorRow').click(function(){
        	if(n5 == 0) {
        		$(".doctorInfo").show();
				$(this).html('<td class="formLabel" align="middle" colspan=2><label id="undertakernameLabel" for="undertakername"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Doctor</label></td>');
        		n5 = 1;
        	} else if(n5 == 1) {
        		$(".doctorInfo").hide();
				 $(this).html('<td class="formLabel" align="middle" colspan=2><label id="undertakernameLabel" for="undertakername"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span> Doctor</label></td>');
        		n5 = 0;
        	}  	
        });
		
function refresh_page() {
	window.location = "donor_history_5_donor_receipt_details.php";
}
	</script>
    

</body>

</html>