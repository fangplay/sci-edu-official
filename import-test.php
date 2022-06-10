<?php
    include'connect.php';

    //$conn = mysqli_connect("localhost","root","","sciedu-official");

    //mysqli_set_charset($conn,'utf8');

    $sql = "SELECT * FROM school_data";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_array($result)) {
            echo "School: " . $row["school_name"]."<br>";
        }
    } else {
        echo "0 results";
    }
    
    mysqli_close($conn);
?>