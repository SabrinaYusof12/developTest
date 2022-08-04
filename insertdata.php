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

$branchName = "naim";

// user
$userId = 91;
$name = "Muhamad Naim Bin Hasim";
$email = "imnaimhasim@gmail.com";
$md5token = md5("mian");

//locations
$district = "Kota Bharu";
$state = "Kelantan";
$country = "Malaysia";

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime), branch_name (varchar 255)
$user = "INSERT INTO users VALUES ( '$userId','$name', '$email','$md5token', 'now()', '$branchName' )";

//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255), branch_name (varchar 255)
$location = "INSERT INTO locations VALUES ('$userId','$district','$state','$country','$branchName')";

$tokenQuery = "SELECT token from users where id = 91";

if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
  $location_id = $conn->insert_id;
  //get location_id and token value
  $result = $conn->query($tokenQuery);
  
  $token = NULL;
  while ( $field = $result->fetch_field()){
    $token = $fied->token;
  }

  echo $location_id;
  echo $token;
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
