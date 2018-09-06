<?php

	echo '
	<div id="wrapper">
	
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
									
					<div id="border-under-header">
                          <div class="row" id="welcomePageMainDiv">
                               <div class="col-lg-12">
                                  <h2 class="page-header" id="homepageHeader">Search for a Historical Piece</h2>
                                  <ol class="breadcrumb">
                                  	  <li>
                                      	<a href="historical_pieces_home.php">Home</a>
                                      </li>
                                      <li class="active">
                                          <a href="search_for_donor_historical_pieces.php"><strong>Search for a Historical Piece</strong></a>
                                      </li>
                                  </ol>
                               </div><!-- /.col-lg-10 -->
                              </div><!-- /.row -->
                          </div><!-- /#border-under-header -->
                					
									<div class="row">
											<div class="col-lg-10 col-md-offset-1">
												
												<form role="form" id="searchForm" action="search_for_a_historical_piece_process.php" method="POST">
                                        			<div class="form-group centred_text" style="margin-top:5%">
                                        				
                                        				<br/>
                                            			<label>Search By Reference Number:</label>
                                            			<label class="radio-inline">
                                                			<input type="radio" name="optionsRadiosInline" class="targetRadio" id="optionsRadiosInline1" value="hist_piece_ref_num" checked>Reference Number
                                            			</label>
                                            			<label class="radio-inline">
                                                			<input type="radio" name="optionsRadiosInline" class="targetRadio" id="optionsRadiosInline2" value="hist_piece_type">Type of Historical Piece
                                            			</label>
                                            			<label class="radio-inline">
                                                			<input type="radio" name="optionsRadiosInline" class="targetRadio" id="optionsRadiosInline3" value="hist_disposal_date">Date of Disposal
                                            			</label>
														<label class="radio-inline">
                                                			<input type="radio" name="optionsRadiosInline" class="targetRadio" id="optionsRadiosInline4" value="hist_aquired_date">Date of Aquisition
                                            			</label>
                                        				<br/>
                                        				<br/>
                                        				<br/>
                                            			<label id="dynamicChangingLabel" for="searchBox">Historical Piece Reference Number</label>
                                            				<input class="form-control" id="searchBox" name="search" placeholder="Enter Reference Number" required>
                                            			<br/>
                                        				<br/>
                                        				<br/>
                                        				<div class="col-lg-6 col-md-offset-3">
                                        					<button class="btn btn-lg btn-blue-new btn-block" type="submit" value="search">Search</button>
                                        				</div>
                                       				 </div>
                                        		</form>
											</div>
									</div><!-- /.row -->
									
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->'
?>