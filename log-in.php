<?php
session_start();
if(isset($_POST['Username'])){
        //connection
          include("connection.php");
        //รับค่า user & password
          $Username = $_POST['username'];
          $Password = md5($_POST['password']);
        //query 
          $sql="SELECT * FROM staff-data Where username='".$Username."' and password='".$Password."' ";

          $result = mysqli_query($con,$sql);
        
          if(mysqli_num_rows($result)==1){

              $row = mysqli_fetch_array($result);

              $_SESSION["staff-id"] = $row["staff_id"];
              $_SESSION["User"] = $row["name"]." ".$row["surname"];

              Header("Location:/staff/dashboard.html");

          }else{
            echo "<script>";
                echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                echo "window.history.back()";
            echo "</script>";

          }

}else{


     Header("Location: staff-login.html"); //user & password incorrect back to login again

}
?>