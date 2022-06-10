<?php
    require('connect.php');


    $getReady = "SELECT user_id FROM user_data WHERE user_type = 'admin' ";

    $ee = mysqli_query($conn,$getReady);

    $rr = mysqli_num_rows($ee);

    echo $rr;


?>