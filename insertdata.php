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
  echo ("Connection failed: " . $conn->connect_error);
}

// table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$deleteuser = "DELETE FROM users where email='syina310@gmail.com'";
$deleteuser1 = $conn->query($deleteuser);

$user = "INSERT INTO `users` (`name`,`email`,`token` ,`created`) VALUES ('Nurul Syafina Binti Nor Azizi', 'syina310@gmail.com',  MD5('AmierulMukminien123'), NOW()); ";
$add_user = $conn->query($user);

$user_id = "SELECT id from users where email='syina310@gmail.com'";
$get_id = $conn->query($user_id);

foreach($get_id as $user){
  $id = $user['id'];
}

$deletelocations = "DELETE FROM locations";
$deletelocation = $conn->query($deletelocations);

// table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$location = "INSERT INTO `locations` (`user_id`,`district`,`state`,`country`) VALUES ($id,'Ampang', 'Selangor', 'Malaysia'); ";
$add_locations = $conn->query($location);

if ($add_user === TRUE && $add_locations === TRUE ) {
  $last_id = $conn->insert_id;

  //get location_id and token value

  $location_id = $last_id;
  $get_user_id= "SELECT user_id from locations where id=$location_id";
  $sql = $conn->query($get_user_id);

  foreach($sql as $sq){
    $us_id = $sq['user_id'];
  }

  $get_token= "SELECT token from users where id=$us_id";
  $sql = $conn->query($get_token);

  foreach($sql as $sq){
    $token = $sq['token'];
  }

  echo $location_id;
  echo $token;
  echo "New record created successfully";
} else {
  echo "Error:" .$sql.  "<br>" . $conn->error;
}

$conn->close();

?>
