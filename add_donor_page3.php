<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in() !== true) {
	header("Location: index.php");
} 

$donorIDsession = $_SESSION['donorIDsession'];

// to prevent user from proceeding to form page 2 without filling in Add A Patient Form page 1....etc.
if(form_page_2_completed() != true) {
	header("Location: add_donor_page2.php");
}

$page2session = $_SESSION['page2session'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add A Donor - Burial and Witness Information</title>

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
		$show_form_3 = true;
    	
    	if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['submitBurialWitnessInfo']) {
						
						$show_form_3 = false;
						
						$_SESSION['page3session'] = $_POST['witness_1_name'];
							
						//$var_don_date = $_POST['date_of_donation'];
						//$date_of_donation = date('Y-m-d', strtotime($var_don_date));
							   
						$place_of_burial_or_cremation = $_POST['place_of_burial_or_cremation'];				   
						$witness_1_name = $_POST['witness_1_name'];
						$witness_1_relationship = $_POST['witness_1_relationship'];
						$witness_1_address_line_1 = $_POST['witness_1_address_line_1'];
						$witness_1_address_line_2 = $_POST['witness_1_address_line_2'];
						$witness_1_address_line_3 = $_POST['witness_1_address_line_3'];
						$witness_1_phone_number = $_POST['witness_1_phone_number'];	
						$signature_present_wit_1 = $_POST['signature_present_wit_1'];
						$witness_1_address_line_4 = $_POST['witness_1_address_line_4'];
						$witness_1_address_line_postcode = $_POST['witness_1_address_line_postcode'];
						$witness_1_email = $_POST['witness_1_email'];
									   
						$witness_2_name = $_POST['witness_2_name'];
						$witness_2_relationship = $_POST['witness_2_relationship'];
						$witness_2_address_line_1 = $_POST['witness_2_address_line_1'];
						$witness_2_address_line_2 = $_POST['witness_2_address_line_2'];
						$witness_2_address_line_3 = $_POST['witness_2_address_line_3'];
						$witness_2_phone_number = $_POST['witness_2_phone_number'];
						$signature_present_wit_2 = $_POST['signature_present_wit_2'];
						$witness_2_address_line_4 = $_POST['witness_2_address_line_4'];
						$witness_2_address_line_postcode = $_POST['witness_2_address_line_postcode'];
						$witness_2_email = $_POST['witness_2_email'];
						
						$notes = $_POST['notes'];
						
						$private_family_interment_address_1_	= $_POST['private_family_interment_address'];
						$private_family_interment_address_2_	= $_POST['private_family_interment_address_2'];
						$private_family_interment_address_3_	= $_POST['private_family_interment_address_3'];
						
						//mysql_query("UPDATE donor_table SET date_of_donation = '$date_of_donation' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET place_of_burial_or_cremation = '$place_of_burial_or_cremation' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_1_name = '$witness_1_name' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_1_relationship = '$witness_1_relationship' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_1_address_line_1 = '$witness_1_address_line_1' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_1_address_line_2 = '$witness_1_address_line_2' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_1_address_line_3 = '$witness_1_address_line_3' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_1_address_line_4 = '$witness_1_address_line_4' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_1_address_line_postcode = '$witness_1_address_line_postcode' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_1_phone_number = '$witness_1_phone_number' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET signature_present_wit_1 = '$signature_present_wit_1' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_1_email = '$witness_1_email' WHERE donor_reference_number = '$donorIDsession'");
						
						mysqli_query($db_connect,"UPDATE donor_table SET witness_2_name = '$witness_2_name' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_2_relationship = '$witness_2_relationship' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_2_address_line_1 = '$witness_2_address_line_1' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_2_address_line_2 = '$witness_2_address_line_2' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_2_address_line_3 = '$witness_2_address_line_3' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_2_phone_number = '$witness_2_phone_number' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_2_address_line_4 = '$witness_2_address_line_4' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_2_address_line_postcode = '$witness_2_address_line_postcode' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET signature_present_wit_2 = '$signature_present_wit_2' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET witness_2_email = '$witness_2_email' WHERE donor_reference_number = '$donorIDsession'");
						
						mysqli_query($db_connect,"UPDATE donor_table SET notes = '$notes' WHERE donor_reference_number = '$donorIDsession'");
						
						mysqli_query($db_connect,"UPDATE donor_table SET private_family_interment_address_1 = '$private_family_interment_address_1_' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET private_family_interment_address_2 = '$private_family_interment_address_2_' WHERE donor_reference_number = '$donorIDsession'");
						mysqli_query($db_connect,"UPDATE donor_table SET private_family_interment_address_3 = '$private_family_interment_address_3_' WHERE donor_reference_number = '$donorIDsession'");
						
						$page3session = $_SESSION['page3session'];
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
                                          <a href="add_donor_page3.php"><strong>Add a Donor: Burial and Witness Information (Page 3 of 6)</strong></a>
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
										if($show_form_3 == true) {
									?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
		 												<!--<tr>
															<td class="formLabel" align="left">
                                                            	<label id="dobLabel" for="donorDOB">Date of Donation:
                                                                		<a data-toggle="popover" data-placement="right" title="Date of Birth" data-content="Insert the date of donation in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-2015.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepickerDOB">
																	<input type="text" class="form-control" name="date_of_donation" id="date_of_donation" placeholder="Date of Donation" required/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>-->
                                                        <table id="witness1table" class="centred_text">
                                                              <tr id="witness1Row">
                                                              	<td class="formLabel" align="middle" colspan=2><label id="witness1nameLabel" for="witness1name"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Witness 1</label></td>
                                                              </tr>
                                                              
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1nameLabel" for="witness_1_name">Name of Witness:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_name" name="witness_1_name" placeholder="Witness 1 Name" required></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1relationshipLabel" for="witness_1_relationship">Relationship to Donor:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_relationship" name="witness_1_relationship" placeholder="Relationship to Donor" required></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1addressLabel" for="witness_1_address_line_1">Address:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_address_line_1" name="witness_1_address_line_1" placeholder="Address Line 1" required></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_address_line_2" name="witness_1_address_line_2" placeholder="Address Line 2" required></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_address_line_4" name="witness_1_address_line_4" placeholder="Address Line 3"></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput">
                                                                  <!-- <input type="text" class="form-control" id="witness_1_address_line_3" name="witness_1_address_line_3" placeholder="County" required>-->
                                                                  <input type="text" class="form-control" id="witness_1_address_line_postcode" name="witness_1_address_line_postcode" placeholder="Postcode" style="float:left; width:50%">
                                                                  <select class="form-control" id="witness_1_address_line_3" name="witness_1_address_line_3" placeholder="County" required style="float:right; width:50%">
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
                                                            
                                                                 	</td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1phoneLabel" for="witness_1_phone_number">Phone Number:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_phone_number" name="witness_1_phone_number" placeholder="Phone Number"></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1emailLabel" for="witness_1_email">Email Address:</label></td>
                                                                  <td class="formInput"><input type="email" class="form-control" id="witness_1_email" name="witness_1_email" placeholder="Email Address"></td>
                                                              </tr>
                                                              <tr class="witness1Info">
															<td class="formLabel" align="left"><label id="sexLabel" for="signature_present_wit_1">Signature Present:</label></td>
															<td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="signature_present_wit_1" id="signature_present_wit_1" value="1" required>Yes
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="signature_present_wit_1" id="signature_present_wit_1" value="0" checked="checked">No
                                                                </label>
                                                            </td>
		 												</tr>
                                                        </table>
                                                         <table id="witness2table" class="centred_text">
                                                              <tr id="witness2Row">
                                                              	<td class="formLabel" align="middle" colspan=2><label id="witness2nameLabel" for="witness2name"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Witness 2</label></td
                                                              ></tr>
		 												
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness2nameLabel" for="witness_2_name">Name of Witness:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_name" name="witness_2_name" placeholder="Witness 2 Name"></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness1relationshipLabel" for="witness_2_relationship">Relationship to Donor:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_relationship" name="witness_2_relationship" placeholder="Relationship to Donor"></td>
                                                              </tr>
                                                             <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness2addressLabel" for="witness_2_address_line_1">Address:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_address_line_1" name="witness_2_address_line_1" placeholder="Address Line 1"></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_address_line_2" name="witness_2_address_line_2" placeholder="Address Line 2"></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_address_line_4" name="witness_2_address_line_4" placeholder="Address Line 3"></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput">
                                                                  <!--<input type="text" class="form-control" id="witness_2_address_line_3" name="witness_2_address_line_3" placeholder="County" required> -->
                                                                  <input type="text" class="form-control" id="witness_2_address_line_postcode" name="witness_2_address_line_postcode" placeholder="Postcode" style="float:left; width:50%">
                                                                  <select class="form-control" id="witness_2_address_line_3" name="witness_2_address_line_3" placeholder="County" style="float:left; width:50%">
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
                                                                  </td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness2phoneLabel" for="witness_2_phone_number">Phone Number:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_phone_number" name="witness_2_phone_number" placeholder="Phone Number"></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness2emailLabel" for="witness_2_email">Email Address:</label></td>
                                                                  <td class="formInput"><input type="email" class="form-control" id="witness_2_email" name="witness_2_email" placeholder="Email Address"></td>
                                                              </tr>
                                                              <tr class="witness2Info">
															<td class="formLabel" align="left"><label id="sexLabel" for="signature_present_wit_2">Signature Present:</label></td>
															<td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="signature_present_wit_2" id="signature_present_wit_2" value="1" required>Yes
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="signature_present_wit_2" id="signature_present_wit_2" value="0" checked="checked">No
                                                                </label>
                                                            </td>
		 												</tr>
                                                        </table>
                                                        <table id="cremation_or_burial_table" class="centred_text">
                                                         <tr>
															<td class="formLabel" align="left" colspan="2"><label id="placeOfBurialLabel" for="place_of_burial_or_cremation">Proposed Place of Burial, Cremation or Other:</label>
                                                            <a data-toggle="popover" title="Proposed Place of Burial, Cremation or Other:" data-content="Please state whether donor selected: burial in the UCC Private Plot; burial in private family interment; or cremation.">
																<span class="glyphicon glyphicon-question-sign" aria-hidden="true" style="padding-left: 5%"></span>
															</a>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            	<!-- <input type="text" class="form-control" id="place_of_burial_or_cremation" name="place_of_burial_or_cremation" placeholder="Proposed Place of Burial, Cremation or Other">-->
                                                            <td class="formInput"><label class="radio-inline">
																<input type="radio" name="place_of_burial_or_cremation" id="place_of_burial_or_cremation" value="ucc_private_plot" >UCC Private Plot
															</label></td>
															<td class="formInput"><label class="radio-inline">
																<input type="radio" name="place_of_burial_or_cremation" id="place_of_burial_or_cremation" value="private_family_interment">Private Family Interment
															</label></td>
                                                            <td class="formInput"><label class="radio-inline">
																<input type="radio" name="place_of_burial_or_cremation" id="place_of_burial_or_cremation" value="cremation">Cremation
															</label></td>
                                                             </td>
		 												</tr>
                                                        </table>
                                                      <table class="centred_text" id="private_interment_selected">
														<tr>
															<td id="formLabel1" align="left" colspan="2" style="margin-top:2%"><label>Please specify the address of the <strong>Private Family Interment</strong>:</label></td>
                                                            <td></td>
                                                         </tr>
                                                         <tr>
															 <td class="formInput"><input type="text" class="form-control" id="private_family_interment_address" name="private_family_interment_address" placeholder="Address Line 1"></td>
														</tr>
                                                        <tr>
															 <td class="formInput"><input type="text" class="form-control" id="private_family_interment_address_2" name="private_family_interment_address_2" placeholder="Address Line 2"></td>
														</tr>
                                                        <tr>
															 <td class="formInput">
                                                              <select class="form-control" id="private_family_interment_address_3" name="private_family_interment_address_3" placeholder="County">
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
                                                                </td>
														</tr>
													</table>
                                                        <table id="notesTable" class="centred_text">
                                                          <tr>
                                                              <td class="formLabel" align="left"><label id="notesLabel" for="notes">Notes:</label></td>
                                                              <td class="formInput"><textarea type="text" class="form-control" id="notes" name="notes" style="resize: none"></textarea></td>
                                                          </tr>
                                                        </table>
													</table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitBurialWitnessInfo" value="Save"/></td>
															<td class="buttons_table_cell pull-right"></td>
														</tr>
													</table>
                                        		</div>
                                        	</form>
                                        <?php
											}
										?>
                                <?php 
									if($show_form_3 == false) {
									
									$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
									$donorIDsession = $_SESSION['donorIDsession'];
									$result = mysql_query("SELECT * FROM donor_table WHERE donor_reference_number = $donorIDsession") or die($connect_error1);
												
									while($record = mysql_fetch_assoc($result)) {
			
									  $date_of_donation_1 = $record['date_of_donation'];		 
									  $place_of_burial_or_cremation_1 = $record['place_of_burial_or_cremation'];				   
									  $witness_1_name_1 = ucwords($record['witness_1_name']);
									  $witness_1_relationship_1 = $record['witness_1_relationship'];
									  $witness_1_address_line_1_1 = $record['witness_1_address_line_1'];
									  $witness_1_address_line_2_1 = $record['witness_1_address_line_2'];
									  $witness_1_address_line_3_1 = $record['witness_1_address_line_3'];
									  $witness_1_address_line_4_1 = $record['witness_1_address_line_4'];
									  $witness_1_phone_number_1 = $record['witness_1_phone_number'];				   
									  $witness_2_name_1 = ucwords($record['witness_2_name']);
									  $new_signature_present_wit_1 = $record['signature_present_wit_1'];
									  $witness_1_address_line_postcode_1 = $record['witness_1_address_line_postcode'];
									  $witness_1_email_1 = $record['witness_1_email'];
									  
									  $witness_2_relationship_1 = $record['witness_2_relationship'];
									  $witness_2_address_line_1_1 = $record['witness_2_address_line_1'];
									  $witness_2_address_line_2_1 = $record['witness_2_address_line_2'];
									  $witness_2_address_line_3_1 = $record['witness_2_address_line_3'];
									  $witness_2_address_line_4_1 = $record['witness_2_address_line_4'];
									  $witness_2_address_line_postcode_1 = $record['witness_2_address_line_postcode'];
									  $witness_2_phone_number_1 = $record['witness_2_phone_number'];
									  $new_signature_present_wit_2 = $record['signature_present_wit_2'];
									  $witness_2_email_1 = $record['witness_2_email'];
									  
									  $notes_1 = $record['notes'];
									  
									  $private_family_interment_address_1 = $record['private_family_interment_address_1'];
									  $private_family_interment_address_2 = $record['private_family_interment_address_2'];
									  $private_family_interment_address_3 = $record['private_family_interment_address_3'];	

									}
									
									$var_don_date_1 = $date_of_donation_1;
									$newDate_1 = date('d-m-Y', strtotime($var_don_date_1));
									
								?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                    	<!--<tr>
															<td class="formLabel" align="left">
                                                            	<label id="dobLabel" for="donorDOB">Date of Donation:
                                                                		<a data-toggle="popover" data-placement="right" title="Date of Birth" data-content="Insert the date of donation in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-2015.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepickerDOB">
																	<input type="text" class="form-control" name="date_of_donation" id="date_of_donation" placeholder="php echo $date_of_donation_1 ?>" disabled>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr> -->
                                                        <table id="witness1table" class="centred_text">
                                                              <tr id="witness1Row">
                                                              	<td class="formLabel" align="middle" colspan=2><label id="witness1nameLabel" for="witness1name"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Witness 1</label></td>
                                                              </tr>
                                                              
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1nameLabel" for="witness_1_name">Name of Witness:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_name" name="witness_1_name" placeholder="<?php echo $witness_1_name_1 ?>" disabled></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1relationshipLabel" for="witness_1_relationship">Relationship to Donor:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_relationship" name="witness_1_relationship" placeholder="<?php echo $witness_1_relationship_1 ?>" disabled></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1addressLabel" for="witness_1_address_line_1">Address:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_address_line_1" name="witness_1_address_line_1" placeholder="<?php echo $witness_1_address_line_1_1 ?>" disabled></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_address_line_2" name="witness_1_address_line_2" placeholder="<?php echo $witness_1_address_line_2_1 ?>" disabled></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_address_line_4" name="witness_1_address_line_4" placeholder="<?php echo $witness_1_address_line_4_1 ?>" disabled></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput">
                                                                  <!--<input type="text" class="form-control" id="witness_1_address_line_3" name="witness_1_address_line_3" placeholder="< echo $witness_1_address_line_3_1 ?>" disabled>-->
                                                                  <input type="text" class="form-control" id="witness_1_address_line_postcode" name="witness_1_address_line_postcode" placeholder="<?php echo $witness_1_address_line_postcode_1 ?>" disabled style="float:left; width:50%">
                                                                  <select class="form-control" id="witness_1_address_line_3" name="witness_1_address_line_3" disabled style="float:left; width:50%">
                                                            
																	  <?php if($witness_1_address_line_3_1 == "antrim") { echo '<option selected="selected">Antrim</option>'; } else { echo '<option >Antrim</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "armagh") { echo '<option selected="selected">Armagh</option>'; } else { echo '<option >Armagh</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "carlow") { echo '<option selected="selected">Carlow</option>'; } else { echo '<option >Carlow</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "cavan") { echo '<option selected="selected">Cavan</option>'; } else { echo '<option >Cavan</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "clare") { echo '<option selected="selected">Clare</option>'; } else { echo '<option >Clare</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "cork") { echo '<option selected="selected">Cork</option>'; } else { echo '<option >Cork</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "derry") { echo '<option selected="selected">Derry</option>'; } else { echo '<option >Derry</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "donegal") { echo '<option selected="selected">Donegal</option>'; } else { echo '<option >Donegal</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "down") { echo '<option selected="selected">Down</option>'; } else { echo '<option >Down</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "dublin") { echo '<option selected="selected">Dublin</option>'; } else { echo '<option >Dublin</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "fermanagh") { echo '<option selected="selected">Fermanagh</option>'; } else { echo '<option >Fermanagh</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "galway") { echo '<option selected="selected">Galway</option>'; } else { echo '<option >Galway</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "kerry") { echo '<option selected="selected">Kerry</option>'; } else { echo '<option >Kerry</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "kildare") { echo '<option selected="selected">Kildare</option>'; } else { echo '<option >Kildare</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "kilkenny") { echo '<option selected="selected">Kilkenny</option>'; } else { echo '<option >Kilkenny</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "laois") { echo '<option selected="selected">Laois</option>'; } else { echo '<option >Laois</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "leitrim") { echo '<option selected="selected">Leitrim</option>'; } else { echo '<option >Leitrim</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "limerick") { echo '<option selected="selected">Limerick</option>'; } else { echo '<option >Limerick</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "longford") { echo '<option selected="selected">Longford</option>'; } else { echo '<option >Longford</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "louth") { echo '<option selected="selected">Louth</option>'; } else { echo '<option >Louth</option>';}?>
                                                                      <?php if($witness_1_address_line_3_1 == "mayo") { echo '<option selected="selected">Mayo</option>'; } else { echo '<option >Mayo</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "meath") { echo '<option selected="selected">Meath</option>'; } else { echo '<option >Meath</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "monaghan") { echo '<option selected="selected">Monaghan</option>'; } else { echo '<option >Monaghan</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "offaly") { echo '<option selected="selected">Offaly</option>'; } else { echo '<option >Offaly</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "roscommon") { echo '<option selected="selected">Roscommon</option>'; } else { echo '<option >Roscommon</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "sligo") { echo '<option selected="selected">Sligo</option>'; } else { echo '<option >Sligo</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "tipperary") { echo '<option selected="selected">Tipperary</option>'; } else { echo '<option >Tipperary</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "tyrone") { echo '<option selected="selected">Tyrone</option>'; } else { echo '<option >Tyrone</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "waterford") { echo '<option selected="selected">Waterford</option>'; } else { echo '<option >Waterford</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "westmeath") { echo '<option selected="selected">Westmeath</option>'; } else { echo '<option >Westmeath</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "wexford") { echo '<option selected="selected">Wexford</option>'; } else { echo '<option >Wexford</option>';}?>
																	  <?php if($witness_1_address_line_3_1 == "wicklow") { echo '<option selected="selected">Wicklow</option>'; } else { echo '<option >Wicklow</option>';}?>
                                                                      
                                                                      </select>
                                                                  </td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1phoneLabel" for="witness_1_phone_number">Phone Number:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_1_phone_number" name="witness_1_phone_number" placeholder="<?php echo $witness_1_phone_number_1 ?>" disabled></td>
                                                              </tr>
                                                              <tr class="witness1Info">
                                                                  <td class="formLabel" align="left"><label id="witness1emailLabel" for="witness_1_email">Email Address:</label></td>
                                                                  <td class="formInput"><input type="email" class="form-control" id="witness_1_email" name="witness_1_email" placeholder="<?php echo $witness_1_email_1 ?>" disabled></td>
                                                              </tr>
                                                               <tr class="witness1Info">
															<td class="formLabel" align="left"><label id="sexLabel" for="signature_checked_new_wit_1">Signature Present:</label></td>
															<!-- <td class="formInput"><input type="text" class="form-control" id="sex" name="sex" placeholder="< echo $sex_1 ?>" disabled></td>												-->
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($new_signature_present_wit_1 == "1") {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new_wit_1" id="signature_checked_new_wit_1"  value="Male" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new_wit_1" id="signature_checked_new_wit_1"  value="Male"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($new_signature_present_wit_1 == "0") {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new_wit_1" id="signature_checked_new_wit_1"  value="Female" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new_wit_1" id="signature_checked_new_wit_1"  value="Female"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
                                                        </table>
                                                         <table id="witness2table" class="centred_text">
                                                              <tr id="witness2Row">
                                                              	<td class="formLabel" align="middle" colspan=2><label id="witness2nameLabel" for="witness2name"><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> Witness 2</label></td
                                                              ></tr>
		 												
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness2nameLabel" for="witness_2_name">Name of Witness:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_name" name="witness_2_name" placeholder="<?php echo $witness_2_name_1 ?>" disabled></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness1relationshipLabel" for="witness_2_relationship">Relationship to Donor:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_relationship" name="witness_2_relationship" placeholder="<?php echo $witness_2_relationship_1 ?>" disabled></td>
                                                              </tr>
                                                             <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness2addressLabel" for="witness_2_address_line_1">Address:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_address_line_1" name="witness_2_address_line_1" placeholder="<?php echo $witness_2_address_line_1_1 ?>" disabled></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_address_line_2" name="witness_2_address_line_2" placeholder="<?php echo $witness_2_address_line_2_1 ?>" disabled></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_address_line_4" name="witness_2_address_line_4" placeholder="<?php echo $witness_2_address_line_4_1 ?>" disabled></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"></td>
                                                                  <td class="formInput">
                                                                  <!--<input type="text" class="form-control" id="witness_2_address_line_3" name="witness_2_address_line_3" placeholder="< echo $witness_2_address_line_3_1 ?>" disabled>-->
                                                                  <input type="text" class="form-control" id="witness_2_address_line_postcode" name="witness_2_address_line_postcode" placeholder="<?php echo $witness_2_address_line_postcode_1 ?>" disabled style="float:left; width:50%">
                                                                  <select class="form-control" id="witness_2_address_line_3" name="witness_2_address_line_3" disabled style="float:left; width:50%">
                                                            
																	  <?php if($witness_2_address_line_3_1 == "antrim") { echo '<option selected="selected">Antrim</option>'; } else { echo '<option >Antrim</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "armagh") { echo '<option selected="selected">Armagh</option>'; } else { echo '<option >Armagh</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "carlow") { echo '<option selected="selected">Carlow</option>'; } else { echo '<option >Carlow</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "cavan") { echo '<option selected="selected">Cavan</option>'; } else { echo '<option >Cavan</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "clare") { echo '<option selected="selected">Clare</option>'; } else { echo '<option >Clare</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "cork") { echo '<option selected="selected">Cork</option>'; } else { echo '<option >Cork</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "derry") { echo '<option selected="selected">Derry</option>'; } else { echo '<option >Derry</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "donegal") { echo '<option selected="selected">Donegal</option>'; } else { echo '<option >Donegal</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "down") { echo '<option selected="selected">Down</option>'; } else { echo '<option >Down</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "dublin") { echo '<option selected="selected">Dublin</option>'; } else { echo '<option >Dublin</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "fermanagh") { echo '<option selected="selected">Fermanagh</option>'; } else { echo '<option >Fermanagh</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "galway") { echo '<option selected="selected">Galway</option>'; } else { echo '<option >Galway</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "kerry") { echo '<option selected="selected">Kerry</option>'; } else { echo '<option >Kerry</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "kildare") { echo '<option selected="selected">Kildare</option>'; } else { echo '<option >Kildare</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "kilkenny") { echo '<option selected="selected">Kilkenny</option>'; } else { echo '<option >Kilkenny</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "laois") { echo '<option selected="selected">Laois</option>'; } else { echo '<option >Laois</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "leitrim") { echo '<option selected="selected">Leitrim</option>'; } else { echo '<option >Leitrim</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "limerick") { echo '<option selected="selected">Limerick</option>'; } else { echo '<option >Limerick</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "longford") { echo '<option selected="selected">Longford</option>'; } else { echo '<option >Longford</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "louth") { echo '<option selected="selected">Louth</option>'; } else { echo '<option >Louth</option>';}?>
                                                                      <?php if($witness_2_address_line_3_1 == "mayo") { echo '<option selected="selected">Mayo</option>'; } else { echo '<option >Mayo</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "meath") { echo '<option selected="selected">Meath</option>'; } else { echo '<option >Meath</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "monaghan") { echo '<option selected="selected">Monaghan</option>'; } else { echo '<option >Monaghan</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "offaly") { echo '<option selected="selected">Offaly</option>'; } else { echo '<option >Offaly</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "roscommon") { echo '<option selected="selected">Roscommon</option>'; } else { echo '<option >Roscommon</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "sligo") { echo '<option selected="selected">Sligo</option>'; } else { echo '<option >Sligo</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "tipperary") { echo '<option selected="selected">Tipperary</option>'; } else { echo '<option >Tipperary</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "tyrone") { echo '<option selected="selected">Tyrone</option>'; } else { echo '<option >Tyrone</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "waterford") { echo '<option selected="selected">Waterford</option>'; } else { echo '<option >Waterford</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "westmeath") { echo '<option selected="selected">Westmeath</option>'; } else { echo '<option >Westmeath</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "wexford") { echo '<option selected="selected">Wexford</option>'; } else { echo '<option >Wexford</option>';}?>
																	  <?php if($witness_2_address_line_3_1 == "wicklow") { echo '<option selected="selected">Wicklow</option>'; } else { echo '<option >Wicklow</option>';}?>
                                                                      
                                                                      </select>
                                                                      </td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness2phoneLabel" for="witness_2_phone_number">Phone Number:</label></td>
                                                                  <td class="formInput"><input type="text" class="form-control" id="witness_2_phone_number" name="witness_2_phone_number" placeholder="<?php echo $witness_2_phone_number_1 ?>" disabled></td>
                                                              </tr>
                                                              <tr class="witness2Info">
                                                                  <td class="formLabel" align="left"><label id="witness2emailLabel" for="witness_2_email">Email Address:</label></td>
                                                                  <td class="formInput"><input type="email" class="form-control" id="witness_2_email" name="witness_2_email" placeholder="<?php echo $witness_2_email_1 ?>" disabled></td>
                                                              </tr>
                                                                <tr class="witness2Info">
															<td class="formLabel" align="left"><label id="sexLabel" for="signature_checked_new_wit_2">Signature Present:</label></td>
															<!-- <td class="formInput"><input type="text" class="form-control" id="sex" name="sex" placeholder="< echo $sex_1 ?>" disabled></td>												-->
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($new_signature_present_wit_2 == "1") {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new_wit_2" id="signature_checked_new_wit_2"  value="Male" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new_wit_2" id="signature_checked_new_wit_2"  value="Male"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($new_signature_present_wit_2 == "0") {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new_wit_2" id="signature_checked_new_wit_2"  value="Female" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="signature_checked_new_wit_2" id="signature_checked_new_wit_2"  value="Female"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
                                                         </table>
                                         <table id="cremation_or_burial_table" class="centred_text">
                                                         <tr>
															<td class="formLabel" align="left" colspan="2"><label id="placeOfBurialLabel" for="place_of_burial_or_cremation">Proposed Place of Burial, Cremation or Other:</label>
                                                            <a data-toggle="popover" title="Proposed Place of Burial, Cremation or Other:" data-content="Please state whether donor selected: burial in the UCC Private Plot; burial in private family interment; or cremation.">
																<span class="glyphicon glyphicon-question-sign" aria-hidden="true" style="padding-left: 5%"></span>
															</a>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            	<!-- <input type="text" class="form-control" id="place_of_burial_or_cremation" name="place_of_burial_or_cremation" placeholder="Proposed Place of Burial, Cremation or Other">-->
                                                            <td class="formInput"><label class="radio-inline">
                                                            <?php if($place_of_burial_or_cremation_1 == "ucc_private_plot") {
																	echo '<input type="radio" name="place_of_burial_or_cremation" id="place_of_burial_or_cremation"  value="ucc_private_plot" checked="checked" disabled/>';
															}
																		else {
																	echo '<input type="radio" name="place_of_burial_or_cremation" id="place_of_burial_or_cremation"  value="ucc_private_plot" disabled/>';
															}; ?>
																UCC Private Plot
															</label></td>
															<td class="formInput"><label class="radio-inline">
                                                            <?php if($place_of_burial_or_cremation_1 == "private_family_interment") {
																	echo '<input type="radio" name="place_of_burial_or_cremation" id="place_of_burial_or_cremation"  value="private_family_interment" checked="checked" disabled/>';
															}
																		else {
																	echo '<input type="radio" name="place_of_burial_or_cremation" id="place_of_burial_or_cremation"  value="private_family_interment" disabled/>';
															}; ?>
																Private Family Interment
															</label></td>
                                                            <td class="formInput"><label class="radio-inline">
                                                            <?php if($place_of_burial_or_cremation_1 == "cremation") {
																	echo '<input type="radio" name="place_of_burial_or_cremation" id="place_of_burial_or_cremation"  value="cremation" checked="checked" disabled/>';
															}
																		else {
																	echo '<input type="radio" name="place_of_burial_or_cremation" id="place_of_burial_or_cremation"  value="cremation" disabled/>';
															}; ?>
                                                            	Cremation
															</label></td>
                                                             </td>
		 												</tr>
                                                        </table>
                                                    <?php 
													
													if($place_of_burial_or_cremation_1 == "private_family_interment") {
													
														echo
                                                      '<table class="centred_text" id="private_interment_selected_1">
														<tr>
															<td id="formLabel1" align="left" colspan="2" style="margin-top:2%"><label>Please specify the address of the <strong>Private Family Interment</strong>:</label></td>
                                                            <td></td>
                                                         </tr>
                                                         <tr>
															 <td class="formInput"><input type="text" class="form-control" id="private_family_interment_address" name="private_family_interment_address" placeholder="' . $private_family_interment_address_1 .'" disabled></td>
														</tr>
                                                        <tr>
															 <td class="formInput"><input type="text" class="form-control" id="private_family_interment_address_2" name="private_family_interment_address_2" placeholder="' . $private_family_interment_address_2 .'" disabled></td>
														</tr>
                                                        <tr>
															 <td class="formInput">
                                                              <select class="form-control" id="private_family_interment_address_3" name="private_family_interment_address_3" placeholder="County" disabled>';
															  ?>
															  
																	  <?php if($private_family_interment_address_3 == "antrim") { echo '<option selected="selected">Antrim</option>'; } else { echo '<option >Antrim</option>';}?>
																	  <?php if($private_family_interment_address_3 == "armagh") { echo '<option selected="selected">Armagh</option>'; } else { echo '<option >Armagh</option>';}?>
																	  <?php if($private_family_interment_address_3 == "carlow") { echo '<option selected="selected">Carlow</option>'; } else { echo '<option >Carlow</option>';}?>
																	  <?php if($private_family_interment_address_3 == "cavan") { echo '<option selected="selected">Cavan</option>'; } else { echo '<option >Cavan</option>';}?>
																	  <?php if($private_family_interment_address_3 == "clare") { echo '<option selected="selected">Clare</option>'; } else { echo '<option >Clare</option>';}?>
																	  <?php if($private_family_interment_address_3 == "cork") { echo '<option selected="selected">Cork</option>'; } else { echo '<option >Cork</option>';}?>
																	  <?php if($private_family_interment_address_3 == "derry") { echo '<option selected="selected">Derry</option>'; } else { echo '<option >Derry</option>';}?>
																	  <?php if($private_family_interment_address_3 == "donegal") { echo '<option selected="selected">Donegal</option>'; } else { echo '<option >Donegal</option>';}?>
																	  <?php if($private_family_interment_address_3 == "down") { echo '<option selected="selected">Down</option>'; } else { echo '<option >Down</option>';}?>
																	  <?php if($private_family_interment_address_3 == "dublin") { echo '<option selected="selected">Dublin</option>'; } else { echo '<option >Dublin</option>';}?>
																	  <?php if($private_family_interment_address_3 == "fermanagh") { echo '<option selected="selected">Fermanagh</option>'; } else { echo '<option >Fermanagh</option>';}?>
																	  <?php if($private_family_interment_address_3 == "galway") { echo '<option selected="selected">Galway</option>'; } else { echo '<option >Galway</option>';}?>
																	  <?php if($private_family_interment_address_3 == "kerry") { echo '<option selected="selected">Kerry</option>'; } else { echo '<option >Kerry</option>';}?>
																	  <?php if($private_family_interment_address_3 == "kildare") { echo '<option selected="selected">Kildare</option>'; } else { echo '<option >Kildare</option>';}?>
																	  <?php if($private_family_interment_address_3 == "kilkenny") { echo '<option selected="selected">Kilkenny</option>'; } else { echo '<option >Kilkenny</option>';}?>
																	  <?php if($private_family_interment_address_3 == "laois") { echo '<option selected="selected">Laois</option>'; } else { echo '<option >Laois</option>';}?>
																	  <?php if($private_family_interment_address_3 == "leitrim") { echo '<option selected="selected">Leitrim</option>'; } else { echo '<option >Leitrim</option>';}?>
																	  <?php if($private_family_interment_address_3 == "limerick") { echo '<option selected="selected">Limerick</option>'; } else { echo '<option >Limerick</option>';}?>
																	  <?php if($private_family_interment_address_3 == "longford") { echo '<option selected="selected">Longford</option>'; } else { echo '<option >Longford</option>';}?>
																	  <?php if($private_family_interment_address_3 == "louth") { echo '<option selected="selected">Louth</option>'; } else { echo '<option >Louth</option>';}?>
                                                                      <?php if($private_family_interment_address_3 == "mayo") { echo '<option selected="selected">Mayo</option>'; } else { echo '<option >Mayo</option>';}?>
																	  <?php if($private_family_interment_address_3 == "meath") { echo '<option selected="selected">Meath</option>'; } else { echo '<option >Meath</option>';}?>
																	  <?php if($private_family_interment_address_3 == "monaghan") { echo '<option selected="selected">Monaghan</option>'; } else { echo '<option >Monaghan</option>';}?>
																	  <?php if($private_family_interment_address_3 == "offaly") { echo '<option selected="selected">Offaly</option>'; } else { echo '<option >Offaly</option>';}?>
																	  <?php if($private_family_interment_address_3 == "roscommon") { echo '<option selected="selected">Roscommon</option>'; } else { echo '<option >Roscommon</option>';}?>
																	  <?php if($private_family_interment_address_3 == "sligo") { echo '<option selected="selected">Sligo</option>'; } else { echo '<option >Sligo</option>';}?>
																	  <?php if($private_family_interment_address_3 == "tipperary") { echo '<option selected="selected">Tipperary</option>'; } else { echo '<option >Tipperary</option>';}?>
																	  <?php if($private_family_interment_address_3 == "tyrone") { echo '<option selected="selected">Tyrone</option>'; } else { echo '<option >Tyrone</option>';}?>
																	  <?php if($private_family_interment_address_3 == "waterford") { echo '<option selected="selected">Waterford</option>'; } else { echo '<option >Waterford</option>';}?>
																	  <?php if($private_family_interment_address_3 == "westmeath") { echo '<option selected="selected">Westmeath</option>'; } else { echo '<option >Westmeath</option>';}?>
																	  <?php if($private_family_interment_address_3 == "wexford") { echo '<option selected="selected">Wexford</option>'; } else { echo '<option >Wexford</option>';}?>
																	  <?php if($private_family_interment_address_3 == "wicklow") { echo '<option selected="selected">Wicklow</option>'; } else { echo '<option >Wicklow</option>';}?>
                                                            <?php echo '             
                                                                    </select>
                                                                </td>
														</tr>
													</table>';
													}
												?>
                                                        <table id="notesTable" class="centred_text">
                                                          <tr>
                                                              <td class="formLabel" align="left"><label id="notesLabel" for="notes">Notes:</label></td>
                                                              <td class="formInput"><textarea type="text" class="form-control" id="notes" name="notes" style="resize: none" placeholder="<?php echo $notes_1 ?>" disabled></textarea></td>
                                                          </tr>
                                                        </table>
													</table>

													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitBurialWitnessInfo" value="Save" disabled/></td>
															<td class="buttons_table_cell pull-right"><a href="add_donor_page4.php">	
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
	
	// for the help popovers
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({
			html:true,
		}); 
	});
	
	//$('#witness1Row').click(function() {
		//alert('row clicked');
		//$('.witness1Info').hide();
	//});
	
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
	
		$("#private_interment_selected").hide();
		
		$('input[name="place_of_burial_or_cremation"]').click(function(){
			if($(this).attr("value")=="private_family_interment"){
				$("#private_interment_selected").show();
			}
			if($(this).attr("value") == "ucc_private_plot"){
				$("#private_interment_selected").hide();
			}
			if($(this).attr("value") == "cremation"){
				$("#private_interment_selected").hide();
			}
		});
	});
			
	</script>
    

</body>

</html>
