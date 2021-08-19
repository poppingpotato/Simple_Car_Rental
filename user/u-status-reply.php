<?php
include_once 'u-header.php';
?>

<div class="container-fluid">
	<?php
    include 'includes/config.php';
    //fetches data from the database
	$sql ="SELECT c_id, car_id, cartype, transmission_id, description, hireprice, image, status, V.name, T.transmissiontype 
		FROM cars as C 
		LEFT JOIN vehicle as V 
				ON C.car_id = V.v_id
				LEFT JOIN transmission as T 
						ON C.transmission_id = T.t_id
		WHERE 
		c_id = $_GET[id]";
	$stmt = $conn->query($sql);
	$rws = $stmt->fetch_assoc();
	?>
    <!--Status Reply-->
    <div class="padding">
        <div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div id="status">
                        <h4 class="text-center">your car request will be approved soon!</h4>
                        <h6 class="text-center">We'll keep in touch through your email or contact number</h6>
                        <h6 class="text-center">We'll message you soon!</h6>
                        <hr>
						<div class ="details">
							<h4 class="text-center">Car details</h4>
                            <div class = "row">
                                <div class="col-md-6" id ="detail-title">
                                    <blockquote class="blockquote">
                                    <p class="m-0"><strong>Car:</strong></p>
                                    <p class="m-0"><strong>Hire Price:</strong></p>
                                    <p class="m-0"><strong>Seats:</strong></p>
                                    <p class="m-0"><strong>Transmission Type:</strong></p>
                                    </blockquote>
                                </div>

                                <div class ="col-md-6" id ="detail-title">
                                    <blockquote class="blockquote">
                                    <p class="m-0"><?php echo $rws['cartype'];?></p>
                                    <p class="m-0">&#8369; <?php echo $rws['hireprice'];?></p>
                                    <p class="m-0"><?php echo $rws['description'];?></p>
                                    <p class="m-0"><?php echo $rws['transmissiontype'];?></p>
                                    </blockquote>
                                </div>
                            </div>
						</div>
						<hr>
                        <div class ="btns">
                            <h5>Return to Hompage/Go to Messages</h5>
							<a href="index.php" class="btn btn-outline-success" id="btn-dtl-home"><i class="fas fa-home"></i> Home</a>
                            <a href="messages.php" class="btn btn-outline-success" id="btn-dtl-envelope"><i class="far fa-envelope"></i> Messages</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'u-footer.php';

?>
