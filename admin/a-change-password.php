
<?php
include_once '../config/core.php';

// include database and object files
include_once '../config/database.php';
include_once '../classes/cars.php';
include_once '../classes/vehicle.php';
include_once '../classes/transmission.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$cars = new Cars($db);
$vehicle = new Vehicle($db);
$transmission = new Transmission($db);

include_once 'a-header.php';

?>

    <div class ="container">
      <h2 class ="page-title pt-2">Change Password</h2>
       
        <hr>
        <img src="../assets/gif/working.gif" alt="Working On It">

<?php
include_once 'a-footer.php';
?>

 