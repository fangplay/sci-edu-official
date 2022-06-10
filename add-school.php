<?php
include('connect.php');
if($_POST['id']){
$id=$_POST['id'];
if($id==0){
 echo "<option>เลือกสถาบัน</option>";
}else{
 $sql = mysqli_query($con,"SELECT * FROM `school_data` WHERE school_id='$id'");
 while($row = mysqli_fetch_array($sql)){
 echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
 }
 }
}
?>