<?php
    include('connect.php');
    //$id = $_GET['ProjectID'];
        $id = (int)$_GET['ProjectID'];
        $status = $_POST['status'];

        $up_data  = "UPDATE project_data SET status_id = '$status', least_date = NOW() WHERE project_id = $id";

        $get = mysqli_query($conn,$up_data);

        if($get){
            echo "<script>window.alert('อัพเดทข้อมูลโครงการเรียบร้อย')
                        window.location.replace('project_list.php')
                            </script>";
        }else {
            echo "<script>window.alert('ไม่สามารถอัพเดทข้อมูลโครงการได้')
                        window.location.replace('project_list.php')
                            </script>";
        }

?>