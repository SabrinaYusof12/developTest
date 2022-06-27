<?php
session_start();

$token = $token = md5(uniqid(rand(), true)); 
$_SESSION['token'] = $token;

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

$headers = array();
$token = $_SESSION['token'];
foreach ($headers as $header => $value) {

    if($header == 'Authorization'){
        $token = $value;
    }
}

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)

$sql = "SELECT * FROM user WHERE token = $token";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

$location_id = $row["id"];

//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$sql = "SELECT * FROM locations WHERE id = $location_id";

$data = $conn->query($sql);

    while($row = $data->fetch_assoc()) {
            $district = $row["district"];
            $state = $row["state"];
            $country = $row["country"];
            $location = $state; $country;
    }
    if($data->num_rows > 0){ 
        while($row = $result->fetch_assoc()) {
            echo $location;
        }       
    }else {
        echo "Error. No location found";
    
    }

} else {
    echo "error. No user found";
   

}

$conn->close();
?>
