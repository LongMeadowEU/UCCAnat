<?php ob_start(); include_once 'init.php';include_once 'functions/users.php';
if(logged_in_prosections() !== true) {
	header("Location: index.php");
} 
error_reporting(E_ERROR | E_PARSE);
$selected_donor_ref_hist = $_SESSION['selected_donor_ref_hist'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prosection Searched</title>

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
		include 'php_functionality/prosections/navigation_menu_prosections.php';
		$show_form = true;
		
		$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
		
		$which_subject_num_from_donor_table = mysqli_query($db_connect,"SELECT * FROM donor_table WHERE subject_number = '$selected_donor_ref_hist'") or die($connect_error1);

		while($record = mysqli_fetch_assoc($which_subject_num_from_donor_table)) {
					  
			$selected_subject_number = $record['subject_number'];
			$consent_part_1_new = $record['consent_part_1'];
			$consent_part_1_3_years_options_new = $record['consent_part_1_3_years_options'];
			$consent_part_2_new = $record['consent_part_2'];
		
		}
	
	$pro_id = mysqli_query($db_connect,"SELECT * FROM prosections_table WHERE which_subject_number = '$selected_subject_number'");
	while($record__2 = mysqli_fetch_assoc($pro_id)) {
					  
			$prosec_id = $record__2['prosection_id'];
	}
	$_SESSION['selected_subject_number_session'] = $selected_subject_number;
	$selected_subject_number_session = $_SESSION['selected_subject_number_session'];
	?>
			
				<div id="page-wrapper-1">
				<?php 
					if(mysqli_num_rows($which_subject_num_from_donor_table) != 0) {
				?>
						<div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">Prosection Searched - Subject Number <?php echo $selected_subject_number;?></h2>
                               </div><!-- /.col-lg-10 -->
                          </div><!-- /.row -->
                        </div><!-- /#border-under-header -->
                        
						<div class="row">
							<div class="col-lg-12" style="margin-top:5%; margin-bottom:5%;">
                            		<button class="btn btn-lg btn-primary form_1_button pull-left" id="create_new_prosection_btn" onclick="create_new_prosection()">Create New Prosection</button>
                                    <button class="btn btn-lg btn-primary form_1_button pull-right" id="edit_existing_prosection_btn" onclick="edit_existing_clicked()">Edit Existing Prosection</button>
                            </div>
                        </div>
					<?php
					} else {
					?>
                    <div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-10">
                                  <h2 class="page-header" id="homepageHeader">Prosection Searched - No Record Found for Subject Number <?php echo $selected_donor_ref_hist; ?></h2>
                               </div><!-- /.col-lg-10 -->
                          </div><!-- /.row -->
                        </div><!-- /#border-under-header -->
                        
						<div class="row">
							<div class="col-lg-12" style="margin-top:5%; margin-bottom:5%;">
                            		<?php 
									echo '
											<div class="centred_text" style="margin-top: 5%; margin-bottom: 5%">
												<p class="lead">Sorry, there were no results found matching your search.</p>
											</div>
											<div style="text-align: center">
												<div id="yourdiv" style="display: inline-block;">
													<button class="btn btn-lg btn-primary form_1_button span7 text-center"" id="new_search_btn" onclick="new_search_redirect()">New Search</button>
												</div>
											</div>

											';
									?>
                            </div>
                        </div>
                    <?php
					}
					?>
								 
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
	
	function create_new_prosection() {
		window.location = "create_new_prosection_page1.php";
	}
	function edit_existing_clicked() {
		window.location = "edit_existing_prosection.php";
	}
	function new_search_redirect() {
		window.location = "prosections_homepage.php";
	}
	
    </script>

</body>

</html>