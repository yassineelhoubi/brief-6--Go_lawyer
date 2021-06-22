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
$appointment->id         =   $data->id;   
$appointment->sujet         =   $data->sujet;
$appointment->date          =   $data->date;
$appointment->idcreneaux    =   $data->idcreneaux;

// foreach($appointment->getidcreneaux() as $id){
//     echo json_encode(
//         array( $id )
//     );
// }

if($appointment->updateAppointment()){
    echo json_encode(
        array('message' => 'done' )
    );
    
}else{
    echo json_encode(
        array('message' => "you are already exist")
    );
}
