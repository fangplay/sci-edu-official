<?php
    include('connect.php');
    //get project name and school name
    $project_name = $_POST['project_name'];
    $school_name = $_POST['school_id'];
    //save class data
    $class = $_POST['class'];
    if (!empty($class)) {
        $c = implode(",", $class);
    }
    //save subject data
    $subject = $_POST['subject'];
    if (!empty($subject)) {
        $s = implode(",", $subject);
    }
    //post detail data
    $branch = $_POST['branch'];
    $s_count = $_POST['count_student'];
    $t_count = $_POST['count_teacher'];
    $start_day = $_POST['trainDay1'];
    $end_day = $_POST['trainDay2'];
    $p_name = $_POST['contact_name'];
    $e_mail = $_POST['e_mail'];
    $p_number = $_POST['phone_number'];
    
    //$school_id = "";

    //save data to database
    $save_data = "INSERT INTO project_data(project_name,class,subject,branch,count_teacher,count_student,start_day,end_day,c_name,c_email,c_phone,school_id,status_id)
                                    VALUES('$project_name','$c','$s','$branch','$t_count','$s_count','$start_day','$end_day','$p_name','$e_mail','$p_number','$school_id',2);";

    $result_all = mysqli_query($conn,$save_data);

    if ($result_all) {
        //echo "Add Data Completed<p>";
        //mysqli_close($conn);
        echo "<script>
            alert('บันทึกข้อมูลโครงการสำเร็จ');
            window.location.replace('request_event.php');
        </script>";
    } else {
        //echo "Sorry Can't Add Data";
        echo "<script>
            alert('ไม่สามารถบันทึกข้อมูลโครงการได้');
            window.location.replace('request_event.php');
        </script>";
    }

?>