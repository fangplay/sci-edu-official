<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>SCI-EDU | PROJECT DATA CENTER</title>

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
                <h3>Form Projects</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
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
                    <br />
                    <?php
                      //$id = $_GET['ProjectID'];

                      $getEdit = "SELECT * FROM project_data
                                  LEFT JOIN school_data ON project_data.school_id = school_data.school_id 
                                  LEFT JOIN status_data ON project_data.status_id = status_data.status_id
                                  WHERE project_data.project_id = $_GET[ProjectID]";

                      $process = mysqli_query($conn,$getEdit);

                      $ready = mysqli_fetch_array($process);                      
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="project_update.php?ProjectID=<?=$_GET["ProjectID"]?>" id="update-data" name="update-data" method="POST">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">ชื่อโครงการ
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="project-name" disabled="disabled" name="projecrt-name" placeholder="<?php echo $ready['project_name']; ?>" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">สถาบัน
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <select id="school-name" disabled="true" name="school-name" class="form-control">
                          <option>กรุณาเลือกสถาบัน</option>
                          <?php
			                        $strSQL = "SELECT * FROM school_data ORDER BY school_id ASC";
			                        $objQuery = mysqli_query($conn,$strSQL);
			                        while($objResuut = mysqli_fetch_array($objQuery))
			                        {
				                        if($ready["school_id"] == $objResuut["school_id"])
				                        {
					                        $sel = "selected";
                                }else{
                                  $sel = "";
                                }
                          ?>
                          <option value="<?=$objResuut["school_id"];?>" <?=$sel;?> ><?=$objResuut["school_name"];?></option>
                          <?php	}	?>
                        </select>
                        </div>
                      </div>
                      <?php
                          $class = explode(",",$ready['class']);
                      ?>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">ระดับชั้น</label>
                        <div class="col-md-9 col-sm-9 ">
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" disabled="true" class="flat" value="ชั้นมัธยมศึกษาตอนต้น" <?php echo (in_array("ชั้นมัธยมศึกษาตอนต้น",$class)) ? 'checked = "checked"':''; ?> > ชั้นมัธยมศึกษาตอนต้น
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" disabled="true" class="flat" value="ชั้นมัธยมศึกษาตอนปลาย" <?php echo (in_array("ชั้นมัธยมศึกษาตอนปลาย",$class)) ? 'checked = "checked"':''; ?> > ชั้นมัธยมศึกษาตอนปลาย
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">วิทยาเขต</label>
                        <div class="col-md-9 col-sm-9 ">
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" name="iCheck" <?php if($ready['branch']== "สงขลา") echo "checked"; ?> disabled="disabled" value="สงขลา"> สงขลา
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" name="iCheck" <?php if($ready['branch']== "พัทลุง") echo "checked"; ?> disabled="disabled" value="พัทลุง"> พัทลุง
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">วันที่อบรม
                        </label>
                        <?php 
                         $dateStart = $ready['start_day'];
                         //$dateS = date("m/d/Y",strtotime($dateStart));
                         $dateEnd = $ready['end_day'];
                         //$dateE = date("m/d/Y",strtotime($dateEnd));
                        ?>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="date-train1" name="date-train1" disabled="disabled" value="<?php echo strftime('%Y-%m-%d',strtotime($dateStart)); ?>" class="date-picker form-control" type="date"> &nbsp
                          <input id="date-train2" name="date-train2" disabled="disabled" value="<?php echo strftime('%Y-%m-%d',strtotime($dateEnd)); ?>" class="date-picker form-control" type="date">
                        </div>
                      </div>
                      <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">ชื่อผู้ติดต่อ
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" readonly="readonly" placeholder="<?php echo $ready['c_name'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">เบอร์โทรติดต่อ
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" readonly="readonly" placeholder="<?php echo $ready['c_phone'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">อีเมลล์ติดต่อ
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" readonly="readonly" placeholder="<?php echo $ready['c_email'];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">สถานะโครงการ</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="status" name="status" class="form-control">
                              <option class="class-option">กรุณาเลือกสถานะ</option>
                              <?php
                                $selectSch="SELECT * FROM status_data ORDER BY status_id ASC";
                                $QuerySch=mysqli_query($conn,$selectSch);
                                while($Sch=mysqli_fetch_array($QuerySch)){
                                  if($ready["status_id"] == $Sch["status_id"])
				                          {
					                          $getS = "selected";
                                  }else{
                                    $getS = "";
                                  }
                              ?>
                              <option class="class-option" value="<?=$Sch["status_id"];?>" <?=$getS;?> ><?=$Sch["status_name"];?></option>
                              <?php } ?>
                            </select>
                        </div>
                      </div>
                                
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button type="submit" name="update" id="update" class="btn btn-success">Update</button>
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