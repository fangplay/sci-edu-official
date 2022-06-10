<?php
    include('connect.php');
    if(isset($_POST['submit'])){
        
    //save school id and project name
    $project_name = $_POST['projectname'];
    $school_id = $_POST['schoolid'];
    //post class
    $class = $_POST['class'];
    if(!empty($class)){
        $c = implode(",",$class);
    }
    //post subject
    $subject = $_POST['subject'];
    if(!empty($subject)){
        $s = implode(",",$subject);
    }
    $branch = $_POST['branch'];
    $student_count = $_POST['countStudent'];
    $teacher_count = $_POST['countTeacher'];
    $day1_train = date('m/d/Y',strtotime($_POST['trainDay1']));
    $day2_train = date('m/d/Y',strtotime($_POST['trainDay2']));
    $person_name = $_POST['contactName'];
    $e_mail = $_POST['eMail'];
    $phone_number = $_POST['phoneNumber'];
    //auto save date-time for add data
    //date_default_timezone_set('Thailand/Bangkok');
    //$date_add = date("Y-m-d H:m:s");
    
    $status_set = 1;
    
    $add_data = "INSERT INTO project_data(project_name,class,subject,branch,count_teacher,count_student,start_day,end_day,c_name,c_email,c_phone,least_date,status_id,school_id) 
                                  VALUES ('$project_name','$class','$subject','$branch','$teacher_count','$student_count','$day1_train','$day2_train','$person_name','$e_mail','$phone_number',NOW(),'$status_set','$school_id')";
    

    $result_all = mysqli_query($conn,$add_data);
    if($result_all){
        //echo "Add Data Completed<p>";
        //mysqli_close($conn);
        echo "<script>
            alert('เพิ่มข้อมูลโครงการเรียบร้อยแล้ว');
            window.location.replace('add_event.php');
        </script>";
        }else{
        //echo "Sorry Can't Add Data";
        echo "<script>
            alert('ไม่สามารถเพิ่มข้อมูลโครงการได้');
            window.location.replace('add_event.php');
        </script>";
    }
    mysqli_close($conn);
}   
?>