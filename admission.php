<!DOCTYPE html>
<html lang="zxx">
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Netaji Subhas Public School - Admission</title>
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
		
		
		<img src="./images/single_page/admission.jpg" style="width:100%;"/>
		<!-- History Start -->
        <div class="rs-history sec-spacer">
            <div class="container">
                <div class="row">
                   <!--  <div class="col-lg-6 col-md-12 rs-vertical-bottom mobile-mb-50">
                    	<a href="#">
							<img src="images/about/history.jpg" alt="History Image"/>
                    	</a>
                    </div> -->
                    <div class="col-lg-12 col-md-12">
		                <div class="abt-title">
		                    <h2>ADMISSION</h2>
		                </div>
		                
		                 <?php         
                    include 'include/config.php';
                    $sel = "SELECT * from tbl_admission where `admission_id` = '1' && `status` = '".md5("visible")."'";
                    
                    $run=mysqli_query($dbcon,$sel);
                    while($result=mysqli_fetch_assoc($run)){
                //   $admissionInformations  = json_decode($result["admission_description"]);
			   
			            ?>    
		                
                    	<div class="about-desc">
                			<p><?php echo $result["admission_description"]; ?></p>

                			
                    	</div>
                    	<?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- History End -->      		       		        
       
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