<?php 
include('connect.php');

//get data from staff add data
$project_name = $_POST['project-name'];
//get class ffrom staf add project
$class = $_POST['class'];
if(!empty($class)){
    $c = implode(",",$class);
}
//get subject from staff add project
$subject = $_POST['subject'];
if(!empty($subject)){
    $s = implode(",",$subject);
}

$s_add_project = "INSERT INTO staff_project(s_p_name,s_p_class,s_p_subject) VALUES ('$project_name','$c','$s')";

$save_all = mysqli_query($conn,$s_add_project);
if($save_all){
    //echo "Add Data Completed<p>";
    //mysqli_close($conn);
    echo "<script>
        alert('เพิ่มข้อมูลโครงเรียบร้อยแล้ว');
        window.location.replace('staff_index.php');
    </script>";
    }else{
    //echo "Sorry Can't Add Data";
    echo "<script>
        alert('ไม่สามารถเพิ่มข้อมูลโครงการได้');
        window.location.replace('staff_index.php');
    </script>";
}
mysqli_close($conn);
?>