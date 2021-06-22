<?php

// Headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: applecation/json');
header('Access-Control-Allow-Methods: POST');
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

// push data into properties
$appointment->sujet         =   $data->sujet;
$appointment->date         =   $data->date;
$appointment->ref      =   $data->ref;
$appointment->idcreneaux    =   $data->idcreneaux;



if($appointment->newAppointment()){
    echo json_encode(
        'done'
    );
    
}else{
    echo json_encode(
        'err'
    );
}
