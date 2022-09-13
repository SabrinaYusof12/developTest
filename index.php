<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

$headers = ["Authorization" => ""];
$token = NULL;
foreach ($headers as $header => $value) {

  if ($header == 'Authorization') {
    $token = $value;
  }
}

$user = "";
$error = "";

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$sql =  "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $user =  "id: " . $row["id"] .
      "Name: " . $row["name"] .
      "email: " . $row["email"] .
      "token: " . $row["token"] .
      "created: " . $row["created"] .
      "branch_name: " . $row["branch_name"] .
      "<br>";
    //   }
    // } else {
    //   echo "0 results";
    // }

    $location_id = $row['id'];
    //table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
    $sql =  "SELECT id, user_id, district, state, country, branch_name FROM locations WHERE user_id = " . $location_id;

    $data = $conn->query($sql);
    $location = "";

    while ($row = $data->fetch_assoc()) {
      $location += $row["district"] . ",";
      $location += $row["state"] . ",";
      $location += $row["country"];
    }


    if ($data->num_rows > 0) {
      // set response code - 200 OK
      http_response_code(200);
      // show products data
      echo ($user . " " . $location);
    } else if ($data->num_rows == 0) {
      // set response code - 404 Not found
      http_response_code(404);
      // tell the user no location found 
      $error = array("message" => "No location found.");
      echo $error["message"];
    } else {
      // set response code - 401 401 Unauthorized
      http_response_code(401);
      // no user found
      $error = array("message" => "401 Unauthorized.");
      echo $error["message"];
    }
  }
}

$conn->close();
