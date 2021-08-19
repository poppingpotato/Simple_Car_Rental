<?php
class Vehicle{
 
    // database connection and table name
    private $conn;
    private $table_name = "vehicle";
 
    // object properties
    public $v_id;
    public $name;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $sql = "SELECT
                    v_id, name
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";  
 
        $stmt = $this->conn->prepare( $sql );
        $stmt->execute();
 
        return $stmt;
    }

    // used to read category name by its ID
    function readName(){
     
    $sql = "SELECT name FROM " . $this->table_name . " WHERE v_id = ? limit 0,1";
 
    $stmt = $this->conn->prepare( $sql );
    $stmt->bindParam(1, $this->v_id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    $this->name = $row['name'];
}
 
}
?>