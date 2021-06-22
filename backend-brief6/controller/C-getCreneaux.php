<?php

// Headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

// include database and appointment model
include_once '../database/Database.php';
include_once '../model/M-Appointment.php';

// Instantiate Database 
$database = new Database();
// db = connect->conn
$db = $database->connect();

// Instantiate  
$appointment = new appointment($db);

// get data
$data   =   json_decode(file_get_contents("php://input"));

$appointment->date          =   $data->date;

if($appointment->getcreneaux()){
    $id=$appointment->getcreneaux();
    echo json_encode(
        $id
    );
}
