<?php
    include('connect.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name  = $_POST['displayname'];
    $type = $_POST['usertype'];

    if($usernname != '' || $password != '' || $name != '' || $type != ''){
        $save = "INSERT INTO user_data(username,user_password,display_name,user_type,least_update)
                VALUES('$username','$password','$name','$type',NOW())";

        $process = mysqli_query($conn,$save);

        if($process){
            echo "<script>
                  alert('New record created successfully');
                  window.location.replace('user_list.php');
                  </script>";
        }else{
            echo "<script>
                alert('Cannot Add Data');
                window.location.replace('user_list.php');
                </script>";
        }
    }else{
        echo "<script>
            alert('Cannot Processing Data');
            window.location.replace('user_add.php');
            </script>";
    }
?>