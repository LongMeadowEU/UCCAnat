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
				
				//$date_of_donation_1 = $record['date_of_donation'];
				$witness1name_1 = $record['witness_1_name'];
				$witness_1_relationship_1 = $record['witness_1_relationship'];
				$witness_1_address_line_1 = $record['witness_1_address_line_1'];
				$witness_1_address_line_2 = $record['witness_1_address_line_2'];
				$witness_1_address_line_3 = $record['witness_1_address_line_3'];
				$witness_1_phone_number_1  = $record['witness_1_phone_number'];
				$witness_1_address_line_4_1 = $record['witness_1_address_line_4'];
				$witness_1_address_line_postcode_1 = $record['witness_1_address_line_postcode'];
				$new_signature_present_wit_1 = $record['signature_present_wit_1'];
				$witness_1_email_1 = $record['witness_1_email'];
				
				$witness_2_name_1 = $record['witness_2_name'];
				$witness_2_relationship_1 = $record['witness_2_relationship'];
				$witness_2_address_line_1 = $record['witness_2_address_line_1'];
				$witness_2_address_line_2 = $record['witness_2_address_line_2'];
				$witness_2_address_line_3 = $record['witness_2_address_line_3'];
				$witness_2_phone_number_1 = $record['witness_2_phone_number'];
				$witness_2_address_line_4_1 = $record['witness_2_address_line_4'];
				$witness_2_address_line_postcode_1 = $record['witness_2_address_line_postcode'];
				$new_signature_present_wit_2 = $record['signature_present_wit_2'];
				$witness_2_email_1 = $record['witness_2_email'];
				
				$date_of_burial_or_cremation_a = $record['date_of_burial_or_cremation'];
				$var_c = $date_of_burial_or_cremation_a;
				if($var_c == "0000-00-00") {
					$date_of_burial_or_cremation = "Enter date of Burial or Cremation";
				} else {
					$date_of_burial_or_cremation = date('d-m-Y', strtotime($var_c));
				}
				
				$place_of_burial_or_cremation_1 = $record['place_of_burial_or_cremation'];
				$private_family_interment_address_hist_3 =  $record['private_family_interment_address_1'];
				$private_family_interment_address_2_hist_3 =  $record['private_family_interment_address_2'];
				$private_family_interment_address_3_hist_3 =  $record['private_family_interment_address_3'];
				$organise_coffin = $record['organise_coffin'];
				$funeral_director = $record['funeral_director'];
				$grave_opened = $record['grave_opened'];
				$crematorium_booked = $record['crematorium_booked'];
				$organise_coffin_cremation = $record['organise_coffin_cremation'];
				$funeral_director_cremation = $record['funeral_director_cremation'];
				$cremation_forms_complete = $record['cremation_forms_complete'];
				$funeral_director_priv_plot = $record['funeral_director_priv_plot'];
				$organise_coffin_priv_plot = $record['organise_coffin_priv_plot'];
				$grave_opened_priv_plot = $record['grave_opened_priv_plot'];
				
				$notes_hist_3 = $record['notes'];
				
				$new_first_name = ucwords($record['first_name']);
				$new_sur_name = ucwords($record['sur_name']);
				
		}

		if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['save_new_info_pg3']) {
						
						//$new_date_of_donation = $_POST['new_date_of_donation'];
						$new_witness1name = $_POST['new_witness1name'];
						$new_witness_1_relationship = $_POST['new_witness_1_relationship'];
						$new_witness_1_address_line_1 = $_POST['new_witness_1_address_line_1'];
						$new_witness_1_address_line_2 = $_POST['new_witness_1_address_line_2'];	
						$new_witness_1_address_line_3 = $_POST['new_witness_1_address_line_3'];	
						$new_witness_1_phone_number = $_POST['new_witness_1_phone_number'];
						$witness_1_address_line_4 = $_POST['witness_1_address_line_4'];
						$witness_1_address_line_postcode = $_POST['witness_1_address_line_postcode'];
						$signature_present_wit_1 = $_POST['signature_present_wit_1'];
						$witness_1_email = $_POST['witness_1_email'];
						
						$new_witness_2_name = $_POST['new_witness_2_name'];
						$new_witness_2_relationship = $_POST['new_witness_2_relationship'];
						$new_witness_2_address_line_1 = $_POST['new_witness_2_address_line_1'];
						$new_witness_2_address_line_2 = $_POST['new_witness_2_address_line_2'];
						$new_witness_2_address_line_3 = $_POST['new_witness_2_address_line_3'];
						$new_witness_2_phone_number = $_POST['new_witness_2_phone_number'];
						$witness_2_address_line_4 = $_POST['witness_2_address_line_4'];
						$witness_2_address_line_postcode = $_POST['witness_2_address_line_postcode'];
						$signature_present_wit_2 = $_POST['signature_present_wit_2'];
						$witness_2_email = $_POST['witness_2_email'];
						
						$organise_coffin_new = $_POST['organise_coffin'];
						$funeral_director_new = $_POST['funeral_director'];
						$grave_opened_new = $_POST['grave_opened'];
						$crematorium_booked_new = $_POST['crematorium_booked'];
						$organise_coffin_cremation_new = $_POST['organise_coffin_cremation'];
						$funeral_director_cremation_new = $_POST['funeral_director_cremation'];
						$cremation_forms_complete_new = $_POST['cremation_forms_complete'];
						
						$new_place_of_burial_or_cremation = $_POST['new_place_of_burial_or_cremation'];
						if(!empty($new_place_of_burial_or_cremation)) {
							$var_date_of_burCrem = $_POST['date_of_burial_or_cremation'];
							$var_date_of_burial_or_cremation = date('Y-m-d', strtotime($var_date_of_burCrem));
							mysql_query("UPDATE donor_table SET date_of_burial_or_cremation = '$var_date_of_burial_or_cremation' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						} else if(empty($new_place_of_burial_or_cremation)){
						}
						
						if($new_place_of_burial_or_cremation == "private_family_interment") {
							$new_private_family_interment_address =  $_POST['new_private_family_interment_address'];
							$new_private_family_interment_address_2 =  $_POST['new_private_family_interment_address_2'];
							$new_private_family_interment_address_3 =  $_POST['new_private_family_interment_address_3'];
							$new_funeral_director_priv_plot = $_POST['funeral_director_priv_plot'];
							$new_organise_coffin_priv_plot = $_POST['organise_coffin_priv_plot'];
							$new_grave_opened_priv_plot = $_POST['grave_opened_priv_plot'];
							
							mysql_query("UPDATE donor_table SET private_family_interment_address_1 = '$new_private_family_interment_address' WHERE donor_reference_number = '$selected_donor_ref_hist'");
							mysql_query("UPDATE donor_table SET private_family_interment_address_2 = '$new_private_family_interment_address_2' WHERE donor_reference_number = '$selected_donor_ref_hist'");
							mysql_query("UPDATE donor_table SET private_family_interment_address_3 = '$new_private_family_interment_address_3' WHERE donor_reference_number = '$selected_donor_ref_hist'");
							mysql_query("UPDATE donor_table SET funeral_director_priv_plot = '$new_funeral_director_priv_plot' WHERE donor_reference_number = '$selected_donor_ref_hist'");
							mysql_query("UPDATE donor_table SET organise_coffin_priv_plot = '$new_organise_coffin_priv_plot' WHERE donor_reference_number = '$selected_donor_ref_hist'");
							mysql_query("UPDATE donor_table SET grave_opened_priv_plot = '$new_grave_opened_priv_plot' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						}
						
						$new_notes = $_POST['new_notes'];

						// update the correct row for the new patient info added on page 1 of the form with the new changes
						//mysql_query("UPDATE donor_table SET date_of_donation = '$new_date_of_donation' WHERE donor_reference_number = '$selected_donor_ref_hist'");	
					
						mysql_query("UPDATE donor_table SET witness_1_name = '$new_witness1name' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_1_relationship = '$new_witness_1_relationship' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_1_address_line_1 = '$new_witness_1_address_line_1' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_1_address_line_2 = '$new_witness_1_address_line_2' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_1_address_line_3 = '$new_witness_1_address_line_3' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_1_phone_number = '$new_witness_1_phone_number' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_1_address_line_4 = '$witness_1_address_line_4' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_1_address_line_postcode = '$witness_1_address_line_postcode' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET signature_present_wit_1 = '$signature_present_wit_1' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_1_email = '$witness_1_email' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						
						mysql_query("UPDATE donor_table SET witness_2_name = '$new_witness_2_name' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_2_relationship = '$new_witness_2_relationship' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_2_address_line_1 = '$new_witness_2_address_line_1' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_2_address_line_2 = '$new_witness_2_address_line_2' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_2_address_line_3 = '$new_witness_2_address_line_3' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_2_phone_number = '$new_witness_2_phone_number' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_2_address_line_4 = '$witness_2_address_line_4' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_2_address_line_postcode = '$witness_2_address_line_postcode' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET signature_present_wit_2 = '$signature_present_wit_2' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						
						mysql_query("UPDATE donor_table SET place_of_burial_or_cremation = '$new_place_of_burial_or_cremation' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET witness_2_email = '$witness_2_email' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						
						mysql_query("UPDATE donor_table SET notes = '$new_notes' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						
						mysql_query("UPDATE donor_table SET organise_coffin = '$organise_coffin_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET funeral_director = '$funeral_director_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET grave_opened = '$grave_opened_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET crematorium_booked = '$crematorium_booked_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET organise_coffin_cremation = '$organise_coffin_cremation_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET funeral_director_cremation = '$funeral_director_cremation_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET cremation_forms_complete = '$cremation_forms_complete_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");

						header("Location: donor_history_3_burial_witness_info.php");
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

    <title>Donor History - Burial and Witness Information</title>

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
    
    <!-- JQuery datepicker css
    <link href="css/jquery.theme.ui.smoothness.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.theme.ui.css" rel="stylesheet" type="text/css"> -->
    
    <!-- Include Bootstrap Datepicker -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

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
		#generalInfoPic {
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
                                  <h2 class="page-header" id="homepageHeader">Donor History: Burial and Witness Information</h2>
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
                                          <a href="donor_history_4_medical_history.php"><strong>Donor History: Burial and Witness Information - <?php echo $new_first_name; ?> <?php echo $new_sur_name; ?></strong></a>
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
															<td class="buttons_table_cell"><a href="donor_history_2_contact_details.php">	
																<button type="button" class="btn btn-lg btn-default form_1_button" value="page_1" id="first_visit_page_1"><i class="fa fa-arrow-left"></i> Contact Details</button></a>
														</td>
															<td class="buttons_table_cell">
																<button type="button" class="btn btn-lg btn-success form_1_button" value="edit" id="edit_button"><i class="fa fa-pencil"></i> Edit</button>
															</td>
															<td class="buttons_table_cell"><a href="donor_history_4_medical_history.php"><button type="button" class="btn btn-lg btn-default form_1_button" value="page3" id="first_visit_page_3">Medical History <i class="fa fa-arrow-right"></i></button>
															</a></td>
														</tr>
													</table>
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                        <!-- <tr>
															<td class="formLabel" align="left">
                                                            	<label id="dobLabel" for="donorDOB">Date of Donation:
                                                                		<a data-toggle="popover" data-placement="right" title="Date of Birth" data-content="Insert the date of donation in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-2015.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepickerDOB">
																	<input type="text" class="form-control enable_disable" name="new_date_of_donation" id="new_date_of_donation" value="<php echo $date_of_donation_1 ?>" required>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr> -->
                                                        <table id="witness1table" class="centred_text">
                                                              <tr id="witness1Row">
                                                              	<td class="formLabel" align="middle" colspan=2><label id="witness1nameLabel" for="new_witness1name"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Witness 1</label></td>
                                                              </tr>
                                                              
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1nameLabel" for="new_witness1name">Name of Witness:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_witness1name" name="new_witness1name" value="<?php echo $witness1name_1 ?>" required></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1relationshipLabel" for="new_witness_1_relationship">Relationship to Donor:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_witness_1_relationship" name="new_witness_1_relationship" value="<?php echo $witness_1_relationship_1 ?>" required></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1addressLabel" for="new_witness_1_address_line_1">Address:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_witness_1_address_line_1" name="new_witness_1_address_line_1" value="<?php echo $witness_1_address_line_1 ?>" required></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_witness_1_address_line_2" name="new_witness_1_address_line_2" value="<?php echo $witness_1_address_line_2 ?>" required></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="witness_1_address_line_4" name="witness_1_address_line_4" value="<?php echo $witness_1_address_line_4_1 ?>" ></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput">
                                                                  <!--<input type="text" class="form-control" id="witness_1_address_line_3" name="witness_1_address_line_3" placeholder="< echo $witness_1_address_line_3_1 ?>" disabled>-->
                                                                   <input type="text" class="form-control enable_disable" id="witness_1_address_line_postcode" name="witness_1_address_line_postcode" value="<?php echo $witness_1_address_line_postcode_1 ?>"  style="float:left; width:50%">
                                                                  <select class="form-control enable_disable" id="new_witness_1_address_line_3" name="new_witness_1_address_line_3" required style="float:left; width:50%">
                                                                  <?php if($witness_1_address_line_3 == "antrim") { echo '<option value="antrim"  selected="selected">Antrim</option>'; } else { echo '<option value="antrim"  >Antrim</option>';}?>
																	  <?php if($witness_1_address_line_3 == "armagh") { echo '<option value="armagh"  selected="selected">Armagh</option>'; } else { echo '<option value="armagh"  >Armagh</option>';}?>
																	  <?php if($witness_1_address_line_3 == "carlow") { echo '<option value="carlow"  selected="selected">Carlow</option>'; } else { echo '<option value="carlow"  >Carlow</option>';}?>
																	  <?php if($witness_1_address_line_3 == "cavan") { echo '<option value="cavan"  selected="selected">Cavan</option>'; } else { echo '<option value="cavan"  >Cavan</option>';}?>
																	  <?php if($witness_1_address_line_3 == "clare") { echo '<option value="clare"  selected="selected">Clare</option>'; } else { echo '<option value="clare"  >Clare</option>';}?>
																	  <?php if($witness_1_address_line_3 == "cork") { echo '<option value="cork"  selected="selected">Cork</option>'; } else { echo '<option value="cork"  >Cork</option>';}?>
																	  <?php if($witness_1_address_line_3 == "derry") { echo '<option value="derry"  selected="selected">Derry</option>'; } else { echo '<option value="derry"  >Derry</option>';}?>
																	  <?php if($witness_1_address_line_3 == "donegal") { echo '<option value="donegal"  selected="selected">Donegal</option>'; } else { echo '<option value="donegal"  >Donegal</option>';}?>
																	  <?php if($witness_1_address_line_3 == "down") { echo '<option value="down"  selected="selected">Down</option>'; } else { echo '<option value="down"  >Down</option>';}?>
																	  <?php if($witness_1_address_line_3 == "dublin") { echo '<option value="dublin"  selected="selected">Dublin</option>'; } else { echo '<option value="dublin"  >Dublin</option>';}?>
																	  <?php if($witness_1_address_line_3 == "fermanagh") { echo '<option value="fermanagh"  selected="selected">Fermanagh</option>'; } else { echo '<option value="fermanagh"  >Fermanagh</option>';}?>
																	  <?php if($witness_1_address_line_3 == "galway") { echo '<option value="galway"  selected="selected">Galway</option>'; } else { echo '<option value="galway"  >Galway</option>';}?>
																	  <?php if($witness_1_address_line_3 == "kerry") { echo '<option value="kerry"  selected="selected">Kerry</option>'; } else { echo '<option value="kerry"  >Kerry</option>';}?>
																	  <?php if($witness_1_address_line_3 == "kildare") { echo '<option value="kildare"  selected="selected">Kildare</option>'; } else { echo '<option value="kildare"  >Kildare</option>';}?>
																	  <?php if($witness_1_address_line_3 == "kilkenny") { echo '<option value="kilkenny"  selected="selected">Kilkenny</option>'; } else { echo '<option value="kilkenny"  >Kilkenny</option>';}?>
																	  <?php if($witness_1_address_line_3 == "laois") { echo '<option value="laois"  selected="selected">Laois</option>'; } else { echo '<option value="laois"  >Laois</option>';}?>
																	  <?php if($witness_1_address_line_3 == "leitrim") { echo '<option value="leitrim"  selected="selected">Leitrim</option>'; } else { echo '<option value="leitrim"  >Leitrim</option>';}?>
																	  <?php if($witness_1_address_line_3 == "limerick") { echo '<option value="limerick"  selected="selected">Limerick</option>'; } else { echo '<option value="limerick"  >Limerick</option>';}?>
																	  <?php if($witness_1_address_line_3 == "longford") { echo '<option value="longford"  selected="selected">Longford</option>'; } else { echo '<option value="longford"  >Longford</option>';}?>
																	  <?php if($witness_1_address_line_3 == "louth") { echo '<option value="louth"  selected="selected">Louth</option>'; } else { echo '<option value="louth"  >Louth</option>';}?>
                                                                      <?php if($witness_1_address_line_3 == "mayo") { echo '<option value="mayo"  selected="selected">Mayo</option>'; } else { echo '<option value="mayo"  >Mayo</option>';}?>
																	  <?php if($witness_1_address_line_3 == "meath") { echo '<option value="meath"  selected="selected">Meath</option>'; } else { echo '<option value="meath"  >Meath</option>';}?>
																	  <?php if($witness_1_address_line_3 == "monaghan") { echo '<option value="monaghan"  selected="selected">Monaghan</option>'; } else { echo '<option value="monaghan"  >Monaghan</option>';}?>
																	  <?php if($witness_1_address_line_3 == "offaly") { echo '<option value="offaly"  selected="selected">Offaly</option>'; } else { echo '<option value="offaly"  >Offaly</option>';}?>
																	  <?php if($witness_1_address_line_3 == "roscommon") { echo '<option value="roscommon"  selected="selected">Roscommon</option>'; } else { echo '<option value="roscommon"  >Roscommon</option>';}?>
																	  <?php if($witness_1_address_line_3 == "sligo") { echo '<option value="sligo"  selected="selected">Sligo</option>'; } else { echo '<option value="sligo"  >Sligo</option>';}?>
																	  <?php if($witness_1_address_line_3 == "tipperary") { echo '<option value="tipperary"  selected="selected">Tipperary</option>'; } else { echo '<option value="tipperary"  >Tipperary</option>';}?>
																	  <?php if($witness_1_address_line_3 == "tyrone") { echo '<option value="tyrone"  selected="selected">Tyrone</option>'; } else { echo '<option value="tyrone"  >Tyrone</option>';}?>
																	  <?php if($witness_1_address_line_3 == "waterford") { echo '<option value="waterford"  selected="selected">Waterford</option>'; } else { echo '<option value="waterford"  >Waterford</option>';}?>
																	  <?php if($witness_1_address_line_3 == "westmeath") { echo '<option value="westmeath"  selected="selected">Westmeath</option>'; } else { echo '<option value="westmeath"  >Westmeath</option>';}?>
																	  <?php if($witness_1_address_line_3 == "wexford") { echo '<option value="wexford"  selected="selected">Wexford</option>'; } else { echo '<option value="wexford"  >Wexford</option>';}?>
																	  <?php if($witness_1_address_line_3 == "wicklow") { echo '<option value="wicklow"  selected="selected">Wicklow</option>'; } else { echo '<option value="wicklow"  >Wicklow</option>';}?>
                                                                      
                                                                      </select>
                                                                     </td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1phoneLabel" for="new_witness_1_phone_number">Phone Number:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_witness_1_phone_number" name="new_witness_1_phone_number" value="<?php echo $witness_1_phone_number_1 ?>"></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1emailLabel" for="witness_1_email">Email Address:</label></td>
                                                                  <td class="formInput"><input type="email" class="form-control enable_disable" id="witness_1_email" name="witness_1_email" value="<?php echo $witness_1_email_1 ?>"></td>
                                                              </tr>
                                                              <tr class="witness1Info">
															<td class="formLabel" align="left"><label id="sexLabel" for="signature_present_wit_1">Signature Present:</label></td>
															<!-- <td class="formInput"><input type="text" class="form-control" id="sex" name="sex" placeholder="< echo $sex_1 ?>" disabled></td>												-->
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($new_signature_present_wit_1 == "1") {
																echo '<input type="radio" class="enable_disable" name="signature_present_wit_1" id="signature_present_wit_1"  value="1" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_present_wit_1" id="signature_present_wit_1"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($new_signature_present_wit_1 == "0") {
																echo '<input type="radio" class="enable_disable" name="signature_present_wit_1" id="signature_present_wit_1"  value="0" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_present_wit_1" id="signature_present_wit_1"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
                                                        </table>
                                                         <table id="witness2table" class="centred_text">
                                                              <tr id="witness2Row">
                                                              	<td class="formLabel" align="middle" colspan=2><label id="new_witness2nameLabel" for="new_witness2name"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Witness 2</label></td
                                                              ></tr>
		 												
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="new_witness2nameLabel" for="new_witness_2_name">Name of Witness:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_witness_2_name" name="new_witness_2_name" value="<?php echo $witness_2_name_1 ?>"></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="new_witness1relationshipLabel" for="new_witness_2_relationship">Relationship to Donor:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_witness_2_relationship" name="new_witness_2_relationship" value="<?php echo $witness_2_relationship_1 ?>"></td>
                                                              </tr>
                                                             <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness2addressLabel" for="new_witness_2_address_line_1">Address:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_witness_2_address_line_1" name="new_witness_2_address_line_1" value="<?php echo $witness_2_address_line_1 ?>"></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_witness_2_address_line_2" name="new_witness_2_address_line_2" value="<?php echo $witness_2_address_line_2 ?>"></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="witness_2_address_line_4" name="witness_2_address_line_4" value="<?php echo $witness_2_address_line_4_1 ?>"></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput">
                                                                  <!--<input type="text" class="form-control" id="witness_2_address_line_3" name="witness_2_address_line_3" placeholder="< echo $witness_2_address_line_3_1 ?>" disabled>-->
                                                                  <input type="text" class="form-control enable_disable" id="witness_2_address_line_postcode" name="witness_2_address_line_postcode" value="<?php echo $witness_2_address_line_postcode_1 ?>" style="float:left; width:50%">
                                                                  <select class="form-control enable_disable" id="new_witness_2_address_line_3" name="new_witness_2_address_line_3" style="float:left; width:50%">
                                                                  <?php if($witness_2_address_line_3 == "antrim") { echo '<option value="antrim"  selected="selected">Antrim</option>'; } else { echo '<option value="antrim"  >Antrim</option>';}?>
																	  <?php if($witness_2_address_line_3 == "armagh") { echo '<option value="armagh"  selected="selected">Armagh</option>'; } else { echo '<option value="armagh"  >Armagh</option>';}?>
																	  <?php if($witness_2_address_line_3 == "carlow") { echo '<option value="carlow"  selected="selected">Carlow</option>'; } else { echo '<option value="carlow"  >Carlow</option>';}?>
																	  <?php if($witness_2_address_line_3 == "cavan") { echo '<option value="cavan"  selected="selected">Cavan</option>'; } else { echo '<option value="cavan"  >Cavan</option>';}?>
																	  <?php if($witness_2_address_line_3 == "clare") { echo '<option value="clare"  selected="selected">Clare</option>'; } else { echo '<option value="clare"  >Clare</option>';}?>
																	  <?php if($witness_2_address_line_3 == "cork") { echo '<option value="cork"  selected="selected">Cork</option>'; } else { echo '<option value="cork"  >Cork</option>';}?>
																	  <?php if($witness_2_address_line_3 == "derry") { echo '<option value="derry"  selected="selected">Derry</option>'; } else { echo '<option value="derry"  >Derry</option>';}?>
																	  <?php if($witness_2_address_line_3 == "donegal") { echo '<option value="donegal"  selected="selected">Donegal</option>'; } else { echo '<option value="donegal"  >Donegal</option>';}?>
																	  <?php if($witness_2_address_line_3 == "down") { echo '<option value="down"  selected="selected">Down</option>'; } else { echo '<option value="down"  >Down</option>';}?>
																	  <?php if($witness_2_address_line_3 == "dublin") { echo '<option value="dublin"  selected="selected">Dublin</option>'; } else { echo '<option value="dublin"  >Dublin</option>';}?>
																	  <?php if($witness_2_address_line_3 == "fermanagh") { echo '<option value="fermanagh"  selected="selected">Fermanagh</option>'; } else { echo '<option value="fermanagh"  >Fermanagh</option>';}?>
																	  <?php if($witness_2_address_line_3 == "galway") { echo '<option value="galway"  selected="selected">Galway</option>'; } else { echo '<option value="galway"  >Galway</option>';}?>
																	  <?php if($witness_2_address_line_3 == "kerry") { echo '<option value="kerry"  selected="selected">Kerry</option>'; } else { echo '<option value="kerry"  >Kerry</option>';}?>
																	  <?php if($witness_2_address_line_3 == "kildare") { echo '<option value="kildare"  selected="selected">Kildare</option>'; } else { echo '<option value="kildare"  >Kildare</option>';}?>
																	  <?php if($witness_2_address_line_3 == "kilkenny") { echo '<option value="kilkenny"  selected="selected">Kilkenny</option>'; } else { echo '<option value="kilkenny"  >Kilkenny</option>';}?>
																	  <?php if($witness_2_address_line_3 == "laois") { echo '<option value="laois"  selected="selected">Laois</option>'; } else { echo '<option value="laois"  >Laois</option>';}?>
																	  <?php if($witness_2_address_line_3 == "leitrim") { echo '<option value="leitrim"  selected="selected">Leitrim</option>'; } else { echo '<option value="leitrim"  >Leitrim</option>';}?>
																	  <?php if($witness_2_address_line_3 == "limerick") { echo '<option value="limerick"  selected="selected">Limerick</option>'; } else { echo '<option value="limerick"  >Limerick</option>';}?>
																	  <?php if($witness_2_address_line_3 == "longford") { echo '<option value="longford"  selected="selected">Longford</option>'; } else { echo '<option value="longford"  >Longford</option>';}?>
																	  <?php if($witness_2_address_line_3 == "louth") { echo '<option value="louth"  selected="selected">Louth</option>'; } else { echo '<option value="louth"  >Louth</option>';}?>
                                                                      <?php if($witness_2_address_line_3 == "mayo") { echo '<option value="mayo"  selected="selected">Mayo</option>'; } else { echo '<option value="mayo"  >Mayo</option>';}?>
																	  <?php if($witness_2_address_line_3 == "meath") { echo '<option value="meath"  selected="selected">Meath</option>'; } else { echo '<option value="meath"  >Meath</option>';}?>
																	  <?php if($witness_2_address_line_3 == "monaghan") { echo '<option value="monaghan"  selected="selected">Monaghan</option>'; } else { echo '<option value="monaghan"  >Monaghan</option>';}?>
																	  <?php if($witness_2_address_line_3 == "offaly") { echo '<option value="offaly"  selected="selected">Offaly</option>'; } else { echo '<option value="offaly"  >Offaly</option>';}?>
																	  <?php if($witness_2_address_line_3 == "roscommon") { echo '<option value="roscommon"  selected="selected">Roscommon</option>'; } else { echo '<option value="roscommon"  >Roscommon</option>';}?>
																	  <?php if($witness_2_address_line_3 == "sligo") { echo '<option value="sligo"  selected="selected">Sligo</option>'; } else { echo '<option value="sligo"  >Sligo</option>';}?>
																	  <?php if($witness_2_address_line_3 == "tipperary") { echo '<option value="tipperary"  selected="selected">Tipperary</option>'; } else { echo '<option value="tipperary"  >Tipperary</option>';}?>
																	  <?php if($witness_2_address_line_3 == "tyrone") { echo '<option value="tyrone"  selected="selected">Tyrone</option>'; } else { echo '<option value="tyrone"  >Tyrone</option>';}?>
																	  <?php if($witness_2_address_line_3 == "waterford") { echo '<option value="waterford"  selected="selected">Waterford</option>'; } else { echo '<option value="waterford"  >Waterford</option>';}?>
																	  <?php if($witness_2_address_line_3 == "westmeath") { echo '<option value="westmeath"  selected="selected">Westmeath</option>'; } else { echo '<option value="westmeath"  >Westmeath</option>';}?>
																	  <?php if($witness_2_address_line_3 == "wexford") { echo '<option value="wexford"  selected="selected">Wexford</option>'; } else { echo '<option value="wexford"  >Wexford</option>';}?>
																	  <?php if($witness_2_address_line_3 == "wicklow") { echo '<option value="wicklow"  selected="selected">Wicklow</option>'; } else { echo '<option value="wicklow"  >Wicklow</option>';}?>
                                                                      
                                                                      </select>
                                                                      </td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness2phoneLabel" for="new_witness_2_phone_number">Phone Number:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control enable_disable" id="new_witness_2_phone_number" name="new_witness_2_phone_number" value="<?php echo $witness_2_phone_number_1 ?>"></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness2emailLabel" for="witness_2_email">Email Address:</label></td>
                                                                  <td class="formInput"><input type="email" class="form-control enable_disable" id="witness_2_email" name="witness_2_email" value="<?php echo $witness_2_email_1 ?>"></td>
                                                              </tr>
                                                              <tr class="witness2Info">
															<td class="formLabel" align="left"><label id="sexLabel" for="signature_present_wit_2">Signature Present:</label></td>
															<!-- <td class="formInput"><input type="text" class="form-control" id="sex" name="sex" placeholder="< echo $sex_1 ?>" disabled></td>												-->
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($new_signature_present_wit_2 == "1") {
																echo '<input type="radio" class="enable_disable" name="signature_present_wit_2" id="signature_present_wit_2"  value="1" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_present_wit_2" id="signature_present_wit_2"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($new_signature_present_wit_2 == "0") {
																echo '<input type="radio" class="enable_disable" name="signature_present_wit_2" id="signature_present_wit_2"  value="0" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_present_wit_2" id="signature_present_wit_2"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
                                                         <tr>
															<td class="formLabel" align="left">
                                                            	<label id="dobLabel" for="date_of_burial_or_cremation">Date of Burial/Cremation:
                                                                		<a data-toggle="popover" data-placement="right" title="Date of Burial/Cremation" data-content="Insert the date of burial/cremation in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-2015.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="date_of_burial_or_cremation_date_picker">
																	<input type="text" class="form-control enable_disable" name="date_of_burial_or_cremation" id="date_of_burial_or_cremation" value="<?php echo $date_of_burial_or_cremation ?>">
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                         </table>
                                         <table id="cremation_or_burial_table" class="centred_text">
                                                         <tr>
															<td class="formLabel" align="left" colspan="2"><label id="placeOfBurialLabel" for="new_place_of_burial_or_cremation">Proposed Place of Burial, Cremation or Other:</label>
                                                            <a data-toggle="popover" title="Proposed Place of Burial, Cremation or Other:" data-content="Please state whether donor selected: burial in the UCC Private Plot; burial in private family interment; or cremation.">
																<span class="glyphicon glyphicon-question-sign" aria-hidden="true" style="padding-left: 5%"></span>
															</a>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            	<!-- <input type="text" class="form-control" id="place_of_burial_or_cremation" name="place_of_burial_or_cremation" placeholder="Proposed Place of Burial, Cremation or Other">-->
                                                            <td class="formInput"><label class="radio-inline enable_disable">
                                                            <?php if($place_of_burial_or_cremation_1 == "ucc_private_plot") {
																	echo '<input type="radio" class="enable_disable" name="new_place_of_burial_or_cremation" id="new_place_of_burial_or_cremation"  value="ucc_private_plot" checked="checked"/>';
															}
																		else {
																	echo '<input type="radio" class="enable_disable" name="new_place_of_burial_or_cremation" id="new_place_of_burial_or_cremation"  value="ucc_private_plot"/>';
															}; ?>
																UCC Private Plot
															</label></td>
															<td class="formInput"><label class="radio-inline enable_disable">
                                                            <?php if($place_of_burial_or_cremation_1 == "private_family_interment") {
																	echo '<input type="radio" class="enable_disable" name="new_place_of_burial_or_cremation" id="new_place_of_burial_or_cremation"  value="private_family_interment" checked="checked"/>';
															}
																		else {
																	echo '<input type="radio" class="enable_disable" name="new_place_of_burial_or_cremation" id="new_place_of_burial_or_cremation"  value="private_family_interment"/>';
															}; ?>
																Private Family Interment
															</label></td>
                                                            <td class="formInput"><label class="radio-inline enable_disable">
                                                            <?php if($place_of_burial_or_cremation_1 == "cremation") {
																	echo '<input type="radio" class="enable_disable" name="new_place_of_burial_or_cremation" id="new_place_of_burial_or_cremation"  value="cremation" checked="checked"/>';
															}
																		else {
																	echo '<input type="radio" class="enable_disable" name="new_place_of_burial_or_cremation" id="new_place_of_burial_or_cremation"  value="cremation"/>';
															}; ?>
                                                            	Cremation
															</label></td>
                                                             </td>
		 												</tr>
                                                        </table>
                                                        <table class="centred_text add_patient_table" id="burial_additional_info">
                                                        	
                                                             <tr class="ucc_plot burial_additional_info_row">
                                                                <td class="formLabel" align="left"><label>Organise Coffin from Stores:</label></td>
                                                                
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($organise_coffin == "1") {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin" id="organise_coffin"  value="1" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin" id="organise_coffin"  value="1"/>';
                                                                    }; ?>
                                                                    Yes</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($organise_coffin == "0") {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin" id="organise_coffin"  value="0" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin" id="organise_coffin"  value="0"/>';
                                                                    }; ?>
                                                                    No</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="ucc_plot burial_additional_info_row">
                                                                <td class="formLabel" align="left"><label>Funeral Director:</label></td>
                                                                
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($funeral_director == "1") {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director" id="funeral_director"  value="1" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director" id="funeral_director"  value="1"/>';
                                                                    }; ?>
                                                                    Yes</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($funeral_director == "0") {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director" id="funeral_director"  value="0" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director" id="funeral_director"  value="0"/>';
                                                                    }; ?>
                                                                    No</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="ucc_plot burial_additional_info_row">
                                                                <td class="formLabel" align="left"><label>Grave Opened:</label></td>
                                                                
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($grave_opened == "1") {
                                                                    echo '<input type="radio" class="enable_disable" name="grave_opened" id="grave_opened"  value="1" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="grave_opened" id="grave_opened"  value="1"/>';
                                                                    }; ?>
                                                                    Yes</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($grave_opened == "0") {
                                                                    echo '<input type="radio" class="enable_disable" name="grave_opened" id="grave_opened"  value="0" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="grave_opened" id="grave_opened"  value="0"/>';
                                                                    }; ?>
                                                                    No</label>
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr class="private_family burial_additional_info_row">
															<td id="formLabel1" align="left" colspan="3" style="margin-top:2%"><label>Please specify the address of the <strong>Private Family Interment</strong>:</label></td>
                                                            <td></td>
                                                         </tr>
                                                          <tr class="private_family burial_additional_info_row">
                                                                <td class="formLabel" align="left"><label>Organise Coffin from Stores:</label></td>
                                                                
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($organise_coffin_priv_plot == "1") {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin_priv_plot" id="organise_coffin_priv_plot"  value="1" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin_priv_plot" id="organise_coffin_priv_plot"  value="1"/>';
                                                                    }; ?>
                                                                    Yes</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($organise_coffin_priv_plot == "0") {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin_priv_plot" id="organise_coffin_priv_plot"  value="0" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin_priv_plot" id="organise_coffin_priv_plot"  value="0"/>';
                                                                    }; ?>
                                                                    No</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="private_family burial_additional_info_row">
                                                                <td class="formLabel" align="left"><label>Funeral Director:</label></td>
                                                                
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($funeral_director_priv_plot == "1") {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director_priv_plot" id="funeral_director_priv_plot"  value="1" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director_priv_plot" id="funeral_director_priv_plot"  value="1"/>';
                                                                    }; ?>
                                                                    Yes</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($funeral_director_priv_plot == "0") {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director_priv_plot" id="funeral_director_priv_plot"  value="0" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director_priv_plot" id="funeral_director_priv_plot"  value="0"/>';
                                                                    }; ?>
                                                                    No</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="private_family burial_additional_info_row">
                                                                <td class="formLabel" align="left"><label>Grave Opened:</label></td>
                                                                
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($grave_opened_priv_plot == "1") {
                                                                    echo '<input type="radio" class="enable_disable" name="grave_opened_priv_plot" id="grave_opened_priv_plot"  value="1" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="grave_opened_priv_plot" id="grave_opened_priv_plot"  value="1"/>';
                                                                    }; ?>
                                                                    Yes</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($grave_opened_priv_plot == "0") {
                                                                    echo '<input type="radio" class="enable_disable" name="grave_opened_priv_plot" id="grave_opened_priv_plot"  value="0" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="grave_opened_priv_plot" id="grave_opened_priv_plot"  value="0"/>';
                                                                    }; ?>
                                                                    No</label>
                                                                </td>
                                                            </tr>
                                                            
                                                        <?php 
														echo '<tr class="private_family burial_additional_info_row">
															 <td class="formInput"><input type="text" class="form-control enable_disable" id="new_private_family_interment_address" name="new_private_family_interment_address" placeholder="' . $private_family_interment_address_hist_3 .'"></td>
														</tr>
                                                        <tr class="private_family burial_additional_info_row">
															 <td class="formInput"><input type="text" class="form-control enable_disable" id="new_private_family_interment_address_2" name="new_private_family_interment_address_2" placeholder="' . $private_family_interment_address_2_hist_3 .'"></td>
														</tr>
                                                        <tr class="private_family burial_additional_info_row">
															 <td class="formInput">
                                                              <select class="form-control enable_disable" id="new_private_family_interment_address_3" name="new_private_family_interment_address_3" placeholder="County">';
															  ?>
															  
																	  <?php if($private_family_interment_address_3_hist_3 == "antrim") { echo '<option value="antrim"  selected="selected">Antrim</option>'; } else { echo '<option value="antrim"  >Antrim</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "armagh") { echo '<option value="armagh"  selected="selected">Armagh</option>'; } else { echo '<option value="armagh"  >Armagh</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "carlow") { echo '<option value="carlow"  selected="selected">Carlow</option>'; } else { echo '<option value="carlow"  >Carlow</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "cavan") { echo '<option value="cavan"  selected="selected">Cavan</option>'; } else { echo '<option value="cavan"  >Cavan</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "clare") { echo '<option value="clare"  selected="selected">Clare</option>'; } else { echo '<option value="clare"  >Clare</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "cork") { echo '<option value="cork"  selected="selected">Cork</option>'; } else { echo '<option value="cork"  >Cork</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "derry") { echo '<option value="derry"  selected="selected">Derry</option>'; } else { echo '<option value="derry"  >Derry</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "donegal") { echo '<option value="donegal"  selected="selected">Donegal</option>'; } else { echo '<option value="donegal"  >Donegal</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "down") { echo '<option value="down"  selected="selected">Down</option>'; } else { echo '<option value="down"  >Down</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "dublin") { echo '<option value="dublin"  selected="selected">Dublin</option>'; } else { echo '<option value="dublin"  >Dublin</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "fermanagh") { echo '<option value="fermanagh"  selected="selected">Fermanagh</option>'; } else { echo '<option value="fermanagh"  >Fermanagh</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "galway") { echo '<option value="galway"  selected="selected">Galway</option>'; } else { echo '<option value="galway"  >Galway</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "kerry") { echo '<option value="kerry"  selected="selected">Kerry</option>'; } else { echo '<option value="kerry"  >Kerry</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "kildare") { echo '<option value="kildare"  selected="selected">Kildare</option>'; } else { echo '<option value="kildare"  >Kildare</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "kilkenny") { echo '<option value="kilkenny"  selected="selected">Kilkenny</option>'; } else { echo '<option value="kilkenny"  >Kilkenny</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "laois") { echo '<option value="laois"  selected="selected">Laois</option>'; } else { echo '<option value="laois"  >Laois</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "leitrim") { echo '<option value="leitrim"  selected="selected">Leitrim</option>'; } else { echo '<option value="leitrim"  >Leitrim</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "limerick") { echo '<option value="limerick"  selected="selected">Limerick</option>'; } else { echo '<option value="limerick"  >Limerick</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "longford") { echo '<option value="longford"  selected="selected">Longford</option>'; } else { echo '<option value="longford"  >Longford</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "louth") { echo '<option value="louth"  selected="selected">Louth</option>'; } else { echo '<option value="louth"  >Louth</option>';}?>
                                                                      <?php if($private_family_interment_address_3_hist_3 == "mayo") { echo '<option value="mayo"  selected="selected">Mayo</option>'; } else { echo '<option value="mayo"  >Mayo</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "meath") { echo '<option value="meath"  selected="selected">Meath</option>'; } else { echo '<option value="meath"  >Meath</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "monaghan") { echo '<option value="monaghan"  selected="selected">Monaghan</option>'; } else { echo '<option value="monaghan"  >Monaghan</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "offaly") { echo '<option value="offaly"  selected="selected">Offaly</option>'; } else { echo '<option value="offaly"  >Offaly</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "roscommon") { echo '<option value="roscommon"  selected="selected">Roscommon</option>'; } else { echo '<option value="roscommon"  >Roscommon</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "sligo") { echo '<option value="sligo"  selected="selected">Sligo</option>'; } else { echo '<option value="sligo"  >Sligo</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "tipperary") { echo '<option value="tipperary"  selected="selected">Tipperary</option>'; } else { echo '<option value="tipperary"  >Tipperary</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "tyrone") { echo '<option value="tyrone"  selected="selected">Tyrone</option>'; } else { echo '<option value="tyrone"  >Tyrone</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "waterford") { echo '<option value="waterford"  selected="selected">Waterford</option>'; } else { echo '<option value="waterford"  >Waterford</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "westmeath") { echo '<option value="westmeath"  selected="selected">Westmeath</option>'; } else { echo '<option value="westmeath"  >Westmeath</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "wexford") { echo '<option value="wexford"  selected="selected">Wexford</option>'; } else { echo '<option value="wexford"  >Wexford</option>';}?>
																	  <?php if($private_family_interment_address_3_hist_3 == "wicklow") { echo '<option value="wicklow"  selected="selected">Wicklow</option>'; } else { echo '<option value="wicklow"  >Wicklow</option>';}?>
                                                            <?php echo '             
                                                                    </select>
                                                                </td>
														</tr>';
														?>
                                                            
                                                            <tr class="cremation burial_additional_info_row">
                                                                <td class="formLabel" align="left"><label>Organise Coffin from Stores:</label></td>
                                                                
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($organise_coffin_cremation == "1") {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin_cremation" id="organise_coffin_cremation"  value="1" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin_cremation" id="organise_coffin_cremation"  value="1"/>';
                                                                    }; ?>
                                                                    Yes</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($organise_coffin_cremation == "0") {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin_cremation" id="organise_coffin_cremation"  value="0" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="organise_coffin_cremation" id="organise_coffin_cremation"  value="0"/>';
                                                                    }; ?>
                                                                    No</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="cremation burial_additional_info_row">
                                                                <td class="formLabel" align="left"><label>Funeral Director:</label></td>
                                                                
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($funeral_director_cremation == "1") {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director_cremation" id="funeral_director_cremation"  value="1" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director_cremation" id="funeral_director_cremation"  value="1"/>';
                                                                    }; ?>
                                                                    Yes</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($funeral_director_cremation == "0") {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director_cremation" id="funeral_director_cremation"  value="0" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="funeral_director_cremation" id="funeral_director_cremation"  value="0"/>';
                                                                    }; ?>
                                                                    No</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="cremation burial_additional_info_row">
                                                                <td class="formLabel" align="left"><label>Crematorium Booked:</label></td>
                                                                
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($crematorium_booked == "1") {
                                                                    echo '<input type="radio" class="enable_disable" name="crematorium_booked" id="crematorium_booked"  value="1" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="crematorium_booked" id="crematorium_booked"  value="1"/>';
                                                                    }; ?>
                                                                    Yes</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($crematorium_booked == "0") {
                                                                    echo '<input type="radio" class="enable_disable" name="crematorium_booked" id="crematorium_booked"  value="0" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="crematorium_booked" id="crematorium_booked"  value="0"/>';
                                                                    }; ?>
                                                                    No</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="cremation burial_additional_info_row">
                                                                <td class="formLabel" align="left"><label>Cremation Forms Completed, Scanned and Emailed:</label></td>
                                                                
                                                                <td class="formInput">
                                                                    <label class="radio-inline">
                                                                    <?php if($cremation_forms_complete == "1") {
                                                                    echo '<input type="radio" class="enable_disable" name="cremation_forms_complete" id="cremation_forms_complete"  value="1" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="cremation_forms_complete" id="cremation_forms_complete"  value="1"/>';
                                                                    }; ?>
                                                                    Yes</label> 
                                                                    <label class="radio-inline">
                                                                        <?php if($cremation_forms_complete == "0") {
                                                                    echo '<input type="radio" class="enable_disable" name="cremation_forms_complete" id="cremation_forms_complete"  value="0" checked="checked" disabled/>';
                                                                }
                                                                        else {
                                                                    echo '<input type="radio" class="enable_disable" name="cremation_forms_complete" id="cremation_forms_complete"  value="0"/>';
                                                                    }; ?>
                                                                    No</label>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                   
                                                        <table id="notesTable" class="centred_text">
                                                          <tr>
                                                              <td class="formLabel" align="left"><label id="notesLabel" for="notes">Notes:</label></td>
                                                              <td class="formInput"><textarea type="text" class="form-control enable_disable" id="new_notes" name="new_notes" style="resize: none"><?php echo $notes_hist_3 ?></textarea></td>
                                                          </tr>
                                                        </table>
                                                   </table>
                                                       
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell"><a href="donor_history_2_contact_details.php">	
																<button type="button" class="btn btn-lg btn-default form_1_button" value="page_1" id="first_visit_page_1_1"><i class="fa fa-arrow-left"></i> Contact Details</button></a>
														</td>
															<td class="buttons_table_cell">
																
															</td>
															<td class="buttons_table_cell"><a href="donor_history_4_medical_history.php"><button type="button" class="btn btn-lg btn-default form_1_button" value="page3" id="first_visit_page_3_1">Medical History <i class="fa fa-arrow-right"></i></button>
															</a></td>
														</tr>
													</table>
													<table id="save_cancel_table" class="buttons_table centred_text">
														<tr class="buttons_table_row">
															<td class="save_cancel_cell"><button type="button" class="btn btn-lg btn-danger save_cancel_btn" name="cancel_editing" id="cancel_editing" value="Cancel" onclick="refresh_page()">Cancel</button></td>
															<td class="space_cell"></td>
															<td class="save_cancel_cell"><input class="btn btn-lg btn-primary save_cancel_btn" type="submit" name="save_new_info_pg3" id="save_new_info_pg3" value="Save"/></td>
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

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
    <!-- Javascript for the datapicker http://jqueryui.com/datepicker/#dropdown-month-year -->
    <script type="text/javascript">

    // make all input boxes disabled on page load. Toggle enabled/disabled state when edit button is clicked
	$(document).ready(function() {
		
	$("#burial_additional_info").show();
	var place_of_burial_or_cremation = "<?php echo $place_of_burial_or_cremation_1; ?>";
	if(place_of_burial_or_cremation == "private_family_interment") {
		$(".private_family").show();
		$(".ucc_plot").hide();
		$(".cremation").hide();
	} else if(place_of_burial_or_cremation == "ucc_private_plot") {
		$(".ucc_plot").show();
		$(".private_family").hide();
		$(".cremation").hide();
	} else if(place_of_burial_or_cremation == "cremation") {
		$(".cremation").show();
		$(".ucc_plot").hide();
		$(".private_family").hide();
	} 		
		
	$(".enable_disable").prop('disabled', true);
	$('#cancel_editing').attr("disabled", true);
	$('#save_new_info_pg3').attr("disabled", true);
				
    $('#edit_button').click(function() {
			$('.enable_disable').each(function() {
				if ($(this).attr('disabled')) {
					$(this).removeAttr('disabled');
					$('#first_visit_page_1').attr("disabled", true);
					$('#first_visit_page_1_1').attr("disabled", true);
					$('#first_visit_page_3').attr("disabled", true);
					$('#first_visit_page_3_1').attr("disabled", true);
					$('#cancel_editing').attr("disabled", false);
					$('#save_new_info_pg3').attr("disabled", false);
				}
				else {
					$(this).attr({
						'disabled': 'disabled'
					});
					$('#first_visit_page_1').attr("disabled", false);
					$('#first_visit_page_1_1').attr("disabled", false);
					$('#first_visit_page_3').attr("disabled", false);
					$('#first_visit_page_3_1').attr("disabled", false);
					$('#cancel_editing').attr("disabled", true);
					$('#save_new_info_pg3').attr("disabled", true);
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
     var n1 = 1;
     $('#witness1Row').click(function(){
        	if(n1 == 0) {
        		$(".witness1Info").show();
				$(this).html('<td class="formLabel" align="middle" colspan=2><label id="witness1nameLabel" for="witness1name"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Witness 1</label></td>');
        		n1 = 1;
        	} else if(n1 == 1) {
        		$(".witness1Info").hide();
				$(this).html('<td class="formLabel" align="middle" colspan=2><label id="witness1nameLabel" for="witness1name"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span> Witness 1</label></td>');
        		n1 = 0;
        	}  	
        });
		
		// code for the show/hide table button
     var n2 = 1;
     $('#witness2Row').click(function(){
        	if(n2 == 0) {
        		$(".witness2Info").show();
				$(this).html('<td class="formLabel" align="middle" colspan=2><label id="witness2nameLabel" for="witness2name"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Witness 2</label></td>');
        		n2 = 1;
        	} else if(n2 == 1) {
        		$(".witness2Info").hide();
				 $(this).html('<td class="formLabel" align="middle" colspan=2><label id="witness2nameLabel" for="witness2name"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span> Witness 2</label></td>');
        		n2 = 0;
        	}  	
        });
		
	$(document).ready(function(){
	
		$("#new_private_interment_selected_1").hide();
		
		$('input[name="new_place_of_burial_or_cremation"]').click(function(){
			if($(this).attr("value")=="private_family_interment"){
				$("#new_private_interment_selected_1").show();
			}
			if($(this).attr("value") == "ucc_private_plot"){
				$("#new_private_interment_selected_1").hide();
			}
			if($(this).attr("value") == "cremation"){
				$("#new_private_interment_selected_1").hide();
			}
		});
	});
	
	//$('#new_place_of_burial_or_cremation').on('change', function() {
   		//alert($('input[name=radioName]:checked').val()); 
	//});
	$("input[name='new_place_of_burial_or_cremation']").click(function() {
		$("#burial_additional_info").show();
		
    	console.log(this.value);
		var which_radio_selected = this.value;
		if(which_radio_selected == "private_family_interment") {
			$(".private_family").show();
			$(".ucc_plot").hide();
			$(".cremation").hide();
		} else if(which_radio_selected == "ucc_private_plot") {
			$(".ucc_plot").show();
			$(".private_family").hide();
			$(".cremation").hide();
		} else if(which_radio_selected == "cremation") {
			$(".cremation").show();
			$(".ucc_plot").hide();
			$(".private_family").hide();
		}
	});
	
	function refresh_page() {
		window.location = "donor_history_3_burial_witness_info.php";
	}

	</script>
    

</body>

</html>