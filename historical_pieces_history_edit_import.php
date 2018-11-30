<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in_historical_pieces() !== true) {
	header("Location: index.php");
} 
// Prevent user from opening the patient history tabs without first selecting a patient
if(no_hist_piece_sepcimen_hist_selected() != true) {
	header("Location: historical_pieces_list_table.php");
}

$selected_hist_piece_ref_number = $_SESSION['selected_hist_piece_ref_number'];
echo $selected_hist_piece_ref_number;

    	$connect_error1 = 'Database connection error - histPieceEdit';
        $histRefEdit = "SELECT * FROM historical_pieces_table WHERE donor_reference_num_hist_pieces = $selected_hist_piece_ref_number";
		$result = mysqli_query($db_connect,$histRefEdit) or die($connect_error1);
					
		while($record = mysqli_fetch_assoc($result)) {
				
				$new_ref_num = $record['donor_reference_num_hist_pieces'];
				$new_type = $record['type_of_specimen'];
				$new_type_other = $record['other_specimen_type'];
				$new_description = $record['description'];
				
				$var_c = $record['date_aquired_on'];
				$newdate_aquired_on = date('d-m-Y', strtotime($var_c));
				
				$var_d = $record['date_disposed_of'];
				$newdate_disposed_of = date('d-m-Y', strtotime($var_d));
		}

		if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['save_new_hist_piece_info']) {
							$var_a = $_POST['aquired_on_date'];
							$aquired_on_date = date('Y-m-d', strtotime($var_a));
							
							$var_b = $_POST['disposed_of_date'];
							$disposed_of_date = date('Y-m-d', strtotime($var_b));
							
							$type_of_specimen = $_POST['type_of_specimen'];
							$description = $_POST['description'];
							$specTypeQ = "UPDATE historical_pieces_table SET type_of_specimen = '$type_of_specimen' WHERE donor_reference_num_hist_pieces = '$selected_hist_piece_ref_number'";
							mysqli_query($db_connect,$specTypeQ);
							/*
							mysql_query("UPDATE historical_pieces_table SET description = '$description' WHERE donor_reference_num_hist_pieces = '$selected_hist_piece_ref_number'");
							mysql_query("UPDATE historical_pieces_table SET disposed_of_date = '$disposed_of_date' WHERE donor_reference_num_hist_pieces = '$selected_hist_piece_ref_number'");
							mysql_query("UPDATE historical_pieces_table SET aquired_on_date = '$aquired_on_date' WHERE donor_reference_num_hist_pieces = '$selected_hist_piece_ref_number'");
					
							if(!empty($_POST['other_specimen_type'])) {
									
								$other_specimen_type_1 = $_POST['other_specimen_type'];
												   
			   					mysql_query("UPDATE historical_pieces_table SET other_specimen_type = '$other_specimen_type_1' WHERE donor_reference_num_hist_pieces = '$selected_hist_piece_ref_number'");
							}*/

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

    <title>Historial Piece History - Edit An Historical Piece</title>

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
        
    	include 'php_functionality/historical_pieces/historical_pieces_navigation_menu.php';
		
?>
    <div id="wrapper">
		
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                                    
                        <div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">Historical Piece History - Edit A Historical Piece - <?php echo $new_ref_num;?></h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="historical_pieces_home.php">Home</a>
                                      </li>
                                      <li  class="active">
                                      	<a href="#">Historical Piece History - Edit A Historical Piece</a>
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
															<td class="formLabel" align="left"><label id="donorRefNumLabel" for="donor_reference_num_hist_pieces">Reference Number:</label></td>
															<td class="formInput"><input type="number" class="form-control" id="donor_reference_num_hist_pieces" name="donor_reference_num_hist_pieces" value="<?php echo $new_ref_num;?>" min="1" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="userLabel" for="type_of_specimen">Type of Specimen:</label></td>
															<td class="formInput">
                                                            <select class="form-control enable_disable" id="type_of_specimen" name="type_of_specimen" placeholder="Select Type of Specimen" data-required="true">
                                                                <?php if($new_type == "Bone") { echo '<option value="Bone" selected="selected">Bone</option>'; } else { echo '<option value="Bone">Bone</option>';}?> 
                                                                <?php if($new_type == "Pot") { echo '<option value="Pot" selected="selected">Pot</option>'; } else { echo '<option value="Pot">Pot</option>';}?> 
                                                                <?php if($new_type == "Plastinate") { echo '<option value="Plastinate" selected="selected">Plastinate</option>'; } else { echo '<option value="Plastinate">Plastinate</option>';}?> 
                                                                <?php if($new_type == "Other") { echo '<option value="Other" selected="selected">Other</option>'; } else { echo '<option value="Other">Other</option>';}?> 
                                                              </select>
                                                              </td>
		 												</tr>
                                                         <?php if($new_type_other != "") { echo '
                                                         <tr>
															<td class="formLabel" align="left"><label class="float-left" id="other_specimen_typeLabel" for="other_specimen_type">Other Specimen Type:</label></td>
															<td class="formInput"><input type="text" class="form-control enable_disable" id="other_specimen_type" name="other_specimen_type" value="'.$new_type_other .'"></td>
														</tr>
														';
														 }
														?>
		 												<tr>
															<td class="formLabel" align="left">
                                                            	<label id="aquired_on_dateLabel" for="aquired_on_date">Aquired On:
                                                                		<a data-toggle="popover" data-placement="right" title="Aquired On Date" data-content="Insert the date of aquisition in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepicker_aquired_on_date">
																	<input type="text" class="form-control enable_disable" name="aquired_on_date" id="aquired_on_date" value="<?php echo $newdate_aquired_on;?>"/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                        <tr>
															<td class="formLabel" align="left">
                                                            	<label id="disposed_of_dateLabel" for="disposed_of_date">Disposed Of:
                                                                		<a data-toggle="popover" data-placement="right" title="Disposed Of Date" data-content="Insert the date of disposal in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepicker_disposed_of_date">
																	<input type="text" class="form-control enable_disable" name="disposed_of_date" id="disposed_of_date" value="<?php echo $newdate_disposed_of;?>"/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                        
                                                     
                                                        </table>
                                                        <table id="notesTable1" class="centred_text">
                                                          <tr>
                                                              <td class="formLabel" align="left"><label id="descriptionLabel" for="description">Description:</label></td>
                                                              <td class="formInput"><textarea type="text" class="form-control enable_disable" id="description" name="description" style="resize: none"><?php echo $new_description; ?></textarea></td>
                                                          </tr>
													</table>
                                                       <table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell"></td>
															<td class="buttons_table_cell">
																<button type="button" class="btn btn-lg btn-blue-new form_1_button" value="edit" id="edit_button"><i class="fa fa-pencil"></i> Edit</button>
															</td>
															<td class="buttons_table_cell"></td>
														</tr>
													</table>
													<table id="save_cancel_table" class="buttons_table centred_text">
														<tr class="buttons_table_row">
															<td class="save_cancel_cell"><button type="button" class="btn btn-lg btn-danger save_cancel_btn" name="cancel_editing" id="cancel_editing" value="Cancel" onclick="refresh_page()">Cancel</button></td>
															<td class="space_cell"></td>
															<td class="save_cancel_cell"><input class="btn btn-lg btn-primary save_cancel_btn" type="submit" name="save_new_hist_piece_info" id="save_new_hist_piece_info" value="Save"/></td>
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
            $('#datepicker_aquired_on_date').datepicker({
            	format: "dd-mm-yyyy", 
      			clearBtn: true, 
      			changeMonth: true,
      			changeYear: true
            });
        });
		
		$(function () {
            $('#datepicker_disposed_of_date').datepicker({
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
	$('#save_new_hist_piece_info').attr("disabled", true);
				
    $('#edit_button').click(function() {
			$('.enable_disable').each(function() {
				if ($(this).attr('disabled')) {
					$(this).removeAttr('disabled');
					$('#cancel_editing').attr("disabled", false);
					$('#save_new_hist_piece_info').attr("disabled", false);
				}
				else {
					$(this).attr({
						'disabled': 'disabled'
					});
					$('#cancel_editing').attr("disabled", true);
					$('#save_new_hist_piece_info').attr("disabled", true);
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