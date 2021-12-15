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

//pass connection to objects
$cars = new Cars($db);
$vehicle = new Vehicle($db);
$transmission = new Transmission($db);

include_once 'a-header.php';

?>

    <div class ="container">
        <h2 class ="page-title pt-2"><i class="fas fa-car-alt"></i> Vehicles</h2>
        
            <hr>
            
            <?php
            
            echo "<div class = 'row pb-2 col-md-12'>";
            
            
                // create product button
                echo "<div class=' pr-1'>";
                    echo "<button type='button' class='btn btn-primary' id='createEntry' data-toggle='modal' data-target='#createModal'>";
                        echo "<i class='fas fa-plus'></i> Create Car Entry";
                    echo "</button>";
                echo "</div>";
                // generate pdf
                echo"<form action='generatepdf.php' method='POST'>";
                    echo "<div class='col-md p-0'>";
                        echo "<button href='generatepdf.php' type='submit' class='btn btn-primary'>";
                            echo "<i class='fas fa-list'></i> Generate Report";
                        echo "</a>";
                    echo "</div>"; 
                    echo"<input type='text' name='value'>";
                echo"</form>";
             

            // search form
            echo "<div class='ml-auto' id = 'search'>";
                echo "<form role='search' action='search.php'>";
                    echo "<div class='input-group' >";
                        $search_value=isset($search_term) ? "value='{$search_term}'" : "";
                        echo "<input type='search' class='form-control' placeholder='Car/Car Type/Transmission' name='s' id='srch-term' required {$search_value}'/>";
                        echo "<div class='input-group-append'>";
                            echo "<a href='a-vehicles.php' class='btn btn-primary'><i class='fas fa-redo-alt fa-flip-horizontal'></i></a>";
                        echo "</div>";
                        echo "<div class='input-group-append'>";
                            echo "<button class='btn btn-primary' type='submit'><i class='fas fa-search'></i> Search </button>";
                        echo "</div>";
                    echo "</div>";
                echo "</form>";
            echo "</div>";
            

            echo "</div>";

            
      

          
            
            echo "<div class='table-responsive'>";
            // display the products if there are any
            if($total_rows>0){
                
                echo "<table id='test' class='table'>";
                echo "<thead class='thead-dark'>";
                    echo "<tr>";
                        echo "<th>Car</th>";
                        echo "<th>Car Type</th>";
                        echo "<th>Transmission</th>";
                        echo "<th>Capacity</th>";
                        echo "<th>Hire Price</th>";
                        echo "<th>Status</th>";
                        echo "<th>Actions</th>";
                    echo "</tr>";
                echo "</thead>";

                echo "<tbody>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    extract($row);

                    echo "<tr>";
                        echo "<td>";
                            $vehicle->v_id = $car_id;
                            $vehicle->readName();
                            echo $vehicle->name;
                        echo "</td>";
                        echo "<td>{$cartype}</td>";
                        echo "<td>";
                            $transmission->t_id = $transmission_id;
                            $transmission->readName();
                            echo $transmission->transmissiontype;
                        echo "</td>";
                        echo "<td>{$description}</td>";
                        echo "<td>&#8369;{$hireprice}</td>";
                        echo "<td>{$status}</td>";

                        echo "<td>";
                            // read, edit and delete buttons
                            echo "
                            <a view-id='{$c_id}' class='btn btn-success view-id' >
                            View
                            </a>

                            <a href='a-update-vehicle.php?id={$c_id}' class='btn btn-info left-margin'> 
                                <span class='glyphicon glyphicon-edit'></span> Edit
                                </a>

                            <a delete-id='{$c_id}' class='btn btn-danger delete-object'>
                            Delete
                            </a>";
                        echo "</td>";

                    echo "</tr>";

                }
                echo "</tbody>";

            echo "</table>";
                
                // paging buttons
                include_once 'paging.php';
            }
            
            // tell the user there are no products
            else{
                echo "<div class='alert alert-danger'>No Cars found.</div>";
            }
            echo "</div>";
            ?>
        </div>

        


        

<!--View Modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Viewing</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
        <div id ="viewContent">
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<!-- View Modal -->

<!--Update Modal -->
<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Updating</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
        <div id ="updateContent">
        </div>
        </div>
      
        </div>
    </div>
</div>
<!-- Update Modal -->

<?php
include_once 'a-footer.php';
?>
 