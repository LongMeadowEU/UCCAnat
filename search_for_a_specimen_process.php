<?php
ob_start();
include_once 'init.php';
include_once 'functions/users.php';
if (logged_in_imports() !== true) {
    header("Location: index.php");
}

$connect_error1 = 'Cannot connect to DataBase - specimenSerach';
$search = $_POST['search'];
$radio = $_POST['optionsRadiosInline'];

$show_form_new = true;
$specByRef = "SELECT * FROM import_specimens WHERE specimen_reference_number LIKE '%$search%'";
$specByItemNum = "SELECT * FROM import_specimens WHERE specimen_item_number LIKE '%$search%'";
$specbyDeliveryDate = "SELECT * FROM import_specimens WHERE specimen_delivery_date LIKE '%$search%'";
if ($radio == "speciment_ref_num") {
    $result = mysqli_query($db_connect, $specByRef) or die($connect_error1);
} else if ($radio == "specimen_item_num") {
    $result = mysqli_query($db_connect, $specByItemNum) or die($connect_error1);
} else if ($radio == "import_delivery_date") {
    $result = mysqli_query($db_connect, $specbyDeliveryDate) or die($connect_error1);
}

$numberOfRws = mysqli_num_rows($result);

if (isset($_POST['sumbitBT_new'])) {
    if (empty($_POST['donor_ref_hidden']) === false) {
        $show_form_new = false;

        $_SESSION['selected_specimen_ref_hist'] = $_POST['donor_ref_hidden'];
        $selected_specimen_ref_hist = $_SESSION['selected_specimen_ref_hist'];

        header("Location: specimen_history_edit_import.php");
    }
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

        <title>Search For A Specimen: Results</title>

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

        <link href="bower_components/datatables/media/css/dataTables.tableTools.css" rel="stylesheet" type="text/css"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            .clickable{
                cursor: pointer;   
            }
            #filter-panel {
                display: none;
            }
            tr.selected td{
                background-color:#9c30b8 !important;
            }

        </style>

    </head>

    <body>

        <?php
        include_once 'php_functionality/imports/imports_navigation_menu.php';
        ?>

        <div id="page-wrapper">

            <div class="row"> 

                <div id="border-under-header">
                    <div class="row" id="welcomePageMainDiv">
                        <div class="col-lg-12">
                            <h2 class="page-header" id="homepageHeader">Search Results <button onclick="redirect()" class="btn btn-purple pull-right" style="vertical-align: middle; padding: 1px; width: 120px">New Search <i class="glyphicon glyphicon-search"></i></button></h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="imports_home.php">Home</a>
                                </li>
                                <li>
                                    <a href="search_for_donor_imports.php">Search for a Specimen</a>
                                </li>
                                <li class="active">
                                    <a href="#"><strong>Search Results</strong></a>
                                </li>
                            </ol>
                        </div><!-- /.col-lg-10 -->
                    </div><!-- /.row -->
                </div><!-- /#border-under-header -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-purple" style="margin-top: 2%">

                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <?php echo $numberOfRws ?> results found searching for <?php echo "$search" ?>
                                    <span class="pull-right">Search Category - 
                                        <?php
                                        if ($radio == "speciment_ref_num") {
                                            echo 'Reference Number';
                                        } else if ($radio == "specimen_item_num") {
                                            echo 'Item Number';
                                        } else if ($radio == "import_delivery_date") {
                                            echo 'Date of Delivery';        
                                        }
                                        ?>
                                    </span></h4>
                            </div><!-- /.panel-heading -->
                            <?php
                            if ($numberOfRws != 0) {
                                ?>
                                <div class="panel-body">
                                    <div class="dataTable_wrapper">
                                        <div class="table-responsive">
                                            <?php
                                            if ($numberOfRws > 0) {
                                                ?>
                                                <table class="table table-striped table-bordered table-hover sortable" id="patientTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Reference </br>Number</th>
                                                            <th>Item </br>Number</th>
                                                            <th>User</th>
                                                            <th>Type of </br>Specimen</th>
                                                            <th>Delivery </br>Date</th>
                                                            <th>Cremation </br>Date</th>
                                                            <th>Serology</th>
                                                            <th>Sex</th>
                                                            <th>Images</th>
                                                            <th>Imports </br>Removed</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                            $date_of_delivery = $row['specimen_delivery_date'];
                                                            $formatted_specimen_delivery_date = date('d-m-Y', strtotime($date_of_delivery));

                                                            $date_of_cremation = $row['specimen_cremation_date'];
                                                            $formatted_specimen_cremation_date = date('d-m-Y', strtotime($date_of_cremation));

                                                            $specimen_images_yes_no = $row['specimen_images'];
                                                            if ($specimen_images_yes_no == "0") {
                                                                $spec_im_text = "No";
                                                            } else if ($specimen_images_yes_no == "1") {
                                                                $spec_im_text = "Yes";
                                                            }

                                                            $imports_removed_yes_no = $row['specimen_imports_removed'];
                                                            if ($imports_removed_yes_no == "0") {
                                                                $imports_rem_text = "No";
                                                            } else if ($imports_removed_yes_no == "1") {
                                                                $imports_rem_text = "Yes";
                                                            }

                                                            echo '<tr>';
                                                            echo '<td>' . $row['specimen_reference_number'] . '</td>';
                                                            echo '<td>' . $row['specimen_item_number'] . '</td>';
                                                            echo '<td>' . $row['specimen_user'] . '</td>';
                                                            echo '<td>' . $row['type_of_specimen'] . '</td>';
                                                            echo '<td>' . $formatted_specimen_delivery_date . '</td>';
                                                            echo '<td>' . $formatted_specimen_cremation_date . '</td>';
                                                            echo '<td>' . $row['specimen_serology'] . '</td>';
                                                            echo '<td>' . $row['imports_sex'] . '</td>';
                                                            echo '<td>' . $spec_im_text . '</td>';
                                                            echo '<td>' . $imports_rem_text . '</td>';
                                                            echo '</tr>';
                                                        };
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div><!-- /.table-responsive -->
                                    </div><!-- .dataTableW_wrapper -->
                                </div><!-- /.panel-body -->
                                <?php
                            } else {
                                echo '
											<div class="centred_text" style="margin-top: 5%; margin-bottom: 5%">
												<p class="lead">Sorry, there were no results found matching your search.</p>
											</div>
											';
                            }
                            ?>

                            <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                <div class="modal-dialog modal-lg">
                                    <form role="form" id="pat_select_form" action="" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                <h3>Specimen Selected<input type="text" class="form-control pull-right input-sm centred_text" id="donor_ref_hidden" name="donor_ref_hidden" style="width: 10%" readonly/>
                                                </h3>
                                            </div><!-- modal header end -->
                                            <div class="modal-body">
                                                <h4 class="text-center" id="donor_name_header"></h4>


                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                        <tr>
                                                            <th>Reference </br>Number</th>
                                                            <th>Item </br>Number</th>
                                                            <th>User</th>
                                                            <th>Type of </br>Specimen</th>
                                                            <th>Delivery </br>Date</th>
                                                            <th>Cremation </br>Date</th>
                                                            <th>Serology</th>
                                                            <th>Sex</th>
                                                            <th>Images</th>
                                                            <th>Imports </br>Removed</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="ref_num_JS">$from php</td>
                                                            <td id="item_num_JS">$from php</td>
                                                            <td id="user_JS">$from php</td>
                                                            <td id="type_of_spec_JS">$from php</td>
                                                            <td id="delivery_date_JS">$from php</td>
                                                            <td id="cremation_date_JS">$from php</td>
                                                            <td id="serology_JS">$from php</td>
                                                            <td id="sex_JS">$from php</td>
                                                            <td id="images_JS">$from php</td>
                                                            <td id="import_removed_JS">$from php</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div><!-- modal body end -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default btn-pat-selected-size" data-dismiss="modal">Close</button>
                                                        <input class="btn btn-purple btn-pat-selected-size" type="submit" name="sumbitBT_new" id="sumbitBT_new" value="View History"/>
                                                    </div><!-- modal footer end -->
                                                </div><!-- modal content end -->
                                                </form>
                                            </div><!-- modal dialog .modal-lg end -->
                                        </div><!-- modal fade .bs-example-modal-lg end -->

                                </div><!-- /.panel -->

                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->

                    </div><!-- /#page-wrapper -->	

                </div> <!-- /#wrapper -->

                <!-- jQuery -->
                <script src="bower_components/jquery/dist/jquery.min.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

                <!-- Metis Menu Plugin JavaScript -->
                <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

                <!-- DataTables JavaScript -->
                <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
                <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
                <script src="bower_components/datatables/media/js/release-datatablesextensionsTableToolsjsdataTables.tableTools.js"></script>

                <!-- Custom Theme JavaScript -->
                <script src="dist/js/sb-admin-2.js"></script>

                <!-- dynamically change label of search text box and default placeholder when radio selection changes -->
                <script>

                                $(".targetRadio").change(function () {
                                    var selected = $("input[type='radio'][name=optionsRadiosInline]:checked", '#searchForm').val();
                                    var label = document.getElementById('dynamicChangingLabel');

                                    if (selected == "speciment_ref_num") {
                                        label.innerHTML = "Specimen Reference Number";
                                        $("#searchBox").attr("placeholder", "Enter Specimen Reference Number");
                                    } else if (selected == "specimen_item_num") {
                                        label.innerHTML = "Item Number";
                                        $("#searchBox").attr("placeholder", "Enter Specimen Item Number");
                                    } else if (selected == "import_delivery_date") {
                                        label.innerHTML = "Specimen Date of Delivery";
                                        $("#searchBox").attr("placeholder", "Enter Specimen Date of Delivery");
                                    }
                                });

                </script>

                <script>

                    $(document).ready(function () {
                        $('#patientTable').DataTable({
                            responsive: true,
                            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                            'bJQueryUI': true,
                            "sDom": 'T<"clear"><"top pull-left"l>rt<"bottom pull-left"i><"bottom pull-right"p>',
                            "tableTools": {
                                "sSwfPath": "copy_csv_xls_pdf.swf",
                                "sRowSelect": "single"
                            }
                        });
                    });

                    // global variables
                    var selected_current_row = "";
                    var current_selected_ref_num;
                    var current_selected_item_num;
                    var current_selected_user;
                    var current_selected_type_of_spec;
                    var current_selected_delivery_date;
                    var current_selected_cremation_date;
                    var current_selected_serology;
                    var current_selected_sex;
                    var current_selected_images;
                    var current_selected_import_removed;

                    $(document).ready(function () {
                        var table = $('#patientTable').DataTable();

                        $('#patientTable tbody').on('click', 'tr', function () {
                            if ($(this).hasClass('selected')) {
                                selected_current_row = table.row(this).data();
                                //$('.selected').css('background-color','#1ab394');
                                current_selected_ref_num = selected_current_row[0]
                                current_selected_item_num = selected_current_row[1];
                                current_selected_user = selected_current_row[2];
                                current_selected_type_of_spec = selected_current_row[3];
                                current_selected_delivery_date = selected_current_row[4];
                                current_selected_cremation_date = selected_current_row[5];
                                current_selected_serology = selected_current_row[6];
                                current_selected_sex = selected_current_row[7];
                                current_selected_images = selected_current_row[8];
                                current_selected_import_removed = selected_current_row[9];

                                // places the id of the selected patient in a hidden text field so it can be retrieved by PHP
                                $(function () {
                                    $('#donor_ref_hidden').val(current_selected_ref_num);
                                })

                                $(function () {
                                    $('#myModal').modal({show: true});

                                    $('#donor_name_header').html(current_selected_ref_num);
                                    $('#ref_num_JS').html(current_selected_ref_num);
                                    $('#item_num_JS').html(current_selected_item_num);
                                    $('#user_JS').html(current_selected_user);
                                    $('#type_of_spec_JS').html(current_selected_type_of_spec);
                                    $('#delivery_date_JS').html(current_selected_delivery_date);
                                    $('#cremation_date_JS').html(current_selected_cremation_date);
                                    $('#serology_JS').html(current_selected_serology);
                                    $('#sex_JS').html(current_selected_sex);
                                    $('#images_JS').html(current_selected_images);
                                    $('#import_removed_JS').html(current_selected_import_removed);

                                })
                            } else {
                                table.$('tr.selected').removeClass('selected');
                                $(this).addClass('selected');
                                // disable button click when no row is selected
                                selected_current_row = "";
                                // removes ID from the patient hidden id input field. 
                                $(function () {
                                    $('#donor_ref_hidden').val("");
                                })
                            }
                        });

                    });

                    function redirect() {
                        window.location = "search_for_donor_imports.php";
                    }
                </script>

                </body>

                </html>
