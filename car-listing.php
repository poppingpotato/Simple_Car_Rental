<?php
session_start();
include_once "d-header.php";
?>

  <div class="container-fluid">
    <!--SERVICES-->
    <div class="padding">
      <div class="container">
        <h2 class=text-center>Car Listing</h2>
        

        <div id ="listing">
          <div class="row">
            <?php
              include 'includes/config.php';
              //fetches data in the database dbcarrental
              $sql ="SELECT c_id, car_id, cartype, transmission_id, description, hireprice, image, status, V.name, T.transmissiontype 
                FROM cars as C 
                  LEFT JOIN vehicle as V 
                        ON C.car_id = V.v_id
                        LEFT JOIN transmission as T 
                                ON C.transmission_id = T.t_id
                WHERE 
                  status ='Available' ";
                  //shows only cars that are available in the database
              $stmt = $conn->query($sql);
              while($rws = $stmt->fetch_assoc()){ 
            ?>
          
            <div class="col-lg-5 col-md-5 col-sm-7 col-xs-12">
              <div id ="img">  
               <img class="thumb" src="admin/uploads/<?php echo $rws['image'];?>" height="250">
              </div>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-7 col-xs-12">
              <div id="details">
                <dl>
                  <div class="form-group-row">
                  <h4><?php echo $rws['cartype'];?></h4>
                  </div>

                  <dt>Price Per Day : </dt>
                    <dd>&#8369; <?php echo  $rws['hireprice'];?></dd>
                  <dt>Capacity :</dt>
                    <dd><?php echo  $rws['description'];?></dd>
                  <dt>Transmission :</dt>
                    <dd><?php echo  $rws['transmissiontype'];?></dd>
                    
                    <a class="btn" href="car-booking.php?id=<?php echo $rws['c_id'] ?>" id ="btn-listing">See Details <i class="fas fa-chevron-circle-right"></i></a>
                </dl>
              </div>
            </div>
            <?php
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include_once 'd-footer-foot.php';
include_once "d-footer.php";
?>