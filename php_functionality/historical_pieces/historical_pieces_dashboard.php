<?php
    
    $login = $_SESSION['user_id_historical_pieces'];
	$result = mysql_query("SELECT sur_name FROM anatomy_login WHERE user_id = $login") or die($connect_error1);
	
	while($record = mysql_fetch_assoc($result)) {
		$drSurname = ucwords($record['sur_name']);
	}	
	
	$result_1 = mysql_query("SELECT male_female FROM anatomy_login WHERE user_id = $login") or die($connect_error1);
	
	while($record_1 = mysql_fetch_assoc($result_1)) {
		$male_female_record = $record_1['male_female'];
	}	
	
	echo '
        <!-- Page Content -->
        <div id="page-wrapper">
			<div id="border-under-header">
                <div class="row" id="welcomePageMainDiv">
                   	 <div class="col-lg-10">
                        <h2 class="page-header tour-step tour-step-one" id="homepageHeader">Home</h2>
                   	 </div><!-- /.col-lg-10 -->
					</div><!-- /.row -->
                </div><!-- /#border-under-header -->
           	 <div class="container-fluid">
									<br/>
                                    <h1 id="greetingMessage" class="centred_text" style="display:none"></h1> 
									<br/>
                                    <h3 class="centred_text  fade-in one tour-step tour-step-two">What would you like to do?</h3>
									<br/>
									<!-- /.row -->
									<div class="row">
										<div class="centred_text">
											<div class="col-lg-2 col-md-2"></div>
											<div class="col-lg-4 col-md-4">
												<a href="add_donor_historical_pieces.php">
													<img src="images/add_a_historical_piece_icon.png" class="image_ani_dash tour-step tour-step-three" alt="Add a historical piece icon."/>
												</a>
											</div>
											<div class="col-lg-4 col-md-4">
												<a href="search_for_donor_historical_pieces.php">
													<img src="images/search_a_historical_piece_icon.png" class="image_ani_dash tour-step tour-step-four" alt="Search for a historical piece icon."/>
												</a>
											</div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->'
?>