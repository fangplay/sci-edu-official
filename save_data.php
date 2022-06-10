<?php
    include('connect.php');
    if(isset($_POST['submit'])){
        //post project name and school id
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
        //post detail data
        $branch = $_POST['branch'];
        $s_count = $_POST['countStudent'];
        $t_count = $_POST['countTeacher'];
        $start_day = $_POST['trainDay1'];
        $end_day = $_POST['trainDay2'];
        $p_name = $_POST['contactName'];
        $e_mail = $_POST['eMail'];
        $p_number = $_POST['phoneNumber'];

        //get status add requiest from school added
        $status = '1';

        //save data into database
        $add_data = "INSERT INTO project_data(project_name,class,subject,branch,count_teacher,count_student,start_day,end_day,c_name,c_email,c_phone,least_date,status_id,school_id)
                                        VALUE('$project_name','$c','$s','$branch','$t_count','$s_count','$start_day','$end_day','$p_name','$e_mail','$p_number','$status','$school_id')";
    $result_all = mysqli_query($conn,$add_data);
    echo mysqli_error($conn);
    if($result_all){
        //echo "Add Data Completed<p>";
        //mysqli_close($conn);
        echo "<script>
            alert('Add Data Completed');
            window.location.replace('add_event.php');
        </script>";
        }else{
        //echo "Sorry Can't Add Data";
        echo "<script>
            alert('Sorry Can't Add Data');
            window.location.replace('add_event.php');
        </script>";
    }
    mysqli_close($conn);
}
?>