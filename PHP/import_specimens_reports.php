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

    <title>Import Specimens Reports</title>

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
		include 'php_functionality/imports/imports_navigation_menu.php';
		$show_form = false;
		
		if (empty($_POST) === false) {
			if($_POST['report_year_search_box']) {
				$show_form = true;
				
				$searched_year = $_POST['report_year_search_box'];
				
				$result_year = mysql_query("SELECT * FROM  import_specimens WHERE YEAR(specimen_delivery_date) LIKE '%$searched_year%' ") or die($connect_error1);
				$result_year_num_rows = mysql_num_rows($result_year);

			}
		}
	?>
			
				<div id="page-wrapper">
				
						<div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">Import Specimens Reports</h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="imports_home.php">Home</a>
                                      </li>
                                      <li class="active">
                                      	<a href="import_specimens_reports.php"><strong>Import Specimens Reports</strong></a>
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
                                	<h4>Donor Reports <?php echo $searched_year; ?> - <?php echo $result_year_num_rows; ?> Results Found <button onclick="new_report_search()" class="btn btn-purple pull-right" style="vertical-align: middle; padding: 1px; width: 150px">New Report Year <i class="glyphicon glyphicon-search"></i></button></h4>
                                  </div>
                                  <?php 
										if(mysql_num_rows($result_year) > 0) {
									?>
                                    <div class="panel panel-default">
									<div class="panel-body">
										<div class="dataTable_wrapper">
											<div class="table-responsive">
												<table class="table table-striped table-bordered table-hover sortable" id="donor_reports_table">
													<thead>
                                                        <tr>
                                                        	<th>Reference Number</th>
                                                            <th>Item Number</th>
                                                            <th>Sex</th>
                                                            <th>Cause of Death</th>
                                                            <th>Date Received </br>Medical School</th>
                                                            <th>Date Released </br>for Burial/Cremation</th>
                                                        </tr>
													</thead>
                                                	<tbody>
													 	<?php       
                                                       	 	while($record = mysql_fetch_assoc($result_year)) {
																
																$specimen_delivery_date_1 = $record['specimen_delivery_date'];
																$specimen_delivery_date = date('d-m-Y', strtotime($specimen_delivery_date_1));
																
																$specimen_cremation_date_1 = $record['specimen_cremation_date'];
																$specimen_cremation_date = date('d-m-Y', strtotime($specimen_cremation_date_1));
			
																echo '<tr>';
																 echo '<td>' . $record['specimen_reference_number'] . '</td>';
																 echo '<td>' . $record['specimen_item_number'] . '</td>';
																 echo '<td>' . $record['imports_sex'] . '</td>';
																 echo '<td>' . $record['imports_cause_of_death'] . '</td>';
																 echo '<td>' . $specimen_delivery_date . '</td>';
																 echo '<td>' . $specimen_cremation_date . '</td>';
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
													<button class="btn btn-lg btn-purple form_1_button span7 text-center" id="new_search_btn" onclick="new_report_search()">New Report Year</button>
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
									<div class="col-lg-4 col-md-offset-4">
                                      <form role="form" id="search_prosections" action="" method="POST">
                                          <div class="input-group custom-search-form" style="margin-top:15%">
                                              <input type="number" id="report_year_search_box" name="report_year_search_box" class="form-control" placeholder="Enter Year to Search">
                                              <span class="input-group-btn">
                                              <button class="btn btn-default" type="submit">
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
		window.location = "import_specimens_reports.php";
	}
	
    </script>

</body>

</html>