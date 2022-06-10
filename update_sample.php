<meta charset=utf-8>
<?php 
//connect database

$t_name = mysqli_real_escape_string($condb,$_POST['t_name']);
$t_id = mysqli_real_escape_string($condb,$_POST['t_id']);


//check from id 
$check1 ="SELECT * FROM tbl_type  WHERE t_name='$t_name' AND t_id=$t_id";
$result1=mysqli_query($condb, $check1);
$num1=mysqli_num_rows($result1);

// echo $num1;

if($num1==0){
//chk dupicate
$check2 ="SELECT * FROM tbl_type  WHERE t_name='$t_name'";
$result2=mysqli_query($condb, $check2);
$num=mysqli_num_rows($result2);

		if($num==0){   // can update 
			$sql ="UPDATE tbl_type SET  t_name='$t_name' WHERE t_id=$t_id";
				$result = mysqli_query($condb, $sql) or die("Error in query : $sql" .mysqli_error());
		}else{ //if $num==1
					echo "<script>";
					echo "alert('ข้อมูลซ้ำ !! ');";
					echo "window.location ='prdtype.php'; ";
					echo "</script>";
		}

}elseif ($num1==1) {  //chk $check1 
			echo "<script>";
			echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='prdtype.php'; ";
			echo "</script>";
}


mysqli_close($condb);

if($result){
			echo "<script>";
			echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='prdtype.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			//echo "alert('ERROR!');";
			echo "window.location ='prdtype.php'; ";
			echo "</script>";
		}


?>