<?php
    include('connect.php');
    //get project name and school name
    $project_name = (string)$_POST['projectname'];
    $school_id = (int)$_POST['schoolid'];
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
    //get detail data
    $branch = $_POST['branch'];
    $student_c = $_POST['count_student'];
    $teacher_c = $_POST['count_teacher'];
    $start_day = $_POST['trainDay1'];
    $end_day = $_POST['trainDay2'];
    $p_name = $_POST['contact_name'];
    $p_mail = $_POST['e_mail'];
    $p_phone = $_POST['phone_number'];

    //save data to database
    $save = "INSERT INTO project_data(project_name,class,subject,branch,count_teacher,count_student,start_day,end_day,c_name,c_email,c_phone,school_id,status_id)
                               VALUES('$project_name','$c','$s','$branch','$teacher_c','$student_c','$start_day','$end_day','$p_name','$p_mail','$p_phone','$school_id',2)";
    //process save data
    $process = mysqli_query($conn,$save);

    if($process){
        /**/
                        echo "<script>alert('Add Data Completed');
                        window.location.replace('edit_event.php');</script>";
    }else{
        /**/
    echo "<script>alert('Add Data Failed');
                        window.location.replace('request_event.php');</script>";
    }
?>