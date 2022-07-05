<!DOCTYPE html>
<html lang="zxx">
    

<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Netaji Subhas Public School - SCHOOL MANAGING COMIMITTEE</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Css Section Start -->
        <?php require_once("include/css.php"); ?>
    <!-- Css Section End -->
    </head>
    <body class="home2">
        <!--Preloader area start here-->
        <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div>
        <!--Preloader area end here-->
        
         <!--Header start-->
        <?php require_once("include/header.php"); ?>
        <!--Header end-->
		
		<img src="./images/single_page/committee.jpg" style="width:100%;"/>
		
<!-- Team Start -->
        <div id="rs-team-2" class="rs-team-2 team-all pt-100 pb-70">
            <div class="container">
                <div class="row">
                    
                     <?php         
			include 'include/config.php';
 			$sel = "SELECT * from  tbl_management_team where  `status` = '".md5("visible")."'";
 		
			$run=mysqli_query($dbcon,$sel);
			while($result=mysqli_fetch_assoc($run)){
			     
			   
			?> 
                    
                    
                    <div class="col-lg-3 col-md-6 col-xs-6">
                        <div class="team-item">
                            <div class="team-img">
                                <a href="#"><img src="admin/images/team/<?php echo $result['management_image']; ?>" alt="" /></a>
                            
                            </div>
                            <div class="team-body">
                                <a href="#"><h3 class="name"><?php echo $result['management_name']; ?></h3></a>
                                <span class="designation"><?php echo $result['management_designation']; ?></span>
                            </div>
                        </div>                      
                    </div>
                    
                    
                      <?php } ?>
              
                    
                    
                </div>
            </div>
        </div>
        <!-- Team End -->		       
		
       
        <!-- Footer Start -->
        <?php
       include 'footer.php';
       ?>
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp">
            <i class="fa fa-angle-up"></i>
        </div>
        
        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="eg: Computer Technology" type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->
         

        
    </body>

<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Apr 2020 06:17:37 GMT -->
</html>