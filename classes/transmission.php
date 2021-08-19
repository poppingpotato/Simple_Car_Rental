<?php
class Transmission{
 
    // database connection and table name
    private $conn;
    private $table_name = "transmission";
 
    // object properties
    public $t_id;
    public $transmissiontype;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $sql = "SELECT
                    t_id, transmissiontype
                FROM
                    " . $this->table_name . "
                ORDER BY
                    transmissiontype";  
 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
 
        return $stmt;
    }

    // used to read category name by its ID
    function readName(){
     
    $sql = "SELECT transmissiontype FROM " . $this->table_name . " WHERE t_id = ? limit 0,1";
 
    $stmt = $this->conn->prepare( $sql );
    $stmt->bindParam(1, $this->t_id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    $this->transmissiontype = $row['transmissiontype'];
}
 
}
?>