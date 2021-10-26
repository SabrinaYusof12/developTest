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
$user = "INSERT INTO users (users_id,users_name,users_email,users_token,created)VALUES('00004','Muhammad Arief Bin Mohd Rafie','binaryadh91@gmail.com','8915b9899cd4037aaf8f1980c39c75fa','26-10-2021 18:52')";

//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$location = "INSERT INTO location(location_id,user_id,location_district,location_state,location_country)VALUES(01,00004,'Pekan','Pahang','Malaysia')";



if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
