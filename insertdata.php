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

//getvalue
$id         = '102';
$name       = 'najwa';
$email      = 'wawanajwa136@gmail.com';
$token      =  md5("testing");
$district   = 'kajang';
$state      = 'SEL';
$country    = 'MY';

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$user = "Insert into users value ('$id', '$name', '$email', '$token', now())";
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$location = "Insert into locations value ('$id', '$id', '$district', '$state', '$country')";



if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
  $last_id = $conn->insert_id;
  //get location_id and token value
  echo $location_id;
  echo $token;
  echo "New record created successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 
?>
