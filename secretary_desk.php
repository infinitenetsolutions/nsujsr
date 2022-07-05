<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>Netaji Subhas Public School - Secretary Desk</title>
    <meta name="description" content="">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Css Section Start -->
    <?php require_once("include/css.php"); ?>
    <!-- Css Section End -->
  <style>
    @media(min-width:576px){
    .sec-img img{
     margin-top: 110px!important;
    width: 400px!important; 
    }
    }
  </style>
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


    <img src="./images/single_page/secretary-message.jpg" style="width:100%;"/>
    

  
  
  
  
  <div class="rs-mission sec-spacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 mobile-mb-50">
                    <div class="abt-title">
                        <h2>SECRETARY DESK</h2>
                    </div>                    

                        <div class="about-desc">
                          <?php
                    include 'include/config.php';
                    $sel = "SELECT * from tbl_secretary_desk where `secretary_id` = '1' && `status` = '" . md5("visible") . "'";

                    $run = mysqli_query($dbcon, $sel);
                    while ($result = mysqli_fetch_assoc($run)) {


                    ?>
                            <p> </p><div style="text-align: justify;"><div><font color="#505050"><br></font></div><div><font color="#505050"><?php echo $result['secretary_description']; ?></p></font></div></div>
                            <p></p>
                        </div>
                    
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="row sec-img">
                        <!-- <div class="col-md-6 mobile-mb-30">
                    			<a href="#">
									<img src="images/about/mission1.jpg" alt="Mission Image"/>
		                    	</a> 
                    		</div> -->

                        <a href="#">
                            <img src="./admin/images/message/<?php echo $result['secretary_image']; ?>" alt="SECRETARY DESK">
                        </a>

                    </div>
                </div>
             <?php } ?>
            </div>
        </div>
    </div>
  
  
  
  
  
  


    <!-- Footer Start -->

    <!-- Footer Top -->
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