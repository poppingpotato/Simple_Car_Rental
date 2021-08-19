<?php
include_once 'a-header.php';
?>
    <div class ="container">
      <h2 class ="page-title pt-2"> Car Bookings </h2>
        <hr>

        <h5 class ="page-title"> <a href ="a-carbookings.php" class="btn btn-info"><i class="far fa-arrow-alt-circle-left "></i></a> Non User Bookings </h5>
        <div class="table-responsive">
						<table id="nonuser" class="table">
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
                //gets the needed values in the database for non users
                    include '../includes/config.php';
                    $sql ="SELECT m_id, fname, lname, email, contactno, fromDate, toDate, b_status, c.cartype, c.hireprice FROM messages AS M LEFT JOIN cars AS C ON M.car_id = C.c_id LEFT JOIN vehicle AS V ON C.car_id = V.v_id LEFT JOIN transmission AS T ON C.transmission_id = T.t_id"; 
                    $stmt = $conn->query($sql);
                    while($row = $stmt->fetch_assoc()){ 
                ?>
                <tr>
                  <td><?php echo $row['cartype'] ?></td>
                  <td>&#8369;<?php echo $row['hireprice'] ?></td>
                  <td>
                  <?php echo $row['fname'] ?>
                  <?php echo $row['lname'] ?>
                  </td>
                  <td><?php echo $row['email']?></td>
                  <td><?php echo $row['contactno']?></td>
                  <td><?php echo $row['fromDate']?></td>
                  <td><?php echo $row['toDate']?></td>
                  <td><?php echo $row['b_status']?></td>
                  <?php 
                  if ($row['b_status'] == "Approved"){ ?>
                    <td><a return-id="<?php echo $row['m_id'];?>" class="btn btn-danger return-object">Returned</a></td>

                  <?php }else if ($row['b_status'] == "Returned") { ?>
                    <td></td>

                  <?php }else if ($row['b_status'] == "Declined") { ?>
                    <td></td>

                  <?php } else {?>
                    <td>
                    <a approve-id="<?php echo $row['m_id'];?>" class="btn btn-info approve-object">Approve</a>
                    <a decline-id="<?php echo $row['m_id'];?>" class="btn btn-danger decline-object">Decline</a>
                    </td>
                  <?php } ?>
                </tr>
                <?php
                  }
                ?>
              </tbody>
						</table>
    </div>
    <hr>
  

    </div>
<?php
include_once 'a-footer.php';
?>