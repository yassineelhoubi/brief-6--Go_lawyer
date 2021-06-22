<?php

// Headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: applecation/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

include_once '../database/Database.php';
include_once '../model/M-login.php';
// database
$database   =   new Database();
$db         =   $database->connect();
// 
$login      =   new login($db);

$data   =   json_decode(file_get_contents("php://input"));

$login->ref   =   $data->ref;

$row =   $login->login();
if($row){
        echo json_encode(
            array("ref"=>$row)
        );
}

else{
    echo json_encode(
        array("ref"=>$row)
    );
}




