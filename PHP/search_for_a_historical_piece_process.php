<?php ob_start(); include_once 'init.php';include_once 'functions/users.php';
if(logged_in_historical_pieces() !== true) {
	header("Location: index.php");
} 

	$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
	$search = $_POST['search'];
	$radio = $_POST['optionsRadiosInline'];
	
	$show_form_new = true;
	
	if($radio == "hist_piece_ref_num") {
		$result = mysql_query("SELECT * FROM historical_pieces_table WHERE donor_reference_num_hist_pieces LIKE '%$search%'") or die($connect_error1);
	} else if($radio == "hist_piece_type") {
		$result = mysql_query("SELECT * FROM historical_pieces_table WHERE type_of_specimen	OR other_specimen_type LIKE '%$search%'") or die($connect_error1);
	} else if($radio == "hist_disposal_date") {
		
		$result = mysql_query("SELECT * FROM historical_pieces_table WHERE date_disposed_of	LIKE '%$search%'") or die($connect_error1);
	} else if($radio == "hist_aquired_date") {
		
		$result = mysql_query("SELECT * FROM historical_pieces_table WHERE date_aquired_on LIKE '%$search%'") or die($connect_error1);
	}
	
	$number = mysql_num_rows($result);
	
	if(isset($_POST['sumbitBT_new'])) {
				if(empty($_POST['donor_ref_hidden']) === false) {
					$show_form_new = false;
					
					$_SESSION['selected_hist_piece_ref_number'] = $_POST['donor_ref_hidden'];
					$selected_hist_piece_ref_number = $_SESSION['selected_hist_piece_ref_number'];
					
					header("Location: historical_pieces_history_edit_import.php");
						
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

    <title>Search For A Historical Piece: Results</title>

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
			background-color:#0073e6 !important;
		}

    </style>

</head>

<body>

<?php
	include 'php_functionality/historical_pieces/historical_pieces_navigation_menu.php';
?>
	
	<div id="page-wrapper">
				
			<div class="row"> 

                        <div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-12">
                                  <h2 class="page-header" id="homepageHeader">Search Results <button onclick="redirect()" class="btn btn-blue-new pull-right" style="vertical-align: middle; padding: 1px; width: 120px">New Search <i class="glyphicon glyphicon-search"></i></button></h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="historical_pieces_home.php">Home</a>
                                      </li>
                                      <li>
                                      	<a href="search_for_donor_historical_pieces.php">Search for a Historical Piece</a>
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
								<div class="panel panel-blue-new" style="margin-top: 2%">
								
									<div class="panel-heading">
										 <h4 class="panel-title"><?php echo $number ?> results found searching for <?php echo "$search" ?><span class="pull-right">Search Category - 
										 <?php 
											 if($radio == "hist_piece_ref_num") {
												echo 'Reference Number';
											 } else if ($radio == "hist_piece_type") {
												echo 'Type';
											 } else if ($radio == "hist_disposal_date") {
												echo 'Date of Disposal';
											 } else if ($radio == "hist_aquired_date") {
												echo 'Date of Aquisition';
											 }
										  ?>
										 </span></h4>
									</div><!-- /.panel-heading -->
									<?php 
										if(mysql_num_rows($result) != 0) {
									?>
									<div class="panel-body">
										<div class="dataTable_wrapper">
											<div class="table-responsive">
											<?php
											if (mysql_num_rows($result) > 0) {
											?>
												<table class="table table-striped table-bordered table-hover sortable" id="patientTable">
													<thead>
                                                        <tr>
                                                        	<th>Reference Number</th>
                                                            <th>Type</th>
                                                   			<th>Date of Disposal</th>
                                                            <th>Date of Aquisition</th>
                                                        </tr>
													</thead>
                                                	<tbody>
                                        <?php				
										while($row = mysql_fetch_assoc($result)) {
	
												$date_of_disposal = $row['date_disposed_of'];
												$formatted_date_of_disposal = date('d-m-Y', strtotime($date_of_disposal));
												
												$date_of_aquisition = $row['date_aquired_on'];
												$formatted_date_of_aquisition = date('d-m-Y', strtotime($date_of_aquisition));
												
												if(!empty($row['other_specimen_type'])) {
													$other_spec_type = ', ' . $row['other_specimen_type'];
												} else {
													$other_spec_type = "";
												}
			
											echo '<tr>';
												echo '<td>' . 	$row['donor_reference_num_hist_pieces']		 . '</td>';
												echo '<td>' . 	$row['type_of_specimen']  . $other_spec_type 	. '</td>';
												echo '<td>' . 	$formatted_date_of_disposal 	. '</td>';
												echo '<td>' . 	$formatted_date_of_aquisition 	. '</td>';
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
															<h3>Historical Piece Selected<input type="text" class="form-control pull-right input-sm centred_text" id="donor_ref_hidden" name="donor_ref_hidden" style="width: 10%" readonly/>
                                                            </h3>
													</div><!-- modal header end -->
													<div class="modal-body">
													  <h4 class="text-center" id="donor_name_header"></h4>
												  
												  
													  <table class="table table-striped" id="tblGrid">
															<thead id="tblHead">
																	  <tr>
																	  	<th>Reference Number</th>
                                                            			<th>Type</th>
                                                   						<th>Date of Disposal</th>
                                                            			<th>Date of Aquisition</th>
																	  </tr>
															</thead>
															<tbody>
																	  <tr>
																	  	<td id="ref_num_JS">$from php</td>
																		<td id="type_JS">$from php</td>
																		<td id="disp_date_JS">$from php</td>
                                                                        <td id="aq_date_JS">$from php</td>
																	  </tr>
															 </tbody>
													   </table>
													<div><!-- modal body end -->
													<div class="modal-footer">
														<button type="button" class="btn btn-default btn-pat-selected-size" data-dismiss="modal">Close</button>
														<input class="btn btn-blue-new btn-pat-selected-size" type="submit" name="sumbitBT_new" id="sumbitBT_new" value="View History"/>
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
				
				if(selected == "hist_piece_ref_num") {
					label.innerHTML = "Historical Piece Reference Number";
					$("#searchBox").attr("placeholder", "Enter Reference Number");
				} else if(selected == "hist_piece_type") {
					label.innerHTML = "Type of Historical Piece";
					$("#searchBox").attr("placeholder", "Enter Type of Historical Piece");
				} else if(selected == "hist_disposal_date") {
					label.innerHTML = "Date of Disposal";
					$("#searchBox").attr("placeholder", "Enter Date of Disposal");
				} else if(selected == "hist_aquired_date") {
					label.innerHTML = "Date Aquired";
					$("#searchBox").attr("placeholder", "Enter Date of Aquisition");
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
	var current_selected_type;
	var current_selected_disp_date;
	var current_selected_aq_date;
	
	$(document).ready(function() {
		var table = $('#patientTable').DataTable();
 
	$('#patientTable tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			selected_current_row = table.row( this ).data();
			//$('.selected').css('background-color','#1ab394');
			current_selected_ref_num = selected_current_row[0]
			current_selected_type = selected_current_row[1];
			current_selected_disp_date = selected_current_row[2];
			current_selected_aq_date = selected_current_row[3];

			// places the id of the selected patient in a hidden text field so it can be retrieved by PHP
				$(function () {
 					 $('#donor_ref_hidden').val(current_selected_ref_num);
				})
				
				$(function () {
					$('#myModal').modal({show:true});
					
					$('#donor_name_header').html(current_selected_ref_num);
					$('#ref_num_JS').html(current_selected_ref_num);
					$('#type_JS').html(current_selected_type);
					$('#disp_date_JS').html(current_selected_disp_date);
					$('#aq_date_JS').html(current_selected_aq_date);
				
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
		window.location = "search_for_donor_historical_pieces.php";
	}
	</script>

</body>

</html>

	