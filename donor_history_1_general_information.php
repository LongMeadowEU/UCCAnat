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
		$result = mysqli_query($db_connect,"SELECT * FROM donor_table WHERE donor_reference_number = $selected_donor_ref_hist") or die($connect_error1);
					
		while($record = mysqli_fetch_assoc($result)) {
				
				$new_donorRefNum = $record['donor_reference_number'];
				$new_first_name = ucwords($record['first_name']);
				$new_sur_name = ucwords($record['sur_name']);
				$date_of_birth = $record['date_of_birth'];
				$new_sex = $record['sex'];	
				$newRel = $record['religion'];
				$date_donation1 = $record['date_of_donation'];
				$civil_status_1 = $record['civil_status'];
				$other_religion = $record['other_religion'];
				
				// format the date to appear from database as day - month - year (DATABASE stores dates as Year - Month - Day)
				$var2 = $date_of_birth;
				$newDate2 = date('d-m-Y', strtotime($var2));
				
				$var_3 = $date_donation1;
				$newDate__date_donation1 = date('d-m-Y', strtotime($var_3));
				
				$signature_checked_new = $record['signature_present'];
		}

		if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['save_new_info']) {
						$var3 = $_POST['new_pat_dob'];
						$newDate3 = date('Y-m-d', strtotime($var3));
						
						$new_new_first_name = $_POST['new_first_name'];
						$new_new_sur_name = $_POST['new_sur_name'];
						$new_new_sex = $_POST['sex'];	
						$new_religion_1 = $_POST['new_religion'];
						$new_civil_status = $_POST['civil_status'];
						
						$signature_present_1 = $_POST['signature_present'];
						
						$var_don_date = $_POST['date_of_donation'];
						$date_of_donation = date('Y-m-d', strtotime($var_don_date));						

						// update the correct row for the new patient info added on page 1 of the form with the new changes
						mysqli_query($db_connect,"UPDATE donor_table SET first_name = '$new_new_first_name' WHERE donor_reference_number = '$selected_donor_ref_hist'");	
						mysqli_query($db_connect,"UPDATE donor_table SET sur_name = '$new_new_sur_name' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysqli_query($db_connect,"UPDATE donor_table SET sex = '$new_new_sex' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						if($new_religion_1 !== "other") {
							mysqli_query($db_connect,"UPDATE donor_table SET religion = '$new_religion_1' WHERE donor_reference_number = '$selected_donor_ref_hist'");
							mysqli_query($db_connect,"UPDATE donor_table SET other_religion = '' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						} else if($new_religion_1 == "other") {
							mysqli_query($db_connect,"UPDATE donor_table SET religion = '$new_religion_1' WHERE donor_reference_number = '$selected_donor_ref_hist'");
							if(!empty($_POST['other_religion'])) {
									
								$other_religion_1 = $_POST['other_religion'];
												   
			   					mysql_query("UPDATE donor_table SET other_religion = '$other_religion_1' WHERE donor_reference_number = '$selected_donor_ref_hist'");
							}
						}
						mysqli_query($db_connect,"UPDATE donor_table SET date_of_birth = '$newDate3' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysqli_query($db_connect,"UPDATE donor_table SET date_of_donation = '$date_of_donation' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysqli_query($db_connect,"UPDATE donor_table SET signature_present = '$signature_present_1' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysqli_query($db_connect,"UPDATE donor_table SET civil_status = '$new_civil_status' WHERE donor_reference_number = '$selected_donor_ref_hist'");

						header("Location: donor_history_1_general_information.php");
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

    <title>Donor History - General Information</title>

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
		#consentInfoPic {
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
		#mortInfoPic {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		.popover{
			width:250px;    
		}	
    </style>

</head>

<body  onload="checkExtraCells()">

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
                                  <h2 class="page-header" id="homepageHeader">Donor History: General Information</h2>
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
                                          <a href="donor_history_1_general_information.php"><strong>Donor History: General Information - <?php echo $new_first_name; ?> <?php echo $new_sur_name; ?></strong></a>
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
															<td class="buttons_table_cell"></td>
															<td class="buttons_table_cell">
																<button type="button" class="btn btn-lg btn-success form_1_button" value="edit" id="edit_button"><i class="fa fa-pencil"></i> Edit</button>
															</td>
															<td class="buttons_table_cell"><a href="donor_history_2_contact_details.php"><button type="button" class="btn btn-lg btn-default form_1_button" value="page2" id="first_visit_page_2">Contact Details <i class="fa fa-arrow-right"></i></button>
															</a></td>
														</tr>
													</table>
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                        				<tr>
															<td class="formLabel" align="left"><label id="donorRefNumLabel" for="new_donorRefNum">Reference Number:</label></td>
															<td class="formInput"><input type="number" class="form-control" id="new_donorRefNum" name="new_donorRefNum" placeholder="<?php echo $new_donorRefNum ?>" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label class="float-left" id="patFirstNameLabel" for="new_first_name">First Name:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="new_first_name" name="new_first_name" value="<?php echo $new_first_name ?>" required></td>
														</tr>
														<tr>
															<td class="formLabel" align="left"><label id="patSurNameLabel" for="new_sur_name">Surname:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="new_sur_name" name="new_sur_name" value="<?php echo $new_sur_name ?>" required></td>
														</tr>
														 <tr>
															<td class="formLabel" align="left"><label id="sexLabel" for="new_sex">Sex:</label></td>
															<!-- <td class="formInput"><input type="text" class="form-control" id="sex" name="sex" placeholder="< echo $sex_1 ?>" disabled></td>												-->
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($new_sex == "Male") {
																echo '<input type="radio" class="enable_disable" name="sex" id="sex"  value="Male" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="sex" id="sex"  value="Male" disabled/>';
																}; ?>
                                                                Male</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($new_sex == "Female") {
																echo '<input type="radio" class="enable_disable" name="sex" id="sex"  value="Female" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="sex" id="sex"  value="Female" disabled/>';
																}; ?>
                                                                Female</label>
                                                            </td>
		 												</tr>
		 												<tr>
															<td class="formLabel" align="left"><label id="dobLabel" for="new_pat_dob">Date of Birth:
                                                            	<a data-toggle="popover" data-placement="right" title="Date of Birth" data-content="Insert the DOB in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																	<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																</a>
                                                            </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepickerDOB">
																	<input type="text" class="form-control enable_disable" name="new_pat_dob" id="new_pat_dob" value="<?php echo $newDate2 ?>" required/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
														<tr>
															<td class="formLabel" align="left"><label id="religionLabel" for="new_religion">Religion:</label></td>
															<td class="formInput">
                                                            <select class="form-control enable_disable" id="new_religion" name="new_religion" required>
                                                                	<optgroup label="Christian">
                                                                           <?php if($newRel == "catholic") { echo '<option value="catholic" selected="selected">Roman Catholic</option>'; } else { echo '<option value="catholic">Roman Catholic</option>';}?>
                                                                          <?php if($newRel == "church_of_ireland") { echo '<option value="church_of_ireland" selected="selected">Church of Ireland</option>'; } else { echo '<option value="church_of_ireland">Church of Ireland</option>';}?>
                                                                          <?php if($newRel == "presbyterian") { echo '<option value="presbyterian" selected="selected">Presbyterian</option>'; } else { echo '<option value="presbyterian" >Presbyterian</option>';}?>
                                                                          <?php if($newRel == "orthodox") { echo '<option value="orthodox" selected="selected">Orthodox</option>'; } else { echo '<option value="orthodox" >Orthodox</option>';}?> 
                                                                     </optgroup>
                                                                     <optgroup label="Non-Religious">
                                                                     <?php if($newRel == "secular") { echo '<option value="secular" selected="selected">Secular</option>'; } else { echo '<option value="secular" >Secular</option>';}?> 
                                                                     <?php if($newRel == "athiest") { echo '<option value="athiest" selected="selected">Athiest</option>'; } else { echo '<option value="athiest" >Athiest</option>';}?> 
                                                                     <?php if($newRel == "agnostic") { echo '<option value="agnostic" selected="selected">Agnostic</option>'; } else { echo '<option value="agnostic" >Agnostic</option>';}?> 
                                                                    <?php if($newRel == "humanist") { echo '<option value="humanist" selected="selected">Humanist</option>'; } else { echo '<option value="humanist">Humanist</option>';}?> 
                                                                     <option value="humanist">Humanist</option>
                                                                     </optgroup>
                                                                    <optgroup label="Other">
                                                                     	   <?php if($newRel == "african_traditional_and_diasporic") { echo '<option value="african_traditional_and_diasporic" selected="selected">African Traditional and Diasporic</option>'; } else { echo '<option value="african_traditional_and_diasporic">African Traditional and Diasporic</option>';}?> 
                                                                            <?php if($newRel == "bahai") { echo '<option selected="selected" value="bahai">Bahai</option>'; } else { echo '<option value="bahai">Bahai</option>';}?> 
                                                                             <?php if($newRel == "baptist") { echo '<option value="baptist" selected="selected">Baptist</option>'; } else { echo '<option value="baptist">Baptist</option>';}?> 
                                                                              <?php if($newRel == "buddhist") { echo '<option value="buddhist" selected="selected">Buddhist</option>'; } else { echo '<option value="buddhist">Buddhist</option>';}?> 
                                                                               <?php if($newRel == "chinese_traditional_religion") { echo '<option value="chinese_traditional_religion" selected="selected">Chinese Traditional Religion</option>'; } else { echo '<option value="chinese_traditional_religion">Chinese Traditional Religion</option>';}?> 
                                                                                <?php if($newRel == "christian_science") { echo '<option value="christian_science"  selected="selected">Christian Science</option>'; } else { echo '<option value="christian_science">Christian Science</option>';}?> 
                                                                                <?php if($newRel == "hindu") { echo '<option value="hindu" selected="selected">Hindu</option>'; } else { echo '<option value="hindu">Hindu</option>';}?> 
                                                                                <?php if($newRel == "ismlam_sunni") { echo '<option value="ismlam_sunni" selected="selected">Islam - Sunni</option>'; } else { echo '<option value="ismlam_sunni">Islam - Sunni</option>';}?> 
                                                                                <?php if($newRel == "ismlam_sufism") { echo '<option value="ismlam_sufism" selected="selected">Islam - Sufism</option>'; } else { echo '<option value="ismlam_sufism">Islam - Sufism</option>';}?> 
                                                                                <?php if($newRel == "ismlam_shia") { echo '<option selected="selected" value="ismlam_shia">Islam - Shia</option>'; } else { echo '<option value="ismlam_shia">Islam - Shia</option>';}?> 
                                                                                <?php if($newRel == "jain") { echo '<option value="jain" selected="selected">Jain</option>'; } else { echo '<option value="jain">Jain</option>';}?> 
                                                                                <?php if($newRel == "jehovah_witness") { echo '<option value="jehovah_witness" selected="selected">Jehovah\'s Witness</option>'; } else { echo '<option value="jehovah_witness">Jehovah\'s Witness</option>';}?> 
                                                                                <?php if($newRel == "jewish") { echo '<option selected="selected" value="jewish">Jewish</option>'; } else { echo '<option value="jewish">Jewish</option>';}?> 
                                                                                <?php if($newRel == "methodist") { echo '<option selected="selected" value="methodist">Methodist</option>'; } else { echo '<option value="methodist">Methodist</option>';}?> 
                                                                          
                                                                          <?php if($newRel == "other") { echo '<option value="other" selected="selected">Other</option>'; } else { echo '<option value="other">Other</option>';}?> 
                                                                          <?php if($newRel == "primal_indigenous") { echo '<option value="primal_indigenous" selected="selected">Primal-Indigenous</option>'; } else { echo '<option value="primal_indigenous">Primal-Indigenous</option>';}?> 
                                                                          <?php if($newRel == "unknown") { echo '<option value="unknown" selected="selected">Unknown</option>'; } else { echo '<option value="unknown" >Unknown</option>';}?> 
                                                                          <?php if($newRel == "quaker") { echo '<option value="quaker" selected="selected">Quaker</option>'; } else { echo '<option value="quaker">Quaker</option>';}?> 
                                                                          <?php if($newRel == "shinto") { echo '<option value="shinto" selected="selected">Shinto</option>'; } else { echo '<option value="shinto">Shinto</option>';}?> 
                                                                           <?php if($newRel == "sikh") { echo '<option value="sikh" selected="selected">Sikh</option>'; } else { echo '<option value="sikh">Sikh</option>';}?> 
                                                                            <?php if($newRel == "unitarian") { echo '<option value="unitarian" selected="selected">Unitarian</option>'; } else { echo '<option value="unitarian">Unitarian</option>';}?> 
                                                              
                                                                     </optgroup>
                                                                  </select>
                                                                  
                                                                  </td>
		 												</tr>
                                                         <?php if($other_religion != "") { echo '
														 <tr id="if_other_religion">
															<td class="formLabel" align="left"><label class="float-left" id="other_religionLabel" for="other_religion" >Other Religion:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="other_religion" name="other_religion" value="'.$other_religion .'"></td>
														</tr>
														';
														 } else {
															 echo '
															  <tr id="if_other_religion">
															<td class="formLabel" align="left"><label class="float-left" id="other_religionLabel" for="other_religion">Other Religion:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="other_religion" name="other_religion"></td>
														</tr>
															 ';
														 }
														?>
                                                        <tr>
															<td class="formLabel" align="left"><label id="civil_status_Label" for="civil_status">Civil Status:</label></td>
															<td class="formInput">
                                                             	<select class="form-control enable_disable" id="civil_status" name="civil_status" placeholder="Select Civil Status" required>
                                                                    <option value="never_married">Never Married</option>
                                                                         
                                                                           <?php if($civil_status_1 == "never_married") { echo '<option selected="selected" value="never_married">Never Married</option>'; } else { echo '<option value="never_married">Never Married</option>';}?>
                                                                          <?php if($civil_status_1 == "married") { echo '<option selected="selected" value="married">Married</option>'; } else { echo '<option value="married">Married</option>';}?>
                                                                          <?php if($civil_status_1 == "widowed") { echo '<option selected="selected" value="widowed">Widowed</option>'; } else { echo '<option  value="widowed" >Widowed</option>';}?>
                                                                          <?php if($civil_status_1 == "divorced") { echo '<option selected="selected" value="divorced">Divorced</option>'; } else { echo '<option value="divorced">Divorced</option>';}?> 
                                                                   <?php if($civil_status_1 == "unknown") { echo '<option selected="selected" value="unknown">Unknown</option>'; } else { echo '<option value="unknown">Unknown</option>';}?> 
                                                                     </select>
                                                                  
                                                                  </td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left">
                                                            	<label id="dobLabel" for="date_of_donation">Date of Donation:
                                                                		<a data-toggle="popover" data-placement="right" title="Date of Donation" data-content="Insert the date of donation in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-2015.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepicker_donation">
																	<input type="text" class="form-control enable_disable" name="date_of_donation" id="date_of_donation" value="<?php echo $newDate__date_donation1 ?>" disabled>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="sexLabel" for="signature_present">Signature Present:</label></td>
															<!-- <td class="formInput"><input type="text" class="form-control" id="sex" name="sex" placeholder="< echo $sex_1 ?>" disabled></td>												-->
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($signature_checked_new == "1") {
																echo '<input type="radio" class="enable_disable" name="signature_present" id="signature_present"  value="1" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_present" id="signature_present"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($signature_checked_new == "0") {
																echo '<input type="radio" class="enable_disable" name="signature_present" id="signature_present"  value="0" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_present" id="signature_present"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
													</table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell"></td>
															<td class="buttons_table_cell">
																
															</td>
															<td class="buttons_table_cell"><a href="donor_history_2_contact_details.php"><button type="button" class="btn btn-lg btn-default form_1_button" value="page2" id="first_visit_page_2_1">Contact Details <i class="fa fa-arrow-right"></i></button>
															</a></td>
														</tr>
													</table>
													<table id="save_cancel_table" class="buttons_table centred_text">
														<tr class="buttons_table_row">
															<td class="save_cancel_cell"><button type="button" class="btn btn-lg btn-danger save_cancel_btn" name="cancel_editing" id="cancel_editing" value="Cancel" onclick="refresh_page()">Cancel</button></td>
															<td class="space_cell"></td>
															<td class="save_cancel_cell"><input class="btn btn-lg btn-primary save_cancel_btn" type="submit" name="save_new_info" id="save_new_info" value="Save"/></td>
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
    
    <!-- Bootstrap datepicker JavaScript-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    
    <!-- Javascript for the datapicker http://jqueryui.com/datepicker/#dropdown-month-year -->
    <script type="text/javascript">
    
       $(function () {
            $('#datepickerDOB').datepicker({
            	format: "dd-mm-yyyy", 
      			clearBtn: true, 
      			changeMonth: true,
      			changeYear: true
            });
        });
        
    // make all input boxes disabled on page load. Toggle enabled/disabled state when edit button is clicked
	$(document).ready(function() {
	
	$(".enable_disable").prop('disabled', true);
	$('#cancel_editing').attr("disabled", true);
	$('#save_new_info').attr("disabled", true);
				
    $('#edit_button').click(function() {
			$('.enable_disable').each(function() {
				if ($(this).attr('disabled')) {
					$(this).removeAttr('disabled');
					$('#first_visit_page_2').attr("disabled", true);
					$('#first_visit_page_2_1').attr("disabled", true);
					$('#cancel_editing').attr("disabled", false);
					$('#save_new_info').attr("disabled", false);
				}
				else {
					$(this).attr({
						'disabled': 'disabled'
					});
					$('#first_visit_page_2').attr("disabled", false);
					$('#first_visit_page_2_1').attr("disabled", false);
					$('#cancel_editing').attr("disabled", true);
					$('#save_new_info').attr("disabled", true);
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

	$(function () {
            $('#datepicker_donation').datepicker({
            	format: "dd-mm-yyyy", 
      			clearBtn: true, 
      			changeMonth: true,
      			changeYear: true
            });
        });
		
	function refresh_page() {
		window.location = "donor_history_1_general_information.php";
	}
	
	function checkExtraCells() {
		var is_genus_empty = "<?php echo $other_religion; ?>";
		if(is_genus_empty == "") {
			$('#if_other_religion').hide();
		} else if(is_genus_empty !== ""){
			$('#if_other_religion').show();
		}
	}
	
	$(document).ready(function(){
		
		$('#new_religion').on('change', function() {
  			//alert( this.value ); // or $(this).val()

			if(this.value == "other"){
				//alert( this.value );
				$('#if_other_religion').show();
			} else if(this.value !== "other") {
				$('#if_other_religion').hide();
			}
		});
	});
	</script>
    

</body>

</html>