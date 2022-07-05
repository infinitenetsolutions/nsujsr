<?php
    $page_no = "6";
    $page_no_inside = "";
    require_once("include/authentication.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Netaji Subhas Public School | Class Room</title>
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
                            <h1 class="m-0 text-dark">Class Room</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Class Room</li>
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
<!--
                                    <button type="button" class="btn btn-info" onclick="document.getElementById('import_excel').style.display='block'"><i class="fa fa-upload"></i> Import</button>
                                    <button type="button" class="btn btn-warning" onclick="document.getElementById('export_excel').style.display='block'"><i class="fa fa-download"></i> Export</button>
-->
                                    <button type="button" class="btn btn-success" onclick="document.getElementById('add_modal').style.display='block'"><i class="fa fa-plus-square"></i> Add</button>
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
                    <h2 align="center">Add Class Room</h2>
                </header>
                <form id="addForm" role="form" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
						    <div class="col-md-6">
                                <div class="form-group">
                                    <label>Add Title</label>
                                    <input type="text" id="class_room_title" name="class_room_title" class="form-control">
                                </div>
                            </div>
							 <div class="col-md-6">
                                <div class="form-group">
                                    <label>Add Meta Description</label>
                                    <input type="text" id="class_room_meta_description" name="class_room_meta_description" class="form-control">
                                </div>
                            </div>
							 <div class="col-md-6">
                                <div class="form-group">
                                    <label>Add Meta Keyword</label>
                                    <input type="text" id="class_room_meta_keyword" name="class_room_meta_keyword" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" id="class_room_image" name="class_room_image">
                                    <small>Choose Image</small>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <input type='hidden' name='action' value='class_room' />
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
                <form  role="form" method="POST">
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
                        <button type="button"  class="btn btn-primary"><i class="fa fa-upload"></i> Import</button>
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
        <?php require_once("include/footer.php"); ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php require_once("include/js.php"); ?>
    <?php require_once("include/alert.php"); ?>
    <script>
        $(document).ready(function() {
            main("class_room");
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
                            $('#class_room_image').css("border", "1px solid #dddddd");
                            $('#loading').fadeOut(500, function() {
                                $(this).remove();
                                $('#addText').show();
                                $('#addButton').prop('disabled', false);
                                alert_toast("success", "Added Successfully!!!");
                                main("class_room");
                                slowInternet();
                            });
                        } else {
                            if($('#class_room_image').val() == ''){
                                $('#class_room_image').addClass("is-invalid");
                                alert_toast("warning", "Please Select a Header Image!!!");
                            }
                            else
                                $('#class_room_image').removeClass("is-invalid");
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
</body>

</html>
