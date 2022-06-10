<?php
  //include connection file
  include('connect.php');

  $q = "SELECT * FROM project_data
        LEFT JOIN status_data ON project_data.status_id = status_data.status_id
        LEFT JOIN school_data ON project_data.school_id = school_data.school_id";

  if ($result = mysqli_query($conn,$q)) {

    /* fetch object array */
    while ($obj = $result->fetch_all()) {
      $data[] = array(
        'id' => $obj->project_id,
        'title' => $obj->project_name,
        'start' => $obj->start_day,
        'end' => $obj->end_day,
        'school' => $obj->schhol_name,
        'status' => $obj->status_name
      );
    }
    echo json_encode($data);
    /* free result set */
    $result->close();
  }
  mysqli_close($conn);
  ?>