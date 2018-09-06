<style>
.nav > li > a {
  color: #a7b1c2;
  font-weight: bold;
}
.nav.navbar-right > li > a {
  color: #999c9e;
}
.nav > li.active > a {
  color: #ffffff;
}
.navbar-default .nav > li > a:hover,
.navbar-default .nav > li > a:focus {
  background-color: #293846;
  color: white;
}
.navbar-default .nav > li > a:hover,
.navbar-default .nav > li > a:focus {
  background-color: #293846;
  color: white;
}
.nav .open > a,
.nav .open > a:hover,
.nav .open > a:focus {
  background: #fff;
}
.nav.navbar-top-links > li > a:hover,
.nav.navbar-top-links > li > a:focus {
  background-color: transparent;
}
.nav > li > a i {
  margin-right: 6px;
}
.navbar {
  border: 0;
}
.navbar-default {
  background-color: transparent;
  border-color: #435361;
}
.navbar-top-links li {
  display: inline-block;
}
.navbar-top-links li:last-child {
  margin-right: 40px;
}
.navbar-top-links li a {
  padding: 20px 10p;
}
.dropdown-menu {
  border: medium none;
  border-radius: 3px;
  box-shadow: 0 0 3px rgba(86, 96, 117, 0.7);
  display: none;
  float: left;
  font-size: 12px;
  left: 0;
  list-style: none outside none;
  padding: 0;
  position: absolute;
  text-shadow: none;
  top: 100%;
  z-index: 1000;
}
.dropdown-menu > li > a {
  border-radius: 3px;
  color: inherit;
  line-height: 25px;
  margin: 4px;
  text-align: left;
  font-weight: normal;
}
.dropdown-menu > li > a.font-bold {
  font-weight: 600;
}
.navbar-top-links .dropdown-menu li {
  display: block;
}
.navbar-top-links .dropdown-menu li:last-child {
  margin-right: 0;
}
.navbar-top-links .dropdown-menu li a {
  padding: 3px 20px;
  min-height: 0;
}

