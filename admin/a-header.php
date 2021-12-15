<?php
  session_start();
    include_once 'include/admin.php';
    $admin = new Admin();
    $aid = $_SESSION['aid'];

    if (!$admin->get_session()){
      header('location:index.php');
    }

    if (isset($_GET['q'])){
      $admin->user_logout();
      echo "<script type = \"text/javascript\">
            alert(\"Admin Logged Out\");
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

    <!-- Datatable CSS -->
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css'>

    <!-- custom css -->
    <link rel="stylesheet" href="css/a-custom-page.css">
  </head>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
    <a class="navbar-brand" href="a-dashboard.php">Car Rental | <span class="badge badge-light">Administrator</span></a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarColor02"
      aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
      </ul>
      <ul class="navbar-nav  pr-2">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false"><i class="fas fa-user-circle"></i> Account</a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="a-change-password.php"><i class="fas fa-user-edit"></i> Change Password</a>
            <a class="dropdown-item" href="<?php $_SERVER["PHP_SELF"];?>?q=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="sidebar">
    <a href="a-dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="a-users.php"><i class="fas fa-users"></i> Users</a>
    <a href="a-carbookings.php"><i class="far fa-bookmark"></i> Car Bookings</a>
    <a href="a-carbrands.php"><i class="far fa-copyright"></i> Car Brands</a>
    <a href="a-vehicles.php"><i class="fas fa-car-alt"></i> Vehicles</a>
  </div>
</header>

<body>
  <div class ="content">
    