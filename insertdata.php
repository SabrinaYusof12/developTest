<?php
session_start();

$token = $token = md5(uniqid(rand(), true)); 
$_SESSION['token'] = $token;

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


//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255), branch_name (varchar 255)

$token = $_SESSION['token'];

$user = "INSERT INTO users (id, name, email, token, created, branch_name)
VALUES ('', 'aiman', 'aimanzawawi@gmail.com', '$token', NOW(), 'HLA')";
$location = "INSERT INTO locations (id, user_id, district, state, country, branch_name)
VALUES ('', ' ', 'shah alam', 'selangor', 'Malaysia', 'HLA')";

if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
  $last_id = $conn->insert_id;
  $location_id = $conn->insert_id;
  //get location_id and token value
  echo "Location id "; echo $location_id; echo "</br>";
  echo "Token "; echo $token; echo "</br>";
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
