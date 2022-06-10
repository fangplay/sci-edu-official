<?php
    include('connect.php');
        $id = (int)$_GET['ProjectID'];
        //get class data
        $class = $_POST['class'];
        if(!empty($class)){
            $c = implode(",",$class);
        }
        //get subject data
        $subject = $_POST['subject'];
        if(!empty($subject)){
            $s = implode(",",$subject);
        }
        //get detail data to database
        $branch = $_POST['branch'];
        $s_count = $_POST['count-student'];
        $t_count = $_POST['count-teacher'];
        $start_day = $_POST['train-day1'];
        $end_day = $_POST['train-day2'];
        $c_name = $_POST['contact-name'];
        $c_email = $_POST['e-mail'];
        $c_phone = $_POST['phone-number'];
        
        $update = "UPDATE project_data SET class = '$c' , subject  = '$s' , branch  = '$branch' , count_teacher = '$t_count' , count_student = '$s_count' , start_day = '$start_day' , end_day = '$end_day' , c_name = '$c_name' , c_email = '$c_email' , c_phone = '$c_phone' , least_date = NOW() WHERE project_id = '$id'";

        $get_update = mysqli_query($conn,$update);

        if($get_update){
            echo "<script>window.alert('Update Complete');
            window.location.replace('edit_event.php');</script>";
        }else{
            echo "<script>window.alert('Update Failed');
            window.location.replace('edit_event.php');</script>";
        }
?>