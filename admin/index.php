<?php
session_start();
include_once 'include/admin.php';
$admin = new Admin();

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $login = $admin->check_login($username, $password);
    if ($login) {
        // Log-in Success
        header("location:a-dashboard.php");
    } else {
        // Log-in Failed
        echo "<script type = \"text/javascript\">
        alert(\"Wrong Username or Password!\");
        window.location = (\"index.php\")
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- font awesome cdn  -->
    <!-- local directory does not work -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../assets/bootstrap-4.4.1/css/bootstrap.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="css/a-custom-page.css">

    <!-- JavaScripts -->
    <script src="../assets/jquery/jquery-3.4.1.slim.min.js"></script>
    <script src="../assets/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/popper/popper.min.js"></script>
    <script src="scripts/login.js"></script>
</head>

<body>
    <div class="container">
        <div class="box" id="#signin">
            <!-- Default form login -->
            <form method="POST" class="text-center border border-light p-5">
                <p class="h4 mb-4">Sign in<i class="fas fa-user-circle"></p></i>

                <!-- Email -->
                <input type="text" name="username" id="username" class="form-control mb-4" placeholder="Username">

                <!-- Password -->
                <input type="password" name="password" id="password" class="form-control mb-4" placeholder="Password">

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Forgot password -->
                        <a href="../index.php"><i class="fas fa-home"></i> HOME</a>
                    </div>
                </div>


                <!-- Sign in button -->
                <input onclick="return(submitlogin());" type="submit" name="submit" class="btn btn-info btn-block my-4" value="Sign in">

            </form>
            <!-- Default form login -->

        </div>
    </div>
</body>

</html>