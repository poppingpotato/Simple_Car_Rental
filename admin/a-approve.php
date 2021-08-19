<?php
	include_once 'include/actions.php';
	
	$id = $_REQUEST['id'];
	//sets status of non user message approved
	$sql = "UPDATE messages a JOIN cars b SET a.b_status = 'Approved', b.status = 'N/A' WHERE m_id = '$id' AND a.car_id = b.c_id";


	$stmt = $conn->query($sql);
	//confirms the user if approved or not
	if($stmt === TRUE){
		echo "<script type = \"text/javascript\">
        alert(\"Request has been approved\");
        window.location = (\"a-messages.php\")
		</script>";
	}
	else {
		echo "<script type = \"text/javascript\">
        alert(\"Request has NOT been approved\");
        window.location = (\"a-messages.php\")
		</script>";
	}
?>
