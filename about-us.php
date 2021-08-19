<?php
session_start();

include_once "d-header.php";
?>

  <div class="container-fullwidth">
    <!-- ABOUT US -->
    <div class="padding">
      <div class="container">
        <h2 class=text-center>ABOUT US</h2>
        <div class="row">
          <div class="col-sm-6 text-center">
            <img src="assets/img/Rav.jpeg">
          </div>
          <div class="col-sm-6">
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper facilisis
              consequat. Ut tempus metus et mauris malesuada, eu bibendum diam dictum. Proin tempor varius ex nec
              congue.
              Nullam felis ligula, finibus non eros eu, tempus interdum turpis. Vestibulum posuere convallis urna, ut
              vulputate sapien tristique sed. Vestibulum malesuada, lorem eget lacinia facilisis, ligula nunc tristique
              augue, quis aliquet est dui id purus.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="padding">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper facilisis
              consequat. Ut tempus metus et mauris malesuada, eu bibendum diam dictum. Proin tempor varius ex nec
              congue.
              Nullam felis ligula, finibus non eros eu, tempus interdum turpis. Vestibulum posuere convallis urna, ut
              vulputate sapien tristique sed. Vestibulum malesuada, lorem eget lacinia facilisis, ligula nunc tristique
              augue, quis aliquet est dui id purus.</p>
          </div>
          <div class="col-sm-6 text-center">
            <img src="assets/img/corolla.jpg">
          </div>
        </div>
      </div>
    </div>

    <!-- DIVIDER -->
    <div id="divider">
      <div class="landing-text">
        <h1>CAR RENTAL</h1>
        <h3>GALLERY</h3>
      </div>
    </div>



<?php
include_once 'd-carousel.php';
include_once 'd-footer-foot.php';
include_once "d-footer.php";
?>