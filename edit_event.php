<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap Style Color yellow-->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-theme.min.css">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <?php 
      include('connect.php');
    ?>
    <title>Data List Canter</title>
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
          <li class="nav-item">
                <a class="nav-link" href="add_event.php">เพิ่มโครงการ</a>
          </li>
          <li class="nav-item active">
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



      <div class="container" align="center">
        <h1 class="display-4">ตารางรายชื่อโครงการ</h1>
      </div>

      <div class="container" align="center">
        <from method="POST">
          <div class="col-md-15 col-sm-15 col-xs-10 form-group">
            <div class="input-group search-box">
            <input type="text" class="form-control" name="keyword" id="keyword" placeholder="กรุณาใส่คำค้นหา" width="width:100%">
            </div>
          </div>
        </from>
      </div>

      <div class="container">
      <div class="table-responsive">
        <table class="table" id="project_table">
          <tr>
            <td>รหัสข้อมูล</td>
            <td>ชื่อโครงการ</td>
            <td>สถาบัน</td>
            <td>แก้ไขล่าสุด</td>
            <td colspan="2">การกระทำข้อมูล</td>
          </tr>
          <?php
              $dataperpage = 10;

              if (isset($_GET['page'])) {
                $page = $_GET['page'];
                } else {
                $page = 1;
                }
              $start = ($page - 1) * $dataperpage;

              $sql1 = "SELECT * FROM project_data JOIN school_data ON project_data.school_id = school_data.school_id LIMIT {$start},{$dataperpage}";
              
              //$sql2 = "SELECT school_id FROM project_data INNER JOIN school_data ;
              $result1 = mysqli_query($conn,$sql1);
              //$result2 = mysqli_query($conn,$sql2);
              while($objResult = mysqli_fetch_array($result1))
            {
            ?>
          <tr>            
            <td><?php echo $objResult["project_id"]; ?></td>
            <td><?php echo $objResult["project_name"]; ?></td>
            <td><?php echo $objResult["school_name"]; ?></td>
            <td><?php echo $objResult["least_date"]; ?></td>
            <td><a href="edit_data_event.php?ProjectID=<?php echo $objResult["project_id"];?>">แก้ไข</a></td>
            <td><a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลโครงการนี้หรือไม่')==true){window.location='delete_event.php?pid=<?php echo $objResult["project_id"];?>';}">ลบ</a></td>
          </tr>
          <?php 
            }
          ?>
        </table>
          <?php
          $split = "SELECT * FROM project_data";

          $query2 = mysqli_query($conn,$split);

          $total = mysqli_num_rows($query2);

          $totalpage = ceil($total / $dataperpage);
        ?> 
      <div>
        <nav>
              <ul class="pagination justify-content-center">
                  <li class="page-item"><a class="page-link" href="edit_event.php?page=1" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                  <?php for($i=1;$i<=$totalpage;$i++){ ?>
                  <li class="page-item"><a class="page-link"  href="edit_event.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php } ?>
                  <li class="page-item"><a class="page-link"  href="edit_event.php?page=<?php echo $totalpage ;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
        </li>
              </ul>
        </nav>
      </div>

        </div>
    </div>  
</body>
</html>
<script>  
      $(document).ready(function(){  
           $('#keyword').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#project_table tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  
 </script> 