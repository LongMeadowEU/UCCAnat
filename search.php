<?php ob_start(); include_once 'init.php';include_once 'functions/users.php';
if(logged_in() !== true) {
	header("Location: index.php");
} 

	$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
	$search = $_POST['search'];
	$radio = $_POST['optionsRadiosInline'];
	
	$show_form_new = true;
	
	if($radio == "donorName") {
		$result = mysqli_query($db_connect,"SELECT * FROM donor_table WHERE CONCAT(first_name, ' ', sur_name) LIKE '%$search%' OR sur_name LIKE '%$search%'") or die($connect_error1);
	} else if($radio == "referenceNum") {
		$result = mysqli_query($db_connect,"SELECT * FROM donor_table WHERE donor_reference_number LIKE '%$search%'") or die($connect_error1);
	} else if($radio == "donorDOB") {
		
		$result = mysqli_query($db_connect,"SELECT * FROM donor_table WHERE date_of_birth LIKE '%$search%'") or die($connect_error1);
	}
	
	$number = mysqli_num_rows($result);

		// if the errors array is empty and the user has submitted the form then create the user and redirect the user
		if(isset($_POST['sumbitBT_new'])) {
				if(empty($_POST['donor_ref_hidden']) === false) {
					$show_form_new = false;
					
					$_SESSION['selected_donor_ref_hist'] = $_POST['donor_ref_hidden'];
					$selected_donor_ref_hist = $_SESSION['selected_donor_ref_hist'];
					
					$history_location_to_go_to = $_POST['select_history_location'];
						
			}
		}
		
	if($show_form_new == false) {
		if($history_location_to_go_to == 'general_info_btn') {
			header("Location: donor_history_1_general_information.php");
		} else if($history_location_to_go_to == 'contact_details_btn') {
			header("Location: donor_history_2_contact_details.php");
		} else if($history_location_to_go_to == 'burial_witness_btn') {
			header("Location: donor_history_3_burial_witness_info.php");
		} else if($history_location_to_go_to == 'medical_hist_btn') {
			header("Location: donor_history_4_medical_history.php");
		} else if($history_location_to_go_to == 'donor_receipt_btn') {
			header("Location: donor_history_5_donor_receipt_details.php");
		} else if($history_location_to_go_to == "mortuary_info_btn") {
			header("Location: donor_history_6_mortuary_info.php");
		} else if($history_location_to_go_to == "consent_info_btn"){
			header("Location: donor_history_7_consent_info.php");
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

    <title>Search For A Donor: Results</title>

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
    
    <!-- datatables CSS -->
    <link href="bower_components/datatables/media/css/dataTables.tableTools.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
    	.clickable{
		    cursor: pointer;   
		}
		#filter-panel {
			display: none;
		}
		tr.selected td{
			background-color:#f69428 !important;
		}

    </style>

</head>

<body>

<?php
	include_once 'php_functionality/navigation_menu.php';
?>
	
	<div id="page-wrapper">
				
			<div class="row"> 

                        <div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-12">
                                  <h2 class="page-header" id="homepageHeader">Search Results <button onclick="redirect()" class="btn btn-orange pull-right" style="vertical-align: middle; padding: 1px; width: 120px">New Search <i class="glyphicon glyphicon-search"></i></button></h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="dashboard.php">Home</a>
                                      </li>
                                      <li>
                                      	<a href="search_for_donor.php">Search for a Donor</a>
                                      </li>
                                      <li class="active">
                                          <a href="#"><strong>Search Results</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
                          
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-orange" style="margin-top: 2%">
								
									<div class="panel-heading">
										 <h4 class="panel-title"><?php echo $number ?> results found searching for <?php echo ucwords("$search") ?><span class="pull-right">Search Category - 
										 <?php 
											 if($radio == "donorName") {
												echo 'Donor Name';
											 } else if ($radio == "referenceNum") {
												echo 'Reference Number';
											 } else if ($radio == "donorDOB") {
												echo 'Donor Date of Birth';
											 }
										  ?>
										 </span></h4>
									</div><!-- /.panel-heading -->
									<?php 
										if(mysqli_num_rows($result) != 0) {
									?>
									<div class="panel-body">
										<div class="dataTable_wrapper">
											<div class="table-responsive">
											<?php
											if (mysqli_num_rows($result) > 0) {
											?>
												<table class="table table-striped table-bordered table-hover sortable" id="patientTable">
													<thead>
                                                        <tr>
                                                        	<th>Reference Number</th>
                                                            <th>Firstname</th>
                                                            <th>Surname</th>
                                                   			<th>Date of Birth</th>
                                                            <th>Sex</th>
                                                            <th>Religion</th>
                                                        </tr>
													</thead>
                                                	<tbody>
                                        <?php				
										while($row = mysqli_fetch_assoc($result)) {
	
												$date_of_birth = $row['date_of_birth'];
												$formatted_date_of_birth = date('d-m-Y', strtotime($date_of_birth));
			
											echo '<tr>';
												echo '<td>' . 	$row['donor_reference_number']		 . '</td>';
												echo '<td>' . 	ucwords($row['first_name']) 	. '</td>';
												echo '<td>' . 	ucwords($row['sur_name']) 	. '</td>';
												echo '<td>' . 	$formatted_date_of_birth 		. '</td>';
												echo '<td>' . 	ucwords($row['sex']) 	. '</td>';
												echo '<td>' . 	ucwords($row['religion']) 	. '</td>';
											echo '</tr>';
											
										}; 
										}?>
										
							
    												</tbody>
    											</table>
											</div><!-- /.table-responsive -->
										</div><!-- .dataTableW_wrapper -->
									</div><!-- /.panel-body -->
								<?php 
										} else {
											echo '
											<div class="centred_text" style="margin-top: 5%; margin-bottom: 5%">
												<p class="lead">Sorry, there were no results found matching your search.</p>
											</div>
											';
										}
								?>
                                
                                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
									  <div class="modal-dialog modal-lg">
									  	<form role="form" id="pat_select_form" action="" method="POST">
											<div class="modal-content">
												  <div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">×</button>
															<h3>Donor Selected<input type="text" class="form-control pull-right input-sm centred_text" id="donor_ref_hidden" name="donor_ref_hidden" style="width: 10%" readonly/>
                                                            </h3>
													</div><!-- modal header end -->
													<div class="modal-body">
													  <h4 class="text-center" id="donor_name_header"></h4>
												  
												  
													  <table class="table table-striped" id="tblGrid">
															<thead id="tblHead">
																	  <tr>
																	  	<th>Reference Number</th>
                                                                        <th>Firstname</th>
                                                                        <th>Surname</th>
                                                                        <th>Date of Birth</th>
                                                                        <th>Sex</th>
                                                                        <th>Religion</th>
																	  </tr>
															</thead>
															<tbody>
																	  <tr>
																	  	<td id="ref_num_JS">$from php</td>
																		<td id="firstname_JS">$from php</td>
																		<td id="surname_JS">$from php</td>
																		<td id="dob_JS">$from php</td>
																		<td id="sex_JS">$from php</td>
                                                                        <td id="religion_JS">$from php</td>
																	  </tr>
															 </tbody>
													   </table><br/>
													   <h4 class="text-center">Go To Donor History</h4><br/>
														<div class="row centred_text">
															<div class="btn-group btn-group-justified" data-toggle="buttons">
																<table style="width: 100%">
                                                                	<tr style="width: 100%">
                                                                    <td style="width: 20%">
																	<label class="btn btn-grey btn-rounded centred_text" style="width: 75%">
																		<input type="radio" name="select_history_location" value="general_info_btn" checked="checked"/> 
																			<span style="font-size:smaller;">General Information</span>
																	</label>
                                                                    </td>
                                                                    <td style="width: 20%">
																	<label class="btn btn-grey btn-rounded centred_text" style="width: 75%">
																		<input type="radio" name="select_history_location" value="contact_details_btn"/> 
																			<span style="font-size:smaller;"> Contact Details </span>
																	</label>
																	</td>
                                                                    <td style="width: 20%">
																	<label class="btn btn-grey btn-rounded centred_text" style="width: 75%">
																		<input type="radio" name="select_history_location" value="burial_witness_btn"/>
																			<span style="font-size:smaller;"> Burial & Witness Info </span>
																	</label>
                                                                    </td>
																	
                                                                 </tr>
                                                                 </table>
                                                                 <table style="width: 100%; margin-top:4%">
                                                                 <tr style="width: 100%">
                                                                 	<td style="width: 20%">
																	<label class="btn btn-grey btn-rounded centred_text" style="width: 75%">
																		<input type="radio" name="select_history_location" value="medical_hist_btn"/>
																			<span style="font-size:smaller;"> Medical History </span>
																	</label>
																	</td>
                                                                    <td style="width: 20%">
																	<label class="btn btn-grey btn-rounded centred_text" style="width: 75%">
																		<input type="radio" name="select_history_location" value="consent_info_btn"/>
																			<span style="font-size:smaller;"> Consent Info </span>
																	</label>
																	</td>
                                                                    <td style="width: 20%">
																	<label class="btn btn-grey btn-rounded centred_text" style="width: 75%">
																		<input type="radio" name="select_history_location" value="donor_receipt_btn"/>
																			<span style="font-size:smaller;"> Donor Receipt Details</span>
																	</label>
																	</td>
                                                                 </tr>
                                                                </table>
                                                                <table style="width: 100%; margin-top:4%">
                                                                <tr style="width: 100%">
                                                                 	<td style="width: 20%">
                                                                        <label class="btn btn-grey btn-rounded centred_text" style="width: 75%">
																		<input type="radio" name="select_history_location" value="mortuary_info_btn"/>
																			<span style="font-size:smaller;"> Mortuary Info</span>
																	</label>
																	</td>
                                                                    <td style="width: 20%">
                                                                        <label class="btn btn-grey btn-rounded centred_text" style="width: 75%">
																		<input type="radio" name="select_history_location" value="prosections_btn"/>
																			<span style="font-size:smaller;"> Prosections</span>
																	</label>
																	</td>
                                                                 </tr>
                                                                </table>
                                                               </div>
															</div>
														</div><br/>
													<div><!-- modal body end -->
													<div class="modal-footer">
														<button type="button" class="btn btn-default btn-pat-selected-size" data-dismiss="modal">Close</button>
														<input class="btn btn-primary btn-pat-selected-size" type="submit" name="sumbitBT_new" id="sumbitBT_new" value="View History"/>
													</div><!-- modal footer end -->
												</div><!-- modal content end -->
											</form>
										</div><!-- modal dialog .modal-lg end -->
									  </div><!-- modal fade .bs-example-modal-lg end -->
                                      
								</div><!-- /.panel -->
                               
							</div><!-- /.col-lg-12 -->
						</div><!-- /.row -->
								 
					</div><!-- /#page-wrapper -->	
						
	</div> <!-- /#wrapper -->
	
	<!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/datatables/media/js/release-datatablesextensionsTableToolsjsdataTables.tableTools.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
    <!-- dynamically change label of search text box and default placeholder when radio selection changes -->
	<script>
	
		$( ".targetRadio" ).change(function() {
				var selected = $("input[type='radio'][name=optionsRadiosInline]:checked", '#searchForm').val();
				var label = document.getElementById('dynamicChangingLabel');
				
				if(selected == "donorName") {
					label.innerHTML = "Name of Donor";
					$("#searchBox").attr("placeholder", "Enter Name of Donor");
				} else if(selected == "referenceNum") {
					label.innerHTML = "Reference Number";
					$("#searchBox").attr("placeholder", "Enter Reference Number");
				} else if(selected == "donorDOB") {
					label.innerHTML = "Donor Date of Birth";
					$("#searchBox").attr("placeholder", "Enter Donor Date of Birth");
				}
		});
		
	</script>
	
	<script> 
	
	 $(document).ready(function() {
        $('#patientTable').DataTable({
                responsive	: true,
				"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                'bJQueryUI' : true,
                "sDom"		: 'T<"clear"><"top pull-left"l>rt<"bottom pull-left"i><"bottom pull-right"p>',
                "tableTools": {
            		"sSwfPath": "copy_csv_xls_pdf.swf",
					"sRowSelect": "single"
       			}
        });
    });
    
	 // global variables
	var selected_current_row = "";
	var current_selected_ref_num;
	var current_selected_firstname;
	var current_selected_surname;
	var current_selected_dob;
	var current_selected_sex;
	var current_selected_rel;
	
	$(document).ready(function() {
		var table = $('#patientTable').DataTable();
 
	$('#patientTable tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			selected_current_row = table.row( this ).data();
			//$('.selected').css('background-color','#1ab394');
			current_selected_ref_num = selected_current_row[0]
			current_selected_firstname = selected_current_row[1];
			current_selected_surname = selected_current_row[2];
			current_selected_dob = selected_current_row[3];
			current_selected_sex = selected_current_row[4];
			current_selected_rel = selected_current_row[5];
			
			// places the id of the selected patient in a hidden text field so it can be retrieved by PHP
				$(function () {
 					 $('#donor_ref_hidden').val(current_selected_ref_num);
				})
				
				$(function () {
					$('#myModal').modal({show:true});
					
					$('#donor_name_header').html(current_selected_firstname + " "  + current_selected_surname);
					$('#ref_num_JS').html(current_selected_ref_num);
					$('#firstname_JS').html(current_selected_firstname);
					$('#surname_JS').html(current_selected_surname);
					$('#dob_JS').html(current_selected_dob);
					$('#sex_JS').html(current_selected_sex);
					$('#religion_JS').html(current_selected_rel);
					$('#donor_ref_hidden').html(current_selected_ref_num);
				
				})
		} else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            // disable button click when no row is selected
            selected_current_row = "";
            // removes ID from the patient hidden id input field. 
				$(function () {
 					 $('#donor_ref_hidden').val("");
				})
        }
	} );
 		
	} ); 

	function redirect() {
		window.location = "search_for_donor.php";
	}
	</script>

</body>

</html>

	