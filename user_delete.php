<?php
    $conn = mysqli_connect("localhost","root","","sciedu_official");
        
    $id = $_GET['id'];

    $getDel = "DELETE FROM user_data WHERE u_id = '".$id."' ";

    $Del = mysqli_query($conn,$getDel);

    if(mysqli_affected_rows($conn)){
        echo "<script>
                alert('Delete completed');
                window.location.replace('user_list.php');
            </script>";
        //Header('location : user_list.php');
    }else{
        echo"<script>
            alert('Cannot delete data');
            window.location.replace('user_list.php');
        </script>";
        //Header('location : user_list.php');
    }
?>