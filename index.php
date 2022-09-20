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

$headers = apache_response_headers();
$token = NULL;
foreach ($headers as $header => $value) {

    if($header == 'Authorization'){
        $token = $value;
    }
}

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$sql = "SELECT id, name, email, token, created FROM users";

$result = $conn->query($sql);


if ($result->num_rows > 0) {

$location_id = $con->insert_id;
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$sql = "SELECT id, user_id, district, state, country FROM locations where id = $location_id";

$data = $conn->query($sql);

  while($row = $data->fetch_assoc()) {
     = $row["district"];
     = $row["state"];
     = $row["country"];
  }


if($data->num_rows > 0){ 
    // set response code - 200 OK
  var_dump(http_response_code(200));
    // show products data
         ($location);
      }
  
else {
    // set response code - 404 Not found
  var_dump(http_response_code(404));
    // tell the user no location found
 
        array("message" => "No location found.")
  
}

} else {
    // set response code - 401 401 Unauthorized
var_dump(http_response_code(401));
  
    // no user found
 
        array("message" => "401 Unauthorized.")
   

}

$conn->close();
?>
