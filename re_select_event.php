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
  <title>Select Project Course</title>
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
            <a class="nav-link" href="about.html">เกี่ยวกับงานบริการ</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--Header-->
  <header>
    <div class="container" align="center">
      <h1 class="display-4">เลทอกโครงการที่เจ้าหน้าที่ได้จัดไว้</h1>
    </div>
  </header>
  <br>
  <form action="project_sel.php" method="POST">
    <div class="from-group row">
      <legend class="col-form-label col-sm-5 pt-0 text-right">ชื่อโครงการ</legend>
      <div class="col-md-5 col-sm-5">
        <select class="form-control" name="projectid" id="projectid" required>
          <option>กรุณาเลือกโครงการ</option>
          <?php
          include("connect.php");
          $selectP = "SELECT * FROM staff_project";
          $QueryP = mysqli_query($conn, $selectP);
          //$p=mysqli_fetch_array($QueryP);
          while ($p = mysqli_fetch_array($QueryP)) {
            unset($p_id, $p_name);
            $p_id = $p['s_p_id'];
            $p_name = $p['s_p_name'];
          ?>
            <option id="<?= $p_id ?>" value="<?= $p_id ?>"><?= $p_name ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4 offset-sm-5 text-left pt-2">
        <button type="submit" class="btn btn-primary">ถัดไป</button>
      </div>
    </div>
  </form>
</body>

</html>