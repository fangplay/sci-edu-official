<?
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beta Input Type</title>
</head>
<body>
    <?
        $sql = "SELECT * FROM project_data";
        $query = mysqli_query($conn, $sql);

        while($objResult = mysqli_fetch_array($query))
            {

            
    ?>
    <h2>Project Name : </h2>
    <?php echo $objResult["project_name"]; ?> 
    
</body>
    <?
        }
    ?>
</html>