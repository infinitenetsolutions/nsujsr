  <html>   
   <head>
  <title>NSPS Jadugora | Student Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <style>   
      table {  
          border-collapse: collapse;  
      }  
          .inline{   
              display: inline-block;   
              float: right;   
              margin: 20px 0px;   
          }   
           
          input, button{   
              height: 34px;   
          }   
    
      .pagination {   
          display: inline-block;   
      }   
      .pagination a {   
          font-weight:bold;   
          font-size:18px;   
          color: black;   
          float: left;   
          padding: 8px 16px;   
          text-decoration: none;   
          border:1px solid black;   
      }   
      .pagination a.active {   
              background-color: pink;   
      }   
      .pagination a:hover:not(.active) {   
          background-color: skyblue;   
      }   
          </style>   
    </head>   
    <body>   
    <center>  
      <?php  
          $conn = mysqli_connect('localhost', 'nspsjadugora_db', 'TdUE8FLwiC','nspsjadugora_db');  
      ?>        
       <div class="jumbotron text-center">
      <h1>NSPS Jadugoda Student Data</h1>
    </div>  
     <div class="container">   
        <br>   
        <div>    
          <table class="table table-striped table-condensed table-bordered">   
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
                     
                          $per_page_record = 300;  // Number of entries to show in a page.   
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
                    </tr>     
                 <?php     
                       }   
                   }   
              ?> 
            </tbody>
               
          </table>   
    
         <div class="pagination">    
        <?php  
          $query = "SELECT COUNT(*) FROM tbl_student";     
          $rs_result = mysqli_query($conn, $query);     
          $row = mysqli_fetch_row($rs_result);     
          $total_records = $row[0];     
            
      echo "</br>";     
          // Number of pages required.   
          $total_pages = ceil($total_records / $per_page_record);     
          $pagLink = "";       
        
          if($page>=2){   
              echo "<a href='studentDataTable.php?page=".($page-1)."'>  Prev </a>";   
          }       
                     
          for ($i=1; $i<=$total_pages; $i++) {   
            if ($i == $page) {   
                $pagLink .= "<a class = 'active' href='studentDataTable.php?page="  
                                                  .$i."'>".$i." </a>";   
            }               
            else  {   
                $pagLink .= "<a href='studentDataTable.php?page=".$i."'>   
                                                  ".$i." </a>";     
            }   
          };     
          echo $pagLink;   
    
          if($page<$total_pages){   
              echo "<a href='studentDataTable.php?page=".($page+1)."'>  Next </a>";   
          }   
        ?>    
        </div>  

        <div class="inline">   
        <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
        placeholder="<?php echo $page."/".$total_pages; ?>" required>   
        <button onClick="go2Page();">Go</button>   
       </div>    
      </div>   
    </div>  
  </center>   
    <script>   
      function go2Page()   
      {   
          var page = document.getElementById("page").value;   
          page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
          window.location.href = 'studentDataTable.php?page='+page;   
      }   
    </script>  
    </body>   
  </html>