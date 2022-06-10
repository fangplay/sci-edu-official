<?php
    include('connect.php');
    //get data from input
    $school_name = $_POST['school_name'];

    //processing data in database
    $process = "SELECT school_name FROM school_data WHERE school_name = $school_name";
    $getProcess = mysqli_query($conn,$process);

    //search in array
    $ff = mysqli_fetch_array($getProcess);

    if($ff){
        echo json_encode(array('status' => 'inData','m' => 'This school has saved in data store.'));
    }else{
        echo json_encode(array('status' => 'error','m' => 'This school has not saved in data store.'));
    }
?>