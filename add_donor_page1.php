<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in() !== true) {
	header("Location: index.php");
} 
$auto_ref_num_first = 6000;
$result_auto_ref = mysql_query("SELECT donor_reference_number FROM donor_table") or die($connect_error1);
//echo $result_auto_ref;
$array1 = array();
										
while($record = mysql_fetch_assoc($result_auto_ref)) {
	$a = $record['donor_reference_number'];
	$array1 = array_merge($array1, array_map('trim', explode(",", $record['donor_reference_number'])));
}
//echo $array1;
//var_dump($array1);
$maxValue = max($array1);
//echo "MAX ARRAY NUMBER = " . $maxValue;
if($maxValue < 6000) {
	$auto_ref_num = 6000;
} else {
	$auto_ref_num = $maxValue + 1; 
}
?>
<!DOCTYPE html>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add A Donor - General Information</title>

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
    	$show_form = true;

		
    	
    	if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['submitGenInfo']) {
					if(empty($_POST['donor_reference_num']) === false) {
							$show_form = false;
							
							$_SESSION['donorIDsession'] = $_POST['donor_reference_num'];
							$var = $_POST['donorDOB'];
							$newDate = date('Y-m-d', strtotime($var));
							
							$var_don_date = $_POST['date_of_donation'];
							$date_of_donation = date('Y-m-d', strtotime($var_don_date));
							
							// create an associative array to hold the user to register's data
							$donor_info_data = array(
												   'donor_reference_number' 	=> 	$_POST['donor_reference_num'],
												   'first_name' 				=> 	$_POST['firstName'],
												   'sur_name' 					=> 	$_POST['surName'],
												   'date_of_birth'				=> 	$newDate,
												   'sex' 						=> 	$_POST['sex'], 
												   'religion' 					=> 	$_POST['religion'],
												   'date_of_donation'			=> 	$date_of_donation, 
												   'signature_present'			=> 	$_POST['signature_present'],
												   'civil_status'				=>	$_POST['civil_status']
												   );
							$donorIDsession = $_POST['donor_reference_num'];
				
							add_a_donor($donor_info_data);
							
							$donorIDsession = $_SESSION['donorIDsession'];
							
							if(!empty($_POST['other_religion'])) {
									
								$other_religion_1 = $_POST['other_religion'];
												   
			   					mysql_query("UPDATE donor_table SET other_religion = '$other_religion_1' WHERE donor_reference_number = '$donorIDsession'");
							}
							
					}
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
                                          <a href="add_donor_page1.php"><strong>Add a Donor: General Information (Page 1 of 6)</strong></a>
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
										if($show_form == true) {
									?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                   		<tr>
															<td class="formLabel" align="left"><label id="donorRefNumLabel" for="donorRefNum">Reference Number:</label></td>
															<td class="formInput"><input type="number" class="form-control" id="donor_reference_num" name="donor_reference_num" value="<?php echo $auto_ref_num ?>" min="1" required readonly></td>
		 												</tr>
                                        				<tr>
															<td class="formLabel" align="left"><label class="float-left" id="donorFirstNameLabel" for="firstName">First Name:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required></td>
														</tr>
														<tr>
															<td class="formLabel" align="left"><label id="donorSurNameLabel" for="surName">Surname:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="surName" name="surName" placeholder="Surname" required></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="sexLabel" for="sex">Sex:</label></td>
															<td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="sex" id="sex" value="Male" checked="checked" required>Male
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="sex" id="sex" value="Female">Female
                                                                </label>
                                                            </td>
                                                            
                                                            
                                                           <!-- <td class="formInput"><input type="text" class="form-control" id="sex" name="sex" placeholder="Sex" required></td> -->
		 												</tr>
		 												<tr>
															<td class="formLabel" align="left">
                                                            	<label id="dobLabel" for="donorDOB">Date of Birth:
                                                                		<a data-toggle="popover" data-placement="right" title="Date of Birth" data-content="Insert the DOB in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepickerDOB">
																	<input type="text" class="form-control" name="donorDOB" id="donorDOB" placeholder="Date of Birth" required/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="religionLabel" for="religion">Religion:</label></td>
															<td class="formInput">
                                                             	<select class="form-control" id="religion" name="religion" placeholder="Select Religion" required>
                                                                	<optgroup label="Christian">
                                                                          <option value="catholic">Roman Catholic</option>
                                                                          <option value="church_of_ireland">Church of Ireland</option>
                                                                           <option value="presbyterian">Presbyterian</option>
                                                                          <option value="orthodox">Orthodox</option>
                                                                     </optgroup>
                                                                     <optgroup label="Non-Religious">
                                                                          <option value="secular">Secular</option>
                                                                          <option value="athiest">Athiest</option>
                                                                          <option value="agnostic">Agnostic</option>
                                                                          <option value="humanist">Humanist</option>
                                                                     </optgroup>
                                                                     <optgroup label="Other">
                                                                     	  <option value="african_traditional_and_diasporic">African Traditional and Diasporic</option>
                                                                          <option value="bahai">Bahai</option>
                                                                          <option value="baptist">Baptist</option>
                                                                          <option value="buddhist">Buddhist</option>
                                                                          <option value="chinese_traditional_religion">Chinese Traditional Religion</option>
                                                                          <option value="christian_science">Christian Science</option>
                                                                          <option value="hindu">Hindu</option>
                                                                          <option value="ismlam_sunni">Islam - Sunni</option>
                                                                          <option value="ismlam_sufism">Islam - Sufism</option>
                                                                          <option value="ismlam_shia">Islam - Shia</option>
                                                                           <option value="jain">Jain</option>
                                                                          <option value="jehovah_witness">Jehovah's Witness</option>
                                                                          <option value="jewish">Jewish</option>
                                                                          <option value="methodist">Methodist</option>
                                                                          <option value="other">Other</option>
                                                                          <option value="primal_indigenous">Primal-Indigenous</option>
                                                                     	  <option value="unknown">Unknown</option>
                                                                          <option value="quaker">Quaker</option>
                                                                           <option value="shinto">Shinto</option>
                                                                           <option value="sikh">Sikh</option>
                                                                          <option value="unitarian">Unitarian</option>
                                                                     </optgroup>
                                                                  </select>
                                                              </td>
		 												</tr>
                                                         <tr id="if_other_religion">
															<td class="formLabel" align="left"><label class="float-left" id="other_religionLabel" for="other_religion">Other Religion:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="other_religion" name="other_religion" placeholder="Other Religion - Please Specify"></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="civil_status_Label" for="civil_status">Civil Status:</label></td>
															<td class="formInput">
                                                             	<select class="form-control" id="civil_status" name="civil_status" placeholder="Select Civil Status" required>
                                                                
                                                                          <option value="never_married">Never Married</option>
                                                                          <option value="married">Married</option>
                                                                           <option value="widowed">Widowed</option>
                                                                          <option value="divorced">Divorced</option>
                                                                     		<option value="unknown">Unknown</option>
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
																	<input type="text" class="form-control" name="date_of_donation" id="date_of_donation" placeholder="Date of Donation" required/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="sexLabel" for="signature_present">Signature Present:</label></td>
															<td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="signature_present" id="signature_present" value="1" required>Yes
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="signature_present" id="signature_present" value="0" checked="checked">No
                                                                </label>
                                                            </td>
		 												</tr>
													</table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitGenInfo" value="Save"/></td>
															<td class="buttons_table_cell pull-right"></td>
														</tr>
													</table>
                                        		</div>
                                        	</form>
                                        <?php
											}
										?>
                                <?php 
									if($show_form == false) {
									
									$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
									$donorIDsession = $_SESSION['donorIDsession'];
									$result = mysql_query("SELECT * FROM donor_table WHERE donor_reference_number = $donorIDsession") or die($connect_error1);
												
									while($record = mysql_fetch_assoc($result)) {

											$donor_reference_number_1 = $record['donor_reference_number'];
											$first_name_1 = ucwords($record['first_name']);
											$sur_name_1 = ucwords($record['sur_name']);
											$date_of_birth_1 = $record['date_of_birth'];
											$sex_1 = $record['sex'];
											$religion_1 = $record['religion'];
											$date_of_donation_1 = $record['date_of_donation'];
											$signature_checked_new = $record['signature_present'];
											$date_of_donation_1 = $record['date_of_donation'];
											$civil_status_1 = $record['civil_status'];
											$other_religion = $record['other_religion'];
											
									}
									
									$var1 = $date_of_birth_1;
									$newDate1 = date('d-m-Y', strtotime($var1));
									
									$var_don_date_1 = $date_of_donation_1;
									$newDate_1 = date('d-m-Y', strtotime($var_don_date_1));

									
								?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                    	<tr>
															<td class="formLabel" align="left"><label id="donorRefNumLabel" for="donorRefNum">Reference Number:</label></td>
															<td class="formInput"><input type="number" class="form-control" id="donor_reference_num" name="donor_reference_num" placeholder="<?php echo $donor_reference_number_1 ?>" disabled></td>
		 												</tr>
                                        				<tr>
															<td class="formLabel" align="left"><label class="float-left" id="donorFirstNameLabel" for="firstName">First Name:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="firstName" name="firstName" placeholder="<?php echo $first_name_1 ?>" disabled></td>
														</tr>
														<tr>
															<td class="formLabel" align="left"><label id="donorSurNameLabel" for="surName">Surname:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="surName" name="surName" placeholder="<?php echo $sur_name_1 ?>" disabled></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="sexLabel" for="sex_new">Sex:</label></td>
															<!-- <td class="formInput"><input type="text" class="form-control" id="sex" name="sex" placeholder="< echo $sex_1 ?>" disabled></td>												-->
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($sex_1 == "Male") {
																echo '<input type="radio" class="enable_disable" name="sex" id="sex"  value="Male" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="sex" id="sex"  value="Male"/>';
																}; ?>
                                                                Male</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($sex_1 == "Female") {
																echo '<input type="radio" class="enable_disable" name="sex" id="sex"  value="Female" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="sex" id="sex"  value="Female"/>';
																}; ?>
                                                                Female</label>
                                                            </td>
		 												</tr>
                 										<tr>
															<td class="formLabel" align="left">
                                                            	<label id="dobLabel" for="donorDOB">Date of Birth:
                                                                		<a data-toggle="popover" data-placement="right" title="Date of Birth" data-content="Insert the DOB in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepickerDOB">
																	<input type="text" class="form-control" name="donorDOB" id="donorDOB" placeholder="<?php echo $newDate1 ?>" disabled/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
		 												
														<tr>
															<td class="formLabel" align="left"><label id="religionLabel" for="religion">Religion:</label></td>
															<td class="formInput">
                                                            <select class="form-control enable_disable" id="religion" name="religion" placeholder="Select Religion" disabled>
                                                                	<optgroup label="Christian">
                                                                           <?php if($religion_1 == "catholic") { echo '<option selected="selected">Roman Catholic</option>'; } else { echo '<option >Roman Catholic</option>';}?>
                                                                          <?php if($religion_1 == "church_of_ireland") { echo '<option selected="selected">Church of Ireland</option>'; } else { echo '<option >Church of Ireland</option>';}?>
                                                                          <?php if($religion_1 == "presbyterian") { echo '<option selected="selected">Presbyterian</option>'; } else { echo '<option >Presbyterian</option>';}?>
                                                                          <?php if($religion_1 == "orthodox") { echo '<option selected="selected">Orthodox</option>'; } else { echo '<option >Orthodox</option>';}?> 
                                                                     </optgroup>
                                                                     <optgroup label="Non-Religious">
                                                                     <?php if($religion_1 == "secular") { echo '<option selected="selected">Secular</option>'; } else { echo '<option >Secular</option>';}?> 
                                                                     <?php if($religion_1 == "athiest") { echo '<option selected="selected">Athiest</option>'; } else { echo '<option >Athiest</option>';}?> 
                                                                     <?php if($religion_1 == "agnostic") { echo '<option selected="selected">Agnostic</option>'; } else { echo '<option >Agnostic</option>';}?> 
                                                                     <?php if($religion_1 == "humanist") { echo '<option selected="selected">Humanist</option>'; } else { echo '<option >Humanist</option>';}?> 
                                                                     <option value="humanist">Humanist</option>
                                                                     </optgroup>
                                                                    <optgroup label="Other">
                                                                     	   <?php if($religion_1 == "african_traditional_and_diasporic") { echo '<option selected="selected">African Traditional and Diasporic</option>'; } else { echo '<option >African Traditional and Diasporic</option>';}?> 
                                                                            <?php if($religion_1 == "bahai") { echo '<option selected="selected">Bahai</option>'; } else { echo '<option >Bahai</option>';}?> 
                                                                             <?php if($religion_1 == "baptist") { echo '<option selected="selected">Baptist</option>'; } else { echo '<option >Baptist</option>';}?> 
                                                                              <?php if($religion_1 == "buddhist") { echo '<option selected="selected">Buddhist</option>'; } else { echo '<option >Buddhist</option>';}?> 
                                                                               <?php if($religion_1 == "chinese_traditional_religion") { echo '<option selected="selected">Chinese Traditional Religion</option>'; } else { echo '<option >Chinese Traditional Religion</option>';}?> 
                                                                                <?php if($religion_1 == "christian_science") { echo '<option selected="selected">Christian Science</option>'; } else { echo '<option >Christian Science</option>';}?> 
                                                                                <?php if($religion_1 == "hindu") { echo '<option selected="selected">Hindu</option>'; } else { echo '<option >Hindu</option>';}?> 
                                                                                <?php if($religion_1 == "ismlam_sunni") { echo '<option selected="selected">Islam - Sunni</option>'; } else { echo '<option >Islam - Sunni</option>';}?> 
                                                                                <?php if($religion_1 == "ismlam_sufism") { echo '<option selected="selected">Islam - Sufism</option>'; } else { echo '<option >Islam - Sufism</option>';}?> 
                                                                                <?php if($religion_1 == "ismlam_shia") { echo '<option selected="selected">Islam - Shia</option>'; } else { echo '<option >Islam - Shia</option>';}?> 
                                                                                <?php if($religion_1 == "jain") { echo '<option selected="selected">Jain</option>'; } else { echo '<option >Jain</option>';}?> 
                                                                                <?php if($religion_1 == "jehovah_witness") { echo '<option selected="selected">Jehovah\'s Witness</option>'; } else { echo '<option >Jehovah\'s Witness</option>';}?> 
                                                                                <?php if($religion_1 == "jewish") { echo '<option selected="selected">Jewish</option>'; } else { echo '<option >Jewish</option>';}?> 
                                                                                <?php if($religion_1 == "methodist") { echo '<option selected="selected">Methodist</option>'; } else { echo '<option >Methodist</option>';}?> 
                                                                          
                                                                          <?php if($religion_1 == "other") { echo '<option selected="selected">Other</option>'; } else { echo '<option >Other</option>';}?> 
                                                                          <?php if($religion_1 == "primal_indigenous") { echo '<option selected="selected">Primal-Indigenous</option>'; } else { echo '<option >Primal-Indigenous</option>';}?> 
                                                                          <?php if($religion_1 == "unknown") { echo '<option selected="selected">Unknown</option>'; } else { echo '<option >Unknown</option>';}?> 
                                                                          <?php if($religion_1 == "quaker") { echo '<option selected="selected">Quaker</option>'; } else { echo '<option >Quaker</option>';}?> 
                                                                          <?php if($religion_1 == "shinto") { echo '<option selected="selected">Shinto</option>'; } else { echo '<option >Shinto</option>';}?> 
                                                                           <?php if($religion_1 == "sikh") { echo '<option selected="selected">Sikh</option>'; } else { echo '<option >Sikh</option>';}?> 
                                                                            <?php if($religion_1 == "unitarian") { echo '<option selected="selected">Unitarian</option>'; } else { echo '<option >Unitarian</option>';}?> 
                                                                         
                                                                     </optgroup>
                                                                  </select>
                                                                  
                                                                 <!--  <input type="text" class="form-control" id="religion" name="religion" placeholder="< echo $religion_1 ?>" disabled>-->
                                                                  </td>
		 												</tr>
                                                         <?php if($other_religion != "") { echo '
														 <tr>
															<td class="formLabel" align="left"><label class="float-left" id="other_religionLabel" for="other_religion" >Other Religion:</label></td>
															<td class="formInput"><input type="text" class="form-control" disabled id="other_religion" name="other_religion" value="'.$other_religion .'"></td>
														</tr>
														';
														 }
														?>
                                                        <tr>
															<td class="formLabel" align="left"><label id="civil_status_Label" for="civil_status">Civil Status:</label></td>
															<td class="formInput">
                                                             	<select class="form-control" id="civil_status" name="civil_status" placeholder="Select Civil Status" disabled>
                                                                    <option value="never_married">Never Married</option>
                                                                         
                                                                           <?php if($civil_status_1 == "never_married") { echo '<option selected="selected">Never Married</option>'; } else { echo '<option >Never Married</option>';}?>
                                                                          <?php if($civil_status_1 == "married") { echo '<option selected="selected">Married</option>'; } else { echo '<option >Married</option>';}?>
                                                                          <?php if($civil_status_1 == "widowed") { echo '<option selected="selected">Widowed</option>'; } else { echo '<option >Widowed</option>';}?>
                                                                          <?php if($civil_status_1 == "divorced") { echo '<option selected="selected">Divorced</option>'; } else { echo '<option >Divorced</option>';}?> 
                                                                          <?php if($civil_status_1 == "unknown") { echo '<option selected="selected">Unknown</option>'; } else { echo '<option >Unknown</option>';}?> 
                                                                     </select>
                                                                  
                                                                  </td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left">
                                                            	<label id="dobLabel" for="date_of_donation">Date of Donation:
                                                                		<a data-toggle="popover" data-placement="right" title="Date of Birth" data-content="Insert the date of donation in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-2015.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepicker_donation">
																	<input type="text" class="form-control" name="date_of_donation" id="date_of_donation" placeholder="<?php echo $newDate_1 ?>" disabled>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="sexLabel" for="signature_checked_new">Signature Present:</label></td>
															<!-- <td class="formInput"><input type="text" class="form-control" id="sex" name="sex" placeholder="< echo $sex_1 ?>" disabled></td>												-->
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($signature_checked_new == "1") {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new" id="signature_checked_new"  value="1" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new" id="signature_checked_new"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($signature_checked_new == "0") {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new" id="signature_checked_new"  value="0" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new" id="signature_checked_new"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
													</table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitGenInfo" value="Save" disabled/></td>
															<td class="buttons_table_cell pull-right"><a href="add_donor_page2.php">	
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
    
    <script type="text/javascript">
$(function() {
    $( "#donorDOB" ).datepicker({
      changeMonth: true,
      changeYear: true, 
	  showButtonPanel: true, 
	  dateFormat: "dd-mm-yy", 
	  defaultDate:"01-01-1970", 
	  yearRange: "1920:Now"
    });
  });
  
  $(function() {
    $( "#date_of_donation" ).datepicker({
      changeMonth: true,
      changeYear: true, 
	  showButtonPanel: true, 
	  dateFormat: "dd-mm-yy", 
	  defaultDate:"Now", 
	  yearRange: "1920:Now"
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
	
	// for the help popovers
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({
			html:true,
		}); 
	});
	
	// for the help popovers
	$(document).ready(function(){

		$('#if_other_religion').hide();

		$('[data-toggle="popover"]').popover({
			html:true,
		}); 
		
		$('#religion').on('change', function() {
  			//alert( this.value ); // or $(this).val()

			if(this.value == "other"){
				//alert( this.value );
				$('#if_other_religion').show();
			} else {
				$('#if_other_religion').hide();
			}
		});
		
		
	});
			
	</script>
    

</body>

</html>
