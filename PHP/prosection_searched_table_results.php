<?php ob_start(); include_once 'init.php';include_once 'functions/users.php';
if(logged_in_prosections() !== true) {
	header("Location: index.php");
} 
$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
	$search = $_POST['prosection_search_box'];
	$radio = $_POST['optionsRadiosInline'];
	
	$show_form_new = true;
	
	if($radio == "subject_number") {
		$which_subject_num_from_donor_table = mysql_query("SELECT * FROM donor_table WHERE subject_number LIKE '%$search%'") or die($connect_error1);
		$which_radio = "subj_num";
	} else if($radio == "prosection_type") {
		$which_subject_num_from_donor_table = mysql_query("SELECT * FROM prosections_table WHERE prosection_types_list LIKE '%$search%'") or die($connect_error1);
		$which_radio = "prosec_type";
	} else if($radio == "prosection_region") {
		$which_subject_num_from_donor_table = mysql_query("SELECT * FROM prosections_table WHERE prosection_regions_list LIKE '%$search%'") or die($connect_error1);
		$which_radio = "prosec_region";
	} else if($radio == "prosection_specific_feature") {
		$which_subject_num_from_donor_table = mysql_query("SELECT * FROM prosections_table WHERE prosection_features_list LIKE '%$search%'") or die($connect_error1);
		$which_radio = "prosec_specific_feature";
	}
	
$number = mysql_num_rows($which_subject_num_from_donor_table);

// if the errors array is empty and the user has submitted the form then create the user and redirect the user
		if(isset($_POST['view_subject_num_details'])) {
				if(empty($_POST['donor_ref_hidden']) === false) {
					$show_form_new = false;
					
					$_SESSION['selected_donor_ref_hist'] = $_POST['donor_ref_hidden'];
					$selected_donor_ref_hist = $_SESSION['selected_donor_ref_hist'];
				
					header("Location: prosection_searched.php");
						
			}
		}

