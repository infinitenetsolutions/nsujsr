<!DOCTYPE html>
<html lang="zxx">
    

<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Netaji Subhas Public School - Computer Lab</title>
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
        
        
        <img src="./images/single_page/computer-lab.jpg" style="width:100%;"/>
        <!-- Gallery Start -->
        <div class="rs-gallery-4 rs-gallery sec-spacer">
            <div class="container">
                <div class="sec-title-2 mb-50 text-center">
                    <h2>Computer Lab </h2>      
                    <!--<p>Considering primary motivation for the generation of narratives is a useful concept</p>-->
                </div>
                <div class="row">
                    
                    <?php         
			include 'include/config.php';
 			$sel = "SELECT * from   tbl_computer_lab where  `status` = '".md5("visible")."'";
 		
			$run=mysqli_query($dbcon,$sel);
			while($result=mysqli_fetch_assoc($run)){
			     
			   
			?>    
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="gallery-item">
                            <img src="admin/images/computer_lab/<?php echo $result['computer_lab_image']; ?>" alt="Gallery Image" />
                            <div class="gallery-desc">
                                <!--<h3><a href="#">Photo Title Here</a></h3>-->
                                <!--<p>There are many variations of Lorem Ipsum available</p>-->
                                <a class="image-popup" href="admin/images/computer_lab/<?php echo $result['computer_lab_image']; ?>" title="Computer Lab">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    
                    <?php } ?>
                   
                 
                 
                </div>
              
            
            </div>
        </div>
        <!-- Gallery End -->
       
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