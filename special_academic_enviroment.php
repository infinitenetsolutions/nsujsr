<!DOCTYPE html>
<html lang="zxx">
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Netaji Subhas Public School - Special Academic Enviroment</title>
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
		
		
		<img src="./images/single_page/academic-environment.jpg" style="width:100%;"/>
		<!-- About Us Start -->
        <div id="rs-about-2" class="rs-about-2 sec-spacer">
            <div class="container">
                
                
                
                <div class="row rs-vertical-bottom">
                    <div class="col-lg-7 col-md-12">
                        <div class="sec-title mb-30">
                            <h2>Special Academic Enviroment</h2>      
                            
                        </div>
                         <?php         
			include 'include/config.php';
 			$sel = "SELECT * from tbl_academic where  `status` = '".md5("visible")."'";
 		
			$run=mysqli_query($dbcon,$sel);
			while($result=mysqli_fetch_assoc($run)){
			     
			?>    
                
                        <p class="mobile-mb-50">
                          <?php echo $result['academic_description']; ?>    
                         </p>
    
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="about-img rs-image-effect-shine">
                            <img src="admin/images/academic/<?php echo $result['academic_image'] ?>" alt="img02" style="" >
                        </div>
                    </div>
                    
                     <?php } ?>
                </div>
                
                
               
            </div>
        </div>
        <!-- About Us End -->




		

       
		
       
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


</html>