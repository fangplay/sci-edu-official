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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Add FullCalendar Add-ons-->
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.min.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment-with-locales.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/th.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.31/moment-timezone.min.js" integrity="sha512-GqWOXT1UPIvzojfXEPf2ByPu4S0iwX0SfFfZ985fePNpTJPuiWKn47mXd0iyfcpcjcmM/HIRtvrd5TsR87A0Zg==" crossorigin="anonymous"></script>
  <?php
  //include connection file
  include('connect.php');

  $q = "SELECT * FROM project_data
        LEFT JOIN status_data ON project_data.status_id = status_data.status_id
        LEFT JOIN school_data ON project_data.school_id = school_data.school_id";

  if ($result = mysqli_query($conn, $q)) {


    while ($obj = $result->fetch_object()) {
      $data[] = array(
        'id' => $obj->project_id,
        'title' => $obj->project_name,
        'start' => $obj->start_day,
        'end' => $obj->end_day,
        'school' => $obj->school_name,
        'status' => $obj->status_name
      );
    }
    $result->close();
  }
  mysqli_close($conn);
  ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        eventColor: '#F00000',
        eventClick: function(info) {
          var eventObj = info.event;
          alert('ชื่อโครงการ : ' + eventObj.title + '\nวันที่อบรม : '
                + moment(eventObj.start).format('LL') + ' ถึง ' + moment(eventObj.end).format('LL')
                + '\nสถาบัน : ' + eventObj.extendedProps.school + '\nสถานะโครงการ : ' + eventObj.extendedProps.status);
        },
        initialDate: '<?php echo date('Y-m-d'); ?>',
        defaultView: 'month',
        displayEventTime: true,
        events: <?php echo json_encode($data); ?>
      });

      calendar.render();
    });
  </script>
  <style>
    #calendar {
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 16px;
      max-width: 1500px;
      margin: 0 auto;
    }
  </style>
  <title>Science Education Project Official</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="index.php">หน้าหลัก
              <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
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


  <header>
    <section class="py-4">
      <div class="container">
        <h1 class="display-3">EDUCATION PROJECT SERVICE<br>FACULTY OF SCIENCE OFFICIAL</h1>
      </div>
      <div class="container">
        <h2 class="display-5">ยินดีต้อนรับสู่งานบริการวิชาการ คณะวิทยาศาสตร์ มหาวิทยาลัยทักษิณ</h2>
      </div>
    </section>
  </header>

  <div class="responsiveCal container">
    <h2 class="display-5">ตารางการจองอบรม</h2>
    <div class="container">
      <div id='calendar'></div>
    </div>

  </div>
</body>

</html>