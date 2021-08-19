<?php
include_once "d-header.php";
include_once "includes/user.php";
$user = new User(); // checker for register duplicate and to register


if (isset($_REQUEST['submit'])){
    extract($_REQUEST);
    $register = $user->reg_user($firstname, $lastname, $uname, $uemail, $upass, $phone);
       if ($register) {
       // Registration Success
       echo "<script type = \"text/javascript\">
                   alert(\"REGISTRATION SUCCESSFUL!\");
                   window.location = (\"login.php\")
                   </script>";
           header("Refresh: 1");
       } else {
       // Registration Failed
       echo "<script type = \"text/javascript\">
               alert(\"REGISTRATION FAILED! Email or Username already exits please try again\");
               window.location = (\"register.php\")
               </script>";
               header("Refresh: 1", "register.php");
       }
    }
?>
    <div class="container">
        <div class="box" id="signin">
            <!-- Default form register -->
            <form method = "POST" class="text-center border border-light p-5" action="#!" name="reg">

                <p class="h4 mb-4">Sign up</p>

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- First name -->
                        <input type="text" name="firstname" id="firstname" class="form-control"
                            placeholder="First name"/>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <input type="text" name="lastname" id="lastname" class="form-control"
                            placeholder="Last name"/>
                    </div>
                </div>
                <!-- Username -->
                <input type="text" name="uname" id="uname" class="form-control mb-4" placeholder="Username"/>

                <!-- E-mail -->
                <input type="text" name="uemail" id="uemail" class="form-control mb-4" placeholder="E-mail"/>

                <!-- Password -->
                <input type="password" name="upass" id="upass" class="form-control mb-4" placeholder="Password"/>

                <!-- Phone number -->
                <input type="text" name="phone" id="phone" class="form-control"  placeholder="Phone number" />

                <!-- Sign up button -->
                <input onclick="return(submitreg());" type="submit" name="submit" class="btn btn-info btn-block my-4" value="Sign-up">

                 <!-- Register -->
                 <p>Already registered?
                    <a href="login.html">Login Here</a>
                </p>
            </form>
            <!-- Default form register -->
        </div>
    </div>

<?php
include_once "d-footer.php";
?>