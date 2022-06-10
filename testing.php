<?
    include'connect.php';
    $select_edit = "SELECT * FROM project_data
                    JOIN school_data ON project_data.school_id =  school_data.school_id
                    JOIN train_data ON project_data.train_id = train_data.train_id
                    JOIN contact_data ON project_data.contact_id = contact_data.contact_id
                    WHERE project_id = 1 ";

    $objQuery = mysqli_query($conn,$select_edit);

    $objResult = mysqli_fetch_array($objQuery);
    
    while($objResult)
    {
       ?>
       <input type="text" name="school-name" value="<?=$objResult['project_data.project_name']?>">
<?
    }
?>