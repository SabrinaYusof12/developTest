<<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

// include database 

$servername = "test.hla-integrated.com/HLAItest-hafizah";
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
$branch_name="Test";
$ID=220998;
$name="Nurhafizah";
$email="hfzhkmlddn@gmail.com";
$location_id= "2";
$token=MD5("ce8cc93995a599b557468f656c80c5c1");
$user = "INSERT INTO users VALUES ('$ID', '$name', '$email', '$token', NOW(), '$branch_name')" ;
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255), branch_name (varchar 255)

$user_ID="Hafizah";
$district="Dengkil";
$state="Selangor";
$country="Malaysia";

$location= "INSERT INTO location VALUES (ID, user_ID, district, state, country, branch_name)";


if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
  $last_id = $conn->insert_id;
  //get location_id and token value
  echo $location_id;
  echo $token;
  echo "New record created successfully";
  
  $token = $branch_name ['token'];
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
