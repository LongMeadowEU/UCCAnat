<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in_imports() !== true) {
	header("Location: index.php");
}

// Prevent user from opening the patient history tabs without first selecting a patient
if(no_import_sepcimen_hist_selected() != true) {
	header("Location: specimen_list_table.php");
}

$selected_specimen_ref_hist = $_SESSION['selected_specimen_ref_hist'];

    	$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
		$result = mysql_query("SELECT * FROM import_specimens WHERE specimen_reference_number = $selected_specimen_ref_hist") or die($connect_error1);
					
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
				
				$var_c = $new_specimen_delivery_date;
				$newDate_delivery = date('d-m-Y', strtotime($var_c));
				
				$var_d = $new_specimen_cremation_date;
				$newDate_cremation = date('d-m-Y', strtotime($var_d));
		}

		if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['save_new_specimen_info']) {
						$newest_var_a = $_POST['delivery_date_imports'];
						$newest_specimen_delivery_date = date('Y-m-d', strtotime($newest_var_a));
							
						$newest_var_b = $_POST['cremation_date_imports'];
						$newest_specimen_cremation_date = date('Y-m-d', strtotime($newest_var_b));	
						
						$newest_specimen_item_number 		= 	$_POST['item_num_imports'];
						$newest_specimen_user 				= 	$_POST['user_imports'];
						$newest_type_of_specimen 			= $_POST['type_of_specimen'];
						$newest_specimen_serology 			= 	$_POST['serology_imports'];
						$newest_specimen_images			=	$_POST['images_imports'];
						$newest_specimen_imports_removed	= 	$_POST['implants_removed_imports'];
						$newest_specimen_notes				=	$_POST['imports_notes'];
						$newest_imports_cause_of_death		=	$_POST['imports_cause_of_death'];
						$newest_imports_sex					=	$_POST['imports_sex'];					

						// update the correct row for the new patient info added on page 1 of the form with the new changes
						mysql_query("UPDATE import_specimens SET specimen_item_number = '$newest_specimen_item_number' WHERE specimen_reference_number = '$selected_specimen_ref_hist'");
						mysql_query("UPDATE import_specimens SET specimen_user = '$newest_specimen_user' WHERE specimen_reference_number = '$selected_specimen_ref_hist'");
						mysql_query("UPDATE import_specimens SET type_of_specimen = '$newest_type_of_specimen' WHERE specimen_reference_number = '$selected_specimen_ref_hist'");
						mysql_query("UPDATE import_specimens SET specimen_delivery_date = '$newest_specimen_delivery_date' WHERE specimen_reference_number = '$selected_specimen_ref_hist'");
						mysql_query("UPDATE import_specimens SET specimen_cremation_date = '$newest_specimen_cremation_date' WHERE specimen_reference_number = '$selected_specimen_ref_hist'");
						mysql_query("UPDATE import_specimens SET specimen_serology = '$newest_specimen_serology' WHERE specimen_reference_number = '$selected_specimen_ref_hist'");
						mysql_query("UPDATE import_specimens SET specimen_images = '$newest_specimen_images' WHERE specimen_reference_number = '$selected_specimen_ref_hist'");
						mysql_query("UPDATE import_specimens SET specimen_imports_removed = '$newest_specimen_imports_removed' WHERE specimen_reference_number = '$selected_specimen_ref_hist'");
						mysql_query("UPDATE import_specimens SET specimen_notes = '$newest_specimen_notes' WHERE specimen_reference_number = '$selected_specimen_ref_hist'");
						mysql_query("UPDATE import_specimens SET imports_cause_of_death = '$newest_imports_cause_of_death' WHERE specimen_reference_number = '$selected_specimen_ref_hist'");
						mysql_query("UPDATE import_specimens SET imports_sex = '$newest_imports_sex' WHERE specimen_reference_number = '$selected_specimen_ref_hist'");

						header("Location: specimen_history_edit_import.php");
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

    <title>Specimen History - Edit An Import</title>

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
		.popover{
			width:250px;    
		}	
    </style>

</head>

<body>

<?php
        
    	include_once 'php_functionality/imports/imports_navigation_menu.php';
		
?>
    <div id="wrapper">
		
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                                    
                        <div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">Specimen History - Edit An Import - <?php echo $new_specimen_reference_number;?></h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="imports_home.php">Home</a>
                                      </li>
                                      <li  class="active">
                                      	<a href="#">Specimen History - Edit An Import</a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
										
									<div class="row">

											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                   		<tr>
															<td class="formLabel" align="left"><label id="donorRefNumLabel" for="donor_reference_num_imports">Reference Number:</label></td>
															<td class="formInput"><input type="number" class="form-control" id="donor_reference_num_imports" name="donor_reference_num_imports" value="<?php echo $new_specimen_reference_number; ?>" disabled></td>
		 												</tr>
                                        				<tr>
															<td class="formLabel" align="left"><label id="itemNumLabel" for="item_num_imports">Item Number:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="item_num_imports" name="item_num_imports" value="<?php echo $new_specimen_item_number; ?>" required></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="userLabel" for="user_imports">User:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="user_imports" name="user_imports" value="<?php echo $new_specimen_user; ?>" required></td>
		 												</tr>
                                                         <tr>
															<td class="formLabel" align="left"><label id="userLabel" for="type_of_specimen">Type of Specimen:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="type_of_specimen" name="type_of_specimen" value="<?php echo $new_type_of_specimen; ?>" required></td>
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
																	<input type="text" class="form-control enable_disable" name="delivery_date_imports" id="delivery_date_imports" value="<?php echo $newDate_delivery;?>" required/>
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
																	<input type="text" class="form-control enable_disable" name="cremation_date_imports" id="cremation_date_imports" value="<?php echo $newDate_cremation;?>" required/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                         <tr>
															<td class="formLabel" align="left"><label id="cause_of_deathLabel" for="imports_cause_of_death">Cause of Death:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="imports_cause_of_death" name="imports_cause_of_death" value="<?php echo $new_imports_cause_of_death;?>" required></td>
														</tr>
                                                      <tr>
															<td class="formLabel" align="left"><label id="serology_importsLabel" for="serology_imports">Serology:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="serology_imports" name="serology_imports" value="<?php echo $new_specimen_serology;?>" required></td>
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
																echo '<input type="radio"  class="enable_disable" name="images_imports" id="images_imports"  value="1" checked="checked" required/>';
															}
																	else {
																echo '<input type="radio"  class="enable_disable"  name="images_imports" id="images_imports"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($new_specimen_images == "0") {
																echo '<input type="radio"   class="enable_disable" name="images_imports" id="images_imports"  value="0" checked="checked"/>';
															}
																	else {
																echo '<input type="radio"  class="enable_disable" name="images_imports" id="images_imports"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="implants_removed_importsLabel" for="implants_removed_imports">Imports Removed:</label></td>
                                                            <td class="formInput">
                                                                <label class="radio-inline">
                                                                <?php if($new_specimen_imports_removed == "1") {
																echo '<input type="radio"  class="enable_disable" name="implants_removed_imports" id="implants_removed_imports"  value="1" checked="checked" required/>';
															}
																	else {
																echo '<input type="radio"   class="enable_disable" name="implants_removed_imports" id="implants_removed_imports"  value="1"/>';
																}; ?>
                                                                Yes</label> 
                                                                <label class="radio-inline">
                                                                    <?php if($new_specimen_imports_removed == "0") {
																echo '<input type="radio"   class="enable_disable" name="implants_removed_imports" id="implants_removed_imports"  value="0" checked="checked"/>';
															}
																	else {
																echo '<input type="radio"  class="enable_disable" name="implants_removed_imports" id="implants_removed_imports"  value="0"/>';
																}; ?>
                                                                No</label>
                                                            </td>
		 												</tr>
                                                        </table>
                                                        <table id="notesTable1" class="centred_text">
                                                          <tr>
                                                              <td class="formLabel" align="left"><label id="notesLabel" for="notes">Notes:</label></td>
                                                              <td class="formInput"><textarea type="text" class="form-control enable_disable" id="imports_notes" name="imports_notes" style="resize: none"><?php echo $new_specimen_notes; ?></textarea></td>
                                                          </tr>
                                                        </table>
                                                    <table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell"></td>
															<td class="buttons_table_cell">
																<button type="button" class="btn btn-lg btn-purple form_1_button" value="edit" id="edit_button"><i class="fa fa-pencil"></i> Edit</button>
															</td>
															<td class="buttons_table_cell"></td>
														</tr>
													</table>
													<table id="save_cancel_table" class="buttons_table centred_text">
														<tr class="buttons_table_row">
															<td class="save_cancel_cell"><button type="button" class="btn btn-lg btn-danger save_cancel_btn" name="cancel_editing" id="cancel_editing" value="Cancel" onclick="refresh_page()">Cancel</button></td>
															<td class="space_cell"></td>
															<td class="save_cancel_cell"><input class="btn btn-lg btn-primary save_cancel_btn" type="submit" name="save_new_specimen_info" id="save_new_specimen_info" value="Save"/></td>
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
		
		    // make all input boxes disabled on page load. Toggle enabled/disabled state when edit button is clicked
	$(document).ready(function() {
	
	$(".enable_disable").prop('disabled', true);
	$('#cancel_editing').attr("disabled", true);
	$('#save_new_specimen_info').attr("disabled", true);
				
    $('#edit_button').click(function() {
			$('.enable_disable').each(function() {
				if ($(this).attr('disabled')) {
					$(this).removeAttr('disabled');
					$('#cancel_editing').attr("disabled", false);
					$('#save_new_specimen_info').attr("disabled", false);
				}
				else {
					$(this).attr({
						'disabled': 'disabled'
					});
					$('#cancel_editing').attr("disabled", true);
					$('#save_new_specimen_info').attr("disabled", true);
				}
			});
		});
	});
	
	function refresh_page() {
		window.location = "specimen_history_edit_import.php";
	}

	</script>
    

</body>

</html>