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
  <title>Course Request</title>
</head>

<body>

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

  <header>
    <div class="container" align="center">
      <h1 class="display-4">โครงการที่ร้องขอ</h1>
    </div>
  </header>
  <div class="form-group row">
    <?php
    include('connect.php');
    $project_id = $_POST['projectid'];
    $getID = "SELECT * FROM staff_project WHERE s_p_id = $project_id";
    $rec = mysqli_query($conn, $getID);
    $rr = mysqli_fetch_array($rec);
    ?>
    <div class="col-sm-5 offset-sm-1 text-left pt-1">
      <h2>Project ID : <?php echo $rr['s_p_id']; ?></h2>
      <p>ชื่อโครงการ : <?php echo $rr['s_p_name']; ?></p>
      <p>ระดับชั้น : <?php echo $rr['s_p_class']; ?></p>
      <p>วิชา : <?php echo $rr['s_p_subject']; ?></p>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2 offset-sm-3 text-left pt-2">
      <button type="button" class="btn btn-primary" onclick="window.location.href = 'add_event2.php?pID=<?php echo $rr['s_p_id']; ?>'">ร้องขอทำโครงการโดยโรงเรียนที่เข้าร่วมมาก่อน</button>
    </div>
    <div class="col-sm-2 offset-sm-2 text-left pt-2">
      <button type="button" class="btn btn-primary" onclick="window.location.href = 'request_event2.php?pID=<?php echo $rr['s_p_id']; ?>'">ร้องขอทำโครงการโดยโรงเรียนที่ต้องการเข้าร่วม</button>
    </div>
  </div>
</body>

</html>