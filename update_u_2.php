<?php
    include('connect.php');
        $id  = (int)$_GET['uID'];
        if($_POST['newpassword'] != ""){
            $new_pass = (string)$_POST['newpassword'];
        }else{
            $new_pass = (string)$_POST['pass'];
        }
        $name  = $_POST['displayname'];
        $update = "UPDATE user_data SET user_password = '$new_pass' , display_name = '$name' , least_update = NOW() WHERE u_id = $id";

        $get_update = mysqli_query($conn,$update);

        if($get_update){
            echo "<script>
            window.alert('Update Complete');
            window.location.replace('user_list.php');
            </script>";
        }else{
            echo "<script>
            window.alert('Update Failed');
            window.location.replace('user_list.php');
            </script>";
        }
?>