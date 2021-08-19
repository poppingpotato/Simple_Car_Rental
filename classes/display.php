<?php
class Display{
    
    private $conn;

    public $c_id;
    public $car_id;
    public $carttype;
    public $transmission_id;
    public $description;
    public $hireprice;
    public $image;
    public $status;
   
    public function __construct($db){
        $this->conn=$db;
    }

    function display(){
        $sql = "SELECT c_id, car_id, cartype, transmission_id, description, hireprice, image, status FROM cars WHERE status = 'Available'";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;


    }
}