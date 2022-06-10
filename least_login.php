<?php
  session_start();
  include('connect.php');
  if($_SESSION['userID'] == 'emtry'){
    exit();
  }
  if($_SESSION['user_type'] != "admin"){
    exit();
  }
  $getID = isset($_SESSION['userID']);
  $sql = "SELECT * FROM user_data WHERE u_id = $getID ";
  $result = mysqli_query($conn,$sql);
  //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
  <!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SCI-EDU | Least Login</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
   <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>



  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
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
                     echo $_SESSION["name"];
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
        <!-- top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Data List <small>List all users</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

              <div class="row" style="display: block;">
              <div class="col-md-15 col-sm-15  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Admin Least Login</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>User Name</th>
                          <th>Display Name</th>
                          <th>User Type</th>
                          <th>Last Login</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                                $sql = "SELECT * FROM user_data WHERE user_type = 'admin' ";

                                $getDisplay = mysqli_query($conn,$sql);

                                while($objGet = mysqli_fetch_array($getDisplay))
                                {
                            ?>
                        <tr>
                          <td><?php echo $objGet["username"]; ?></td>
                          <td><?php echo $objGet["display_name"]; ?></td>
                          <td><?php echo $objGet["user_type"];?></td>
                          <td><?php echo $objGet["least_login"]; ?></td>
                        </tr>
                        <?php
                                }
                        ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>


              
                    <div class="clearfix"></div>
                  </div>

                  <div class="row" style="display: block;">
              <div class="col-md-15 col-sm-15  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Staff Least Login</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>User Name</th>
                          <th>Display Name</th>
                          <th>User Type</th>
                          <th>Last Login</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                                $sql = "SELECT * FROM user_data WHERE user_type = 'staff' ";

                                $getDisplay = mysqli_query($conn,$sql);

                                while($objGet = mysqli_fetch_array($getDisplay))
                                {
                            ?>
                        <tr>
                          <td><?php echo $objGet["username"]; ?></td>
                          <td><?php echo $objGet["display_name"]; ?></td>
                          <td><?php echo $objGet["user_type"]; ?></td>
                          <td><?php echo $objGet["least_login"]; ?></td>
                        </tr>
                        <?php
                                }
                        ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>


              
                    <div class="clearfix"></div>
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

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>