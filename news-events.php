<!DOCTYPE html>
<html lang="zxx">
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Netaji Subhas Public School - News & Events</title>
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
		
		<img src="./images/single_page/news-and-events.jpg" style="width:100%;"/>
		
<!-- Events Start -->
        <div class="rs-events-2 sec-spacer">
            <div class="container">
                <div class="row space-bt30">
                    
                    <?php         
			include 'include/config.php';
 			$sel = "SELECT * from  tbl_news where  `status` = '".md5("visible")."'";
 		
			$run=mysqli_query($dbcon,$sel);
			while($result=mysqli_fetch_assoc($run)){
			    
			    //$date = <?php echo $result['news_date']; 
               
			     
			   
			?>    
                    
                    
                    <div class="col-lg-6 col-md-12">
                        <div class="event-item">
                            <div class="row rs-vertical-middle">
                                <div class="col-md-6">
                                    <div class="event-img">
                                        <img src="admin/images/news/<?php echo $result['news_image']; ?>" alt="events Images" />
                                        <a class="image-link" href="#" title="">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>                              
                                </div>
                                <div class="col-md-6">
                                    <div class="event-content">
                                        <div class="event-meta">
                                            <div class="event-date">
                                                <i class="fa fa-calendar"></i>
                                                <span><?php //echo date('F d Y', strtotime($date)); ?><?php echo $result['news_date']; ?></span>
                                            </div>
                                            <!--<div class="event-time">-->
                                            <!--    <i class="fa fa-clock-o"></i>-->
                                            <!--    <span>12.30AM-05.30PM</span>-->
                                            <!--</div>-->
                                        </div>
                                        <h3 class="event-title"><a href="#"><?php echo $result['name']; ?></a></h3>
                                        <div class="event-location">
                                            <!--<i class="fa fa-map-marker"></i>-->
                                            <span></span>
                                        </div>
                                        <div class="event-desc">
                                            <p>
                                                <!--There are many variations of passag of Lorem Ipsum available, but the majority have suffered.-->
                                            </p>
                                        </div>
                                       <!--  <div class="event-btn">
                                            <a href="events-details.html">Join Event</a>
                                        </div> -->
                                    </div>                          
                                </div>
                            </div>                          
                        </div>
                    </div>
                    <?php } ?>
                    
                    
                  
                </div>
               
           
            </div>
        </div>
        <!-- Events End -->		       		
       
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