<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap Style Color yellow-->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/node_modules/popper.js/dist/popper.js"></script>
    <!--add script on this file-->
    <script src="/script/add-event.js"></script>
    <script src="jQueryUI/external/jquery/jquery.js"></script>
    <script src="jQueryUI/jquery-ui.js"></script>
    <script src="jQueryUI/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Data Center Editor Final Release</title>
</head>
<body>

    <!-- Grey with black text -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.html">SCI-EDU</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">หน้าหลัก
              <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_event.php">ดำเนินการโครงการ</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="edit_event.php">รายชื่อโครงการ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staff_login.php">สำหรับเจ้าหน้าที่</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">เกี่ยวกับงานบริการ</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <header>
            <div class="container" align="center">
                <h1 class="display-4">แก้ไขข้อมูลโครงการ</h1>
            </div>
    </header>

      <form name="update-course" method="POST" action="update_2.php?ProjectID=<?=$_GET["ProjectID"]?>">
      <?php         
                include('connect.php'); 
                if(!$_GET['ProjectID']){
                    echo "<script type='text/javascript'>
                        alert('ไม่สามารถโครงการด้วยรหัสโครงการได้'); 
                        window.location = 'edit_event.php';
                        </script>"; 
                }

                $pID = $_GET['ProjectID'];
                
                $select_edit = "SELECT * FROM project_data
                LEFT JOIN school_data ON project_data.school_id = school_data.school_id 
                LEFT JOIN status_data ON project_data.status_id = status_data.status_id
                WHERE project_data.project_id = $pID";

                $objQuery = mysqli_query($conn,$select_edit) /*or die(mysqli_error($conn))*/;
                
                //$objResult = mysqli_fetch_array($objQuery);

                while ($objResult = mysqli_fetch_array($objQuery)) {
                    
             
        ?>
        <div class="form-group row">
            <legend class="col-form-label col-md-5 col-sm-5 pt-0 text-right">ชื่อโครงการ</legend>
            <div class="col-md-5 col-sm-5">
                <input type="text" id="project-name" disabled="disabled" name="projecrt-name" placeholder="<?php echo $objResult['project_name']; ?>" class="form-control ">
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-sm-5 pt-0 text-right">ชื่อโรงเรียน</legend>
            <div class="col-md-5 col-sm-5">
            <select id="school-name" disabled="true" name="school-name" class="form-control">
                          <option>กรุณาเลือกสถาบัน</option>
                          <?php
			                        $strSQL = "SELECT * FROM school_data ORDER BY school_id ASC";
			                        $objQuery = mysqli_query($conn,$strSQL);
			                        while($objResuut = mysqli_fetch_array($objQuery))
			                        {
				                        if($objResult["school_id"] == $objResuut["school_id"])
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
            $class = explode(",",$objResult['class']);
        ?>
        <div class="form-group row">
            <legend class="col-form-label col-md-5 col-sm-5 label-align text-right">ระดับชั้น</legend>
            <div class="col-md-5 col-sm-5">
                <input type="checkbox" name="class[]" id="class" value="ชั้นมัธยมศึกษาตอนต้น" <?php echo (in_array("ชั้นมัธยมศึกษาตอนต้น",$class)) ? 'checked = "checked"':''; ?> > ชั้นมัธยมศึกษาตอนต้น
                <br>
                <input type="checkbox" name="class[]" id="class" value="ชั้นมัธยมศึกษาตอนปลาย" <?php echo (in_array("ชั้นมัธยมศึกษาตอนปลาย",$class)) ? 'checked = "checked"':''; ?> > ชั้นมัธยมศึกษาตอนปลาย
            </div>
        </div>
        <?php
            $subject = explode(",",$objResult['subject']);
        ?>
        <div class="form-group row">
            <legend class="col-form-label col-md-5 col-sm-5 label-align text-right">วิชาที่อบรม</legend>
            <div class="col-md-5 col-sm-5">
                <div class="checkbox">
                <label for="check1" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="subject" value="คณิตศาสตร์" <?php echo (in_array("คณิตศาสตร์",$subject)) ? 'checked = "checked"':''; ?> > คณิตศาสตร์</label>
                </div>
                <div class="checkbox">
                <label for="check2" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="subject" value="คอมพิวเตอร์" <?php echo (in_array("คอมพิวเตอร์",$subject)) ? 'checked = "checked"':''; ?> > คอมพิวเตอร์</label>
                </div>
                <div class="checkbox">
                <label for="check3" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="subject" value="ฟิสิกส์" <?php echo (in_array("ฟิสิกส์",$subject)) ? 'checked = "checked"':''; ?> > ฟิสิกส์</label>
                </div>
                <div class="checkbox">
                <label for="check4" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="subject" value="เคมี" <?php echo (in_array("เคมี",$subject)) ? 'checked = "checked"':''; ?> > เคมี</label>
                </div>
                <div class="checkbox">
                <label for="check5" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="subject" value="ชีววิทยา" <?php echo (in_array("ชีววิทยา",$subject)) ? 'checked = "checked"':''; ?> > ชีววิทยา</label>
                </div>
                <div class="checkbox">
                <label for="check6" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="subject" value="ดาราศาสตร์" <?php echo (in_array("ดาราศาสตร์",$subject)) ? 'checked = "checked"':''; ?> > ดาราศาสตร์</label>
                </div>
            </div>
        </div>
        <div class="from-group row">
            <legend class="col-form-label col-sm-5 pt-0 text-right">วิทยาเขต</legend>
            <div class="col-md-5 col-sm-5">
                <div class="radio">
                    <input type="radio" class="flat" name="branch" id="branch" <?php if($objResult['branch']== "สงขลา") echo "checked"; ?> value="สงขลา"> สงขลา<p>
                </div>
                <div class="radio">
                    <input type="radio" class="flat" name="branch" id="branch" <?php if($objResult['branch']== "พัทลุง") echo "checked"; ?> value="พัทลุง"> พัทลุง<p>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-5 pt-0 text-right">จำนวนนักเรียน</label>
            <div class="col-md-5 col-sm-5">
                <input type="number" min="1" max="1000" class="form-control" name="count-student" value="<?php echo $objResult['count_student']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-5 pt-0 text-right">จำนวนครู</label>
            <div class="col-md-5 col-sm-5">
                <input type="number" min="1" max="100" class="form-control" name="count-teacher" value="<?php echo $objResult['count_teacher']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-md-5 col-sm-5 label-align text-right">วันอบรม</legend>
            <?php
                $dateStart = $objResult['start_day'];

                $dateEnd = $objResult['end_day'];
            ?>
            <div class="col-md-5 col-sm-5">
                <input type="date" class="form-control" id="train-day1" name="train-day1" value="<?php echo strftime('%Y-%m-%d',strtotime($dateStart)); ?>">
                <br><input type="date" class="form-control" id="train-day2" name="train-day2" value="<?php echo strftime('%Y-%m-%d',strtotime($dateEnd)); ?>">
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-md-5 col-sm-5 label-align text-right">ผู้ติดต่อ</legend>
            <div class="col-md-5 col-sm-5">
                <input type="text" class="form-control" name="contact-name" value="<?php echo $objResult['c_name']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-md-5 col-sm-5 label-align text-right">อี-เมลล์</legend>
            <div class="col-md-5 col-sm-5">
                <input type="text" class="form-control" name="e-mail" value="<?php echo $objResult['c_email']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-md-5 col-sm-5 label-align text-right">เบอร์โทรศัพท์</legend>
            <div class="col-md-5 col-sm-5">
                <input type="text" class="form-control" name="phone-number" value="<?php echo $objResult['c_phone']; ?>">
            </div>
        </div>
        <?php
                }
        ?>
        <div class="form-group row">
            <div class="col-sm-3 offset-sm-3 text-right pt-3">
                <button type="submit" name="submit" value="update" class="btn btn-primary">อัพเดทข้อมูล</button>
            </div>
        </div>
    </form>
        
</body>
</html>