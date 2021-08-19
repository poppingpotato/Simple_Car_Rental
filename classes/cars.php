<?php
class Cars{
 
    // database connection and table name
    private $conn;
    private $table_name = "cars";
 
    // object properties
    public $c_id;
    public $car_id;
    public $cartype;
    public $transmission_id;
    public $description;
    public $hireprice;
    public $image;
    public $status;
    public $timestamp;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create product
    function create_car(){
 
        //write sql
        $sql = "INSERT INTO
                    " . $this->table_name . "
                SET
                    car_id=:car_id, 
                        cartype=:cartype, 
                            transmission_id=:transmission_id, 
                                description=:description, 
                                    hireprice=:hireprice, 
                                        image=:image,
                                            status=:status,
                                                created=:created";
 
        $stmt = $this->conn->prepare($sql);
 
        // posted values
        $this->car_id=htmlspecialchars(strip_tags($this->car_id));
        $this->cartype=htmlspecialchars(strip_tags($this->cartype));
        $this->transmission_id=htmlspecialchars(strip_tags($this->transmission_id));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->hireprice=htmlspecialchars(strip_tags($this->hireprice));
        $this->image=htmlspecialchars(strip_tags($this->image));
        $this->status=htmlspecialchars(strip_tags($this->status));
        
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
 
        // bind values 
        $stmt->bindParam(":car_id", $this->car_id);
        $stmt->bindParam(":cartype", $this->cartype);
        $stmt->bindParam(":transmission_id", $this->transmission_id);
        $stmt->bindParam(":hireprice", $this->hireprice);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":created", $this->timestamp);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":status", $this->status);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

    function readAll($from_record_num, $records_per_page){
 
        $sql = "SELECT c_id, car_id, cartype, transmission_id, description, hireprice, status FROM " . $this->table_name . " ORDER BY car_id ASC LIMIT {$from_record_num}, {$records_per_page}";
     
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
     
        return $stmt;
    }

    // used for paging products
    public function countAll(){
    
        $sql = "SELECT c_id FROM " . $this->table_name . "";
    
        $stmt = $this->conn->prepare( $sql );
        $stmt->execute();
    
        $num = $stmt->rowCount();
    
        return $num;
    }

    function readOne(){
 
        $sql = "SELECT
                    car_id, cartype, transmission_id, description, hireprice, image, status
                FROM
                    " . $this->table_name . "
                WHERE
                    c_id = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $sql );
        $stmt->bindParam(1, $this->c_id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->car_id = $row['car_id'];
        $this->cartype = $row['cartype'];
        $this->transmission_id = $row['transmission_id'];
        $this->description = $row['description'];
        $this->hireprice = $row['hireprice'];
        $this->image = $row['image'];
        $this->status = $row['status'];
    }

    function update(){
 
        $sql = "UPDATE
                    " . $this->table_name . "
                SET
                    car_id=:car_id,
                        cartype=:cartype,
                            transmission_id=:transmission_id,
                                description=:description,
                                    hireprice=:hireprice,
                                        status =:status
                    
                WHERE
                    c_id=:c_id";
     
        $stmt = $this->conn->prepare($sql);
     
        // posted values
        $this->car_id=htmlspecialchars(strip_tags($this->car_id));
        $this->cartype=htmlspecialchars(strip_tags($this->cartype));
        $this->transmission_id=htmlspecialchars(strip_tags($this->transmission_id));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->hireprice=htmlspecialchars(strip_tags($this->hireprice));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->c_id=htmlspecialchars(strip_tags($this->c_id));
     
        // bind parameters
        $stmt->bindParam(':car_id', $this->car_id);
        $stmt->bindParam(':cartype', $this->cartype);
        $stmt->bindParam(':transmission_id', $this->transmission_id);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':hireprice', $this->hireprice);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':c_id', $this->c_id);

     
        // execute the query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }

    // delete the product
    function delete(){
 
        $sql = "DELETE FROM " . $this->table_name . " WHERE c_id = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->id);
    
        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    // read products by search term
    public function search($search_term, $from_record_num, $records_per_page){
                
    $sql ="SELECT c_id, car_id, cartype, transmission_id, description, hireprice, status, V.name, T.transmissiontype 
            FROM " . $this->table_name . " as C 
	            LEFT JOIN vehicle as V 
                    ON C.car_id = V.v_id
		                LEFT JOIN transmission as T 
                            ON C.transmission_id = T.t_id
            WHERE 
                V.name LIKE ? OR T.transmissiontype LIKE ? OR C.cartype LIKE ? 
            ORDER BY
                c.car_id ASC
            LIMIT
                ?, ?";


                
 
    // prepare query statement
    $stmt = $this->conn->prepare($sql);
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $search_term);
    $stmt->bindParam(3, $search_term);
    $stmt->bindParam(4, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(5, $records_per_page, PDO::PARAM_INT);
        
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}
 
public function countAll_BySearch($search_term){
 
    // select query
    $sql = "SELECT
                COUNT(*) as total_rows
                FROM " . $this->table_name . " as C 
	            LEFT JOIN vehicle as V 
                    ON C.car_id = V.v_id 
		                LEFT JOIN transmission as T 
                            ON C.transmission_id = T.t_id
            WHERE
                V.name LIKE ? OR T.transmissiontype LIKE ? OR C.cartype LIKE ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $sql );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $search_term);
    $stmt->bindParam(3, $search_term);
 
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

// will upload image file to server
function uploadPhoto(){
 
        $result_message="";
    
        // now, if image is not empty, try to upload the image
        if($this->image){
    
            // sha1_file() function is used to make a unique file name
            $target_directory = "uploads/";
            $target_file = $target_directory . $this->image;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
    
            // error message is empty
            $file_upload_error_messages="";

            // make sure that file is a real image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check!==false){
                // submitted file is an image
            }else{
                $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
            }
            
            // make sure certain file types are allowed
            $allowed_file_types=array("jpg", "jpeg", "png", "gif");
            if(!in_array($file_type, $allowed_file_types)){
                $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
            } 
            
            // make sure submitted file is not too large, can't be larger than 5 MB
            if($_FILES['image']['size'] > (5097152)){
                $file_upload_error_messages.="<div>Image must be less than 5 MB in size.</div>";
            }
            
            // make sure the 'uploads' folder exists
            // if not, create it
            if(!is_dir($target_directory)){
                mkdir($target_directory, 0777, true);
            }

            // if $file_upload_error_messages is still empty
            if(empty($file_upload_error_messages)){
                // it means there are no errors, so try to upload the file
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    // it means photo was uploaded
                }else{
                    $result_message.="<div class='alert alert-danger'>";
                        $result_message.="<div>Unable to upload photo.</div>";
                        $result_message.="<div>Update the record to upload photo.</div>";
                    $result_message.="</div>";
                }
            }
            
            // if $file_upload_error_messages is NOT empty
            else{
                // it means there are some errors, so show them to user
                $result_message.="<div class='alert alert-danger'>";
                    $result_message.="{$file_upload_error_messages}";
                    $result_message.="<div>Update the record to upload photo.</div>";
                $result_message.="</div>";
            }
            
        }
    
        return $result_message;
    }
}
?>