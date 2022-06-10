<?php
    include('connect.php');
    if(isset($_POST['submit'])){
        $id = $_GET['uID'];

    $newPass = $_POST['newpassword'];
    $DisName = $_POST['displayname'];

    $updateData = "UPDATE user_data SET user_password = $newPass,display_name = $DisName,least_update = NOW() WHERE u_id = $id";

    $getUpdate = mysqli_query($updateData,$conn);

    if($getUpdate){
        echo "<script>
            alert('Update Data Completed');
        </script>";
        Header('location : user_list.php');
    }else{
        echo "<script>
            alert('Update Data Incompleted');
        </script>";
        Header('location : user_list.php');
    }
    }
