<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP INTO FORM BETA VISION</title>
    <?php 
        include'connect.php';

        $get_data = "SELECT * FROM project_data where project_id  = 1";

        $set_data =  mysqli_query($conn,$get_data);

        $data_set = mysqli_fetch_array($set_data);

        
    ?>
</head>
<body>
    <input type="text" name="project-name" value="<?php echo $data_set['project_name']?>">
</body>
</html>