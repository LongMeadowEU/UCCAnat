<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in() !== true) {
	header("Location: index.php");
}

// to prevent user from proceeding to form page 2 without filling in Add A Patient Form page 1....etc.
if(form_page_1_completed() != true) {
	header("Location: add_donor_page1.php");
}

$donorIDsession = $_SESSION['donorIDsession'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add A Donor - Contact Details</title>

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
    	$show_form_2 = true;
    	
    	if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['submitContactDetails']) {
					$show_form_2 = false;
					
					// to prevent user from proceeding to form page 2 without filling in Add A Patient Form page 1....etc.
					$_SESSION['page2session'] = $_POST['donor_phone_number'];
					
					$address_line_1 = $_POST['address_line_1'];	
					$address_line_2 = $_POST['address_line_2'];	
					$address_line_3 = $_POST['address_line_3'];	
					$donor_phone_number = $_POST['donor_phone_number'];		   
					$donor_email_address = $_POST['donor_email_address'];
					$address_line_4 = $_POST['address_line_4'];
					$address_line_postcode = $_POST['address_line_postcode'];
					
				// add a date to date of death and receipt by default or else there's an error
				$new_date_of_death = date('Y-m-d');
				$new_date_of_receipt = date('Y-m-d');
				
				mysql_query("UPDATE donor_table SET date_of_death = '$new_date_of_death' WHERE donor_reference_number = '$donorIDsession'");
				mysql_query("UPDATE donor_table SET date_of_receipt = '$new_date_of_receipt' WHERE donor_reference_number = '$donorIDsession'");

					// update the correct row for the new patient info added on page 1 of the form with the new changes
					mysql_query("UPDATE donor_table SET address_line_1 = '$address_line_1' WHERE donor_reference_number = '$donorIDsession'");
					mysql_query("UPDATE donor_table SET address_line_2 = '$address_line_2' WHERE donor_reference_number = '$donorIDsession'");
					mysql_query("UPDATE donor_table SET address_line_3 = '$address_line_3' WHERE donor_reference_number = '$donorIDsession'");
					mysql_query("UPDATE donor_table SET address_line_4 = '$address_line_4' WHERE donor_reference_number = '$donorIDsession'");
					mysql_query("UPDATE donor_table SET address_line_postcode = '$address_line_postcode' WHERE donor_reference_number = '$donorIDsession'");
					mysql_query("UPDATE donor_table SET donor_phone_number = '$donor_phone_number' WHERE donor_reference_number = '$donorIDsession'");
					mysql_query("UPDATE donor_table SET donor_email_address = '$donor_email_address' WHERE donor_reference_number = '$donorIDsession'");
					
					$page2session = $_SESSION['page2session'];
							
			}
		}
		
