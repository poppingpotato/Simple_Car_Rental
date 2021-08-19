<?php
	include_once 'include/actions.php';
	
	$id = $_REQUEST['id'];
	//sets status of client message to Declined
	$sql = "UPDATE messages a JOIN cars b SET a.b_status = 'Returned', b.status = 'Available' WHERE m_id = '$id' AND a.car_id = b.c_id";

	$stmt = $conn->query($sql);
	//confirms the user if declined or not
	if($stmt === TRUE){
		echo "<script type = \"text/javascript\">
        alert(\"Car has been returned\");
        window.location = (\"a-messages.php\")
		</script>";
	}
	else {
		echo "<script type = \"text/javascript\">
        alert(\"Car has not been returned\");
        window.location = (\"a-messages.php\")
		</script>";
	}
?>
