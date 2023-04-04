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

$name =$_POST['name']; 
$email =$_POST['email']; 
$token =md5($_POST['token']); 
$created =$_POST['created'];
$user_id =$_POST['user_id'];
$district =$_POST['district'];
$state =$_POST['state'];
$country =$_POST['country'];
$branch_name =$_POST['branch_name'];

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime), branch_name (varchar 255)
$user = ("INSERT INTO users (id, name, email, token, created, branch_name) VALUES ('NULL', '$name', '$email', MD5('$token'), '$created', '$branch_name')");
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255), branch_name (varchar 255)
$location = ("INSERT INTO locations (id, user_id, district, state, country, branch_name ('NULL','$user_id', '$district', '$state', '$country', '$branch_name'");



if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
  $last_id = $conn->insert_id;
  //get location_id and token value
  echo $location_id;
  echo $token;
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
