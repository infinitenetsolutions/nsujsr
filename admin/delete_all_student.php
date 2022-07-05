<?php
//include('config.php');
$connection = mysqli_connect("localhost","nspsjadugora_db","TdUE8FLwiC","nspsjadugora_db");
if($connection){
echo "<script>alert('connected');</script>";
     
        
$qry = "DELETE FROM tbl_student";
$result=mysqli_query($connection , $qry);

if($result) {
   echo "<script>alert('Record Deleted');</script>";
   header("location:student.php");
} else {
   echo "NO";
}


}


//header("location:student.php");
?>