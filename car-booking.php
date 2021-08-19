<?php
session_start();
include_once 'd-header.php';
?>

<div class="container-fluid">
	<?php
	include 'includes/config.php';
	//fetches data in the database the car that might be booked
	$sql ="SELECT c_id, car_id, cartype, transmission_id, description, hireprice, image, status, V.name, T.transmissiontype 
		FROM cars as C 
		LEFT JOIN vehicle as V 
				ON C.car_id = V.v_id
				LEFT JOIN transmission as T 
						ON C.transmission_id = T.t_id
		WHERE 
		c_id = $_GET[id]";
		//uses id to get car picked
	$stmt = $conn->query($sql);
	$rws = $stmt->fetch_assoc();
	?>
    <!--CAR BOOKING-->
    <div class="padding">
        <div class="container">
            <h2 class=text-center>Car Booking <i class="fas fa-car-side"></i></h2>
            <h4><i class="fas fa-book"></i> Book Now!</h4>
            <h3 class="text-center" id="car-book-title"><?php echo $rws['cartype'];?></h4>
            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-11 col-xs-12">
                    <div id ="img">  
                    <a href="car-booking.php?id=<?php echo $rws['c_id'] ?>"> <img class="thumb" src="admin/uploads/<?php echo $rws['image'];?>" >
                    </a>
                    </div>  
                </div>

                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div>
                        <dl>
                            <dt>Price Per Day : </dt>
                            <dd>&#8369; <?php echo $rws['hireprice'];?></dd>
                            <dt>Capacity :</dt>
                            <dd><?php echo $rws['description'];?></dd>
                            <dt>Transmission :</dt>
                            <dd><?php echo $rws['transmissiontype'];?></dd>
                        </dl>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">
					<form method="POST" id="booking">
						<fieldset>
							<legend>Booking Details <i class="far fa-id-card"></i></legend>

							<div class="row">
								<div class="form-group col-md-6">
									<label>First Name</label>
									<input type="text" class="form-control" name="fname" placeholder="First Name" required/>
								</div>

								<div class="form-group col-md-6">
									<label>Last Name</label>
									<input type="text" class="form-control" name="lname" placeholder="Last Name" required/>
								</div>

							</div>
			
							<div class="form-group">
							<label>Email</label>
							<i class="fas fa-envelope"></i>
							<input type="email" class="form-control" name="email" placeholder="Email" >
							<small>For Contact Purposes</small>
							</div>

							<div class="form-group">
							<label>Contact No</label>
							<i class="fas fa-phone-square-alt"></i>
							<input type="text" class="form-control" name="contactno" placeholder="Phone Number" autocomplete="off" >
							<small>For Contact Purposes</small>
							</div>

							<div class="row">
								<div class="form-group col-md-6">
									<label for="From Date">From Date</label>
									<i class="fas fa-calendar"></i>
									<input type="text"  name="fromDate" id="fromDate" class="form-control" placeholder="<?php echo date("yy/m/d")?> " autocomplete="off" />
								</div>
								
								<div class="form-group col-md-6">
									<label for="To Date">To Date</label>
									<i class="fas fa-calendar"></i>
									<input type="text" name="toDate" id="toDate" class="form-control" autocomplete="off" />
								</div>
							</div>
							<button type="button" class="btn btn-secondary" onclick="reset()"><i class="far fa-times-circle"></i> Reset Form </button>
							<input type="submit" class="btn btn-primary " name="send" value="Submit Details" onclick="<?php session_destroy(); ?>">
						</fieldset>	
					</form>
					<?php
							if(isset($_POST['send'])){
								include 'includes/config.php';
								$fname = $_POST['fname'];
								$lname = $_POST['lname'];
								$email = $_POST['email'];
								$contactno = $_POST['contactno'];
								$fromDate = $_POST['fromDate'];
								$toDate = $_POST['toDate'];
								
								//insert booking data into messages for non users 
								$sql = "INSERT INTO messages (car_id, fname, lname, email, contactno, fromDate, toDate, b_status) VALUES ('$_GET[id]', '$fname', '$lname', '$email', '$contactno', '$fromDate','$toDate','Pending')";	
								$result = $conn->query($sql);
								//user confirms if the process has proceeded
								if($result == TRUE){
									echo "<script type = \"text/javascript\">
												alert(\"Car rent request sent!\");
												window.location = (\"status-reply.php?id=$_GET[id]\")
												</script>";
								} else{
									echo "<script type = \"text/javascript\">
												alert(\"Car rent request failed!. Try Again\");
												window.location = (\"car-booking.php\")
												</script>";
								}
							}
					?>
                </div>
				<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div class="text-center" id="verify">
						<h4>Join our membership for free!</h4>
						
						<div class ="btns">
							<h6>Already a member?</h6>
							<a href="" class="btn btn-success">Login Here!</a>
						</div>
						<div class ="btns">
							<h6>Not a member?</h6>
							<a href="" class="btn btn-info">Register Here!</a>
						</div>
						
						<hr>
						<h5>Get discounts and free of charge car rents!</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'd-footer.php';
?>
