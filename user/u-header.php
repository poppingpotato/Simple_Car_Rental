<?php
session_start();
include_once 'includes/user.php';
$user = new User(); 
$uid = $_SESSION['uid'];
if (!$user->get_session()){
 header("location:../login.php");
}

if (isset($_GET['q'])){
  $user->user_logout();
  echo "<script type = \"text/javascript\">
        alert(\"User Logged Out\");
        window.location = (\"../index.php\")
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="../assets/bootstrap-4.4.1/css/bootstrap.min.css">
  

  <!-- Jquery UI theme -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../css/custom-page.css">
</head>


<header>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Car Rental</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
      aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php

    ?>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about-us.php"><i class="fas fa-car"></i> About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="car-listing.php"><i class="fas fa-clipboard-list"></i> Car Listing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="messages.php"><i class="far fa-envelope"></i> Messages</a>
        </li>
      </ul>
      <ul class="navbar-nav mr-4 pr-5">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false"><i class="far fa-user"></i> Welcome, <?php $user->get_fullname($uid); ?> </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#"><i class="fas fa-user-edit"></i> Change Password</a>
            <a class="dropdown-item" href="<?php $_SERVER["PHP_SELF"];?>?q=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>

<body>