/*if($number != 0) {
		while($record = mysql_fetch_assoc($which_subject_num_from_donor_table)) {
					  
			$selected_subject_number = $record['subject_number'];
			$consent_part_1_new = $record['consent_part_1'];
			$consent_part_1_3_years_options_new = $record['consent_part_1_3_years_options'];
			$consent_part_2_new = $record['consent_part_2'];
		
		}
	$_SESSION['selected_subject_number_session'] = $selected_subject_number;
	
	$pro_id = mysql_query("SELECT * FROM prosections_table WHERE which_subject_number = '$selected_subject_number'");
	while($record__2 = mysql_fetch_assoc($pro_id)) {
					  
			$prosec_id = $record__2['prosection_id'];
	}
	
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prosection Search Results</title>

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
			background-color:#f69428 !important;
		}

    </style>

</head>

<body>

<?php
	include 'php_functionality/prosections/navigation_menu_prosections.php';
?>
	
	<div id="page-wrapper">
				
			<div class="row"> 

                        <div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-12">
                                  <h2 class="page-header" id="homepageHeader">Search Results <button onclick="redirect()" class="btn btn-orange pull-right" style="vertical-align: middle; padding: 1px; width: 120px">New Search <i class="glyphicon glyphicon-search"></i></button></h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="prosections_homepage.php">Home</a>
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
										 <h4 class="panel-title"><?php echo $number ?> results found searching for <?php echo $search; ?><span class="pull-right">Search Category - 
										 <?php 
											 if($radio == "subject_number") {
												echo 'Subject Number';
											 } else if ($radio == "prosection_type") {
												echo 'Prosection Type';
											 } else if ($radio == "prosection_region") {
												echo 'Prosection Region';
											 } else if ($radio == "prosection_specific_feature") {
												echo 'Prosection Feature/Structure';
											 }
										  ?>
										 </span></h4>
									</div><!-- /.panel-heading -->
									<?php 
										if(mysql_num_rows($which_subject_num_from_donor_table) != 0) {
									?>
                                          <div class="panel-body">
                                              <div class="dataTable_wrapper">
                                                  <div class="table-responsive">
                                                  <?php
                                                  if (mysql_num_rows($which_subject_num_from_donor_table) > 0) {
                                                  ?>
                                                        <table class="table table-striped table-bordered table-hover sortable" id="prosection_results_table">
                                                       <?php 
													   	if($which_radio == "subj_num") {
														?>
                                                            <thead>
                                                                <tr>
                                                                    <th>Subject Number</th>
                                                                    <th>Prosecions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                      <?php	
													  while($record = mysql_fetch_assoc($which_subject_num_from_donor_table)) {
														  	  $selected_subject_number = $record['subject_number'];
															  $does_subject_have_prosection = mysql_query("SELECT unique_id FROM prosections_table WHERE which_subject_number = '$selected_subject_number'") or die($connect_error1);
															  if(mysql_num_rows($does_subject_have_prosection) == 0) {
	$prosection_yes_no = "There are currently no prosections for this subject";
} else {
	$number_of_prosections = mysql_num_rows($does_subject_have_prosection);
	$prosection_yes_no = "This subject currently has " . $number_of_prosections . " prosections";
}
					  										echo '<tr>';
																echo '<td>' . $selected_subject_number . '</td>';
																echo '<td>' . $prosection_yes_no . '</td>';
															echo '</tr>';
															
													  }
																										 
                                              ?>
                                                          </tbody>
                                                 <?php 
													}  else if($which_radio == "prosec_type") {
												?>
														 <thead>
                                                                <tr>
                                                                	<th>Subject Number</th>
                                                                    <th>Prosection Type</th>
                                                                    <th>Prosection ID</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                      <?php	
													  while($record_1 = mysql_fetch_assoc($which_subject_num_from_donor_table)) {
														  
														  	  $prosection_type = $record_1['prosection_type'];
															  $which_subj = $record_1['which_subject_number'];
															  $prosection_id = $record_1['prosection_id'];
															  $prosect_types_results = $record_1['prosection_types_list'];
					  										echo '<tr>';
																echo '<td>' . $which_subj . '</td>';
																echo '<td>' . $prosect_types_results . '</td>';
																echo '<td>' . $prosection_id . '</td>';
															echo '</tr>';
															
													  } 
													  ?>
													   </tbody>
                                                 <?php 
													}  else if($which_radio == "prosec_region") {
												?>
                                                        <thead>
                                                                <tr>
                                                                	<th>Subject Number</th>
                                                                    <th>Prosection Type</th>
                                                                    <th>Prosection Region/Feature</th>
                                                                    <th>Prosection ID</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                      <?php	
													  while($record_2 = mysql_fetch_assoc($which_subject_num_from_donor_table)) {
														  
														  	  $prosection_type = $record_2['prosection_type'];
															  $which_subj = $record_2['which_subject_number'];
															  $prosec_region = $record_2['prosection_region'];
															  $prosection_id = $record_2['prosection_id'];
															  $prosection_type_list = $record_2['prosection_types_list'];
															  $prosec_region_list = $record_2['prosection_regions_list'];
															  
					  										echo '<tr>';
																echo '<td>' . $which_subj . '</td>';
																echo '<td>' . $prosection_type_list . '</td>';
																echo '<td>' . $prosec_region_list . '</td>';
																echo '<td>' . $prosection_id . '</td>';
															echo '</tr>';
															
													  }
												?>
                                                          </tbody>
                                                <?php
													
													}  else if($which_radio == "prosec_specific_feature") {
												?>
														 <thead>
                                                                <tr>
                                                                	<th>Subject Number</th>
                                                                    <th>Prosection ID</th>
                                                                    <th>Prosection Type</th>
                                                                    <th>Prosection Region</th>
                                                                    <th>Prosection Feature</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                      <?php	
													  while($record_1 = mysql_fetch_assoc($which_subject_num_from_donor_table)) {
														  
														  	  $prosection_type = $record_1['prosection_type'];
															  $which_subj = $record_1['which_subject_number'];
															  $prosection_id = $record_1['prosection_id'];
															  $prosection_region = $record_1['prosection_region'];
															  $prosection_feature = $record_1['prosection_feature_specific'];
															  $prosection_type_list = $record_1['prosection_types_list'];
															  $prosec_region_list = $record_1['prosection_regions_list'];
															  $prosection_feature_list = $record_1['prosection_features_list'];
															  
					  										echo '<tr>';
																echo '<td>' . $which_subj . '</td>';
																echo '<td>' . $prosection_id . '</td>';
																echo '<td>' . $prosection_type_list . '</td>';
																echo '<td>' . $prosec_region_list . '</td>';
																echo '<td>' . $prosection_feature_list . '</td>';
															echo '</tr>';
															
													  } 
													  ?>
													   </tbody>
                                                     <?php
													}
												} 
												?>
                                                      </table>
                                                  </div><!-- /.table-responsive -->
                                              </div><!-- .dataTableW_wrapper -->
                                          </div><!-- /.panel-body -->
								<?php 
										} else {
								?>			
											<div class="col-lg-12" style="margin-top:5%; margin-bottom:5%;">
                            		<?php 
									echo '
											<div class="centred_text" style="margin-top: 5%; margin-bottom: 5%">
												<p class="lead">Sorry, there were no results found matching your search.</p>
											</div>
											<div style="text-align: center">
												<div id="yourdiv" style="display: inline-block;">
													<button class="btn btn-lg btn-orange form_1_button span7 text-center" id="new_search_btn" onclick="new_search_redirect()">New Search</button>
												</div>
											</div>

											';
									?>
                            </div>
                            <?php
										}
								?>
                                
                                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
									  <div class="modal-dialog modal-lg">
									  	<form role="form" id="pat_select_form" action="" method="POST">
											<div class="modal-content">
												  <div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">×</button>
															<h3>Subject Selected<input type="text" class="form-control pull-right input-sm centred_text" id="donor_ref_hidden" name="donor_ref_hidden" style="width: 10%" readonly/>
                                                            </h3>
													</div><!-- modal header end -->
													<div class="modal-body">
												  
													   <h4 class="text-center" id="view_subj_header"></h4><br/>
														
													<div><!-- modal body end -->
													<div class="modal-footer">
														<button type="button" class="btn btn-default btn-pat-selected-size" data-dismiss="modal">Close</button>
														<input class="btn btn-orange btn-pat-selected-size" type="submit" name="view_subject_num_details" id="view_subject_num_details" value="View"/>
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
        $('#prosection_results_table').DataTable({
                responsive	: true,
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
	
	$(document).ready(function() {
		var table = $('#prosection_results_table').DataTable();
 
	$('#prosection_results_table tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			selected_current_row = table.row( this ).data();
			//$('.selected').css('background-color','#1ab394');
			current_selected_ref_num = selected_current_row[0]
			
			// places the id of the selected patient in a hidden text field so it can be retrieved by PHP
				$(function () {
 					 $('#donor_ref_hidden').val(current_selected_ref_num);
					 $('#view_subj_header').html("View subject number " + current_selected_ref_num);
				})
				
				$(function () {
					$('#myModal').modal({show:true});
			
					$('#ref_num_JS').html(current_selected_ref_num);
				
				})
		} else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            // disable button click when no row is selected
            selected_current_row = "";
            // removes ID from the patient hidden id input field. 
				$(function () {
 					 $('#donor_ref_hidden').val("");
					 $('#view_subj_header').html("");
				})
        }
	} );
 		
	} ); 

	function redirect() {
		window.location = "prosections_homepage.php";
	}
	
	function new_search_redirect() {
		window.location = "prosections_homepage.php";
	}
	</script>

</body>

</html>

	