<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'test.hla-integrated.com/<branch-name>?location_id=<location-id>',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: <jwt-token>'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>
