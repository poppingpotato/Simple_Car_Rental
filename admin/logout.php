<?php
session_start();
unset($_SESSION);
session_destroy(); // destroy session
echo "<script type = \"text/javascript\">
	alert(\"User Logged Out\");
	window.location = (\"../index.php\")
	</script>";
?>