<?php
include_once "u-header.php";
?>
  <div class="container-fluid">
  <div class = "content">
    <div class ="container">
      <h2 class ="page-title pt-2"> Messages </h2>
        <hr>
        <h3>Car Rental Status </h3>
        <div class="table-responsive">
						<table id="messages" class="table">
              <thead class ="thead-dark">
                <tr>
                  <th>Car</th>
                  <th>Price</th>
                  <th>From Date</th>
                  <th>To Date</th>
                  <th>Status</th>
                  <th>Actions<th>
                </tr>
              </thead>
              <tbody>
                <?php
                    include '../includes/config.php';
                    //fetch the message in the database where user is equal to SESSION id
                    $sql ="SELECT client_id, user_id, ucar_id, fromDate, toDate, ub_status, U.fullname, U.uemail, U.phone, c.cartype, c.hireprice FROM client AS L LEFT JOIN users AS U ON U.uid = L.user_id LEFT JOIN cars AS C ON L.ucar_id = C.c_id LEFT JOIN vehicle AS V ON C.car_id = V.v_id WHERE user_id = '$_SESSION[uid]'"; 
                    $stmt = $conn->query($sql);
                    while($row = $stmt->fetch_assoc()){ 
                ?>
                <tr>
                  <td><?php echo $row['cartype'] ?></td>
                  <td>&#8369;<?php echo $row['hireprice'] ?></td>
                  <td><?php echo $row['fromDate']?></td>
                  <td><?php echo $row['toDate']?></td>
                  <td><?php echo $row['ub_status']?></td>
                  <?php 
                  if ($row['ub_status'] == "Cancelled"){ ?>
                    <td> <a delete-id="<?php echo $row['client_id'];?>" class="btn btn-danger delete-object">Delete</a> </td>
                  <?php }else if($row['ub_status'] == "Returned"){  ?>
                    <td> <a delete-id="<?php echo $row['client_id'];?>" class="btn btn-danger delete-object">Delete</a> </td>
                  <?php }else { ?>
                    <td>
                      <a cancel-id="<?php echo $row['client_id'];?>" class="btn btn-info cancel-user">Cancel</a>
                      <a delete-id="<?php echo $row['client_id'];?>" class="btn btn-danger delete-object">Delete</a>
                      </td>
                  <?php } ?>
                </tr>
                <?php
                  }
                ?>
              </tbody>
						</table>
    </div>
        

    </div>
  </div>
  </div>

<?php
include_once 'u-footer.php';
?>