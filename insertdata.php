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

// //table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)

// $deleteuser = "DELETE FROM users where email='syina310@gmail.com'";
// $conn->query($deleteuser);

// $user = "INSERT INTO `users` (`id`,`name`,`email`,`token` ,`created`) VALUES (1,'Nurul Syafina Binti Nor Azizi', 'syina310@gmail.com',  MD5('AmierulMukminien123'), NOW()); ";

// //table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
// $location = "INSERT INTO `locations` (`user_id`,`district`,`state`,`country`) VALUES (1,'Ampang', 'Selangor', 'Malaysia'); ";



// if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
//   $last_id = $conn->insert_id;
//   //get location_id and token value
//   $location_id = 1;
//   $token = MD5('AmierulMukminien123');
//   echo $location_id;
//   echo $token;
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $conn->connect_error . "<br>" . $conn->error;
// }

// $conn->close();

?>
