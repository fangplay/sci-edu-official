<?php
    include('connect.php');
    $project_name = $_POST['project_name'];
    $school_name = $_POST['school_name'];
    //filter school name to check input data
    $process = "SELECT school_name FROM school_data WHERE school_name LIKE '$school_name' ";
    $getProcess = mysqli_query($conn,$process);

    //search in array
    $ff = mysqli_num_rows($getProcess);

    if($ff > 0){
        //echo json_encode(array('status' => 'inData','m' => 'This school has saved in data store.'));
        echo "<script>alert('ชื่อสถาบันนี้ได้มีอยู่ในฐานข้อมูลแล้ว');</script>";
    }else{
        //echo json_encode(array('status' => 'error','m' => 'This school has not saved in data store.'));
        //save schoolname
        
        $save = "INSERT INTO school_data(school_name) VALUES ('$school_name')";
        $process = mysqli_query($conn,$save);
        echo "<script>alert('ชื่อสถาบันนี้ได้บันทึกในฐานข้อมูลแล้ว');</script>";
    }
?>
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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Request Course Event</title>
</head>
<body>

    <!-- Grey with black text -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="index.php">SCI-EDU</a>
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
              <li class="nav-item active">
                    <a class="nav-link" href="add_event.php">ร้องขอโครงการ</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="edit_event.php">รายชื่อโครงการ</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="staff_login.php">สำหรับเจ้าหน้าที่</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="about.html">เกี่ยวกับงานบริการวิชาการ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <!--Header-->
    <header>
            <div class="container" align="center">
                <h1 class="display-4">แบบฟอร์มเพิ่มข้อมูลร้องขอโครงการ</h1>
            </div>
    </header>
    <br>
    <form name="request" action="r2.php" method="post">
    <div class="form-group row">
            <legend class="col-from-lebel col-sm-5 pt-0 text-right">ชื่อโครงการ</legend>
            <div class="col-md-5 col-sm-5">
                <?php
                    $po = "SELECT * FROM staff_project WHERE s_p_name = '$project_name'";
                    $pq = mysqli_query($conn,$po);
                    $pr = mysqli_fetch_array($pq);
                ?>
                <input type="text" class="form-control" id="projectname" name="projectname" value="<?php echo $pr['s_p_name']; ?>" readonly>
            </div>
        </div>
        <?php
        
        ?>
        <div class="form-group row">
            <legend class="col-form-label col-sm-5 pt-0 text-right">ชื่อสถาบัน</legend>
            <div class="col-md-5 col-sm-5">
                <select name="schoolid" id="schoolid" class="form-control" readonly>
                    <option>เลือกสถาบัน</option>
                    <?php
                        $strSQL = "SELECT * FROM school_data ORDER BY school_id ASC";
                        $objQuery = mysqli_query($conn,$strSQL);
                        while($objResuut = mysqli_fetch_array($objQuery))
                        {
                            if($objResuut["school_name"] == $school_name)
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
            $class = explode(",",$pr['s_p_class']);
        ?>
        <div class="form-group row">
            <legend class="col-form-label col-sm-5 pt-0 text-right">ระดับการศึกษา</legend>
            <div class="col-md-5 col-sm-5">
                <input type="checkbox" name="class[]" class="flat" for="early-high" id="early-high" value="ชั้นมัธยมศึกษาตอนต้น" <?php echo (in_array("ชั้นมัธยมศึกษาตอนต้น",$class)) ? 'checked = "checked"':''; ?> readonly>
                <label class="form-check-label" for="early-high">มัธยมศึกษาตอนต้น</label>
                <!--br><input type="checkbox" name="year[]" id="m1" value="ม.1" disabled><label class="form-check-label" for="m1">ม.1</label>
                &nbsp; &nbsp; &nbsp;<input type="checkbox" name="year[]" id="m2" value="ม.2" disabled><label class="form-check-label" for="m2">ม.2</label>
                &nbsp; &nbsp; &nbsp;<input type="checkbox" name="year[]" id="m3" value="ม.3" disabled><label class="form-check-label" for="m3">ม.3</label-->
                <br>
                <input type="checkbox" name="class[]" class="flat" for="high-school" id="high-school" value="ชั้นมัธยมศึกษาตอนปลาย" <?php echo (in_array("ชั้นมัธยมศึกษาตอนปลาย",$class)) ? 'checked = "checked"':''; ?> readonly>
                <label class="form-check-label" for="high-school">มัธยมศึกษาตอนปลาย</label>
                <!--br><input type="checkbox" name="year[]" id="m4" value="ม.4"  disabled><label class="form-check-label" for="m4">ม.4</label>
                &nbsp; &nbsp; &nbsp;<input type="checkbox" name="year[]" id="m5" value="ม.5" disabled><label class="form-check-label" for="m5">ม.5</label>
                &nbsp; &nbsp; &nbsp;<input type="checkbox" name="year[]" id="m6" value="ม.6" disabled><label class="form-check-label" for="m6">ม.6</label-->
            <!--script>
        $(document).ready(function() {
            $('#submit').click(function() {
                var insert_c = [];
                $('.class').each(function() {
                    if ($(this).is(":checked")) {
                        insert.push($(this).val());
                    }
                });
                insert_c = insert_c.toString();
                $.ajax({
                    url: "add_data.php",
                    method: "POST",
                    data: {
                        insert_c: insert_c
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            });
        });
            </script-->
        </div>
        </div>
        <?php
            $subject = explode(",",$pr['s_p_subject']);
        ?>
        <div class="form-group row" aria-required="required">
            <legend class="col-form-label col-sm-5 pt-0 text-right">วิชาที่อบรม</legend>
            <div class="col-md-5 col-sm-5">
                <div class="input-group">
                <label for="check1" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="คณิตศาสตร์" <?php echo (in_array("คณิตศาสตร์",$subject)) ? 'checked = "checked"':''; ?> readonly> คณิตศาสตร์</label>
                </div>
                <!--input type="text" id="type_input1" placeholder="หัวข้อที่สอน" name="header-math" disabled-->
                <div class="input-group">
                <label for="check2" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="คอมพิวเตอร์" <?php echo (in_array("คอมพิวเตอร์",$subject)) ? 'checked = "checked"':''; ?> readonly> คอมพิวเตอร์</label>
                </div>
                <!--input type="text"id="type_input2" placeholder="หัวข้อที่สอน" name="header-com" disabled-->
                <div class="input-group">
                <label for="check3" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="ฟิสิกส์" <?php echo (in_array("ฟิสิกส์",$subject)) ? 'checked = "checked"':''; ?> readonly> ฟิสิกส์</label>
                </div>
                <!--input type="text" id="type_input3" placeholder="หัวข้อที่สอน" name="header-phy" disabled-->
                <div class="input-group">
                <label for="check4" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="เคมี" <?php echo (in_array("เคมี",$subject)) ? 'checked = "checked"':''; ?> readonly> เคมี</label>
                </div>
                <!--input type="text" id="type_input4" placeholder="หัวข้อที่สอน" name="header-chem" disabled-->
                <div class="input-group">
                <label for="check5" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="ชีววิทยา" <?php echo (in_array("ชีววิทยา",$subject)) ? 'checked = "checked"':''; ?> readonly> ชีววิทยา</label>
                </div>
                <!--input type="text" id="type_input5" placeholder="หัวข้อที่สอน" name="header-bio" disabled-->
                <div class="input-group">
                <label for="check6" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="ดาราศาสตร์" <?php echo (in_array("ดาราศาสตร์",$subject)) ? 'checked = "checked"':''; ?> readonly> ดาราศาสตร์</label>
                </div>                
            </div>
        </div>

        <div class="from-group row">
            <legend class="col-form-label col-sm-5 pt-0 text-right">วิทยาเขต</legend>
            <div class="col-md-5 col-sm-5">
                <input type="radio" name="branch" class="form-radio" value="สงขลา" required> สงขลา
                <br><input type="radio" name="branch" class="form-radio" value="พัทลุง" required> พัทลุง
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-sm-5 pt-0 text-right">จำนวนนักเรียน</legend>
            <div class="col-md-5 col-sm-5">
                <input type="number" min="1" max="1000" class="form-control" name="count_student" required>
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-sm-5 pt-0 text-right">จำนวนครู</legend>
            <div class="col-md-5 col-sm-5">
                <input type="number" min="1" max="100" class="form-control" name="count_teacher" required>
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-sm-5 pr-0 text-right">วันที่อบรม</legend>
            <div class="col-md-5 col-sm-5">
                <input type="date" class="form-control" name="trainDay1" required>
                <br><input type="date" class="form-control" name="trainDay2" required>
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-sm-5 pr-0 text-right">ชื่อผู้ติดต่อ</legend>
            <div class="col-md-5 col-sm-5">
                <input type="text" class="form-control" name="contact_name" required>
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-sm-5 pr-0 text-right">อีเมลล์</legend>
            <div class="col-md-5 col-sm-5">
                <input type="text" class="form-control" name="e_mail" required>
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-sm-5 pr-0 text-right">เบอร์โทรศัพท์</legend>
            <div class="col-md-5 col-sm-5">
                <input type="text" class="form-control" name="phone_number" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 offset-sm-3 text-left pt-2">
                <button type="submit" name="submit" value="save" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>
            <div class="col-sm-3 offset-sm-1 text-right pt-2">
                <button type="reset" name="clear" class="btn btn-danger">ล้างข้อมูล</button>
            </div>
        </div>
    </form>
</body>
</html>