<!-- Navbar -->
  <nav class=" main-header navbar navbar-expand navbar-dark " style="background-color: #89cdfc !important;">
             
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-black" data-widget="pushmenu" href="#"><i class="fas fa-bars" style="font-size:25px;"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard" class="nav-link text-black"><strong style="font-size:18px;">Hello, <?php echo $_SESSION["logger_name"]; ?></strong></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link text-black" data-toggle="dropdown" href="#" style="color: black;">
                <i class="far fa-user" style="font-size:18px;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="images/logo.png" alt="User Avatar" class="img-size-50 mr-3" style="width:197px;">
                        <div class="media-body">
                            <h3 class="dropdown-item-title text-lg">
                                <?php echo ucfirst($_SESSION["logger_username"]); ?>
                            </h3>
                            <p class="text-sm">NSPS</p>

                        </div>
                    </div>
                    <!-- Message End -->
                </a>

                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item dropdown-footer" onclick="document.getElementById('logout').style.display='block'"><i class="fa fa-power-off"></i> Logout</a>
            </div>
        </li>
        
    </ul>
  </nav>
  <!-- /.navbar -->
  
  <!-- Logout Section Start -->
  <div id="logout" class="w3-modal" style="z-index:2020;">
      <div class="w3-modal-content w3-animate-top w3-card-4" style="width:40%">
          <header class="w3-container" style="background:#1d8749 !important; color:black;">
              <span onclick="document.getElementById('logout').style.display='none'" class="w3-button w3-display-topright">&times;</span>
              <h2 align="center">Are you sure???</h2>
          </header>
          <div class="card-body">
              <div class="col-md-12" align="center">
                  <a href="logout" class="btn btn-danger"><i class="nav-icon fa fa-power-off"></i> Log Out</a>
                  <button type="button" onclick="document.getElementById('logout').style.display='none'" class="btn btn-primary">Cancel</button>
              </div>
          </div>
      </div>
  </div>
  <!-- Logout Section End -->