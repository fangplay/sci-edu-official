<?php
error_reporting(0);
include("connect.php");
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
    <link rel="stylesheet" href="jQueryUI/jquery-ui.css">
    <link rel="stylesheet" href="jQueryUI/jquery-ui.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="jQuery/jquery-3.4.1.js"></script>
    <script src="jQuery/jquery-3.4.1.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/node_modules/popper.js/dist/popper.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Course Event</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="add_event.php">ดำเนินการโครงการ</a>
          </li>
          <li class="nav-item">
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

    <!--Header-->
    <header>
        <div class="container" align="center">
            <h1 class="display-3">ดำเนินการโครงการ</h1>
        </div>
    </header>
    <br>
    <?php
    $p_id = $_GET['pID'];
    $sel_p = "SELECT * FROM staff_project WHERE s_p_id = $p_id";
    $rQuery = mysqli_query($conn, $sel_p);

    while ($qr = mysqli_fetch_array($rQuery)) {


    ?>
        <form name="add-course" action="save_3.php" method="post">
            <div class="form-group row">
                <legend class="col-from-lebel col-sm-5 pt-0 text-right">ชื่อโครงการ</legend>
                <div class="col-md-5 col-sm-5">
                    <input type="text" class="form-control" name="projectname" id="projectname" value="<?php echo $qr['s_p_name']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <legend class="col-form-label col-sm-5 pt-0 text-right">ชื่อสถาบัน</legend>
                <div class="col-md-5 col-sm-5">
                    <select class="form-control" name="schoolid" id="schoolid" required>
                        <option>กรุณาเลือกสถาบัน</option>
                        <?php
                        $selectSch = "SELECT * FROM school_data";
                        $QuerySch = mysqli_query($conn, $selectSch);
                        while ($Sch = mysqli_fetch_array($QuerySch)) {
                            unset($s_id, $s_fname);
                            $s_id = $Sch['school_id'];
                            $s_name = $Sch['school_name'];
                        ?>
                            <option id="<?= $s_id ?>" value="<?= $s_id ?>"><?= $s_name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <?php
            $class = explode(",", $qr['s_p_class']);
            ?>
            <div class="form-group row">
                <legend class="col-form-label col-sm-5 pt-0 text-right">ระดับการศึกษา</legend>
                <div class="col-md-5 col-sm-5">
                    <input type="checkbox" name="class[]" class="flat" for="early-high" id="early-high" value="ชั้นมัธยมศึกษาตอนต้น" <?php echo (in_array("ชั้นมัธยมศึกษาตอนต้น", $class)) ? 'checked = "checked"' : ''; ?> readonly>
                    <label class="form-check-label" for="early-high">มัธยมศึกษาตอนต้น</label>
                    <!--br><input type="checkbox" name="year[]" id="m1" value="ม.1" disabled><label class="form-check-label" for="m1">ม.1</label>
                &nbsp; &nbsp; &nbsp;<input type="checkbox" name="year[]" id="m2" value="ม.2" disabled><label class="form-check-label" for="m2">ม.2</label>
                &nbsp; &nbsp; &nbsp;<input type="checkbox" name="year[]" id="m3" value="ม.3" disabled><label class="form-check-label" for="m3">ม.3</label-->
                    <br>
                    <input type="checkbox" name="class[]" class="flat" for="high-school" id="high-school" value="ชั้นมัธยมศึกษาตอนปลาย" <?php echo (in_array("ชั้นมัธยมศึกษาตอนปลาย", $class)) ? 'checked = "checked"' : ''; ?> readonly>
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
            $subject = explode(",", $qr['s_p_subject']);
            ?>
            <div class="form-group row" aria-required="required">
                <legend class="col-form-label col-sm-5 pt-0 text-right">วิชาที่อบรม</legend>
                <div class="col-md-5 col-sm-5">
                    <div class="input-group">
                        <label for="check1" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="คณิตศาสตร์" <?php echo (in_array("คณิตศาสตร์", $subject)) ? 'checked = "checked"' : ''; ?> readonly> คณิตศาสตร์</label>
                    </div>
                    <!--input type="text" id="type_input1" placeholder="หัวข้อที่สอน" name="header-math" disabled-->
                    <div class="input-group">
                        <label for="check2" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="คอมพิวเตอร์" <?php echo (in_array("คอมพิวเตอร์", $subject)) ? 'checked = "checked"' : ''; ?> readonly> คอมพิวเตอร์</label>
                    </div>
                    <!--input type="text"id="type_input2" placeholder="หัวข้อที่สอน" name="header-com" disabled-->
                    <div class="input-group">
                        <label for="check3" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="ฟิสิกส์" <?php echo (in_array("ฟิสิกส์", $subject)) ? 'checked = "checked"' : ''; ?> readonly> ฟิสิกส์</label>
                    </div>
                    <!--input type="text" id="type_input3" placeholder="หัวข้อที่สอน" name="header-phy" disabled-->
                    <div class="input-group">
                        <label for="check4" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="เคมี" <?php echo (in_array("เคมี", $subject)) ? 'checked = "checked"' : ''; ?> readonly> เคมี</label>
                    </div>
                    <!--input type="text" id="type_input4" placeholder="หัวข้อที่สอน" name="header-chem" disabled-->
                    <div class="input-group">
                        <label for="check5" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="ชีววิทยา" <?php echo (in_array("ชีววิทยา", $subject)) ? 'checked = "checked"' : ''; ?> readonly> ชีววิทยา</label>
                    </div>
                    <!--input type="text" id="type_input5" placeholder="หัวข้อที่สอน" name="header-bio" disabled-->
                    <div class="input-group">
                        <label for="check6" class="form-check-label"><input type="checkbox" id="subject" name="subject[]" class="flat" value="ดาราศาสตร์" <?php echo (in_array("ดาราศาสตร์", $subject)) ? 'checked = "checked"' : ''; ?> readonly> ดาราศาสตร์</label>
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
                    <input type="number" min="1" max="1000" class="form-control" name="countStudent" required>
                </div>
            </div>
            <div class="form-group row">
                <legend class="col-form-label col-sm-5 pt-0 text-right">จำนวนครู</legend>
                <div class="col-md-5 col-sm-5">
                    <input type="number" min="1" max="100" class="form-control" name="countTeacher" required>
                </div>
            </div>
            <div class="form-group row">
                <legend class="col-form-label col-sm-5 pr-0 text-right">วันที่อบรม</legend>
                <div class="col-md-5 col-sm-5">
                    <input type="date" id="datepicker" class="form-control" name="trainDay1" required>
                    <br><input type="date" id="datepicker" class="form-control" name="trainDay2" required>
                </div>
            </div>
            <div class="form-group row">
                <legend class="col-form-label col-sm-5 pr-0 text-right">ชื่อผู้ติดต่อ</legend>
                <div class="col-md-5 col-sm-5">
                    <input type="text" class="form-control" name="contactName" required>
                </div>
            </div>
            <div class="form-group row">
                <legend class="col-form-label col-sm-5 pr-0 text-right">อีเมลล์</legend>
                <div class="col-md-5 col-sm-5">
                    <input type="text" class="form-control" name="eMail" required>
                </div>
            </div>
            <div class="form-group row">
                <legend class="col-form-label col-sm-5 pr-0 text-right">เบอร์โทรศัพท์</legend>
                <div class="col-md-5 col-sm-5">
                    <input type="tel" class="form-control" name="phoneNumber" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 offset-sm-1 text-left pt-1">
                    <button type="submit" name="submit" value="save" class="btn btn-primary">บันทึกข้อมูล</button>

                </div class="col-sm-3 offset-sm-1 text-left pt-1">
                <button type="button" name="request" onclick="window.location.href = 'request_event.php';" value="request" class="btn btn-primary">เพิ่มร้องขอโครงการ</button>
                <button type="button" name="add" onclick="window.location.href = 're_select_event.php';" value="add" class="btn btn-primary">เลือกโครงการที่เจ้าหน้าที่จัด</button>
                <div>
                </div>
                <div class="col-sm-3 offset-sm-1 text-right pt-1">
                    <button type="reset" name="clear" class="btn btn-danger">ล้างข้อมูล</button>
                </div>
            </div>
        </form>
    <?php } ?>
</body>

</html>