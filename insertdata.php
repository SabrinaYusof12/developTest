<?php

// include database 

$servername = "localhost";
$username = "developertes";
$password = "HL@2021test";
$dbname = "hla";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$user = "CREATE TABLE Users (
  id INT(6) UNSIGNED AUTO-INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255),
  token VARCHAR (255),
  created DATETIME
  )";
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$location = "CREATE TABLE Locations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  district VARCHAR(255),
  state VARCHAR(255),
  country VARCHAR(255)
  )";



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
