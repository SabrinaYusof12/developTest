<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files

$servername = "localhost";
$username = "developertest";
$password = "HL@2021test";
$dbname = "hla";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$headers = apache_request_headers();
$token = NULL;
foreach ($headers as $header => $value) {

    if($header == 'Authorization'){
        $token = $value;
    }
}

$id =$_POST['id']; 
$name =$_POST['name']; 
$email =$_POST['email']; 
$token =md5($_POST['token']); 
$created =$_POST['created'];
//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$sql = "SET @user_table :=0;SELECT * FROM users WHERE id='$id', name='$name', email='$email', token='$token', created='$created'";

$result = $conn->query($sql);


if ($result->num_rows > 0) {

$id =$_POST['id']; 
$user_id =$_POST['user_id']; 
$district =$_POST['district']; 
$state =$_POST['state']; 
$country  =$_POST['country'];

$location_id = $row ['$user_table'];
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$sql = "SELECT * FROM Locations WHERE id='$id', user_id='$user_id', district='$district', state='$state', country='$country'";

$data = $conn->query($sql);

  while($row = $data->fetch_assoc()) {
     $district = $row["district"];
    $state  = $row["state"];
     $country = $row["country"];
  }


if($data->num_rows > 0){ 
    // set response code - 200 OK
  
    // show products data
         ($location);
      }
  
else {
    // set response code - 404 Not found
  
    // tell the user no location found
 
        array("message" => "No location found.");
  
}

} else {
    // set response code - 401 401 Unauthorized

  
    // no user found
 
        array("message" => "401 Unauthorized.");
   

}

$conn->close();
?>
