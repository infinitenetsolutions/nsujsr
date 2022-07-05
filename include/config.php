
<?php
error_reporting(0);
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $dbcon = mysqli_connect("localhost", "root", "", "nspsjsr");
} else {
    $dbcon = mysqli_connect("localhost", "nspsjsr_newdb", "Nsps@123", "nspsjsr_newdb");
}
?>


