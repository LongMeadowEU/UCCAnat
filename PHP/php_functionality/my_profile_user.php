<?php

	$connect_error1 = 'Sorry, we\'re experiencing some connection issues.';
	$login = $_SESSION['user_id'];
	$result = mysql_query("SELECT * FROM anatomy_login WHERE user_id = $login") or die($connect_error1);
												
	while($record = mysql_fetch_assoc($result)) {
			
			$user_firstname = ucwords($record['first_name']);
			$user_surname = ucwords($record['sur_name']);
			$email_address = $record['username'];
	}
	// current date and time at which page is loaded
	$date = date('d/m/Y h:i a', time());
    
	echo '
	<div id="wrapper">
	
	<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
			
			<div id="border-under-header">
			  <div class="row" id="welcomePageMainDiv">
				   <div class="col-lg-10">
					  <h2 class="page-header" id="homepageHeader">My Profile</h2>
					  <ol class="breadcrumb">
						  <li>
							<a href="dashboard.php">Home</a>
						  </li>
						  <li class="active">
							  <a href="my_profile.php"><strong>My Profile</strong></a>
						  </li>
					  </ol>
				   </div><!-- /.col-lg-10 -->
				  </div><!-- /.row -->
			  </div><!-- /#border-under-header -->
						  
                <div class="row">
                    <div class="col-lg-12">
                
							  <div class="container">
									<div class="row">

										<div class="col-md-6 col-lg-6 col-lg-offset-2 toppad" >
											<div class="panel panel-info">
												 <div class="panel-heading">
													<h3 class="panel-title">'.$user_firstname. ' ' .$user_surname .'</h3>
												</div>
												 <div class="panel-body">
													<div class="row">
														<div class="col-md-3 col-lg-3 " align="center"> <i class="fa fa-user fa-5x"></i> </div>
														<form action="" method="POST">
															<div class=" col-md-9 col-lg-9 "> 
																<table class="table table-user-information">
																	<tbody>
																		<tr>
																			<td>Access type</td>
																			<td>Administrator/User</td>
																		</tr>
																		<tr>
																			<td>Firstname</td>
																			<td id="landline_num_cell">'.$user_firstname. '</td>
																		</tr>
																		<tr>
																			<td>Surname</td>
																			<td id="mobile_num_cell">'.$user_surname. '</td>
																		</tr>
																	</tbody>
																</table>
										  				
																 <button type="button" class="btn btn-primary" value="edit" id="edit_button"><i class="fa fa-pencil"></i> Edit Profile</button>
																 <a href="change_password.php" class="btn btn-primary" id="change_password_btn"><i class="fa fa-key"></i> Change Password</a>
															
														</div>
														</form>
													</div>
												</div>
										<!--
										 <div class="panel-footer">
												<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
												<span class="pull-right">
													<a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
													<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
												</span>
										 </div>
										 -->
									
								  </div>
								</div>
								<div class="col-md-5  toppad  pull-right col-md-offset-3">
											<p class="text-info" style="color: #1ab394">'.$date.'</p>
								</div>
							  </div>
							</div>
							
						</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	</div>
	'
?>