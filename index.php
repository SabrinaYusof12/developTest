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

$headers = apache_request_headers();
$token = NULL;
foreach ($headers as $header => $value) {

    if($header == 'Authorization'){
        $token = $value;
    }
}

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$sql = "SELECT token FROM users WHERE token='$token'";

$result = $conn->query($sql);


if ($result->num_rows > 0) {

    $location_id = $_GET['location_id'];
    //table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
    $sql = "SELECT * FROM locations a
            LEFT JOIN users b
            ON b.id=a.user_id
            WHERE a.id = '$location_id'";

    $data = $conn->query($sql);
    $location = array();

    while($row = $data->fetch_assoc()) {
        $location = array(
            "district" => $row["district"],
            "state" => $row["state"],
            "country" => $row["country"]
        );
    }

    if($data->num_rows > 0){ 
        // set response code - 200 OK
            http_response_code(200);
        // show products data
            echo json_encode($location);
        }
    
    else {
        // set response code - 404 Not found
            http_response_code(404);
        // tell the user no location found
            $messages = array(
                "error" => 404,
                "message" => "404 Not found - No location found."
            );
            echo json_encode($messages);
    }

} else {
    // set response code - 401 401 Unauthorized
        http_response_code(401);
  
    // no user found
    $messages = array(
        "error" => 401,
        "message" => "401 Unauthorized - No user found."
    );

        echo json_encode($messages);
   

}

$conn->close();
?>