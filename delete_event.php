<?php
    $conn = mysqli_connect("localhost","root","","sciedu_official");

    $projectid = $_GET['pid'];

    $sql = "DELETE FROM project_data WHERE project_id = '".$projectid."'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_affected_rows($conn)){
        echo "<script>
                alert('ลบข้อมูลโครงการเรียบร้อยแล้ว');
                window.location.replace('edit_event.php');
            </script>";
    }else{
        echo"<script>
            alert('ไม่สามารถลบข้อมูลโครงการได้');
            window.location.replace('edit_event.php');
        </script>";
    }
?>