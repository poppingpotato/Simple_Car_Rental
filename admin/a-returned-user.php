<?php
	include_once 'include/actions.php';
	
	$id = $_REQUEST['id'];
	//sets status of client message to Declined
	$sql = "UPDATE client a JOIN cars b SET ub_status = 'Returned', b.status = 'Available' WHERE client_id = '$id' AND a.ucar_id = b.c_id";

	$stmt = $conn->query($sql);
	//confirms the user if declined or not
	if($stmt === TRUE){
		echo "<script type = \"text/javascript\">
        alert(\"Car has been returned\");
        window.location = (\"a-user-messages.php\")
		</script>";
	}
	else {
		echo "<script type = \"text/javascript\">
        alert(\"Car has not been returned\");
        window.location = (\"a-user-messages.php\")
		</script>";
	}
?>
