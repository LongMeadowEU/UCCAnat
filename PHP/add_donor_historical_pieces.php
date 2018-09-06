<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in_historical_pieces() !== true) {
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

    <title>Add A Historical Piece</title>

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
        
    	include 'php_functionality/historical_pieces/historical_pieces_navigation_menu.php';
    	$show_form = true;
    	
    	if (empty($_POST) === false) {
			// if the errors array is empty and the user has submitted the form then create the user and redirect the user
			if($_POST['submitHistPieceInfo']) {
					if(empty($_POST['donor_reference_num_hist_pieces']) === false) {
							$show_form = false;
							
							$_SESSION['specimenRefNumSession'] = $_POST['donor_reference_num_hist_pieces'];
							
							$var_a = $_POST['aquired_on_date'];
							$aquired_on_date = date('Y-m-d', strtotime($var_a));
							
							$var_b = $_POST['disposed_of_date'];
							$disposed_of_date = date('Y-m-d', strtotime($var_b));
							
							$hist_piece_info_data = array(
												   'donor_reference_num_hist_pieces' 	=> 	$_POST['donor_reference_num_hist_pieces'],
												   'type_of_specimen' 		=> 	$_POST['type_of_specimen'],
												   'date_aquired_on'		=> 	$aquired_on_date,
												   'date_disposed_of' 	=> 	$disposed_of_date, 
												   'description'		=>	$_POST['description']
												   );
												   
							add_new_specimen_hist_piece($hist_piece_info_data);
							
							$specimenRefNumSession = $_SESSION['specimenRefNumSession'];
							
							if(!empty($_POST['other_specimen_type'])) {
									
								$other_specimen_type_1 = $_POST['other_specimen_type'];
												   
			   					mysql_query("UPDATE historical_pieces_table SET other_specimen_type = '$other_specimen_type_1' WHERE donor_reference_num_hist_pieces = '$specimenRefNumSession'");
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
                                  <h2 class="page-header" id="homepageHeader">Add a Historical Piece</h2>
                                  <ol class="breadcrumb">
                                      <li>
										<a href="historical_pieces_home.php">Home</a>
                                      </li>
                                      <li class="active">
                                          <a href="add_donor_historical_pieces.php"><strong>Add a Historical Piece</strong></a>
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
															<td class="formLabel" align="left"><label id="donorRefNumLabel" for="donor_reference_num_hist_pieces">Reference Number:</label></td>
															<td class="formInput"><input type="number" class="form-control" id="donor_reference_num_hist_pieces" name="donor_reference_num_hist_pieces" placeholder="Reference Number" min="1" required></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="userLabel" for="type_of_specimen">Type of Specimen:</label></td>
															<td class="formInput">
                                                            <select class="form-control" id="type_of_specimen" name="type_of_specimen" placeholder="Select Type of Specimen" required data-required="true">
                                                                <option value="" disabled selected="selected" hidden>Please select one</option>
                                                                <option value="Bone">Bone</option>
                                                                <option value="Pot">Pot</option>
                                                                <option value="Plastinate">Plastinate</option>
                                                                <option value="Other">Other</option>
                                                              </select>
                                                              </td>
		 												</tr>
                                                         <tr id="if_other_specimen_type">
															<td class="formLabel" align="left"><label class="float-left" id="other_specimen_typeLabel" for="other_specimen_type">Other Specimen Type:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="other_specimen_type" name="other_specimen_type" placeholder="Other Specimen Type - Please Specify"></td>
														</tr>
		 												<tr>
															<td class="formLabel" align="left">
                                                            	<label id="aquired_on_dateLabel" for="aquired_on_date">Aquired On:
                                                                		<a data-toggle="popover" data-placement="right" title="Aquired On Date" data-content="Insert the date of aquisition in the format: <br/>dd-mm-yyyy. <br/><br/>For example 18-06-1982.">
																			<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
																		</a>
                                                                </label>
                                                            </td>
																<td class="formInput"><div class="input-group date" id="datepicker_aquired_on_date">
																	<input type="text" class="form-control" name="aquired_on_date" id="aquired_on_date" placeholder="Aquired On" required/>
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
																	<input type="text" class="form-control" name="disposed_of_date" id="disposed_of_date" placeholder="Disposed On" required/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                        
                                                     
                                                        </table>
                                                        <table id="notesTable1" class="centred_text">
                                                          <tr>
                                                              <td class="formLabel" align="left"><label id="descriptionLabel" for="description">Description:</label></td>
                                                              <td class="formInput"><textarea type="text" class="form-control" id="description" name="description" style="resize: none"></textarea></td>
                                                          </tr>
                                                        </table>
													</table>
													</table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitHistPieceInfo" value="Save"/></td>
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
									$result = mysql_query("SELECT * FROM historical_pieces_table WHERE donor_reference_num_hist_pieces = $specimenRefNumSession") or die($connect_error1);
												
									while($record = mysql_fetch_assoc($result)) {
										
										$new_donor_reference_num_hist_pieces = $record['donor_reference_num_hist_pieces'];
										$new_type_of_specimen = $record['type_of_specimen'];
										$new_other_specimen_type = $record['other_specimen_type'];
										$new_date_aquired_on = $record['date_aquired_on'];
										$new_date_disposed_of = $record['date_disposed_of'];
										$new_description = $record['description'];
											
									}
									
									$var_c = $new_date_aquired_on;
									$new_date_aquired_on_1 = date('d-m-Y', strtotime($var_c));
									
									$var_f = $new_date_disposed_of;
									$new_date_disposed_of_1 = date('d-m-Y', strtotime($var_f));
									
								?>
											<form class="form-horizontal" role="form" id="searchForm" action="" method="POST">
                                        		<div class="form-group centred_text">
                                        			<table id="genInfoFormTable" class="centred_text add_patient_table">
                                                   		<tr>
															<td class="formLabel" align="left"><label id="donorRefNumLabel" for="donor_reference_num_hist_pieces">Reference Number:</label></td>
															<td class="formInput"><input type="number" class="form-control" id="donor_reference_num_hist_pieces" name="donor_reference_num_hist_pieces" value="<?php echo $new_donor_reference_num_hist_pieces;?>" min="1" disabled></td>
		 												</tr>
                                                        <tr>
															<td class="formLabel" align="left"><label id="userLabel" for="type_of_specimen">Type of Specimen:</label></td>
															<td class="formInput">
                                                            <select class="form-control" id="type_of_specimen" name="type_of_specimen" placeholder="Select Type of Specimen" disabled data-required="true">
                                                                <?php if($new_type_of_specimen == "Bone") { echo '<option value="Bone" selected="selected">Bone</option>'; } else { echo '<option value="Bone">Bone</option>';}?> 
                                                                <?php if($new_type_of_specimen == "Pot") { echo '<option value="Pot" selected="selected">Pot</option>'; } else { echo '<option value="Pot">Pot</option>';}?> 
                                                                <?php if($new_type_of_specimen == "Plastinate") { echo '<option value="Plastinate" selected="selected">Plastinate</option>'; } else { echo '<option value="Plastinate">Plastinate</option>';}?> 
                                                                <?php if($new_type_of_specimen == "Other") { echo '<option value="Other" selected="selected">Other</option>'; } else { echo '<option value="Other">Other</option>';}?> 
                                                              </select>
                                                              </td>
		 												</tr>
                                                         <?php if($new_other_specimen_type != "") { echo '
                                                         <tr>
															<td class="formLabel" align="left"><label class="float-left" id="other_specimen_typeLabel" for="other_specimen_type">Other Specimen Type:</label></td>
															<td class="formInput"><input type="text" class="form-control" id="other_specimen_type" name="other_specimen_type" value="'.$new_other_specimen_type .'" disabled></td>
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
																	<input type="text" class="form-control" name="aquired_on_date" id="aquired_on_date" value="<?php echo $new_date_aquired_on_1;?>" disabled/>
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
																	<input type="text" class="form-control" name="disposed_of_date" id="disposed_of_date" value="<?php echo $new_date_disposed_of_1;?>" disabled/>
																		<span class="input-group-addon">
																		<i class="glyphicon glyphicon-calendar"></i>
																		</span>
																</div></td>
														</tr>
                                                        
                                                     
                                                        </table>
                                                        <table id="notesTable1" class="centred_text">
                                                          <tr>
                                                              <td class="formLabel" align="left"><label id="descriptionLabel" for="description">Description:</label></td>
                                                              <td class="formInput"><textarea type="text" class="form-control" id="description" name="description" style="resize: none" disabled><?php echo $new_description; ?></textarea></td>
                                                          </tr>
                                                        </table>
													<table class="buttons_table">													
														<tr class="buttons_table_row">
															<td class="buttons_table_cell pull-left"><input class="btn btn-lg btn-primary form_1_button" type="submit" name="submitHistPieceInfo" value="Save" disabled/></td>
															<td class="buttons_table_cell pull-right"><a href="hist_piece_specimen_added.php">	
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
	
	$(document).ready(function(){

		$('#if_other_specimen_type').hide();
		
		$('#type_of_specimen').on('change', function() {
  			//alert( this.value ); // or $(this).val()

			if(this.value == "Other"){
				//alert( this.value );
				$('#if_other_specimen_type').show();
			} else {
				$('#if_other_specimen_type').hide();
			}
		});
		
		
	});
		
	</script>
    

</body>

</html>
