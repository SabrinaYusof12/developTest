<?php

// include database 

$servername = "localhost";
$username = "developertes";
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
$user = "INSERT INTO users (user_id,users_name,users_email,users_token,created")VALUES('00006'),'Mashitah','shitahramli12@gmail.com','09b4105f39d01d8d1d835ef69896ae691b44c809','26-10-2021 19:20')";
'
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$location = INSERT INTO location (location_id,user_id,location_district,location_state,location_country)VALUES(01,00004,'Pekan','Pahang',Malaysia')";



if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>