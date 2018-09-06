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
				
				$new_address_line_1 = $record['address_line_1'];
				$new_address_line_2 = $record['address_line_2'];
				$new_address_line_3 = $record['address_line_3'];
				$new_donor_phone_number = $record['donor_phone_number'];
				$new_donor_email_address = $record['donor_email_address'];
				$new_address_line_4 = $record['address_line_4'];
				$new_address_line_postcode_1= $record['address_line_postcode'];
				$new_first_name = ucwords($record['first_name']);
				$new_sur_name = ucwords($record['sur_name']);
				
		}

		if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['save_new_info_pg2']) {
						
						$new_address_line_1_new = $_POST['new_address_line_1'];
						$new_address_line_2_new = $_POST['new_address_line_2'];
						$new_address_line_3_new = $_POST['new_address_line_3'];
						$new_address_line_4_new = $_POST['new_address_line_4'];
						$new_donor_phone_number_new = $_POST['new_donor_phone_number'];
						$new_donor_email_address_new = $_POST['new_donor_email_address'];	
						$new_address_line_postcode_new = $_POST['address_line_postcode'];

						// update the correct row for the new patient info added on page 1 of the form with the new changes
						mysql_query("UPDATE donor_table SET address_line_1 = '$new_address_line_1_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");	
						mysql_query("UPDATE donor_table SET address_line_2 = '$new_address_line_2_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET address_line_3 = '$new_address_line_3_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET address_line_4 = '$new_address_line_4_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET address_line_postcode = '$new_address_line_postcode_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET donor_phone_number = '$new_donor_phone_number_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");
						mysql_query("UPDATE donor_table SET donor_email_address = '$new_donor_email_address_new' WHERE donor_reference_number = '$selected_donor_ref_hist'");

						header("Location: donor_history_2_contact_details.php");
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

    <title>Donor History - Contact Details</title>

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
		#generalInfoPic {
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
                                          <a href="donor_history_2_contact_details.php"><strong>Donor History: Contact Details - <?php echo $new_first_name; ?> <?php echo $new_sur_name; ?></strong></a>
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
											<img class="addPatBreadcrumb" id="examinationInfoPic" src="images/medical.png" />
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
															<td class="buttons_table_cell"><a href="donor_history_1_general_information.php">	
																<button type="button" class="btn btn-lg btn-default form_1_button" value="page_1" id="first_visit_page_1"><i class="fa fa-arrow-left"></i> General Information</button></a>
														</td>
															<td class="buttons_table_cell">
																<button type="button" class="btn btn-lg btn-success form_1_button" value="edit" id="edit_button"><i class="fa fa-pencil"></i> Edit</button>
															</td>
															<td class="buttons_table_cell"><a href="donor_history_3_burial_witness_info.php"><button type="button" class="btn btn-lg btn-default form_1_button" value="page3" id="first_visit_page_3">Burial & Witness Info <i class="fa fa-arrow-right"></i></button>
															</a></td>
														</tr>
													</table>
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                        <tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel" for="new_address_line_1">Address:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="new_address_line_1" name="new_address_line_1" value="<?php echo $new_address_line_1 ?>" required></td>
		 												</tr>
                                                         <tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel2" for="new_address_line_2"></label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="new_address_line_2" name="new_address_line_2" value="<?php echo $new_address_line_2 ?>" required></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel4" for="new_address_line_4"></label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="new_address_line_4" name="new_address_line_4" value="<?php echo $new_address_line_4 ?>"></td>
		 												</tr>
                                                         <tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel3" for="new_address_line_3"></label></td>
															<td class="formInput">
                                                            <input type="text" class="form-control enable_disable" id="address_line_postcode" name="address_line_postcode" value="<?php echo $new_address_line_postcode_1 ?>" style="float:left; width:50%">
                                                            <select class="form-control enable_disable" id="new_address_line_3" name="new_address_line_3" required style="float:left; width:50%">
																	  <?php if($new_address_line_3 == "antrim") { echo '<option value="antrim"  selected="selected">Antrim</option>'; } else { echo '<option value="antrim"  >Antrim</option>';}?>
																	  <?php if($new_address_line_3 == "armagh") { echo '<option value="armagh"  selected="selected">Armagh</option>'; } else { echo '<option value="armagh"  >Armagh</option>';}?>
																	  <?php if($new_address_line_3 == "carlow") { echo '<option value="carlow"  selected="selected">Carlow</option>'; } else { echo '<option value="carlow"  >Carlow</option>';}?>
																	  <?php if($new_address_line_3 == "cavan") { echo '<option value="cavan"  selected="selected">Cavan</option>'; } else { echo '<option value="cavan"  >Cavan</option>';}?>
																	  <?php if($new_address_line_3 == "clare") { echo '<option value="clare"  selected="selected">Clare</option>'; } else { echo '<option value="clare"  >Clare</option>';}?>
																	  <?php if($new_address_line_3 == "cork") { echo '<option value="cork"  selected="selected">Cork</option>'; } else { echo '<option value="cork"  >Cork</option>';}?>
																	  <?php if($new_address_line_3 == "derry") { echo '<option value="derry"  selected="selected">Derry</option>'; } else { echo '<option value="derry"  >Derry</option>';}?>
																	  <?php if($new_address_line_3 == "donegal") { echo '<option value="donegal"  selected="selected">Donegal</option>'; } else { echo '<option value="donegal"  >Donegal</option>';}?>
																	  <?php if($new_address_line_3 == "down") { echo '<option value="down"  selected="selected">Down</option>'; } else { echo '<option value="down"  >Down</option>';}?>
																	  <?php if($new_address_line_3 == "dublin") { echo '<option value="dublin"  selected="selected">Dublin</option>'; } else { echo '<option value="dublin"  >Dublin</option>';}?>
																	  <?php if($new_address_line_3 == "fermanagh") { echo '<option value="fermanagh"  selected="selected">Fermanagh</option>'; } else { echo '<option value="fermanagh"  >Fermanagh</option>';}?>
																	  <?php if($new_address_line_3 == "galway") { echo '<option value="galway"  selected="selected">Galway</option>'; } else { echo '<option value="galway"  >Galway</option>';}?>
																	  <?php if($new_address_line_3 == "kerry") { echo '<option value="kerry"  selected="selected">Kerry</option>'; } else { echo '<option value="kerry"  >Kerry</option>';}?>
																	  <?php if($new_address_line_3 == "kildare") { echo '<option value="kildare"  selected="selected">Kildare</option>'; } else { echo '<option value="kildare"  >Kildare</option>';}?>
																	  <?php if($new_address_line_3 == "kilkenny") { echo '<option value="kilkenny"  selected="selected">Kilkenny</option>'; } else { echo '<option value="kilkenny"  >Kilkenny</option>';}?>
																	  <?php if($new_address_line_3 == "laois") { echo '<option value="laois"  selected="selected">Laois</option>'; } else { echo '<option value="laois"  >Laois</option>';}?>
																	  <?php if($new_address_line_3 == "leitrim") { echo '<option value="leitrim"  selected="selected">Leitrim</option>'; } else { echo '<option value="leitrim"  >Leitrim</option>';}?>
																	  <?php if($new_address_line_3 == "limerick") { echo '<option value="limerick"  selected="selected">Limerick</option>'; } else { echo '<option value="limerick"  >Limerick</option>';}?>
																	  <?php if($new_address_line_3 == "longford") { echo '<option value="longford"  selected="selected">Longford</option>'; } else { echo '<option value="longford"  >Longford</option>';}?>
																	  <?php if($new_address_line_3 == "louth") { echo '<option value="louth"  selected="selected">Louth</option>'; } else { echo '<option value="louth"  >Louth</option>';}?>
                                                                      <?php if($new_address_line_3 == "mayo") { echo '<option value="mayo"  selected="selected">Mayo</option>'; } else { echo '<option value="mayo"  >Mayo</option>';}?>
																	  <?php if($new_address_line_3 == "meath") { echo '<option value="meath"  selected="selected">Meath</option>'; } else { echo '<option value="meath"  >Meath</option>';}?>
																	  <?php if($new_address_line_3 == "monaghan") { echo '<option value="monaghan"  selected="selected">Monaghan</option>'; } else { echo '<option value="monaghan"  >Monaghan</option>';}?>
																	  <?php if($new_address_line_3 == "offaly") { echo '<option value="offaly"  selected="selected">Offaly</option>'; } else { echo '<option value="offaly"  >Offaly</option>';}?>
																	  <?php if($new_address_line_3 == "roscommon") { echo '<option value="roscommon"  selected="selected">Roscommon</option>'; } else { echo '<option value="roscommon"  >Roscommon</option>';}?>
																	  <?php if($new_address_line_3 == "sligo") { echo '<option value="sligo"  selected="selected">Sligo</option>'; } else { echo '<option value="sligo"  >Sligo</option>';}?>
																	  <?php if($new_address_line_3 == "tipperary") { echo '<option value="tipperary"  selected="selected">Tipperary</option>'; } else { echo '<option value="tipperary"  >Tipperary</option>';}?>
																	  <?php if($new_address_line_3 == "tyrone") { echo '<option value="tyrone"  selected="selected">Tyrone</option>'; } else { echo '<option value="tyrone"  >Tyrone</option>';}?>
																	  <?php if($new_address_line_3 == "waterford") { echo '<option value="waterford"  selected="selected">Waterford</option>'; } else { echo '<option value="waterford"  >Waterford</option>';}?>
																	  <?php if($new_address_line_3 == "westmeath") { echo '<option value="westmeath"  selected="selected">Westmeath</option>'; } else { echo '<option value="westmeath"  >Westmeath</option>';}?>
																	  <?php if($new_address_line_3 == "wexford") { echo '<option value="wexford"  selected="selected">Wexford</option>'; } else { echo '<option value="wexford"  >Wexford</option>';}?>
																	  <?php if($new_address_line_3 == "wicklow") { echo '<option value="wicklow"  selected="selected">Wicklow</option>'; } else { echo '<option value="wicklow"  >Wicklow</option>';}?>
                                                                      
                                                                      </select>
                                                                      <!-- <input type="text" class="form-control" id="address_line_3" name="address_line_3" placeholder="< echo $address_line_3_1 ?>" disabled> --></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="phoneNumLabel" for="new_donor_phone_number">Phone Number:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="new_donor_phone_number" name="new_donor_phone_number" value="<?php echo $new_donor_phone_number ?>"></td>
		 												</tr>
		 												<tr>
															<td class="formLabel" align="left"><label id="emailAddLabel" for="new_donor_email_address">Email Address:</label></td>
															<td class="formInput"><input type="email" class="form-control enable_disable" id="new_donor_email_address" name="new_donor_email_address" value="<?php echo $new_donor_email_address ?>"></td>
		 												</tr>
													</table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell"><a href="donor_history_1_general_information.php">	
																<button type="button" class="btn btn-lg btn-default form_1_button" value="page_1" id="first_visit_page_1_1"><i class="fa fa-arrow-left"></i> General Information</button></a>
														</td>
															<td class="buttons_table_cell">
																
															</td>
															<td class="buttons_table_cell"><a href="donor_history_3_burial_witness_info.php"><button type="button" class="btn btn-lg btn-default form_1_button" value="page3" id="first_visit_page_3_1">Burial & Witness Info <i class="fa fa-arrow-right"></i></button>
															</a></td>
														</tr>
													</table>
													<table id="save_cancel_table" class="buttons_table centred_text">
														<tr class="buttons_table_row">
															<td class="save_cancel_cell"><button type="button" class="btn btn-lg btn-danger save_cancel_btn" name="cancel_editing" id="cancel_editing" value="Cancel" onclick="refresh_page()">Cancel</button></td>
															<td class="space_cell"></td>
															<td class="save_cancel_cell"><input class="btn btn-lg btn-primary save_cancel_btn" type="submit" name="save_new_info_pg2" id="save_new_info_pg2" value="Save"/></td>
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

    <script type="text/javascript">
        
    // make all input boxes disabled on page load. Toggle enabled/disabled state when edit button is clicked
	$(document).ready(function() {
	
	$(".enable_disable").prop('disabled', true);
	$('#cancel_editing').attr("disabled", true);
	$('#save_new_info_pg2').attr("disabled", true);
				
    $('#edit_button').click(function() {
			$('.enable_disable').each(function() {
				if ($(this).attr('disabled')) {
					$(this).removeAttr('disabled');
					$('#first_visit_page_1').attr("disabled", true);
					$('#first_visit_page_1_1').attr("disabled", true);
					$('#first_visit_page_3').attr("disabled", true);
					$('#first_visit_page_3_1').attr("disabled", true);
					$('#cancel_editing').attr("disabled", false);
					$('#save_new_info_pg2').attr("disabled", false);
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
					$('#save_new_info_pg2').attr("disabled", true);
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
	
	function refresh_page() {
		window.location = "donor_history_2_contact_details.php";
	}

	</script>
    

</body>

</html>