<style>
  
  .d-load {
    position: fixed;
   bottom: 7%;
    left: -97px;
    z-index: 9999;
}
  .d-load span {
    font-size: 15px;
    position: relative;
    transform: rotate( 90deg );
    transform-origin: right top;
    color: #fff;
    display: block;
    background: #ff3115;
    padding: 6px 15px;
    border-radius: 4px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
  .d-load span a {
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
}
</style>

<div class="stick-right">
                    <div class="d-load"><span><a href=""><i class="fa fa-download" aria-hidden="true"></i> Prospectus</a></span></div>
      </div>

<!--Full width header Start-->
<div class="full-width-header">
	<!-- Toolbar Start -->
	<div class="rs-toolbar">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="rs-toolbar-left">
						<div class="welcome-message">
							<i class="fa fa-bank"></i><span>Co-Education English Medium Residential School
								Affilated to CBSE, New Delhi Upto 10+2 Level</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="rs-toolbar-right">
						<div class="toolbar-share-icon">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Toolbar End -->

	<!--Header Start-->
	<header id="rs-header" class="rs-header">
		<!-- Header Top Start -->
		<div class="rs-header-top">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-12">
						<div class="logo-area text-center">
							<a href="index.php"><img src="images/logo.png" alt="logo" style=""></a>
						</div>
					</div>

					<div class="col-md-2 col-sm-12 mobile-none">

					</div>


					<?php
					include 'config.php';
					$sel = "SELECT * from tbl_change_email where `status` = '" . md5("visible") . "'";

					$run = mysqli_query($dbcon, $sel);
					while ($result = mysqli_fetch_assoc($run)) {

					?>


						<div class="col-md-2 col-sm-12 mobile-none" style="margin-top:25px;">
							<div class="header-contact">
								<div id="info-details" class="widget-text">
									<i class="glyph-icon flaticon-email"></i>
									<div class="info-text">
										<a href="mailto:info@domain.com">
											<span>Mail Us</span>
											<?php echo $result['email'] ?>
										</a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 col-sm-12 mobile-none" style="margin-top:25px;">
							<div class="header-contact pull-right">
								<div id="phone-details" class="widget-text">
									<i class="glyph-icon flaticon-phone-call"></i>
									<div class="info-text">
										<a href="tel:4155551234">
											<span>Call Us</span>
											<?php echo $result['phone_no'] ?>
										</a>
									</div>
								</div>
							</div>
						</div>
				</div>


			<?php } ?>
			</div>
		</div>
		<!-- Header Top End -->

		<!-- Menu Start -->
		<div class="menu-area menu-sticky">
			<div class="container">
				<div class="main-menu">
					<div class="row">
						<div class="col-sm-12">
							<!-- <div id="logo-sticky" class="text-center">
										<a href="index.html"><img src="images/logo.png" alt="logo"></a>
									</div> -->
							<a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
							<nav class="rs-menu">
								<ul class="nav-menu">

									<li class="current-menu-item current_page_item menu-item-has-children"> <a href="index.php" class="home">Home</a>
										<!--  <ul class="sub-menu">
												   <li><a href="index.html">Home One</a> </li>
												   <li class="active"><a href="index2.html">Home Two</a> </li>
												   <li><a href="index3.html">Home Three</a></li>
												   <li><a href="index4.html">Home Four</a> </li>
												   <li><a href="index5.html">Home Five</a> </li>
												   <li><a href="instructor-home.html">Home Instructor</a> </li>
												   <li><a href="index7.html">Home Seven</a> </li>
												   <li><a href="index8.html">Home Eight</a> </li>
												 </ul> -->
									</li>
									<!-- End Home -->

									<!--About Menu Start-->
									<li class="menu-item-has-children"> <a href="about.php">About Us</a>
										<!--   <ul class="sub-menu">
                                                    <li> <a href="about.html">About One</a></li>
                                                    <li><a href="about2.html">About Two</a></li>
                                                    <li><a href="about3.html">About Three</a></li>
                                                </ul> -->
									</li>
									<!--About Menu End-->


									<li class="menu-item-has-children"> <a href="#">Messages</a>
										<ul class="sub-menu">
											<li><a href="secretary_desk.php">Secretary Desk</a></li>
											<li><a href="principal_desk.php">Principal Desk</a></li>

										</ul>
									</li>
									<li class="menu-item-has-children"> <a href="#">School</a>
										<ul class="sub-menu">
											<li><a href="class_room.php">Class Room</a></li>
											<li><a href="computer_lab.php">Computer Lab</a></li>
											<li><a href="laboratory.php">Laboratory</a></li>
											<li><a href="library.php">Library</a></li>
											<li><a href="sports_activities.php">Sports Activities</a></li>
											<li><a href="special_academic_enviroment.php">Special Academic Environment</a></li>
											<li><a href="uniform.php">Uniform</a></li>

										</ul>
									</li>

									<!--Courses Menu Start-->
									<li class="menu-item-has-children"> <a href="gallery.php">Gallery</a>
										<!--  <ul class="sub-menu">
		                                        <li><a href="courses.html">Courses One</a></li>
		                                        <li><a href="courses2.html">Courses Two</a></li>
		                                        <li><a href="courses-details.html">Courses Details</a></li>
                                                  <li><a href="courses-details2.html">Courses Details 2</a></li>
		                                      </ul> -->
									</li>
									<!--Courses Menu End-->

									<!--Events Menu Start-->
									<li class="menu-item-has-children"> <a href="news-events.php">News & Events</a>
										<!-- <ul class="sub-menu">
													<li><a href="events.html">Events</a></li>
													<li><a href="events-details.html">Events Details</a></li>
												</ul> -->
									</li>
									<!--Events Menu End-->

									<!-- Drop Down -->
									<li class="menu-item-has-children"> <a href="admission.php">Admission</a>
										<!--  <ul class="sub-menu"> 
                                                    <li class="menu-item-has-children"> <a href="#">Teachers</a>
                                                      <ul class="sub-menu">
                                                        <li> <a href="teachers.html">Teachers</a> </li>
                                                        <li> <a href="teachers-without-filter.html">Teachers Without Filter</a> </li> 
                                                        <li> <a href="teachers-single.html">Teachers Single</a> </li>
                                                      </ul>
                                                    </li>
                                                    
                                                    <li class="menu-item-has-children"> <a href="#">Gallery</a>
                                                      <ul class="sub-menu">
                                                        <li> <a href="gallery.html">Gallery One</a> </li>
                                                        <li> <a href="gallery2.html">Gallery Two</a> </li> 
                                                        <li> <a href="gallery3.html">Gallery Three</a> </li>
                                                      </ul>
                                                    </li>
                                                    
                                                    <li class="menu-item-has-children"> <a href="#">Shop</a>
                                                      <ul class="sub-menu">
                                                        <li> <a href="shop.html">Shop</a> </li> 
                                                        <li> <a href="shop-details.html">Shop Details</a> </li>
                                                      </ul>
                                                    </li>
                                                    
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    
                                                    <li><a href="error-404.html">Error 404</a></li>
                                                </ul> -->
									</li>
									<!--End Icons -->

									<!--blog Menu Start-->
									<li class="menu-item-has-children"> <a href="#">Staff</a>
										<ul class="sub-menu">
											<li><a href="school_staff.php">School Staff</a></li>
											<li><a href="school-managing-committee.php">School Managing Committee</a></li>
										</ul>
									</li>
									<!--blog Menu End-->

									<!--Contact Menu Start-->
									<li> <a href="contact.php">Contact</a></li>
									<!--Contact Menu End-->
									<!--Exam Login Menu Start-->
									<li> <a href="https://nspsjadugora.com/admin/studentlogin" target="_blank">Exam Login</a></li>
									<!--Exam Login Menu end-->
									<li> <a href="mdp.php" target="_blank">Mandatory public disclosure</a></li>
								</ul>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Menu End -->
	</header>
	<!--Header End-->

</div>
<!--Full width header End-->