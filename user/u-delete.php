<?php
	include_once 'includes/config.php';
	
	$id = $_REQUEST['id'];
	//user deletes the request sent 
	$sql = "DELETE FROM client WHERE client_id = '$id'";

	$stmt = $conn->query($sql);
	//user confirms if process has proceeded
	if($stmt === TRUE){
		echo "<script type = \"text/javascript\">
        alert(\"Request has been DELETED\");
        window.location = (\"messages.php\")
		</script>";
	}
	else {
		echo "<script type = \"text/javascript\">
        alert(\"Request has NOT been deleted\");
        window.location = (\"messages.php\")
		</script>";
	}
?>
