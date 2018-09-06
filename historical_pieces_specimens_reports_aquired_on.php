<?php ob_start(); include_once 'init.php';include_once 'functions/users.php';
if(logged_in_historical_pieces() !== true) {
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

    <title>Historical Pieces Reports - Aquired On</title>

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
		include 'php_functionality/historical_pieces/historical_pieces_navigation_menu.php';
		$show_form = false;
		
		if (empty($_POST) === false) {
			if($_POST['report_year_search_box']) {
				$show_form = true;
				
				$searched_year = $_POST['report_year_search_box'];
				
				$result_year = mysql_query("SELECT * FROM  historical_pieces_table WHERE YEAR(date_aquired_on) LIKE '%$searched_year%' ") or die($connect_error1);
				$result_year_num_rows = mysql_num_rows($result_year);

			}
		}
	?>
			
				<div id="page-wrapper">
				
						<div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">Donor Reports</h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="historical_pieces_home.php">Home</a>
                                      </li>
                                      <li>
                                      	<a href="#">Historical Pieces Reports</a>
                                      </li>
                                      <li class="active">
                                      	<a href="historical_pieces_specimens_reports_aquired_on.php"><strong>Historical Pieces Aquired on</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
						
						<div class="row">
							<div class="col-lg-12">
							
							<?php 
                                if($show_form == true) {
                            ?>
                                  <div class="ibox-title">
                                	<h4>Year Aquired On <b><?php echo $searched_year; ?></b> - <?php echo $result_year_num_rows; ?> Results Found <button onclick="new_report_search()" class="btn btn-blue-new pull-right" style="vertical-align: middle; padding: 1px; width: 150px">New Report Year <i class="glyphicon glyphicon-search"></i></button></h4>
                                  </div>
                                  <?php 
										if(mysql_num_rows($result_year) > 0) {
									?>
                                    <div class="panel panel-blue-new">
									<div class="panel-body">
										<div class="dataTable_wrapper">
											<div class="table-responsive">
												<table class="table table-striped table-bordered table-hover sortable" id="donor_reports_table">
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
                                                       	 	while($record = mysql_fetch_assoc($result_year)) {
																
																$date_of_disposal = $record['date_disposed_of'];
																$formatted_date_of_disposal = date('d-m-Y', strtotime($date_of_disposal));
																
																$date_of_aquisition = $record['date_aquired_on'];
																$formatted_date_of_aquisition = date('d-m-Y', strtotime($date_of_aquisition));
																
																if(!empty($record['other_specimen_type'])) {
																	$other_spec_type = ', ' . $record['other_specimen_type'];
																} else {
																	$other_spec_type = "";
																}
							
															echo '<tr>';
																echo '<td>' . 	$record['donor_reference_num_hist_pieces']		 . '</td>';
																echo '<td>' . 	$record['type_of_specimen']  . $other_spec_type 	. '</td>';
																echo '<td>' . 	$formatted_date_of_disposal 	. '</td>';
																echo '<td>' . 	$formatted_date_of_aquisition 	. '</td>';
															echo '</tr>';
			
															} 
                                                    	?>
    												</tbody>
    											</table>
											</div><!-- /.table-responsive -->
										</div><!-- .dataTableW_wrapper -->
									</div><!-- /.panel-body -->
                                    </div><!-- /.panel -->
                                    <?php 
										} else {
									echo '
										<div class="col-lg-12" style="margin-top:5%; margin-bottom:5%;">
											<div class="centred_text" style="margin-top: 5%; margin-bottom: 5%">
												<p class="lead">Sorry, there were no results found matching the year you searched for.</p>
											</div>
											<div style="text-align: center">
												<div id="yourdiv" style="display: inline-block;">
													<button class="btn btn-lg btn-blue-new form_1_button span7 text-center" id="new_search_btn" onclick="new_report_search()">New Report Year</button>
												</div>
											</div>
										 </div>
										 ';
										}
									?>
								<?php
									} else if($show_form == false) {
								?>
                                <div class="row">
									<div class="col-lg-6 col-md-offset-3">
                                      <form role="form" id="search_prosections" action="" method="POST">
                                          <div class="input-group custom-search-form" style="margin-top:15%">
                                              <input type="number" id="report_year_search_box" name="report_year_search_box" class="form-control" placeholder="Enter Year to Search - Historical Pieces Aquired On">
                                              <span class="input-group-btn">
                                              <button class="btn btn-blue-new" type="submit">
                                                  <i class="fa fa-search"></i>
                                              </button>
                                              </span>
                                          </div>
                                       </form>
                                      </div>
                                 </div>
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
        $('#donor_reports_table').DataTable({
				//"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				paging: false,
                responsive	: true,
                'bJQueryUI' : true,
                "sDom"		: 'T<"clear"><"top pull-left"l><"top pull-right"f>rt<"bottom pull-left"i><"bottom pull-right"p>',
                "tableTools": {
            		"sSwfPath": "copy_csv_xls_pdf.swf", 
            		"sRowSelect": "single"	
       			}
        });
    });
	
	function new_report_search() {
		window.location = "historical_pieces_specimens_reports_aquired_on.php";
	}
	
    </script>

</body>

</html>