<?php
    $page_no = "14";
    $page_no_inside = "";
    include("include/authentication.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Netaji Subhas Public School | Subject</title>
    <?php 
        include("include/css.php");
        // include("plugins/PHPExcel/PHPExcel/PHPExcel.php");
        // include("plugins/PHPExcel/PHPExcel/PHPExcel/IOFactory.php");
    ?>
    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
            include("include/navbar.php");
            include("include/aside.php");
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Subject</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Subject</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                                <div class="float-sm-right">

                                    <!-- <button type="button" class="btn btn-info" onclick="document.getElementById('import_excel').style.display='block'"><i class="fa fa-upload"></i> Import Students Data</button> -->
                                    <!-- <button type="button" class="btn btn-warning" onclick="document.getElementById('export_excel').style.display='block'"><i class="fa fa-download"></i> Export</button> -->

                                    <button type="button" class="btn btn-success" onclick="document.getElementById('add_modal').style.display='block'"><i class="fa fa-plus-square"></i> Add Subjects</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive" id="data">

                            </div>
                            <div id="loader_section"></div>
                            <div id="error_section"></div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /Main content -->
        </div>
        <!-- Modal Sections -->
        <!-- Add Modal End -->
        <div id="add_modal" class="w3-modal" style="z-index:2020;">
            <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                <header class="w3-container" style="background:#1d8749; color:white;">
                    <span onclick="document.getElementById('add_modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <h2 align="center">Add Subjects</h2>
                </header>
                <form id="addForm" role="form" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subject Name</label>
                                    <input type="text" id="subj_name" name="subj_name" class="form-control" min="1" max="12">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <input type='hidden' name='action' value='subject' />
                        <button type="submit" id="addButton" name="addButton" class="btn btn-success"><span id="addLoader"></span><span id="addText">Add</span></button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Add Modal End -->
        <!-- Import Excel Modal Start-->
        <div id="import_excel" class="w3-modal" style="z-index:2020;">
            <div class="w3-modal-content w3-animate-top w3-card-4" style="width:40%">
                <header class="w3-container" style="background:#1d8749; color:white;">
                    <span onclick="document.getElementById('import_excel').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <h2 align="center">Import An Excel</h2>
                </header>
                <form method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select An Excel File <span class="text-red">(CSV Format Only)</span></label>
                                    <input type="file" name="examExcel" class="form-control" accept=".xls,.xlsx">
                                </div>
                            </div>
                        </div>
                        <input type='hidden' name='action' value='importexam' />
                         <button type="submit" id="importButton" name="importButton" class="btn btn-success"><span id="addLoader"></span><span id="importText">Import</span></button>
                        <button type="reset" onclick="document.getElementById('import_excel').style.display='none'" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Import Excel Modal End -->
        <!-- Export Excel Modal Start-->
        <div id="export_excel" class="w3-modal" style="z-index:2020;">
            <div class="w3-modal-content w3-animate-top w3-card-4" style="width:40%">
                <header class="w3-container" style="background:#1d8749; color:white;">
                    <span onclick="document.getElementById('export_excel').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <h2 align="center">Export In Excel</h2>
                </header>
                <form  role="form" method="POST">
                    <div class="card-body" align="center">
                        <button type="button"  class="btn btn-primary"><i class="fa fa-download"></i> Export</button>
                        <button type="reset" onclick="document.getElementById('export_excel').style.display='none'" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Export Excel Modal End -->
        <!-- /Modal Sections -->
        <!-- /.content-wrapper -->
        <?php include("include/footer.php"); ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include("include/js.php"); ?>
    <?php include("include/alert.php"); ?>
    <script>
        $(document).ready(function() {
            main("subject");
            slowInternet();
            $('form#addForm').submit(function(event) {
                event.preventDefault();
                slowInternet();
                $('#addText').hide();
                $('#addLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                $('#addButton').prop('disabled', true);
                var formData = new FormData(this);
                $.ajax({
                    url: 'include/controller.php',
                    type: 'POST',
                    data: formData,
                    success: function(result) {
                        if(result == "success"){
                            $('#addForm')[0].reset();
                            $('#loading').fadeOut(500, function() {
                                $(this).remove();
                                $('#addText').show();
                                $('#addButton').prop('disabled', false);
                                alert_toast("success", "Subject Added Successfully!!!");
                                main("subject");
                                slowInternet();
                            });
                        } else {
                            $('#loading').fadeOut(500, function() {
                                $(this).remove();
                                $('#addText').show();
                                $('#addButton').prop('disabled', false);
                                if(result == "empty")
                                    alert_toast("warning", "Please Fill out all required Fields!!!");
                                else if(result == "error")
                                        alert_toast("error", "Something Went Wrong, Please try again!!!");
                                else
                                    $("#error_section").html(result);
                            });
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
            
        });
    </script>
    <?php
     //Import exam Section Start With Ajax
        if(isset($_POST["importButton"])){
            // print_r($_FILES);
            // print_r($_POST);
            // echo"<script>alert('okkk')</script>";
            $conn = mysqli_connect('localhost', 'nspsjadugora_db', 'TdUE8FLwiC','nspsjadugora_db');
            if(isset($_FILES["examExcel"]["name"]))
                {
                    $cou=0;
                    $path = $_FILES["examExcel"]["tmp_name"];
                    $object = PHPExcel_IOFactory::load($path);
                    foreach($object->getWorksheetIterator() as $worksheet)
                    {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                        for($row=2; $row<=$highestRow; $row++)
                        {
                            $stud_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $stud_roll = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $stud_class = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            $stud_userid = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $stud_pass = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                            $query = "INSERT INTO tbl_student(stud_name,stud_roll,stud_class,stud_userid,stud_pass) VALUES ('".$stud_name."', '".$stud_roll."', '".$stud_class."', '".$stud_userid."', '".$stud_pass."')";
                            $insert1=mysqli_query($conn, $query);
                            if($insert1){
                                $cou++;
                            }
                        }
                    }
                        if($highestRow>0){
                                echo "success";
                                echo"<script>alert('Data Import Success')</script>";
                        }else{
                            echo "error";
                            echo"<script>alert('error')</script>";
                        }                            
                } else{
                     echo "empty";
                    echo"<script>alert('empty')</script>";
                }
               
        }
        //Import exam Section End With Ajax
    ?>
    
</body>
</html>