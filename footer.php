<!-- Footer Start -->
        <footer id="rs-footer" class="bg3 rs-footer">
			<div class="container">
				<!-- Footer Address -->
				<div>
				     <?php         
			include 'include/config.php';
 			$sel = "SELECT * from tbl_change_email where `status` = '".md5("visible")."'";
 		
			$run=mysqli_query($dbcon,$sel);
			while($result=mysqli_fetch_assoc($run)){
			     
			?>    
				    
				    
					<div class="row footer-contact-desc">
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-map-marker"></i>
								<h4 class="contact-title">Address</h4>
								<p class="contact-desc">
								<?php echo $result['address']; ?>
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-phone"></i>
								<h4 class="contact-title">Phone Number</h4>
								<p class="contact-desc">
								<?php echo $result['phone_no']; ?>
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-map-marker"></i>
								<h4 class="contact-title">Email Address</h4>
								<p class="contact-desc">
									<?php echo $result['email']; ?>
									
								</p>
							</div>
						</div>
					</div>
					
				<?php } ?>	
					
				</div>
			</div>
			
			 <!-- Footer Start -->
      
			
			<!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="about-widget">
                                <img src="images/footer-logo.png" alt="Footer Logo">
                                <p>Netaji Subhas Public School is one of the most reputed educational institution of the Steel City and only one of its kind in Pokhari and the adjoining areas.</p>
                                <p> It is being run in a spacious building with all necessary amenities and facilities available thereat...<a href="about.php" style="color:red;">Read More...</a></p>
                               
                            </div>
                        </div>
                       
                        <div class="col-lg-4 col-md-12">
                            <h5 class="footer-title">QUICK LINKS</h5>
                            <ul class="sitemap-widget">
                                <li class="active"><a href="index.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Home</a></li>
                                <li ><a href="about.php"><i class="fa fa-angle-right" aria-hidden="true"></i>About</a></li>
                                <li><a href="secretary_desk.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Secretary Desk</a></li>
                                <li><a href="principal_desk.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Principal Desk</a></li>
                                <li><a href="gallery.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Gallery</a></li>
                                <li><a href="news-events.php"><i class="fa fa-angle-right" aria-hidden="true"></i>News & Events</a></li>                                
                                <li><a href="admission.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Admission</a></li>
                                <li><a href="school-staff.php"><i class="fa fa-angle-right" aria-hidden="true"></i>School Staff</a></li>
                                <li><a href="school-managing-committee.php"><i class="fa fa-angle-right" aria-hidden="true"></i>School Managing Committee</a></li>
                                <li><a href="contact.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <h3 class="footer-title">GALLERY</h3>
                            
                            
                            
                          

                            
                            <ul class="flickr-feed">
                                
                                  <?php
                            include 'include/config.php';
                            $sel = "SELECT * from tbl_class_room where `status` = '".md5("visible")."'";
                            
                            $run=mysqli_query($dbcon,$sel);
                            while($result=mysqli_fetch_assoc($run)){
                            
                            
                            
                            ?>    
                                <li><a href="gallery.php"><img src="admin/images/class_room/<?php echo $result['class_room_image'] ?>" alt=""></a></li>
                                
                                  <?php } ?>   

                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                
                                  
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                 
                            </ul>
                            
                            
                            
                             <ul class="flickr-feed">
                                
                                  <?php
                            include 'include/config.php';
                            $sel = "SELECT * from tbl_laboratory where `status` = '".md5("visible")."'";
                            
                            $run=mysqli_query($dbcon,$sel);
                            while($result=mysqli_fetch_assoc($run)){
                            
                            
                            
                            ?>    
                                <li><a href="gallery.php"><img src="admin/images/laboratory/<?php echo $result['laboratory_image'] ?>" alt=""></a></li>
                                
                                  <?php } ?>   

                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                
                                  
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                 
                            </ul>
                            
                            
                           <ul class="flickr-feed">
                                
                                  <?php
                            include 'include/config.php';
                            $sel = "SELECT * from tbl_computer_lab where `status` = '".md5("visible")."'";
                            
                            $run=mysqli_query($dbcon,$sel);
                            while($result=mysqli_fetch_assoc($run)){
                            
                            
                            
                            ?>    
                                <li><a href="gallery.php"><img src="admin/images/computer_lab/<?php echo $result['computer_lab_image'] ?>" alt=""></a></li>
                                
                                  <?php } ?>   

                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                
                                  
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                <!--<li><a href="gallery.php"><img src="images/gallery/1.jpg" alt="Project Image"></a></li>-->
                                 
                            </ul>
                            
                            
                            
                        </div>
                    </div>
                    <!-- <div class="footer-share">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>   -->  
                        </ul>
                    </div>                                 
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="copyright">
                        <p>© <?php echo date('Y')?> Netaji Subhas Public School.  All Rights Reserved || Developed By <a href="http://infinitenetsolutions.com/" target="_blank" style="color:white;">Infinite Net Solutions</a></p>
                    
                  </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->




        
	<!-- modernizr js -->
	<script src="js/modernizr-2.8.3.min.js"></script>
	<!-- jquery latest version -->
	<script src="js/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- owl.carousel js -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- slick.min js -->
	<script src="js/slick.min.js"></script>
	<!-- isotope.pkgd.min js -->
	<script src="js/isotope.pkgd.min.js"></script>
	<!-- imagesloaded.pkgd.min js -->
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<!-- wow js -->
	<script src="js/wow.min.js"></script>
	<!-- counter top js -->
	<script src="js/waypoints.min.js"></script>
	<script src="js/jquery.counterup.min.js"></script>
	<!-- magnific popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- rsmenu js -->
	<script src="js/rsmenu-main.js"></script>
	<!-- plugins js -->
	<script src="js/plugins.js"></script>
	<!-- main js -->
	<script src="js/main.js"></script>



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgC6ZapXdUzFdeQOFhdm_wucwlDMMQ8CQ"></script>
<script src="//code.tidio.co/xhrmtpqskgptkhmarm3au3oasno4tmgv.js" async></script>