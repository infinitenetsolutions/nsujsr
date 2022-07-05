<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Apr 2020 06:07:51 GMT -->

<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>Netaji Subhas Public School - About</title>
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


<img src="./images/single_page/about-us.jpg" style="width:100%;"/>
    <!-- Breadcrumbs Start -->
    <!-- <div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
        <div class="breadcrumbs-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="page-title">About Us</h1>
                        <ul>
                            <li>
                                <a class="active" href="#">Home</a>
                            </li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Breadcrumbs End -->

    <!-- History Start -->
    <div class="rs-history sec-spacer">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-6 col-md-12 rs-vertical-bottom mobile-mb-50">
                    	<a href="#">
							<img src="images/about/history.jpg" alt="History Image"/>
                    	</a>
                    </div> -->
                <div class="col-lg-12 col-md-12">
                    <div class="abt-title">
                        <h2>ABOUT US</h2>
                    </div>

                    <?php
                    include 'include/config.php';
                    $sel = "SELECT * from tbl_about where `about_id` = '1' && `status` = '" . md5("visible") . "'";

                    $run = mysqli_query($dbcon, $sel);
                    while ($result = mysqli_fetch_assoc($run)) {
                        //   echo $result["about_information"];
                        $aboutInformations  = json_decode($result["about_information"]);

                    ?>
                        <div class="about-desc">
                            <p><?php echo htmlspecialchars_decode($aboutInformations->description); ?></p>

                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- History End -->

    <!-- Mission Start -->
    <div class="rs-mission sec-color sec-spacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 mobile-mb-50">
                    <div class="abt-title">
                        <h2>OUR MISSION</h2>
                    </div>
                    <?php
                    include 'include/config.php';
                    $sel = "SELECT * from tbl_mission  where `mission_id` = '1' && `status` = '" . md5("visible") . "'";

                    $run = mysqli_query($dbcon, $sel);
                    while ($result = mysqli_fetch_assoc($run)) {
                        $missionInformations  = json_decode($result["mission_information"]);


                    ?>

                        <div class="about-desc">
                            <p> <?php echo htmlspecialchars_decode($missionInformations->description); ?>

                            </p>
                        </div>
                    <?php } ?>


                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="row">
                        <!-- <div class="col-md-6 mobile-mb-30">
                    			<a href="#">
									<img src="images/about/mission1.jpg" alt="Mission Image"/>
		                    	</a> 
                    		</div> -->

                        <a href="#">
                            <img src="images/about/mission2.jpg" alt="Mission Image" />
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mission End -->

    <!-- Vision Start -->
    <div class="rs-vision sec-spacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mobile-mb-50">
                    <div class="vision-img rs-animation-hover">
                        <img src="images/about/vision.jpg" alt="img02" />
                        <a class="popup-youtube rs-animation-fade" href="" title="Video Icon">
                        </a>
                        <div class="overly-border"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-title">
                        <h2>OUR VISION</h2>
                    </div>


                    <?php
                    include 'include/config.php';
                    $sel = "SELECT * from tbl_vision  where `vision_id` = '1' && `status` = '" . md5("visible") . "'";

                    $run = mysqli_query($dbcon, $sel);
                    while ($result = mysqli_fetch_assoc($run)) {
                        $visionInformations  = json_decode($result["vision_information"]);


                    ?>

                        <div class="vision-desc">
                            <p> <?php echo htmlspecialchars_decode($visionInformations->description); ?>

                            </p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Vision End -->


    <!-- Calltoaction Start -->
    <div id="rs-calltoaction" class="rs-calltoaction sec-spacer">
        <div class="container">
            <div class="rs-cta-inner text-center">
                <div class=" mb-50 text-center">

                    <div class="abt-title">
                        <h2 class="text-left">Our Aims and Objective</h2>
                    </div>

                    <?php
                    include 'include/config.php';
                    $sel = "SELECT * from tbl_aims  where `aim_id` = '1' && `status` = '" . md5("visible") . "'";

                    $run = mysqli_query($dbcon, $sel);
                    while ($result = mysqli_fetch_assoc($run)) {
                        // $aimInformations  = json_decode($result["aim_description"]);


                    ?>
                        <p class="white-color"></p>

                        <?php echo $result['aim_description']; ?></p>

                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
    <!-- Calltoaction End -->





    <!-- Partner Start -->
    <!--       -->
    <!-- Partner End -->

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