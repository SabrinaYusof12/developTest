<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

// include database 

$servername = "localhost";
$username = "developertest";
$password = "HL@2021test";
$dbname = "hla";

//

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime), branch_name (varchar 255)
$user_data = array(
  "id" => 9922,
  "name" => "Edham Rabuan",
  "email" => "ahmadaham99@gmail.com",
  "token" => md5("token"),
  "created" => date('Y-m-d H:i:s'),
  "branch_name" => "edham-rabuan"
);

$user = "INSERT INTO users (id, name, email, token, created, branch_name) VALUES 
  ('".$user_data['id']."',
  '".$user_data['name']."',
  '".$user_data['email']."',
  '".$user_data['token']."',
  '".$user_data['created']."',
  '".$user_data['branch_name']."')";

//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255), branch_name (varchar 255)
$location_data = array(
  "id" => 2299,
  "user_id" => $user_data['id'],
  "district" => "Cheras",
  "state" => "Kuala Lumpur",
  "country" => "Malaysia",
  "branch_name" => $user_data['branch_name']
);
$location = "INSERT INTO locations (id, user_id, district, state, country, branch_name) VALUES 
  ('".$location_data['id']."',
  '".$location_data['user_id']."',
  '".$location_data['district']."',
  '".$location_data['state']."',
  '".$location_data['country']."',
  '".$location_data['branch_name']."')";



if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
  $last_id = $conn->insert_id;
  //get location_id and token value
  $location_id = $location_data['id'];
  $token = $user_data['token'];

  $res = array(
    "message"=> "New record created successfully",
    "location_id"=> $location_id, 
    "token"=> $token
  );

  http_response_code(200);
  print json_encode($res);

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
