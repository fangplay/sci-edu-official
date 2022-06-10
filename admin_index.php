<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>SCI-EDU | Admin Dashboard </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php
          session_start();
          include('connect.php');
          if($_SESSION['userID'] == "emtry"){
                exit();
          }
          if($_SESSION['user_type'] != "admin"){
                exit();
          }
          $getID = isset($_SESSION['userID']);
          $sql = "SELECT * FROM user_data WHERE u_id = $getID ";
          $result = mysqli_query($conn,$sql);
        ?>
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="admin_index.php" class="site_title"><i class="fa fa-graduation-cap"></i> <span>SCI-EDU</span></a>
            </div>

            <div class="clearfix"></div>

            
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION["name"]; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admin_index.php">Admin Dashboard</a></li>
                      <li><a href="least_login.php">Least Login</a></li>
                    </ul>
                  </li>
                  </li>
                  <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="user_list.php">Data List</a></li>
                      <li><a href="user_add.php">Add User</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <?php
                     printf($_SESSION["name"]);
                     //echo "$objDisplay['display_name']";
                    ?>
                  </a>

                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <?php
            require('connect.php');

            $ssl1 = "SELECT * FROM user_data";

            $get1 = mysqli_query($conn,$ssl1);

            $ready1 = mysqli_num_rows($get1);  

          ?>
            <div class="col-md-5 col-sm-4 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
            <div class="count"><?php echo $ready1; ?></div>
            </div>
            <?php
            
            $ssl2 = "SELECT * FROM user_data WHERE user_type = 'admin' ";

            $get2 = mysqli_query($conn,$ssl2);

            $ready2 = mysqli_num_rows($get2); 
            
          ?>
            <div class="col-md-5 col-sm-4 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Admins</span>
              <div class="count green"><?php echo $ready2; ?></div>
            </div>
            <?php
            require_once('connect.php');

            $ssl3 = "SELECT * FROM user_data WHERE user_type = 'staff'";
            
            $get3 = mysqli_query($conn,$ssl3);
            
            $ready3 = mysqli_num_rows($get3);

          ?>
            <div class="col-md-5 col-sm-4 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Staffs</span>
              <div class="count blue"><?php echo $ready3; ?></div>
            </div>
          </div>
        </div>
          <!-- /top tiles -->

                <!-- End to do list -->
                <br>
                <!-- start of weather widget -->
                <div class="col-md-6 col-sm-6 ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Active Users <small>Daily</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                      <div class="x_content">
                  </div>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>USERNAME</th>
                          <th>DISPLAYNAME</th>
                          <th>User Type</th>
                          <th>TIME LOGIN</th>
                        </tr>
                      </thead>
                      <?php

                        $get = "SELECT * FROM user_data WHERE least_login > DATE_SUB(NOW(), INTERVAL 1 DAY)";

                        $tt = mysqli_query($conn,$get);

                        while($getA = mysqli_fetch_array($tt)){
                      ?>
                      <tbody>
                        <tr>
                          <th scope="row"><?php echo $getA["u_id"]; ?></th>
                          <td><?php echo $getA["username"]; ?></td>
                          <td><?php echo $getA["display_name"]; ?></td>
                          <td><?php echo $getA["user_type"]; ?></td>
                          <td><?php echo $getA["least_login"]; ?></td>
                        </tr>
                      </tbody>
                        <?php } ?>
                    </table>


                    
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Active Users <small>Weekly</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>USERNAME</th>
                          <th>DISPLAYNAME</th>
                          <th>User Type</th>
                          <th>TIME LOGIN</th>
                        </tr>
                      </thead>
                      <?php
                      $getG = "SELECT * FROM user_data WHERE least_login > DATE_SUB(NOW(), INTERVAL 1 WEEK)";

                      $dd = mysqli_query($conn,$getG);

                      while($getR = mysqli_fetch_array($dd)){
                    ?>
                      <tbody>
                        <tr>
                          <th scope="row"><?php echo $getR["u_id"]; ?></th>
                          <td><?php echo $getR["username"]; ?></td>
                          <td><?php echo $getR["display_name"]; ?></td>
                          <td><?php echo $getR["user_type"]; ?></td>
                          <td><?php echo $getR["least_login"]; ?></td>
                        </tr>
                      </tbody>
                        <?php } ?>
                    </table>

                  </div>                  
                </div>
              </div>

              
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Active Users <small>Monthly</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>USERNAME</th>
                          <th>DISPLAYNAME</th>
                          <th>User Type</th>
                          <th>TIME LOGIN</th>
                        </tr>
                      </thead>
                      <?php
                      $getG = "SELECT * FROM user_data WHERE least_login > DATE_SUB(NOW(), INTERVAL 1 MONTH)";

                      $dd = mysqli_query($conn,$getG);

                      while($getR = mysqli_fetch_array($dd)){
                    ?>
                      <tbody>
                        <tr>
                          <th scope="row"><?php echo $getR["u_id"]; ?></th>
                          <td><?php echo $getR["username"]; ?></td>
                          <td><?php echo $getR["display_name"]; ?></td>
                          <td><?php echo $getR["user_type"]; ?></td>
                          <td><?php echo $getR["least_login"]; ?></td>
                        </tr>
                      </tbody>
                        <?php } ?>
                    </table>

                  </div>                  
                </div>
              </div>

              <div class="clearfix"></div>
              
                </div>
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ©2020 BetaDevTeam All Rights Reserved.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
</html>
