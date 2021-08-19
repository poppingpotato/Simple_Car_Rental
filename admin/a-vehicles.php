<?php
// core.php holds pagination variables
include_once '../config/core.php';

// include database and object files
include_once '../config/database.php';
include_once '../classes/cars.php';
include_once '../classes/vehicle.php';
include_once '../classes/transmission.php';
 
// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$cars = new Cars($db);
$vehicle = new Vehicle($db);
$transmission = new Transmission($db);

include_once "a-header.php";
include_once "a-create-vehicle.php";
// query products
$stmt = $cars->readAll($from_record_num, $records_per_page);

// specify the page where paging is used
$page_url = "a-vehicles.php?";

// count total rows - used for pagination
$total_rows=$cars->countAll();

// read_template.php controls how the product list will be rendered
include_once "manage-vehicles.php";

// layout_footer.php holds our javascript and closing html tags
include_once "a-footer.php";
?>





