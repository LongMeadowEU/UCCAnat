<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in_imports() !== true) {
	header("Location: index.php");
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

    <title>Add A Specimen - Imports</title>

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
		.popover{
			width:250px;    
		}
    </style>

</head>

<body>

<?php
        
    	include_once 'php_functionality/imports/imports_navigation_menu.php';
    	$show_form = true;
    	
    	if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['submitImportInfo']) {
					if(empty($_POST['donor_reference_num_imports']) === false) {
							$show_form = false;
							
							$_SESSION['specimenRefNumSession'] = $_POST['donor_reference_num_imports'];
							
							$var_a = $_POST['delivery_date_imports'];
							$specimen_delivery_date = date('Y-m-d', strtotime($var_a));
							
							$var_b = $_POST['cremation_date_imports'];
							$specimen_cremation_date = date('Y-m-d', strtotime($var_b));
							
							$specimen_info_data = array(
												   'specimen_reference_number' 	=> 	$_POST['donor_reference_num_imports'],
												   'specimen_item_number' 		=> 	$_POST['item_num_imports'],
												   'specimen_user' 				=> 	$_POST['user_imports'],
												   'type_of_specimen'			=>	$_POST['type_of_specimen'],
												   'specimen_delivery_date'		=> 	$specimen_delivery_date,
												   'specimen_cremation_date' 	=> 	$specimen_cremation_date, 
												   'imports_cause_of_death'		=>	$_POST['imports_cause_of_death'],
												   'specimen_serology' 			=> 	$_POST['serology_imports'],
												   'imports_sex'				=>	$_POST['imports_sex'],
												   'specimen_images'			=> 	$_POST['images_imports'], 
												   'specimen_imports_removed'	=> 	$_POST['implants_removed_imports'],
												   'specimen_notes'				=>	$_POST['imports_notes']
												   );
												   
							add_new_specimen_import($specimen_info_data);
							
							$specimenRefNumSession = $_SESSION['specimenRefNumSession'];
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
                                  <h2 class="page-header" id="homepageHeader">Add a Specimen - Imports</h2>
                                  <ol class="breadcrumb">
                                      <li>
										<a href="imports_home.php">Home</a>
                                      </li>
                                      <li class="active">
                                          <a href="add_donor_imports.php"><strong>Add a Specimen - Imports</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
                					
										
									<div class="row">
									<?php 
										if($show_form == true) {
									?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                   		<tr>
															<td class="formLabel" align="left"><label id="donorRefNumLabel" for="donor_reference_num_imports">Reference Number:</label></td>
															<td class="formInput"><input type="number" class="form-control" id="donor_reference_num_imports" name="donor_reference_num_imports" placeholder="Reference Number" min="1" required></td>
		 												</tr>
                                        				<tr>
															<td class="formLabel" align="left"><label id="itemNumLabel" for="item_num_imports">Item Number:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="item_num_imports" name="item_num_imports" placeholder="Item Number" required></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="userLabel" for="user_imports">User:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="user_imports" name="user_imports" placeholder="User"required></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="userLabel" for="type_of_specimen">Type of Specimen:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="type_of_specimen" name="type_of_specimen" placeholder="Type of Specimen"required></td>
		 												</tr>
		 												<tr>
															<td class="formLabel" align="left">
                                                            	<label id="delivery_date_importsLabel" for="delivery_date_imports">Delivery Date:
                                                                		<a data-toggle="popover" data-placement="right" title="Delivery Date" data-content="Insert the delivery date in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepicker_delivery">
																	<input type="text" class="form-control" name="delivery_date_imports" id="delivery_date_imports" placeholder="Delivery Date" required/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left">
                                                            	<label id="cremation_date_importsLabel" for="cremation_date_imports">Cremation Date:
                                                                		<a data-toggle="popover" data-placement="right" title="Cremation Date" data-content="Insert the cremation date in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepicker_cremation">
																	<input type="text" class="form-control" name="cremation_date_imports" id="cremation_date_imports" placeholder="Cremation Date" required/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                         <tr>
															<td class="formLabel" align="left"><label id="cause_of_deathLabel" for="imports_cause_of_death">Cause of Death:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="imports_cause_of_death" name="imports_cause_of_death" placeholder="Cause of Death" required></td>
														</tr>
                                                      <tr>
															<td class="formLabel" align="left"><label id="serology_importsLabel" for="serology_imports">Serology:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="serology_imports" name="serology_imports" placeholder="Serology"required></td>
		 												</tr>
                                                         <tr>
															<td class="formLabel" align="left"><label id="sexLabel" for="imports_sex">Sex:</label></td>
															<td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="imports_sex" id="imports_sex" value="Male" checked="checked" required>Male
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="imports_sex" id="imports_sex" value="Female">Female
                                                                </label>
                                                            </td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="images_importsLabel" for="images_imports">Images:</label></td>
															<td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="images_imports" id="images_imports" value="1" required>Yes
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="images_imports" id="images_imports" value="0" checked="checked">No
                                                                </label>
                                                            </td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="implants_removed_importsLabel" for="implants_removed_imports">Imports Removed:</label></td>
															<td class="formInput">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="implants_removed_imports" id="implants_removed_imports" value="1" required>Yes
                                                                </label> 
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="implants_removed_imports" id="implants_removed_imports" value="0" checked="checked">No
                                                                </label>
                                                            </td>
		 												</tr>
                                                        </table>
                                                        <table id="notesTable1" class="centred_text">
                                                          <tr>
                                                              <td class="formLabel" align="left"><label id="notesLabel" for="notes">Notes:</label></td>
                                                              <td class="formInput"><textarea type="text" class="form-control" id="imports_notes" name="imports_notes" style="resize: none"></textarea></td>
                                                          </tr>
                                                        </table>
													</table>
													</table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitImportInfo" value="Save"/></td>
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
									$specimenRefNumSession = $_SESSION['specimenRefNumSession'];
									$result = mysql_query("SELECT * FROM import_specimens WHERE specimen_reference_number = $specimenRefNumSession") or die($connect_error1);
												
									while($record = mysql_fetch_assoc($result)) {
										
										$new_specimen_reference_number = $record['specimen_reference_number'];
										$new_specimen_item_number = $record['specimen_item_number'];
										$new_specimen_user = $record['specimen_user'];
										$new_type_of_specimen = $record['type_of_specimen'];
										$new_specimen_delivery_date = $record['specimen_delivery_date'];
										$new_specimen_cremation_date = $record['specimen_cremation_date'];
										$new_imports_cause_of_death = $record['imports_cause_of_death'];
										$new_specimen_serology = $record['specimen_serology'];
										$new_imports_sex = $record['imports_sex'];
										$new_specimen_images = $record['specimen_images'];
										$new_specimen_imports_removed = $record['specimen_imports_removed'];
										$new_specimen_notes = $record['specimen_notes'];
											
									}
									
									$var_c = $new_specimen_delivery_date;
									$newDate_delivery = date('d-m-Y', strtotime($var_c));
									
									$var_d = $new_specimen_cremation_date;
									$newDate_cremation = date('d-m-Y', strtotime($var_d));

									
								?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                   		<tr>
															<td class="formLabel" align="left"><label id="donorRefNumLabel" for="donor_reference_num_imports">Reference Number:</label></td>
															<td class="formInput"><input type="number" class="form-control" id="donor_reference_num_imports" name="donor_reference_num_imports" value="<?php echo $new_specimen_reference_number; ?>" disabled></td>
		 												</tr>
                                        				<tr>
															<td class="formLabel" align="left"><label id="itemNumLabel" for="item_num_imports">Item Number:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="item_num_imports" name="item_num_imports" value="<?php echo $new_specimen_item_number; ?>" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="userLabel" for="user_imports">User:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="user_imports" name="user_imports" value="<?php echo $new_specimen_user; ?>" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="userLabel" for="type_of_specimen">Type of Specimen:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="type_of_specimen" name="type_of_specimen" value="<?php echo $new_type_of_specimen; ?>" disabled></td>
		 												</tr>
		 												<tr>
															<td class="formLabel" align="left">
                                                            	<label id="delivery_date_importsLabel" for="delivery_date_imports">Delivery Date:
                                                                		<a data-toggle="popover" data-placement="right" title="Delivery Date" data-content="Insert the delivery date in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepicker_delivery">
																	<input type="text" class="form-control" name="delivery_date_imports" id="delivery_date_imports" value="<?php echo $newDate_delivery;?>" disabled/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left">
                                                            	<label id="cremation_date_importsLabel" for="cremation_date_imports">Cremation Date:
                                                                		<a data-toggle="popover" data-placement="right" title="Cremation Date" data-content="Insert the cremation date in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepicker_cremation">
																	<input type="text" class="form-control" name="cremation_date_imports" id="cremation_date_imports" value="<?php echo $newDate_cremation;?>" disabled/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                         <tr>
															<td class="formLabel" align="left"><label id="cause_of_deathLabel" for="imports_cause_of_death">Cause of Death:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="imports_cause_of_death" name="imports_cause_of_death" value="<?php echo $new_imports_cause_of_death; ?>" disabled></td>
														</tr>
                                                      <tr>
															<td class="formLabel" align="left"><label id="serology_importsLabel" for="serology_imports">Serology:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="serology_imports" name="serology_imports" value="<?php echo $new_specimen_serology;?>" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="sexLabel" for="imports_sex">Sex:</label></td>
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($new_imports_sex == "Male") {
																echo '<input type="radio" class="enable_disable" name="imports_sex" id="imports_sex"  value="Male" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="imports_sex" id="imports_sex"  value="Male"/>';
																}; ?>
                                                                Male</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($new_imports_sex == "Female") {
																echo '<input type="radio" class="enable_disable" name="imports_sex" id="imports_sex"  value="Female" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" class="enable_disable" name="imports_sex" id="imports_sex"  value="Female"/>';
																}; ?>
                                                                Female</label>
                                                            </td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="images_importsLabel" for="images_imports">Images:</label></td>
															<td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($new_specimen_images == "1") {
																echo '<input type="radio" name="images_imports" id="images_imports"  value="1" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio"  name="images_imports" id="images_imports"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($new_specimen_images == "0") {
																echo '<input type="radio"  name="images_imports" id="images_imports"  value="0" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" name="images_imports" id="images_imports"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="implants_removed_importsLabel" for="implants_removed_imports">Imports Removed:</label></td>
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($new_specimen_imports_removed == "1") {
																echo '<input type="radio" name="implants_removed_imports" id="implants_removed_imports"  value="1" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio"  name="implants_removed_imports" id="implants_removed_imports"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($new_specimen_imports_removed == "0") {
																echo '<input type="radio"  name="implants_removed_imports" id="implants_removed_imports"  value="0" checked="checked" disabled/>';
															}
																	else {
																echo '<input type="radio" name="implants_removed_imports" id="implants_removed_imports"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
                                                        </table>
                                                        <table id="notesTable1" class="centred_text">
                                                          <tr>
                                                              <td class="formLabel" align="left"><label id="notesLabel" for="notes">Notes:</label></td>
                                                              <td class="formInput"><textarea type="text" class="form-control" id="imports_notes" name="imports_notes" style="resize: none" disabled><?php echo $new_specimen_notes; ?></textarea></td>
                                                          </tr>
                                                        </table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitImportInfo" value="Save" disabled/></td>
															<td class="buttons_table_cell pull-right"><a href="imports_specimen_added.php">	
																<button type="button" class="btn btn-lg btn-success form_1_button" value="finish_button" id="finish_button">Finish</button>
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

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
    <!-- Bootstrap datepicker JavaScript-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    
    <!-- Javascript for the datapicker http://jqueryui.com/datepicker/#dropdown-month-year -->
    <script type="text/javascript">
    
        $(function () {
            $('#datepicker_delivery').datepicker({
            	format: "dd-mm-yyyy", 
      			clearBtn: true, 
      			changeMonth: true,
      			changeYear: true
            });
        });
		
		$(function () {
            $('#datepicker_cremation').datepicker({
            	format: "dd-mm-yyyy", 
      			clearBtn: true, 
      			changeMonth: true,
      			changeYear: true
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
	
	$(function () {
            $('#datepicker_donation').datepicker({
            	format: "dd-mm-yyyy", 
      			clearBtn: true, 
      			changeMonth: true,
      			changeYear: true
            });
        });
			
	</script>
    

</body>

</html>
