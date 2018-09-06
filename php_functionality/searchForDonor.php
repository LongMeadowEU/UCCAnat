<?php

	echo '
	<div id="wrapper">
	
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
									
					<div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-12">
                                  <h2 class="page-header" id="homepageHeader">Search for a Donor</h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="dashboard.php">Home</a>
                                      </li>
                                      <li class="active">
                                          <a href="search_for_donor.php"><strong>Search for a Donor</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
                					
									<div class="row">
											<div class="col-lg-6 col-md-offset-3">
												
												<form role="form" id="searchForm" action="search.php" method="POST">
                                        			<div class="form-group centred_text">
                                        				
                                        				<br/>
                                            			<label>Search By Donor:</label>
                                            			<label class="radio-inline">
                                                			<input type="radio" name="optionsRadiosInline" class="targetRadio" id="optionsRadiosInline1" value="donorName" checked>Name
                                            			</label>
                                            			<label class="radio-inline">
                                                			<input type="radio" name="optionsRadiosInline" class="targetRadio" id="optionsRadiosInline2" value="referenceNum">Reference Number
                                            			</label>
                                            			<label class="radio-inline">
                                                			<input type="radio" name="optionsRadiosInline" class="targetRadio" id="optionsRadiosInline3" value="donorDOB">Date of Birth
                                            			</label>
                                        				<br/>
                                        				<br/>
                                        				<br/>
                                            			<label id="dynamicChangingLabel" for="searchBox">Name of Donor</label>
                                            				<input class="form-control" id="searchBox" name="search" placeholder="Enter Name of Donor" required>
                                            			<br/>
                                        				<br/>
                                        				<br/>
                                        				<div class="col-lg-6 col-md-offset-3">
                                        					<button class="btn btn-lg btn-orange btn-block" type="submit" value="search">Search</button>
                                        				</div>
                                       				 </div>
                                        		</form>
											</div>
									</div><!-- /.row -->
									
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->'
?>