<?php
// controller 
    //Starting Session
    if(empty(session_start()))
        session_start();
    //Include Object And Class
    require_once('object.php');
    //Data Variable
    $data = array();
    $dataKeys = "";
    $dataValues = "";
    //All Other Data Variables -----------------------------------------
    $ip_address = $_SERVER['REMOTE_ADDR']; //Ip Address
    $random_number = rand(111111,999999); // Random Number
    $visible = md5("visible");
    $trash = md5("trash");
    $imageTypes = array('jpg','png','jpeg','gif');
    $wordTypes = array('doc','docx');
    $pdfTypes = array('pdf');
    $wordAndPdfTypes = array('doc','docx','pdf');
    $excelTypes = array('xls','xlsx');
    // Setting Time Zone in India Standard Timing
    //Confirmation Variable
    $confirmation = 0;
    $allImageConfirmation = 0;
    //Explode Variable
    $explodeVar = array();
    //Implode Variable
    $implodeVar = "";
    $implodeFloorVar = "";
    //Uploaded Variable
    $uploaded = 0;
    date_default_timezone_set("Asia/Calcutta");
    $date_variable_today_month_year_with_timing = date("d M, Y. h:i A");
    if(isset($_SESSION["logger_username"])){
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
    }
    //All File Directries Start
    $image = "../images/slider/";
    $aboutDir = "../images/patron/";
    $teamDir = "../images/team/";
    $messageDir = "../images/message/";
    $galleryDir = "../images/gallery/";
    $classroomDir = "../images/class_room/";
    $computerlabDir = "../images/computer_lab/";
    $laboratoryDir = "../images/laboratory/";
    $libraryDir = "../images/library/";
    $sportsactivityDir = "../images/sport_activity/";
    $academicDir = "../images/academic/";
    $uniformDir = "../images/uniform/";
    $aimDir = "../images/aim/";
    $testimonialDir = "../images/testimonial/";

    $newsDir = "../images/news/";
    $mediaDir = "../images/media/";
    $awardDir = "../images/award/";
    $visionDir = "../images/vision/";
    $missionDir = "../images/mission/";
    //All File Directries End
    if(isset($_POST["action"])){
    //Action Section Start
        /* ---------- All Admin(Backend) Codes Start ---------- */
        //Login Section Start With Ajax
        if($_POST["action"] == "admin_login"){
            $admin_login_username = $_POST["admin_login_username"];
            $admin_login_password = $_POST["admin_login_password"];
            if(!empty($admin_login_username && $admin_login_password)){
                $object->select("tbl_admin");
                $object->where("`admin_username` = '$admin_login_username' && `admin_password` = '".md5($admin_login_password)."' && `status` = '$visible'");
                $result = $object->get();
                if($result->num_rows > 0){
                    $row = $object->get_row();
                    if($row["admin_type"] == "superadmin")
                        $_SESSION["logger_type"] = "admin";
                    else{
                        $_SESSION["logger_type"] = "subadmin";
                        $_SESSION["authority"] = $row["admin_permission"];
                    }
                    $_SESSION["logger_name"] = $row["admin_name"];
                    $_SESSION["logger_username"] = $admin_login_username;
                    $_SESSION["logger_password"] = $admin_login_password;
                    $_SESSION["logger_time"] = time();
                    echo "success";
                }
                else
                    echo "error";
            } else
                echo "empty";
        }
        //Login Section End With Ajax

       //Student Login Section Start With Ajax
        if($_POST["action"] == "student_login"){
             //print_r($_POST);exit();
            $conn = mysqli_connect('localhost', 'nspsjadugora_db', 'TdUE8FLwiC','nspsjadugora_db');
            $student_login_class = $_POST["student_login_class"];
            $student_login_subj = $_POST["student_login_subj"];
            $student_login_username = $_POST["student_login_username"];
            $student_login_password = $_POST["student_login_password"];

            if(!empty($student_login_class && $student_login_username && $student_login_password)){

             $sqlchklog="SELECT * FROM tbl_student where `stud_class` = '$student_login_class' && `stud_userid` = '$student_login_username' && `stud_pass` = '$student_login_password' limit 1";
                $resultlog= mysqli_query($conn, $sqlchklog);
                if (mysqli_num_rows($resultlog) > 0) {
                    $sqlq="SELECT * FROM tbl_exam where `exam_class` = '$student_login_class' && `exam_subj` = '$student_login_subj' && `status`='46cf0e59759c9b7f1112ca4b174343ef' limit 1";
                    // echo $sqlq;exit();
                    $result1 = mysqli_query($conn, $sqlq);
                    if (mysqli_num_rows($result1) > 0) {
                          while($row = mysqli_fetch_assoc($result1)) {
                              $nowdate=date('Y-m-d H:i:s');
                              $startdate=date('Y-m-d H:i:s', strtotime($row['exam_link_starttime']));
                              $enddate=date('Y-m-d H:i:s', strtotime($row['exam_link_endtime']));
                              if($nowdate>=$startdate && $nowdate<=$enddate){
                                 $data['link']= $row["exam_link"];
                                 $data['statu']= "success";
                                     while($rowstud = mysqli_fetch_assoc($resultlog)) {
                                    $log_in_count=intval($rowstud['log_in_count'])+1;
                                    $data['count']= $log_in_count;
                                    }
                                    $sqlupdate="UPDATE tbl_student SET log_in_count = '$log_in_count' WHERE `stud_class` = '$student_login_class' && `stud_userid` = '$student_login_username'";
                                    if(mysqli_query($conn, $sqlupdate)){
                                         $data['update']= 'yes';
                                    }
                                    else{
                                        $data['update']= "no";
                                    }
                              }else{
                                  $data['link']= '';
                                 $data['statu']= "timeout";
                              }
                          }
                    } else {
                      // echo "error1";
                       $data['link']= '';
                        $data['statu']= "nodata";
                    }
                }else{
                // echo "empty";
                   $data['link']= '';
                        $data['statu']= "noaccount";
                    }
                } else{
                        // echo "empty";
                           $data['link']= '';
                                $data['statu']= "empty";
                }
            echo json_encode($data);   
        }
        //Student Login Section End With Ajax
        
        //About Section End ------------------------------------------------------------------------------------------------------------------
        
        
        
        
        
        //Change Email Section Start With Ajax
         if($_POST["action"] == "editChangeEmail"){
            $editChangeEmail = $_POST["editChangeEmail"];
            if(!empty($editChangeEmail)){
                switch($editChangeEmail){
                    case "editChangeEmail":
                    
                        $email = $_POST["email"];
                        $address = $_POST["address"];
                        $phone_no = $_POST["phone_no"];
                        
                        if(!empty($email)){
                            
                            //Checking Image Type End
                            if($confirmation == 0){
                                
                                $data["email"] = $email;
                                $data["address"] = $address;
                                $data["phone_no"] = $phone_no;
                               
                                $data["change_email_added_by"] = $admin_id;
                                $data["change_email_ip"] = $ip_address;
                                $data["change_email_timing"] = $date_variable_today_month_year_with_timing;
                                $data["status"] = $visible;
                                $dataKeys.= "`";
                                $dataValues.= "'";
                                $dataKeys.= implode("` , `", array_keys($data));
                                $dataValues.= implode("' , '", $data);
                                $dataKeys.= "`";
                                $dataValues.= "'";
                                $completeData = "";
                                $explodeKeys = explode(" , ", $dataKeys);
                                $explodeValues = explode(" , ", $dataValues);
                                for($i = 0; $i<count($explodeKeys); $i++){
                                    if($i<count($explodeKeys)-1)
                                        $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                                    else
                                        $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                                }
                                $object->sql = "";
                                $check = $object->update("tbl_change_email", $completeData." WHERE `change_email_id` = '1'");
                                if($check == 1)
                                    echo "success";
                                else
                                    echo $object->con->error;
                            } else
                                echo "empty";
                        } else
                            echo "empty";
                        break;
                    default :
                        echo "error";
                        exit();
                        break;
                }
            }
            else
                echo "error";
        }
        // Email Section End With Ajax
        
        
        
        
        //Our Mission Section Start With Ajax
         if($_POST["action"] == "editMission"){
            $editMission = $_POST["editMission"];
            if(!empty($editMission)){
                switch($editMission){
                    case "mission":
                        $missionId = "1";
                        $mission_title = $_POST["mission_title"];
                        $mission = $_POST["mission_meta_keyword"];
                        $mission_meta_description = $_POST["mission_meta_description"];
                        $missionHeading = $_POST["missionHeading"];
                        $missionImage = $_FILES["missionImage"]["name"];
                          $missionshortDescription = htmlspecialchars($_POST["missionshortDescription"]);
                        $missionDescription = htmlspecialchars($_POST["missionDescription"]);
                        if(!empty($missionHeading && $missionDescription)){
                            $missionArray["page"] = $editMission;
                            $missionArray["heading"] = str_replace("'", "&apos;", $missionHeading);
                            $missionArray["short_description"] = str_replace("'", "&apos;", $missionshortDescription);
                            $missionArray["description"] = str_replace("'", "&apos;", $missionDescription);
                            $object->sql = "";
                            $object->select("tbl_mission");
                            $object->where("`mission_id` = '$missionId' && `status` = '$visible'");
                            $result = $object->get();
                            if($result->num_rows > 0){
                                $row = $object->get_row();
                            }
                            $missionInformations = json_decode($row["mission_information"]);
                            //Checking Image Type Start
                            if(!empty($missionImage)){
                                if(in_array(pathinfo($missionDir.$random_number."mission".$missionImage,PATHINFO_EXTENSION), $imageTypes))
                                    $uploaded = 0;
                                else{
                                    $confirmation = 1;
                                    ?>
                                    <script>
                                        alert_toast("error", "Image should be in .JPG, .JPEG, .PNG and .GIF format only!!!");
                                        $('#missionImage').addClass("is-invalid");
                                    </script>
                                    <?php
                                }
                            }
                            //Checking Image Type End
                            if($confirmation == 0){
                                if($uploaded == 0){
                                    if(!empty($missionImage)){
                                        if(move_uploaded_file($_FILES["missionImage"]["tmp_name"], $missionDir.$random_number."_mission_".$missionImage)){
                                            $missionArray["image"] = $random_number."_mission_".$missionImage;
                                            if(!empty($missionInformations->image))
                                                unlink($missionDir.$missionInformations->image);
                                        } else
                                            $uploaded = 1;
                                    } else{
                                        if(!empty($missionInformations->image))
                                            $missionArray["image"] = $missionInformations->image;
                                        else
                                            $missionArray["image"] = "";
                                    }
                                }
                                $data["mission_title"] = $mission_title;
                                $data["mission_meta_keyword"] = $mission;
                                $data["mission_meta_description"] = $mission_meta_description;
                                $data["mission_information"] = json_encode($missionArray);
                                $data["mission_added_by"] = $admin_id;
                                $data["mission_ip"] = $ip_address;
                                $data["mission_timing"] = $date_variable_today_month_year_with_timing;
                                $data["status"] = $visible;
                                $dataKeys.= "`";
                                $dataValues.= "'";
                                $dataKeys.= implode("` , `", array_keys($data));
                                $dataValues.= implode("' , '", $data);
                                $dataKeys.= "`";
                                $dataValues.= "'";
                                $completeData = "";
                                $explodeKeys = explode(" , ", $dataKeys);
                                $explodeValues = explode(" , ", $dataValues);
                                for($i = 0; $i<count($explodeKeys); $i++){
                                    if($i<count($explodeKeys)-1)
                                        $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                                    else
                                        $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                                }
                                $object->sql = "";
                                $check = $object->update("tbl_mission", $completeData." WHERE `mission_id` = '$missionId'");
                                if($check == 1)
                                    echo "success";
                                else
                                    echo $object->con->error;
                            } else
                                echo "empty";
                        } else
                            echo "empty";
                        break;
                    case "services":
                        $aboutId = "2";
                        break;
                    case "director-message":
                        $aboutId = "3";
                        break;
                    case "team-message":
                        $aboutId = "4";
                        break;
                    case "mission-vision":
                        $aboutId = "5";
                        break;
                    default :
                        echo "error";
                        exit();
                        break;
                }
            }
            else
                echo "error";
        }
        //Our Mission Section End With Ajax
        
        //Add Aims & Objective  Section Start With Ajax
        if($_POST["action"] == "aim"){
            $aim_title = $_POST["aim_title"]; //Required Fields
            $aim_meta_keyword = $_POST["aim_meta_keyword"]; //Required Fields
            $aim_meta_description = $_POST["aim_meta_description"]; //Required Fields
            $aim_heading = $_POST["aim_heading"]; //Required Fields
            $aim_description = $_POST["aim_description"];
             $aim_short_description = $_POST["aim_short_description"];
            //File Section Start
            $aim_image = $_FILES["aim_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($aim_description)){
                //Checking Header Image Type Start
                if(!empty($aim_image)){
                    if(in_array(pathinfo($aimDir."phase_".$random_number."_header_".$aim_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#aim_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End

                if($confirmation == 0){
                    if($uploaded == 0){                     
                        if(!empty($aim_image)){
                            if(move_uploaded_file($_FILES["aim_image"]["tmp_name"], $aimDir."phase_".$random_number."_header_".$aim_image))
                                $data["aim_image"] = "phase_".$random_number."_header_".$aim_image;
                            else
                                $uploaded = 1;
                        }

                    }
                    $data["aim_title"] = str_replace("'", "&apos;", $aim_title);
                    $data["aim_meta_keyword"] = str_replace("'", "&apos;", $aim_meta_keyword);
                    $data["aim_meta_description"] = str_replace("'", "&apos;", $aim_meta_description);
                    $data["aim_heading"] = str_replace("'", "&apos;", $aim_heading);
                    $data["aim_description"] = str_replace("'", "&apos;", $aim_description);
                    $data["aim_short_description"] = str_replace("'", "&apos;", $aim_short_description);

                    $data["aim_added_by"] = $admin_id;
                    $data["aim_ip"] = $ip_address;
                    $data["aim_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_aims", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Aims & Objective Section End With Ajax
        
        
        
        
        //Edit Aims & Objective  Section Start With Ajax
        if($_POST["action"] == "editaim"){
            $aimId = $_POST["aim_id"];
            $object->sql = "";
            $object->select("tbl_aims");
            $object->where("`aim_id` = '$aimId' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $aim_title = $_POST["aim_title"]; //Required Fields
                $aim_meta_keyword = $_POST["aim_meta_keyword"]; //Required Fields
                $aim_meta_description = $_POST["aim_meta_description"]; //Required Fields
                $aim_heading = $_POST["aim_heading"]; //Required Fields
                $aim_description = $_POST["aim_description"];

                //File Section Start
                $aim_image = $_FILES["aim_image"]["name"];
                //File Section End

                if(!empty($aim_description)){
                    //Checking Header Image Type Start
                    if(!empty($aim_image)){
                        if(in_array(pathinfo($aimDir."phase_".$random_number."_header_".$aim_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#aim_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End

                    //Checking ApplicationForm Type End
                    if($confirmation == 0){
                        if($uploaded == 0){                     
                            if(!empty($aim_image)){
                                if(move_uploaded_file($_FILES["aim_image"]["tmp_name"], $aimDir."phase_".$random_number."_header_".$aim_image)){
                                    $data["aim_image"] = "phase_".$random_number."_header_".$aim_image;
                                    if(!empty($row["aim_image"]))
                                        unlink($aimDir.$row["aim_image"]);
                                } else
                                    $uploaded = 1;
                            }

                        }
                        $data["aim_title"] = str_replace("'", "&apos;", $aim_title);
                        $data["aim_meta_keyword"] = str_replace("'", "&apos;", $aim_meta_keyword);
                        $data["aim_meta_description"] = str_replace("'", "&apos;", $aim_meta_description);
                        $data["aim_heading"] = str_replace("'", "&apos;", $aim_heading);
                        $data["aim_description"] = str_replace("'", "&apos;", $aim_description);
                        $data["aim_added_by"] = $admin_id;
                        $data["aim_ip"] = $ip_address;
                        $data["aim_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_aims", $completeData." WHERE `aim_id` = '$aimId'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
                } else
                    echo "empty";
            } else
                echo "error";
        }
        //Edit Aims & Objective Section End With Ajax
        
        
        
        
        
        //Add Uniform Start With Ajax
        if($_POST["action"] == "uniform"){
            $uniform_title = $_POST["uniform_title"]; //Required Fields
            $uniform_meta_keyword = $_POST["uniform_meta_keyword"]; //Required Fields
            $uniform_meta_description = $_POST["uniform_meta_description"]; //Required Fields
            $uniform_heading = $_POST["uniform_heading"]; //Required Fields
            $uniform_description = $_POST["uniform_description"];
            
            //File Section Start
            $academic_image = $_FILES["uniform_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($uniform_description && $uniform_heading)){
                //Checking Header Image Type Start
                if(!empty($uniform_image)){
                    if(in_array(pathinfo($uniformDir."phase_".$random_number."_header_".$uniform_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#uniform_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End

                if($confirmation == 0){
                    if($uploaded == 0){                     
                        if(!empty($academic_image)){
                            if(move_uploaded_file($_FILES["uniform_image"]["tmp_name"], $uniformDir."phase_".$random_number."_header_".$uniform_image))
                                $data["uniform_image"] = "phase_".$random_number."_header_".$uniform_image;
                            else
                                $uploaded = 1;
                        }

                    }
                    $data["uniform_title"] = str_replace("'", "&apos;", $uniform_title);
                    $data["uniform_meta_keyword"] = str_replace("'", "&apos;", $uniform_meta_keyword);
                    $data["uniform_meta_description"] = str_replace("'", "&apos;", $uniform_meta_description);
                    $data["uniform_heading"] = str_replace("'", "&apos;", $uniform_heading);
                    $data["uniform_description"] = str_replace("'", "&apos;", $uniform_description);
                    $data["uniform_added_by"] = $admin_id;
                    $data["uniform_ip"] = $ip_address;
                    $data["uniform_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_uniform", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add  Uniform Section End With Ajax
        
        
        
        //Edit Uniform  Section Start With Ajax
        if($_POST["action"] == "edituniform"){
            $uniform_id = $_POST["uniform_id"];
            $object->sql = "";
            $object->select("tbl_uniform");
            $object->where("`uniform_id` = '$uniform_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $uniform_title = $_POST["uniform_title"]; //Required Fields
                $uniform_meta_keyword = $_POST["uniform_meta_keyword"]; //Required Fields
                $uniform_meta_description = $_POST["uniform_meta_description"]; //Required Fields
                $uniform_heading = $_POST["uniform_heading"]; //Required Fields
                $uniform_description = $_POST["uniform_description"];

                //File Section Start
                $uniform_image = $_FILES["uniform_image"]["name"];
                //File Section End

                if(!empty($uniform_description && $uniform_heading)){
                    //Checking Header Image Type Start
                    if(!empty($uniform_image)){
                        if(in_array(pathinfo($uniformDir."phase_".$random_number."_header_".$uniform_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#uniform_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End

                    //Checking ApplicationForm Type End
                    if($confirmation == 0){
                        if($uploaded == 0){                     
                            if(!empty($uniform_image)){
                                if(move_uploaded_file($_FILES["uniform_image"]["tmp_name"], $uniformDir."phase_".$random_number."_header_".$uniform_image)){
                                    $data["uniform_image"] = "phase_".$random_number."_header_".$uniform_image;
                                    if(!empty($row["uniform_image"]))
                                        unlink($uniformDir.$row["uniform_image"]);
                                } else
                                    $uploaded = 1;
                            }

                        }
                        $data["uniform_title"] = str_replace("'", "&apos;", $uniform_title);
                        $data["uniform_meta_keyword"] = str_replace("'", "&apos;", $uniform_meta_keyword);
                        $data["uniform_meta_description"] = str_replace("'", "&apos;", $uniform_meta_description);
                        $data["uniform_heading"] = str_replace("'", "&apos;", $uniform_heading);
                        $data["uniform_description"] = str_replace("'", "&apos;", $academic_description);
                        $data["uniform_added_by"] = $admin_id;
                        $data["uniform_ip"] = $ip_address;
                        $data["uniform_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_uniform", $completeData." WHERE `uniform_id` = '$uniform_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
                } else
                    echo "empty";
            } else
                echo "error";
        }
        //Edit Uniform Section End With Ajax
        
        
        
        
        //Add  Admission Section Start With Ajax
        if($_POST["action"] == "admission"){
            $admission_title = $_POST["admission_title"]; //Required Fields
            $admission_meta_description = $_POST["admission_meta_description"]; //Required Fields
            $admission_meta_keyword = $_POST["admission_meta_keyword"]; //Required Fields
            $admission_description = $_POST["admission_description"];
            //File Section Start
           // $library_image = $_FILES["library_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($admission_description)){

                //Checking Image Type Start
                
                //Checking Image Type End
                //if($confirmation == 0){
                    
                    $data["admission_title"] = str_replace("'", "&apos;", $admission_title);        
                    $data["admission_meta_description"] = str_replace("'", "&apos;", $admission_meta_description);      
                    $data["admission_meta_keyword"] = str_replace("'", "&apos;", $admission_meta_keyword);
                    $data["admission_description"] = str_replace("'", "&apos;", $admission_description);                            
                    $data["admission_added_by"] = $admin_id;
                    $data["admission_ip"] = $ip_address;
                    $data["admission_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_admission", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                //}
            } else
                echo "empty";
        }
        //Add Admission Section End With 
        
        
        
        //Edit Admission Section Start With Ajax
        if($_POST["action"] == "editAdmission"){
            $admission_id = $_POST["admission_id"];
            $object->sql = "";
            $object->select("tbl_admission");
            $object->where("`admission_id` = '$admission_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $admission_title = $_POST["admission_title"]; //Required Fields
                $admission_meta_description = $_POST["admission_meta_description"]; //Required Fields
                $admission_meta_keyword = $_POST["admission_meta_keyword"]; //Required Fields
                $admission_description = $_POST["admission_description"]; //Required Fields
                //File Section Start
                //$library_image = $_FILES["library_image"]["name"];
                //File Section End
                  //Checking Image Type Start
                    
                    //Checking Header Image Type End
                    //if($confirmation == 0){
                        
                        $data["admission_title"] = str_replace("'", "&apos;", $admission_title);                
                        $data["admission_meta_description"] = str_replace("'", "&apos;", $admission_meta_description);                
                        $data["admission_meta_keyword"] = str_replace("'", "&apos;", $admission_meta_keyword);                              
                        $data["admission_added_by"] = $admin_id;
                        $data["admission_ip"] = $ip_address;
                        $data["admission_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_admission", $completeData." WHERE `admission_id` = '$admission_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    //}
            } else
                echo "error";
        }
        //Edit Admission Section End With Ajax
        
        
        
        //About JNFF Section Start With Ajax
         if($_POST["action"] == "editAboutUs"){
            $editAboutUs = $_POST["editAboutUs"];
            if(!empty($editAboutUs)){
                switch($editAboutUs){
                    case "about-us":
                        $aboutId = "1";
                        $about_title = $_POST["about_title"];
                        $about_meta_keyword = $_POST["about_meta_keyword"];
                        $about_meta_description = $_POST["about_meta_description"];
                        $aboutHeading = $_POST["aboutHeading"];
                        $aboutImage = $_FILES["aboutImage"]["name"];
                         $aboutshortDescription = htmlspecialchars($_POST["aboutshortDescription"]);
                        $aboutDescription = htmlspecialchars($_POST["aboutDescription"]);
                        if(!empty($aboutHeading && $aboutDescription)){
                            $aboutArray["page"] = $editAboutUs;
                            $aboutArray["heading"] = str_replace("'", "&apos;", $aboutHeading);
                            $aboutArray["short_description"] = str_replace("'", "&apos;", $aboutshortDescription);
                            $aboutArray["description"] = str_replace("'", "&apos;", $aboutDescription);
                            $object->sql = "";
                            $object->select("tbl_about");
                            $object->where("`about_id` = '$aboutId' && `status` = '$visible'");
                            $result = $object->get();
                            if($result->num_rows > 0){
                                $row = $object->get_row();
                            }
                            $aboutInformations = json_decode($row["about_information"]);
                            //Checking Image Type Start
                            if(!empty($aboutImage)){
                                if(in_array(pathinfo($aboutDir.$random_number."_about_us_".$aboutImage,PATHINFO_EXTENSION), $imageTypes))
                                    $uploaded = 0;
                                else{
                                    $confirmation = 1;
                                    ?>
                                    <script>
                                        alert_toast("error", "Image should be in .JPG, .JPEG, .PNG and .GIF format only!!!");
                                        $('#aboutImage').addClass("is-invalid");
                                    </script>
                                    <?php
                                }
                            }
                            //Checking Image Type End
                            if($confirmation == 0){
                                if($uploaded == 0){
                                    if(!empty($aboutImage)){
                                        if(move_uploaded_file($_FILES["aboutImage"]["tmp_name"], $aboutDir.$random_number."_about_us_".$aboutImage)){
                                            $aboutArray["image"] = $random_number."_about_us_".$aboutImage;
                                            if(!empty($aboutInformations->image))
                                                unlink($aboutDir.$aboutInformations->image);
                                        } else
                                            $uploaded = 1;
                                    } else{
                                        if(!empty($aboutInformations->image))
                                            $aboutArray["image"] = $aboutInformations->image;
                                        else
                                            $aboutArray["image"] = "";
                                    }
                                }
                                $data["about_title"] = $about_title;
                                $data["about_meta_keyword"] = $about_meta_keyword;
                                $data["about_meta_description"] = $about_meta_description;
                                $data["about_information"] = json_encode($aboutArray);
                                $data["about_added_by"] = $admin_id;
                                $data["about_ip"] = $ip_address;
                                $data["about_timing"] = $date_variable_today_month_year_with_timing;
                                $data["status"] = $visible;
                                $dataKeys.= "`";
                                $dataValues.= "'";
                                $dataKeys.= implode("` , `", array_keys($data));
                                $dataValues.= implode("' , '", $data);
                                $dataKeys.= "`";
                                $dataValues.= "'";
                                $completeData = "";
                                $explodeKeys = explode(" , ", $dataKeys);
                                $explodeValues = explode(" , ", $dataValues);
                                for($i = 0; $i<count($explodeKeys); $i++){
                                    if($i<count($explodeKeys)-1)
                                        $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                                    else
                                        $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                                }
                                $object->sql = "";
                                $check = $object->update("tbl_about", $completeData." WHERE `about_id` = '$aboutId'");
                                if($check == 1)
                                    echo "success";
                                else
                                    echo $object->con->error;
                            } else
                                echo "empty";
                        } else
                            echo "empty";
                        break;
                    case "services":
                        $aboutId = "2";
                        break;
                    case "director-message":
                        $aboutId = "3";
                        break;
                    case "team-message":
                        $aboutId = "4";
                        break;
                    case "mission-vision":
                        $aboutId = "5";
                        break;
                    default :
                        echo "error";
                        exit();
                        break;
                }
            }
            else
                echo "error";
        }
        //About JNFF Section End With Ajax
        //Our Vision Start With Ajax
        if($_POST["action"] == "editVision"){
            $editVision = $_POST["editVision"];
            if(!empty($editVision)){
                switch($editVision){
                    case "vision":
                        $visionId = "1";
                        $vision_title = $_POST["vision_title"];
                        $vision_meta_keyword = $_POST["vision_meta_keyword"];
                        $vision_meta_description = $_POST["vision_meta_description"];
                        $visionHeading = $_POST["visionHeading"];
                        $visionImage = $_FILES["visionImage"]["name"];
                       $visionshortDescription = htmlspecialchars($_POST["visionshortDescription"]);
                        $visionDescription = htmlspecialchars($_POST["visionDescription"]);
                        if(!empty($visionHeading && $visionDescription)){
                            $visionArray["page"] = $editVision;
                            $visionArray["heading"] = str_replace("'", "&apos;", $visionHeading);
                            $visionArray["short_description"] = str_replace("'", "&apos;", $visionshortDescription);
                            $visionArray["description"] = str_replace("'", "&apos;", $visionDescription);
                            $object->sql = "";
                            $object->select("tbl_vision");
                            $object->where("`vision_id` = '$visionId' && `status` = '$visible'");
                            $result = $object->get();
                            if($result->num_rows > 0){
                                $row = $object->get_row();
                            }
                            $visionInformations = json_decode($row["vision_information"]);
                            //Checking Image Type Start
                            if(!empty($visionImage)){
                                if(in_array(pathinfo($visionDir.$random_number."_vision_".$visionImage,PATHINFO_EXTENSION), $imageTypes))
                                    $uploaded = 0;
                                else{
                                    $confirmation = 1;
                                    ?>
                                    <script>
                                        alert_toast("error", "Image should be in .JPG, .JPEG, .PNG and .GIF format only!!!");
                                        $('#visionImage').addClass("is-invalid");
                                    </script>
                                    <?php
                                }
                            }
                            //Checking Image Type End
                            if($confirmation == 0){
                                if($uploaded == 0){
                                    if(!empty($visionImage)){
                                        if(move_uploaded_file($_FILES["visionImage"]["tmp_name"], $visionDir.$random_number."_vision_".$visionImage)){
                                            $visionArray["image"] = $random_number."_vision_".$visionImage;
                                            if(!empty($visionInformations->image))
                                                unlink($visionDir.$visionInformations->image);
                                        } else
                                            $uploaded = 1;
                                    } else{
                                        if(!empty($visionInformations->image))
                                            $visionArray["image"] = $visionInformations->image;
                                        else
                                            $visionArray["image"] = "";
                                    }
                                }
                                $data["vision_title"] = $vision_title;
                                $data["vision_meta_keyword"] = $vision_meta_keyword;
                                $data["vision_meta_description"] = $vision_meta_description;
                                $data["vision_information"] = json_encode($visionArray);
                                $data["vision_added_by"] = $admin_id;
                                $data["vision_ip"] = $ip_address;
                                $data["vision_timing"] = $date_variable_today_month_year_with_timing;
                                $data["status"] = $visible;
                                $dataKeys.= "`";
                                $dataValues.= "'";
                                $dataKeys.= implode("` , `", array_keys($data));
                                $dataValues.= implode("' , '", $data);
                                $dataKeys.= "`";
                                $dataValues.= "'";
                                $completeData = "";
                                $explodeKeys = explode(" , ", $dataKeys);
                                $explodeValues = explode(" , ", $dataValues);
                                for($i = 0; $i<count($explodeKeys); $i++){
                                    if($i<count($explodeKeys)-1)
                                        $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                                    else
                                        $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                                }
                                $object->sql = "";
                                $check = $object->update("tbl_vision", $completeData." WHERE `vision_id` = '$visionId'");
                                if($check == 1)
                                    echo "success";
                                else
                                    echo $object->con->error;
                            } else
                                echo "empty";
                        } else
                            echo "empty";
                        break;
                    case "services":
                        $aboutId = "2";
                        break;
                    case "director-message":
                        $aboutId = "3";
                        break;
                    case "team-message":
                        $aboutId = "4";
                        break;
                    case "mission-vision":
                        $aboutId = "5";
                        break;
                    default :
                        echo "error";
                        exit();
                        break;
                }
            }
            else
                echo "error";
        }
        // Vision End With Ajax      
        //About Section End ------------------------------------------------------------------------------------------------------------------
       //All Trash Section Start With Ajax
        if($_POST["action"] == "deleteRow"){
            $tblName = $_POST["tblName"];
            $deleteId = $_POST["deleteId"];
            if($tblName == "tbl_designation")
                $idCol = "designation_id";
            if($tblName == "tbl_slider")
                $idCol = "slider_id";
            if($tblName == "tbl_gallery")
                $idCol = "gallery_id";
            if($tblName == "tbl_news")
                $idCol = "news_id";
            if($tblName == "tbl_staff")
                $idCol = "staff_id";
            if($tblName == "tbl_library")
                $idCol = "library_id";
            if($tblName == "tbl_class_room")
                $idCol = "class_room_id";
            if($tblName == "tbl_computer_lab")
                $idCol = "computer_lab_id";
                if($tblName == "tbl_uniform")
                $idCol = "uniform_id"; 
                
               if($tblName == "tbl_aim")
                $idCol = "aim_id"; 
                if($tblName == "tbl_testimonial")
                $idCol = "testimonial_id";
                
            if($tblName == "tbl_laboratory")
                $idCol = "laboratory_id";
            if($tblName == "tbl_sports_activities")
                $idCol = "sport_activity_id";
                if($tblName == "tbl_admission")
                $idCol = "admission_id";
            if($tblName == "tbl_academic")
                $idCol = "academic_id";
            if($tblName == "tbl_secretary_desk")
                $idCol = "secretary_id";
            if($tblName == "tbl_principal_desk")
                $idCol = "principal_id";
                
            if($tblName == "tbl_year")
                $idCol = "year_id";
            
             if($tblName == "tbl_exam")
                $idCol = "exam_id";

            if($tblName == "tbl_subject")
                $idCol = "subj_id";
                
            if($tblName == "tbl_enquiry")
                $idCol = "id";
        
            if(!empty($tblName && $deleteId)){
                $object->sql = "";
                $check = $object->update("$tblName", "`status` = '".$trash."' WHERE `".$idCol."` = '".$deleteId."'");
                if($check == 1)
                    echo "success";
                else
                    echo "error";
            } else
                echo "error";
        }
        //All Trash Section End With Ajax
        
        //Add slider Section Start With Ajax
        if($_POST["action"] == "slider"){
            $slider_name = $_POST["slider_name"]; //Required Fields
            //File Section Start
            $slider_image = $_FILES["slider_image"]["name"]; //Required Fields
            //File Section End
            $slider_description = $_POST["slider_description"]; //Required Fields
            if(!empty($slider_image )){

                //Checking Header Image Type Start
                if(!empty($slider_image)){
                    if(in_array(pathinfo($image.$random_number."_header_".$slider_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#slider_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End
                if($confirmation == 0){
                    if($uploaded == 0){
                        if(!empty($slider_image)){
                            if(move_uploaded_file($_FILES["slider_image"]["tmp_name"], $image.$random_number."_header_".$slider_image))
                                $data["slider_image"] = $random_number."_header_".$slider_image;
                            else
                                $uploaded = 1;
                        }
                    }
                    $data["slider_name"] = str_replace("'", "&apos;", $slider_name);
                    $data["slider_description"] = str_replace("'", "&apos;", $slider_description);
                    $data["slider_added_by"] = $admin_id;
                    $data["slider_ip"] = $ip_address;
                    $data["slider_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_slider", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add slider Section End With Ajax
        //Edit slider Section Start With Ajax
        if($_POST["action"] == "editslider"){
            $slider_id = $_POST["slider_id"];
            $object->sql = "";
            $object->select("tbl_slider");
            $object->where("`slider_id` = '$slider_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $slider_name = $_POST["slider_name"]; //Required Fields
                //File Section Start
                $slider_image = $_FILES["slider_image"]["name"]; //Required Fields
                //File Section End
                $slider_description = $_POST["slider_description"]; //Required Fields
                
                    //Checking Header Image Type Start
                    //Checking Image Type Start
                    if(!empty($slider_image)){
                        if(in_array(pathinfo($image."phase_".$random_number."_header_".$slider_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#slider_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End
                    if($confirmation == 0){
                        if($uploaded == 0){
                      if(!empty($slider_image)){
                            if(move_uploaded_file($_FILES["slider_image"]["tmp_name"], $image.$random_number."_header_".$slider_image))
                                $data["slider_image"] = $random_number."_header_".$slider_image;
                            else
                                $uploaded = 1;
                        }
                        }
                        $data["slider_name"] = str_replace("'", "&apos;", $slider_name);
                        $data["slider_description"] = str_replace("'", "&apos;", $slider_description);
                        $data["slider_added_by"] = $admin_id;
                        $data["slider_ip"] = $ip_address;
                        $data["slider_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_slider", $completeData." WHERE `slider_id` = '$slider_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";
                    }
            } else
                echo "error";
        }
        //Edit slider Section End With Ajax
        
         //Add exam Section Start With Ajax
        if($_POST["action"] == "exam"){
            $exam_class = $_POST["exam_class"]; //Required Fields
            $exam_subj = $_POST["exam_subj"]; //Required Fields
            $exam_link = $_POST["exam_link"]; //Required Fields
            $exam_link_starttime = date('Y-m-d H:i:s', strtotime($_POST["exam_link_starttime"])); //Required Fields
            $exam_link_endtime = date('Y-m-d H:i:s', strtotime($_POST["exam_link_endtime"])); //Required Fields
                $object->sql = "";
                $object->select("tbl_exam");
                $object->where("`exam_subj` = '$exam_subj' && `exam_class` = '$exam_class' && `status` = '$visible'");
                $result = $object->get();
                 if($result->num_rows == 0){
                    if(!empty($exam_class) && !empty($exam_link)){
                        if($confirmation == 0){
                            $data["exam_class"] = $exam_class;
                            $data["exam_link"] = $exam_link;
                            $data["exam_link_starttime"] = $exam_link_starttime;
                            $data["exam_link_endtime"] = $exam_link_endtime;
                            $data["exam_subj"] = $exam_subj;
                            $data["exam_added_by"] = $admin_id;
                            $data["exam_ip"] = $ip_address;
                            $data["exam_timing"] = $date_variable_today_month_year_with_timing;
                            $data["status"] = $visible;
                            $dataKeys.= "`";
                            $dataValues.= "'";
                            $dataKeys.= implode("` , `", array_keys($data));
                            $dataValues.= implode("' , '", $data);
                            $dataKeys.= "`";
                            $dataValues.= "'";
                            $object->sql = "";
                            $check = $object->insert("tbl_exam", "(".$dataKeys.") VALUES (".$dataValues.")");
                            if($check == 1)
                                echo "success";
                            else
                                echo "error";
                        }
                    }else{
                     echo "empty";
                 }
            }else{
                echo "datapresent";
            }
        }
        //Add exam Section End With Ajax
        

        //Edit Exam Section Start With Ajax
        if($_POST["action"] == "editexam"){
             $exam_id = $_POST["exam_id"];
            $object->sql = "";
            $object->select("tbl_exam");
            $object->where("`exam_id` = '$exam_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $exam_class = $_POST["exam_class"]; //Required Fields
                $exam_link = $_POST["exam_link"]; //Required Fields          
                $exam_subj = $_POST["exam_subj"]; //Required Fields          
                $exam_link_starttime = $_POST["exam_link_starttime"]; //Required Fields          
                $exam_link_endtime = $_POST["exam_link_endtime"]; //Required Fields          
                    if($confirmation == 0){
                        $data["exam_class"] = $exam_class;
                        $data["exam_link"] = $exam_link;
                        $data["exam_subj"] = $exam_subj;
                        $data["exam_link_starttime"] = $exam_link_starttime;
                        $data["exam_link_endtime"] = $exam_link_endtime;
                        $data["exam_added_by"] = $admin_id;
                        $data["exam_ip"] = $ip_address;
                        $data["exam_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_exam", $completeData." WHERE `exam_id` = '$exam_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit Exam Section End With Ajax
        
          //Import exam Section Start With Ajax
        if($_POST["action"] == "importexam"){
            print_r($_FILES);
            // $conn = mysqli_connect('localhost', 'nspsjadugora_db', 'TdUE8FLwiC','nspsjadugora_db');
            // if(isset($_FILES["examExcel"]["name"]))
            //     {
            //         $cou=0;
            //         $path = $_FILES["examExcel"]["tmp_name"];
            //         $object = PHPExcel_IOFactory::load($path);
            //         foreach($object->getWorksheetIterator() as $worksheet)
            //         {
            //             $highestRow = $worksheet->getHighestRow();
            //             $highestColumn = $worksheet->getHighestColumn();
            //             for($row=2; $row<=$highestRow; $row++)
            //             {
            //                 $stud_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
            //                 $stud_roll = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
            //                 $stud_class = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
            //                 $query = "INSERT INTO tbl_student(stud_name,stud_roll,stud_class) VALUES ('".$stud_name."', '".$stud_roll."', '".$stud_class."')";
            //                 $insert1=mysqli_query($conn, $query);
            //                 if($insert1){
            //                     $cou++;
            //                 }
            //             }
                       
            //         }
            //             if($highestRow>0){
            //                     echo "success";
            //             }else{
            //                 echo "error";
            //             }                            
            //     } else
            //     echo "empty";
        }
        //Import exam Section End With Ajax
        
        
        //Add Testimonial  Section Start With Ajax
        if($_POST["action"] == "addTestimonial"){
            $testimonial_title = $_POST["testimonial_title"]; //Required Fields
            $testimonial_meta_keyword = $_POST["testimonial_meta_keyword"]; //Required Fields
            $testimonial_meta_description = $_POST["testimonial_meta_description"]; //Required Fields
            $testimonial_name = $_POST["testimonial_name"]; //Required Fields
            $testimonial_description = $_POST["testimonial_description"];
            //File Section Start
            $testimonial_image = $_FILES["testimonial_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($testimonial_name)){
                //Checking Header Image Type Start
                if(!empty($testimonial_image)){
                    if(in_array(pathinfo($testimonialDir."phase_".$random_number."_header_".$testimonial_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#testimonial_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End

                if($confirmation == 0){
                    if($uploaded == 0){                     
                        if(!empty($testimonial_image)){
                            if(move_uploaded_file($_FILES["testimonial_image"]["tmp_name"], $testimonialDir."phase_".$random_number."_header_".$testimonial_image))
                                $data["testimonial_image"] = "phase_".$random_number."_header_".$testimonial_image;
                            else
                                $uploaded = 1;
                        }

                    }
                    $data["testimonial_title"] = str_replace("'", "&apos;", $testimonial_title);
                    $data["testimonial_meta_keyword"] = str_replace("'", "&apos;", $testimonial_meta_keyword);
                    $data["testimonial_meta_description"] = str_replace("'", "&apos;", $testimonial_meta_description);
                    $data["testimonial_name"] = str_replace("'", "&apos;", $testimonial_name);
                    $data["testimonial_description"]=str_replace("'", "&apos;", $testimonial_description);
                    $data["testimonial_added_by"] = $admin_id;
                    $data["testimonial_ip"] = $ip_address;
                    $data["testimonial_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_testimonial", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Testimonial Section End With Ajax
        
        
        
        
        
        //Edit Testimonial  Section Start With Ajax
        if($_POST["action"] == "edittestimonial"){
            $testimonialId = $_POST["edittestimonialId"];
            $object->sql = "";
            $object->select("tbl_testimonial");
            $object->where("`testimonial_id` = '$testimonialId' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                 $testimonial_title = $_POST["testimonial_title"]; //Required Fields
                $testimonial_meta_keyword = $_POST["testimonial_meta_keyword"]; //Required Fields
                $testimonial_meta_description = $_POST["testimonial_meta_description"]; //Required Fields
                
                $testimonial_name = $_POST["testimonial_name"]; //Required Fields
                $testimonial_description = $_POST["testimonial_description"];

                //File Section Start
                $testimonial_image = $_FILES["testimonial_image"]["name"];
                //File Section End

                if(!empty($testimonial_description && $testimonial_image)){
                    //Checking Header Image Type Start
                    if(!empty($testimonial_image)){
                        if(in_array(pathinfo($testimonialDir."phase_".$random_number."_header_".$testimonial_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#testimonial_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End

                    //Checking ApplicationForm Type End
                    if($confirmation == 0){
                        if($uploaded == 0){                     
                            if(!empty($testimonial_image)){
                                if(move_uploaded_file($_FILES["testimonial_image"]["tmp_name"], $testimonialDir."phase_".$random_number."_header_".$testimonial_image)){
                                    $data["testimonial_image"] = "phase_".$random_number."_header_".$testimonial_image;
                                    if(!empty($row["testimonial_image"]))
                                        unlink($testimonialDir.$row["testimonial_image"]);
                                } else
                                    $uploaded = 1;
                            }

                        }
                        $data["testimonial_title"] = str_replace("'", "&apos;", $testimonial_title);
                        $data["testimonial_meta_keyword"] = str_replace("'", "&apos;", $testimonial_meta_keyword);
                        $data["testimonial_meta_description"] = str_replace("'", "&apos;", $testimonial_meta_description);
                        $data["testimonial_name"] = str_replace("'", "&apos;", $testimonial_name);
                        $data["testimonial_description"] = str_replace("'", "&apos;", $testimonial_designation);
                        $data["testimonial_added_by"] = $admin_id;
                        $data["testimonial_ip"] = $ip_address;
                        $data["testimonial_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_testimonial", $completeData." WHERE `testimonial_id` = '$testimonialId'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
                } else
                    echo "empty";
            } else
                echo "error";
        }
        //Edit Testimonial  Section End With Ajax
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        //Add Computer Lab Section Start With Ajax
        if($_POST["action"] == "computer_lab"){
            $computer_lab_title = $_POST["computer_lab_title"]; //Required Fields
            $computer_lab_meta_description = $_POST["computer_lab_meta_description"]; //Required Fields
            $computer_lab_meta_keyword = $_POST["computer_lab_meta_keyword"]; //Required Fields
            //File Section Start
            $computer_lab_image = $_FILES["computer_lab_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($computer_lab_image )){

                //Checking Image Type Start
                if(!empty($computer_lab_image)){
                    if(in_array(pathinfo($computerlabDir.$random_number."_header_".$computer_lab_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#computer_lab_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Image Type End
                if($confirmation == 0){
                    if($uploaded == 0){
                        if(!empty($computer_lab_image)){
                            if(move_uploaded_file($_FILES["computer_lab_image"]["tmp_name"], $computerlabDir.$random_number."_header_".$computer_lab_image))
                                $data["computer_lab_image"] = $random_number."_header_".$computer_lab_image;
                            else
                                $uploaded = 1;
                        }
                    }
                    $data["computer_lab_title"] = str_replace("'", "&apos;", $computer_lab_title);      
                    $data["computer_lab_meta_description"] = str_replace("'", "&apos;", $computer_lab_meta_description);        
                    $data["computer_lab_meta_keyword"] = str_replace("'", "&apos;", $computer_lab_meta_keyword);            
                    $data["computer_lab_added_by"] = $admin_id;
                    $data["computer_lab_ip"] = $ip_address;
                    $data["computer_lab_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_computer_lab", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Computer Lab Section End With 
        
        //Edit Computer Lab Section Start With Ajax
        if($_POST["action"] == "editComputerlab"){
            $computer_lab_id = $_POST["computer_lab_id"];
            $object->sql = "";
            $object->select("tbl_computer_lab");
            $object->where("`computer_lab_id` = '$computer_lab_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $computer_lab_title = $_POST["computer_lab_title"]; //Required Fields
                $computer_lab_meta_description = $_POST["computer_lab_meta_description"]; //Required Fields
                $computer_lab_meta_keyword = $_POST["computer_lab_meta_keyword"]; //Required Fields
                //File Section Start
                $computer_lab_image = $_FILES["computer_lab_image"]["name"];
                //File Section End
                  //Checking Image Type Start
                    if(!empty($computer_lab_image)){
                        if(in_array(pathinfo($computerlabDir."phase_".$random_number."_header_".$computer_lab_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#computer_lab_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End
                    if($confirmation == 0){
                        if($uploaded == 0){
                            if(!empty($computer_lab_image)){
                                if(move_uploaded_file($_FILES["computer_lab_image"]["tmp_name"], $computerlabDir."phase_".$random_number."_header_".$computer_lab_image)){
                                    $data["computer_lab_image"] = "phase_".$random_number."_header_".$computer_lab_image;
                                    if(!empty($row["computer_lab_image"]))
                                        unlink($computerlabDir.$row["computer_lab_image"]);
                                } else
                                    $uploaded = 1;
                            }
                        }
                        $data["computer_lab_title"] = str_replace("'", "&apos;", $computer_lab_title);                
                        $data["computer_lab_meta_description"] = str_replace("'", "&apos;", $computer_lab_meta_description);                
                        $data["computer_lab_meta_keyword"] = str_replace("'", "&apos;", $computer_lab_meta_keyword);                              
                        $data["computer_lab_added_by"] = $admin_id;
                        $data["computer_lab_ip"] = $ip_address;
                        $data["computer_lab_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_computer_lab", $completeData." WHERE `computer_lab_id` = '$computer_lab_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit Computer Lab Section End With Ajax
        
        
        
        
        //Add  Library Section Start With Ajax
        if($_POST["action"] == "library"){
            $library_title = $_POST["library_title"]; //Required Fields
            $library_meta_description = $_POST["library_meta_description"]; //Required Fields
            $library_meta_keyword = $_POST["library_meta_keyword"]; //Required Fields
                $library_description = $_POST["library_description"]; //Required Fields
            //File Section Start
            $library_image = $_FILES["library_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($library_image)){

                //Checking Image Type Start
                if(!empty($library_image)){
                    if(in_array(pathinfo($libraryDir.$random_number."_header_".$library_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#library').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Image Type End
                if($confirmation == 0){
                    if($uploaded == 0){
                        if(!empty($library_image)){
                            if(move_uploaded_file($_FILES["library_image"]["tmp_name"], $libraryDir.$random_number."_header_".$library_image))
                                $data["library_image"] = $random_number."_header_".$library_image;
                            else
                                $uploaded = 1;
                        }
                    }
                    $data["library_title"] = str_replace("'", "&apos;", $library_title);        
                    $data["library_meta_description"] = str_replace("'", "&apos;", $library_meta_description);      
                    $data["library_meta_keyword"] = str_replace("'", "&apos;", $library_meta_keyword);
                      $data["library_description"] = str_replace("'", "&apos;", $library_description);  
                    $data["library_added_by"] = $admin_id;
                    $data["library_ip"] = $ip_address;
                    $data["library_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_library", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Library Section End With 
        
        
        
        //Edit Library Section Start With Ajax
        if($_POST["action"] == "editLibrary"){
            $library_id = $_POST["library_id"];
            $object->sql = "";
            $object->select("tbl_library");
            $object->where("`library_id` = '$library_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $library_title = $_POST["library_title"]; //Required Fields
                $library_meta_description = $_POST["library_meta_description"]; //Required Fields
                $library_meta_keyword = $_POST["library_meta_keyword"]; //Required Fields
                    $library_description = $_POST["library_description"]; //Required Fields
                //File Section Start
                $library_image = $_FILES["library_image"]["name"];
                //File Section End
                  //Checking Image Type Start
                    if(!empty($library_image)){
                        if(in_array(pathinfo($libraryDir."phase_".$random_number."_header_".$library_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#library_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End
                    if($confirmation == 0){
                        if($uploaded == 0){
                            if(!empty($library_image)){
                                if(move_uploaded_file($_FILES["library_image"]["tmp_name"], $libraryDir."phase_".$random_number."_header_".$library_image)){
                                    $data["library_image"] = "phase_".$random_number."_header_".$library_image;
                                    if(!empty($row["library_image"]))
                                        unlink($libraryDir.$row["library_image"]);
                                } else
                                    $uploaded = 1;
                            }
                        }
                        $data["library_title"] = str_replace("'", "&apos;", $library_title);                
                        $data["library_meta_description"] = str_replace("'", "&apos;", $library_meta_description);                
                        $data["library_meta_keyword"] = str_replace("'", "&apos;", $library_meta_keyword);
                          $data["library_description"] = str_replace("'", "&apos;", $library_description);  
                        $data["library_added_by"] = $admin_id;
                        $data["library_ip"] = $ip_address;
                        $data["library_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_library", $completeData." WHERE `library_id` = '$library_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit Library Section End With Ajax
        
        
        //Add  Laboratory Section Start With Ajax
        if($_POST["action"] == "laboratory"){
            $laboratory_title = $_POST["laboratory_title"]; //Required Fields
            $laboratory_meta_description = $_POST["laboratory_meta_description"]; //Required Fields
            $laboratory_meta_keyword = $_POST["laboratory_meta_keyword"]; //Required Fields
            //File Section Start
            $laboratory_image = $_FILES["laboratory_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($laboratory_image)){

                //Checking Image Type Start
                if(!empty($laboratory_image)){
                    if(in_array(pathinfo($laboratoryDir.$random_number."_header_".$laboratory_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#laboratory_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Image Type End
                if($confirmation == 0){
                    if($uploaded == 0){
                        if(!empty($laboratory_image)){
                            if(move_uploaded_file($_FILES["laboratory_image"]["tmp_name"], $laboratoryDir.$random_number."_header_".$laboratory_image))
                                $data["laboratory_image"] = $random_number."_header_".$laboratory_image;
                            else
                                $uploaded = 1;
                        }
                    }
                    $data["laboratory_title"] = str_replace("'", "&apos;", $laboratory_title);      
                    $data["laboratory_meta_description"] = str_replace("'", "&apos;", $laboratory_meta_description);        
                    $data["laboratory_meta_keyword"] = str_replace("'", "&apos;", $laboratory_meta_keyword);            
                    $data["laboratory_added_by"] = $admin_id;
                    $data["laboratory_ip"] = $ip_address;
                    $data["laboratory_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_laboratory", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Laboratory Section End With 
        
        
        
        
        //Edit Laboratory Section Start With Ajax
        if($_POST["action"] == "editlaboratory"){
            $laboratory_id = $_POST["laboratory_id"];
            $object->sql = "";
            $object->select("tbl_laboratory");
            $object->where("`laboratory_id` = '$laboratory_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $laboratory_title = $_POST["laboratory_title"]; //Required Fields
                $laboratory_meta_description = $_POST["laboratory_meta_description"]; //Required Fields
                $laboratory_meta_keyword = $_POST["laboratory_meta_keyword"]; //Required Fields
                //File Section Start
                $laboratory_image = $_FILES["laboratory_image"]["name"];
                //File Section End
                  //Checking Image Type Start
                    if(!empty($laboratory_image)){
                        if(in_array(pathinfo($laboratoryDir."phase_".$random_number."_header_".$laboratory_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#laboratory_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End
                    if($confirmation == 0){
                        if($uploaded == 0){
                            if(!empty($class_room_image)){
                                if(move_uploaded_file($_FILES["laboratory_image"]["tmp_name"], $laboratoryDir."phase_".$random_number."_header_".$laboratory_image)){
                                    $data["laboratory_image"] = "phase_".$random_number."_header_".$laboratory_image;
                                    if(!empty($row["laboratory_image"]))
                                        unlink($laboratoryDir.$row["laboratory_image"]);
                                } else
                                    $uploaded = 1;
                            }
                        }
                        $data["laboratory_title"] = str_replace("'", "&apos;", $laboratory_title);                
                        $data["laboratory_meta_description"] = str_replace("'", "&apos;", $laboratory_meta_description);                
                        $data["laboratory_meta_keyword"] = str_replace("'", "&apos;", $laboratory_meta_keyword);                              
                        $data["laboratory_added_by"] = $admin_id;
                        $data["laboratory_ip"] = $ip_address;
                        $data["laboratory_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_laboratory", $completeData." WHERE `laboratory_id` = '$laboratory_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit Laboratory Section End With Ajax
        
        
        
        //Add Class Room Section Start With Ajax
        if($_POST["action"] == "class_room"){
            $class_room_title = $_POST["class_room_title"]; //Required Fields
            $class_room_meta_description = $_POST["class_room_meta_description"]; //Required Fields
            $class_room_meta_keyword = $_POST["class_room_meta_keyword"]; //Required Fields
            //File Section Start
            $class_room_image = $_FILES["class_room_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($class_room_image )){

                //Checking Image Type Start
                if(!empty($class_room_image)){
                    if(in_array(pathinfo($classroomDir.$random_number."_header_".$class_room_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#class_room_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Image Type End
                if($confirmation == 0){
                    if($uploaded == 0){
                        if(!empty($class_room_image)){
                            if(move_uploaded_file($_FILES["class_room_image"]["tmp_name"], $classroomDir.$random_number."_header_".$class_room_image))
                                $data["class_room_image"] = $random_number."_header_".$class_room_image;
                            else
                                $uploaded = 1;
                        }
                    }
                    $data["class_room_title"] = str_replace("'", "&apos;", $class_room_title);      
                    $data["class_room_meta_description"] = str_replace("'", "&apos;", $class_room_meta_description);        
                    $data["class_room_meta_keyword"] = str_replace("'", "&apos;", $class_room_meta_keyword);            
                    $data["class_room_added_by"] = $admin_id;
                    $data["class_room_ip"] = $ip_address;
                    $data["class_room_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_class_room", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Computer Lab Section End With Ajax
        
        
        //Edit Class Room Section Start With Ajax
        if($_POST["action"] == "editClassroom"){
            $class_room_id = $_POST["class_room_id"];
            $object->sql = "";
            $object->select("tbl_class_room");
            $object->where("`class_room_id` = '$class_room_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $class_room_title = $_POST["class_room_title"]; //Required Fields
                $class_room_meta_description = $_POST["class_room_meta_description"]; //Required Fields
                $class_room_meta_keyword = $_POST["class_room_meta_keyword"]; //Required Fields
                //File Section Start
                $class_room_image = $_FILES["class_room_image"]["name"];
                //File Section End
                  //Checking Image Type Start
                    if(!empty($class_room_image)){
                        if(in_array(pathinfo($classroomDir."phase_".$random_number."_header_".$class_room_image1,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#class_room_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End
                    if($confirmation == 0){
                        if($uploaded == 0){
                            if(!empty($class_room_image)){
                                if(move_uploaded_file($_FILES["class_room_image"]["tmp_name"], $classroomDir."phase_".$random_number."_header_".$class_room_image)){
                                    $data["class_room_image"] = "phase_".$random_number."_header_".$class_room_image;
                                    if(!empty($row["class_room_image"]))
                                        unlink($classroomDir.$row["class_room_image"]);
                                } else
                                    $uploaded = 1;
                            }
                        }
                        $data["class_room_title"] = str_replace("'", "&apos;", $class_room_title);                
                        $data["class_room_meta_description"] = str_replace("'", "&apos;", $class_room_meta_description);                
                        $data["class_room_meta_keyword"] = str_replace("'", "&apos;", $class_room_meta_keyword);                              
                        $data["class_room_added_by"] = $admin_id;
                        $data["class_room_ip"] = $ip_address;
                        $data["class_room_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_class_room", $completeData." WHERE `class_room_id` = '$class_room_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit Class Room Section End With Ajax
        
        
        
        //Add Gallery Section Start With Ajax
        if($_POST["action"] == "gallery"){
            $gallerytitle = $_POST["gallery_title"]; //Required Fields
            $gallery_meta_description = $_POST["gallery_meta_description"]; //Required Fields
            $gallery_meta_keyword = $_POST["gallery_meta_keyword"]; //Required Fields
            //File Section Start
            $gallery_image = $_FILES["gallery_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($gallery_image )){

                //Checking Image Type Start
                if(!empty($gallery_image)){
                    if(in_array(pathinfo($galleryDir.$random_number."_header_".$gallery_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#gallery_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Image Type End
                if($confirmation == 0){
                    if($uploaded == 0){
                        if(!empty($gallery_image)){
                            if(move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $galleryDir.$random_number."_header_".$gallery_image))
                                $data["gallery_image"] = $random_number."_header_".$gallery_image;
                            else
                                $uploaded = 1;
                        }
                    }
                    $data["gallery_title"] = str_replace("'", "&apos;", $gallerytitle);     
                    $data["gallery_meta_description"] = str_replace("'", "&apos;", $gallery_meta_description);      
                    $data["gallery_meta_keyword"] = str_replace("'", "&apos;", $gallery_meta_keyword);          
                    $data["gallery_added_by"] = $admin_id;
                    $data["gallery_ip"] = $ip_address;
                    $data["gallery_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_gallery", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Gallery Section End With Ajax
        
        
        
     //Edit Gallery Section Start With Ajax
        if($_POST["action"] == "editGallery"){
            $gallery_id = $_POST["gallery_id"];
            $object->sql = "";
            $object->select("tbl_gallery");
            $object->where("`gallery_id` = '$gallery_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $gallerytitle = $_POST["gallery_title"]; //Required Fields
                $gallery_meta_description = $_POST["gallery_meta_description"]; //Required Fields
                $gallery_meta_keyword = $_POST["gallery_meta_keyword"]; //Required Fields
                //File Section Start
                $galleryImage = $_FILES["gallery_image"]["name"];
                //File Section End
                  //Checking Image Type Start
                    if(!empty($galleryImage)){
                        if(in_array(pathinfo($galleryDir."phase_".$random_number."_header_".$galleryImage,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#gallery_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End
                    if($confirmation == 0){
                        if($uploaded == 0){
                            if(!empty($galleryImage)){
                                if(move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $galleryDir."phase_".$random_number."_header_".$galleryImage)){
                                    $data["gallery_image"] = "phase_".$random_number."_header_".$galleryImage;
                                    if(!empty($row["gallery_image"]))
                                        unlink($galleryDir.$row["gallery_image"]);
                                } else
                                    $uploaded = 1;
                            }
                        }
                        $data["gallery_title"] = str_replace("'", "&apos;", $gallerytitle);                
                        $data["gallery_meta_description"] = str_replace("'", "&apos;", $gallery_meta_description);                
                        $data["gallery_meta_keyword"] = str_replace("'", "&apos;", $gallery_meta_keyword);                              
                        $data["gallery_added_by"] = $admin_id;
                        $data["gallery_ip"] = $ip_address;
                        $data["gallery_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_gallery", $completeData." WHERE `gallery_id` = '$gallery_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit Gallery Section End With Ajax
        
        
        
        //Add Designation Section Start With Ajax
        if($_POST["action"] == "designation"){
            $designation_name = $_POST["designation_name"]; //Required Fields
            if(!empty($designation_name )){
                //Checking Header Image Type End
                if($confirmation == 0){
                    
                    $data["designation_name"] = str_replace("'", "&apos;", $designation_name);
                    $data["designation_added_by"] = $admin_id;
                    $data["designation_ip"] = $ip_address;
                    $data["designation_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_designation", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Designation Section End With Ajax
        //Edit Designation Section Start With Ajax
        if($_POST["action"] == "editdesignation"){
            $designation_id = $_POST["designation_id"];
            $object->sql = "";
            $object->select("tbl_designation");
            $object->where("`designation_id` = '$designation_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $designation_name = $_POST["designation_name"]; //Required Fields
             
                    //Checking Header Image Type End
                    if($confirmation == 0){
                    
                        $data["designation_name"] = str_replace("'", "&apos;", $designation_name);
                        $data["designation_added_by"] = $admin_id;
                        $data["designation_ip"] = $ip_address;
                        $data["designation_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_designation", $completeData." WHERE `designation_id` = '$designation_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit Designation Section End With Ajax
        
        
        
        
    
        
        
        
        //Add academic Start With Ajax
        if($_POST["action"] == "academic"){
            $academic_title = $_POST["academic_title"]; //Required Fields
            $academic_meta_keyword = $_POST["academic_meta_keyword"]; //Required Fields
            $academic_meta_description = $_POST["academic_meta_description"]; //Required Fields
            $academic_heading = $_POST["academic_heading"]; //Required Fields
            $academic_description = $_POST["academic_description"];
            
            //File Section Start
            $academic_image = $_FILES["academic_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($academic_description && $academic_heading && $academic_image)){
                //Checking Header Image Type Start
                if(!empty($academic_image)){
                    if(in_array(pathinfo($academicDir."phase_".$random_number."_header_".$academic_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#academic_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End

                if($confirmation == 0){
                    if($uploaded == 0){                     
                        if(!empty($academic_image)){
                            if(move_uploaded_file($_FILES["academic_image"]["tmp_name"], $academicDir."phase_".$random_number."_header_".$academic_image))
                                $data["academic_image"] = "phase_".$random_number."_header_".$academic_image;
                            else
                                $uploaded = 1;
                        }

                    }
                    $data["academic_title"] = str_replace("'", "&apos;", $academic_title);
                    $data["academic_meta_keyword"] = str_replace("'", "&apos;", $academic_meta_keyword);
                    $data["academic_meta_description"] = str_replace("'", "&apos;", $academic_meta_description);
                    $data["academic_heading"] = str_replace("'", "&apos;", $academic_heading);
                    $data["academic_description"] = str_replace("'", "&apos;", $academic_description);
                    $data["academic_added_by"] = $admin_id;
                    $data["academic_ip"] = $ip_address;
                    $data["academic_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_academic", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add  Academic Section End With Ajax
        
        
        
        //Edit Academic  Section Start With Ajax
        if($_POST["action"] == "editacademic"){
            $academic_id = $_POST["academic_id"];
            $object->sql = "";
            $object->select("tbl_academic");
            $object->where("`academic_id` = '$academic_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $academic_title = $_POST["academic_title"]; //Required Fields
                $academic_meta_keyword = $_POST["academic_meta_keyword"]; //Required Fields
                $academic_meta_description = $_POST["academic_meta_description"]; //Required Fields
                $academic_heading = $_POST["academic_heading"]; //Required Fields
                $academic_description = $_POST["academic_description"];

                //File Section Start
                $academic_image = $_FILES["academic_image"]["name"];
                //File Section End

                if(!empty($academic_description && $academic_image)){
                    //Checking Header Image Type Start
                    if(!empty($academic_image)){
                        if(in_array(pathinfo($academicDir."phase_".$random_number."_header_".$academic_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#academic_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End

                    //Checking ApplicationForm Type End
                    if($confirmation == 0){
                        if($uploaded == 0){                     
                            if(!empty($academic_image)){
                                if(move_uploaded_file($_FILES["academic_image"]["tmp_name"], $academicDir."phase_".$random_number."_header_".$academic_image)){
                                    $data["academic_image"] = "phase_".$random_number."_header_".$academic_image;
                                    if(!empty($row["academic_image"]))
                                        unlink($academicDir.$row["academic_image"]);
                                } else
                                    $uploaded = 1;
                            }

                        }
                        $data["academic_title"] = str_replace("'", "&apos;", $academic_title);
                        $data["academic_meta_keyword"] = str_replace("'", "&apos;", $academic_meta_keyword);
                        $data["academic_meta_description"] = str_replace("'", "&apos;", $academic_meta_description);
                        $data["academic_heading"] = str_replace("'", "&apos;", $academic_heading);
                        $data["academic_description"] = str_replace("'", "&apos;", $academic_description);
                        $data["academic_added_by"] = $admin_id;
                        $data["academic_ip"] = $ip_address;
                        $data["academic_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_academic", $completeData." WHERE `academic_id` = '$academic_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
                } else
                    echo "empty";
            } else
                echo "error";
        }
        //Edit Academic Section End With Ajax
        
        
        //Add Sport Activity Start With Ajax
        if($_POST["action"] == "sportsActivity"){
            $sport_activity_title = $_POST["sport_activity_title"]; //Required Fields
            $sport_activity_meta_keyword = $_POST["sport_activity_meta_keyword"]; //Required Fields
            $sport_activity_meta_description = $_POST["sport_activity_meta_description"]; //Required Fields
            $sport_activity_heading = $_POST["sport_activity_heading"]; //Required Fields
            $sport_activity_description = $_POST["sport_activity_description"];
            
            //File Section Start
            $sport_activity_image = $_FILES["sport_activity_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($sport_activity_description && $sport_activity_heading && $sport_activity_image)){
                //Checking Header Image Type Start
                if(!empty($sport_activity_image)){
                    if(in_array(pathinfo($sportsactivityDir."phase_".$random_number."_header_".$sport_activity_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#sport_activity_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End

                if($confirmation == 0){
                    if($uploaded == 0){                     
                        if(!empty($sport_activity_image)){
                            if(move_uploaded_file($_FILES["sport_activity_image"]["tmp_name"], $sportsactivityDir."phase_".$random_number."_header_".$sport_activity_image))
                                $data["sport_activity_image"] = "phase_".$random_number."_header_".$sport_activity_image;
                            else
                                $uploaded = 1;
                        }

                    }
                    $data["sport_activity_title"] = str_replace("'", "&apos;", $sport_activity_title);
                    $data["sport_activity_meta_keyword"] = str_replace("'", "&apos;", $sport_activity_meta_keyword);
                    $data["sport_activity_meta_description"] = str_replace("'", "&apos;", $sport_activity_meta_description);
                    $data["sport_activity_heading"] = str_replace("'", "&apos;", $sport_activity_heading);
                    $data["sport_activity_description"] = str_replace("'", "&apos;", $sport_activity_description);
                    $data["sport_activity_added_by"] = $admin_id;
                    $data["sport_activity_ip"] = $ip_address;
                    $data["sport_activity_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_sports_activities", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Sport Activity Section End With Ajax
        
        
        //Edit Sport Activity  Section Start With Ajax
        if($_POST["action"] == "editsportactivity"){
            $sport_activity_id = $_POST["sport_activity_id"];
            $object->sql = "";
            $object->select("tbl_sports_activities");
            $object->where("`sport_activity_id` = '$sport_activity_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $sport_activity_title = $_POST["sport_activity_title"]; //Required Fields
                $sport_activity_meta_keyword = $_POST["sport_activity_meta_keyword"]; //Required Fields
                $sport_activity_meta_description = $_POST["sport_activity_meta_description"]; //Required Fields
                $sport_activity_heading = $_POST["sport_activity_heading"]; //Required Fields
                $sport_activity_description = $_POST["sport_activity_description"];

                //File Section Start
                $sport_activity_image = $_FILES["sport_activity_image"]["name"];
                //File Section End

                if(!empty($sport_activity_description && $sport_activity_image)){
                    //Checking Header Image Type Start
                    if(!empty($sport_activity_image)){
                        if(in_array(pathinfo($sportsactivityDir."phase_".$random_number."_header_".$sport_activity_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#sport_activity_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End

                    //Checking ApplicationForm Type End
                    if($confirmation == 0){
                        if($uploaded == 0){                     
                            if(!empty($sport_activity_image)){
                                if(move_uploaded_file($_FILES["sport_activity_image"]["tmp_name"], $sportsactivityDir."phase_".$random_number."_header_".$sport_activity_image)){
                                    $data["sport_activity_image"] = "phase_".$random_number."_header_".$sport_activity_image;
                                    if(!empty($row["sport_activity_image"]))
                                        unlink($sportsactivityDir.$row["sport_activity_image"]);
                                } else
                                    $uploaded = 1;
                            }

                        }
                        $data["sport_activity_title"] = str_replace("'", "&apos;", $sport_activity_title);
                        $data["sport_activity_meta_keyword"] = str_replace("'", "&apos;", $sport_activity_meta_keyword);
                        $data["sport_activity_meta_description"] = str_replace("'", "&apos;", $sport_activity_meta_description);
                        $data["sport_activity_heading"] = str_replace("'", "&apos;", $sport_activity_heading);
                        $data["sport_activity_description"] = str_replace("'", "&apos;", $sport_activity_description);
                        $data["sport_activity_added_by"] = $admin_id;
                        $data["sport_activity_ip"] = $ip_address;
                        $data["sport_activity_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_sports_activities", $completeData." WHERE `sport_activity_id` = '$sport_activity_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
                } else
                    echo "empty";
            } else
                echo "error";
        }
        //Edit Sport Activity Section End With Ajax
        
        
        
        
        
        
        //Add Principal  Section Start With Ajax
        if($_POST["action"] == "principalDesk"){
            $principal_title = $_POST["principal_title"]; //Required Fields
            $principal_meta_keyword = $_POST["principal_meta_keyword"]; //Required Fields
            $principal_meta_description = $_POST["principal_meta_description"]; //Required Fields
            $principal_heading = $_POST["principal_heading"]; //Required Fields
            $principal_description = $_POST["principal_description"];
            
            //File Section Start
            $principal_image = $_FILES["principal_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($principal_description && $principal_heading && $principal_image)){
                //Checking Header Image Type Start
                if(!empty($principal_image)){
                    if(in_array(pathinfo($messageDir."phase_".$random_number."_header_".$principal_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#principal_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End

                if($confirmation == 0){
                    if($uploaded == 0){                     
                        if(!empty($principal_description)){
                            if(move_uploaded_file($_FILES["principal_image"]["tmp_name"], $messageDir."phase_".$random_number."_header_".$principal_image))
                                $data["principal_image"] = "phase_".$random_number."_header_".$principal_image;
                            else
                                $uploaded = 1;
                        }

                    }
                    $data["principal_title"] = str_replace("'", "&apos;", $principal_title);
                    $data["principal_meta_keyword"] = str_replace("'", "&apos;", $principal_meta_keyword);
                    $data["principal_meta_description"] = str_replace("'", "&apos;", $principal_meta_description);
                    $data["principal_heading"] = str_replace("'", "&apos;", $principal_heading);
                    $data["principal_description"] = str_replace("'", "&apos;", $principal_description);
                    $data["principal_added_by"] = $admin_id;
                    $data["principal_ip"] = $ip_address;
                    $data["principal_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_principal_desk", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Principal Section End With Ajax
        
        
        
        
        
        
        
        //Add Secretary  Section Start With Ajax
        if($_POST["action"] == "secretaryDesk"){
            $secretary_title = $_POST["secretary_title"]; //Required Fields
            $secretary_meta_keyword = $_POST["secretary_meta_keyword"]; //Required Fields
            $secretary_meta_description = $_POST["secretary_meta_description"]; //Required Fields
            $secretary_heading = $_POST["secretary_heading"]; //Required Fields
            $secretary_description = $_POST["secretary_description"];
            //File Section Start
            $secretary_image = $_FILES["secretary_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($secretary_description)){
                //Checking Header Image Type Start
                if(!empty($secretary_image)){
                    if(in_array(pathinfo($messageDir."phase_".$random_number."_header_".$secretary_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#secretary_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End

                if($confirmation == 0){
                    if($uploaded == 0){                     
                        if(!empty($secretary_image)){
                            if(move_uploaded_file($_FILES["secretary_image"]["tmp_name"], $messageDir."phase_".$random_number."_header_".$secretary_image))
                                $data["secretary_image"] = "phase_".$random_number."_header_".$secretary_image;
                            else
                                $uploaded = 1;
                        }

                    }
                    $data["secretary_title"] = str_replace("'", "&apos;", $secretary_title);
                    $data["secretary_meta_keyword"] = str_replace("'", "&apos;", $secretary_meta_keyword);
                    $data["secretary_meta_description"] = str_replace("'", "&apos;", $secretary_meta_description);
                    $data["secretary_heading"] = str_replace("'", "&apos;", $secretary_heading);
                    $data["secretary_description"] = str_replace("'", "&apos;", $secretary_description);
                    $data["secretary_added_by"] = $admin_id;
                    $data["secretary_ip"] = $ip_address;
                    $data["secretary_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_secretary_desk", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Secretary Section End With Ajax
        
        
        //Edit Principal  Section Start With Ajax
        if($_POST["action"] == "editprincipal"){
            $principalId = $_POST["principal_id"];
            $object->sql = "";
            $object->select("tbl_principal_desk");
            $object->where("`principal_id` = '$principalId' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $principal_title = $_POST["principal_title"]; //Required Fields
                $principal_meta_keyword = $_POST["principal_meta_keyword"]; //Required Fields
                $principal_meta_description = $_POST["principal_meta_description"]; //Required Fields
                $principal_heading = $_POST["principal_heading"]; //Required Fields
                $principal_description = $_POST["principal_description"];

                //File Section Start
                $principal_image = $_FILES["principal_image"]["name"];
                //File Section End

                if(!empty($principal_description)){
                    //Checking Header Image Type Start
                    if(!empty($principal_image)){
                        if(in_array(pathinfo($messageDir."phase_".$random_number."_header_".$principal_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#principal_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End

                    //Checking ApplicationForm Type End
                    if($confirmation == 0){
                        if($uploaded == 0){                     
                            if(!empty($principal_image)){
                                if(move_uploaded_file($_FILES["principal_image"]["tmp_name"], $messageDir."phase_".$random_number."_header_".$principal_image)){
                                    $data["principal_image"] = "phase_".$random_number."_header_".$principal_image;
                                    if(!empty($row["principal_image"]))
                                        unlink($messageDir.$row["principal_image"]);
                                } else
                                    $uploaded = 1;
                            }

                        }
                        $data["principal_title"] = str_replace("'", "&apos;", $principal_title);
                        $data["principal_meta_keyword"] = str_replace("'", "&apos;", $principal_meta_keyword);
                        $data["principal_meta_description"] = str_replace("'", "&apos;", $principal_meta_description);
                        $data["principal_heading"] = str_replace("'", "&apos;", $principal_heading);
                        $data["principal_description"] = str_replace("'", "&apos;", $principal_description);
                        $data["principal_added_by"] = $admin_id;
                        $data["principal_ip"] = $ip_address;
                        $data["principal_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_principal_desk", $completeData." WHERE `principal_id` = '$principalId'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
                } else
                    echo "empty";
            } else
                echo "error";
        }
        //Edit Principal Section End With Ajax
        
        
        
         //Edit Secretary  Section Start With Ajax
        if($_POST["action"] == "editsecretary"){
            $secretaryId = $_POST["secretary_id"];
            $object->sql = "";
            $object->select("tbl_secretary_desk");
            $object->where("`secretary_id` = '$secretaryId' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $secretary_title = $_POST["secretary_title"]; //Required Fields
                $secretary_meta_keyword = $_POST["secretary_meta_keyword"]; //Required Fields
                $secretary_meta_description = $_POST["secretary_meta_description"]; //Required Fields
                $secretary_heading = $_POST["secretary_heading"]; //Required Fields
                $secretary_description = $_POST["secretary_description"];

                //File Section Start
                $secretary_image = $_FILES["secretary_image"]["name"];
                //File Section End

                if(!empty($secretary_description && $secretary_image)){
                    //Checking Header Image Type Start
                    if(!empty($secretary_image)){
                        if(in_array(pathinfo($messageDir."phase_".$random_number."_header_".$secretary_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#secretary_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End

                    //Checking ApplicationForm Type End
                    if($confirmation == 0){
                        if($uploaded == 0){                     
                            if(!empty($secretary_image)){
                                if(move_uploaded_file($_FILES["secretary_image"]["tmp_name"], $messageDir."phase_".$random_number."_header_".$secretary_image)){
                                    $data["secretary_image"] = "phase_".$random_number."_header_".$secretary_image;
                                    if(!empty($row["secretary_image"]))
                                        unlink($messageDir.$row["secretary_image"]);
                                } else
                                    $uploaded = 1;
                            }

                        }
                        $data["secretary_title"] = str_replace("'", "&apos;", $secretary_title);
                        $data["secretary_meta_keyword"] = str_replace("'", "&apos;", $secretary_meta_keyword);
                        $data["secretary_meta_description"] = str_replace("'", "&apos;", $secretary_meta_description);
                        $data["secretary_heading"] = str_replace("'", "&apos;", $secretary_heading);
                        $data["secretary_description"] = str_replace("'", "&apos;", $secretary_description);
                        $data["secretary_added_by"] = $admin_id;
                        $data["secretary_ip"] = $ip_address;
                        $data["secretary_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_secretary_desk", $completeData." WHERE `secretary_id` = '$secretaryId'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
                } else
                    echo "empty";
            } else
                echo "error";
        }
        //Edit Secretary Section End With Ajax
        
        
        //Add Staff  Section Start With Ajax
        if($_POST["action"] == "addStaff"){
            $staff_title = $_POST["staff_title"]; //Required Fields
            $staff_meta_keyword = $_POST["staff_meta_keyword"]; //Required Fields
            $staff_meta_description = $_POST["staff_meta_description"]; //Required Fields
            $staff_name = $_POST["staff_name"]; //Required Fields
            $staff_designation = $_POST["staff_designation"];
            //File Section Start
            $staff_image = $_FILES["staff_image"]["name"]; //Required Fields
            //File Section End
            if(!empty( $staff_name)){
                //Checking Header Image Type Start
                if(!empty($staff_image)){
                    if(in_array(pathinfo($teamDir."phase_".$random_number."_header_".$staff_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#staff_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End

                if($confirmation == 0){
                    if($uploaded == 0){                     
                        if(!empty($staff_image)){
                            if(move_uploaded_file($_FILES["staff_image"]["tmp_name"], $teamDir."phase_".$random_number."_header_".$staff_image))
                                $data["staff_image"] = "phase_".$random_number."_header_".$staff_image;
                            else
                                $uploaded = 1;
                        }

                    }
                    $data["staff_title"] = str_replace("'", "&apos;", $staff_title);
                    $data["staff_meta_keyword"] = str_replace("'", "&apos;", $staff_meta_keyword);
                    $data["staff_meta_description"] = str_replace("'", "&apos;", $staff_meta_description);
                    $data["staff_name"] = str_replace("'", "&apos;", $staff_name);
                    $data["staff_designation"] = str_replace("'", "&apos;", $staff_designation);
                    $data["staff_added_by"] = $admin_id;
                    $data["staff_ip"] = $ip_address;
                    $data["staff_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_staff", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Staff Section End With Ajax
        
        
        
        
        
        
         //Edit Staff  Section Start With Ajax
        if($_POST["action"] == "editstaff"){
            $staffId = $_POST["editstaffId"];
            $object->sql = "";
            $object->select("tbl_staff");
            $object->where("`staff_id` = '$staffId' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                 $staff_title = $_POST["staff_title"]; //Required Fields
                $staff_meta_keyword = $_POST["staff_meta_keyword"]; //Required Fields
                $staff_meta_description = $_POST["staff_meta_description"]; //Required Fields
                
                $staff_name = $_POST["staff_name"]; //Required Fields
                $staff_designation = $_POST["staff_designation"];

                //File Section Start
                $staff_image = $_FILES["staff_image"]["name"];
                //File Section End

                if(!empty($staff_name)){
                    //Checking Header Image Type Start
                    if(!empty($staff_image)){
                        if(in_array(pathinfo($teamDir."phase_".$random_number."_header_".$staff_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#staff_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End

                    //Checking ApplicationForm Type End
                    if($confirmation == 0){
                        if($uploaded == 0){                     
                            if(!empty($staff_image)){
                                if(move_uploaded_file($_FILES["staff_image"]["tmp_name"], $teamDir."phase_".$random_number."_header_".$staff_image)){
                                    $data["staff_image"] = "phase_".$random_number."_header_".$staff_image;
                                    if(!empty($row["staff_image"]))
                                        unlink($teamDir.$row["staff_image"]);
                                } else
                                    $uploaded = 1;
                            }

                        }
                        $data["staff_title"] = str_replace("'", "&apos;", $staff_title);
                        $data["staff_meta_keyword"] = str_replace("'", "&apos;", $staff_meta_keyword);
                        $data["staff_meta_description"] = str_replace("'", "&apos;", $staff_meta_description);
                        $data["staff_name"] = str_replace("'", "&apos;", $staff_name);
                        $data["staff_designation"] = str_replace("'", "&apos;", $staff_designation);
                        $data["staff_added_by"] = $admin_id;
                        $data["staff_ip"] = $ip_address;
                        $data["staff_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_staff", $completeData." WHERE `staff_id` = '$staffId'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
                } else
                    echo "empty";
            } else
                echo "error";
        }
        //Edit management team Section End With Ajax
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        //Add management team  Section Start With Ajax
        if($_POST["action"] == "management_team"){
            $management_title = $_POST["management_title"]; //Required Fields
            $management_meta_keyword = $_POST["management_meta_keyword"]; //Required Fields
            $management_meta_description = $_POST["management_meta_description"]; //Required Fields
            
            $management_name = $_POST["management_name"]; //Required Fields
             $management_designation = $_POST["management_designation"]; //Required Fields
            //File Section Start
            $management_image = $_FILES["management_image"]["name"]; //Required Fields
            //File Section End
            if(!empty( $management_name )){
                //Checking Header Image Type Start
                if(!empty($management_image)){
                    if(in_array(pathinfo($teamDir."phase_".$random_number."_header_".$management_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#management_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End

                if($confirmation == 0){
                    if($uploaded == 0){                     
                        if(!empty($management_image)){
                            if(move_uploaded_file($_FILES["management_image"]["tmp_name"], $teamDir."phase_".$random_number."_header_".$management_image))
                                $data["management_image"] = "phase_".$random_number."_header_".$management_image;
                            else
                                $uploaded = 1;
                        }

                    }
                    $data["management_title"] = str_replace("'", "&apos;", $management_title);
                    $data["management_meta_keyword"] = str_replace("'", "&apos;", $management_meta_keyword);
                    $data["management_meta_description"] = str_replace("'", "&apos;", $management_meta_description);
                    $data["management_name"] = str_replace("'", "&apos;", $management_name);
                    $data["management_designation"] = str_replace("'", "&apos;", $management_designation);
                    $data["management_added_by"] = $admin_id;
                    $data["management_ip"] = $ip_address;
                    $data["management_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_management_team", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add management team  Section End With Ajax
        //Edit management team  Section Start With Ajax
        if($_POST["action"] == "editmanagementteam"){
            $managementteamId = $_POST["editmanagementteamId"];
            $object->sql = "";
            $object->select("tbl_management_team");
            $object->where("`management_id` = '$managementteamId' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                 $management_title = $_POST["management_title"]; //Required Fields
                $management_meta_keyword = $_POST["management_meta_keyword"]; //Required Fields
                $management_meta_description = $_POST["management_meta_description"]; //Required Fields
                
                $management_name = $_POST["management_name"]; //Required Fields
                $management_designation = $_POST["management_designation"];
                //File Section Start
                $management_image = $_FILES["management_image"]["name"];
                //File Section End

                if(!empty($management_name)){
                    //Checking Header Image Type Start
                    if(!empty($management_image)){
                        if(in_array(pathinfo($teamDir."phase_".$random_number."_header_".$management_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#management_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End

                    //Checking ApplicationForm Type End
                    if($confirmation == 0){
                        if($uploaded == 0){                     
                            if(!empty($management_image)){
                                if(move_uploaded_file($_FILES["management_image"]["tmp_name"], $teamDir."phase_".$random_number."_header_".$management_image)){
                                    $data["management_image"] = "phase_".$random_number."_header_".$management_image;
                                    if(!empty($row["management_image"]))
                                        unlink($teamDir.$row["management_image"]);
                                } else
                                    $uploaded = 1;
                            }

                        }
                        $data["management_title"] = str_replace("'", "&apos;", $management_title);
                        $data["management_meta_keyword"] = str_replace("'", "&apos;", $management_meta_keyword);
                        $data["management_meta_description"] = str_replace("'", "&apos;", $management_meta_description);
                        $data["management_name"] = str_replace("'", "&apos;", $management_name);
                        $data["management_designation"] = str_replace("'", "&apos;", $management_designation);
                        $data["management_added_by"] = $admin_id;
                        $data["management_ip"] = $ip_address;
                        $data["management_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_management_team", $completeData." WHERE `management_id` = '$managementteamId'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
                } else
                    echo "empty";
            } else
                echo "error";
        }
        //Edit management team Section End With Ajax
        
        
        
        //Add News Section Start With Ajax
        if($_POST["action"] == "news"){
            $newstitle = $_POST["newstitle"]; //Required Fields
            $news_meta_description = $_POST["news_meta_description"]; //Required Fields
            $news_meta_keyword = $_POST["news_meta_keyword"]; //Required Fields
            //File Section Start
            $title = $_POST["title"]; //Required Fields
            $name = $_POST["name"]; //Required Fields
            $news_date = $_POST["news_date"]; //Required Fields         
            $news_image = $_FILES["news_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($news_image )){

                //Checking Header Image Type Start
                if(!empty($news_image)){
                    if(in_array(pathinfo($newsDir.$random_number."_header_".$news_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#news_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End
                if($confirmation == 0){
                    if($uploaded == 0){
                        if(!empty($news_image)){
                            if(move_uploaded_file($_FILES["news_image"]["tmp_name"], $newsDir.$random_number."_header_".$news_image))
                                $data["news_image"] = $random_number."_header_".$news_image;
                            else
                                $uploaded = 1;
                        }
                    }
                    $data["newstitle"] = str_replace("'", "&apos;", $newstitle);        
                    $data["news_meta_description"] = str_replace("'", "&apos;", $news_meta_description);        
                    $data["news_meta_keyword"] = str_replace("'", "&apos;", $news_meta_keyword);
                    $data["title"] = str_replace("'", "&apos;", $title);
                    $data["name"] = str_replace("'", "&apos;", $name);
                    $data["news_date"] = str_replace("'", "&apos;", $news_date); 
                    $data["news_added_by"] = $admin_id;
                    $data["news_ip"] = $ip_address;
                    $data["news_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_news", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add News Section End With Ajax
        //Edit News Section Start With Ajax
        if($_POST["action"] == "editnews"){
            $news_id = $_POST["news_id"];
            $object->sql = "";
            $object->select("tbl_news");
            $object->where("`news_id` = '$news_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $newstitle = $_POST["newstitle"]; //Required Fields
                $news_meta_description = $_POST["news_meta_description"]; //Required Fields
                $news_meta_keyword = $_POST["news_meta_keyword"]; //Required Fields
                $title = $_POST["title"]; //Required Fields
                $name = $_POST["name"]; //Required Fields
                $news_date = $_POST["news_date"]; //Required Fields
                //File Section Start
                $news_image = $_FILES["news_image"]["name"];
                //File Section End
                  //Checking Image Type Start
                    if(!empty($news_image)){
                        if(in_array(pathinfo($newsDir."phase_".$random_number."_header_".$news_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#news_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End
                    if($confirmation == 0){
                        if($uploaded == 0){
                            if(!empty($news_image)){
                                if(move_uploaded_file($_FILES["news_image"]["tmp_name"], $newsDir."phase_".$random_number."_header_".$news_image)){
                                    $data["news_image"] = "phase_".$random_number."_header_".$news_image;
                                    if(!empty($row["news_image"]))
                                        unlink($newsDir.$row["news_image"]);
                                } else
                                    $uploaded = 1;
                            }
                        }
                        $data["newstitle"] = str_replace("'", "&apos;", $newstitle);                
                        $data["news_meta_description"] = str_replace("'", "&apos;", $news_meta_description);                
                        $data["news_meta_keyword"] = str_replace("'", "&apos;", $news_meta_keyword); 
                        $data["title"] = str_replace("'", "&apos;", $title);
                        $data["name"] = str_replace("'", "&apos;", $name);
                        $data["news_date"] = str_replace("'", "&apos;", $news_date);                        
                        $data["news_added_by"] = $admin_id;
                        $data["news_ip"] = $ip_address;
                        $data["news_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_news", $completeData." WHERE `news_id` = '$news_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit News Section End With Ajax
        //Add year Section Start With Ajax
        if($_POST["action"] == "year"){
            $year_name = $_POST["year_name"]; //Required Fields
            if(!empty($year_name )){
                //Checking Header Image Type End
                if($confirmation == 0){
                    
                    $data["year_name"] = str_replace("'", "&apos;", $year_name);
                    $data["year_added_by"] = $admin_id;
                    $data["year_ip"] = $ip_address;
                    $data["year_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_year", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add year Section End With Ajax
        //Edit year Section Start With Ajax
        if($_POST["action"] == "edityear"){
            $year_id = $_POST["year_id"];
            $object->sql = "";
            $object->select("tbl_year");
            $object->where("`year_id` = '$year_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $year_name = $_POST["year_name"]; //Required Fields
             
                    //Checking Header Image Type End
                    if($confirmation == 0){
                    
                        $data["year_name"] = str_replace("'", "&apos;", $year_name);
                        $data["year_added_by"] = $admin_id;
                        $data["year_ip"] = $ip_address;
                        $data["year_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_year", $completeData." WHERE `year_id` = '$year_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit year Section End With Ajax
        //Add media coverage  Section Start With Ajax
        if($_POST["action"] == "media_coverage"){
            $media_coverage_title = $_POST["media_coverage_title"]; //Required Fields
            $media_coverage_meta_keyword = $_POST["media_coverage_meta_keyword"]; //Required Fields
            $media_coverage_meta_description = $_POST["media_coverage_meta_description"]; //Required Fields
             $propertyName = $_POST["propertyName"]; //Required Fields
            $media_coverage_name = $_POST["media_coverage_name"]; //Required Fields
            //File Section Start
            $media_coverage_image = $_FILES["media_coverage_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($propertyName && $media_coverage_name && $media_coverage_image)){
                //Checking Header Image Type Start
                if(!empty($media_coverage_image)){
                    if(in_array(pathinfo($mediaDir."phase_".$random_number."_header_".$media_coverage_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#media_coverage_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End

                if($confirmation == 0){
                    if($uploaded == 0){                     
                        if(!empty($media_coverage_image)){
                            if(move_uploaded_file($_FILES["media_coverage_image"]["tmp_name"], $mediaDir."phase_".$random_number."_header_".$media_coverage_image))
                                $data["media_coverage_image"] = "phase_".$random_number."_header_".$media_coverage_image;
                            else
                                $uploaded = 1;
                        }

                    }
                    $data["media_coverage_title"] = str_replace("'", "&apos;", $media_coverage_title);
                    $data["media_coverage_meta_keyword"] = str_replace("'", "&apos;", $media_coverage_meta_keyword);
                    $data["media_coverage_meta_description"] = str_replace("'", "&apos;", $media_coverage_meta_description);
                    $data["year_id"] = $propertyName;
                    $data["media_coverage_name"] = str_replace("'", "&apos;", $media_coverage_name);
                    $data["media_coverage_added_by"] = $admin_id;
                    $data["media_coverage_ip"] = $ip_address;
                    $data["media_coverage_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_media_coverage", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add media coverage  Section End With Ajax
        //Edit media coverage  Section Start With Ajax
        if($_POST["action"] == "editmedia_coverage"){
            $media_coverage_id = $_POST["media_coverage_id"];
            $object->sql = "";
            $object->select("tbl_media_coverage");
            $object->where("`media_coverage_id` = '$media_coverage_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                 $media_coverage_title = $_POST["media_coverage_title"]; //Required Fields
                $media_coverage_meta_keyword = $_POST["media_coverage_meta_keyword"]; //Required Fields
                $media_coverage_meta_description = $_POST["media_coverage_meta_description"]; //Required Fields
                $propertyName = $_POST["editpropertyName"]; //Required Fields
                $media_coverage_name = $_POST["media_coverage_name"]; //Required Fields
                //File Section Start
                $media_coverage_image = $_FILES["media_coverage_image"]["name"];
                //File Section End

                if(!empty($propertyName && $media_coverage_name)){
                    //Checking Header Image Type Start
                    if(!empty($media_coverage_image)){
                        if(in_array(pathinfo($mediaDir."phase_".$random_number."_header_".$media_coverage_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#media_coverage_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End

                    //Checking ApplicationForm Type End
                    if($confirmation == 0){
                        if($uploaded == 0){                     
                            if(!empty($media_coverage_image)){
                                if(move_uploaded_file($_FILES["media_coverage_image"]["tmp_name"], $mediaDir."phase_".$random_number."_header_".$media_coverage_image)){
                                    $data["media_coverage_image"] = "phase_".$random_number."_header_".$media_coverage_image;
                                    if(!empty($row["media_coverage_image"]))
                                        unlink($mediaDir.$row["media_coverage_image"]);
                                } else
                                    $uploaded = 1;
                            }

                        }
                        $data["media_coverage_title"] = str_replace("'", "&apos;", $media_coverage_title);
                        $data["media_coverage_meta_keyword"] = str_replace("'", "&apos;", $media_coverage_meta_keyword);
                        $data["media_coverage_meta_description"] = str_replace("'", "&apos;", $media_coverage_meta_description);
                        $data["year_id"] = $propertyName;
                        $data["media_coverage_name"] = str_replace("'", "&apos;", $media_coverage_name);
                        $data["media_coverage_added_by"] = $admin_id;
                        $data["media_coverage_ip"] = $ip_address;
                        $data["media_coverage_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_media_coverage", $completeData." WHERE `media_coverage_id` = '$media_coverage_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
                } else
                    echo "empty";
            } else
                echo "error";
        }
        //Edit media coverage Section End With Ajax
                //Add Award Section Start With Ajax
        if($_POST["action"] == "award"){
            $awardtitle = $_POST["awardtitle"]; //Required Fields
            $award_meta_description = $_POST["award_meta_description"]; //Required Fields
            $award_meta_keyword = $_POST["award_meta_keyword"]; //Required Fields
            //File Section Start
            $title = $_POST["title"]; //Required Fields 
            $award_image = $_FILES["award_image"]["name"]; //Required Fields
            //File Section End
            if(!empty($award_image )){

                //Checking Header Image Type Start
                if(!empty($award_image)){
                    if(in_array(pathinfo($awardDir.$random_number."_header_".$award_image,PATHINFO_EXTENSION), $imageTypes))
                        $uploaded = 0;
                    else{
                        $confirmation = 1;
                        ?>
                        <script>
                            alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                            $('#award_image').addClass("is-invalid");
                        </script>
                        <?php
                    }
                }
                //Checking Header Image Type End
                if($confirmation == 0){
                    if($uploaded == 0){
                        if(!empty($award_image)){
                            if(move_uploaded_file($_FILES["award_image"]["tmp_name"], $awardDir.$random_number."_header_".$award_image))
                                $data["award_image"] = $random_number."_header_".$award_image;
                            else
                                $uploaded = 1;
                        }
                    }
                    $data["awardtitle"] = str_replace("'", "&apos;", $awardtitle);      
                    $data["award_meta_description"] = str_replace("'", "&apos;", $award_meta_description);      
                    $data["award_meta_keyword"] = str_replace("'", "&apos;", $award_meta_keyword);
                    $data["title"] = str_replace("'", "&apos;", $title);
                    $data["award_added_by"] = $admin_id;
                    $data["award_ip"] = $ip_address;
                    $data["award_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_award", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Award Section End With Ajax
        //Edit Award Section Start With Ajax
        if($_POST["action"] == "editaward"){
            $award_id = $_POST["award_id"];
            $object->sql = "";
            $object->select("tbl_award");
            $object->where("`award_id` = '$award_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $awardtitle = $_POST["awardtitle"]; //Required Fields
                $award_meta_description = $_POST["award_meta_description"]; //Required Fields
                $award_meta_keyword = $_POST["award_meta_keyword"]; //Required Fields
                $title = $_POST["title"]; //Required Fields
                //File Section Start
                $award_image = $_FILES["award_image"]["name"];
                //File Section End
                  //Checking Image Type Start
                    if(!empty($award_image)){
                        if(in_array(pathinfo($awardDir."phase_".$random_number."_header_".$award_image,PATHINFO_EXTENSION), $imageTypes))
                            $uploaded = 0;
                        else{
                            $confirmation = 1;
                            ?>
                            <script>
                                alert_toast("error", "Header Image In .JPG, .JPEG, .PNG and .GIF format only!!!");
                                $('#award_image').addClass("is-invalid");
                            </script>
                            <?php
                        }
                    }
                    //Checking Header Image Type End
                    if($confirmation == 0){
                        if($uploaded == 0){
                            if(!empty($award_image)){
                                if(move_uploaded_file($_FILES["award_image"]["tmp_name"], $awardDir."phase_".$random_number."_header_".$award_image)){
                                    $data["award_image"] = "phase_".$random_number."_header_".$award_image;
                                    if(!empty($row["award_image"]))
                                        unlink($awardDir.$row["award_image"]);
                                } else
                                    $uploaded = 1;
                            }
                        }
                        $data["awardtitle"] = str_replace("'", "&apos;", $awardtitle);                
                        $data["award_meta_description"] = str_replace("'", "&apos;", $award_meta_description);                
                        $data["award_meta_keyword"] = str_replace("'", "&apos;", $award_meta_keyword); 
                        $data["title"] = str_replace("'", "&apos;", $title);                        
                        $data["award_added_by"] = $admin_id;
                        $data["award_ip"] = $ip_address;
                        $data["award_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_award", $completeData." WHERE `award_id` = '$award_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit Award Section End With Ajax
        //Add Video Section Start With Ajax
        if($_POST["action"] == "video"){
            $videotitle = $_POST["videotitle"]; //Required Fields
            $video_meta_description = $_POST["video_meta_description"]; //Required Fields
            $video_meta_keyword = $_POST["video_meta_keyword"]; //Required Fields
            //File Section Start
            $video_title = $_POST["video_title"]; //Required Fields
            $video_link = $_POST["video_link"]; //Required Fields
            //File Section End
            if(!empty($video_title && $video_link )){

                //Checking Header Image Type End
                if($confirmation == 0){
                   
                    $data["videotitle"] = str_replace("'", "&apos;", $videotitle);      
                    $data["video_meta_description"] = str_replace("'", "&apos;", $video_meta_description);      
                    $data["video_meta_keyword"] = str_replace("'", "&apos;", $video_meta_keyword);
                    $data["video_title"] = str_replace("'", "&apos;", $video_title);
                    $data["video_link"] = str_replace("'", "&apos;", $video_link);
                    $data["video_added_by"] = $admin_id;
                    $data["video_ip"] = $ip_address;
                    $data["video_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_video", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";;
                }
            } else
                echo "empty";
        }
        //Add Video Section End With Ajax
        //Edit Video Section Start With Ajax
        if($_POST["action"] == "editvideo"){
            $video_id = $_POST["video_id"];
            $object->sql = "";
            $object->select("tbl_video");
            $object->where("`video_id` = '$video_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $videotitle = $_POST["videotitle"]; //Required Fields
                $video_meta_description = $_POST["video_meta_description"]; //Required Fields
                $video_meta_keyword = $_POST["video_meta_keyword"]; //Required Fields
                $video_title = $_POST["video_title"]; //Required Fields
                $video_link = $_POST["video_link"]; //Required Fields
                //File Section End
                    //Checking Header Image Type End
                    if($confirmation == 0){
                   
                        $data["videotitle"] = str_replace("'", "&apos;", $videotitle);                
                        $data["video_meta_description"] = str_replace("'", "&apos;", $video_meta_description);                
                        $data["video_meta_keyword"] = str_replace("'", "&apos;", $video_meta_keyword); 
                        $data["video_title"] = str_replace("'", "&apos;", $video_title);
                        $data["video_link"] = str_replace("'", "&apos;", $video_link);              
                        $data["video_added_by"] = $admin_id;
                        $data["video_ip"] = $ip_address;
                        $data["video_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_video", $completeData." WHERE `video_id` = '$video_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit Video Section End With Ajax


         //Add exam Section Start With Ajax
        if($_POST["action"] == "subject"){
            $subj_name = $_POST["subj_name"]; //Required Fields
            if(!empty($subj_name)){
                if($confirmation == 0){
                    $data["subj_name"] = $subj_name;
                    $data["subj_added_by"] = $admin_id;
                    $data["subj_ip"] = $ip_address;
                    $data["subj_timing"] = $date_variable_today_month_year_with_timing;
                    $data["status"] = $visible;
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $dataKeys.= implode("` , `", array_keys($data));
                    $dataValues.= implode("' , '", $data);
                    $dataKeys.= "`";
                    $dataValues.= "'";
                    $object->sql = "";
                    $check = $object->insert("tbl_subject", "(".$dataKeys.") VALUES (".$dataValues.")");
                    if($check == 1)
                        echo "success";
                    else
                        echo "error";
                }
            } else
                echo "empty";
        }
        //Add exam Section End With Ajax
        

        //Edit Exam Section Start With Ajax
        if($_POST["action"] == "editsubject"){
             $subj_id = $_POST["subj_id"];
            $object->sql = "";
            $object->select("tbl_subject");
            $object->where("`subj_id` = '$subj_id' && `status` = '$visible'");
            $result = $object->get();
            if($result->num_rows > 0){
                $row = $object->get_row();
                $subj_name = $_POST["subj_name"]; //Required Fields         
                    if($confirmation == 0){
                        $data["subj_name"] = $subj_name;
                        $data["subj_added_by"] = $admin_id;
                        $data["subj_ip"] = $ip_address;
                        $data["subj_timing"] = $date_variable_today_month_year_with_timing;
                        $data["status"] = $visible;
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $dataKeys.= implode("` , `", array_keys($data));
                        $dataValues.= implode("' , '", $data);
                        $dataKeys.= "`";
                        $dataValues.= "'";
                        $completeData = "";
                        $explodeKeys = explode(" , ", $dataKeys);
                        $explodeValues = explode(" , ", $dataValues);
                        for($i = 0; $i<count($explodeKeys); $i++){
                            if($i<count($explodeKeys)-1)
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i].", ";
                            else
                                $completeData .= $explodeKeys[$i]." = ".$explodeValues[$i];
                        }
                        $object->sql = "";
                        $check = $object->update("tbl_subject", $completeData." WHERE `subj_id` = '$subj_id'");
                        if($check == 1)
                            echo "success";
                        else
                            echo "error";;
                    }
            } else
                echo "error";
        }
        //Edit Exam Section End With Ajax
        


        /* ---------- All Admin(Backend) Codes End ---------- */
    //Action Section End
    }
?>