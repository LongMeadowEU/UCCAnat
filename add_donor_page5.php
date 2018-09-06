<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in() !== true) {
	header("Location: index.php");
} 

$donorIDsession = $_SESSION['donorIDsession'];

// to prevent user from proceeding to form page 2 without filling in Add A Patient Form page 1....etc.
if(form_page_4_completed() != true) {
	header("Location: add_donor_page4.php");
}

$page4session = $_SESSION['page4session'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add A Donor - Consent Types</title>

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
		#generalInfoPic {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		#successPic {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		#qualOfLifeSurvey {
			-webkit-filter: grayscale(100%); filter: grayscale(100%); 
		}
		#examinationInfoPic {
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
    	$show_form_5 = true;
		$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
		$donorIDsession = $_SESSION['donorIDsession'];
		$result = mysql_query("SELECT * FROM donor_table WHERE donor_reference_number = $donorIDsession") or die($connect_error1);
    	
    	if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['consent_part_1']) {
				
				$_SESSION['page5session'] = $_POST['consent_part_1'];
				
				$consent_part_1 = $_POST['consent_part_1'];
				if($consent_part_1 == "consent_retained_3_years") {
					$consent_part_1_3_years_options = $_POST['consent_retained_anat_exam'];
					mysql_query("UPDATE donor_table SET consent_part_1_3_years_options = '$consent_part_1_3_years_options' WHERE donor_reference_number = '$donorIDsession'");
				}
				
				$consent_part_2 = $_POST['consent_part_2'];
				
				mysql_query("UPDATE donor_table SET consent_part_1 = '$consent_part_1' WHERE donor_reference_number = '$donorIDsession'");
				
				mysql_query("UPDATE donor_table SET consent_part_2 = '$consent_part_2' WHERE donor_reference_number = '$donorIDsession'");
				
				$page5session = $_SESSION['page5session'];
					
				$show_form_5 = false;		
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
                                          <a href="add_donor_page4.php"><strong>Add a Donor: Consent Types (Page 5 of 6)</strong></a>
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
											<img class="addPatBreadcrumb" id="successPic" src="images/success_icon.png" />
									<div>
										
									<div class="row">
									<?php 
										if($show_form_5 == true) {
									?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                    	
                                                   		<tr style="border:2px #1ab394 solid"> 
															<td class="formLabel" align="left"><label>Consent Part 1:</label></td>
															<td class="formInputConsent"  align="left">
                                                               <div class="radio">
                                                              	<label><input type="radio" name="consent_part_1" id="consent_part_1" value="consent_permanently_retained" checked="checked" required>I consent to my body or body parts being permanently preserved and retained.</label>
                                                              </div>
                                                              <div class="radio">
                                                              	<label><input type="radio" name="consent_part_1" id="consent_part_1" value="consent_retained_3_years">My body can be retained up to 3 years and</label>
                                                              </div>
                                                            </td>
		 												</tr> 
                                                        <tr>
                                                        	<td class="formLabel" align="left"></td>
                                                        	<td class="formInputConsent"  align="left"></td>
                                                        </tr>
                                                        <tr id="consent_retained_3_years_checked" style="border:2px #1ab394 solid">
                                                        	<td class="formLabel" align="left"></td>
                                                        	<td class="formInputConsent"  align="left">
                                                            	<label class="radio">
                                                                    <input type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="1">Parts of my body may be retained upon conclusion of anatomical examination.
                                                                </label> 
                                                                <label class="radio">
                                                                    <input type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="0" >No part of my body may be retained upon conclusion of anatomical examination.
                                                                </label>
                                                              <!-- <div class="checkbox">
                                                                <label><input type="checkbox" name="consent_retained_anat_exam_yes" value="consent_retained_anat_exam_yes">Parts of my body may be retained upon conclusion of anatomical examination.</label>
                                                              </div>
                                                              <div class="checkbox">
                                                                <label><input type="checkbox" name="consent_retained_anat_exam_no" value="consent_retained_anat_exam_no">No part of my body may be retained upon conclusion of anatomical examination.</label>
                                                             </div> -->
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
                                                              	<label><input type="radio" name="consent_part_2" id="consent_part_2" value="consent_images_yes" checked="checked" required>I consent to the use of images derived from my unidentifiable body or body parts.</label>
                                                              </div>
                                                              <div class="radio">
                                                              	<label><input type="radio" name="consent_part_2" id="consent_part_2" value="consent_images_no">I do not consent to the use of images of my body or body parts.</label>
                                                              </div>
                                                            </td>
		 												</tr> 
                                                        
                                                     </table>
                                       	
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitConsentInfo" value="Save"/></td>
															<td class="buttons_table_cell pull-right"></td>
														</tr>
													</table>
                                        		</div>
                                        	</form>
                                        <?php
											}
										?>
                                <?php 
									if($show_form_5 == false) {
									
									$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
									$donorIDsession = $_SESSION['donorIDsession'];
									$result = mysql_query("SELECT * FROM donor_table WHERE donor_reference_number = $donorIDsession") or die($connect_error1);
											
									while($record = mysql_fetch_assoc($result)) {
										
										$consent_part_1_new = $record['consent_part_1'];
										$consent_part_1_3_years_options_new = $record['consent_part_1_3_years_options'];
										$consent_part_2_new = $record['consent_part_2'];

									}	
								?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
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
                                                        <?php if($consent_part_1_new == "consent_retained_3_years") {
															echo '
                                                        <tr id="consent_retained_3_years_checked." style="border:2px #1ab394 solid">
                                                        	<td class="formLabel" align="left"></td>
                                                        	<td class="formInputConsent"  align="left">
															';
														?>
                                                            	<label class="radio">
                                                                <?php if($consent_part_1_3_years_options_new == "1") {
																	echo '
                                                                    <input type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="1" checked="checked" disabled>Parts of my body may be retained upon conclusion of anatomical examination.
																	';
																} else {
																	echo '
                                                                    <input type="radio" name="consent_retained_anat_exam" id="consent_retained_anat_exam" value="1" disabled>Parts of my body may be retained upon conclusion of anatomical examination.
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
                                                        <?php
														}
														?>
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
                                                              	<!-- <label><input type="radio" name="consent_part_2" id="consent_part_2" value="consent_images_yes" checked="checked" required>I consent to the use of images derived from my unidentifiable body or body parts.</label> -->
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
                                                            </td>
		 												</tr> 	
                                                     </table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitConsentInfo" value="Save" disabled/></td>
															<td class="buttons_table_cell pull-right"><a href="add_donor_page6.php">	
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
     <!-- <script src="bower_components/jquery/dist/jquery.ui.1.11.4.js"></script> for the JQuery DatePicker -->

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

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
	
	$(document).ready(function(){
	
		$("#consent_retained_3_years_checked").hide();
		
		$('input[name="consent_part_1"]').click(function(){
			if($(this).attr("value")=="consent_retained_3_years"){
				$("#consent_retained_3_years_checked").show();
			}
			if($(this).attr("value") == "consent_permanently_retained"){
				$("#consent_retained_3_years_checked").hide();
			}
			
		});
	});
		
	</script>
    

</body>

</html>
