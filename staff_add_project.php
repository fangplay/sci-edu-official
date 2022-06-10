<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SCI-EDU | Staff Insert Course</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>
<body class="nav-md">
<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="staff_index.php" class="site_title"><i class="fa fa-graduation-cap"></i> <span>SCI-EDU</span></a>
            </div>
            <?php
              session_start();
              require_once('connect.php');
              if($_SESSION['userID'] == "emtry"){
                exit();
              }
              if($_SESSION['user_type'] != "staff"){
                exit();
              }
              $getID = isset($_SESSION['userID']);
              $sql = "SELECT * FROM user_data WHERE u_id = $getID ";
              $result = mysqli_query($conn,$sql);
              //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            ?>
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
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Staff Add Projects</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Project Editor<small>Staff Vision</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="project_staff_add.php" id="add-data" name="add-data" method="POST">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="project-name">Project Name
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="project-name" name="project-name" class="form-control ">
                        </div>
                      </div>
                      <div class="item from-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="class-name">Class</label>
                      <div class="col-md-9 col-sm-9 ">
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" name="class[]" class="flat" value="ชั้นมัธยมศึกษาตอนต้น"> ชั้นมัธยมศึกษาตอนต้น
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="class[]" class="flat" value="ชั้นมัธยมศึกษาตอนปลาย"> ชั้นมัธยมศึกษาตอนปลาย
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="item from-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="subject-name">Subject</label>
                      <div class="col-md-9 col-sm-9 ">
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" name="subject[]" class="flat" value="คณิตศาสตร์"> คณิตศาสตร์
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="subject[]" class="flat" value="คอมพิวเตอร์"> คอมพิวเตอร์
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="subject[]" class="flat" value="ฟิสิกส์"> ฟิสิกส์
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="subject[]" class="flat" value="เคมี"> เคมี
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="subject[]" class="flat" value="ชีววิทยา"> ชีววิทยา
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="subject[]" class="flat" value="ดาราศาสตร์"> ดาราศาสตร์
                            </label>
                          </div>
                        </div>
                      </div>        
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button type="submit" name="save" id="save" class="btn btn-success">Save</button>
                        </div>
                      </div>

                    </form>
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
</div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
</body>
</html>