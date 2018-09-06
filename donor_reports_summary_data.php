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

    <title>Donor Reports</title>

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
		$show_form_summary_data = false;
		
		if (empty($_POST) === false) {
			if($_POST['report_year_search_box_summary_data']) {
				$show_form_summary_data = true;
				
				$searched_year_sum_data = $_POST['report_year_search_box_summary_data'];
				
				$result_year_sum_data = mysql_query("SELECT * FROM  donor_table WHERE YEAR(date_of_donation) LIKE '%$searched_year_sum_data%' ") or die($connect_error1);
				$result_year_sum_data_num_rows_sum_data = mysql_num_rows($result_year_sum_data);
				
				$result_year_sum_data_1 = mysql_query("SELECT * FROM  donor_table WHERE YEAR(date_of_receipt) LIKE '%$searched_year_sum_data%' ") or die($connect_error1);
				$result_year_sum_data_num_rows_sum_data_1 = mysql_num_rows($result_year_sum_data_1);
				
				$result_year_sum_data_2 = mysql_query("SELECT * FROM  donor_table WHERE YEAR(consent_withdrawl_date) LIKE '%$searched_year_sum_data%' ") or die($connect_error1);
				$result_year_sum_data_num_rows_sum_data_2 = mysql_num_rows($result_year_sum_data_2);
				
				//$result_year_sum_data_not_accepted = mysql_query("SELECT * FROM  donor_table WHERE YEAR(consent_withdrawl_date) LIKE '%$searched_year_sum_data%' ") or die($connect_error1);
				//$num_donors_not_accepted = mysql_num_rows($result_year_sum_data_not_accepted);

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
                                      	<a href="dashboard.php">Home</a>
                                      </li>
                                      <li>
                                      	<a href="#">Donor Reports</a>
                                      </li>
                                      <li class="active">
                                      	<a href="donor_reports_summary_data.php"><strong>Summary Data</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
						
						<div class="row">
							<div class="col-lg-12">
							
							<?php 
                                if($show_form_summary_data == true) {
                            ?>
                                  <div class="ibox-title">
                                	<h4>Donor Reports <?php echo $searched_year_sum_data; ?> <button onclick="new_report_search_sum_data()" class="btn btn-primary pull-right" style="vertical-align: middle; padding: 1px; width: 170px">New Summary Year <i class="glyphicon glyphicon-search"></i></button></h4>
                                  </div>
                                  <?php 
								  
									if(mysql_num_rows($result_year_sum_data) > 0) {
										
								  ?>
                                   <div class="form-group centred_text">
                                     <table id="genInfoFormTable" class="centred_text add_patient_table" style="margin-top:0%">
                                        <tr>
                                            <td class="formLabel" align="left"><label id="donorRefNumLabel" for="total_don_offered_for_year">Total Donations Offered in Current Year:</label></td>
                                            <td class="formInput"><input type="text" class="form-control" id="total_don_offered_for_year" name="total_don_offered_for_year" value="<?php echo $result_year_sum_data_num_rows_sum_data;?>" disabled></td>
                                        </tr>
                                        <tr>
                                            <td class="formLabel" align="left"><label id="donorRefNumLabel" for="total_don_received_for_year">Total Donations Received in Current Year:</label></td>
                                            <td class="formInput"><input type="text" class="form-control" id="total_don_received_for_year" name="total_don_received_for_year" value="<?php echo $result_year_sum_data_num_rows_sum_data_1;?>" disabled></td>
                                        </tr>
                                        <tr>
                                            <td class="formLabel" align="left"><label id="donorRefNumLabel" for="total_don_withdrawn">Donations Actively Withdrawn:</label></td>
                                            <td class="formInput"><input type="text" class="form-control" id="total_don_withdrawn" name="total_don_withdrawn" value="<?php echo $result_year_sum_data_num_rows_sum_data_2;?>" disabled></td>
                                        </tr>
                                        <tr>
                                            <td class="formLabel" align="left"><label id="donorRefNumLabel" for="num_donors_not_accepted">Number of Donors Not Accepted:</label></td>
                                            <td class="formInput"><input type="text" class="form-control" id="num_donors_not_accepted" name="num_donors_not_accepted" value="<?php echo $num_donors_not_accepted;?>" disabled></td>
                                        </tr>
                                        <tr>
                                            <td class="formLabel" align="left"><label id="donorRefNumLabel" for="unsuitable_don_returned">Unsuitable Donations Returned:</label></td>
                                            <td class="formInput"><input type="text" class="form-control" id="unsuitable_don_returned" name="unsuitable_don_returned" value="<?php echo 'not applicable';?>" disabled></td>
                                        </tr>
                                      </table>
                                   </div>
                                    <div class="panel panel-default">
									<div class="panel-body">
										<div class="dataTable_wrapper">
											<div class="table-responsive">
												<table class="table table-striped table-bordered table-hover sortable" id="donor_reports_table_sum_data">
													<thead>
                                                        <tr>
                                                        	<th>Total Donations Offered in Current Year</th>
                                                            <th>Total Donations Received in Current Year</th>
                                                            <th>Donations Actively Withdrawn</th>
                                                            <th>Unsuitable Donations Returned</th>
                                                        </tr>
													</thead>
                                                	<tbody>
													 	<?php       
                                                       	 	
														  echo '<tr>';
														   echo '<td>' . $result_year_sum_data_num_rows_sum_data . '</td>';
														   echo '<td>' . $result_year_sum_data_num_rows_sum_data_1 . '</td>';
														   echo '<td>' . $result_year_sum_data_num_rows_sum_data_2 . '</td>';
														   echo '<td>' . 'N/A' . '</td>';
														  echo '</tr>';
	  
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
													<button class="btn btn-lg btn-primary form_1_button span7 text-center" id="new_search_btn" onclick="new_report_search_sum_data()">New Summary Year</button>
												</div>
											</div>
										 </div>
										 ';
										}
									?>
								<?php
									} else if($show_form_summary_data == false) {
								?>
                                <div class="row">
									<div class="col-lg-4 col-md-offset-4">
                                      <form role="form" id="search_prosections" action="" method="POST">
                                          <div class="input-group custom-search-form" style="margin-top:15%">
                                              <input type="number" id="report_year_search_box_summary_data" name="report_year_search_box_summary_data" class="form-control" placeholder="Enter Year to Search - Summary">
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
        $('#donor_reports_table_sum_data').DataTable({
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
	
	function new_report_search_sum_data() {
		window.location = "donor_reports_summary_data.php";
	}
	
    </script>

</body>

</html>