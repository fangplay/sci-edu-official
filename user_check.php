<?php
  session_start();
  include('connect.php');
  //send value to check login
    $username = $_POST['username'];
    $password = $_POST['password'];

    //take InjectionProtect
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($conn,$username);
    $password = mysqli_real_escape_string($conn,$password);
    
    $query = "SELECT * FROM user_data WHERE username = '$username' AND user_password = '$password' ";

    $result = mysqli_query($conn,$query);

    //$check = mysqli_num_rows($result);

    //$getCheck = mysqli_fetch_array($check);

    if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      //$currentTime = date('Y-m-d H:i:s'); 
      $updateTime = "UPDATE user_data SET least_login = NOW() WHERE username = '$username' AND user_password = '$password' ";
      $getTime = mysqli_query($conn,$updateTime);

      $_SESSION["userID"] = $row["u_id"];
      $_SESSION["name"] = $row["display_name"];
      $_SESSION["user_type"] = $row["user_type"];

      if($_SESSION["user_type"]=="admin"){
        Header("Location: admin_index.php");
      }
      if($_SESSION["user_type"]=="staff"){
        Header("Location: staff_index.php");
      }
    }else{
      echo"<script>
            alert('Username or Password incorrect');
            window.history.back();
          </script>";
    }
    




    
?>