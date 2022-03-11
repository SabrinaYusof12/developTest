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

$headers = 
$token = NULL;
foreach ($headers as $header => $value) {

    if($header == 'Authorization'){
        $token = $value;
    }
}

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$sql = "SELECT * FROM users WHERE token='".$token."'";

$result = $conn->query($sql);


if ($result->num_rows > 0) {

    $location = [];    

    $location_id = $_GET['location_id'];

    //table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
    $sql = "SELECT * FROM locations WHERE id='".$location_id."'";

    $data = $conn->query($sql);

    while($row = $data->fetch_assoc()) {
        array_push($location,['district' => $row["district"],'state' => $row["state"],'country'=> $row["country"]]);
    }


    if($data->num_rows > 0){ 
        // set response code - 200 OK
        
        header("Content-Type: application/json");
        http_response_code(200);

        // show products data
        //($location);
        echo json_encode($location);
      
        
    }
      
    else {
        // set response code - 404 Not found
      
        // tell the user no location found
     
        array("message" => "No location found.")
        header("HTTP/1.0 404 Not Found");
        echo json_encode($message);
    }

} 

else {
    // set response code - 401 401 Unauthorized
  
    // no user found
    array("message" => "401 Unauthorized.")
    header("HTTP/1.0 401 Unauthorized");
    echo json_encode($message);

}

$conn->close();
?>