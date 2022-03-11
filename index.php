<?php
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

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$sql = "SELECT * FROM users where email='syina310@gmail.com'";
$result = $conn->query($sql);

foreach($result as $user){
    $t = $user['token'];
    $id = $user['id'];
}

$headers  = apache_request_headers();
$token = NULL;
if(array_key_exists('Authorization', $headers)){
  header("HTTP/1.1 200 OK");

  if($headers['Authorization'] == $t){

    $authHeader = $headers['Authorization'];
    if ($result->num_rows > 0) {


      //table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
      $sql = "SELECT * FROM locations where user_id=$id";

      $data = $conn->query($sql);

        while($row = $data->fetch_assoc()) {

          $location = [
          'district' => $row["district"],
          'state' => $row["state"],
          'country' => $row["country"],
          ];
        }
    }

  } else {

    header("HTTP/1.1 401 Unauthorized");
  }

} else {

  header("HTTP/1.1 401 Unauthorized");

}



if (http_response_code() == 200){

  print_r($location);

 } elseif (http_response_code() == 404) {

  print_r(array("message" => "No location found."));

} elseif (http_response_code() == 401){

  print_r(array("message" => "401 Unauthorized."));
}

$conn->close();
?>