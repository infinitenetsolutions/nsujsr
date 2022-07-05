<?php 
    $page_no = "1";
    $page_no_inside = "";
    require_once("include/authentication.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Srinath Homes | Dashboard</title>
    <?php require_once("include/css.php"); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php 
            require_once("include/navbar.php"); 
            require_once("include/aside.php");
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                                    <button type="button" class="btn btn-primary" onclick="document.getElementById('add_courses_with_excel').style.display='block'"><i class="fa fa-upload"></i> Import</button>
                                    <button type="button" class="btn btn-success" onclick="document.getElementById('add_courses').style.display='block'">Add Course</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" id="data">
                                <div id="loader_section"></div>
                            </div>
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
        <!-- Add Courses Modal Start-->
        <div id="add_courses" class="w3-modal" style="z-index:2020;">
            <div class="w3-modal-content w3-animate-top w3-card-4" style="width:40%">
                <header class="w3-container" style="background:#343a40; color:white;">
                    <span onclick="document.getElementById('add_courses').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <h2 align="center">Add Course</h2>
                </header>
                <form id="add_course_form" role="form" method="POST">
                    <div class="card-body">
                        <div class="col-md-12" id="error_section"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Name</label>
                                    <input type="text" name="add_course_name" class="form-control">
                                </div>

                                <div class="form-group">
                                </div>
                            </div>

                        </div>
                        <input type='hidden' name='action' value='add_courses' />
                        <div class="col-md-12" id="loader_section"></div>
                        <button type="button" id="add_course_button" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Add Courses Modal End -->
        <!-- Add Courses With Excel Modal Start-->
        <div id="add_courses_with_excel" class="w3-modal" style="z-index:2020;">
            <div class="w3-modal-content w3-animate-top w3-card-4" style="width:40%">
                <header class="w3-container" style="background:#343a40; color:white;">
                    <span onclick="document.getElementById('add_courses_with_excel').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <h2 align="center">Import An Excel</h2>
                </header>
                <form id="" role="form" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select An Excel File <span class="text-red">(CSV Format Only)</span></label>
                                    <input type="file" name="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type='hidden' name='action' value='' />
                        <button type="button" id="" class="btn btn-primary"><i class="fa fa-upload"></i> Import</button>
                        <button type="reset" onclick="document.getElementById('add_courses_with_excel').style.display='none'" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Add Courses With Excel Modal End -->
        <!-- /.content-wrapper -->
        <?php require_once("include/footer.php"); ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php require_once("include/js.php"); ?>
    <?php require_once("include/alert.php"); ?>
    <script>
        $(document).ready(function() {
            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /></center>');
            var action = "dashboard";
            var allData = "action=" + action;
            $.ajax({
                url: 'include/view.php',
                type: 'POST',
                data: allData,
                success: function(result) {
                    $('#loading').fadeOut(500, function() {
                        $(this).remove();
                        $("#data").html(result);
                    });
                }
            });
        });
    </script>
</body>

</html>