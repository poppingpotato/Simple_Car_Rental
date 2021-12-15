<?php
// check if value was posted
if($_POST){
 
    // include database and object file
    include_once '../config/database.php';
    include_once '../classes/cars.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare product object
    $cars = new Cars($db);
     
    //set car id to be deleted
    $cars->id = $_POST['object_id'];
     
    // delete the car
    if($cars->delete()){
        echo "<div class='alert alert-success' role='alert' data-auto-dismiss='1500'>";
            echo "Car was deleted.";
        echo "</div>";
    }
    
    // if unable to delete the product
    else{
        echo "<div class='alert alert-danger' role='alert' data-auto-dismiss='1500'>";
            echo "Unable to delete Car.";
        echo "</div>";
    }
};
?>