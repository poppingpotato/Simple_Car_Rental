<?php 
// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){
 
    // set car property values  
    $cars->car_id = $_POST['car_id'];
    $cars->cartype = $_POST['cartype'];
    $cars->transmission_id = $_POST['transmission_id'];
    $cars->description = $_POST['description'];
    $cars->hireprice = $_POST['hireprice'];
        $image=!empty($_FILES["image"]["name"])
            ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
    $cars->image = $image;
    $cars->status = $_POST['status'];
 
    // create the cars
    if($cars->create_car()){
        echo "<div class='alert alert-success' role='alert' data-auto-dismiss='1500'>";
            echo "Car was created.";
        echo "</div>";
        // try to upload the submitted file
        // uploadPhoto() method will return an error message, if any.
        echo $cars->uploadPhoto();
        header("Refresh:2; url=a-vehicles.php");
    }
    // if unable to create the car, tell the user
    else{
        echo "<div class='alert alert-danger' role='alert' data-auto-dismiss='1500'>Unable to create car.</div>";
    }
};
?>

<!-- Add Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" name="create">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Car Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" id="createEntryForm">
        <div class="modal-body" >
            <table class='table table-hover '>
                <tr>
                    <td>Car</td>
                    <td>
                    <?php
                        // read the car categories from the database
                        $stmt = $vehicle->read();
                        
                        // put them in a select drop-down
                        echo "<select class='form-control' name='car_id' id='car_id'>";
                            echo "<option selected hidden>Select category</option>";
                        
                            while ($row_vehicle = $stmt->fetch(PDO::FETCH_ASSOC)){
                                extract($row_vehicle);
                                echo "<option value='{$v_id}'>{$name}</option>";
                            }
                        
                        echo "</select>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Car Type</td>
                    <td><input type='text' name='cartype' id='cartype' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Capacity</td>
                    <td><input type='text' name='description' id='description' class='form-control'></textarea></td>
                </tr>

                <tr>
                    <td>Transmission</td>
                    <td>
                        <?php
                        // read the car categories from the database
                        $stmt = $transmission->read();
                        
                        // put them in a select drop-down
                        echo "<select class='form-control' name='transmission_id' id='transmission_id' >";
                            echo "<option selected hidden>Select category...</option>";
                        
                            while ($row_transmission = $stmt->fetch(PDO::FETCH_ASSOC)){
                                extract($row_transmission);
                                echo "<option value='{$t_id}'>{$transmissiontype}</option>";
                            }
                        
                        echo "</select>";
                        ?></td>
                </tr>

                <tr>
                    <td>Hire Price</td>
                    <td>
                    <input type='text' name='hireprice' id="hireprice" class='form-control' />
                    </td>
                </tr>

                <tr>
                    <td>Photo</td>
                    <td><input type="file" name="image" id="image"/></td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select class="form-control" name="status" id="status" required>
                        <option value ="" selected hidden>Select Status</option>
                        <option>Available</option>
                        <option>N/A</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="submit" name="btnCreate " id="btnCreate" class="btn btn-primary">Create</button>
        </div>
        </form>
    </div>
    </div>
</div>