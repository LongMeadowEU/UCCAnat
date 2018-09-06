<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in_prosections() !== true) {
	header("Location: index.php");
} 

$selected_subject_number_session = $_SESSION['selected_subject_number_session'];
$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';

if (empty($_POST) === false) {
	if($_POST['view_prosection_details']) {
		$_SESSION['selected_prosection_id'] = $_POST['donor_ref_hidden'];
		$selected_prosection_id = $_SESSION['selected_prosection_id'];
		
		header("Location: edit_selected_prosection.php");
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

    <title>Edit Existing Prosection</title>

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
    
    <!-- breadcrumb trail grayscale except for the page user is currently on -->
    <style>
		.popover{
			width:250px;    
		}
		.clickable{
		    cursor: pointer;   
		}
		#filter-panel {
			display: none;
		}
		tr.selected td{
			background-color:#1ab394 !important;
		}
    </style>

</head>

<body>

<?php
        
    	include_once 'php_functionality/prosections/navigation_menu_prosections.php';
    	$show_form = true;
		
?>
    
    <div id="wrapper">
	
        <!-- Page Content -->
        <div id="page-wrapper-1">
            <div class="container-fluid">
                                    
                       <div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">Edit Existing Prosection</h2>
                                  <ol class="breadcrumb">
                                      <li>
										<a href="prosections_homepage.php">Home</a>
                                      </li>
                                      <li>
										<a href="prosection_searched.php">Searched</a>
                                      </li>
                                      <li class="active">
                                          <a href="create_new_prosection_page1.php"><strong>Edit Existing Prosection (for Subject Number <?php echo $selected_subject_number_session; ?> ) - Select Prosection</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
                					
<div class="row">
  <div class="col-lg-12">
      <div class="ibox-title">
          <h4>List of Prosections for Subject Number <?php echo $selected_subject_number_session; ?></h4>
       </div> 
       <div class="panel panel-default">
       										
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover sortable" id="prosection_table_edit">
                                  <thead>
                                      <tr>
                                          <th>Subject Number</th>
                                          <th>Unique ID</th>
                                          <th>Prosection ID</th>
                                          <th>Prosection Type</th>
                                          <th>Prosection Region</th>
                                          <th>Prosection Feature</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  
<?php 
$which_subject_num_from_donor_table_new = mysql_query("SELECT * FROM donor_table WHERE subject_number = '$selected_subject_number_session'") or die($connect_error1);

while($record = mysql_fetch_assoc($which_subject_num_from_donor_table_new)) {
	$selected_subject_number = $record['subject_number'];
	
	$array_prosections = array();
	$does_subject_have_prosection = mysql_query("SELECT unique_id FROM prosections_table WHERE which_subject_number = '$selected_subject_number'") or die($connect_error1);
	
	if(mysql_num_rows($does_subject_have_prosection) == 0) {
		 echo '<tr class="non_selectable">';
				  echo '<td>' . 'There are currently no prosections for this subject.' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
				  echo '<td>' . 'N/A' . '</td>';
		echo '</tr>';
	} else {
		while($row = mysql_fetch_array($does_subject_have_prosection)) {
			$unique_id = $row['unique_id'];
			
			$unique_id_form_table = mysql_query("SELECT * FROM prosections_table WHERE unique_id = '$unique_id'") or die($connect_error1);
			while($row_1 = mysql_fetch_array($unique_id_form_table)) {
				/*$array_prosections[] = array('prosection' => $row_1['prosection_region'], 'prosection_1' => $row_1['prosection_region_1'], 'prosection_2' => $row_1['prosection_region_2'], 'prosection_3' => $row_1['prosection_region_3'], 'prosection_4' => $row_1['prosection_region_4']);
				 $array_values = implode(', ', $array_prosections); */
				
			  echo '<tr>';
				  echo '<td>' . $row_1['which_subject_number'] . '</td>';
				  echo '<td>' . $row_1['unique_id'] . '</td>';
				  echo '<td>' . $row_1['prosection_id'] . '</td>';
				  echo '<td>' . $row_1['prosection_types_list'] . '</td>';
				  echo '<td>' . $row_1['prosection_regions_list'] . '</td>';
				  echo '<td>' . $row_1['prosection_features_list'] . '</td>';
				  
			  echo '</tr>';
			}
		}
		$prosection_yes_or_no = "yes";
		
	}								  
							  
}
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
															<h3>Prosection Selected<input type="text" class="form-control pull-right input-sm centred_text" id="donor_ref_hidden" name="donor_ref_hidden" style="width: 10%" readonly/>
                                                            </h3>
													</div><!-- modal header end -->
													<div class="modal-body">
												  		<h4 class="text-center" id="view_prosection_id_header"></h4><br/>
													    <h4 class="text-center" id="view_subj_header"></h4><br/>
													<div><!-- modal body end -->
													<div class="modal-footer" id="footer_buttons">
														<button type="button" class="btn btn-default btn-pat-selected-size" data-dismiss="modal">Close</button>
														<input class="btn btn-primary btn-pat-selected-size" type="submit" name="view_prosection_details" id="view_prosection_details" value="View"/>
													</div><!-- modal footer end -->
												</div><!-- modal content end -->
											</form>
										</div><!-- modal dialog .modal-lg end -->
									  </div><!-- modal fade .bs-example-modal-lg end -->
						</div><!-- /.panel -->
					</div><!-- /.col-lg-12 -->
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
    <script src="bower_components/datatables/media/js/release-datatablesextensionsTableToolsjsdataTables.tableTools.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
    <script type="text/javascript">
	
	$(document).ready(function() {
        $('#prosection_table_edit').DataTable({
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
	var current_selected_subject_num;
	var current_selected_prosection_id;
	
	$(document).ready(function() {
		var table = $('#prosection_table_edit').DataTable();
 
	$('#prosection_table_edit tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('non_selectable')) {
			$('#footer_buttons').hide();
		}
		if ( $(this).hasClass('selected') ) {
			selected_current_row = table.row( this ).data();
			console.log("row selected = " +selected_current_row);
			current_selected_subject_num = selected_current_row[0];
			console.log("subject_number " + current_selected_subject_num);
			current_selected_prosection_id = selected_current_row[2];
			console.log("prosection id " + current_selected_prosection_id);
			
			// places the id of the selected patient in a hidden text field so it can be retrieved by PHP
				$(function () {
 					 $('#donor_ref_hidden').val(current_selected_prosection_id);
					 $('#view_subj_header').html("Subject Number " + current_selected_subject_num);
					 $('#view_prosection_id_header').html("View Prosection ID " + current_selected_prosection_id);
				})
				
				$(function () {
					$('#myModal').modal({show:true});
			
					$('#ref_num_JS').html(current_selected_subject_num);
				
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
					 $('#view_prosection_id_header').html("");
				})
        }
	});
	});
	
	
		
	</script>
    

</body>

</html>
