<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in() !== true) {
	header("Location: index.php");
} 

$donorIDsession = $_SESSION['donorIDsession'];

// to prevent user from proceeding to form page 2 without filling in Add A Patient Form page 1....etc.
if(form_page_3_completed() != true) {
	header("Location: add_donor_page3.php");
}

$page3session = $_SESSION['page3session'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add A Donor - Medical History</title>

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
    	$show_form_4 = true;
		$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
		$donorIDsession = $_SESSION['donorIDsession'];
		$result = mysqli_query($db_connect,"SELECT * FROM donor_table WHERE donor_reference_number = $donorIDsession") or die($connect_error1);
				
		while($record = mysqli_fetch_assoc($result)) {
			
			$male_or_female = $record['sex'];
		}
    	
    	if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['submitMedicalHistory']) {
				
				$_SESSION['page4session'] = $_POST['select_conditions'];
				
				// for the multiple selection box: select which conditions the donor has/does suffer from
				$select_conditions = $_POST['select_conditions'];
				$conditions_string = implode(', ', $_POST['select_conditions']);
				
				if(empty($conditions_string)) {
					$conditions_string_post = "none";
				} else {
					$conditions_string_post = implode(', ', $_POST['select_conditions']);
				}
				
				$surgery_1_name = $_POST['surgery_1_text'];
				$surgery_2_name = $_POST['surgery_2_text'];
				$surgery_3_name = $_POST['surgery_3_text'];
				$surgery_4_name = $_POST['surgery_4_text'];
				$surgery_5_name = $_POST['surgery_5_text'];
				$surgery_6_name = $_POST['surgery_6_text'];
				
				if($male_or_female == "Male") {
					$prostatectomy = $_POST['prostatectomy'];
					mysqli_query($db_connect,"UPDATE donor_table SET prostatectomy = '$prostatectomy' WHERE donor_reference_number = '$donorIDsession'");
				} else if($male_or_female == "Female") {
					$hysterectomy = $_POST['hysterectomy'];
					mysqli_query($db_connect,"UPDATE donor_table SET hysterectomy = '$hysterectomy' WHERE donor_reference_number = '$donorIDsession'");
				}
				
				//$reop_surgery_num_ = implode(', ', $_POST['reop_s_no']);
				//$reop_sugery_reason_ = implode(', ', $_POST['reop_procedure']);
				
				mysqli_query($db_connect,"UPDATE donor_table SET donor_conditions = '$conditions_string_post' WHERE donor_reference_number = '$donorIDsession'");
				//mysql_query("UPDATE donor_table SET sugery_number = '$reop_surgery_num_' WHERE donor_reference_number = '$donorIDsession'");
				//mysql_query("UPDATE donor_table SET sugery_reason = '$reop_sugery_reason_' WHERE donor_reference_number = '$donorIDsession'");
				
				mysqli_query($db_connect,"UPDATE donor_table SET surgery_1_name = '$surgery_1_name' WHERE donor_reference_number = '$donorIDsession'");
				mysqli_query($db_connect,"UPDATE donor_table SET surgery_2_name = '$surgery_2_name' WHERE donor_reference_number = '$donorIDsession'");
				mysqli_query($db_connect,"UPDATE donor_table SET surgery_3_name = '$surgery_3_name' WHERE donor_reference_number = '$donorIDsession'");
				mysqli_query($db_connect,"UPDATE donor_table SET surgery_4_name = '$surgery_4_name' WHERE donor_reference_number = '$donorIDsession'");
				mysqli_query($db_connect,"UPDATE donor_table SET surgery_5_name = '$surgery_5_name' WHERE donor_reference_number = '$donorIDsession'");
				mysqli_query($db_connect,"UPDATE donor_table SET surgery_6_name = '$surgery_6_name' WHERE donor_reference_number = '$donorIDsession'");
					
				$show_form_4 = false;		
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
                                          <a href="add_donor_page4.php"><strong>Add a Donor: Medical History (Page 4 of 6)</strong></a>
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
										if($show_form_4 == true) {
									?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                    	<tr>
                                                        	<td class="formLabel" align="left"><label id="conditionsLabel" for="select_conditions[]">Medical Condition(s):</label></td>
                                                            <td class="formInput">
																<textarea class="form-control" id="conditions_checked" name="conditions_checked" readonly style="resize: none; height: 70px" placeholder="Please select the condition(s) the donor suffers/has suffered from from the dropdown list below."></textarea>	
                                                        </tr>
                                                   		<tr> 
															<td class="formLabel" align="left"></td>
															<td class="formInput"  align="left">
                                                               <select multiple="multiple" name="select_conditions[]" style="width: 100%"> 
                                                               	   <option value="none">None</option>
                                                                   <option value="breast_cancer">Breast Cancer</option>
                                                                   <option value="cervical_cancer">Cervical Cancer</option>
                                                                   <option value="prostate_cancer">Prostate Cancer</option>
                                                                   <option value="Colon_cancer">Colon Cancer</option>
                                                                   <option value="skin_cancer">Skin Cancer</option>
                                                                   <option value="other_cancer">Other Cancer</option>
                                                                   <option value="heart_attack">Heart Attack</option>
                                                                   <option value="heart_bypass_surgery">Heart Bypass Surgery</option>
                                                                   <option value="heart_balloon_surgery">Heart Balloon Surgery</option>
                                                                   <option value="asthma">Asthma</option>
                                                                   <option value="stroke">Stroke</option>
                                                                   <option value="high_cholesterol">High Cholesterol</option>
                                                                   <option value="diabetes">Diabetes</option>
                                                                   <option value="high_blood_pressure">High Blood Pressure</option>
                                                                   <option value="emphysema">Emphysema</option>
                                                                   <option value="hepatitis">Hepatitis</option>
                                                                   <option value="arthritis">Arthritis</option>
                                                                   <option value="back_problems">Back Problems</option>
                                                                   <option value="hearing_problems">Hearing Problems</option>
                                                                   <option value="dental_problems">Dental Problems</option>
                                                                   <option value="skin_problems">Skin Problems</option>
                                                                   <option value="kidney_problems">Kidney Problems</option>
                                                                   <option value="osteoporosis">Osteoporosis</option>
                                                                   <option value="chicken_pox">Chicken Pox</option>
                                                                   <option value="mononucleosis">Mononucleosis</option>
                                                                   <option value="measles">Measles</option>
                                                                   <option value="mumps">Mumps</option>
                                                                   <option value="migraine_headaches">Migraine Headaches</option>
                                                                   <option value="seizures">Seizures</option>
                                                                   <option value="lung_problems">Lung Problems</option>
    														  </select>	
                                                            </td>
		 												</tr> 
                                                        <tr>
															<td class="formLabel" align="left"><label id="surgery_1_label" for="surgery_1">Surgical History:</label></td>
															<td class="formInput"></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_1_num" name="surgery_1_num" value="1" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_1_text" name="surgery_1_text" placeholder="Surgery 1"></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_2_num" name="surgery_2_num" value="2" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_2_text" name="surgery_2_text" placeholder="Surgery 2"></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_3_num" name="surgery_3_num" value="3" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_3_text" name="surgery_3_text" placeholder="Surgery 3"></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_4_num" name="surgery_4_num" value="4" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_4_text" name="surgery_4_text" placeholder="Surgery 4"></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_5_num" name="surgery_5_num" value="3" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_5_text" name="surgery_5_text" placeholder="Surgery 5"></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_6_num" name="surgery_6_num" value="6" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_6_text" name="surgery_6_text" placeholder="Surgery 6"></td>
		 												</tr>
                                                        <?php
														if($male_or_female == "Female") {
															echo '
                                                        <tr>
															<td class="formLabel" align="left"><label id="hystLabel" for="hysterectomy">Have you had a hysterectomy:</label></td>
															<td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="hysterectomy" id="hysterectomy" value="1" required>Yes
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="hysterectomy" id="hysterectomy" value="0" checked="checked">No
                                                                </label>
																 <label class="radio-inline">
                                                                    <input type="radio" name="hysterectomy" id="hysterectomy" value="2">Unknown
                                                                </label>
                                                            </td>
		 												</tr>
														';
														}
														else if($male_or_female == "Male") {
															echo '
														<tr>
															<td class="formLabel" align="left"><label id="prostatectomyLabel" for="prostatectomy">Have you had a prostatectomy:</label></td>
															<td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="prostatectomy" id="prostatectomy" value="1" required>Yes
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="prostatectomy" id="prostatectomy" value="0" checked="checked">No
                                                                </label>
																 <label class="radio-inline">
                                                                    <input type="radio" name="prostatectomy" id="prostatectomy" value="2">Unknown
                                                                </label>
                                                            </td>
		 												</tr>
														';
														}
														?>
                                                     </table>
                                       	
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitMedicalHistory" value="Save"/></td>
															<td class="buttons_table_cell pull-right"></td>
														</tr>
													</table>
                                        		</div>
                                        	</form>
                                        <?php
											}
										?>
                                <?php 
									if($show_form_4 == false) {
									
									$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
									$donorIDsession = $_SESSION['donorIDsession'];
									$result = mysqli_query($db_connect,"SELECT * FROM donor_table WHERE donor_reference_number = $donorIDsession") or die($connect_error1);
											
									while($record = mysqli_fetch_assoc($result)) {
										
										$donor_conditions = explode(', ', $record['donor_conditions']);
										$donor_conditions_count = count($donor_conditions);
			
										//$reop_surgery_nums_array = explode(",",$record['sugery_number']);
										//$reop_sugery_reasons = explode(",",$record['sugery_reason']);
										
										//$reop_surgery_nums = count($reop_surgery_nums_array);
										
										$surgery_1_name_1 = $record['surgery_1_name'];
										$surgery_2_name_1 = $record['surgery_2_name'];
										$surgery_3_name_1 = $record['surgery_3_name'];
										$surgery_4_name_1 = $record['surgery_4_name'];
										$surgery_5_name_1 = $record['surgery_5_name'];
										$surgery_6_name_1 = $record['surgery_6_name'];
										
										$new_male_or_female = $record['sex'];
										if($male_or_female == "Male") {
											$new_prostatectomy = $record['prostatectomy'];
										} else if($male_or_female == "Female") {
											$new_hysterectomy = $record['hysterectomy'];
										}

									}
											
								?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                        				<tr>
                                                        	<td class="formLabel" align="left"><label id="conditionsLabel" for="select_conditions[]">Medical Condition(s):</label></td>
                                                            <td class="formInput">
																<textarea class="form-control" id="conditions_checked" name="conditions_checked" readonly style="resize: none; height: 70px"><?php echo implode(", ", $donor_conditions) ?></textarea>	
                                                        </tr>
                                                   		<tr> 
															<td class="formLabel" align="left"></td>
															<td class="formInput"  align="left">
                                                               <select multiple="multiple" name="select_conditions[]" disabled style="width: 100%"> 
                                                               		<?php 	
																	if(in_array("none",$donor_conditions)) { 
																		echo '<option value="none" selected="selected">None</option>';
																	} else {
																		echo '<option value="none">None</option>';
																	}
																	?>
                                                               		<?php 	
																	if(in_array("breast_cancer",$donor_conditions)) { 
																		echo '<option value="breast_cancer" selected="selected">Breast Cancer</option>';
																	} else {
																		echo '<option value="breast_cancer">Breast Cancer</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("cervical_cancer",$donor_conditions)) { 
																		echo '<option value="cervical_cancer" selected="selected">Cervical Cancer</option>';
																	} else {
																		echo '<option value="cervical_cancer">Cervical Cancer</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("prostate_cancer",$donor_conditions)) { 
																		echo '<option value="prostate_cancer" selected="selected">Prostate Cancer</option>';
																	} else {
																		echo '<option value="prostate_cancer">Prostate Cancer</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("Colon_cancer",$donor_conditions)) { 
																		echo '<option value="Colon_cancer" selected="selected">Colon Cancer</option>';
																	} else {
																		echo '<option value="Colon_cancer">Colon Cancer</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("skin_cancer",$donor_conditions)) { 
																		echo '<option value="skin_cancer" selected="selected">Skin Cancer</option>';
																	} else {
																		echo '<option value="skin_cancer">Skin Cancer</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("other_cancer",$donor_conditions)) { 
																		echo '<option value="other_cancer" selected="selected">Other Cancer</option>';
																	} else {
																		echo '<option value="other_cancer">Other Cancer</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("heart_attack",$donor_conditions)) { 
																		echo '<option value="heart_attack" selected="selected">Heart Attack</option>';
																	} else {
																		echo '<option value="heart_attack">Heart Attack</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("heart_bypass_surgery",$donor_conditions)) { 
																		echo '<option value="heart_bypass_surgery" selected="selected">Heart Bypass Surgery</option>';
																	} else {
																		echo '<option value="heart_bypass_surgery">Heart Bypass Surgery</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("heart_balloon_surgery",$donor_conditions)) { 
																		echo '<option value="heart_balloon_surgery" selected="selected">Heart Balloon Surgery</option>';
																	} else {
																		echo '<option value="heart_balloon_surgery">Heart Balloon Surgery</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("asthma",$donor_conditions)) { 
																		echo '<option value="asthma" selected="selected">Asthma</option>';
																	} else {
																		echo '<option value="asthma">Asthma</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("stroke",$donor_conditions)) { 
																		echo '<option value="stroke" selected="selected">Stroke</option>';
																	} else {
																		echo '<option value="stroke">Stroke</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("high_cholesterol",$donor_conditions)) { 
																		echo '<option value="high_cholesterol" selected="selected">High Cholesterol</option>';
																	} else {
																		echo '<option value="high_cholesterol">High Cholesterol</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("diabetes",$donor_conditions)) { 
																		echo '<option value="diabetes" selected="selected">Diabetes</option>';
																	} else {
																		echo '<option value="diabetes">Diabetes</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("high_blood_pressure",$donor_conditions)) { 
																		echo '<option value="high_blood_pressure" selected="selected">High Blood Pressure</option>';
																	} else {
																		echo '<option value="high_blood_pressure">High Blood Pressure</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("emphysema",$donor_conditions)) { 
																		echo '<option value="emphysema" selected="selected">Emphysema</option>';
																	} else {
																		echo '<option value="emphysema">Emphysema</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("hepatitis",$donor_conditions)) { 
																		echo '<option value="hepatitis" selected="selected">Hepatitis</option>';
																	} else {
																		echo '<option value="hepatitis">Hepatitis</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("arthritis",$donor_conditions)) { 
																		echo '<option value="arthritis" selected="selected">Arthritis</option>';
																	} else {
																		echo '<option value="arthritis">Arthritis</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("back_problems",$donor_conditions)) { 
																		echo '<option value="back_problems" selected="selected">Back Problems</option>';
																	} else {
																		echo '<option value="back_problems">Back Problems</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("hearing_problems",$donor_conditions)) { 
																		echo '<option value="hearing_problems" selected="selected">Hearing Problems</option>';
																	} else {
																		echo '<option value="hearing_problems">Hearing Problems</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("dental_problems",$donor_conditions)) { 
																		echo '<option value="dental_problems" selected="selected">Dental Problems</option>';
																	} else {
																		echo '<option value="dental_problems">Dental Problems</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("skin_problems",$donor_conditions)) { 
																		echo '<option value="skin_problems" selected="selected">Skin Problems</option>';
																	} else {
																		echo '<option value="skin_problems">Skin Problems</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("kidney_problems",$donor_conditions)) { 
																		echo '<option value="kidney_problems" selected="selected">Kidney Problems</option>';
																	} else {
																		echo '<option value="kidney_problems">Kidney Problems</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("osteoporosis",$donor_conditions)) { 
																		echo '<option value="osteoporosis" selected="selected">Osteoporosis</option>';
																	} else {
																		echo '<option value="osteoporosis">Osteoporosis</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("chicken_pox",$donor_conditions)) { 
																		echo '<option value="chicken_pox" selected="selected">Chicken Pox</option>';
																	} else {
																		echo '<option value="chicken_pox">Chicken Pox</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("mononucleosis",$donor_conditions)) { 
																		echo '<option value="mononucleosis" selected="selected">Mononucleosis</option>';
																	} else {
																		echo '<option value="mononucleosis">Mononucleosis</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("measles",$donor_conditions)) { 
																		echo '<option value="measles" selected="selected">Measles</option>';
																	} else {
																		echo '<option value="measles">Measles</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("mumps",$donor_conditions)) { 
																		echo '<option value="mumps" selected="selected">Mumps</option>';
																	} else {
																		echo '<option value="mumps">Mumps</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("migraine_headaches",$donor_conditions)) { 
																		echo '<option value="migraine_headaches" selected="selected">Migraine Headaches</option>';
																	} else {
																		echo '<option value="migraine_headaches">Migraine Headaches</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("seizures",$donor_conditions)) { 
																		echo '<option value="seizures" selected="selected">Seizures</option>';
																	} else {
																		echo '<option value="seizures">Seizures</option>';
																	}
																	?>
                                                                    <?php 	
																	if(in_array("lung_problems",$donor_conditions)) { 
																		echo '<option value="lung_problems" selected="selected">Lung Problems</option>';
																	} else {
																		echo '<option value="lung_problems">Lung Problems</option>';
																	}
																	?>
                                                                 
    														  </select>	
                                                            </td>
		 												</tr> 
                                       					<tr>
															<td class="formLabel" align="left"><label id="surgery_1_label" for="surgery_1">Surgical History:</label></td>
															<td class="formInput"></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_1_num" name="surgery_1_num" value="1" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_1_text" name="surgery_1_text" value="<?php echo $surgery_1_name_1; ?>" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_2_num" name="surgery_2_num" value="2" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_2_text" name="surgery_2_text" value="<?php echo $surgery_2_name_1; ?>" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_3_num" name="surgery_3_num" value="3" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_3_text" name="surgery_3_text" value="<?php echo $surgery_3_name_1; ?>" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_4_num" name="surgery_4_num" value="4" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_4_text" name="surgery_4_text" value="<?php echo $surgery_4_name_1; ?>" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_5_num" name="surgery_5_num" value="3" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_5_text" name="surgery_5_text" value="<?php echo $surgery_5_name_1; ?>" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formInput"><input type="number" class="form-control" id="surgery_6_num" name="surgery_6_num" value="6" readonly></td>
															<td class="formInput"><input type="text" class="form-control" id="surgery_6_text" name="surgery_6_text" value="<?php echo $surgery_6_name_1; ?>" disabled></td>
		 												</tr>
                                                         <?php
														if($new_male_or_female == "Female") {
															echo '
																  <tr>
																	  <td class="formLabel" align="left"><label id="hystLabel" for="hysterectomy">Have you had a hysterectomy:</label></td>
																	  <td class="formInput">
																		  
																		   <label class="radio-inline">;'?>
																		  <?php if($new_hysterectomy == "1") {
																		  echo '<input type="radio" class="enable_disable" name="hysterectomy" id="hysterectomy"  value="1" checked="checked" disabled/>';
																	  }
																			  else {
																		  echo '<input type="radio" class="enable_disable" name="hysterectomy" id="hysterectomy"  value="1"/>';
																		  }; ?>
																		  Yes</label> 
																		  <label class="radio-inline">
																			  <?php if($new_hysterectomy == "0") {
																		  echo '<input type="radio" class="enable_disable" name="hysterectomy" id="hysterectomy"  value="0" checked="checked" disabled/>';
																	  }
																			  else {
																		  echo '<input type="radio" class="enable_disable" name="hysterectomy" id="hysterectomy"  value="0"/>';
																		  }; ?>
																		  No</label>
                                                                          <label class="radio-inline">
                                                                           <?php if($new_hysterectomy == "2") {
																		  echo '<input type="radio" class="enable_disable" name="hysterectomy" id="hysterectomy"  value="2" checked="checked" disabled/>';
																	  }
																			  else {
																		  echo '<input type="radio" class="enable_disable" name="hysterectomy" id="hysterectomy"  value="2"/>';
																		  }; ?>
                                                                          Unknown</label>
																		  <?php
																		  echo'
																	  </td>
																  </tr>
																  ';
														
														}else if($new_male_or_female == "Male") {
															echo '
																<tr>
																	<td class="formLabel" align="left"><label id="hystLabel" for="prostatectomy">Have you had a prostatectomy:</label></td>
																	<td class="formInput">
																		<label class="radio-inline">
																	'; ?>
																		  <?php if($new_prostatectomy == "1") {
																		echo '<input type="radio" class="enable_disable" name="prostatectomy" id="prostatectomy"  value="1" checked="checked" disabled/>';
																	}
																			else {
																		echo '<input type="radio" class="enable_disable" name="prostatectomy" id="prostatectomy"  value="1"/>';
																		}; ?>
																		Yes</label> 
																		<label class="radio-inline">
																			<?php if($new_prostatectomy == "0") {
																		echo '<input type="radio" class="enable_disable" name="prostatectomy" id="prostatectomy"  value="0" checked="checked" disabled/>';
																	}
																			else {
																		echo '<input type="radio" class="enable_disable" name="prostatectomy" id="prostatectomy"  value="0"/>';
																		}; ?>
																		No</label>
                                                                        <label class="radio-inline">
																			<?php if($new_prostatectomy == "2") {
																		echo '<input type="radio" class="enable_disable" name="prostatectomy" id="prostatectomy"  value="2" checked="checked" disabled/>';
																	}
																			else {
																		echo '<input type="radio" class="enable_disable" name="prostatectomy" id="prostatectomy"  value="2"/>';
																		}; ?>
																		Unknown</label>
																		<?php
																		echo'
																	</td>
																</tr>
																';
														}
														?>
                                                     </table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitMedicalHistory" value="Save" disabled/></td>
															<td class="buttons_table_cell pull-right"><a href="add_donor_page5.php">	
																<button type="button" class="btn btn-lg btn-success form_1_button" value="page2" id="goToPage2BT">Continue</button>
															</a></td>
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
     <!-- <script src="bower_components/jquery/dist/jquery.ui.1.11.4.js"></script> for the JQuery DatePicker -->

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
    <!-- Multiple Selection Box -->
    <script src="bower_components/multiple-select_plugin/multiple-select.js"></script>

    <script type="text/javascript">
	
	$(document).ready(function() {
		
		// for the multiple selection box - type of surgery
		$('select').multipleSelect({
			filter: true, 
		});
		$('#conditions_checked').html($("select").multipleSelect("getSelects", "text"));
		$('select').change(function() {
			$('#conditions_checked').html($("select").multipleSelect("getSelects", "text") + ", ");
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
		
	</script>
    

</body>

</html>
