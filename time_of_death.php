<?php ob_start(); include_once 'init.php';include_once 'functions/users.php';
if(logged_in() !== true) {
	header("Location: index.php");
} 
error_reporting(E_ERROR | E_PARSE);

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Time of Death - Donors Table</title>

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
			background-color:#1ab394 !important;
		}
		.blank_row
		{
		  height: 10px !important; /* Overwrite any previous rules */
		  background-color: #FFFFFF;
		}

    </style>

</head>

<body>

	<div id="wrapper">
	
	<?php
		include 'php_functionality/navigation_menu.php';
		$show_form = true;
 
 	if (empty($_POST) === false) {
		// if the errors array is empty and the user has submitted the form then create the user and redirect the user
		if($_POST['sumbitBT']) {
				if(empty($_POST['donor_ref_hidden']) === false) {
					$show_form = false;
					
					$_SESSION['selected_donor_ref_hist'] = $_POST['donor_ref_hidden'];
					$selected_donor_ref_hist = $_SESSION['selected_donor_ref_hist'];
					
					$history_location_to_go_to = $_POST['select_history_location'];
						
			}
		}
	} 
	
	if (empty($_POST) === false) {
		if($_POST['delete_donor']) {
		
				$delete_selected_donor = $_POST['donor_ref_hidden'];
				
				mysql_query("DELETE FROM donor_table WHERE donor_reference_number = '$delete_selected_donor'");
				
				unset($_SESSION['selected_donor_ref_hist']);
		}
	}
	
	if($show_form == false) {
			header("Location: donor_history_5_donor_receipt_details.php");
	}
	
			
	?>
			
				<div id="page-wrapper">
				
						<div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">List of Donors</h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="dashboard.php">Home</a>
                                      </li>
                                      <li>
                                      	<a href="#">Donors</a>
                                      </li>
                                      <li class="active">
                                          <a href="donors_table.php"><strong>Time of Death - List of Donors</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
						
						<div class="row">
							<div class="col-lg-12">
							
								
										<div class="ibox-title">
                                			<h4>List of Donors
                                    		</h4>
                                         </div>
									
                                  <div class="panel panel-default">
									<?php 
										if($show_form == true) {
									?>
									<div class="panel-body">
										<div class="dataTable_wrapper">
											<div class="table-responsive">
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
                                                       	 		include 'php_functionality/donor_table_list.php';   
                                                    	?>
    												</tbody>
    											</table>
											</div><!-- /.table-responsive -->
										</div><!-- .dataTableW_wrapper -->
									</div><!-- /.panel-body -->
									
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
														
													<div><!-- modal body end -->
													<div class="modal-footer">
														<button type="button" class="btn btn-default btn-pat-selected-size" data-dismiss="modal">Close</button>
														<input class="btn btn-primary btn-pat-selected-size" style="width: 200px" type="submit" name="sumbitBT" id="sumbitBT" value="Go to Donor Receipt Details"/>
													</div><!-- modal footer end -->
												</div><!-- modal content end -->
											</form>
										</div><!-- modal dialog .modal-lg end -->
									  </div><!-- modal fade .bs-example-modal-lg end -->
									
								</div><!-- /.panel -->
								<?php
									}
								?>
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#patientTable').DataTable({
                responsive	: true,
                'bJQueryUI' : true,
                "sDom"		: 'T<"clear"><"top pull-left"l><"top pull-right"f>rt<"bottom pull-left"i><"bottom pull-right"p>',
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
	
    </script>

</body>

</html>