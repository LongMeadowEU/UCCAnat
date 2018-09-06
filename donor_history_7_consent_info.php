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
				
				$consent_part_1_new = $record['consent_part_1'];
				$consent_part_1_3_years_options_new = $record['consent_part_1_3_years_options'];
				$consent_part_2_new = $record['consent_part_2'];
				$new_first_name = ucwords($record['first_name']);
				$new_sur_name = ucwords($record['sur_name']);
				$new_consent_withdrawn = $record['consent_withdrawn'];
				
				$date_withdrawal = $record['consent_withdrawl_date'];
				if($date_withdrawal == "0000-00-00") {
					$new_consent_withdrawl_date = "Enter date consent withdrawn";
				} else {
					$new_consent_withdrawl_date = date('d-m-Y', strtotime($date_withdrawal));
				}
				
				$new_written_confirmation_of_withdrawal = $record['written_confirmation_of_withdrawal'];
		}

		if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['save_new_info_pg_consent']) {
				
				$consent_part_1 = $_POST['consent_part_1'];
				if($consent_part_1 == "consent_retained_3_years") {
					$consent_part_1_3_years_options = $_POST['consent_retained_anat_exam'];
					mysql_query("UPDATE donor_table SET consent_part_1_3_years_options = '$consent_part_1_3_years_options' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				}
				
				$consent_part_2 = $_POST['consent_part_2'];
				$consent_withdrawn = $_POST['consent_withdrawn'];
				
				$var_date_new = $_POST['consent_withdrawl_date'];
				$consent_withdrawl_date = date('Y-m-d', strtotime($var_date_new));
				
				$written_confirmation_of_withdrawal = $_POST['written_confirmation_of_withdrawal'];	
				
				mysql_query("UPDATE donor_table SET consent_part_1 = '$consent_part_1' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				
				mysql_query("UPDATE donor_table SET consent_part_2 = '$consent_part_2' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET consent_withdrawn = '$consent_withdrawn' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET consent_withdrawl_date = '$consent_withdrawl_date' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				mysql_query("UPDATE donor_table SET written_confirmation_of_withdrawal = '$written_confirmation_of_withdrawal' WHERE donor_reference_number = '$selected_donor_ref_hist'");
				
				header("Location: donor_history_7_consent_info.php");
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

    <title>Donor History - Consent Information</title>

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
		#mortInfoPic {
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
                                  <h2 class="page-header" id="homepageHeader">Donor History: Consent Information</h2>
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
                                          <a href="donor_history_7_consent_info.php"><strong>Donor History: Consent Information - <?php echo $new_first_name; ?> <?php echo $new_sur_name; ?></strong></a>
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
															<td class="buttons_table_cell"><a href="donor_history_4_medical_history.php">	
																<button type="button" class="btn btn-lg btn-default form_1_button" value="page_4" id="first_visit_page_4"><i class="fa fa-arrow-left"></i> Medical History</button></a>
														</td>
															<td class="buttons_table_cell">
																<button type="button" class="btn btn-lg btn-success form_1_button" value="edit" id="edit_button"><i class="fa fa-pencil"></i> Edit</button>
															</td>
															<td class="buttons_table_cell"><a href="donor_history_5_donor_receipt_details"><button type="button" class="btn btn-lg btn-default form_1_button" value="page3" id="first_visit_page_5">Donor Receipt Details <i class="fa fa-arrow-right"></i></button>
															</a></td>
														</tr>
													</table>
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                        				
                                                   		<tr style="border:2px #1ab394 solid"> 
															<td class="formLabel" align="left"><label>Consent Part 1:</label></td>
															<td class="formInputConsent"  align="left">
                                                               <div class="radio">
                                                               <?php if($consent_part_1_new == "consent_permanently_retained") {
																   echo '
                                                              	<label><input class="enable_disable" type="radio" name="consent_part_1" value="consent_permanently_retained" checked="checked" disabled>I consent to my body or body parts being permanently preserved and retained.</label>
																';
															   } else {
																    echo '
                                                              	<label><input class="enable_disable" type="radio" name="consent_part_1" value="consent_permanently_retained" disabled>I consent to my body or body parts being permanently preserved and retained.</label>
																';
															   }
															   ?>
																   
                                                              </div>
                                                              <div class="radio">
                                                               <?php if($consent_part_1_new == "consent_retained_3_years") {
																   echo '
                                                              	<label><input class="enable_disable" type="radio" name="consent_part_1" value="consent_retained_3_years" checked="checked" disabled>My body can be retained up to 3 years and</label>';
															   } else {
															   	echo '
                                                              	<label><input class="enable_disable" type="radio" name="consent_part_1" value="consent_retained_3_years" disabled>My body can be retained up to 3 years and</label>';
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
                                                                    <input class="enable_disable" type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="1" checked="checked">Parts of my body may be retained upon conclusion of anatomical examination.
																	';
																} else {
																	echo '
                                                                    <input class="enable_disable" type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="1">Parts of my body may be retained upon conclusion of anatomical examination.
																	';
																}
																?>
                                                                </label> 
                                                                <label class="radio">
                                                                 <?php if($consent_part_1_3_years_options_new == "0") {
																	 echo '
                                                                    <input class="enable_disable" type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="0" checked="checked">No part of my body may be retained upon conclusion of anatomical examination.';
																 } else {
																	 echo '
                                                                    <input class="enable_disable" type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="0">No part of my body may be retained upon conclusion of anatomical examination.';
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
                                                              	<label><input class="enable_disable" type="radio" name="consent_part_2" value="consent_images_yes" checked="checked" disabled>I consent to the use of images derived from my unidentifiable body or body parts.</label>
																';
															   } else {
																    echo '
                                                              	<label><input class="enable_disable" type="radio" name="consent_part_2" value="consent_images_yes" disabled>I consent to the use of images derived from my unidentifiable body or body parts.</label>
																';
															   }
															   ?>
                                                              	<!-- <label><input type="radio" name="consent_part_2" id="consent_part_2" value="consent_images_yes" checked="checked" required>I consent to the use of images derived from my unidentifiable body or body parts.</label> -->
                                                              </div>
                                                              <div class="radio">
                                                               <?php if($consent_part_2_new == "consent_images_no") {
																   echo '
                                                              	<label><input class="enable_disable" type="radio" name="consent_part_2" id="consent_part_2" value="consent_images_no" checked="checked" disabled>I do not consent to the use of images of my body or body parts.</label>
																';
															   } else {
																   echo '
																   <label><input class="enable_disable" type="radio" name="consent_part_2" id="consent_part_2" value="consent_images_no" disabled>I do not consent to the use of images of my body or body parts.</label>
																';
															   }
															   ?>
                                                              </div>
                                                        </tr>
                                                         <tr>
                                                        	<td class="formLabel" align="left"></td>
                                                        	<td class="formInputConsent"  align="left"></td>
                                                        </tr>
                                                 </table>
                                                 <table style="border:2px #f69428 solid" id="consent_part_3_table" class="centred_text">
                                                 		<tr> 
															<td class="formLabel" align="left" ><label>Consent Part 3:</label></td>
															<td class="formInputConsent3"  align="left"></td>
                                                        </tr>
                                                        <tr> 
															<td class="formLabel" align="left" ><label>I withdraw consent:</label></td>
															<td class="formInputConsent3"  align="left">
                                                            <div style="margin-left: 20%; width: 50%">
                                                              <div class="radio">
                                                               <label class="radio-inline">
                                                                <?php if($new_consent_withdrawn == "1") {
																echo '<input type="radio" class="enable_disable" name="consent_withdrawn" id="consent_withdrawn"  value="1" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="consent_withdrawn" id="consent_withdrawn"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline" style="margin-left: 70%">
                                                                    <?php if($new_consent_withdrawn == "0") {
																echo '<input type="radio" class="enable_disable" name="consent_withdrawn" id="consent_withdrawn"  value="0" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="consent_withdrawn" id="consent_withdrawn"  value="0"/>';
																}; ?>
                                                                No</label>
                                                              </div>
                                                              </div>
                                                        </tr>
                                                        <tr>
                                                        <td class="formLabel" align="left"><label id="dobLabel" for="consent_withdrawl_date">Date Consent Withdrawn:
                                                            	<a data-toggle="popover" data-placement="right" title="Date of Birth" data-content="Insert the date on which the consent was withdrawn in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																	<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																</a>
                                                            </label>
                                                            </td>
																<td class="formInputConsent3"><div class="input-group date" id="consent_withdrawl_date_date_picker" style="margin-left: 20%; width: 50%">
																	<input type="text" class="form-control enable_disable" name="consent_withdrawl_date" id="consent_withdrawl_date" value="<?php echo $new_consent_withdrawl_date ?>" required/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
                                                        </tr>
                                                        <tr> 
															<td class="formLabel" align="left" ><label>Written Confirmation on File:</label></td>
															<td class="formInputConsent3"  align="left">
                                                            <div style="margin-left: 20%; width: 50%">
                                                              <div class="radio">
                                                               <label class="radio-inline">
                                                                <?php if($new_written_confirmation_of_withdrawal == "1") {
																echo '<input type="radio" class="enable_disable" name="written_confirmation_of_withdrawal" id="written_confirmation_of_withdrawal"  value="1" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="written_confirmation_of_withdrawal" id="written_confirmation_of_withdrawal"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline" style="margin-left: 70%">
                                                                    <?php if($new_written_confirmation_of_withdrawal == "0") {
																echo '<input type="radio" class="enable_disable" name="written_confirmation_of_withdrawal" id="written_confirmation_of_withdrawal"  value="0" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="written_confirmation_of_withdrawal" id="written_confirmation_of_withdrawal"  value="0"/>';
																}; ?>
                                                                No</label>
                                                              </div>
                                                              </div>
                                                        </tr>
                                               </table>
                                               <table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell"><a href="donor_history_4_medical_history.php">	
																<button type="button" class="btn btn-lg btn-default form_1_button" value="page_4" id="first_visit_page_4_1"><i class="fa fa-arrow-left"></i> Medical History</button></a>
														</td>
															<td class="buttons_table_cell">
																
															</td>
															<td class="buttons_table_cell"><a href="donor_history_5_donor_receipt_details"><button type="button" class="btn btn-lg btn-default form_1_button" value="page3" id="first_visit_page_5_1">Donor Receipt Details <i class="fa fa-arrow-right"></i></button>
															</a></td>
														</tr>
													</table>
													<table id="save_cancel_table" class="buttons_table centred_text">
														<tr class="buttons_table_row">
															<td class="save_cancel_cell"><button type="button" class="btn btn-lg btn-danger save_cancel_btn" name="cancel_editing" id="cancel_editing" value="Cancel" onclick="refresh_page()">Cancel</button></td>
															<td class="space_cell"></td>
															<td class="save_cancel_cell"><input class="btn btn-lg btn-primary save_cancel_btn" type="submit" name="save_new_info_pg_consent" id="save_new_info_pg_consent" value="Save"/></td>
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

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
      
    <script type="text/javascript">
        
    // make all input boxes disabled on page load. Toggle enabled/disabled state when edit button is clicked
	$(document).ready(function() {
	
	$(".enable_disable").prop('disabled', true);
	$('#cancel_editing').attr("disabled", true);
	$('#save_new_info_pg_consent').attr("disabled", true);
				
    $('#edit_button').click(function() {
			$('.enable_disable').each(function() {
				if ($(this).attr('disabled')) {
					$(this).removeAttr('disabled');
					$('#first_visit_page_4').attr("disabled", true);
					$('#first_visit_page_4_1').attr("disabled", true);
					$('#first_visit_page_5').attr("disabled", true);
					$('#first_visit_page_5_1').attr("disabled", true);
					$('#cancel_editing').attr("disabled", false);
					$('#save_new_info_pg_consent').attr("disabled", false);
				}
				else {
					$(this).attr({
						'disabled': 'disabled'
					});
					$('#first_visit_page_4').attr("disabled", false);
					$('#first_visit_page_4_1').attr("disabled", false);
					$('#first_visit_page_5').attr("disabled", false);
					$('#first_visit_page_5_1').attr("disabled", false);
					$('#cancel_editing').attr("disabled", true);
					$('#save_new_info_pg_consent').attr("disabled", true);
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

function refresh_page() {
	window.location = "donor_history_7_consent_info.php";
}
	// for the help popovers
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({
			html:true,
		}); 
	});

$(function() {
    $( "#consent_withdrawl_date" ).datepicker({
      changeMonth: true,
      changeYear: true, 
	  showButtonPanel: true, 
	  dateFormat: "dd-mm-yy", 
	  defaultDate:"Now", 
	  yearRange: "1920:Now"
    });
  });
	</script>
    

</body>

</html>