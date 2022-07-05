<?php require_once("include/authority.php"); ?>
 <!-- Main Sidebar Container -->
 <style>
     [class*=sidebar-light-] .sidebar a {
    color: #d9d9d9!important;
}
 </style>
  <aside class="main-sidebar sidebar-light-primary elevation-4" style="background:#04263f;">
      <!-- Brand Logo -->
      <!--<a href="dashboard" class="brand-link">-->
      <!--    <img src="images/logo.png" alt="NSU Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
      <!--    <span class="brand-text font-weight-light" style="font-size: 18px;">Netaji Subhas University</span>-->
      <!--</a>-->

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel pb-3 d-flex pt-3 pb-3" style="background-color: #89cdfc !important;">
              <div class="image">
                  <center><img src="images/logo.png" class="" alt="User Image" style="width: 100% !important;"></center>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item has-treeview" <?php echo authorityCheck(1); ?>>
                      <a href="dashboard" class="nav-link text-black <?php if($page_no == "1"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <!--<li class="nav-item has-treeview <?php if($page_no == "2"){ echo 'menu-open'; } ?>" <?php echo authorityCheck(2); ?>>
                      <a href="#" class="nav-link text-black <?php if($page_no == "2"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Administration
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="admin-view" class="nav-link text-black <?php if($page_no_inside == "2_1"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Admin List</p>
                              </a>
                          </li>
                      </ul>
                  </li>-->
                   <li class="nav-item has-treeview" <?php echo authorityCheck(1); ?>>
                      <a href="slider" class="nav-link text-black <?php if($page_no == "3"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-address-card"></i>
                          <p>
                              Slider
                          </p>
                      </a>
                  </li>
                  <li class="nav-item has-treeview <?php if($page_no == "4"){ echo 'menu-open'; } ?>" <?php echo authorityCheck(4); ?>>
                      <a href="#" class="nav-link text-black <?php if($page_no == "4"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-info-circle"></i>
                          <p>
                              About
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="about?about-us" class="nav-link text-black <?php if($page_no_inside == "4_1"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>About Us</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="about?mission" class="nav-link text-black <?php if($page_no_inside == "4_2"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Our Mission</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="about?vision" class="nav-link text-black <?php if($page_no_inside == "4_3"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Our Vision</p>
                              </a>
                          </li> 
                          
                          
                           <li class="nav-item">
                              <a href="aim_objective" class="nav-link text-black <?php if($page_no_inside == "4_4"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Aims & Objective</p>
                              </a>
                          </li> 

                      </ul>
                  </li>
				   <li class="nav-item has-treeview <?php if($page_no == "5"){ echo 'menu-open'; } ?>" <?php echo authorityCheck(5); ?>>
                      <a href="#" class="nav-link text-black <?php if($page_no == "5"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Our Staff
                              <i class="fas fa-angle-left right"></i>
<!--                              <span class="badge badge-danger right">2</span>-->
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="staff" class="nav-link text-black <?php if($page_no_inside == "5_1"){ echo 'active'; } ?>">
                                 <i class="nav-icon fas fa-users"></i>
                                  <p>School Staff</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="management_team" class="nav-link text-black <?php if($page_no_inside == "5_2"){ echo 'active'; } ?>">
                                  <i class="nav-icon fas fa-users"></i>
                                  <p>School Managing Committee</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item has-treeview" <?php echo authorityCheck(6); ?>>
                      <a href="gallery" class="nav-link text-black <?php if($page_no == "6"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-address-card"></i>
                          <p>
                              Our Gallery
                          </p>
                      </a>
                  </li>
				  <li class="nav-item has-treeview" <?php echo authorityCheck(7); ?>>
                      <a href="news" class="nav-link text-black <?php if($page_no == "7"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-address-card"></i>
                          <p>
                              News & Events
                          </p>
                      </a>
                  </li>
                  <li class="nav-item has-treeview <?php if($page_no == "8"){ echo 'menu-open'; } ?>" <?php echo authorityCheck(8); ?>>
                      <a href="#" class="nav-link text-black <?php if($page_no == "8"){ echo 'active'; } ?>">
                    <i class="nav-icon fas fa-envelope"></i>
                          <p>
                              Messages
                              <i class="fas fa-angle-left right"></i>
<!--                              <span class="badge badge-danger right">2</span>-->
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="secretary_desk" class="nav-link text-black <?php if($page_no_inside == "8_1"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Secretary Desk</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="principal_desk" class="nav-link text-black <?php if($page_no_inside == "8_2"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Principal Desk</p>
                              </a>
                          </li>
                      </ul>
                  </li>
				  
				  
				  
				  
				  <li class="nav-item has-treeview <?php if($page_no == "9"){ echo 'menu-open'; } ?>" <?php echo authorityCheck(9); ?>>
                      <a href="#" class="nav-link text-black <?php if($page_no == "9"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-building"></i>
                          <p>
                              School
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="class_room" class="nav-link text-black <?php if($page_no_inside == "9_1"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Class Room</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="computer_lab" class="nav-link text-black <?php if($page_no_inside == "9_2"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Computer Lab</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="laboratory" class="nav-link text-black <?php if($page_no_inside == "9_3"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Laboratory</p>
                              </a>
                          </li> 
                       <li class="nav-item">
                              <a href="library" class="nav-link text-black <?php if($page_no_inside == "9_4"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Library</p>
                              </a>
                          </li> 
                          <li class="nav-item">
                              <a href="sports_activities" class="nav-link text-black <?php if($page_no_inside == "9_5"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Sports Activities</p>
                              </a>
                          </li> 

                         <li class="nav-item">
                              <a href="academic" class="nav-link text-black <?php if($page_no_inside == "9_6"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Special Academic Environment</p>
                              </a>
                          </li> 

                          <li class="nav-item">
                              <a href="uniform" class="nav-link text-black <?php if($page_no_inside == "9_7"){ echo 'active'; } ?>">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>Uniform</p>
                              </a>
                          </li> 						  
                      </ul>
                  </li>

                  <li class="nav-item has-treeview" <?php echo authorityCheck(14); ?>>
                      <a href="subject" class="nav-link text-black <?php if($page_no == "14"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-bookmark"></i>
                          <p>
                            Subject
                          </p>
                      </a>
                  </li>
                     <li class="nav-item has-treeview" <?php echo authorityCheck(12); ?>>
                      <a href="exam" class="nav-link text-black <?php if($page_no == "12"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-file-alt"></i>
                          <p>
                            Exam
                          </p>
                      </a>
                  </li> 
                  <li class="nav-item has-treeview" <?php echo authorityCheck(13); ?>>
                      <a href="student" class="nav-link text-black <?php if($page_no == "13"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                            Student List
                          </p>
                      </a>
                  </li>
                  
                  <!-- <li class="nav-item has-treeview" <?php //echo authorityCheck(9); ?>>
                      <a href="award" class="nav-link text-black <?php //if($page_no == "9"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-address-card"></i>
                          <p>
                              Award
                          </p>
                      </a>
                  </li>-->

				  


                  <li class="nav-item has-treeview" <?php echo authorityCheck(14); ?>>
                      <a href="admission" class="nav-link text-black <?php if($page_no == "14"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-bookmark"></i>
                          <p>
                          Admission
                          </p>
                      </a>
                  </li>


                  
                  
                  
                  <li class="nav-item has-treeview" <?php echo authorityCheck(11); ?>>
                      <a href="about?change-email" class="nav-link text-black <?php if($page_no == "16"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-link"></i>
                          <p>
                              Change Link & Email
                          </p>
                      </a>
                  </li>	
                  
                  
                   <li class="nav-item has-treeview" <?php echo authorityCheck(10); ?>>
                      <a href="testimonial" class="nav-link text-black <?php if($page_no == "10"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-address-card"></i>
                          <p>
                              Testimonial
                          </p>
                      </a>
                  </li>
                  <li class="nav-item has-treeview" <?php echo authorityCheck(11); ?>>
                      <a href="enquiry" class="nav-link text-black <?php if($page_no == "11"){ echo 'active'; } ?>">
                          <i class="nav-icon fas fa-phone"></i>
                          <p>
                              Contact Us
                          </p>
                      </a>
                  </li>	
                  <li class="nav-item has-treeview">
                      <a href="javascript:void(0)" class="nav-link text-black" onclick="document.getElementById('logout').style.display='block'">
                          <i class="nav-icon fa fa-power-off"></i>
                          <p>
                              Log Out
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>