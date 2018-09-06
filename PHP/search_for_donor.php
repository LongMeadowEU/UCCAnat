<?php include_once 'init.php'; include_once 'functions/users.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search For A Donor</title>

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

</head>

<body>

	<?php
        
        //error_reporting(E_ALL ^ E_NOTICE);
        
        // if this session exists (i.e. has been created by using a correct username and password) then Welcome.
        // otherwise kill the page and say you must be logged in
        if($_SESSION['user_id']) {
    			include 'php_functionality/navigation_menu.php';
				include 'php_functionality/searchForDonor.php';
           
        } else 
            die('You must be logged in to view this page.<a href="login.php"> Click here </a>to log in.');
    
    ?>
    
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

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
					label.innerHTML = "Reference Numer";
					$("#searchBox").attr("placeholder", "Enter Donor Reference Number");
				} else if(selected == "donorDOB") {
					label.innerHTML = "Donor Date of Birth";
					$("#searchBox").attr("placeholder", "Enter Donor Date of Birth");
				}
		});

		
	</script>

</body>

</html>
