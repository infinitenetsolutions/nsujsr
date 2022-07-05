<?php 
    if(empty(session_start()))
        session_start();
    if(isset($_SESSION["logger_type"]) && isset($_SESSION["logger_username"]) && isset($_SESSION["logger_password"]))
        echo "<script> location.replace('dashboard'); </script>";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Netaji Subhas Public School | Log in</title>
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
<style>
    .login-box, .register-box {
    width: auto!important;
}

@media(max-width:576px){
    .login-box, .register-box{
    width: 550px;
    padding: 40px 30px!important;
}}
@media(min-width:576px){
.login-box, .register-box {
    width: 450px!important;
}
}
</style>
</head>

<body class="hold-transition login-page" style="background: url(../images/bg.jpg);
    background-size: cover;">
    
    <div class="login-box" style="
    background: #b4ddbb;
    padding: 40px 30px;
">
        <div class="login-logo">
            <a href="index"><img src="../images/logo.png" style="width:105%" /></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form id="admin_login_form" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" id="admin_login_username" name="admin_login_username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="admin_login_password" name="admin_login_password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye-slash" id="hidePass" onclick="this.style.display = 'none'; document.getElementById('showPass').style.display = 'block'; document.getElementById('admin_login_password').type = 'text';"></span>
                                <span class="fas fa-eye" id="showPass" onclick="this.style.display = 'none'; document.getElementById('hidePass').style.display = 'block'; document.getElementById('admin_login_password').type = 'password';" style="display:none;"></span>
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
                            <input type='hidden' name='action' value='admin_login' />
                            <button type="submit" id="admin_login_button" name="admin_login_button" class="btn btn-success btn-block"><span id="loader_section"></span> <span id="text_area">Sign In</span></button>
                        </div>
                        <!-- /.col --><br><br>
                        <!-- <div class="col-12">-->
                        <!--    <a href="https://nspsjadugora.com/admin/studentlogin"><button type="button" class="btn btn-success btn-block"><span id="text_area">Student Exam Sign In</span></button></a>-->
                        <!--</div>-->
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
            $('#admin_login_form').submit(function( event ) {
                $("#text_area").hide();
                $('#loader_section').append('<center id = "loading"><img width="18px" src = "images/ajax-loader.gif" alt="Loading..." /></center>');
                $('#admin_login_button').prop('disabled', true);
                $.ajax({
                    url: 'include/controller.php',
                    type: 'POST',
                    data: $('#admin_login_form').serializeArray(),
                    success: function(result) {
                        if(result == "success"){
                            alert_toast("success", "You have Successfully Logged In!!!");
                            $('#admin_login_form')[0].reset();
                            $('#loading').fadeOut(500, function() {
                                $(this).remove();
                                $("#text_area").show();
                                $("#text_area").html("Login...");
                                <?php 
                                    if(isset($_SESSION["previous_page"])){
                                        $previous_page = str_replace(".php", "", $_SESSION["previous_page"]);
                                    ?>
                                        location.replace("<?php echo $previous_page; ?>");
                                    <?php  
                                    } else{
                                ?>
                                        location.replace("dashboard");
                                <?php } ?>
                            });
                        } else{
                            if(result == "empty")
                                alert_toast("warning", "Please fill out your Username And Password!!!");
                            else if(result == "error"){
                                alert_toast("error", "Incorrect Authentication Details, Please try again!!!");
                                $('#admin_login_form')[0].reset();
                            }
                            else 
                                alert_toast("error", "Something went wrong, Please try again!!!");
                            $('#loading').fadeOut(500, function() {
                                $(this).remove();
                                $('#admin_login_button').prop('disabled', false);
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