<?php 
    
    function authorityCheck($pageNumber){
        //Logger Type
        $logger_type = $_SESSION["logger_type"];
        if($logger_type == "subadmin")
            $authority = $_SESSION["authority"];
        $flag = 0;
        if(isset($authority)){ 
            $allAuthority = explode(",", $authority); 
            for($i=0; $i<count($allAuthority);$i++){ 
                if($allAuthority[$i] == intval($pageNumber)){ 
                    $flag++; 
                    break; 
                } 
            } 
            if($flag == 0){ 
                return "style='display:none;'"; 
            }
        }
    }
?>