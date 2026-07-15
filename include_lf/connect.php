<?php
  $server_name = "localhost";
  $server_user = "root";
  $server_password = "";
  $db_name = "report_lost_found";
  // db connection
  $connect = new mysqli($server_name, $server_user, $server_password, $db_name);
  // check connection
  if($connect->connect_error) {
    die("Connection Failed : " . $connect->connect_error);
  } else {
    // echo "Successfully connected";
  }
?>
