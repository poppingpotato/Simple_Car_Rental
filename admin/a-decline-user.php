<?php
	include_once 'include/actions.php';
	
	$id = $_REQUEST['id'];
	//sets status of client message to Declined
	$sql = "UPDATE client SET ub_status = 'Declined' WHERE client_id = '$id'";

	$stmt = $conn->query($sql);
	//confirms the user if declined or not
	if($stmt === TRUE){
		echo "<script type = \"text/javascript\">
        alert(\"Request has been declined\");
        window.location = (\"a-user-messages.php\")
		</script>";
	}
	else {
		echo "<script type = \"text/javascript\">
        alert(\"Request has NOT been declined\");
        window.location = (\"a-user-messages.php\")
		</script>";
	}
?>
