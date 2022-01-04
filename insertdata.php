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
$user = "INSERT INTO users(id,name, email, token, created) VALUES (210,'norsyahira', 'nsmrsyahira@gmail.com', '899bcbe98b29c79199d08394ef2118f0',NOW()) ";
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$location = "INSERT INTO locations (id,user_id,district,state,country) VALUES(1,2,'pekan','pahang','malaysia')"



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
