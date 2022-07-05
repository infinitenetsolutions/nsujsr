<?php
include("./config.php");
$contact_query = "SELECT count(*) as total FROM `tbl_enquiry` WHERE 1";
$contact_info = mysqli_query($conn , $contact_query);
$contact_result = mysqli_fetch_assoc($contact_info);


$news_query = "SELECT count(*) as total FROM `tbl_news` WHERE 1";
$news_info = mysqli_query($conn , $news_query);
$news_result = mysqli_fetch_assoc($news_info);



$staff_query = "SELECT count(*) as total FROM `tbl_staff` WHERE 1";
$staff_info = mysqli_query($conn,$staff_query);
$staff_result = mysqli_fetch_assoc($staff_info);


$gallery_query = "SELECT count(*) as total FROM `tbl_gallery` WHERE 1";
$gallery_info = mysqli_query($conn,$gallery_query);
$gallery_result = mysqli_fetch_assoc($gallery_info);
//  var_dump(]);
// admin/include/view.php
    //Starting Session
    if(empty(session_start()))
        session_start();
    //Server Username = srinathhomes
    //Server Password = 3FhmC8AXa
    //FTP Host = 184.164.144.130
    //FTP Username = srinathhomesftp@srinathhomes.in
    //FTP Password = vyDu61ho
    //Include Object And Class
    require_once('object.php');
    $ip_address = $_SERVER['REMOTE_ADDR']; //Ip Address
    $random_number = rand(111111,999999); // Random Number
    $visible = md5("visible");
    $trash = md5("trash");
    // Setting Time Zone in India Standard Timing
    date_default_timezone_set("Asia/Calcutta");
    $date_variable_today_month_year_with_timing = date("d M, Y. h:i A");
    //Finding Admin Id Start
    $object->sql = "";
    $object->select("tbl_admin");
    $object->where("`admin_username` = '".$_SESSION["logger_username"]."' && `status` = '$visible'");
    $result = $object->get();
    if($result->num_rows > 0)
        $row = $object->get_row();
    else {
        ?>
        <script>
            alert_toast("error", "Sorry, You are not looking like Our Admin!!!");
        </script>
        <?php
        exit();
    }
    $admin_id = $row["admin_id"]; //Admin Id
    //Finding Admin Id End
    //All File Directries Start
    //All File Directries End
    if(isset($_POST["action"])){
    //Action Section Start
        /* ---------- All Admin(Backend) Codes Start ---------- */
        //Dashboard Section Start
        if($_POST["action"] == "dashboard"){
            ?>
                <!-- /.Row -->
                <div class="row">
                    <!-- Col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $contact_result['total'] ?></h3>

                                <p>Contact Info</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <a href="enquiry" class="small-box-footer">
                                More Info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./Col -->
                    <!-- Col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $news_result['total']?></h3>

                                <p>News & Events</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <a href="news" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./Col -->
                    <!-- Col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo $staff_result['total']?></h3>

                                <p>School Staff</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <a href="staff" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./Col -->
                    <!-- Col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $gallery_result['total']?></h3>

                                <p>Gallery Info</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <a href="gallery" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./Col -->
                </div>
                <!-- /.Row -->
            <?php
        }
        //Dashboard Section End       
        //About Section Start -----------------------------------------------------------------------------------------------------------------
        //Our Mission Section Start
        if($_POST["action"] == "mission"){
            $object->sql = "";
            $object->select("tbl_mission");
            $object->where("`mission_id` = '1' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
            }
            $missionInformations = json_decode($row["mission_information"]);
            ?>
            <div class="row">
                <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Title</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["mission_title"]; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Meta Keyword</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["mission_meta_keyword"]; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Meta Description</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["mission_meta_description"]; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Heading</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $missionInformations->heading; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Image</span>
                                <p><img src="images/mission/<?php echo $missionInformations->image; ?>" width="100%" alt="Image" /></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Description</span>
                                <p><?php echo htmlspecialchars_decode($missionInformations->description); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" id="edit-div">
                    <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                        <div class="card-body mt-0 pt-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-red"><b><u>Update</u></b></h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Title</label>
                                        <input type="text" id="mission_title" name="mission_title"  class="form-control" value="<?php echo $row["mission_title"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Meta Keyword</label>
                                        <input type="text" id="mission_meta_keyword" name="mission_meta_keyword"  class="form-control" value="<?php echo $row["mission_meta_keyword"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Meta Description</label>
                                        <input type="text" id="mission_meta_description" name="mission_meta_description"  class="form-control" value="<?php echo $row["mission_meta_description"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Heading</label>
                                        <input type="text" id="aboutHeading" name="missionHeading"  class="form-control" value="<?php echo $missionInformations->heading; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Image</label>
                                        <input type="file" id="missionImage" name="missionImage"  class="form-control">
                                        <small>Choose an image</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="aboutDescriptionDiv">
                                        <label>Update Description</label>
                                        <textarea class="textarea" id="missionDescription" name="missionDescription" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo htmlspecialchars_decode($missionInformations->description); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <input type='hidden' name='action' value='editMission' />
                            <input type='hidden' name='editMission' value='<?php echo "mission"; ?>' />
                            <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('form#editForm').submit(function(event) {
                        event.preventDefault();
                        slowInternet();
                        $('#editText').hide();
                        $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                        $('#editButton').prop('disabled', true);
                        var formData = new FormData(this);
                        $.ajax({
                            url: 'include/controller.php',
                            type: 'POST',
                            data: formData,
                            success: function(result) {
                                $('#response_career_msg').remove();
                                if(result == "success"){
                                    $('#editForm')[0].reset();
                                    $('#missionHeading').removeClass("is-invalid");
                                    $('#loading').fadeOut(500, function() {
                                        $(this).remove();
                                        $('#editText').show();
                                        $('#editButton').prop('disabled', false);
                                        alert_toast("success", "Mission Updated Successfully!!!");
                                        main("mission");
                                        slowInternet();
                                    });
                                } else {
                                     if($('#missionHeading').val() == ''){
                                        $('#missionHeading').addClass("is-invalid");
                                        alert_toast("warning", "Please fill out Heading!!!");
                                    }
                                    else
                                        $('#missionHeading').removeClass("is-invalid");
                                    if($('#missionDescription').val() == ''){
                                        $( "#missionDescriptionDiv" ).effect("shake");
                                        alert_toast("warning", "Please write a short description!!!");
                                    }
                                    $('#loading').fadeOut(500, function() {
                                        $(this).remove();
                                        $('#editText').show();
                                        $('#editButton').prop('disabled', false);
                                        if(result == "empty")
                                            alert_toast("warning", "Please Fill out all required Fields!!!");
                                        else if(result == "error")
                                                alert_toast("error", "Something Went Wrong, Please try again!!!");
                                        else if(result == "nochange")
                                                alert_toast("warning", "No Changes Made!!!");
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
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Our Mission Section End
        
        
        
        // Change Email Section Start
        if($_POST["action"] == "change-email"){
            $object->sql = "";
            $object->select("tbl_change_email");
            $object->where("`status` = '$visible' && `change_email_id` = 1");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
            }
            //$aboutInformations = json_decode($row["about_information"]);
            ?>
            <div class="row">
                <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Update Email</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["email"]; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Update Address</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["address"]; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Update Phone No.</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["phone_no"]; ?></p>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-8" id="edit-div">
                    <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                        <div class="card-body mt-0 pt-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-red"><b><u>Update</u></b></h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Email</label>
                                        <input type="email" id="email" name="email"  class="form-control" value="<?php echo $row["email"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Address</label>
                                        <input type="text" id="address" name="address"  class="form-control" value="<?php echo $row["address"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Phone No</label>
                                        <input type="text" id="phone_no" name="phone_no"  class="form-control" value="<?php echo $row["phone_no"]; ?>">
                                    </div>
                                </div>
                                
                                
                            </div>
                            <br />
                            <input type='hidden' name='action' value='editChangeEmail' />
                            <input type='hidden' name='editChangeEmail' value='<?php echo "change-email"; ?>' />
                            <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('form#editForm').submit(function(event) {
                        event.preventDefault();
                        slowInternet();
                        $('#editText').hide();
                        $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                        $('#editButton').prop('disabled', true);
                        var formData = new FormData(this);
                        $.ajax({
                            url: 'include/controller.php',
                            type: 'POST',
                            data: formData,
                            success: function(result) {
                                $('#response_career_msg').remove();
                                if(result == "success"){
                                    $('#editForm')[0].reset();
                                
                                    //$('#aboutHeading').removeClass("is-invalid");
                                    $('#loading').fadeOut(500, function() {
                                        $(this).remove();
                                        $('#editText').show();
                                        $('#editButton').prop('disabled', false);
                                        alert_toast("success", " Updated Successfully!!!");
                                        main("change-email");
                                        slowInternet();
                                    });
                                } 
                                    $('#loading').fadeOut(500, function() {
                                        $(this).remove();
                                        $('#editText').show();
                                        $('#editButton').prop('disabled', false);
                                        if(result == "empty")
                                            alert_toast("warning", "Please Fill out all required Fields!!!");
                                        else if(result == "error")
                                                alert_toast("error", "Something Went Wrong, Please try again!!!");
                                        else if(result == "nochange")
                                                alert_toast("warning", "No Changes Made!!!");
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
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Change Email Section End
        
        
        
        
        
         //testimonial Section Start
        if($_POST["action"] == "testimonial"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Meta Keyword</th>
                    <th>Meta Description</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Added By</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_testimonial");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                                
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["testimonial_title"]; ?></td>
                                    <td><?php echo $row["testimonial_meta_keyword"]; ?></td>
                                    <td><?php echo $row["testimonial_meta_description"]; ?></td>
                                    <td><?php echo $row["testimonial_name"]; ?></td>
                                    <td><?php echo $row["testimonial_description"]; ?></td>
                                    <td><img src="images/testimonial/<?php echo $row["testimonial_image"]; ?>" width="100px" /></td>
                                    <td><?php
                                            if($row["testimonial_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["testimonial_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["testimonial_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["testimonial_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["testimonial_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["testimonial_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["testimonial_id"]; ?>" class="btn btn-warning" title="Edit Team"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["testimonial_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Staff"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                
                                
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["testimonial_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["testimonial_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["testimonial_name"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["testimonial_title"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["testimonial_meta_keyword"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["testimonial_meta_description"]; ?></p>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Name</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["testimonial_name"]; ?></p>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["testimonial_description"]; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/testimonial/<?php echo $row["testimonial_image"]; ?>" width="100%" /></p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                
                              
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["testimonial_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["testimonial_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["testimonial_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["testimonial_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["testimonial_id"]; ?>" name="tblName" type="hidden" value="tbl_testimonial" />
                                                        <input id="deleteId<?php echo $row["testimonial_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["testimonial_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["testimonial_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["testimonial_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["testimonial_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["testimonial_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["testimonial_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["testimonial_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["testimonial_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["testimonial_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["testimonial_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["testimonial_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["testimonial_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["testimonial_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["testimonial_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", " testimonial Deleted Successfully!!!");
                                                            main("testimonial");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["testimonial_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["testimonial_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["testimonial_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["testimonial_id"]; ?>').prop('disabled', true);
                                            var action = "edittestimonial";
                                            var testimonialId = "<?php echo $row["testimonial_id"]; ?>";
                                            var dataString = 'action='+ action +'&testimonialId='+ testimonialId;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Testimonial Section End
        
        
        
        
        //Edit Testimonial Section Start
        if($_POST["action"] == "edittestimonial"){
            $rowProperty = "";
            $testimonialId = $_POST["testimonialId"];
            $object->sql = "";
            $object->select("tbl_testimonial");
            $object->where("`testimonial_id` = '$testimonialId' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                 /*$propertyRealName = "";
                $object->sql = "";
                $object->select("tbl_designation");
                $object->where("`designation_id` = '".$row["designation_id"]."' && `status` = '$visible'");
                $resultProperty = $object->get();
                if($resultProperty->num_rows > 0)
                    $rowProperty = $object->get_row();
                $propertyRealName = $rowProperty["designation_name"];*/
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTotestimonial" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                         <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["testimonial_title"]; ?></p>
                                </div>
                            </div>
                             <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["testimonial_meta_keyword"]; ?></p>
                                </div>
                            </div>
                             <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["testimonial_meta_description"]; ?></p>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Name</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["testimonial_name"]; ?></p>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Description</span>
                                   <textarea class="textarea" id="testimonial_description" name="testimonial_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["testimonial_description"]; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/testimonial/<?php echo $row["testimonial_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Tesimonial</u></b></h3>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="testimonial_title" name="testimonial_title" class="form-control" value="<?php echo $row["testimonial_title"]; ?>">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="testimonial_meta_keyword" name="testimonial_meta_keyword" class="form-control" value="<?php echo $row["testimonial_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="testimonial_meta_description" name="testimonial_meta_description" class="form-control" value="<?php echo $row["testimonial_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Name</label>
                                            <input type="text" id="testimonial_name" name="testimonial_name" class="form-control" value="<?php echo $row["testimonial_name"]; ?>">
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Image</label>
                                            <input type="file" id="testimonial_image" name="testimonial_image" class="form-control">
                                            <small>Choose Image</small>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Update Description</label>
                                            <textarea class="textarea" id="testimonial_description" name="testimonial_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["testimonial_description"]; ?></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='edittestimonial' />
                                <input type='hidden' name='edittestimonialId' value='<?php echo $row["testimonial_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTotestimonial').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("testimonial");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        // $('#editpropertyName').removeClass("is-invalid");
                                        $('#testimonial_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("testimonial");
                                            slowInternet();
                                        });
                                    } else {
                                        
                                        if($('#testimonial_name').val() == ''){
                                            $('#testimonial_name').addClass("is-invalid");
                                            alert_toast("warning", "Please enter Name!!!");
                                        }
                                        else
                                            $('#testimonial_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("testimonial");
                        slowInternet();
                        alert_toast("error", "No Phase Available Now!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Testimonial Section End
        
        
        
        
        //Aim Objective Section Start
        if($_POST["action"] == "aim_objective"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Meta Keyword</th>
                    <th>Meta Description</th>
                    <th>Heading</th>
                    <th>Short Description</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Added By</th>
                    <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_aims");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["aim_title"]; ?></td>
                                    <td><?php echo $row["aim_meta_keyword"]; ?></td>
                                    <td><?php echo $row["aim_meta_description"]; ?></td>
                                    <td><?php echo $row["aim_heading"]; ?></td>
                                    <td><?php echo $row["aim_short_description"]; ?></td>
                                     <td><?php echo $row["aim_description"]; ?></td>
                                     <td><img src="images/aim/<?php echo $row["aim_image"]; ?>" width="100px" /></td>
                                   
                                    <td><?php
                                            if($row["aim_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["aim_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["aim_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["aim_added_by"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["aim_added_by"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["aim_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["aim_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["aim_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["aim_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["aim_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["aim_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["aim_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["aim_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["aim_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["aim_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["aim_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Heading</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["aim_heading"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/aim/<?php echo $row["aim_image"]; ?>" width="100%" /></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Description</span>
                                                      <p><?php echo $row["aim_description"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["aim_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["aim_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["aim_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["aim_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["aim_id"]; ?>" name="tblName" type="hidden" value="tbl_aims" />
                                                        <input id="deleteId<?php echo $row["aim_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["aim_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["aim_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["aim_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["aim_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["aim_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["aim_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["aim_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["aim_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["aim_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["aim_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["aim_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["aim_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["aim_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["aim_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("aim_objective");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["aim_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["aim_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["aim_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["aim_id"]; ?>').prop('disabled', true);
                                            var action = "editaim";
                                            var aim_id = "<?php echo $row["aim_id"]; ?>";
                                            var dataString = 'action='+ action +'&aim_id='+ aim_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Aim Section End
        
        
        
        
        //Edit Aim Section Start
        if($_POST["action"] == "editaim"){
            $aim_id = $_POST["aim_id"];
            $object->sql = "";
            $object->select("tbl_aims");
            $object->where("`aim_id` = '$aim_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backToaim" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                        
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Heading</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["aim_heading"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/aim/<?php echo $row["aim_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Description</span>
                                  <p><?php echo $row["aim_description"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Aim & Objective</u></b></h3>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="aim_title" name="aim_title" class="form-control" value="<?php echo $row["aim_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="aim_meta_description" name="aim_meta_description" class="form-control" value="<?php echo $row["aim_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="aim_meta_keyword" name="aim_meta_keyword" class="form-control" value="<?php echo $row["aim_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Heading</label>
                                            <input type="text" id="aim_heading" name="aim_heading" class="form-control" value="<?php echo $row["aim_heading"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Header Image</label>
                                            <input type="file" class="form-control" id="aim_image" name="aim_image">
                                            <small>Choose Image</small>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Update Short Description</label>
                                            <textarea class="textarea" id="aim_short_description" name="aim_short_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["aim_short_description"]; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Update Description</label>
                                            <textarea class="textarea" id="aim_description" name="aim_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["aim_description"]; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editaim' />
                                <input type='hidden' name='aim_id' value='<?php echo $row["aim_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backToaim').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("aim_objective");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#aim_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("aim_objective");
                                            slowInternet();
                                        });
                                    } else {
                                    if($('#aim_image').val() == ''){
                                        $('#aim_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#aim_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("aim_objective");
                        slowInternet();
                        alert_toast("error", "No Slider!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Aim Section End
        
    
        
        
       if($_POST["action"] == "about-us"){
            $object->sql = "";
            $object->select("tbl_about");
            $object->where("`about_id` = '1' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
            }
            $aboutInformations = json_decode($row["about_information"]);
            ?>
            <div class="row">
                <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Title</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["about_title"]; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Meta Keyword</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["about_meta_keyword"]; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Meta Description</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["about_meta_description"]; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Heading</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $aboutInformations->heading; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Image</span>
                                <p><img src="images/about/<?php echo $aboutInformations->image; ?>" width="100%" alt="Image" /></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Short Description</span>
                                <p><?php echo htmlspecialchars_decode($aboutInformations->short_description); ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Description</span>
                                <p><?php echo htmlspecialchars_decode($aboutInformations->description); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" id="edit-div">
                    <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                        <div class="card-body mt-0 pt-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-red"><b><u>Update</u></b></h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Title</label>
                                        <input type="text" id="about_title" name="about_title"  class="form-control" value="<?php echo $row["about_title"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Meta Keyword</label>
                                        <input type="text" id="about_meta_keyword" name="about_meta_keyword"  class="form-control" value="<?php echo $row["about_meta_keyword"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Meta Description</label>
                                        <input type="text" id="about_meta_description" name="about_meta_description"  class="form-control" value="<?php echo $row["about_meta_description"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Heading</label>
                                        <input type="text" id="aboutHeading" name="aboutHeading"  class="form-control" value="<?php echo $aboutInformations->heading; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Image</label>
                                        <input type="file" id="aboutImage" name="aboutImage"  class="form-control">
                                        <small>Choose an image</small>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-12">
                                    <div class="form-group" id="aboutDescriptionDiv">
                                        <label>Update Short Description</label>
                                        <textarea class="textarea" id="aboutshortDescription" name="aboutshortDescription" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo htmlspecialchars_decode($aboutInformations->short_description); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="aboutDescriptionDiv">
                                        <label>Update Description</label>
                                        <textarea class="textarea" id="aboutDescription" name="aboutDescription" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo htmlspecialchars_decode($aboutInformations->description); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <input type='hidden' name='action' value='editAboutUs' />
                            <input type='hidden' name='editAboutUs' value='<?php echo "about-us"; ?>' />
                            <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('form#editForm').submit(function(event) {
                        event.preventDefault();
                        slowInternet();
                        $('#editText').hide();
                        $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                        $('#editButton').prop('disabled', true);
                        var formData = new FormData(this);
                        $.ajax({
                            url: 'include/controller.php',
                            type: 'POST',
                            data: formData,
                            success: function(result) {
                                $('#response_career_msg').remove();
                                if(result == "success"){
                                    $('#editForm')[0].reset();
                                
                                    $('#aboutHeading').removeClass("is-invalid");
                                    $('#loading').fadeOut(500, function() {
                                        $(this).remove();
                                        $('#editText').show();
                                        $('#editButton').prop('disabled', false);
                                        alert_toast("success", "About Us Updated Successfully!!!");
                                        main("about-us");
                                        slowInternet();
                                    });
                                } else {
                                     if($('#aboutHeading').val() == ''){
                                        $('#aboutHeading').addClass("is-invalid");
                                        alert_toast("warning", "Please fill out Heading!!!");
                                    }
                                    else
                                        $('#aboutHeading').removeClass("is-invalid");
                                    if($('#aboutDescription').val() == ''){
                                        $( "#aboutDescriptionDiv" ).effect("shake");
                                        alert_toast("warning", "Please write a short description!!!");
                                    }
                                    $('#loading').fadeOut(500, function() {
                                        $(this).remove();
                                        $('#editText').show();
                                        $('#editButton').prop('disabled', false);
                                        if(result == "empty")
                                            alert_toast("warning", "Please Fill out all required Fields!!!");
                                        else if(result == "error")
                                                alert_toast("error", "Something Went Wrong, Please try again!!!");
                                        else if(result == "nochange")
                                                alert_toast("warning", "No Changes Made!!!");
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
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //About JNFF Section End
        
        
         // Vission Section Start
        if($_POST["action"] == "vision"){
            $object->sql = "";
            $object->select("tbl_vision");
            $object->where("`vision_id` = '1' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
            }
            $visionInformations = json_decode($row["vision_information"]);
            ?>
            <div class="row">
                <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                    <div class="row">
                       <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Title</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["vision_title"]; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Meta Keyword</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["vision_meta_keyword"]; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Meta Description</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $row["vision_meta_description"]; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Heading</span>
                                <p><i class="fas fa-angle-double-right"></i> <?php echo $visionInformations->heading; ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Image</span>
                                <p><img src="images/vision/<?php echo $visionInformations->image; ?>" width="100%" alt="Image" /></p>
                            </div>
                        </div>
                        
                        
                         <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Short Description</span>
                                <p><?php echo htmlspecialchars_decode($visionInformations->short_description); ?></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="callout callout-warning pt-1 pb-1">
                                <span class="text-lg text-red">Description</span>
                                <p><?php echo htmlspecialchars_decode($visionInformations->description); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" id="edit-div">
                    <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                        <div class="card-body mt-0 pt-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-red"><b><u>Update</u></b></h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Title</label>
                                        <input type="text" id="vision_title" name="vision_title"  class="form-control" value="<?php echo $row["vision_title"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Meta Keyword</label>
                                        <input type="text" id="vision_meta_keyword" name="vision_meta_keyword"  class="form-control" value="<?php echo $row["vision_meta_keyword"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Meta Description</label>
                                        <input type="text" id="vision_meta_description" name="vision_meta_description"  class="form-control" value="<?php echo $row["vision_meta_description"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Heading</label>
                                        <input type="text" id="visionHeading" name="visionHeading"  class="form-control" value="<?php echo $visionInformations->heading; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Update Image</label>
                                        <input type="file" id="visionImage" name="visionImage"  class="form-control">
                                        <small>Choose an image</small>
                                    </div>
                                </div>
                                
                                 <div class="col-md-12">
                                    <div class="form-group" id="visionDescriptionDiv">
                                        <label>Update Short Description</label>
                                        <textarea class="textarea" id="visionshortDescription" name="visionshortDescription" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo htmlspecialchars_decode($visionInformations->short_description); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="visionDescriptionDiv">
                                        <label>Update Description</label>
                                        <textarea class="textarea" id="visionDescription" name="visionDescription" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo htmlspecialchars_decode($visionInformations->description); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <input type='hidden' name='action' value='editVision' />
                            <input type='hidden' name='editVision' value='<?php echo "vision"; ?>' />
                            <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#editForm').submit(function(event) {
                        event.preventDefault();
                        slowInternet();
                        $('#editText').hide();
                        $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                        $('#editButton').prop('disabled', true);
                        var formData = new FormData(this);
                        $.ajax({
                            url: 'include/controller.php',
                            type: 'POST',
                            data: formData,
                            success: function(result) {
                                $('#response_career_msg').remove();
                                if(result == "success"){
                                    $('#editForm')[0].reset();
                                    $('#visionHeading').removeClass("is-invalid");
                                    $('#loading').fadeOut(500, function() {
                                        $(this).remove();
                                        $('#editText').show();
                                        $('#editButton').prop('disabled', false);
                                        alert_toast("success", "Vision Updated Successfully!!!");
                                        main("vision");
                                        slowInternet();
                                    });
                                } else {
                                    if($('#visionHeading').val() == ''){
                                        $('#visionHeading').addClass("is-invalid");
                                        alert_toast("warning", "Please fill out Heading!!!");
                                    }
                                    else
                                        $('#visionHeading').removeClass("is-invalid");
                                    if($('#visionDescription').val() == ''){
                                        $( "#visionDescriptionDiv" ).effect("shake");
                                        alert_toast("warning", "Please write a short description!!!");
                                    }
                                    $('#loading').fadeOut(500, function() {
                                        $(this).remove();
                                        $('#editText').show();
                                        $('#editButton').prop('disabled', false);
                                        if(result == "empty")
                                            alert_toast("warning", "Please Fill out all required Fields!!!");
                                        else if(result == "error")
                                                alert_toast("error", "Something Went Wrong, Please try again!!!");
                                        else if(result == "nochange")
                                                alert_toast("warning", "No Changes Made!!!");
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
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Vision Section End
        //About Section End -------------------------------------------------------------------------------------------------------------------
        //Contact enquiry View Section Start
        if($_POST["action"] == "enquiry"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_enquiry");
                        //$object->where("`status` = '$visible'");                      
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["first_name"]; ?><?php echo $row["last_name"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["subject"]; ?></td>
                                    <td><?php echo $row["message"]; ?></td>
                                    <td><?php echo $row["create_date"]; ?></td>
                                    <td>
                                        <!--<button onclick="document.getElementById('viewModal<?php //echo $row["id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>-->
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["name"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Email Id</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["email"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Phone No.</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["phone"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Message</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["message"]; ?>" readonly>
                                                    </div>                                  
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["id"]; ?>" name="tblName" type="hidden" value="tbl_enquiry" />
                                                        <input id="deleteId<?php echo $row["id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["id"]; ?>"></span><span id="deleteTextSection<?php echo $row["id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("enquiry");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                      
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Contact enquiry view Section End
        
        
        
            //Edit Admission Section Start
        if($_POST["action"] == "editadmission"){
            $admission_id = $_POST["admission_id"];
            $object->sql = "";
            $object->select("tbl_admission");
            $object->where("`admission_id` = '$admission_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backToadmission" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                        
                           
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Description</span>
                                  <p><?php echo $row["admission_description"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Admission</u></b></h3>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="admission_title" name="admission_title" class="form-control" value="<?php echo $row["admission__title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="admission_meta_description" name="admission_meta_description" class="form-control" value="<?php echo $row["admission_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="admission_meta_keyword" name="admission_meta_keyword" class="form-control" value="<?php echo $row["admission_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Update Description</label>
                                            <textarea class="textarea" id="admission_description" name="admission_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["admission_description"]; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editadmission' />
                                <input type='hidden' name='admission_id' value='<?php echo $row["admission_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backToadmission').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("admission");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#admission_description').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("admission");
                                            slowInternet();
                                        });
                                    } else {
                                    if($('#admission_description').val() == ''){
                                        $('#admission_description').addClass("is-invalid");
                                        alert_toast("warning", "Please Add  Description!!!");
                                    }
                                    else
                                        $('#admission_description').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("admission");
                        slowInternet();
                        alert_toast("error", "No Slider!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Admission Section End
        
        
        
        
        //Admission Section Start
        if($_POST["action"] == "admission"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Meta Keyword</th>
                    <th>Meta Description</th>
                    <!--<th>Heading</th>-->
                    <th>Description</th>
                    <!--<th>Image</th>-->
                    <th>Added By</th>
                    <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_admission");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["admission_title"]; ?></td>
                                    <td><?php echo $row["admission_meta_keyword"]; ?></td>
                                    <td><?php echo $row["admission_meta_description"]; ?></td>
                                    <!--<td><?php //echo $row["admission_heading"]; ?></td>-->
                                     <td><?php echo $row["admission_description"]; ?></td>
                                    <!-- <td><img src="images/sport_activity/<?php //echo $row["sport_activity_image"]; ?>" width="100px" /></td>-->
                                   
                                    <td><?php
                                            if($row["admission_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["admission_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["admission_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["admission_added_by"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["admission_added_by"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["admission_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["admission_id"]; ?>" class="btn btn-warning" title="Edit Admission"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["admission_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["admission_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["admission_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["admission_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["admission_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["admission_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["admission_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["admission_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["admission_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                
                                               
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Description</span>
                                                      <p><?php echo $row["admission_description"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["admission_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["admission_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["admission_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["admission_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["admission_id"]; ?>" name="tblName" type="hidden" value="tbl_admission" />
                                                        <input id="deleteId<?php echo $row["admission_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["admission_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["admission_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["admission_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["admission_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["admission_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["admission_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["admission_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["admission_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["admission_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["admission_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["admission_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["admission_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["admission_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["admission_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("admission");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["admission_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["admission_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["admission_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["admission_id"]; ?>').prop('disabled', true);
                                            var action = "editadmission;
                                            var admission_id = "<?php echo $row["admission_id"]; ?>";
                                            var dataString = 'action='+ action +'&admission_id='+ admission_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //ADMISSION Activity Section End
        
        
        
        
        //Principal Desk Section Start
        if($_POST["action"] == "principal_desk"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Meta Keyword</th>
                    <th>Meta Description</th>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Added By</th>
                    <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_principal_desk");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["principal_title"]; ?></td>
                                    <td><?php echo $row["principal_meta_keyword"]; ?></td>
                                    <td><?php echo $row["principal_meta_description"]; ?></td>
                                    <td><?php echo $row["principal_heading"]; ?></td>
                                     <td><?php echo $row["principal_description"]; ?></td>
                                     <td><img src="images/message/<?php echo $row["principal_image"]; ?>" width="100px" /></td>
                                   
                                    <td><?php
                                            if($row["principal_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["principal_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["principal_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["principal_added_by"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["principal_added_by"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["principal_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["principal_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["principal_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["principal_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["principal_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["principal_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["principal_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["principal_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["principal_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["principal_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["principal_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Heading</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["principal_heading"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/message/<?php echo $row["principal_image"]; ?>" width="100%" /></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Description</span>
                                                      <p><?php echo $row["principal_description"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["principal_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["principal_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["principal_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["principal_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["principal_id"]; ?>" name="tblName" type="hidden" value="tbl_principal_desk" />
                                                        <input id="deleteId<?php echo $row["principal_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["principal_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["principal_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["principal_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["principal_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["principal_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["principal_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["principal_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["principal_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["principal_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["principal_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["principal_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["principal_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["principal_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["principal_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("principal_desk");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["principal_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["principal_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["principal_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["principal_id"]; ?>').prop('disabled', true);
                                            var action = "editprincipal";
                                            var principal_id = "<?php echo $row["principal_id"]; ?>";
                                            var dataString = 'action='+ action +'&principal_id='+ principal_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Principal Section End
        
        
        //Edit Principal Section Start
        if($_POST["action"] == "editprincipal"){
            $principal_id = $_POST["principal_id"];
            $object->sql = "";
            $object->select("tbl_principal_desk");
            $object->where("`principal_id` = '$principal_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backToprincipal" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                        
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Heading</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["principal_heading"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/message/<?php echo $row["principal_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Description</span>
                                  <p><?php echo $row["principal_description"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Principal desk</u></b></h3>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="principal_title" name="principal_title" class="form-control" value="<?php echo $row["principal_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="principal_meta_description" name="principal_meta_description" class="form-control" value="<?php echo $row["principal_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="principal_meta_keyword" name="principal_meta_keyword" class="form-control" value="<?php echo $row["principal_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Heading</label>
                                            <input type="text" id="principal_heading" name="principal_heading" class="form-control" value="<?php echo $row["principal_heading"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Header Image</label>
                                            <input type="file" class="form-control" id="principal_image" name="principal_image">
                                            <small>Choose Image</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Update Description</label>
                                            <textarea class="textarea" id="principal_description" name="principal_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["principal_description"]; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editprincipal' />
                                <input type='hidden' name='principal_id' value='<?php echo $row["principal_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backToprincipal').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("principal_desk");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#principal_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("principal_desk");
                                            slowInternet();
                                        });
                                    } else {
                                    if($('#principal_image').val() == ''){
                                        $('#principal_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#principal_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("principal_desk");
                        slowInternet();
                        alert_toast("error", "No Slider!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Principal Section End
        
        
        
        
        //Uniform Section Start
        if($_POST["action"] == "uniform"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Meta Keyword</th>
                    <th>Meta Description</th>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>Added By</th>
                    <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_uniform");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["uniform_title"]; ?></td>
                                    <td><?php echo $row["uniform_meta_keyword"]; ?></td>
                                    <td><?php echo $row["uniform_meta_description"]; ?></td>
                                    <td><?php echo $row["uniform_heading"]; ?></td>
                                     <td><?php echo $row["uniform_description"]; ?></td>
                                   
                                    <td><?php
                                            if($row["uniform_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["uniform_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["uniform_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["uniform_added_by"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["uniform_added_by"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["uniform_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["uniform_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["uniform_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["uniform_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["uniform_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["uniform_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["uniform_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["uniform_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["uniform_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["uniform_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["uniform_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Heading</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["uniform_heading"]; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Description</span>
                                                      <p><?php echo $row["uniform_description"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["uniform_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["uniform_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["uniform_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["uniform_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["uniform_id"]; ?>" name="tblName" type="hidden" value="tbl_uniform" />
                                                        <input id="deleteId<?php echo $row["uniform_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["uniform_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["uniform_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["uniform_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["uniform_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["uniform_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["uniform_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["uniform_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["uniform_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["uniform_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["uniform_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["uniform_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["uniform_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["uniform_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["uniform_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("uniform");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["uniform_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["uniform_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["uniform_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["uniform_id"]; ?>').prop('disabled', true);
                                            var action = "edituniform;
                                            var uniform_id = "<?php echo $row["uniform_id"]; ?>";
                                            var dataString = 'action='+ action +'&uniform_id='+ uniform_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Uniform Section End
        
        
        
            //Edit Uniform Section Start
        if($_POST["action"] == "edituniform"){
            $uniform_id = $_POST["uniform_id"];
            $object->sql = "";
            $object->select("tbl_uniform");
            $object->where("`uniform_id` = '$uniform_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTouniform" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                        
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Heading</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["uniform_heading"]; ?></p>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Description</span>
                                  <p><?php echo $row["uniform_description"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Uniform</u></b></h3>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="uniform_title" name="uniform_title" class="form-control" value="<?php echo $row["uniform_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="uniform_meta_description" name="uniform_meta_description" class="form-control" value="<?php echo $row["uniform_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="uniform_meta_keyword" name="uniform_meta_keyword" class="form-control" value="<?php echo $row["uniform_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Heading</label>
                                            <input type="text" id="uniform_heading" name="uniform_heading" class="form-control" value="<?php echo $row["uniform_heading"]; ?>">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Update Description</label>
                                            <textarea class="textarea" id="uniform_description" name="uniform_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["uniform_description"]; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <br/>
                                <input type='hidden' name='action' value='edituniform' />
                                <input type='hidden' name='uniform_id' value='<?php echo $row["uniform_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTouniform').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("uniform");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#uniform_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("uniform");
                                            slowInternet();
                                        });
                                    } else {
                                    if($('#uniform_image').val() == ''){
                                        $('#uniform_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#uniform_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("uniform");
                        slowInternet();
                        alert_toast("error", "No Slider!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Uniform Section End
        
        
        
        
        //Academic Section Start
        if($_POST["action"] == "academic"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Meta Keyword</th>
                    <th>Meta Description</th>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Added By</th>
                    <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_academic");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["academic_title"]; ?></td>
                                    <td><?php echo $row["academic_meta_keyword"]; ?></td>
                                    <td><?php echo $row["academic_meta_description"]; ?></td>
                                    <td><?php echo $row["academic_heading"]; ?></td>
                                     <td><?php echo $row["academic_description"]; ?></td>
                                     <td><img src="images/academic/<?php echo $row["academic_image"]; ?>" width="100px" /></td>
                                   
                                    <td><?php
                                            if($row["academic_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["academic_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["academic_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["academic_added_by"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["academic_added_by"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["academic_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["academic_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["academic_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["academic_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["academic_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["academic_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["academic_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["academic_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["academic_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["academic_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["academic_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Heading</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["academic_heading"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/academic/<?php echo $row["academic_image"]; ?>" width="100%" /></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Description</span>
                                                      <p><?php echo $row["academic_description"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["academic_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["academic_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["academic_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["academic_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["academic_id"]; ?>" name="tblName" type="hidden" value="tbl_academic" />
                                                        <input id="deleteId<?php echo $row["academic_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["academic_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["academic_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["academic_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["academic_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["academic_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["academic_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["academic_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["academic_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["academic_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["academic_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["academic_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["academic_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["academic_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["academic_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("academic");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["academic_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["academic_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["academic_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["academic_id"]; ?>').prop('disabled', true);
                                            var action = "editacademic";
                                            var academic_id = "<?php echo $row["academic_id"]; ?>";
                                            var dataString = 'action='+ action +'&academic_id='+ academic_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Academic Section End
        
        
        
        
        //Edit Academic Section Start
        if($_POST["action"] == "editacademic"){
            $academic_id = $_POST["academic_id"];
            $object->sql = "";
            $object->select("tbl_academic");
            $object->where("`academic_id` = '$academic_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backToacademic" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                        
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Heading</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["academic_heading"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/academic/<?php echo $row["academic_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Description</span>
                                  <p><?php echo $row["academic_description"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Academic</u></b></h3>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="academic_title" name="academic_title" class="form-control" value="<?php echo $row["academic_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="academic_meta_description" name="academic_meta_description" class="form-control" value="<?php echo $row["academic_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="academic_meta_keyword" name="academic_meta_keyword" class="form-control" value="<?php echo $row["academic_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Heading</label>
                                            <input type="text" id="academic_heading" name="academic_heading" class="form-control" value="<?php echo $row["academic_heading"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Header Image</label>
                                            <input type="file" class="form-control" id="academic_image" name="academic_image">
                                            <small>Choose Image</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Update Description</label>
                                            <textarea class="textarea" id="academic_description" name="academic_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["academic_description"]; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editacademic' />
                                <input type='hidden' name='academic_id' value='<?php echo $row["academic_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backToacademic').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("academic");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#academic_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("academic");
                                            slowInternet();
                                        });
                                    } else {
                                    if($('#academic_image').val() == ''){
                                        $('#academic_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#academic_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("academic");
                        slowInternet();
                        alert_toast("error", "No Slider!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Academic Section End
        
        
        
        
        //Sports activity Section Start
        if($_POST["action"] == "sports_activities"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Meta Keyword</th>
                    <th>Meta Description</th>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Added By</th>
                    <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_sports_activities");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["sport_activity_title"]; ?></td>
                                    <td><?php echo $row["sport_activity_meta_keyword"]; ?></td>
                                    <td><?php echo $row["sport_activity_meta_description"]; ?></td>
                                    <td><?php echo $row["sport_activity_heading"]; ?></td>
                                     <td><?php echo $row["sport_activity_description"]; ?></td>
                                     <td><img src="images/sport_activity/<?php echo $row["sport_activity_image"]; ?>" width="100px" /></td>
                                   
                                    <td><?php
                                            if($row["sport_activity_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["sport_activity_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["sport_activity_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["sport_activity_added_by"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["sport_activity_added_by"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["sport_activity_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["sport_activity_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["sport_activity_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["sport_activity_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["sport_activity_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["sport_activity_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["sport_activity_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["sport_activity_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["sport_activity_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["sport_activity_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["sport_activity_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Heading</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["sport_activity_heading"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/sport_activity/<?php echo $row["sport_activity_image"]; ?>" width="100%" /></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Description</span>
                                                      <p><?php echo $row["sport_activity_description"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["sport_activity_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["sport_activity_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["sport_activity_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["sport_activity_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["sport_activity_id"]; ?>" name="tblName" type="hidden" value="tbl_sports_activities" />
                                                        <input id="deleteId<?php echo $row["sport_activity_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["sport_activity_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["sport_activity_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["sport_activity_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["sport_activity_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["sport_activity_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["sport_activity_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["sport_activity_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["sport_activity_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["sport_activity_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["sport_activity_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["sport_activity_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["sport_activity_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["sport_activity_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["sport_activity_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("sports_activities");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["sport_activity_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["sport_activity_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["sport_activity_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["sport_activity_id"]; ?>').prop('disabled', true);
                                            var action = "editsportactivity";
                                            var sport_activity_id = "<?php echo $row["sport_activity_id"]; ?>";
                                            var dataString = 'action='+ action +'&sport_activity_id='+ sport_activity_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Sports Activity Section End
        
        
        
        
        //Edit Secretary Section Start
        if($_POST["action"] == "editsportactivity"){
            $sport_activity_id = $_POST["sport_activity_id"];
            $object->sql = "";
            $object->select("tbl_sports_activities");
            $object->where("`sport_activity_id` = '$sport_activity_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTosportactivity" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                        
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Heading</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["sport_activity_heading"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/sport_activity/<?php echo $row["sport_activity_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Description</span>
                                  <p><?php echo $row["sport_activity_description"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Sport Activity</u></b></h3>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="sport_activity_title" name="sport_activity_title" class="form-control" value="<?php echo $row["sport_activity_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="sport_activity_meta_description" name="sport_activity_meta_description" class="form-control" value="<?php echo $row["sport_activity_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="sport_activity_meta_keyword" name="sport_activity_meta_keyword" class="form-control" value="<?php echo $row["sport_activity_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Heading</label>
                                            <input type="text" id="sport_activity_heading" name="sport_activity_heading" class="form-control" value="<?php echo $row["sport_activity_heading"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Header Image</label>
                                            <input type="file" class="form-control" id="sport_activity_image" name="sport_activity_image">
                                            <small>Choose Image</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Update Description</label>
                                            <textarea class="textarea" id="sport_activity_description" name="sport_activity_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["sport_activity_description"]; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editsportactivity' />
                                <input type='hidden' name='sport_activity_id' value='<?php echo $row["sport_activity_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTosportactivity').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("sports_activities");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#sport_activity_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("sports_activities");
                                            slowInternet();
                                        });
                                    } else {
                                    if($('#sport_activity_image').val() == ''){
                                        $('#sport_activity_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#sport_activity_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("sports_activities");
                        slowInternet();
                        alert_toast("error", "No Slider!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Secretary Section End
        
        
        
        
        
        
        //Secretary Desk Section Start
        if($_POST["action"] == "secretary_desk"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Meta Keyword</th>
                    <th>Meta Description</th>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Added By</th>
                    <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_secretary_desk");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["secretary_title"]; ?></td>
                                    <td><?php echo $row["secretary_meta_keyword"]; ?></td>
                                    <td><?php echo $row["secretary_meta_description"]; ?></td>
                                    <td><?php echo $row["secretary_heading"]; ?></td>
                                     <td><?php echo $row["secretary_description"]; ?></td>
                                     <td><img src="images/message/<?php echo $row["secretary_image"]; ?>" width="100px" /></td>
                                   
                                    <td><?php
                                            if($row["secretary_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["secretary_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["secretary_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["secretary_added_by"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["secretary_added_by"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["secretary_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["secretary_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["secretary_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["secretary_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["secretary_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["secretary_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["secretary_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["secretary_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["secretary_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["secretary_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["secretary_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Heading</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["secretary_heading"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/message/<?php echo $row["secretary_image"]; ?>" width="100%" /></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Description</span>
                                                      <p><?php echo $row["secretary_description"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["secretary_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["secretary_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["secretary_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["secretary_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["secretary_id"]; ?>" name="tblName" type="hidden" value="tbl_secretary_desk" />
                                                        <input id="deleteId<?php echo $row["secretary_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["secretary_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["secretary_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["secretary_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["secretary_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["secretary_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["secretary_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["secretary_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["secretary_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["secretary_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["secretary_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["secretary_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["secretary_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["secretary_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["secretary_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("secretary_desk");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["secretary_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["secretary_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["secretary_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["secretary_id"]; ?>').prop('disabled', true);
                                            var action = "editsecretary";
                                            var secretary_id = "<?php echo $row["secretary_id"]; ?>";
                                            var dataString = 'action='+ action +'&secretary_id='+ secretary_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Secretary Section End
        
        //Edit Secretary Section Start
        if($_POST["action"] == "editsecretary"){
            $secretary_id = $_POST["secretary_id"];
            $object->sql = "";
            $object->select("tbl_secretary_desk");
            $object->where("`secretary_id` = '$secretary_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTosecretary" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                        
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Heading</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["secretary_heading"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/message/<?php echo $row["secretary_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Description</span>
                                  <p><?php echo $row["secretary_description"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Security desk</u></b></h3>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="secretary_title" name="secretary_title" class="form-control" value="<?php echo $row["secretary_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="secretary_meta_description" name="secretary_meta_description" class="form-control" value="<?php echo $row["secretary_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="secretary_meta_keyword" name="secretary_meta_keyword" class="form-control" value="<?php echo $row["secretary_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Heading</label>
                                            <input type="text" id="secretary_heading" name="secretary_heading" class="form-control" value="<?php echo $row["secretary_heading"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Header Image</label>
                                            <input type="file" class="form-control" id="secretary_image" name="secretary_image">
                                            <small>Choose Image</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Update Description</label>
                                            <textarea class="textarea" id="secretary_description" name="secretary_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["secretary_description"]; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editsecretary' />
                                <input type='hidden' name='secretary_id' value='<?php echo $row["secretary_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTosecretary').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("secretary_desk");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#secretary_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("secretary_desk");
                                            slowInternet();
                                        });
                                    } else {
                                    if($('#slider_image').val() == ''){
                                        $('#slider_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#slider_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("slider");
                        slowInternet();
                        alert_toast("error", "No Slider!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Secretary Section End
        
        
        
        //Slider Section Start
        if($_POST["action"] == "slider"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No11.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_slider");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["slider_name"]; ?></td>
                                    <td><img src="images/slider/<?php echo $row["slider_image"]; ?>" width="100px" /></td>
                                    <td><?php echo $row["slider_description"]; ?></td>
                                    <td><?php
                                            if($row["slider_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["slider_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["slider_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["slider_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["slider_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["slider_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["slider_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["slider_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["slider_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["slider_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["slider_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["slider_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["slider_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["slider_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["slider_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["slider_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Heading</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["slider_name"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/slider/<?php echo $row["slider_image"]; ?>" width="100%" /></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Description</span>
                                                      <p><?php echo $row["slider_description"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["slider_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["slider_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["slider_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["slider_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["slider_id"]; ?>" name="tblName" type="hidden" value="tbl_slider" />
                                                        <input id="deleteId<?php echo $row["slider_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["slider_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["slider_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["slider_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["slider_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["slider_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["slider_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["slider_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["slider_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["slider_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["slider_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["slider_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["slider_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["slider_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["slider_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("slider");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["slider_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["slider_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["slider_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["slider_id"]; ?>').prop('disabled', true);
                                            var action = "editslider";
                                            var slider_id = "<?php echo $row["slider_id"]; ?>";
                                            var dataString = 'action='+ action +'&slider_id='+ slider_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Slider Section End
        //Edit Slider Section Start
        if($_POST["action"] == "editslider"){
            $slider_id = $_POST["slider_id"];
            $object->sql = "";
            $object->select("tbl_slider");
            $object->where("`slider_id` = '$slider_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backToslider" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Heading</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["slider_name"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/slider/<?php echo $row["slider_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Description</span>
                                  <p><?php echo $row["slider_description"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Slider</u></b></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Heading</label>
                                            <input type="text" id="slider_name" name="slider_name" class="form-control" value="<?php echo $row["slider_name"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Header Image</label>
                                            <input type="file" class="form-control" id="slider_image" name="slider_image">
                                            <small>Choose Image</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Update Description</label>
                                            <textarea class="textarea" id="slider_description" name="slider_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["slider_description"]; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editslider' />
                                <input type='hidden' name='slider_id' value='<?php echo $row["slider_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backToslider').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("slider");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#slider_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("slider");
                                            slowInternet();
                                        });
                                    } else {
                                    if($('#slider_image').val() == ''){
                                        $('#slider_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#slider_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("slider");
                        slowInternet();
                        alert_toast("error", "No Slider!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Slider Section End

 //Exam Section Start
        if($_POST["action"] == "exam"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Link</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_exam");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php if($row["exam_class"]=='Nur'){ echo $row["exam_class"];}
                                            elseif($row["exam_class"]=='LKG'){ echo $row["exam_class"];}
                                            elseif($row["exam_class"]=='UKG'){ echo $row["exam_class"];}
                                            else{ echo "Std". $row["exam_class"]; }   ?>
                                    </td>
                                    <td><?php
                                    //   $conn = mysqli_connect('localhost', 'nspsjadugora_db', 'TdUE8FLwiC','nspsjadugora_db');
                                        $subjec_id=$row['exam_subj']; 
                                      $sqlq= "SELECT * FROM tbl_subject where `subj_id`='$subjec_id'";
                                        $resultq = mysqli_query($conn, $sqlq);
                                        if (mysqli_num_rows($resultq) > 0) {
                                          while($rowq = mysqli_fetch_assoc($resultq)) {
                                            echo $rowq['subj_name'];
                                          }
                                        } else {
                                          echo "No data";
                                        }
                                                ?></td>
                                    <td><?php echo $row["exam_link"]; ?></td>
                                    <td><?php echo (empty($row["exam_link_starttime"])?'No Time set':date('d-m-Y h:i:sa',strtotime($row["exam_link_starttime"]))); ?></td>
                                    <td><?php echo (empty($row["exam_link_endtime"])?'No Time set':date('d-m-Y h:i:sa',strtotime($row["exam_link_endtime"])));?></td>
                                    <td><?php
                                            if($row["exam_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["exam_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["exam_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["exam_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["exam_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["exam_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["exam_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["exam_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["exam_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["exam_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["exam_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["exam_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["exam_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["exam_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["exam_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["exam_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Class</span>
                                                      <p><?php 
                                                        if($row["exam_class"]=='Nur'){ echo $row["exam_class"];}
                                                        elseif($row["exam_class"]=='LKG'){ echo $row["exam_class"];}
                                                        elseif($row["exam_class"]=='UKG'){ echo $row["exam_class"];}
                                                        else{ echo "Std". $row["exam_class"]; }                                                 
                                                      ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Link</span>
                                                      <p><?php echo $row["exam_link"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Exam Start Time</span>
                                                      <p><?php echo date('Y-m-d h:i:sa', strtotime($row['exam_link_starttime']));?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Exam End Time</span>
                                                       <p><?php echo date('Y-m-d h:i:sa', strtotime($row['exam_link_endtime']));?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["exam_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["exam_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["exam_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["exam_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["exam_id"]; ?>" name="tblName" type="hidden" value="tbl_exam" />
                                                        <input id="deleteId<?php echo $row["exam_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["exam_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["exam_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["exam_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["exam_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["exam_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["exam_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["exam_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["exam_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["exam_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["exam_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["exam_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["exam_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["exam_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["exam_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("exam");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["exam_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["exam_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["exam_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["exam_id"]; ?>').prop('disabled', true);
                                            var action = "editexam";
                                            var exam_id = "<?php echo $row["exam_id"]; ?>";
                                            var dataString = 'action='+ action +'&exam_id='+ exam_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Exam Section End
          //Edit Exam Section Start
        if($_POST["action"] == "editexam"){
            
            // print_r($_POST);exit();
            $exam_id = $_POST["exam_id"];
            $object->sql = "";
            $object->select("tbl_exam");
            $object->where("`exam_id` = '$exam_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backToslider" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Class</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["exam_class"]; ?></p>
                                </div>
                            </div>
                             <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Link</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["exam_link"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Exam Start time</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo Date('Y-m-d h:i:sa',strtotime($row['exam_link_starttime'])); ?> </p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Exam End time</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo Date('Y-m-d h:i:sa',strtotime($row['exam_link_endtime']));?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Class And Exam Link</u></b></h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Exam Class</label>
                                            <select class="form-control" id="exam_class" name="exam_class" class="form-control">
                                                <option selected="" disabled="">Select Class</option>
                                                <option value="Nur" <?php echo ($row["exam_class"]=='Nur'?'selected':'');?>>Nur</option>
                                                <option value="LKG" <?php echo ($row["exam_class"]=='LKG'?'selected':'');?>>LKG</option>
                                                <option value="UKG" <?php echo ($row["exam_class"]=='UKG'?'selected':'');?>>UKG</option>
                                                <option value="1" <?php echo ($row["exam_class"]=='1'?'selected':'');?>>Std 1</option>
                                                <option value="2" <?php echo ($row["exam_class"]=='2'?'selected':'');?>>Std 2</option>
                                                <option value="3" <?php echo ($row["exam_class"]=='3'?'selected':'');?>>Std 3</option>
                                                <option value="4" <?php echo ($row["exam_class"]=='4'?'selected':'');?>>Std 4</option>
                                                <option value="5" <?php echo ($row["exam_class"]=='5'?'selected':'');?>>Std 5</option>
                                                <option value="6" <?php echo ($row["exam_class"]=='6'?'selected':'');?>>Std 6</option>
                                                <option value="7" <?php echo ($row["exam_class"]=='7'?'selected':'');?>>Std 7</option>
                                                <option value="8" <?php echo ($row["exam_class"]=='8'?'selected':'');?>>Std 8</option>
                                                <option value="9" <?php echo ($row["exam_class"]=='9'?'selected':'');?>>Std 9</option>
                                                <option value="10" <?php echo ($row["exam_class"]=='10'?'selected':'');?>>Std 10</option>
                                            </select>
                                        </div>
                                    </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Exam Subject</label>
                                           <select class="form-control" id="exam_subj" name="exam_subj">
                                                <option selected="" disabled="">Select Subject</option>
                                                <?php
                                                     $object->sql = "";
                                                    $object->select("tbl_subject");
                                                    $object->where("`status` = '$visible'");
                                                    $resultsubj = $object->get();
                                                    if($resultsubj->num_rows > 0){
                                                        while($rowsubj = $object->get_row()){
                                                ?>
                                                <option value="<?php echo $rowsubj["subj_id"]; ?>" <?php echo ($rowsubj["subj_id"]==$row["exam_subj"]?'Selected':'')?>><?php echo $rowsubj["subj_name"];?></option>
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
                                </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Exam Link</label>
                                            <input type="url" id="exam_link" name="exam_link" class="form-control" value="<?php echo $row["exam_link"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Exam Link Start Time</label>
                                        <input type="datetime-local" id="exam_link_starttime" name="exam_link_starttime" class="form-control" value="<?php echo Date('Y-m-d\TH:i',strtotime($row['exam_link_starttime'])); ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Exam Link End Time</label>
                                        <input type="datetime-local" id="exam_link_endtime" name="exam_link_endtime" class="form-control" value="<?php echo Date('Y-m-d\TH:i',strtotime($row['exam_link_endtime'])); ?>" >
                                    </div>
                                </div>

                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editexam' />
                                <input type='hidden' name='exam_id' value='<?php echo $row["exam_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backToslider').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("exam");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                     
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("exam");
                                            slowInternet();
                                        });
                                    } else {
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("exam");
                        slowInternet();
                        alert_toast("error", "No Exam Data!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Exam Section End
        
//Student Section Start
        if($_POST["action"] == "student"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>User ID</th>
                        <th>Password</th>
                        <th>Login</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // $conn = mysqli_connect('localhost', 'nspsjadugora_db', 'TdUE8FLwiC','nspsjadugora_db');
                        $per_page_record = 150;  // Number of entries to show in a page.   
                        // Look for a GET variable page if not found default is 1.        
                        if (isset($_GET["page"])) {    
                            $page  = $_GET["page"];    
                        }    
                        else {
                          $page=1;    
                        }    
                        $start_from = ($page-1) * $per_page_record;     
                        $query = "SELECT * FROM tbl_student LIMIT $start_from, $per_page_record";     
                        $rs_result = mysqli_query($conn, $query);    
                        // $object->sql = "";
                        // $object->select("tbl_student");
                        // $result = $object->get();
                        if(mysqli_num_rows($rs_result) > 0){
                            $sno = 0;
                            while($row = mysqli_fetch_assoc($rs_result)){
                                $sno++;
                        ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["stud_name"]; ?></td>
                                    <td><?php echo $row["stud_class"]; ?></td>
                                    <td><?php echo $row["stud_userid"]; ?></td>
                                    <td><?php echo $row["stud_pass"]; ?></td>
                                    <td><?php echo $row["log_in_count"]; ?></td>
                                   <!--  <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["exam_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["exam_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["exam_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td> -->
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <!-- <div id="whoAddThis<?php echo $row["exam_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["exam_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["exam_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["exam_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["exam_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                             <!--    <div id="viewModal<?php echo $row["exam_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["exam_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["exam_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Class</span>
                                                      <p><?php echo $row["exam_class"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Link</span>
                                                      <p><?php echo $row["exam_link"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                             <!--    <div id="deleteModal<?php echo $row["exam_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["exam_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["exam_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["exam_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["exam_id"]; ?>" name="tblName" type="hidden" value="tbl_exam" />
                                                        <input id="deleteId<?php echo $row["exam_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["exam_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["exam_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["exam_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["exam_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["exam_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["exam_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["exam_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["exam_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["exam_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["exam_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["exam_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["exam_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["exam_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["exam_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("exam");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["exam_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["exam_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["exam_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["exam_id"]; ?>').prop('disabled', true);
                                            var action = "editexam";
                                            var exam_id = "<?php echo $row["exam_id"]; ?>";
                                            var dataString = 'action='+ action +'&exam_id='+ exam_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table> 
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $('#example1').dataTable({
                    "lengthMenu": [[100, 250, 500, 750, 1000, 2500, 5000, 7500, 10000, -1], [100, 250, 500, 750, 1000, 2500, 5000, 7500, 10000, "All"]],
                    "language": {
                        "paginate": {
                            "previous": "<i class='fas fa-angle-double-left'></i>",
                            "next": "<i class='fas fa-angle-double-right'></i>"
                        }
                    }
                });

                    // $("#example1").DataTable();
                    // $('#example2').DataTable({
                    //     "paging": true,
                    //     "lengthChange": false,
                    //     "searching": false,
                    //     "ordering": true,
                    //     "info": true,
                    //     "autoWidth": false,
                    // });
                });
            </script>
            <?php
        }
        //Student Section End




        //Library Section Start
        if($_POST["action"] == "library"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keyword</th>
                        <th>Description</th>

                        <th>Image</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_library");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;                              ;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["library_title"] ?></td>     
                                    <td><?php echo $row["library_meta_description"] ?></td>     
                                    <td><?php echo $row["library_meta_keyword"] ?></td> 
                                    <td><?php echo $row["library_description"] ?></td>  
                                    <td><img src="images/library/<?php echo $row["library_image"]; ?>" width="100px" /></td>                                 
                                     <td><?php
                                            if($row["library_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["library_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["library_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["library_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["library_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>                                
                                   <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["library_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["library_id"]; ?>" class="btn btn-warning" title="Edit Library"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["library_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Library"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["library_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["library_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["library_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["library_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["library_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["library_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["library_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["library_title"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["library_meta_description"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["library_meta_keyword"]; ?></p>
                                                    </div>
                                                </div> 
                                                
                                                
                                                
                                                 <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Description</span>
                                                      <p><?php echo $row["library_description"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/library/<?php echo $row["library_image"]; ?>" width="50%" /></p>
                                                    </div>
                                                </div>                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["library_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["library_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["library_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["library_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["library_id"]; ?>" name="tblName" type="hidden" value="tbl_library" />
                                                        <input id="deleteId<?php echo $row["library_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["library_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["library_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["library_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["library_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["library_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["library_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["library_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["library_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["library_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["library_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["library_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["library_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["library_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["library_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Library Deleted Successfully!!!");
                                                            main("library");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["library_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["library_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["library_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["library_id"]; ?>').prop('disabled', true);
                                            var action = "editLibrary";
                                            var library_id = "<?php echo $row["library_id"]; ?>";
                                            var dataString = 'action='+ action +'&library_id='+ library_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Library Section End
        
        
        
        
        
        //Edit Library Section Start
        if($_POST["action"] == "editLibrary"){
            $library_id = $_POST["library_id"];
            $object->sql = "";
            $object->select("tbl_library");
            $object->where("`library_id` = '$library_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTolibrary" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["library_title"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["library_meta_description"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["library_meta_keyword"]; ?></p>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Header Image</span>
                                  <p><img src="images/library/<?php echo $row["library_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>  
                            
                              <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Description</span>
                                  <p><?php echo $row["library_description"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Library</u></b></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="library_title" name="library_title" class="form-control" value="<?php echo $row["library_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="library_meta_description" name="library_meta_description" class="form-control" value="<?php echo $row["library_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="library_meta_keyword" name="library_meta_keyword" class="form-control" value="<?php echo $row["library_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Header Image</label>
                                            <input type="file" class="form-control" id="library_image" name="library_image">
                                            <small>Choose Image</small>
                                        </div>
                                 </div> 
                                 
                                  <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Update Description</label>
                                            <textarea class="textarea" id="library_description" name="library_description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["library_description"]; ?></textarea>
                                        </div>
                                    </div>

                                 
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editLibrary' />
                                <input type='hidden' name='library_id' value='<?php echo $row["library_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTolibrary').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("library");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#library_image').removeClass("is-invalid");                              
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("library");
                                            slowInternet();
                                        });
                                    } else {
                                       if($('#library_image').val() == ''){
                                        $('#library_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#library_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("library");
                        slowInternet();
                        alert_toast("error!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Library Section End
        
        
        
        
        
        //Laboratory Section Start
        if($_POST["action"] == "laboratory"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keyword</th>
                        <th>Image</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_laboratory");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;                              ;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["laboratory_title"] ?></td>     
                                    <td><?php echo $row["laboratory_meta_description"] ?></td>     
                                    <td><?php echo $row["laboratory_meta_keyword"] ?></td>                        
                                    <td><img src="images/laboratory/<?php echo $row["laboratory_image"]; ?>" width="100px" /></td>                                 
                                     <td><?php
                                            if($row["laboratory_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["laboratory_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["laboratory_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["laboratory_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["laboratory_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>                                
                                   <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["laboratory_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["laboratory_id"]; ?>" class="btn btn-warning" title="Edit Laboratory"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["laboratory_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Laboratory"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["laboratory_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["laboratory_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["laboratory_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["laboratory_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["laboratory_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["laboratory_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["laboratory_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["laboratory_title"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["laboratory_meta_description"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["laboratory_meta_keyword"]; ?></p>
                                                    </div>
                                                </div>                                              
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/laboratory/<?php echo $row["laboratory_image"]; ?>" width="50%" /></p>
                                                    </div>
                                                </div>                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["laboratory_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["laboratory_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["laboratory_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["laboratory_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["laboratory_id"]; ?>" name="tblName" type="hidden" value="tbl_laboratory" />
                                                        <input id="deleteId<?php echo $row["laboratory_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["laboratory_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["laboratory_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["laboratory_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["laboratory_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["laboratory_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["laboratory_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["laboratory_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["laboratory_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["laboratory_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["laboratory_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["laboratory_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["laboratory_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["laboratory_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["laboratory_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Laboratory Deleted Successfully!!!");
                                                            main("laboratory");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["laboratory_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["laboratory_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["laboratory_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["laboratory_id"]; ?>').prop('disabled', true);
                                            var action = "editLaboratory";
                                            var laboratory_id = "<?php echo $row["laboratory_id"]; ?>";
                                            var dataString = 'action='+ action +'&laboratory_id='+ laboratory_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Laboratory Section End
        
        
        //Edit Laboratory Section Start
        if($_POST["action"] == "editLaboratory"){
            $laboratory_id = $_POST["laboratory_id"];
            $object->sql = "";
            $object->select("tbl_laboratory");
            $object->where("`laboratory_id` = '$laboratory_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTolabraotary" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["laboratory_title"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["laboratory_meta_description"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["laboratory_meta_keyword"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Header Image</span>
                                  <p><img src="images/laboratory/<?php echo $row["laboratory_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Laboratory</u></b></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="laboratory_title" name="laboratory_title" class="form-control" value="<?php echo $row["laboratory_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="laboratory_meta_description" name="laboratory_meta_description" class="form-control" value="<?php echo $row["laboratory_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="laboratory_meta_keyword" name="laboratory_meta_keyword" class="form-control" value="<?php echo $row["laboratory_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Header Image</label>
                                            <input type="file" class="form-control" id="laboratory_image" name="laboratory_image">
                                            <small>Choose Image</small>
                                        </div>
                                 </div>                               
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editLaboratory' />
                                <input type='hidden' name='laboratory_id' value='<?php echo $row["laboratory_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTolabraotary').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("laboratory");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#laboratory_image').removeClass("is-invalid");                              
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("laboratory");
                                            slowInternet();
                                        });
                                    } else {
                                       if($('#laboratory_image').val() == ''){
                                        $('#laboratory_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#laboratory_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("laboratory");
                        slowInternet();
                        alert_toast("error!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Laboratory Section End
        
        
        
        
        //Computer Lab Section Start
        if($_POST["action"] == "computer_lab"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keyword</th>
                        <th>Image</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_computer_lab");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;                              ;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["computer_lab_title"] ?></td>     
                                    <td><?php echo $row["computer_lab_meta_description"] ?></td>     
                                    <td><?php echo $row["computer_lab_meta_keyword"] ?></td>                        
                                    <td><img src="images/computer_lab/<?php echo $row["computer_lab_image"]; ?>" width="100px" /></td>                                 
                                     <td><?php
                                            if($row["computer_lab_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["computer_lab_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["computer_lab_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["computer_lab_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["computer_lab_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>                                
                                   <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["computer_lab_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["computer_lab_id"]; ?>" class="btn btn-warning" title="Edit Computer Lab"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["computer_lab_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Computer Lab"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["computer_lab_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["computer_lab_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["computer_lab_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["computer_lab_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["computer_lab_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["computer_lab_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["computer_lab_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["computer_lab_title"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["computer_lab_meta_description"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["computer_lab_meta_keyword"]; ?></p>
                                                    </div>
                                                </div>                                              
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/computer_lab/<?php echo $row["computer_lab_image"]; ?>" width="50%" /></p>
                                                    </div>
                                                </div>                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["computer_lab_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["computer_lab_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["computer_lab_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["computer_lab_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["computer_lab_id"]; ?>" name="tblName" type="hidden" value="tbl_computer_lab" />
                                                        <input id="deleteId<?php echo $row["computer_lab_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["computer_lab_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["computer_lab_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["computer_lab_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["computer_lab_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["computer_lab_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["computer_lab_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["computer_lab_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["computer_lab_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["computer_lab_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["computer_lab_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["computer_lab_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["computer_lab_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["computer_lab_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["computer_lab_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Computer Lab Deleted Successfully!!!");
                                                            main("computer_lab");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["computer_lab_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["computer_lab_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["computer_lab_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["computer_lab_id"]; ?>').prop('disabled', true);
                                            var action = "editComputerlab";
                                            var computer_lab_id = "<?php echo $row["computer_lab_id"]; ?>";
                                            var dataString = 'action='+ action +'&computer_lab_id='+ computer_lab_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Computer Lab Section End
        
        
        
        //Edit Computer Lab Section Start
        if($_POST["action"] == "editComputerlab"){
            $computer_lab_id = $_POST["computer_lab_id"];
            $object->sql = "";
            $object->select("tbl_computer_lab");
            $object->where("`computer_lab_id` = '$computer_lab_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTocomputerLab" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["computer_lab_title"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["computer_lab_meta_description"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["computer_lab_meta_keyword"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Header Image</span>
                                  <p><img src="images/computer_lab/<?php echo $row["computer_lab_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Class Room</u></b></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="computer_lab_title" name="computer_lab_title" class="form-control" value="<?php echo $row["computer_lab_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="computer_lab_meta_description" name="computer_lab_meta_description" class="form-control" value="<?php echo $row["computer_lab_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="computer_lab_meta_keyword" name="computer_lab_meta_keyword" class="form-control" value="<?php echo $row["computer_lab_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Header Image</label>
                                            <input type="file" class="form-control" id="computer_lab_image" name="computer_lab_image">
                                            <small>Choose Image</small>
                                        </div>
                                 </div>                               
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editComputerlab' />
                                <input type='hidden' name='computer_lab_id' value='<?php echo $row["computer_lab_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTocomputerLab').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("computer_lab");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#computer_lab_image').removeClass("is-invalid");                              
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("computer_lab");
                                            slowInternet();
                                        });
                                    } else {
                                       if($('#computer_lab_image').val() == ''){
                                        $('#computer_lab_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#computer_lab_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("computer_lab");
                        slowInternet();
                        alert_toast("error!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Computer Lab Section End
        
        
        
        //Class Room Section Start
        if($_POST["action"] == "class_room"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keyword</th>
                        <th>Image</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_class_room");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;                              ;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["class_room_title"] ?></td>     
                                    <td><?php echo $row["class_room_meta_description"] ?></td>     
                                    <td><?php echo $row["class_room_meta_keyword"] ?></td>                        
                                    <td><img src="images/class_room/<?php echo $row["class_room_image"]; ?>" width="100px" /></td>                                 
                                     <td><?php
                                            if($row["class_room_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["class_room_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["class_room_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["class_room_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["class_room_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>                                
                                   <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["class_room_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["class_room_id"]; ?>" class="btn btn-warning" title="Edit Gallery"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["class_room_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Gallery"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["class_room_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["class_room_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["class_room_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["class_room_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["class_room_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["class_room_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["class_room_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["class_room_title"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["class_room_meta_description"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["class_room_meta_keyword"]; ?></p>
                                                    </div>
                                                </div>                                              
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/class_room/<?php echo $row["class_room_image"]; ?>" width="50%" /></p>
                                                    </div>
                                                </div>                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["class_room_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["class_room_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["class_room_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["class_room_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["class_room_id"]; ?>" name="tblName" type="hidden" value="tbl_class_room" />
                                                        <input id="deleteId<?php echo $row["class_room_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["class_room_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["class_room_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["class_room_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["class_room_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["class_room_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["class_room_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["class_room_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["class_room_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["class_room_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["class_room_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["class_room_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["class_room_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["class_room_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["class_room_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Class Room Deleted Successfully!!!");
                                                            main("class_room");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["class_room_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["class_room_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["class_room_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["class_room_id"]; ?>').prop('disabled', true);
                                            var action = "editClassroom";
                                            var class_room_id = "<?php echo $row["class_room_id"]; ?>";
                                            var dataString = 'action='+ action +'&class_room_id='+ class_room_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Class Room Section End
        
        
        
        //Edit Class Room Section Start
        if($_POST["action"] == "editClassroom"){
            $class_room_id = $_POST["class_room_id"];
            $object->sql = "";
            $object->select("tbl_class_room");
            $object->where("`class_room_id` = '$class_room_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backToclassRoom" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["class_room_title"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["class_room_meta_description"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["class_room_meta_keyword"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Header Image</span>
                                  <p><img src="images/class_room/<?php echo $row["class_room_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Class Room</u></b></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="class_room_title" name="class_room_title" class="form-control" value="<?php echo $row["class_room_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="class_room_meta_description" name="class_room_meta_description" class="form-control" value="<?php echo $row["class_room_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="class_room_meta_keyword" name="class_room_meta_keyword" class="form-control" value="<?php echo $row["class_room_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Header Image</label>
                                            <input type="file" class="form-control" id="class_room_image" name="class_room_image">
                                            <small>Choose Image</small>
                                        </div>
                                 </div>                               
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editClassroom' />
                                <input type='hidden' name='class_room_id' value='<?php echo $row["class_room_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backToclassRoom').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("class_room");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#class_room_image').removeClass("is-invalid");                              
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("class_room");
                                            slowInternet();
                                        });
                                    } else {
                                       if($('#class_room_image').val() == ''){
                                        $('#class_room_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#class_room_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("class_room");
                        slowInternet();
                        alert_toast("error!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Class Room Section End
        
        
        
        //Our Gallery View Section Start
        if($_POST["action"] == "gallery"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keyword</th>
                        <th>Image</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_gallery");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;                              ;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["gallery_title"] ?></td>     
                                    <td><?php echo $row["gallery_meta_description"] ?></td>     
                                    <td><?php echo $row["gallery_meta_keyword"] ?></td>                        
                                    <td><img src="images/gallery/<?php echo $row["gallery_image"]; ?>" width="100px" /></td>                                 
                                     <td><?php
                                            if($row["gallery_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["gallery_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["gallery_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["gallery_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["gallery_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>                                
                                   <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["gallery_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["gallery_id"]; ?>" class="btn btn-warning" title="Edit Gallery"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["gallery_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Gallery"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["gallery_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["gallery_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["gallery_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["gallery_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["gallery_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["gallery_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["gallery_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["gallery_title"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["gallery_meta_description"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["gallery_meta_keyword"]; ?></p>
                                                    </div>
                                                </div>                                              
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/gallery/<?php echo $row["gallery_image"]; ?>" width="50%" /></p>
                                                    </div>
                                                </div>                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["gallery_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["gallery_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["gallery_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["gallery_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["gallery_id"]; ?>" name="tblName" type="hidden" value="tbl_gallery" />
                                                        <input id="deleteId<?php echo $row["gallery_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["gallery_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["gallery_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["gallery_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["gallery_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["gallery_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["gallery_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["gallery_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["gallery_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["gallery_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["gallery_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["gallery_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["gallery_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["gallery_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["gallery_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Gallery Deleted Successfully!!!");
                                                            main("gallery");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["gallery_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["gallery_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["gallery_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["gallery_id"]; ?>').prop('disabled', true);
                                            var action = "editGallery";
                                            var gallery_id = "<?php echo $row["gallery_id"]; ?>";
                                            var dataString = 'action='+ action +'&gallery_id='+ gallery_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Our Gallery view Section End
        
        
        
        //Edit Gallery Section Start
        if($_POST["action"] == "editGallery"){
            $gallery_id = $_POST["gallery_id"];
            $object->sql = "";
            $object->select("tbl_gallery");
            $object->where("`gallery_id` = '$gallery_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backToGallery" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["gallery_title"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["gallery_meta_description"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["gallery_meta_keyword"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Header Image</span>
                                  <p><img src="images/gallery/<?php echo $row["gallery_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Gallery</u></b></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="gallery_title" name="gallery_title" class="form-control" value="<?php echo $row["gallery_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="gallery_meta_description" name="gallery_meta_description" class="form-control" value="<?php echo $row["gallery_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="gallery_meta_keyword" name="gallery_meta_keyword" class="form-control" value="<?php echo $row["gallery_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Header Image</label>
                                            <input type="file" class="form-control" id="gallery_image" name="gallery_image">
                                            <small>Choose Image</small>
                                        </div>
                                 </div>                               
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editGallery' />
                                <input type='hidden' name='gallery_id' value='<?php echo $row["gallery_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backToGallery').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("gallery");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#gallery_image').removeClass("is-invalid");                              
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("gallery");
                                            slowInternet();
                                        });
                                    } else {
                                       if($('#gallery_image').val() == ''){
                                        $('#gallery_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#gallery_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("gallery");
                        slowInternet();
                        alert_toast("error!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Sponsors Section End
        
        
        
        //Designation Section Start
        if($_POST["action"] == "designation"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Title</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_designation");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["designation_name"]; ?></td>
                                    <td><?php
                                            if($row["designation_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["designation_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["designation_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["designation_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["designation_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["designation_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["designation_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["designation_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["designation_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["designation_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["designation_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["designation_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["designation_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["designation_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["designation_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["designation_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Designation Name</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["designation_name"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["designation_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["designation_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["designation_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["designation_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["designation_id"]; ?>" name="tblName" type="hidden" value="tbl_designation" />
                                                        <input id="deleteId<?php echo $row["designation_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["designation_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["designation_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["designation_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["designation_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["designation_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["designation_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["designation_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["designation_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["designation_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["designation_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["designation_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["designation_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["designation_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["designation_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("designation");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["designation_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["designation_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["designation_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["designation_id"]; ?>').prop('disabled', true);
                                            var action = "editdesignation";
                                            var designation_id = "<?php echo $row["designation_id"]; ?>";
                                            var dataString = 'action='+ action +'&designation_id='+ designation_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Designation Section End
        //Edit Designation Section Start
        if($_POST["action"] == "editdesignation"){
            $designation_id = $_POST["designation_id"];
            $object->sql = "";
            $object->select("tbl_designation");
            $object->where("`designation_id` = '$designation_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTodesignation" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Designation Name</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["designation_name"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Designation</u></b></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Designation Name</label>
                                            <input type="text" id="designation_name" name="designation_name" class="form-control" value="<?php echo $row["designation_name"]; ?>">
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editdesignation' />
                                <input type='hidden' name='designation_id' value='<?php echo $row["designation_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTodesignation').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("designation");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#designation_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("designation");
                                            slowInternet();
                                        });
                                    } else {
                                    if($('#designation_name').val() == ''){
                                        $('#designation_name').addClass("is-invalid");
                                        alert_toast("warning", "Enter Name!!!");
                                    }
                                    else
                                        $('#designation_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("designation");
                        slowInternet();
                        alert_toast("error", "No designation!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Designation Section End
        
        
         //Staff Section Start
        if($_POST["action"] == "staff"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Meta Keyword</th>
                    <th>Meta Description</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Image</th>
                    <th>Added By</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_staff");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                                
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["staff_title"]; ?></td>
                                    <td><?php echo $row["staff_meta_keyword"]; ?></td>
                                    <td><?php echo $row["staff_meta_description"]; ?></td>
                                    <td><?php echo $row["staff_name"]; ?></td>
                                    <td><?php echo $row["staff_designation"]; ?></td>
                                    <td><img src="images/team/<?php echo $row["staff_image"]; ?>" width="100px" /></td>
                                    <td><?php
                                            if($row["staff_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["management_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["staff_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["staff_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["staff_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["staff_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["staff_id"]; ?>" class="btn btn-warning" title="Edit Team"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["staff_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Staff"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                
                                
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["staff_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["staff_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["staff_name"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["staff_title"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["staff_meta_keyword"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["staff_meta_description"]; ?></p>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Name</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["staff_name"]; ?></p>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Designation</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["staff_designation"]; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/team/<?php echo $row["staff_image"]; ?>" width="100%" /></p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                
                              
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["staff_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["staff_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["staff_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["staff_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["staff_id"]; ?>" name="tblName" type="hidden" value="tbl_staff" />
                                                        <input id="deleteId<?php echo $row["staff_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["staff_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["staff_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["staff_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["staff_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["staff_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["staff_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["staff_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["staff_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["staff_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["staff_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["staff_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["staff_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["staff_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["staff_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", " Staff Deleted Successfully!!!");
                                                            main("staff");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["staff_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["staff_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["staff_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["staff_id"]; ?>').prop('disabled', true);
                                            var action = "editstaff";
                                            var staffId = "<?php echo $row["staff_id"]; ?>";
                                            var dataString = 'action='+ action +'&staffId='+ staffId;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Staff Section End
        
        
         //Edit Staff Section Start
        if($_POST["action"] == "editstaff"){
            $rowProperty = "";
            $staffId = $_POST["staffId"];
            $object->sql = "";
            $object->select("tbl_staff");
            $object->where("`staff_id` = '$staffId' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                 /*$propertyRealName = "";
                $object->sql = "";
                $object->select("tbl_designation");
                $object->where("`designation_id` = '".$row["designation_id"]."' && `status` = '$visible'");
                $resultProperty = $object->get();
                if($resultProperty->num_rows > 0)
                    $rowProperty = $object->get_row();
                $propertyRealName = $rowProperty["designation_name"];*/
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTostaff_team" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                         <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["staff_title"]; ?></p>
                                </div>
                            </div>
                             <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["staff_meta_keyword"]; ?></p>
                                </div>
                            </div>
                             <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["staff_meta_description"]; ?></p>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Name</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["staff_name"]; ?></p>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Designation</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["staff_designation"]; ?></p>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/team/<?php echo $row["staff_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update this Team</u></b></h3>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="staff_title" name="staff_title" class="form-control" value="<?php echo $row["staff_title"]; ?>">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="staff_meta_keyword" name="staff_meta_keyword" class="form-control" value="<?php echo $row["staff_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="staff_meta_description" name="staff_meta_description" class="form-control" value="<?php echo $row["staff_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Name</label>
                                            <input type="text" id="staff_name" name="staff_name" class="form-control" value="<?php echo $row["staff_name"]; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Designation</label>
                                            <textarea class="textarea" id="staff_designation" name="staff_designation" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row["staff_designation"]; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Update Image</label>
                                            <input type="file" id="staff_image" name="staff_image" class="form-control">
                                            <small>Choose Image</small>
                                        </div>
                                    </div>
                                    
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editstaff' />
                                <input type='hidden' name='editstaffId' value='<?php echo $row["staff_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTostaff_team').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("staff");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        // $('#editpropertyName').removeClass("is-invalid");
                                        $('#staff_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("staff");
                                            slowInternet();
                                        });
                                    } else {
                                        
                                        if($('#staff_name').val() == ''){
                                            $('#staff_name').addClass("is-invalid");
                                            alert_toast("warning", "Please enter Name!!!");
                                        }
                                        else
                                            $('#staff_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("phase");
                        slowInternet();
                        alert_toast("error", "No Phase Available Now!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Staff Section End
        
        
                
        
        
        
         //Management Team Section Start
        if($_POST["action"] == "management_team"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Title</th>
                        <th>Meta Keyword</th>
                        <th>Meta Description</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_management_team");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                                
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["management_title"]; ?></td>
                                    <td><?php echo $row["management_meta_keyword"]; ?></td>
                                    <td><?php echo $row["management_meta_description"]; ?></td>
                                   
                                    <td><?php echo $row["management_name"]; ?></td>
                                     <td><?php echo $row["management_designation"]; ?></td>
                                    <td><img src="images/team/<?php echo $row["management_image"]; ?>" width="100px" /></td>
                                    <td><?php
                                            if($row["management_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["management_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["management_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["management_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["management_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["management_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["management_id"]; ?>" class="btn btn-warning" title="Edit Team"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["management_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Property"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["management_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["management_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["management_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["management_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["management_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["management_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["management_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["management_name"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["management_title"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["management_meta_keyword"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["management_meta_description"]; ?></p>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Name</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["management_name"]; ?></p>
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Designation</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["management_designation"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/team/<?php echo $row["management_image"]; ?>" width="100%" /></p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["management_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["management_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["management_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["management_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["management_id"]; ?>" name="tblName" type="hidden" value="tbl_management_team" />
                                                        <input id="deleteId<?php echo $row["management_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["management_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["management_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["management_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["management_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["management_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["management_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["management_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["management_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["management_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["management_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["management_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["management_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["management_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["management_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("management_team");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["management_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["management_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["management_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["management_id"]; ?>').prop('disabled', true);
                                            var action = "editmanagementteam";
                                            var managementteamId = "<?php echo $row["management_id"]; ?>";
                                            var dataString = 'action='+ action +'&managementteamId='+ managementteamId;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Management Team Section End
        //Edit Management Team Section Start
        if($_POST["action"] == "editmanagementteam"){
            $rowProperty = "";
            $managementteamId = $_POST["managementteamId"];
            $object->sql = "";
            $object->select("tbl_management_team");
            $object->where("`management_id` = '$managementteamId' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                 
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTomanagement_team" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                         <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["management_title"]; ?></p>
                                </div>
                            </div>
                             <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["management_meta_keyword"]; ?></p>
                                </div>
                            </div>
                             <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["management_meta_description"]; ?></p>
                                </div>
                            </div>
                           
                            <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Name</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["management_name"]; ?></p>
                                </div>
                            </div>
                            
                            
                             <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Designation</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["management_designation"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/team/<?php echo $row["management_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update this Team</u></b></h3>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="management_title" name="management_title" class="form-control" value="<?php echo $row["management_title"]; ?>">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="management_meta_keyword" name="management_meta_keyword" class="form-control" value="<?php echo $row["management_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="management_meta_description" name="management_meta_description" class="form-control" value="<?php echo $row["management_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Name</label>
                                            <input type="text" id="management_name" name="management_name" class="form-control" value="<?php echo $row["management_name"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Designation</label>
                                            <input type="text" id="management_designation" name="management_designation" class="form-control" value="<?php echo $row["management_designation"]; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Update Image</label>
                                            <input type="file" id="management_image" name="management_image" class="form-control">
                                            <small>Choose Image</small>
                                        </div>
                                    </div>
                                    

                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editmanagementteam' />
                                <input type='hidden' name='editmanagementteamId' value='<?php echo $row["management_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTomanagement_team').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("management_team");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                         $('#editpropertyName').removeClass("is-invalid");
                                        $('#management_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("management_team");
                                            slowInternet();
                                        });
                                    } else {
                                        if($('#editpropertyName').val() == ''){
                                            $('#editpropertyName').addClass("is-invalid");
                                            alert_toast("warning", "Please select any Property!!!");
                                        }
                                        else
                                            $('#editpropertyName').removeClass("is-invalid");
                                        if($('#management_name').val() == ''){
                                            $('#management_name').addClass("is-invalid");
                                            alert_toast("warning", "Please enter Name!!!");
                                        }
                                        else
                                            $('#management_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("phase");
                        slowInternet();
                        alert_toast("error", "No Phase Available Now!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Management Team Section End
        //Our News View Section Start
        if($_POST["action"] == "news"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keyword</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_news");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;                              ;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["newstitle"] ?></td>     
                                    <td><?php echo $row["news_meta_description"] ?></td>     
                                    <td><?php echo $row["news_meta_keyword"] ?></td> 
                                    <td><?php echo $row["title"] ?></td> 
                                    <td><?php echo $row["name"] ?></td> 
                                    <td><?php echo $row["news_date"] ?></td>                                    
                                    <td><img src="images/news/<?php echo $row["news_image"]; ?>" width="100px" /></td>                                 
                                     <td><?php
                                            if($row["news_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["news_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["news_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["news_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["news_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>                                
                                   <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["news_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["news_id"]; ?>" class="btn btn-warning" title="Edit Sponsors"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["news_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Gallery"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["news_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["news_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["news_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["news_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["news_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["news_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["news_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["newstitle"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["news_meta_description"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["news_meta_keyword"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["title"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Name</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["name"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Date</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["news_date"]; ?></p>
                                                    </div>
                                                </div>                                              
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/news/<?php echo $row["news_image"]; ?>" width="50%" /></p>
                                                    </div>
                                                </div>                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["news_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["news_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["news_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["news_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["news_id"]; ?>" name="tblName" type="hidden" value="tbl_news" />
                                                        <input id="deleteId<?php echo $row["news_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["news_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["news_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["news_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["news_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["news_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["news_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["news_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["news_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["news_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["news_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["news_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["news_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["news_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["news_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("news");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["news_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["news_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["news_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["news_id"]; ?>').prop('disabled', true);
                                            var action = "editnews";
                                            var news_id = "<?php echo $row["news_id"]; ?>";
                                            var dataString = 'action='+ action +'&news_id='+ news_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Our News view Section End
        //Edit News Section Start
        if($_POST["action"] == "editnews"){
            $news_id = $_POST["news_id"];
            $object->sql = "";
            $object->select("tbl_news");
            $object->where("`news_id` = '$news_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTonews" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["newstitle"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["news_meta_description"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["news_meta_keyword"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["title"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Name</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["name"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Date</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["news_date"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/news/<?php echo $row["news_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update News</u></b></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="newstitle" name="newstitle" class="form-control" value="<?php echo $row["newstitle"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="news_meta_description" name="news_meta_description" class="form-control" value="<?php echo $row["news_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="news_meta_keyword" name="news_meta_keyword" class="form-control" value="<?php echo $row["news_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="title" name="title" class="form-control" value="<?php echo $row["title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Name</label>
                                            <input type="text" id="name" name="name" class="form-control" value="<?php echo $row["name"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Date</label>
                                            <input type="date" id="news_date" name="news_date" class="form-control" value="<?php echo $row["news_date"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Image</label>
                                            <input type="file" class="form-control" id="news_image" name="news_image">
                                            <small>Choose Image</small>
                                        </div>
                                 </div>                               
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editnews' />
                                <input type='hidden' name='news_id' value='<?php echo $row["news_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTonews').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("news");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#news_image').removeClass("is-invalid");                              
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("news");
                                            slowInternet();
                                        });
                                    } else {
                                       if($('#news_image').val() == ''){
                                        $('#news_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#news_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("news");
                        slowInternet();
                        alert_toast("error!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit News Section End
            //year Section Start
        if($_POST["action"] == "year"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Year</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_year");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["year_name"]; ?></td>
                                    <td><?php
                                            if($row["year_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["year_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["year_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["year_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["year_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["year_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["year_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["year_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["year_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["year_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["year_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["year_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["year_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["year_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["year_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["year_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">year Name</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["year_name"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["year_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["year_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["year_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["year_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["year_id"]; ?>" name="tblName" type="hidden" value="tbl_year" />
                                                        <input id="deleteId<?php echo $row["year_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["year_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["year_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["year_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["year_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["year_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["year_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["year_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["year_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["year_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["year_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["year_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["year_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["year_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["year_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("year");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["year_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["year_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["year_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["year_id"]; ?>').prop('disabled', true);
                                            var action = "edityear";
                                            var year_id = "<?php echo $row["year_id"]; ?>";
                                            var dataString = 'action='+ action +'&year_id='+ year_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //year Section End
        //Edit year Section Start
        if($_POST["action"] == "edityear"){
            $year_id = $_POST["year_id"];
            $object->sql = "";
            $object->select("tbl_year");
            $object->where("`year_id` = '$year_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backToyear" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">year Name</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["year_name"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update year</u></b></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update year Name</label>
                                            <input type="text" id="year_name" name="year_name" class="form-control" value="<?php echo $row["year_name"]; ?>">
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='edityear' />
                                <input type='hidden' name='year_id' value='<?php echo $row["year_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backToyear').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("year");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#year_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("year");
                                            slowInternet();
                                        });
                                    } else {
                                    if($('#year_name').val() == ''){
                                        $('#year_name').addClass("is-invalid");
                                        alert_toast("warning", "Enter Name!!!");
                                    }
                                    else
                                        $('#year_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("year");
                        slowInternet();
                        alert_toast("error", "No year!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit year Section End
         //media coverage Section Start
        if($_POST["action"] == "media_coverage"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Title</th>
                        <th>Meta Keyword</th>
                        <th>Meta Description</th>
                        <th>Year</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_media_coverage");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                                $propertyRealName = "";
                                $objectAdmin->sql = "";
                                $objectAdmin->select("tbl_year");
                                $objectAdmin->where("`year_id` = '".$row["year_id"]."' && `status` = '$visible'");
                                $resultProperty = $objectAdmin->get();
                                if($resultProperty->num_rows > 0)
                                    $rowProperty = $objectAdmin->get_row();
                                $propertyRealName = $rowProperty["year_name"];
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["media_coverage_title"]; ?></td>
                                    <td><?php echo $row["media_coverage_meta_keyword"]; ?></td>
                                    <td><?php echo $row["media_coverage_meta_description"]; ?></td>
                                    <td><?php echo $propertyRealName; ?></td>
                                    <td><?php echo $row["media_coverage_name"]; ?></td>
                                    <td><img src="images/media/<?php echo $row["media_coverage_image"]; ?>" width="100px" /></td>
                                    <td><?php
                                            if($row["media_coverage_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["media_coverage_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["media_coverage_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["media_coverage_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["media_coverage_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["media_coverage_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["media_coverage_id"]; ?>" class="btn btn-warning" title="Edit Team"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["media_coverage_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Property"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["media_coverage_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["media_coverage_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["media_coverage_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["media_coverage_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["media_coverage_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["media_coverage_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["media_coverage_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["media_coverage_name"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["media_coverage_title"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["media_coverage_meta_keyword"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["media_coverage_meta_description"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Property</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $propertyRealName; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Name</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["media_coverage_name"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/media/<?php echo $row["media_coverage_image"]; ?>" width="100%" /></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["media_coverage_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["media_coverage_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["media_coverage_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["media_coverage_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["media_coverage_id"]; ?>" name="tblName" type="hidden" value="tbl_media_coverage" />
                                                        <input id="deleteId<?php echo $row["media_coverage_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["media_coverage_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["media_coverage_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["media_coverage_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["media_coverage_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["media_coverage_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["media_coverage_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["media_coverage_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["media_coverage_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["media_coverage_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["media_coverage_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["media_coverage_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["media_coverage_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["media_coverage_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["media_coverage_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("media_coverage");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["media_coverage_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["media_coverage_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["media_coverage_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["media_coverage_id"]; ?>').prop('disabled', true);
                                            var action = "editmedia_coverage";
                                            var media_coverage_id = "<?php echo $row["media_coverage_id"]; ?>";
                                            var dataString = 'action='+ action +'&media_coverage_id='+ media_coverage_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //media coverage Section End
        //Edit media coverage Section Start
        if($_POST["action"] == "editmedia_coverage"){
            $rowProperty = "";
            $media_coverage_id = $_POST["media_coverage_id"];
            $object->sql = "";
            $object->select("tbl_media_coverage");
            $object->where("`media_coverage_id` = '$media_coverage_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                 $propertyRealName = "";
                $object->sql = "";
                $object->select("tbl_year");
                $object->where("`year_id` = '".$row["year_id"]."' && `status` = '$visible'");
                $resultProperty = $object->get();
                if($resultProperty->num_rows > 0)
                    $rowProperty = $object->get_row();
                $propertyRealName = $rowProperty["year_name"];
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTomedia_coverage" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                         <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["media_coverage_title"]; ?></p>
                                </div>
                            </div>
                             <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["media_coverage_meta_keyword"]; ?></p>
                                </div>
                            </div>
                             <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["media_coverage_meta_description"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Property</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $propertyRealName; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Name</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["media_coverage_name"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/media/<?php echo $row["media_coverage_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update this Team</u></b></h3>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="media_coverage_title" name="media_coverage_title" class="form-control" value="<?php echo $row["media_coverage_title"]; ?>">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="media_coverage_meta_keyword" name="media_coverage_meta_keyword" class="form-control" value="<?php echo $row["media_coverage_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="media_coverage_meta_description" name="media_coverage_meta_description" class="form-control" value="<?php echo $row["media_coverage_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Property</label>
                                            <select id="editpropertyName" name="editpropertyName" class="form-control">
                                                <option value="">Select Property</option>
                                                <?php
                                                    $object->sql = "";
                                                    $object->select("tbl_year");
                                                    $object->where("`status` = '$visible'");
                                                    $resultSelect = $object->get();
                                                    if($resultSelect->num_rows > 0){
                                                        while($rowSelect = $object->get_row()){
                                                            ?>
                                                                <option <?php if($row["year_id"] == $rowSelect["year_id"]) echo "selected"; ?> value="<?php echo $rowSelect["year_id"]; ?>"><?php echo $rowSelect["year_name"]; ?></option>
                                                            <?php
                                                        }
                                                    } else{
                                                        ?>
                                                            <option value="">No year added now</option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Name</label>
                                            <input type="text" id="media_coverage_name" name="media_coverage_name" class="form-control" value="<?php echo $row["media_coverage_name"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Update Image</label>
                                            <input type="file" id="media_coverage_image" name="media_coverage_image" class="form-control">
                                            <small>Choose Image</small>
                                        </div>
                                    </div>                                  
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editmedia_coverage' />
                                <input type='hidden' name='media_coverage_id' value='<?php echo $row["media_coverage_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTomedia_coverage').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("media_coverage");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                         $('#editpropertyName').removeClass("is-invalid");
                                        $('#media_coverage_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("media_coverage");
                                            slowInternet();
                                        });
                                    } else {
                                        if($('#editpropertyName').val() == ''){
                                            $('#editpropertyName').addClass("is-invalid");
                                            alert_toast("warning", "Please select any Property!!!");
                                        }
                                        else
                                            $('#editpropertyName').removeClass("is-invalid");
                                        if($('#media_coverage_name').val() == ''){
                                            $('#media_coverage_name').addClass("is-invalid");
                                            alert_toast("warning", "Please enter Name!!!");
                                        }
                                        else
                                            $('#media_coverage_name').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("media_coverage");
                        slowInternet();
                        alert_toast("error", "No Media Available Now!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit media coverage Section End
        //Our Award View Section Start
        if($_POST["action"] == "award"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keyword</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_award");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;                              ;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["awardtitle"] ?></td>     
                                    <td><?php echo $row["award_meta_description"] ?></td>     
                                    <td><?php echo $row["award_meta_keyword"] ?></td> 
                                    <td><?php echo $row["title"] ?></td>                            
                                    <td><img src="images/award/<?php echo $row["award_image"]; ?>" width="100px" /></td>                                 
                                     <td><?php
                                            if($row["award_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["award_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["award_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["award_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["award_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>                                
                                   <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["award_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["award_id"]; ?>" class="btn btn-warning" title="Edit Sponsors"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["award_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Gallery"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["award_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["award_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["award_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["award_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["award_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["award_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["award_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["awardtitle"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["award_meta_description"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["award_meta_keyword"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["title"]; ?></p>
                                                    </div>
                                                </div>                                      
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Image</span>
                                                      <p><img src="images/award/<?php echo $row["award_image"]; ?>" width="50%" /></p>
                                                    </div>
                                                </div>                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["award_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["award_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["award_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["award_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["award_id"]; ?>" name="tblName" type="hidden" value="tbl_award" />
                                                        <input id="deleteId<?php echo $row["award_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["award_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["award_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["award_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["award_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["award_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["award_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["award_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["award_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["award_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["award_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["award_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["award_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["award_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["award_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("award");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["award_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["award_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["award_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["award_id"]; ?>').prop('disabled', true);
                                            var action = "editaward";
                                            var award_id = "<?php echo $row["award_id"]; ?>";
                                            var dataString = 'action='+ action +'&award_id='+ award_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Our Award view Section End
        //Edit Award Section Start
        if($_POST["action"] == "editaward"){
            $award_id = $_POST["award_id"];
            $object->sql = "";
            $object->select("tbl_award");
            $object->where("`award_id` = '$award_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backToaward" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["awardtitle"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["award_meta_description"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["award_meta_keyword"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["title"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Image</span>
                                  <p><img src="images/award/<?php echo $row["award_image"]; ?>" width="100%" /></p>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Award</u></b></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="awardtitle" name="awardtitle" class="form-control" value="<?php echo $row["awardtitle"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="award_meta_description" name="award_meta_description" class="form-control" value="<?php echo $row["award_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="award_meta_keyword" name="award_meta_keyword" class="form-control" value="<?php echo $row["award_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="title" name="title" class="form-control" value="<?php echo $row["title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Image</label>
                                            <input type="file" class="form-control" id="award_image" name="award_image">
                                            <small>Choose Image</small>
                                        </div>
                                 </div>                               
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editaward' />
                                <input type='hidden' name='award_id' value='<?php echo $row["award_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backToaward').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("award");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#award_image').removeClass("is-invalid");                              
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("award");
                                            slowInternet();
                                        });
                                    } else {
                                       if($('#award_image').val() == ''){
                                        $('#award_image').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#award_image').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("award");
                        slowInternet();
                        alert_toast("error!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Award Section End
        //Our Video View Section Start
        if($_POST["action"] == "video"){
            $rowProperty = "";
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keyword</th>
                        <th>Video Title</th>
                        <th>Video Link</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_video");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;                              ;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["videotitle"] ?></td>     
                                    <td><?php echo $row["video_meta_description"] ?></td>     
                                    <td><?php echo $row["video_meta_keyword"] ?></td> 
                                    <td><?php echo $row["video_title"] ?></td> 
                                    <td><?php echo $row["video_link"] ?></td>                                  
                                     <td><?php
                                            if($row["video_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["video_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["video_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["video_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["video_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>                                
                                   <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["video_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["video_id"]; ?>" class="btn btn-warning" title="Edit Sponsors"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["video_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete Gallery"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["video_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["video_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["video_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["video_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["video_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["video_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["video_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["videotitle"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Description</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["video_meta_description"]; ?></p>
                                                    </div>
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Meta Keyword</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["video_meta_keyword"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Video Title</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["video_title"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Video Link</span>
                                                      <p><i class="fas fa-angle-double-right"></i> <?php echo $row["video_link"]; ?></p>
                                                    </div>
                                                </div>                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["video_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["video_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["video_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["video_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["video_id"]; ?>" name="tblName" type="hidden" value="tbl_video" />
                                                        <input id="deleteId<?php echo $row["video_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["video_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["video_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["video_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["video_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["video_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["video_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["video_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["video_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["video_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["video_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["video_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["video_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["video_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["video_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("video");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["video_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["video_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["video_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["video_id"]; ?>').prop('disabled', true);
                                            var action = "editvideo";
                                            var video_id = "<?php echo $row["video_id"]; ?>";
                                            var dataString = 'action='+ action +'&video_id='+ video_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Our Video view Section End
        //Edit Video Section Start
        if($_POST["action"] == "editvideo"){
            $video_id = $_POST["video_id"];
            $object->sql = "";
            $object->select("tbl_video");
            $object->where("`video_id` = '$video_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backTovideo" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["videotitle"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Description</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["video_meta_description"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Meta Keyword</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["video_meta_keyword"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Video Title</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["video_title"]; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Video Link</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["video_link"]; ?></p>
                                </div>
                            </div>                   
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Video</u></b></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Title</label>
                                            <input type="text" id="videotitle" name="videotitle" class="form-control" value="<?php echo $row["videotitle"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Description</label>
                                            <input type="text" id="video_meta_description" name="video_meta_description" class="form-control" value="<?php echo $row["video_meta_description"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Meta Keyword</label>
                                            <input type="text" id="video_meta_keyword" name="video_meta_keyword" class="form-control" value="<?php echo $row["video_meta_keyword"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Video Title</label>
                                            <input type="text" id="video_title" name="video_title" class="form-control" value="<?php echo $row["video_title"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Video Link</label>
                                            <input type="text" id="video_link" name="video_link" class="form-control" value="<?php echo $row["video_link"]; ?>">
                                        </div>
                                    </div>                        
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editvideo' />
                                <input type='hidden' name='video_id' value='<?php echo $row["video_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backTovideo').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("video");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                        $('#video_link').removeClass("is-invalid");                              
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("video");
                                            slowInternet();
                                        });
                                    } else {
                                       if($('#video_link').val() == ''){
                                        $('#video_link').addClass("is-invalid");
                                        alert_toast("warning", "Please Select a Image!!!");
                                    }
                                    else
                                        $('#video_link').removeClass("is-invalid");
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("video");
                        slowInternet();
                        alert_toast("error!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Video Section End



        //Subject Section Start
         if($_POST["action"] == "subject"){
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Subject</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $object->sql = "";
                        $object->select("tbl_subject");
                        $object->where("`status` = '$visible'");
                        $result = $object->get();
                        if($result->num_rows > 0){
                            $sno = 0;
                            while($row = $object->get_row()){
                                $sno++;
                    ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $row["subj_name"]; ?></td>
                                    <td><?php
                                            if($row["subj_added_by"] == $admin_id){
                                                ?>
                                                <center>
                                                    <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["subj_id"]; ?>').style.display = 'block';">You</button>
                                                </center>
                                                <?php
                                            }
                                            else{
                                                $objectAdmin->sql = "";
                                                $objectAdmin->select("tbl_admin");
                                                $objectAdmin->where("`admin_id` = '".$row["subj_added_by"]."'");
                                                $resultAdmin = $objectAdmin->get();
                                                if($resultAdmin->num_rows > 0){
                                                    $rowAdmin = $objectAdmin->get_row();
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["subj_id"]; ?>').style.display = 'block';"><?php echo $rowAdmin["admin_name"]; ?></button>
                                                    </center>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <center>
                                                        <button class='btn btn-info' onclick="document.getElementById('whoAddThis<?php echo $row["subj_id"]; ?>').style.display = 'block';">Anonymous</button>
                                                    </center>
                                                    <?php
                                                }
                                            }
                                    ?></td>
                                    <td>
                                        <button onclick="document.getElementById('viewModal<?php echo $row["subj_id"]; ?>').style.display = 'block';" class="btn btn-info" title="All Informations"><i class="fas fa-eye"></i></button>
                                        <button id="editButton<?php echo $row["subj_id"]; ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button onclick="document.getElementById('deleteModal<?php echo $row["subj_id"]; ?>').style.display = 'block';" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Modals Section Start -->
                                <!-- Who Added This Modal Start -->
                                <div id="whoAddThis<?php echo $row["subj_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('whoAddThis<?php echo $row["subj_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Who Added This</h2>
                                        </header>
                                        <form role="form" method="POST">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Added By</label>
                                                        <input type="text" class="form-control" value="<?php
                                                            if($row["subj_added_by"] == $admin_id)
                                                                echo "You";
                                                            else if(isset($rowAdmin["admin_name"]))
                                                                    echo $rowAdmin["admin_name"];
                                                                 else
                                                                    echo "Anonymous";
                                                        ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>With IP</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["subj_ip"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Data And Timing</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["subj_timing"]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Who Added This Modal End -->
                                <!-- View Modal Start -->
                                <div id="viewModal<?php echo $row["subj_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:50%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('viewModal<?php echo $row["subj_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center"><?php echo $row["subj_id"]; ?></h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="callout callout-warning pt-1 pb-1">
                                                      <span class="text-lg text-red">Subject</span>
                                                      <p><?php echo $row["subj_name"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- View Modal End -->
                                <!-- Delete Modal Start -->
                                <div id="deleteModal<?php echo $row["subj_id"]; ?>" class="w3-modal" style="z-index:2020;">
                                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:30%; margin-bottom:100px;">
                                        <header class="w3-container" style="background:#1d8749; color:white;">
                                            <span onclick="document.getElementById('deleteModal<?php echo $row["subj_id"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <h2 align="center">Are you sure???</h2>
                                        </header>
                                        <form id="deleteForm<?php echo $row["subj_id"]; ?>" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <input id="action<?php echo $row["subj_id"]; ?>" name="action" type="hidden" value="deleteRow" />
                                                        <input id="tblName<?php echo $row["subj_id"]; ?>" name="tblName" type="hidden" value="tbl_subject" />
                                                        <input id="deleteId<?php echo $row["subj_id"]; ?>" name="deleteId" type="hidden" value="<?php echo $row["subj_id"]; ?>" />
                                                        <button id="deleteButton<?php echo $row["subj_id"]; ?>" class="btn btn-danger" type="submit"><span id="deleteLoaderSection<?php echo $row["subj_id"]; ?>"></span><span id="deleteTextSection<?php echo $row["subj_id"]; ?>"><i class="fas fa-trash"></i> Move to trash</span></button>
                                                        <button class="btn btn-primary" onclick="document.getElementById('deleteModal<?php echo $row["subj_id"]; ?>').style.display='none'"> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#deleteButton<?php echo $row["subj_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#deleteTextSection<?php echo $row["subj_id"]; ?>').hide();
                                            $('#deleteLoaderSection<?php echo $row["subj_id"]; ?>').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                                            $('#deleteButton<?php echo $row["subj_id"]; ?>').prop('disabled', true);
                                            var action = $("#action<?php echo $row["subj_id"]; ?>").val();
                                            var tblName = $("#tblName<?php echo $row["subj_id"]; ?>").val();
                                            var deleteId = $("#deleteId<?php echo $row["subj_id"]; ?>").val();
                                            var dataString = 'action='+ action +'&tblName='+ tblName +'&deleteId='+ deleteId;
                                            $.ajax({
                                                url: 'include/controller.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    if(result == "success"){
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["subj_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["subj_id"]; ?>').prop('disabled', false);
                                                            alert_toast("success", "Deleted Successfully!!!");
                                                            main("subject");
                                                            slowInternet();
                                                        });
                                                    } else {
                                                        $('#loading').fadeOut(500, function() {
                                                            $(this).remove();
                                                            $('#deleteTextSection<?php echo $row["subj_id"]; ?>').show();
                                                            $('#deleteButton<?php echo $row["subj_id"]; ?>').prop('disabled', false);
                                                            if(result == "empty")
                                                                alert_toast("warning", "Please Fill out all required Fields!!!");
                                                            else if(result == "error")
                                                                    alert_toast("error", "Something Went Wrong, Please try again!!!");
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                        $('#editButton<?php echo $row["subj_id"]; ?>').click(function() {
                                            slowInternet();
                                            $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
                                            $('#editButton<?php echo $row["subj_id"]; ?>').prop('disabled', true);
                                            var action = "editsubject";
                                            var subj_id = "<?php echo $row["subj_id"]; ?>";
                                            var dataString = 'action='+ action +'&subj_id='+ subj_id;
                                            $.ajax({
                                                url: 'include/view.php',
                                                type: 'POST',
                                                data: dataString,
                                                success: function(result) {
                                                    $('#loading').fadeOut(500, function() {
                                                        $(this).remove();
                                                        $("#data").html(result);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- Delete Modal End -->
                                <!-- Modals Section End -->
                    <?php } } else{
                            ?>
                                <script>
                                    alert_toast("info", "No Data Available Now!!!");
                                </script>
                            <?php
                        } ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('.textarea').summernote();
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
            <?php
        }
        //Subject Section End
          //Edit Subject Section Start
        if($_POST["action"] == "editsubject"){
            // print_r($_POST);exit();
            $subj_id = $_POST["subj_id"];
            $object->sql = "";
            $object->select("tbl_subject");
            $object->where("`subj_id` = '$subj_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button id="backToslider" type="button" class="btn btn-secondary w3-left"><i class="fas fa-angle-double-left"></i> Back</button>
                    </div>
                    <div class="col-md-4 p-4" id="view-div" style="border:2px solid #dddddd;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="callout callout-warning pt-1 pb-1">
                                  <span class="text-lg text-red">Subject</span>
                                  <p><i class="fas fa-angle-double-right"></i> <?php echo $row["subj_name"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="edit-div">
                        <form id="editForm" role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body mt-0 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-red"><b><u>Update Subject</u></b></h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" id="subj_name" name="subj_name" class="form-control" value="<?php echo $row["subj_name"]; ?>" >
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <input type='hidden' name='action' value='editsubject' />
                                <input type='hidden' name='subj_id' value='<?php echo $row["subj_id"]; ?>' />
                                <button type="submit" id="editButton" name="editButton" class="btn btn-success"><span id="editLoader"></span><span id="editText">Save Changes</span></button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#backToslider').click(function() {
                            $("#view-div").hide();
                            $("#edit-div").hide();
                            main("subject");
                            slowInternet();
                        });
                        $('form#editForm').submit(function(event) {
                            event.preventDefault();
                            slowInternet();
                            $('#editText').hide();
                            $('#editLoader').append('<img id = "loading" width="22px" src = "images/ajax-loader.gif" alt="Loading..." />');
                            $('#editButton').prop('disabled', true);
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'include/controller.php',
                                type: 'POST',
                                data: formData,
                                success: function(result) {
                                    $('#response_career_msg').remove();
                                    if(result == "success"){
                                        $('#editForm')[0].reset();
                                     
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
                                            alert_toast("success", "Updated Successfully!!!");
                                            main("subject");
                                            slowInternet();
                                        });
                                    } else {
                                        $('#loading').fadeOut(500, function() {
                                            $(this).remove();
                                            $('#editText').show();
                                            $('#editButton').prop('disabled', false);
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
                <script>
                    $(function() {
                        $('.textarea').summernote();
                        $("#example1").DataTable();
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                        });
                    });
                </script>
                <?php
            } else{
                ?>
                <script>
                    $(document).ready(function() {
                        main("subject");
                        slowInternet();
                        alert_toast("error", "No Exam Data!!!");
                    });
                </script>
                <?php
            }
        }
        //Edit Subject Section End
        //-------------------------------------------------------------------------------------------------------------------
        /* ---------- All Admin(Backend) Codes End ---------- */
    //Action Section End
    }
?>