?>
    
    <div id="wrapper">
	
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                                    
                       <div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">Add a Donor</h2>
                                  <ol class="breadcrumb">
                                      <li>
										<a href="dashboard.php">Home</a>
                                      </li>
                                      <li class="active">
                                          <a href="add_donor_page2.php"><strong>Add a Donor: Contact Details (Page 1 of 6)</strong></a>
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
											<img class="addPatBreadcrumb" id="successPic" src="images/success_icon.png" />
									<div>
										
									<div class="row">
									<?php 
										if($show_form_2 == true) {
									?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                        				<tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel" for="address_line_1">Address:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="address_line_1" name="address_line_1" placeholder="Address Line 1" required></td>
		 												</tr>
                                                         <tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel2" for="address_line_2"></label></td>
															<td class="formInput"><input type="text" class="form-control" id="address_line_2" name="address_line_2" placeholder="Address Line 2" required></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel2" for="address_line_4"></label></td>
															<td class="formInput"><input type="text" class="form-control" id="address_line_4" name="address_line_4" placeholder="Address Line 3"></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel3" for="address_line_3"></label></td>
															<td class="formInput">
                                                            	<input type="text" class="form-control" id="address_line_postcode" name="address_line_postcode" placeholder="Postcode" style="float:left; width:50%">
                                                                <select class="form-control" id="address_line_3" name="address_line_3" placeholder="County" style="float:right; width:50%" required>
                                                                          <option value="antrim">Antrim</option>
                                                                          <option value="armagh">Armagh</option>
                                                                          <option value="carlow">Carlow</option>
                                                                          <option value="cavan">Cavan</option>
                                                                          <option value="clare">Clare</option>
                                                                          <option value="cork">Cork</option>
                                                                          <option value="derry">Derry</option>
                                                                          <option value="donegal">Donegal</option>
                                                                          <option value="down">Down</option>
                                                                          <option value="dublin">Dublin</option>
                                                                          <option value="fermanagh">Fermanagh</option>
                                                                          <option value="galway">Galway</option>
                                                                          <option value="kerry">Kerry</option>
                                                                          <option value="kildare">Kildare</option>
                                                                          <option value="kilkenny">Kilkenny</option>
                                                                          <option value="laois">Laois</option>
                                                                          <option value="leitrim">Leitrim</option>
                                                                          <option value="limerick">Limerick</option>
                                                                          <option value="longford">Longford</option>
                                                                          <option value="louth">Louth</option>
                                                                          <option value="mayo">Mayo</option>
                                                                          <option value="meath">Meath</option>
                                                                          <option value="monaghan">Monaghan</option>
                                                                          <option value="offaly">Offaly</option>
                                                                          <option value="roscommon">Roscommon</option>
                                                                          <option value="sligo">Sligo</option>
                                                                          <option value="tipperary">Tipperary</option>
                                                                          <option value="tyrone">Tyrone</option>
                                                                          <option value="waterford">Waterford</option>
                                                                          <option value="westmeath">Westmeath</option>
                                                                          <option value="wexford">Wexford</option>
                                                                          <option value="wicklow">Wicklow</option>
                                                                    </select>
                                                            
                                                            
                                                            
                                                            <!--<input type="text" class="form-control" id="address_line_3" name="address_line_3" placeholder="County" required>-->
                                                            </td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="phoneNumLabel" for="donor_phone_number">Phone Number:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="donor_phone_number" name="donor_phone_number" placeholder="Phone Number"></td>
		 												</tr>
		 												<tr>
															<td class="formLabel" align="left"><label id="emailAddLabel" for="donor_email_address">Email Address:</label></td>
															<td class="formInput"><input type="email" class="form-control" id="donor_email_address" name="donor_email_address" placeholder="Email Address"></td>
		 												</tr>
														
													</table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitContactDetails" value="Save"/></td>
															<td class="buttons_table_cell pull-right"></td>
														</tr>
													</table>
                                        		</div>
                                        	</form>
                                        <?php
											}
										?>
                                <?php 
									if($show_form_2 == false) {
									
									$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
									$donorIDsession = $_SESSION['donorIDsession'];
									$result = mysql_query("SELECT * FROM donor_table WHERE donor_reference_number = $donorIDsession") or die($connect_error1);
												
									while($record = mysql_fetch_assoc($result)) {
										
										$address_line_1_1 = $record['address_line_1'];	
										$address_line_2_1 = $record['address_line_2'];	
										$address_line_3_1 = $record['address_line_3'];	
										$donor_phone_number_1 = $record['donor_phone_number'];		   
										$donor_email_address_1 = $record['donor_email_address'];
										$address_line_4_1 = $record['address_line_4'];
										$address_line_postcode_1 = $record['address_line_postcode'];

									}
		
								?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                    	<tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel" for="address_line_1">Address:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="address_line_1" name="address_line_1" placeholder="<?php echo $address_line_1_1 ?>" disabled></td>
		 												</tr>
                                                         <tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel2" for="address_line_2"></label></td>
															<td class="formInput"><input type="text" class="form-control" id="address_line_2" name="address_line_2" placeholder="<?php echo $address_line_2_1 ?>" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel4" for="address_line_4"></label></td>
															<td class="formInput"><input type="text" class="form-control" id="address_line_4" name="address_line_4" placeholder="<?php echo $address_line_4_1 ?>" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="donorAddressLabel3" for="address_line_3"></label></td>
															<td class="formInput">
                                                            <input type="text" class="form-control" id="address_line_postcode" name="address_line_postcode" placeholder="<?php echo $address_line_postcode_1 ?>" disabled style="float:left; width:50%">
                                                            <select class="form-control" id="address_line_3" name="address_line_3" disabled style="float:right; width:50%">
																	  <?php if($address_line_3_1 == "antrim") { echo '<option selected="selected">Antrim</option>'; } else { echo '<option >Antrim</option>';}?>
																	  <?php if($address_line_3_1 == "armagh") { echo '<option selected="selected">Armagh</option>'; } else { echo '<option >Armagh</option>';}?>
																	  <?php if($address_line_3_1 == "carlow") { echo '<option selected="selected">Carlow</option>'; } else { echo '<option >Carlow</option>';}?>
																	  <?php if($address_line_3_1 == "cavan") { echo '<option selected="selected">Cavan</option>'; } else { echo '<option >Cavan</option>';}?>
																	  <?php if($address_line_3_1 == "clare") { echo '<option selected="selected">Clare</option>'; } else { echo '<option >Clare</option>';}?>
																	  <?php if($address_line_3_1 == "cork") { echo '<option selected="selected">Cork</option>'; } else { echo '<option >Cork</option>';}?>
																	  <?php if($address_line_3_1 == "derry") { echo '<option selected="selected">Derry</option>'; } else { echo '<option >Derry</option>';}?>
																	  <?php if($address_line_3_1 == "donegal") { echo '<option selected="selected">Donegal</option>'; } else { echo '<option >Donegal</option>';}?>
																	  <?php if($address_line_3_1 == "down") { echo '<option selected="selected">Down</option>'; } else { echo '<option >Down</option>';}?>
																	  <?php if($address_line_3_1 == "dublin") { echo '<option selected="selected">Dublin</option>'; } else { echo '<option >Dublin</option>';}?>
																	  <?php if($address_line_3_1 == "fermanagh") { echo '<option selected="selected">Fermanagh</option>'; } else { echo '<option >Fermanagh</option>';}?>
																	  <?php if($address_line_3_1 == "galway") { echo '<option selected="selected">Galway</option>'; } else { echo '<option >Galway</option>';}?>
																	  <?php if($address_line_3_1 == "kerry") { echo '<option selected="selected">Kerry</option>'; } else { echo '<option >Kerry</option>';}?>
																	  <?php if($address_line_3_1 == "kildare") { echo '<option selected="selected">Kildare</option>'; } else { echo '<option >Kildare</option>';}?>
																	  <?php if($address_line_3_1 == "kilkenny") { echo '<option selected="selected">Kilkenny</option>'; } else { echo '<option >Kilkenny</option>';}?>
																	  <?php if($address_line_3_1 == "laois") { echo '<option selected="selected">Laois</option>'; } else { echo '<option >Laois</option>';}?>
																	  <?php if($address_line_3_1 == "leitrim") { echo '<option selected="selected">Leitrim</option>'; } else { echo '<option >Leitrim</option>';}?>
																	  <?php if($address_line_3_1 == "limerick") { echo '<option selected="selected">Limerick</option>'; } else { echo '<option >Limerick</option>';}?>
																	  <?php if($address_line_3_1 == "longford") { echo '<option selected="selected">Longford</option>'; } else { echo '<option >Longford</option>';}?>
																	  <?php if($address_line_3_1 == "louth") { echo '<option selected="selected">Louth</option>'; } else { echo '<option >Louth</option>';}?>
                                                                      <?php if($address_line_3_1 == "mayo") { echo '<option selected="selected">Mayo</option>'; } else { echo '<option >Mayo</option>';}?>
																	  <?php if($address_line_3_1 == "meath") { echo '<option selected="selected">Meath</option>'; } else { echo '<option >Meath</option>';}?>
																	  <?php if($address_line_3_1 == "monaghan") { echo '<option selected="selected">Monaghan</option>'; } else { echo '<option >Monaghan</option>';}?>
																	  <?php if($address_line_3_1 == "offaly") { echo '<option selected="selected">Offaly</option>'; } else { echo '<option >Offaly</option>';}?>
																	  <?php if($address_line_3_1 == "roscommon") { echo '<option selected="selected">Roscommon</option>'; } else { echo '<option >Roscommon</option>';}?>
																	  <?php if($address_line_3_1 == "sligo") { echo '<option selected="selected">Sligo</option>'; } else { echo '<option >Sligo</option>';}?>
																	  <?php if($address_line_3_1 == "tipperary") { echo '<option selected="selected">Tipperary</option>'; } else { echo '<option >Tipperary</option>';}?>
																	  <?php if($address_line_3_1 == "tyrone") { echo '<option selected="selected">Tyrone</option>'; } else { echo '<option >Tyrone</option>';}?>
																	  <?php if($address_line_3_1 == "waterford") { echo '<option selected="selected">Waterford</option>'; } else { echo '<option >Waterford</option>';}?>
																	  <?php if($address_line_3_1 == "westmeath") { echo '<option selected="selected">Westmeath</option>'; } else { echo '<option >Westmeath</option>';}?>
																	  <?php if($address_line_3_1 == "wexford") { echo '<option selected="selected">Wexford</option>'; } else { echo '<option >Wexford</option>';}?>
																	  <?php if($address_line_3_1 == "wicklow") { echo '<option selected="selected">Wicklow</option>'; } else { echo '<option >Wicklow</option>';}?>
                                                                      
                                                                      </select>
                                                                      <!-- <input type="text" class="form-control" id="address_line_3" name="address_line_3" placeholder="< echo $address_line_3_1 ?>" disabled> --></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="phoneNumLabel" for="donor_phone_number">Phone Number:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="donor_phone_number" name="donor_phone_number" placeholder="<?php echo $donor_phone_number_1 ?>" disabled></td>
		 												</tr>
		 												<tr>
															<td class="formLabel" align="left"><label id="emailAddLabel" for="donor_email_address">Email Address:</label></td>
															<td class="formInput"><input type="email" class="form-control" id="donor_email_address" name="donor_email_address" placeholder="<?php echo $donor_email_address_1 ?>" disabled></td>
		 												</tr>
                                        				
													</table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitContactDetails" value="Save" disabled/></td>
															<td class="buttons_table_cell pull-right"><a href="add_donor_page3.php">	
																<button type="button" class="btn btn-lg btn-success form_1_button" value="page2" id="goToPage2BT">Continue</button>
															</a></td>
														</tr>
													</table>
												</div>
                                        	</form>

											
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
    
    <!-- Javascript for the datapicker http://jqueryui.com/datepicker/#dropdown-month-year -->
    <script type="text/javascript">
        
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
			
	</script>
    

</body>

</html>
