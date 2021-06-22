<?php

class login{
    // db
    public $conn;

    // properties
    public $ref;

    //connection 
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Login
    public function login(){
        $sql    =   "SELECT * FROM client WHERE ref =:ref";
        $stmt   =   $this->conn->prepare($sql);
        $stmt->bindParam(':ref',$this->ref);
        $stmt->execute();
        $row        =   $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }


}