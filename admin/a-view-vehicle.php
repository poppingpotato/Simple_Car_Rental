<?php

// include database and object files
include_once '../config/database.php';
include_once '../classes/cars.php';
include_once '../classes/vehicle.php';
include_once '../classes/transmission.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$cars = new Cars($db);
$vehicle = new Vehicle($db);
$transmission = new Transmission($db);

if($_POST){

// set ID property of Cars to be read
$cars->c_id = $_POST['id'];
 
// read the details of Cars to be read
$cars->readOne();


// HTML table for displaying a Car details
echo "<table class='table table-hover table-bordered'>";
 
    echo "<tr>";
    echo "<td>Car</td>";
    echo "<td>";
        // display category name
        $vehicle->v_id=$cars->car_id;
        $vehicle->readName();
        echo $vehicle->name;
    echo "</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Price</td>";
        echo "<td>{$cars->cartype}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Transmission Type</td>";
        echo "<td>";
            // display category name
            $transmission->t_id=$cars->transmission_id;
            $transmission->readName();
            echo $transmission->transmissiontype;
        echo "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Description</td>";
        echo "<td>{$cars->description}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Image</td>";
        echo "<td>";
            echo $cars->image ? "<img src='uploads/{$cars->image}' style='width:300px;' />" : "No image found.";
        echo "</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Price</td>";
        echo "<td>&#8369;{$cars->hireprice}</td>";
    echo "</tr>";
    
    echo "<tr>";
        echo "<td>Status</td>";
        echo "<td>{$cars->status}</td>";
    echo "</tr>";
 
echo "</table>";
}

?>
<script src="scripts/view.js"></script>