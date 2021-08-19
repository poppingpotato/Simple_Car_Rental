<?php
	include_once 'includes/config.php';
	
	$id = $_REQUEST['id'];
	//user cancells the car request sent
	$sql = "UPDATE client SET ub_status = 'Cancelled' WHERE client_id = '$id'";

	$stmt = $conn->query($sql);
	//confirms if the process has proceeded
	if($stmt === TRUE){
		echo "<script type = \"text/javascript\">
        alert(\"Request has been CANCELLED\");
        window.location = (\"messages.php\")
		</script>";
	}
	else {
		echo "<script type = \"text/javascript\">
        alert(\"Request has NOT been cancelled\");
        window.location = (\"messages.php\")
		</script>";
	}
?>
