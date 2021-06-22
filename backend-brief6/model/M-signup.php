<?php

class client {

    // db
    private $conn;
    // Client properties
    public $Fname;
    public $Lname;
    public $dateBirth;
    public $email;
    public $cnie ;
    public $profession;
    public $ref ;
    public $password;
    
    public function __construct($db){
        $this->conn = $db;
    }

    public function generateRandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $ref = '';
        for ($i = 0; $i < 5; $i++) {
            $ref .= $characters[rand(0, $charactersLength - 1)];
            
        }
        $ref .=$this->cnie;
        return $ref;
    }
    public function newClient() {
        $checkifexist   =   "SELECT ref FROM client WHERE cnie = ? OR email = ?";
        $stmt           =   $this->conn->prepare($checkifexist);
        $stmt->execute([$this->cnie,$this->email]);
        $result         =   $stmt->rowCount();
        if($result == 0){
            $registerClient =   "INSERT INTO client (`Fname`, `Lname`, `dateBirth`, `email`, `cnie`, `profession`, `ref`,`password`) 
                                    VALUES (:Fname,:Lname,:dateBirth,:email,:cnie,:profession,:ref,:password)"; 
            $stmt           =   $this->conn->prepare($registerClient);
            $stmt->bindParam(':Fname',$this->Fname);
            $stmt->bindParam(':Lname',$this->Lname);
            $stmt->bindParam(':dateBirth',$this->dateBirth);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':cnie',$this->cnie);
            $stmt->bindParam(':profession',$this->profession);
            $stmt->bindParam(':ref',$this->ref);
            $stmt->bindParam(':password',$this->password);
            
            $stmt->execute();  
            return true ;
        }else{
            return false;
        }
    }
}
/* $x = new client($db);
$cnie = "hh71800";
echo $x->generateRandomString($cnie);
echo '<br>';
echo $x->newClient(); */
