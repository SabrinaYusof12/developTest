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

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$user =  "INSERT INTO users(id,name, email, token, created) VALUES (10,'mohdhanafiz', 'mohdhanafizbah@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2021-10-27 11:53:00') ";

//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$location = "INSERT INTO locations(id, user_id, district,state,country) VALUES (9,10,'Pekan','Pahang', 'Malaysia')";



if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
