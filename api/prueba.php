<?php

/*curl -X 'POST' \
  'http://localhost:3000/api/buscar-libro' \
  -H '' \
  -H 'Content-Type: application/json' \
  -d '{
  "filtro": ""
}'*/
$data = json_encode(array('filtro' => ''));

$url = "http://192.168.1.85:3000/api/buscar-libro";
$token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bml2ZXJzaWRhZF9pZCI6IjE5MDAyNTYxIiwibm9tYnJlIjoiMTkwMDI1NjEiLCJncnVwbyI6IjE5MDAyNTYxIiwiaWF0IjoxNjY5NzY0MTY0LCJleHAiOjE2Njk3Njc3NjR9.5UzhEitr7R9VaJtsH9Lb1TW9AoLQEHti8wY_Wz71_J4";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'accept: */*',
    "Authorization: Bearer $token"
));
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($curl);
curl_close($curl);

echo $resp;

//setup the request, you can also use CURLOPT_URL

/*

$headers = array(
    'accept: ',
    'Content-Type: application/json',
    'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bml2ZXJzaWRhZF9pZCI6IjE5MDAyNTYxIiwibm9tYnJlIjoiMTkwMDI1NjEiLCJncnVwbyI6IjE5MDAyNTYxIiwiaWF0IjoxNjY5NzY0MTY0LCJleHAiOjE2Njk3Njc3NjR9.5UzhEitr7R9VaJtsH9Lb1TW9AoLQEHti8wY_Wz71_J4'
);

$curl = curl_init('http://192.168.1.85:3000/api/buscar-libro');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($curl);
var_dump($response);
curl_close($curl);
$response = json_decode($response, true);
var_dump($response);*/