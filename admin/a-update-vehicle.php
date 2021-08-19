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

// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// set ID property of product to be edited
$cars->c_id = $id;
 
// read the details of product to be edited
$cars->readOne();

// set page header

include_once "a-header.php";
?>

<div class ="container">
    <h2 class ="page-title pt-2">Update Vehicle</h2>

    <hr>
<?php

echo "<div class='d-flex bd-highlight pb-3 pt-2'>";
    echo "<div class=' bd-highlight'>";
        echo "<a href='a-vehicles.php' class='btn btn-primary'>Back to Vehicles</a>";
    echo "</div>";
    echo "<div class='ml-auto  bd-highlight'>";
        echo "<button type='button' class='btn btn-primary float-left' data-toggle='modal' data-target='#exampleModal'>";
        echo "Update Car Details";
        echo "</button>";
    echo "</div>";
echo "</div>";

// if the form was submitted
if($_POST){
 
    // set product property values
    $cars->car_id = $_POST['car_id'];
    $cars->cartype = $_POST['cartype'];
    $cars->transmission_id = $_POST['transmission_id'];
    $cars->description = $_POST['description'];
    $cars->hireprice = $_POST['hireprice'];
    $cars->status = $_POST['status'];
 
    // update the product
    if($cars->update()){
        echo "<div class='alert alert-success' role='alert' data-auto-dismiss='1500'>";
            echo "Car details was updated.";
        echo "</div>";
       
    }
 
    // if unable to update the product, tell the user
    else{
        echo "<div class='alert alert-danger' role='alert' data-auto-dismiss='1500'>";
            echo "Unable to update Car.";
        echo "</div>";
    }
}

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
?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      <table class='table table-hover table-bordered'>
 
 <tr>
     <td>Car</td>
     <td>
     <?php
     $stmt = $vehicle->read();
     
     // put them in a select drop-down
     echo "<select class='form-control' name='car_id' id='car_id'>";
    
         while ($row_vehicle = $stmt->fetch(PDO::FETCH_ASSOC)){
             $car_id = $row_vehicle['v_id'];
             $car_name = $row_vehicle['name'];
     
             // current category of the product must be selected
             if($cars->car_id==$car_id){
                 echo "<option value='$car_id' selected>";
             }else{
                 echo "<option value='$car_id'>";
             }
     
             echo "$car_name</option>";
         }
     echo "</select>";
     ?>       
     </td>
 </tr>

 <tr>
     <td>Car Type</td>
     <td><input type='text' name='cartype' id='cartype' value='<?php echo $cars->cartype; ?>' class='form-control' />
     </td>
 </tr>

 <tr>
     <td>Transmission</td>
     <td>
     <?php
         $stmt = $transmission->read();
         
         // put them in a select drop-down
         echo "<select class='form-control' name='transmission_id' id='transmission_id'>";
        
             while ($row_transmission = $stmt->fetch(PDO::FETCH_ASSOC)){
                 $transmission_id=$row_transmission['t_id'];
                 $transmission_name = $row_transmission['transmissiontype'];
         
                 // current category of the product must be selected
                 if($cars->transmission_id==$transmission_id){
                     echo "<option value='$transmission_id' selected>";
                 }else{
                     echo "<option value='$transmission_id'>";
                 }
         
                 echo "$transmission_name</option>";
             }
         echo "</select>";
         ?>
     </td>
 </tr>

 <tr>
     <td>Capacity </td>
     <td><input type='text' name='description' id='description'class='form-control' value='<?php echo $cars->description; ?>'/>
     </td>
 </tr>
   
 <tr>
     <td>Hire Price</td>
     <td><input type='text' name='hireprice' id='hireprice' value='<?php echo $cars->hireprice; ?>' class='form-control' /></td>
 </tr>
 
 <tr>
     <td>Status</td>
     <td>
         <select class="form-control" name="status" id="status">
            <option>Available</option>
            <option>N/A</option>
         </select>
     </td>
 </tr>
</table>

      </div>
      <div class="modal-footer">

        <button type="submit" id='btnUpdate' name="btnUpdate" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php
    include "a-footer.php";
?>