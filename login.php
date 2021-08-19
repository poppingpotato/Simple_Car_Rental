<?php
session_start();
include_once "includes/user.php";

$user = new User(); // checker for log in log out

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $login = $user->check_login($emailusername, $password);
    if ($login) {
        //Log-in Success
       header("location:user/index.php");
    } else {
        // Log-in Failed
        echo "<script type = \"text/javascript\">
        alert(\"Wrong Username or Password!\");
        window.location = (\"login.php\")
        </script>";
        
    }
}

include_once "d-header.php";
?>

    <div class="container">
        <div class="box" id="#signin">
            <!-- Default form login -->
            <form method="POST" class="text-center border border-light p-5" action="#!" name ="login" > 

                <p class="h4 mb-4">Sign in<i class="far fa-user-circle"></i></p>

                <!-- Email -->
                <input type="text" id="emailusername" name="emailusername" class="form-control mb-4" placeholder="E-mail / Username">

                <!-- Password -->
                <input type="password" id="password" name="password"class="form-control mb-4" placeholder="Password">

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Forgot password -->
                        <a href="">Forgot password?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <input onclick="return(submitlogin());" type="submit" name="submit" class="btn btn-info btn-block my-4" value="Sign-in">

                <!-- Register -->
                <p>Not a member?
                    <a href="register.php">Register</a>
                </p>

            </form>
            <!-- Default form login -->

        </div>
    </div>

<?php
include_once "d-footer.php";
?>