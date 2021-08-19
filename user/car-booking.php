<?php
include_once "u-header.php";
//fetches data in the database the car that might be booked
include 'includes/config.php';
$sql ="SELECT c_id, car_id, cartype, transmission_id, description, hireprice, image, status, V.name, T.transmissiontype 
	FROM cars as C 
	LEFT JOIN vehicle as V 
			ON C.car_id = V.v_id
			LEFT JOIN transmission as T 
					ON C.transmission_id = T.t_id
	WHERE 
	c_id = '$_GET[id]' ";
	//uses id to get car picked
$stmt = $conn->query($sql);
$rws = $stmt->fetch_assoc();
?>

<div class="container-fluid">
    <!--car booking-->
    <div class="padding">
        <div class="container">
            <h2 class=text-center>Car Booking <i class="fas fa-car-side"></i></h2>
            <h4><i class="fas fa-book"></i> Book Now!</h4>
            <h3 class="text-center" id=car-book-title><?php echo $rws['cartype'];?></h4>
            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-11 col-xs-12">
                    <div id ="img">  
                    <a href="car-booking.php?id=<?php echo $rws['c_id'] ?>"> <img class="thumb" src="../admin/uploads/<?php echo $rws['image'];?>" >
                    </a>
                    </div>  
                </div>

                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div>
                        <dl>
                            <dt>Price Per Day : </dt>
                            <dd>&#8369; <?php echo  $rws['hireprice'];?></dd>
                            <dt>Capacity :</dt>
                            <dd><?php echo  $rws['description'];?></dd>
                            <dt>Transmission :</dt>
                            <dd><?php echo  $rws['transmissiontype'];?></dd>
                        </dl>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<form method="POST" id="booking">
						<fieldset>
							<legend>Booking Details <i class="far fa-id-card"></i></legend>

							<div class="row">
								<div class="form-group col-md-6">
									<label for="From Date">From Date</label>
									<i class="fas fa-calendar"></i>
									<input type="text" id="fromDate" name="fromDate" class="form-control" placeholder="<?php echo date("yy/m/d")?>" autocomplete="off" required/>
								</div>
								
								<div class="form-group col-md-6">
									<label for="To Date">To Date</label>
									<i class="fas fa-calendar"></i>
									<input type="text" id="toDate" name="toDate" class="form-control" autocomplete="off" required/>
								</div>
							</div>
							<button type="button" class="btn btn-secondary" onclick="reset()"><i class="far fa-times-circle"></i> Reset Form </button>
							<input type="submit" class="btn btn-primary " name="send" value="Submit Details">
						</fieldset>	
					</form>
					<?php
							if(isset($_POST['send'])){
								include 'includes/config.php';
								$fromDate = $_POST['fromDate'];
								$toDate = $_POST['toDate'];
								
								//insert booking data into client 
								$sql = "INSERT INTO client (ucar_id, user_id, fromDate, toDate, ub_status) VALUES ('$_GET[id]', '$_SESSION[uid]', '$fromDate', '$toDate','Pending')";	
								$result = $conn->query($sql);
								//confirms if the process has proceeded
								if($result == TRUE){
									echo "<script type = \"text/javascript\">
												alert(\"Car rent request sent!\");
												window.location = (\"u-status-reply.php?id=$_GET[id]\")
												</script>";
								} else{
									echo "<script type = \"text/javascript\">
												alert(\"Car rent request failed!. Try Again\");
												window.location = (\"car-booking.phpid=$_GET[id]\")
												</script>";
								}
							}
					?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'u-footer.php';

?>
