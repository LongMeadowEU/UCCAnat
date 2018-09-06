<?php ob_start(); include_once 'init.php';include_once 'functions/users.php';
if(logged_in_imports() !== true) {
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

    <title>Specimen List</title>

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
			background-color:#9c30b8 !important;
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
		include 'php_functionality/imports/imports_navigation_menu.php';
		$show_form = true;
 
 	if (empty($_POST) === false) {
		// if the errors array is empty and the user has submitted the form then create the user and redirect the user
		if($_POST['view_spec_hist_submit_btn']) {
				if(empty($_POST['specimen_ref_num_hidden']) === false) {
					$show_form = false;
					
					$_SESSION['selected_specimen_ref_hist'] = $_POST['specimen_ref_num_hidden'];
					$selected_specimen_ref_hist = $_SESSION['selected_specimen_ref_hist'];
					
					header("Location: specimen_history_edit_import.php");
						
			}
		}
	} 
	
	if (empty($_POST) === false) {
		if($_POST['delete_specimen']) {
		
				$delete_selected_donor = $_POST['specimen_ref_num_hidden'];
				
				mysql_query("DELETE FROM import_specimens WHERE specimen_reference_number = '$delete_selected_donor'");
				
				unset($_SESSION['selected_specimen_ref_hist']);
		}
	}
			
	?>
			
				<div id="page-wrapper">
				
						<div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">Specimen List</h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="imports_home.php">Home</a>
                                      </li>
                                      <li class="active">
                                          <a href="specimen_list_table.php"><strong>List of Specimens</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
						
						<div class="row">
							<div class="col-lg-12">
							
								
										<div class="ibox-title">
                                			<h4>List of Specimens
                                    		</h4>
                                         </div>
									
                                  <div class="panel panel-purple">
									<?php 
										if($show_form == true) {
									?>
									<div class="panel-body">
										<div class="dataTable_wrapper">
											<div class="table-responsive">
												<table class="table table-striped table-bordered table-hover sortable" id="patientTable">
													<thead>
                                                        <tr>
                                                        	<th>Reference </br>Number</th>
                                                            <th>Item </br>Number</th>
                                                            <th>User</th>
                                                            <th>Type of </br>Specimen</th>
                                                   			<th>Delivery </br>Date</th>
                                                            <th>Cremation </br>Date</th>
                                                            <th>Serology</th>
                                                            <th>Sex</th>
                                                            <th>Images</th>
                                                            <th>Imports </br>Removed</th>
                                                        </tr>
													</thead>
                                                	<tbody>
													 	<?php       
                                                       	 		include 'php_functionality/imports/specimen_table_list.php';   
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
															<h3>Specimen Selected<input type="text" class="form-control pull-right input-sm centred_text" id="specimen_ref_num_hidden" name="specimen_ref_num_hidden" style="width: 10%" readonly/>
                                                            </h3>
													</div><!-- modal header end -->
													<div class="modal-body">
													  <h4 class="text-center" id="donor_name_header"></h4>
												  
												  
													  <table class="table table-striped" id="tblGrid">
															<thead id="tblHead">
																	  <tr>
																	  	<th>Reference </br>Number</th>
                                                            			<th>Item </br>Number</th>
                                                            			<th>User</th>
                                                                        <th>Type of </br>Specimen</th>
                                                   						<th>Delivery </br>Date</th>
                                                            			<th>Cremation </br>Date</th>
                                                            			<th>Serology</th>
                                                                        <th>Sex</th>
                                                            			<th>Images</th>
                                                            			<th>Imports </br>Removed</th>
																	  </tr>
															</thead>
															<tbody>
																	  <tr>
																	  	<td id="ref_num_JS">$from php</td>
																		<td id="item_num_JS">$from php</td>
																		<td id="user_JS">$from php</td>
                                                                        <td id="type_of_spec_JS">$from php</td>
																		<td id="delivery_date_JS">$from php</td>
																		<td id="cremation_date_JS">$from php</td>
                                                                        <td id="serology_JS">$from php</td>
                                                                        <td id="sex_JS">$from php</td>
                                                                        <td id="images_JS">$from php</td>
                                                                        <td id="import_removed_JS">$from php</td>
																	  </tr>
															 </tbody>
													   </table>
													<div><!-- modal body end -->
													<div class="modal-footer">
														<button type="button" class="btn btn-default btn-pat-selected-size" data-dismiss="modal">Close</button>
														<input class="btn btn-purple btn-pat-selected-size" type="submit" name="view_spec_hist_submit_btn" id="view_spec_hist_submit_btn_new" value="View History"/>
                                                        <input class="btn btn-danger pull-left btn-pat-selected-size" type="submit" name="delete_specimen" id="delete_specimen" value="Delete Specimen" onclick="return confirm('Are you sure you want to delete this specimen from the database?') && confirm('Are you really sure you want to delete this specimen?\nAll of their data will be permanently erased from the database.')"/>
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
				"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
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
	var current_selected_item_num;
	var current_selected_user;
	var current_selected_type_of_spec;
	var current_selected_delivery_date;
	var current_selected_cremation_date;
	var current_selected_serology;
	var current_selected_sex;
	var current_selected_images;
	var current_selected_import_removed;
	
	$(document).ready(function() {
		var table = $('#patientTable').DataTable();
 
	$('#patientTable tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			selected_current_row = table.row( this ).data();
			//$('.selected').css('background-color','#1ab394');
			current_selected_ref_num = selected_current_row[0]
			current_selected_item_num = selected_current_row[1];
			current_selected_user = selected_current_row[2];
			current_selected_type_of_spec = selected_current_row[3];
			current_selected_delivery_date = selected_current_row[4];
			current_selected_cremation_date = selected_current_row[5];
			current_selected_serology = selected_current_row[6];
			current_selected_sex = selected_current_row[7];
			current_selected_images = selected_current_row[8];
			current_selected_import_removed = selected_current_row[9];
			
			// places the id of the selected patient in a hidden text field so it can be retrieved by PHP
				$(function () {
 					 $('#specimen_ref_num_hidden').val(current_selected_ref_num);
				})
				
				$(function () {
					$('#myModal').modal({show:true});
					
					$('#donor_name_header').html(current_selected_ref_num);
					$('#ref_num_JS').html(current_selected_ref_num);
					$('#item_num_JS').html(current_selected_item_num);
					$('#user_JS').html(current_selected_user);
					$('#type_of_spec_JS').html(current_selected_type_of_spec);
					$('#delivery_date_JS').html(current_selected_delivery_date);
					$('#cremation_date_JS').html(current_selected_cremation_date);
					$('#serology_JS').html(current_selected_serology);
					$('#sex_JS').html(current_selected_sex);
					$('#images_JS').html(current_selected_images);
					$('#import_removed_JS').html(current_selected_import_removed);
				
				})
		} else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            // disable button click when no row is selected
            selected_current_row = "";
            // removes ID from the patient hidden id input field. 
				$(function () {
 					 $('#specimen_ref_num_hidden').val("");
				})
        }
	} );
 		
	} ); 
	
    </script>

</body>

</html>