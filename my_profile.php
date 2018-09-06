<?php include_once 'init.php';
if(logged_in() !== true) {
	header("Location: index.php");
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

    <title>My Profile</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style type="text/css">
				.user-row {
					margin-bottom: 14px;
				}
				
				.user-row:last-child {
					margin-bottom: 0;
				}
				
				.dropdown-user:hover {
					cursor: pointer;
				}
				
				.table-user-information > tbody > tr {
					border-top: 1px solid rgb(221, 221, 221);
				}
				
				.table-user-information > tbody > tr:first-child {
					border-top: 0;
				}
				
				
				.table-user-information > tbody > tr > td {
					border-top: 0;
				}
				.toppad
				{margin-top:20px;
				}

    </style>

</head>

<body>

	<?php
	
		include 'php_functionality/navigation_menu.php';
	
	?>

    <?php
				
		include 'php_functionality/my_profile_user.php';
		
		mysql_close($db_connect);
	?>
    
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
    <script>
    /* page fades in when loaded
    	$(document).ready(function() {

			$('body').css('display', 'none');

			$('body').fadeIn(1000);
		}); */

	// make all input boxes disabled on page load. Toggle enabled/disabled state when edit button is clicked
	$(document).ready(function() {
		$('#edit_button').click(function() {
			window.location = "edit_my_profile.php";
		});
	});
	</script>

</body>

</html>
