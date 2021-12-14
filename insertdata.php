<?php

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

$token = md5("Hello");
date_default_timezone_set("Asia/Kuala_Lumpur");
$today = date("Y-m-d H:i:s");

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), token (datetime)
$user = "INSERT INTO users (id, name, email, token, created) VALUES ('12', 'fyzatest', 'fyzamohd@ymail.com', '$token','$today');";
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$location = "INSERT INTO locations (id, user_id, district, state, country) VALUES ('12', '$token', 'pekan', 'pahang','malaysia');";


if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>