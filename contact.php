<?php
    //error_reporting(E_ALL);
  include ("include/config.php");



  if(isset($_POST['submit']))



       {
	
	

         $date = date('Y-m-d H:i:s');

        $first_name=$_POST['first_name']; 
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        
         //$visible = md5("visible");
        

    $sql="insert into  tbl_enquiry (first_name,last_name,email,subject,message,create_date)values('$first_name','$last_name','$email','$subject','$message','$date')";
    $query=mysqli_query($dbcon,$sql);
    
    if($sql)
    {
    
    
    echo "<script>
    

    window.location.replace = 'contact.php';
    </script>";
    
    }
    


  
 } 


?>




<!DOCTYPE html>
<html lang="zxx">
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Netaji Subhas Public School | Contact</title>
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
		
      
		
	<img src="./images/single_page/contact-us.jpg" style="width:100%;"/>
		
		<!-- Contact Section Start -->
		<div class="contact-page-section sec-spacer">
        	<div class="container">
        	<div class="row">
                <div class="col-md-6">

                
        		

        		<div class="contact-comment-section">
        			<h3>CONTACT US</h3>
                    <!--<div id="form-messages"></div>-->
					<form method="post">
							<div class="row">   

								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>First Name*</label>
										<input name="first_name" id="first_name" class="form-control" type="text" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Last Name*</label>
										<input name="last_name" id="last_name" class="form-control" type="text" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Email*</label>
										<input name="email" id="email" class="form-control" type="email" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Subject *</label>
										<input name="subject" id="subject" class="form-control" type="text" required>
									</div>
								</div>
							</div>
							<div class="row"> 
								<div class="col-md-12 col-sm-12">    
									<div class="form-group">
										<label>Message *</label>
										<textarea cols="40" rows="3" id="message" name="message" class="textarea form-control"></textarea>
									</div>
								</div>
							</div>							        
							<div class="form-group mb-0">
								<input class="btn-send" name="submit" type="submit" value="Submit Now">
							</div>
							   
					</form>						
        		</div>
                </div>
                <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.791572761646!2d86.26171421427827!3d22.81018572995782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f6082c4a816457%3A0xb7d2160db88ee8d7!2sNetaji%20Subhas%20Public%20School%20NSPS!5e0!3m2!1sen!2sin!4v1646908142201!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

                
        	</div>
        </div>
        <!-- Contact Section End -->     
    
       
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
        

       
        <!-- main js -->
        
    </body>

</html>