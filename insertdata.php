<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
$user = "INSERT INTO users (id, name, email, token, created, branch_name)
VALUES (1221, 'safina', 'safina@example.com', '" . md5("safina") . "', '" . date('Y-m-d H:i:s') . "', 'safina')";
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255), branch_name (varchar 255)
$location = "INSERT INTO locations (id, user_id, district, state, country, branch_name)
VALUES (1, 1221, 'shah alam', 'selangor', 'malaysia', 'safina')";



if ($conn->query($user) === TRUE && $conn->query($location) === TRUE) {
  $last_id = $conn->insert_id;
  //get location_id and token value
  echo $location_id;
  echo $token;
  echo "New record created successfully";
} else {
  echo "Error: ";
}

$conn->close();
