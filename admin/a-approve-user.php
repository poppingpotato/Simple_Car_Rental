<?php
	include_once 'include/actions.php';
	
	$id = $_REQUEST['id'];
	//sets status of client message approved
	$sql = "UPDATE client a JOIN cars b SET a.ub_status = 'Approved', b.status = 'N/A' WHERE client_id = '$id' AND a.ucar_id = b.c_id";

	$stmt = $conn->query($sql);
	//confirms the user if approved or not
	if($stmt === TRUE){
		echo "<script type = \"text/javascript\">
        alert(\"Request has been approved\");
        window.location = (\"a-user-messages.php\")
		</script>";
	}
	else {
		echo "<script type = \"text/javascript\">
        alert(\"Request has NOT been approved\");
        window.location = (\"a-user-messages.php\")
		</script>";
	}
?>
