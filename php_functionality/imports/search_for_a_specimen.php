<?php

	echo '
	<div id="wrapper">
	
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
									
					<div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-12">
                                  <h2 class="page-header" id="homepageHeader">Search for a Specimen</h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="imports_dashboard.php">Home</a>
                                      </li>
                                      <li class="active">
                                          <a href="search_for_donor_imports.php"><strong>Search for a Specimen</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
                					
									<div class="row">
											<div class="col-lg-8 col-md-offset-2">
												
												<form role="form" id="searchForm" action="search_for_a_specimen_process.php" method="POST">
                                        			<div class="form-group centred_text" style="margin-top:5%">
                                        				
                                        				<br/>
                                            			<label>Search By Specimen:</label>
                                            			<label class="radio-inline">
                                                			<input type="radio" name="optionsRadiosInline" class="targetRadio" id="optionsRadiosInline1" value="speciment_ref_num" checked>Reference Number
                                            			</label>
                                            			<label class="radio-inline">
                                                			<input type="radio" name="optionsRadiosInline" class="targetRadio" id="optionsRadiosInline2" value="specimen_item_num">Item Number
                                            			</label>
                                            			<label class="radio-inline">
                                                			<input type="radio" name="optionsRadiosInline" class="targetRadio" id="optionsRadiosInline3" value="import_delivery_date">Date of Delivery
                                            			</label>
                                        				<br/>
                                        				<br/>
                                        				<br/>
                                            			<label id="dynamicChangingLabel" for="searchBox">Specimen Reference Number</label>
                                            				<input class="form-control" id="searchBox" name="search" placeholder="Enter Specimen Reference Number" required>
                                            			<br/>
                                        				<br/>
                                        				<br/>
                                        				<div class="col-lg-6 col-md-offset-3">
                                        					<button class="btn btn-lg btn-purple btn-block" type="submit" value="search">Search</button>
                                        				</div>
                                       				 </div>
                                        		</form>
											</div>
									</div><!-- /.row -->
									
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->'
?>