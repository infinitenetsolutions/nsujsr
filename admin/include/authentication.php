<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<?php 
    //Starting Session
    if(empty(session_start()))
        session_start();
    //Logger Type
    $logger_type = $_SESSION["logger_type"];
    if($logger_type == "subadmin")
        $authority = $_SESSION["authority"];
    //Include Object And Class
    require_once('object.php');
    $idle_time = 1200;
    $visible = md5("visible");
    $trash = md5("trash");
    if (time()-$_SESSION["logger_time"]>$idle_time){
        unset($_SESSION["logger_time"]);
        unset($_SESSION["logger_type"]);
        unset($_SESSION["logger_username"]);
        unset($_SESSION["logger_password"]);
        $_SESSION["previous_page"] = basename($_SERVER['PHP_SELF']);
        echo "<script> location.replace('index'); </script>";
    } else{
        $_SESSION["logger_time"] = time();
    }
    if(!isset($_SESSION["logger_type"]) && !isset($_SESSION["logger_username"]) && !isset($_SESSION["logger_password"]))
        echo "<script> location.replace('index'); </script>";
    $flag=0; 
    if(isset($authority)){
        $allAuthority = explode(",", $authority); 
        for($i=0; $i<count($allAuthority);$i++){ 
            if($allAuthority[$i] == $page_no){ 
                $flag++; 
                break; 
            } 
        } 
        if($flag == 0)
        { 
           echo "<script>
                   location.replace('dashboard');
               </script>"; 
        } 
    }
?>
<script>
    $(document).ready(function() {
        setInterval('refreshPage()', 1301000);
    });

    function refreshPage() {
        location.reload();
    }
</script>