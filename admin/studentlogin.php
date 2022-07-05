<?php 
     require_once('include/object.php');
      $visible = md5("visible");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Netaji Subhas Public School | Student Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
        <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    
    <div class="login-box">
        <div class="login-logo">
            <a href="index"><img src="images/logo.png" style="width:105%" /></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Studen Login</p>           
                <form id="student_login_form" method="POST">
                    <div class="input-group mb-3">
                       <select class="form-control" id="student_login_class" name="student_login_class" class="form-control" required="">
                                        <option selected="" disabled="">Select Class</option>
                                        <option value="Nur">Nur</option>
                                        <option value="LKG">LKG</option>
                                        <option value="UKG">UKG</option>
                                        <option value="1">Std 1</option>
                                        <option value="2">Std 2</option>
                                        <option value="3">Std 3</option>
                                        <option value="4">Std 4</option>
                                        <option value="5">Std 5</option>
                                        <option value="6">Std 6</option>
                                        <option value="7">Std 7</option>
                                        <option value="8">Std 8</option>
                                        <option value="9">Std 9</option>
                                        <option value="10">Std 10</option>
                                        <option value="11">Std 11</option>
                                        <option value="12">Std 12</option>
                                    </select>
                    </div>
                     <div class="input-group mb-3">
                         <select class="form-control" id="student_login_subj" name="student_login_subj" required="">
                                        <option selected="" disabled="">Select Subject</option>
                                        <?php
                                             $object->sql = "";
                                            $object->select("tbl_subject");
                                            $object->where("`status` = '$visible'");
                                            $result = $object->get();
                                            if($result->num_rows > 0){
                                                while($row = $object->get_row()){
                                        ?>
                                        <option value="<?php echo $row["subj_id"]; ?>"><?php echo $row["subj_name"]; ?></option>
                                        <?php
                                                }
                                            }else{
                                        ?>
                                        <option disabled="">No Subject</option>
                                        <?php
                                            }
                                        ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="student_login_username" name="student_login_username" class="form-control" placeholder="Username" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="student_login_password" name="student_login_password" class="form-control" placeholder="Password" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye-slash" id="hidePass" onclick="this.style.display = 'none'; document.getElementById('showPass').style.display = 'block'; document.getElementById('student_login_password').type = 'text';"></span>
                                <span class="fas fa-eye" id="showPass" onclick="this.style.display = 'none'; document.getElementById('hidePass').style.display = 'block'; document.getElementById('student_login_password').type = 'password';" style="display:none;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-success">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <input type='hidden' name='action' value='student_login' />
                            <button type="submit" id="student_login_button" name="student_login_button" class="btn btn-success btn-block"><span id="loader_section"></span> <span id="text_area">Sign In</span></button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!--<p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>-->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <?php require_once("include/alert.php"); ?>
    <script>
        $(document).ready(function() {
            $('#student_login_form').submit(function( event ) {
                $("#text_area").hide();
                $('#loader_section').append('<center id = "loading"><img width="18px" src = "images/ajax-loader.gif" alt="Loading..." /></center>');
                $('#student_login_button').prop('disabled', true);
                $.ajax({
                    url: 'include/controller.php',
                    type: 'POST',
                    data: $('#student_login_form').serializeArray(),
                    success: function(result) {
                        var data = JSON.parse(result);
                        if(data.statu == "success"){
                            alert_toast("success", "You have Successfully Logged In!!!");
                            $('#student_login_form')[0].reset();
                            $('#loading').fadeOut(500, function() {
                                $(this).remove();
                                $("#text_area").show();
                                $("#text_area").html("Login...");
                                location.replace(data.link);
                            });
                        } else{
                            if(data.statu == "empty")
                                alert_toast("warning", "Please fill out your Class, Subject, Username And Password!!!");
                            else if(data.statu == "error"){
                                alert_toast("error", "Incorrect Authentication Details, Please try again!!!");
                                $('#student_login_form')[0].reset();
                            }
                            else if(data.statu == "nodata"){
                                alert_toast("error", "Incorrect Authentication Details No Data Present, Please try again!!!");
                                $('#student_login_form')[0].reset();
                            }
                            else if(data.statu == "timeout"){
                                alert_toast("error", "Exam Not Started, Please try again later!!!");
                                $('#student_login_form')[0].reset();
                            }
                             else if(data.statu == "noaccount"){
                                alert_toast("error", "Incorrect Authentication Details No Account Present, Please try again!!!");
                                $('#student_login_form')[0].reset();
                            }
                            else 
                                alert_toast("error", "Something went wrong, Please try again!!!");
                            $('#loading').fadeOut(500, function() {
                                $(this).remove();
                                $('#student_login_button').prop('disabled', false);
                                $("#text_area").show();
                            });
                        }
                    }
                });
                event.preventDefault();
            });

        });
    </script>

</body>

</html>