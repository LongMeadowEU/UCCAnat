<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in_historical_pieces() !== true) {
	header("Location: index.php");
} 
$onHomePage = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Historical Pieces Homepage</title>

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
    
</head>

<body onload="greetUser()">

	<?php
	
        include 'php_functionality/historical_pieces/historical_pieces_navigation_menu.php';
		include 'php_functionality/historical_pieces/historical_pieces_dashboard.php';

    ?>
    
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Javascript for the Welcome Message which changes depending on Client Side time of the day -->
    <script>
    	var userDate = new Date();
    	var userHours = userDate.getHours();
    	var greetingHeader = document.getElementById('greetingMessage');
    	var greeting;
    	var userDrName; // get this variable from the user/surgeon's surname 
    	
    	var php_var = "<?php echo $drSurname; ?>";
		var male_female = "<?php echo $male_female_record; ?>";
    	
    	function greetUser() {
			if(male_female == "1") {
				var mr_ms = "Mr.";
			} else if (male_female == "0") {
				var mr_ms = "Ms.";
			}
    		if(userHours < 12) {
    			greeting = 'Good morning ' + mr_ms + ' ' + php_var;
    		} else if (userHours >= 12 && userHours <= 17) {
    			greeting = 'Good afternoon ' + mr_ms + ' ' + php_var;
    		} else if (userHours >= 17 && userHours <= 24) {
    			greeting = 'Good evening ' + mr_ms + ' ' + php_var;
    		}
    		
    		greetingHeader.innerHTML = greeting;
			$("#greetingMessage").fadeIn(3000); // fade in the greeting message
    	}
    	
    </script>
    
</body>

</html>
