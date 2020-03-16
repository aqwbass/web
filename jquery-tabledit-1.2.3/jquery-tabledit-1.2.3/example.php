<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

$mysqli = new mysqli('localhost', 'test', '123456', 'bass');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

if ($input['action'] === 'edit') {
    $mysqli->query("UPDATE staff SET staff_ID='" . $input['staff_ID'] . "', staff_team_ID='" . $input['staff_team_ID'] . "', 
    staff_FName='" . $input['staff_FName'] . "', staff_LName='" . $input['staff_LName'] . "', staff_Date='" . $input['staff_Date'] . "'
     WHERE id='" . $input['id'] . "'");
} else if ($input['action'] === 'delete') {
    $mysqli->query("UPDATE staff SET deleted=1 WHERE staff_ID='" . $input['staff_ID'] . "'");
} else if ($input['action'] === 'restore') {
    $mysqli->query("UPDATE staff SET deleted=0 WHERE staff_ID='" . $input['staff_ID'] . "'");
}

mysqli_close($mysqli);

echo json_encode($input);
