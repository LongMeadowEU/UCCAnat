<?php include_once 'init.php'; include_once 'functions/users.php';

if(logged_in_prosections() !== true) {
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

    <title>Prosections Homepage</title>

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

<body id="pro_home_body">

	<?php
	
        include 'php_functionality/prosections/navigation_menu_prosections.php';

    ?>
    
<div id="wrapper-prosec-home" class="centred_text">
  <div style="padding-top:7%">
    <form role="form" id="search_prosections" action="prosection_searched_table_results.php" method="POST">
    <div class="form-group centred_text" style="margin-top: 5%;">
            <label>Search By Subject Number:</label>
            <label class="radio-inline" style="padding-left: 40px">
                <input type="radio" name="optionsRadiosInline" class="targetRadio_prosection_search" id="optionsRadiosInline1" value="subject_number" checked>Subject Number
            </label>
            <label class="radio-inline" style="padding-left: 40px">
                <input type="radio" name="optionsRadiosInline" class="targetRadio_prosection_search" id="optionsRadiosInline2" value="prosection_type">Prosection Type
            </label>
            <label class="radio-inline" style="padding-left: 40px">
                <input type="radio" name="optionsRadiosInline" class="targetRadio_prosection_search" id="optionsRadiosInline3" value="prosection_region">Prosection Region
            </label>
            <label class="radio-inline" style="padding-left: 40px">
                <input type="radio" name="optionsRadiosInline" class="targetRadio_prosection_search" id="optionsRadiosInline3" value="prosection_specific_feature">Prosection Feature/Structure
            </label>
            <br/>
            <br/>
            <br/>
	  </div>
      <label id="dynamicChangingLabel" for="prosection_search_box" class="centred_text" style="font-size:22px">Subject Number</label>
          <div class="input-group custom-search-form" id="homepage_search_box">
              <input type="text" id="prosection_search_box" name="prosection_search_box" class="form-control" placeholder="Enter Subject Number">
              <span class="input-group-btn">
              <button class="btn btn-default" type="submit">
                  <i class="fa fa-search"></i>
              </button>
          </span>
          </div>
       </form>
  </div>
</div>
    
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
    <script>
			$( ".targetRadio_prosection_search" ).change(function() {
				var selected = $("input[type='radio'][name=optionsRadiosInline]:checked", '#search_prosections').val();
				var label = document.getElementById('dynamicChangingLabel');
				
				if(selected == "subject_number") {
					label.innerHTML = "Subject Number";
					$("#prosection_search_box").attr("placeholder", "Enter Subject Number");
				} else if(selected == "prosection_type") {
					label.innerHTML = "Prosection Type";
					$("#prosection_search_box").attr("placeholder", "Enter Prosection Type");
				} else if(selected == "prosection_feature") {
					label.innerHTML = "Prosection Feature";
					$("#prosection_search_box").attr("placeholder", "Enter Prosection Feature");
				}
		});
	</script>
    
</body>

</html>
