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
$sql = "SELECT * FROM users WHERE token ='$token'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $location_id = ($_GET['location_id']);
    //table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
    $sql = "SELECT tblloc.district, tblloc.state, tblloc.country 
            FROM locations as tblloc
            LEFT JOIN users as tbluser ON tblloc.user_id = tbluser.id
            WHERE tblloc.id ='$location_id'";


    $data = $conn->query($sql);

    while($row = mysqli_fetch_assoc($data)) {
        $array[] = $row;
    }

    if($data->num_rows > 0){ 
        // set response code - 200 OK
      
        // show products data
        echo json_encode($array);
    }
      
    else {
        // set response code - 404 Not found
      
        // tell the user no location found
        $msg = "No location found.";
        echo $msg;
            // array("message" => "No location found.");
      
    }

} else {
    // set response code - 401 401 Unauthorized

  
    // no user found
        $msg = "401 Unauthorized.";
        echo $msg;
        // array("message" => "401 Unauthorized.");

}

$conn->close();
?>