.navbar-top-links .dropdown-menu li a div {
  white-space: normal;
}
.navbar-top-links .dropdown-messages,
.navbar-top-links .dropdown-tasks,
.navbar-top-links .dropdown-alerts {
  width: 310px;
  min-width: 0;
}
.navbar-top-links .dropdown-messages {
  margin-left: 5px;
}
.navbar-top-links .dropdown-tasks {
  margin-left: -59px;
}
.navbar-top-links .dropdown-alerts {
  margin-left: -123px;
}
.navbar-top-links .dropdown-user {
  right: 0;
  left: auto;
}
.dropdown-messages,
.dropdown-alerts {
  padding: 10px 10px 10px 10px;
}
.dropdown-messages li a,
.dropdown-alerts li a {
  font-size: 12px;
}
.dropdown-messages li em,
.dropdown-alerts li em {
  font-size: 10px;
}
.nav.navbar-top-links .dropdown-alerts a {
  font-size: 12px;
}
.nav-header {
  padding: 33px 25px;
  background: url("patterns/header-profile.png") no-repeat;
}
.pace-done .nav-header {
  transition: all 0.5s;
}
.nav > li.active {
  border-left: 4px solid #19aa8d;
  background: #293846;
}
.nav.nav-second-level > li.active {
  border: none;
}
.nav.nav-second-level.collapse[style] {
  height: auto !important;
}
.nav-header a {
  color: #DFE4ED;
}
.nav.navbar-top-links a {
  font-size: 14px;
}
.arrow {
  float: right;
}
.fa.arrow:before {
  content: "\f104";
}
.active > a > .fa.arrow:before {
  content: "\f107";
}
.nav-second-level li,
.nav-third-level li {
  border-bottom: none !important;
}
.nav-second-level li a {
  padding: 7px 10px 7px 10px;
  padding-left: 52px;
}
.nav-third-level li a {
  padding-left: 62px;
}
.nav-second-level li:last-child {
  margin-bottom: 10px;
}
.navbar-fixed-top,
.navbar-static-top {
  background: #f3f3f4;
}
/*.navbar-static-top {
  background-color: #293846;
  color: #999c9e; 
}*/
#side-menu {
  background-color: #2f4050;
}
.sidebar-nav .navbar-collapse {
  background-color: #435361;
}
body {
  background-color: #2f4050;
}
.mini-navbar .nav-second-level {
  position: absolute;
  left: 70px;
  top: 0px;
  background-color: #2f4050;
  padding: 10px 10px 10px 10px;
  font-size: 12px;
}
.badged:after{
    content:attr(data-count);
    font-size:12px;
    text-shadow: 0 1px #444;
    text-align:center;
    position:relative;
    color:#EFEFEF;
    display:inline-block;
    z-index:2000;
    top:-10px;
    right:0px;
    border-radius:50%;
    padding:0px 3px;
    /*min-width:22px;*/
    border:2px solid #eee;
    box-shadow: -1px 1px 4px #444;
    margin:0 4px;
    background: #f0ad4e;
}
</style>
<?php 
echo '
        <!-- Navigation -->
		<! -- link for gradient http://colorzilla.com/gradient-editor/#53e3a6+0,50a3a2+50,53e3a6+100&0.47+0,1+100 -->
        <!-- <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background: -moz-linear-gradient(-45deg, rgba(83,227,166,0.47) 0%, rgba(80,163,162,0.74) 50%, rgba(83,227,166,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(83,227,166,0.47)), color-stop(50%,rgba(80,163,162,0.74)), color-stop(100%,rgba(83,227,166,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(-45deg, rgba(83,227,166,0.47) 0%,rgba(80,163,162,0.74) 50%,rgba(83,227,166,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(-45deg, rgba(83,227,166,0.47) 0%,rgba(80,163,162,0.74) 50%,rgba(83,227,166,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(-45deg, rgba(83,227,166,0.47) 0%,rgba(80,163,162,0.74) 50%,rgba(83,227,166,1) 100%); /* IE10+ */
background: linear-gradient(135deg, rgba(83,227,166,0.47) 0%,rgba(80,163,162,0.74) 50%,rgba(83,227,166,1) 100%); /* W3C */">
-->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
        
        	<!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="anatomy_homepage.php" style="font-weight:bold">UCC Anatomy Homepage
			<span>
				
			</span>
		</a>
            </div>
            <!-- /.navbar-header -->

			<!-- navbar-top-links navbar-right -->
            <ul class="nav navbar-top-links navbar-right" id="notification_link" >
					
					<!-- dropdown -->
					<li class="dropdown">
						<a class="dropdown-toggle tour-step tour-step-seven" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="logout_historical_pieces.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
							</li>
						</ul>
						<!-- /.dropdown-user -->
					</li>
					<!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

			<!-- sidebar -->
            <div class="navbar-default sidebar navbar-static-side" role="navigation"/>
            	
            	<!-- sidebar collapse -->
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
			<li>
                            <a href="historical_pieces_home.php"><i class="fa fa-home fa-fw"></i> Historical Pieces Home</a>
                        </li>
						</li>
			<li>
                            <a href="add_donor_historical_pieces.php"><i class="fa fa-plus fa-fw"></i> Add a Historical Piece</a>
                        </li>
						</li>
			<li>
                            <a href="search_for_donor_historical_pieces.php"><i class="fa fa-search fa-fw"></i> Search for a Historical Piece</a>
                        </li>
						</li>
			<li>
                            <a href="historical_pieces_list_table.php"><i class="fa fa-list fa-fw"></i> Historical Pieces List</a>
                        </li>
						</li>
			<li>
                            <a href="historical_pieces_history_edit_import.php"><i class="fa fa-pencil fa-fw"></i> Edit a Historical Piece</a>
                        </li>
						<li>
						  <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Reports</span></a>
						  <ul class="nav nav-third-level">
						  	 <li>
								  <a href="historical_pieces_specimens_reports_aquired_on.php">Historical Pieces Aquired On</a>
							  </li>
							  <li>
								  <a href="historical_pieces_specimens_reports_disposed_of.php">Historical Pieces Disposed Of</a>
							  </li>
							</ul>
						</li>
			
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
'
?>


