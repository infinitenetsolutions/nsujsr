<?php

date_default_timezone_set("Asia/Kolkata");
            $conn = mysqli_connect('localhost', 'nspsjadugora_db', 'TdUE8FLwiC','nspsjadugora_db');
            $sqlQuery = "select stud_name,stud_class,stud_userid,stud_pass,log_in_count from tbl_student";
            $resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
            $studentData = array();
            while( $student = mysqli_fetch_assoc($resultSet)) {
                $studentData[] = $student;
                }
            
            $fileName = "webdamn_export_".date('Ymd') . ".xls";         
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$fileName\"");  
            $showColoumn = false;
            if(!empty($studentData)) {
              foreach($studentData as $studentInfo) {
                if(!$showColoumn) {      
                  echo implode("\t", array_keys($studentInfo)) . "\n";
                  $showColoumn = true;
                }
                echo implode("\t", array_values($studentInfo)) . "\n";
              }
            }
            exit; 
?>