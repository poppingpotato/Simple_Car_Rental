<?php
include_once 'a-header.php';
?>
    <div class ="container">
      <h2 class ="page-title pt-2"> Car Bookings </h2>
        <hr>
        <h5 class ="page-title "><a href ="a-carbookings.php" class="btn btn-info"><i class="far fa-arrow-alt-circle-left"></i></a> User Bookings </h5>             
          <div class="table-responsive">
            <table id="umessage" class="table">
              <thead class ="thead-dark">
                <tr>
                  <th>Car</th>
                  <th>Price</th>
                  <th>Full name</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>From Date</th>
                  <th>To Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                //gets info in databse client
                    include '../includes/config.php';
                    $sql ="SELECT client_id, user_id, ucar_id, fromDate, toDate, ub_status, U.fullname, U.uemail, U.phone, c.cartype, c.hireprice 
                      FROM client AS L 
                        LEFT JOIN users AS U ON U.uid = L.user_id 
                          LEFT JOIN cars AS C ON L.ucar_id = C.c_id 
                            LEFT JOIN vehicle AS V ON C.car_id = V.v_id"; 
                    $stmt = $conn->query($sql);
                    while($row = $stmt->fetch_assoc()){ 
                ?>
                <tr>
                  <td><?php echo $row['cartype'] ?></td>
                  <td>&#8369;<?php echo $row['hireprice'] ?></td>
                  <td>
                  <?php echo $row['fullname'] ?>
                  
                  </td>
                  <td><?php echo $row['uemail'] ?></td>
                  <td><?php echo $row['phone']?></td>
                  <td><?php echo $row['fromDate']?></td>
                  <td><?php echo $row['toDate']?></td>
                  <td><?php echo $row['ub_status']?></td>
                  <?php 
                  if ($row['ub_status'] == "Cancelled"){ ?>
                    <td></td>

                  <?php }else if ($row['ub_status'] == "Approved") { ?>
                    <td><a r-user-id="<?php echo $row['client_id'];?>" class="btn btn-danger return-user">Return</a></td>

                  <?php }else if ($row['ub_status'] == "Returned") { ?>
                    <td></td>

                  <?php }else if ($row['ub_status'] == "Declined") { ?>
                  <td></td>

                  <?php }else { ?>
                    <td>
                    <a user-id="<?php echo $row['client_id'];?>" class="btn btn-info approve-user">Approve</a>
                    <a d-user-id="<?php echo $row['client_id'];?>" class="btn btn-danger decline-user">Decline</a></td>
                    </td>
                  <?php } ?>  

                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        <!-- h5 -->
      <!-- h2 -->
    </div>
<?php
include_once 'a-footer.php';
?>