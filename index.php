<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Apr 2020 06:07:51 GMT -->

<head>
	<!-- meta tag -->
	<meta charset="utf-8">
	<title>Netaji Subhas Public School | Home</title>
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
	<!-- <input type="hidden" id="check" value="<?php echo $_SESSION["start"] = $_SESSION["start"]; ?>"> -->


	<!--Header start-->
	<?php require_once("include/header.php"); ?>
	<!--Header end-->



	<!-- Slider Area Start -->
	<div id="rs-slider" class="slider-overlay-1">


		<div id="home-slider">
			<!-- Item 1 -->



			<?php
			include 'include/config.php';
			$sel = "SELECT * from tbl_slider where `status` = '" . md5("visible") . "'";

			$run = mysqli_query($dbcon, $sel);
			while ($result = mysqli_fetch_assoc($run)) {

			?>


				<div class="item">
					<img src="admin/images/slider/<?php echo $result['slider_image'] ?>" alt="Slide2" />
					<div class="slide-content">
						<div class="display-table">
							<div class="display-table-cell">
								<div class="container">
									<!--<h1 class="slider-title" data-animation-in="fadeInUp" data-animation-out="animate-out">WELCOME<br>TO OUR NETAJI SUBHAS PUBLIC SCHOOL</h1>
									<p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">
									<p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">NSPS Groom The Students Who Can Face
										<br> The Future Challengs With Courage & Detarmination
									</p>
									<a href="#" class="sl-readmore-btn mr-30" data-animation-in="fadeInUp" data-animation-out="animate-out">READ MORE</a>
									<a href="#" class="sl-get-started-btn" data-animation-in="fadeInUp" data-animation-out="animate-out">GET STARTED NOW</a>-->
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php } ?>

			<!--				<div class="item">-->
			<!--					<img src="images/slider/home2/slide3.jpg" alt="Slide3" />-->
			<!--					<div class="slide-content">-->
			<!--						<div class="display-table">-->
			<!--							<div class="display-table-cell">-->
			<!--								<div class="container">-->
			<!--									<h1 class="slider-title" data-animation-in="fadeInUp" data-animation-out="animate-out">ARE YOU READY TO APPLY?</h1>-->
			<!--									<p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">NSPS Groom The Students Who Can Face-->
			<!--<br> The Future Challengs With Courage & Detarmination</p>  -->
			<!--									<a href="#" class="sl-readmore-btn mr-30" data-animation-in="fadeInUp" data-animation-out="animate-out">CONTACT US</a>-->
			<!--									<a href="#" class="sl-get-started-btn" data-animation-in="fadeInUp" data-animation-out="animate-out">ADMISSION</a>-->
			<!--								</div>-->
			<!--							</div>-->
			<!--						</div>-->
			<!--					</div>-->
			<!--				</div>-->

		</div>
		<?php //} 
		?>
	</div>




	<!-- Slider Area End -->

	<!-- About Us Start -->
	<div id="rs-about" class="rs-about sec-spacer sliver">
		<div class="container">
			<div class="sec-title mb-50 text-center">
				<h2>ABOUT US</h2>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="about-img rs-animation-hover">
						<img src="images/about/about.jpg" alt="img02" />
						<!--<a class="popup-youtube rs-animation-fade" href="https://www.youtube.com/watch?v=tzMpWiGL8D8" title="Video Icon">
						</a>-->
                      <a class="school-name" href="" title="Video Icon" style="font-size: 40px;line-height: 51px;opacity: 0;">
                        Netaji Subhas Public School
						</a>
						<div class="overly-border"></div>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">

					<?php
					include 'include/config.php';
					$sel = "SELECT * from tbl_about where `about_id` = '1' && `status` = '" . md5("visible") . "'";

					$run = mysqli_query($dbcon, $sel);
					while ($result = mysqli_fetch_assoc($run)) {
						//   echo $result["about_information"];
						$aboutInformations  = json_decode($result["about_information"]);

					?>

						<div class="about-desc">
							<h3><?php echo $aboutInformations->heading; ?></h3>
							<p><?php echo htmlspecialchars_decode($aboutInformations->short_description); ?><a href="about.php">Read More...</a></p>
						</div>

					<?php } ?>


					<div id="accordion" class="rs-accordion-style1">
						<?php
						include 'include/config.php';
						$sel = "SELECT * from tbl_mission  where `mission_id` = '1' && `status` = '" . md5("visible") . "'";

						$run = mysqli_query($dbcon, $sel);
						while ($result = mysqli_fetch_assoc($run)) {
							 $missionInformations  = json_decode($result["mission_information"]);


						?>

							<div class="card">
								<div class="card-header" id="headingTwo">
									<h3 class="acdn-title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										<?php echo $result['mission_title']; ?>
									</h3>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="card-body">
										<?php// echo htmlspecialchars_decode($missionInformations->short_description); ?>
                                      <?php echo htmlspecialchars_decode($missionInformations->short_description); ?>
                                      <a href="about.php">Read More...</a>
									</div>
								</div>
							</div>

						<?php } ?>



						<?php
						include 'include/config.php';
						$sel = "SELECT * from tbl_vision  where `vision_id` = '1' && `status` = '" . md5("visible") . "'";

						$run = mysqli_query($dbcon, $sel);
						while ($result = mysqli_fetch_assoc($run)) {
							$visionInformations  = json_decode($result["vision_information"]);
						?>
							<div class="card">
								<div class="card-header mb-0" id="headingThree">
									<h3 class="acdn-title collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										<?php echo $result['vision_title']; ?>
									</h3>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="card-body">
										<?php echo htmlspecialchars_decode($visionInformations->short_description); ?>
                                      <a href="about.php">Read More...</a></div>
								</div>
							</div>

						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About Us End -->




	<!-- Services Start -->
	<!--  <div class="rs-services rs-services-style1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">
                    	    	<i class="fa fa-american-sign-language-interpreting rs-animation-scale-up"></i>                    	        
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Class Room</h4>
                    	        <p>Lorem ipsum dolor sit amet Sed nec molestie justo</p>
                    	    </div>
                    	</div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">                    	        
                    	        <i class="fa fa-book rs-animation-scale-up"></i>
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Books & Liberary</h4>
                    	        <p>Lorem ipsum dolor sit amet Sed nec molestie justo</p>
                    	    </div>
                    	</div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">
                    	        <i class="fa fa-user rs-animation-scale-up"></i>
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Certified Teachers</h4>
                    	        <p>Lorem ipsum dolor sit amet Sed nec molestie justo</p>
                    	    </div>
                    	</div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">
                    	        <i class="fa fa-graduation-cap rs-animation-scale-up"></i>
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Certification</h4>
                    	        <p>Lorem ipsum dolor sit amet Sed nec molestie justo</p>
                    	    </div>
                    	</div>
                    </div>
                </div>
            </div>
        </div> -->


	<!-- Why Choose Us Start-->
	<div class="rs-why-choose sec-spacer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="sec-title mb-40">
						<h2>Our Aims and Objective</h2>
						<p>We are excellence school in our area</p>
					</div>

					<?php
					include 'include/config.php';
					$sel = "SELECT * from tbl_aims  where `aim_id` = '1' && `status` = '" . md5("visible") . "'";

					$run = mysqli_query($dbcon, $sel);
					while ($result = mysqli_fetch_assoc($run)) {
						//	$visionInformations  = json_decode($result["vision_information"]);			    			   
					?>
						<div class="choose-desc">
							<p><?php echo $result['aim_short_description'];  ?></p>
							<a href="about.php" style="font-size: 12px;
    border: 2px solid #222245;
    padding: 7px 13px;
    border-radius: 20px
px
;
    font-weight: 800;">READ MORE >></a>
						</div>
					<?php } ?>
					<div class="row choose-list mt-50">
						<!-- <div class="col-md-4">
                        		<div class="choose-item rs-animation-hover">
	                    	        <i class="flaticon-book-1 rs-animation-scale-up"></i>
	                    	        <h3 class="choose-title"><a href="about.php">READ MORE >>></a></h3>
	                    	    </div>
                        	</div> -->
						<!-- 	<div class="col-md-4">
                        		<div class="choose-item rs-animation-hover">
	                    	        <i class="flaticon-tool-1 rs-animation-scale-up"></i>
	                    	        <h3 class="choose-title">Popular Courses</h3>
	                    	    </div>
                        	</div> -->
						<!-- <div class="col-md-4">
                        		<div class="choose-item rs-animation-hover">
	                    	        <i class="flaticon-document rs-animation-scale-up"></i>
	                    	        <h3 class="choose-title">Guaranteed Career</h3>
	                    	    </div>
                        	</div> -->
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="choose-img">
						<img src="images/1.png" alt="Why Choose Us">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Why Choose Us End -->

	<!-- Team Start -->
	<div id="rs-team" class="rs-team sec-color sec-spacer silver">
		<div class="container">
			<div class="sec-title mb-50">
				<h2>OUR STAFFS</h2>
				<!--<p>Fusce sem dolor, interdum in efficitur at, faucibus nec lorem.Sed nec molestie justo.</p>-->
				<!-- <div class="view-more">
                		<a href="">View All Staff <i class="fa fa-angle-double-right"></i></a>
                	</div> -->
			</div>
			<div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">


				<?php
				include 'include/config.php';
				$sel = "SELECT * from tbl_staff ";
				// --  where `status` = '".md5("visible")."'";
				// -- $sel = "SELECT * from tbl_about where `status` = '".md5("visible")."'";

				$run = mysqli_query($dbcon, $sel);
				while ($result = mysqli_fetch_assoc($run)) {
					// print_r($result);
					//}
					//exit; 


				?>


					<div class="team-item">
						<div class="team-img">
							<img src="admin/images/team/<?php echo $result['staff_image'] ?>" alt="team Image" />
							<div class="normal-text">
								<h3 class="team-name"><?php echo $result['staff_name'] ?></h3>
								<span class="subtitle"><?php echo $result['staff_designation'] ?></span>
							</div>
						</div>
						<div class="team-content">
							<div class="overly-border"></div>
							<div class="display-table">
								<div class="display-table-cell">
									<h3 class="team-name"><a href="#"><?php echo $result['staff_name'] ?></a></h3>
									<span class="team-title"><?php echo $result['staff_designation'] ?></span>
									<!--<p class="team-desc">Entrusted with planning, implementation and evaluation.</p>-->
									<!--<div class="team-social">-->
									<!--	<a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>-->
									<!--	<a href="#" class="social-icon"><i class="fa fa-google-plus"></i></a>-->
									<!--	<a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>-->
									<!--	<a href="#" class="social-icon"><i class="fa fa-pinterest-p"></i></a>-->
									<!--</div>-->
								</div>
							</div>
						</div>
					</div>


				<?php } ?>


				<!--             <div class="team-item">-->
				<!--                 <div class="team-img">-->
				<!--                     <img src="images/team/2.jpg" alt="team Image" />-->
				<!--<div class="normal-text">-->
				<!--	<h3 class="team-name">Luyes Figery</h3>-->
				<!--                         <span class="subtitle">A. Professor</span>-->
				<!--</div>-->
				<!--                 </div>-->
				<!--                 <div class="team-content">-->
				<!--<div class="overly-border"></div>-->
				<!--                     <div class="display-table">-->
				<!--                         <div class="display-table-cell">-->
				<!--                             <h3 class="team-name"><a href="teachers-single.html">Luyes Figery</a></h3>-->
				<!--                             <span class="team-title">A. Professor</span>-->
				<!--                             <p class="team-desc">Entrusted with planning, implementation and evaluation.</p>-->
				<!--		<div class="team-social">-->
				<!--			<a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>-->
				<!--			<a href="#" class="social-icon"><i class="fa fa-google-plus"></i></a>-->
				<!--			<a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>-->
				<!--			<a href="#" class="social-icon"><i class="fa fa-pinterest-p"></i></a>-->
				<!--		</div>-->
				<!--                         </div>-->
				<!--                     </div>-->
				<!--                 </div>-->
				<!--             </div>-->
				<!--             <div class="team-item">-->
				<!--                 <div class="team-img">-->
				<!--                     <img src="images/team/3.jpg" alt="team Image" />-->
				<!--<div class="normal-text">-->
				<!--	<h3 class="team-name">Mr. Mahabub Alam</h3>-->
				<!--                         <span class="subtitle">Assistant Professor</span>-->
				<!--</div>-->
				<!--                 </div>-->
				<!--                 <div class="team-content">-->
				<!--<div class="overly-border"></div>-->
				<!--                     <div class="display-table">-->
				<!--                         <div class="display-table-cell">-->
				<!--                             <h3 class="team-name"><a href="teachers-single.html">Mr. Mahabub Alam</a></h3>-->
				<!--                             <span class="team-title">Assistant Professor</span>-->
				<!--                             <p class="team-desc">Entrusted with planning, implementation and evaluation.</p>-->
				<!--		<div class="team-social">-->
				<!--			<a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>-->
				<!--			<a href="#" class="social-icon"><i class="fa fa-google-plus"></i></a>-->
				<!--			<a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>-->
				<!--			<a href="#" class="social-icon"><i class="fa fa-pinterest-p"></i></a>-->
				<!--		</div>-->
				<!--                         </div>-->
				<!--                     </div>-->
				<!--                 </div>-->
				<!--             </div>-->
			</div>
		</div>
	</div>
	<!-- Team End -->

	<!-- Calltoaction Start -->
	<!-- <div id="rs-calltoaction" class="rs-calltoaction sec-spacer bg4">
            <div class="container">
                <div class="rs-cta-inner text-center">
                    <div class="sec-title mb-50 text-center">
                        <h2 class="white-color">NSPS Groom The Students Who Can Face
The Future Challengs With Courage & <br> Determination</h2>      
                        <p class="white-color">Fusce sem dolor, interdum in efficitur at, faucibus nec lorem.</p>
                    </div>
				    <a class="cta-button" href="#">Join Now</a>
				</div>
            </div>
        </div> -->
	<!-- Calltoaction End -->



	<!-- Events Start -->
	<div id="rs-events" class="rs-events sec-spacer silver">
		<div class="container">
			<div class="sec-title mb-50">
				<h2>Latest News & Events</h2>
				<p>Get latest news and events updates...</p>
				<div class="view-more">
					<a href="news-events.php">View All Events <i class="fa fa-angle-double-right"></i></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">


						<?php
						include 'include/config.php';
						$sel = "SELECT * from tbl_news  where `status` = '" . md5("visible") . "'";

						$run = mysqli_query($dbcon, $sel);
						while ($result = mysqli_fetch_assoc($run)) {



						?>

							<div class="event-item">
								<div class="event-img">
									<img src="admin/images/news/<?php echo $result['news_image'] ?>" alt="" />
									<a class="image-link" href="admin/images/news/<?php echo $result['news_image'] ?>" title="">
										<i class="fa fa-link"></i>
									</a>
								</div>
								<div class="events-details white-bg">
									<div class="event-date">
										<i class="fa fa-calendar"></i>
										<span><?php echo $result['news_date'] ?></span>
									</div>
									<h4 class="event-title"><a href="#"><?php echo $result['name'] ?></a></h4>
									<div class="event-meta">
										<!--<div class="event-time">-->
										<!--    <i class="fa fa-clock-o"></i>-->
										<!--    <span>12.30AM-05.30PM</span>-->
										<!--</div>-->
										<!--<div class="event-location">-->
										<!--<i class="fa fa-map-marker"></i>-->
										<!--<span>Venue A, Main Campus</span>-->
										<!--</div>-->
									</div>
									<div class="event-btn">
										<a href="news-events.php">Read More<i class="fa fa-angle-double-right"></i></a>
									</div>
								</div>
							</div>


						<?php } ?>

						<!--<div class="event-item">-->
						<!--    <div class="event-img">-->
						<!--        <img src="images/events/2.jpg" alt="" />-->
						<!--                 <a class="image-link" href="events-details.html" title="University Tour 2018">-->
						<!--                     <i class="fa fa-link"></i>-->
						<!--                 </a>-->
						<!--    </div>-->
						<!--             <div class="events-details white-bg">-->
						<!--                 <div class="event-date">-->
						<!--                     <i class="fa fa-calendar"></i>-->
						<!--                     <span>28 April 2017</span>-->
						<!--                 </div>-->
						<!--                 <h4 class="event-title"><a href="events-details.html">CAMPUS EXAMINATION ROOM</a></h4>-->
						<!--                 <div class="event-meta">-->
						<!--                     <div class="event-time">-->
						<!--                         <i class="fa fa-clock-o"></i>-->
						<!--                         <span>10.30AM-03.30PM</span>-->
						<!--                     </div>-->
						<!--                     <div class="event-location">-->
						<!--                         <i class="fa fa-map-marker"></i>-->
						<!--                         <span>Venue A, Main Campus</span>-->
						<!--                     </div>-->
						<!--                 </div>-->
						<!--                 <div class="event-btn">-->
						<!--                     <a href="news-events.php">Read More <i class="fa fa-angle-double-right"></i></a>-->
						<!--                 </div>-->
						<!--   	</div>-->
						<!--</div>-->
						<!--<div class="event-item">-->
						<!--    <div class="event-img">-->
						<!--        <img src="images/events/3.jpg" alt="" />-->
						<!--                 <a class="image-link" href="events-details.html" title="University Tour 2018">-->
						<!--                     <i class="fa fa-link"></i>-->
						<!--                 </a>-->
						<!--    </div>-->
						<!--             <div class="events-details white-bg">-->
						<!--                 <div class="event-date">-->
						<!--                     <i class="fa fa-calendar"></i>-->
						<!--                     <span>28 June 2017</span>-->
						<!--                 </div>-->
						<!--                 <h4 class="event-title"><a href="events-details.html">BEST GRADUATION CEREMONY</a></h4>-->
						<!--                 <div class="event-meta">-->
						<!--                     <div class="event-time">-->
						<!--                         <i class="fa fa-clock-o"></i>-->
						<!--                         <span>10.30AM-03.30PM</span>-->
						<!--                     </div>-->
						<!--                     <div class="event-location">-->
						<!--                         <i class="fa fa-map-marker"></i>-->
						<!--                         <span>Venue A, Main Campus</span>-->
						<!--                     </div>-->
						<!--                 </div>-->
						<!--                 <div class="event-btn">-->
						<!--                     <a href="news-events.php">read More <i class="fa fa-angle-double-right"></i></a>-->
						<!--                 </div>-->
						<!--   	</div>-->
						<!--</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Events End -->

	<!-- Latest News Start -->

	<!-- Latest News End -->

	<!-- Video Start -->
	<!-- <div id="rs-video" class="rs-video bg6">
			<div class="container">
				<div class="video-content">
					<a class="popup-youtube" href="https://www.youtube.com/watch?v=3f9CAMoj3Ec" title="Video Icon">
						<i class="fa fa-play"></i>
					</a>
                    <span>TAKE A TOUR</span>
				</div>
			</div>
		</div> -->
	<!-- Video End -->

	<!-- Testimonial Start -->
	<div id="rs-testimonial-2" class="rs-testimonial-2 pt-100 pb-70 sec-spacer" style="background:#dbdbdb;">
		<div class="container">
			<div class="sec-title mb-50">
				<h2>TESTIMONIAL</h2>
				<!--<p>Fusce sem dolor, interdum in efficitur at, faucibus nec lorem. Sed nec molestie justo.</p>-->
			</div>
			<div class="row">
				<div class="col-md-12">



					<div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="false" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="false" data-md-device="2" data-md-device-nav="true" data-md-device-dots="false">



						<?php
						include 'include/config.php';
						$sel = "SELECT * from tbl_testimonial where `status` = '" . md5("visible") . "'";

						$run = mysqli_query($dbcon, $sel);
						while ($result = mysqli_fetch_assoc($run)) {



						?>


							<div class="testimonial-item">
								<div class="testi-img">
									<img src="admin/images/testimonial/<?php echo $result['testimonial_image'] ?>" alt="">
								</div>
								<div class="testi-desc">
									<h4 class="testi-name"><?php echo $result['testimonial_name']; ?></h4>
									<p>
										<?php echo $result['testimonial_description']; ?>
									</p>
								</div>
							</div>

						<?php } ?>

						<!--<div class="testimonial-item">-->
						<!--    <div class="testi-img">-->
						<!--        <img src="images/testimonial/2.jpg" alt="Jhon Smith">-->
						<!--    </div>-->
						<!--    <div class="testi-desc">-->
						<!--        <h4 class="testi-name">Aliana D’suza</h4>-->
						<!--        <p>-->
						<!--            Etiam non elit nec augue tempor gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.-->
						<!--        </p>-->
						<!--    </div>-->
						<!--</div>-->
						<!--<div class="testimonial-item">-->
						<!--    <div class="testi-img">-->
						<!--        <img src="images/testimonial/3.jpg" alt="Jhon Smith">-->
						<!--    </div>-->
						<!--    <div class="testi-desc">-->
						<!--        <h4 class="testi-name">Aliana D’suza</h4>-->
						<!--        <p>-->
						<!--            Etiam non elit nec augue tempor gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.-->
						<!--        </p>-->
						<!--    </div>-->
						<!--</div>-->
						<!--<div class="testimonial-item">-->
						<!--    <div class="testi-img">-->
						<!--        <img src="images/testimonial/4.jpg" alt="Jhon Smith">-->
						<!--    </div>-->
						<!--    <div class="testi-desc">-->
						<!--        <h4 class="testi-name">Aliana D’suza</h4>-->
						<!--        <p>-->
						<!--            Etiam non elit nec augue tempor gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.-->
						<!--        </p>-->
						<!--    </div>-->
						<!--</div>-->
						<!--<div class="testimonial-item">-->
						<!--    <div class="testi-img">-->
						<!--        <img src="images/testimonial/5.jpg" alt="Jhon Smith">-->
						<!--    </div>-->
						<!--    <div class="testi-desc">-->
						<!--        <h4 class="testi-name">Aliana D’suza</h4>-->
						<!--        <p>-->
						<!--            Etiam non elit nec augue tempor gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.-->
						<!--    </div>-->
						<!--</div>-->
					</div>

					<?php //} 
					?>
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonial End -->

	<!-- Partner Start -->
	<div id="rs-partner" class="rs-partner pt-70 pb-70">
		<div class="container">
			<div class="sec-title mb-50">
				<h2>GALLERY</h2>

			</div>
			<div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="80" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="4" data-ipad-device-nav="false" data-ipad-device-dots="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">


				<?php
				include 'include/config.php';
				$sel = "SELECT * from  tbl_class_room where  `status` = '" . md5("visible") . "'";

				$run = mysqli_query($dbcon, $sel);
				while ($result = mysqli_fetch_assoc($run)) {


				?>


					<div class="partner-item">

						<a href="gallery.php"><img src="admin/images/class_room/<?php echo $result['class_room_image']; ?>" alt="Gallery Image"></a>
					</div>

				<?php } ?>

				<?php
				include 'include/config.php';
				$sel = "SELECT * from  tbl_computer_lab where  `status` = '" . md5("visible") . "'";

				$run = mysqli_query($dbcon, $sel);
				while ($result = mysqli_fetch_assoc($run)) {


				?>
					<div class="partner-item">
						<a href="gallery.php"><img src="admin/images/computer_lab/<?php echo $result['computer_lab_image']; ?>" alt="Gallery Image"></a>
					</div>
				<?php } ?>


				<?php
				include 'include/config.php';
				$sel = "SELECT * from  tbl_laboratory where  `status` = '" . md5("visible") . "'";

				$run = mysqli_query($dbcon, $sel);
				while ($result = mysqli_fetch_assoc($run)) {


				?>

					<div class="partner-item">
						<a href="gallery.php"><img src="admin/images/laboratory/<?php echo $result['laboratory_image']; ?>" alt="Gallery Image"></a>
					</div>
				<?php } ?>

				<!--<div class="partner-item">-->
				<!--    <a href="gallery.php"><img src="images/gallery/1.jpg" alt="Gallery Image"></a>-->
				<!--</div>-->
				<!--<div class="partner-item">-->
				<!--    <a href="gallery.php"><img src="images/gallery/1.jpg" alt="Gallery Image"></a>-->
				<!--</div>-->
			</div>
		</div>
	</div>
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


</body>


</html>