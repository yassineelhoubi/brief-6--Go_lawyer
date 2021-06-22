<?php

class appointment
{
    // db
    private $conn;
    // Appointment Properties
    public $id;
    public $sujet;
    public $date;
    public $idclient;
    public $idcreneaux;
    public $ref;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getcreneaux()
    {
        // request
        $sql = "SELECT * FROM creneaux WHERE id NOT IN(SELECT idcreneaux FROM appointment WHERE date = :date)";

        // prepare request
        $stmt   =   $this->conn->prepare($sql);

        //bind data
        $stmt->bindParam(':date', $this->date);

        // exectute
        $stmt->execute();

        // get all id 
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    public function newAppointment()
    {
        // request
        $sql    =   "INSERT INTO appointment (`sujet`, `date`, `ref`, `idcreneaux`) 
        VALUES (:sujet,:date,:ref,:idcreneaux)";

        // prepare request
        $stmt   =   $this->conn->prepare($sql);

        //bind data
        $stmt->bindParam(':sujet', $this->sujet);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':ref', $this->ref);
        $stmt->bindParam(':idcreneaux', $this->idcreneaux);

        // exectute
        return $stmt->execute();
    }
    public function getAppointment()
    {
        // request
        $sql    =   "SELECT a.id , a.sujet, a.date , c.creneaux , c.id as idcreneaux  FROM appointment a , creneaux c WHERE ref = :ref AND a.idcreneaux = c.id ORDER BY a.id";

        // prepare request
        $stmt   =   $this->conn->prepare($sql);

        //bind data
        $stmt->bindParam(':ref', $this->ref);


        // exectute  
        $stmt->execute();

        // fetch data
        $result =   $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateAppointment()
    {
        // request
        $sql    =   "UPDATE appointment SET sujet=:sujet, date=:date,idcreneaux=:idcreneaux WHERE id=:id";

        // prepare request
        $stmt   =   $this->conn->prepare($sql);

        //bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':sujet', $this->sujet);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':idcreneaux', $this->idcreneaux);

        // exectute  
        return $stmt->execute();;
    }
    
    public function deleteAppointment()
    {
        // request
        $sql    =   "DELETE FROM appointment WHERE id = :id ";

        // prepare request
        $stmt   =   $this->conn->prepare($sql);

        //bind data
        $stmt->bindParam(':id', $this->id);

        // exectute  
        return $stmt->execute();
    }
}
