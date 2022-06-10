<?
include('connect.php');
if($_POST['submit'] == 'save')
{

$class = $_POST['class[]'];
$subject = $_POST['subject[]'];
$branch  = $_POST['branch'];
$student_c = $_POST['count-student'];
$teacher_c = $_POST['count-teacher'];
$s_day = $_POST[' train-day1'];
$e_day = $_POST['train-day2'];
$c_name = $_POST['contact-name'];
$e_mail = $_POST['e-mail'];
$phone = $_POST['phone-number'];
$id = $_GET['ProjectID'];
// แก้ไขข้อมูล
$getdata = "UPDATE project_data SET class = '$class' , subject = '$subject' , branch = '$branch' , count_teacher = '$teacher_c' , count_student = '$student_c'
            , start_day = '$s_day' , end_day = '$e_day' , c_name = '$c_name' , c_email = '$e_mail' , c_phone = '$phone' WHERE project_id = '$id'";


//รับตัวแปรจากการอัพเดท
$update = mysqli_query($conn,$getdata);

if($update){
    echo "<script>
    alert('Update Data Completed');
    window.location.replace('edit_data_event.php');
</script>";
}else{
    echo "<script>
            alert('Update Data Failed');
            window.location.replace('edit_data_event.php');
        </script>";
}
}
?>