<?php
    include('connect.php');
    include('project_list.php');
    if($_GET['ProjectID'] == ''){
        echo "<script>window.alert('Can't find project id')
                window.location : 'project_list.php'</script>";
    }

    $id = $_GET['ProjectID'];

    $status_id = $_POST['status_id'];

    $update_status = "UPDATE project_data SET least_date = NOW() , status_id = $status_id WHERE project_id = $id ";

    $getUpdate = mysqli_query($conn,$update_status);

    if($getUpdate){
        echo "<script>window.alert('Update Complete');
                        window.location : 'project_list.php'</script>";
    }else{
        echo "<script>window.alert('Update Failed');
                        window.location : 'project_list.php'</script>";
    } 
    
?>