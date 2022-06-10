<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SCI-EDU | Staff Dashboard</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
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
        if($_SESSION['user_type'] != "staff"){
            exit();
        }
        $getID = isset($_SESSION['userID']);
        $sql = "SELECT * FROM user_data WHERE user_id = $getID ";
        $result = mysqli_query($conn,$sql);
      ?>
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="staff-index.php" class="site_title"><i class="fa fa-graduation-cap"></i> <span>SCI-EDU</span></a>
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
                      <li><a href="staff_index.php">Staff Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-book"></i> Projects <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="project_list.php">Project List Data</a></li>
                      <li><a href="staff_add_project.php">Project Insert</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i>Staff Infrmation<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="staff_edit.php">Edit Data</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
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
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" style="display: inline-block;">
            <div class="top_tiles">
              <?php
                $a1 = "SELECT * FROM project_data WHERE status_id = '1' OR status_id = '2' ";

                $b1 = mysqli_query($conn,$a1);

                $row1 = mysqli_num_rows($b1);
              ?>
              <div class="animated flipInY col-lg-6 col-md-5 col-sm-16 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-plus"></i></div>
                  <div class="count"></div>
                  <h3>Project Request</h3>
                  <p>โครงการที่เพิ่มและร้องขอโครงการ</p>
                  <div class="count"><?php echo $row1; ?></div>
                </div>
              </div>
              <?php
                $a2 = "SELECT * FROM project_data WHERE status_id = '3' ";

                $b2 = mysqli_query($conn,$a2);

                $row2 = mysqli_num_rows($b2);
              ?>
              <div class="animated flipInY col-lg-6 col-md-5 col-sm-16 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-tags"></i></div>
                  <div class="count"></div>
                  <h3>Project Accepted</h3>
                  <p>โครงการได้รับยืนยันเรียบร้อยแล้ว</p>
                  <div class="count"><?php echo $row2; ?></div>
                </div>
              </div>
              <?php
              $a3 = "SELECT * FROM project_data WHERE status_id = '4' ";

              $b3 = mysqli_query($conn,$a3);

              $row3 = mysqli_num_rows($b3);
              ?>
              <div class="animated flipInY col-lg-6 col-md-5 col-sm-16 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments"></i></div>
                  <div class="count"></div>
                  <h3>Project In-Progress</h3>
                  <p>โครงการที่กำลังดำเนินการ</p>
                  <div class="count"><?php echo $row3; ?></div>
                </div>
              </div>
              <?php
                $a4 = "SELECT * FROM project_data WHERE status_id = '5' ";

                $b4 = mysqli_query($conn,$a4);

                $row4 = mysqli_num_rows($b4);
              ?>
              <div class="animated flipInY col-lg-6 col-md-5 col-sm-16 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <div class="count"></div>
                  <h3>Project Completed</h3>
                  <p>โครงการที่เสร็จสิ้นเรียบร้อยแล้ว</p>
                  <div class="count"><?php echo $row4; ?></div>
                </div>
              </div>
            </div>
          </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Project Summary <small>Recent 10 Projects From Now</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-15 col-sm-12 ">


                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>รหัสโครงการ</th>
                          <th>ชื่อโครงการ</th>
                          <th>สถาบัน</th>
                          <th>สถานะโครงการ</th>
                          <th>วันที่แก้ข้อมูลล่าสุด</th>
                        </tr>
                      </thead>
                      <?php
                        require_once('connect.php');

                        $set = "SELECT * FROM project_data LEFT JOIN school_data ON project_data.school_id = school_data.school_id LEFT JOIN status_data ON project_data.status_id = status_data.status_id ORDER BY least_date DESC LIMIT 0, 10";

                        $rr = mysqli_query($conn,$set);

                        while($objResult = mysqli_fetch_array($rr)){

                        
                      ?>
                      <tbody>
                        <tr>
                          <td><?php printf("%d",$objResult["project_id"])?></td>
                          <td><?php printf("%s",$objResult["project_name"])?></td>
                          <td><?php printf("%s",$objResult['school_name'])?></td>
                          <td><?php printf("%s",$objResult['status_name'])?></td>
                          <td><?php printf("%s",$objResult['least_date'])?></td>
                        </tr>
                      </tbody>
                        <?php } ?>
                    </table>

                    <div class="col-md-3 col-sm-12 ">
                      <div>
                        <ul class="list-unstyled top_profiles scroll-view">
                          
                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
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
    <!-- jQuery Sparklines -->
    <script src="vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
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
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>