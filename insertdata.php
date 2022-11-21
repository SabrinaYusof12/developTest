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

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$sql = "INSERT INTO users (name, email, token, created)
        VALUES ('Syukri', 'Syukrimamadsy@gmail.com', 'testsyukri', CURRENT_TIMESTAMP())";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

$location_id =$params['location_id'];
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$sql ="SELECT district, state, country FROM locations WHERE id = '$location_id'";
$data = $conn->query($sql);

  while($row = $data->fetch_assoc()) {
     = $row["district"];
     = $row["state"];
     = $row["country"];
  }


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
