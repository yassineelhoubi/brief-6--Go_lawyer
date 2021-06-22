<?php

// Headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: applecation/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');



include_once '../database/Database.php';
include_once '../model/M-signup.php';

// Instantiate Database 
$database = new Database();
// db = connect->conn
$db = $database->connect();

// Instantiate Client class for signup
$client = new client($db);

// Get Data and decode it
$data   =   json_decode(file_get_contents("php://input"));

// push data into properties
$client->Fname = $data->Fname;
$client->Lname = $data->Lname;
$client->dateBirth = $data->dateBirth;
$client->email = $data->email;
$client->cnie = strtoupper($data->cnie);
$client->profession = $data->profession;
$client->password = password_hash($data->password, PASSWORD_DEFAULT);

// generate a reference
$client->ref = $client->generateRandomString();

// insert new client in database
if($client->newClient()){
    echo json_encode(
        $client->ref
    );
    
}else{
    echo json_encode(
        "you are already exist"
    );
}




