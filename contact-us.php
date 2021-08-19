<?php
session_start();
include_once "d-header.php";
?>
  
  <div class="container-fullwidth">
    <!-- CONTACT -->
    <!-- FOOTER CONTACT CONTENT -->
    <footer class="container-fluid text-center">
      <div class="row">
        <div class="col-sm-4">
          <h1>CONTACT US</h1>
          <br>
          <h4>Street23, vehicle Rd, Cars City, 2431</h4>
          <br>
          <h5>Steet#, Barangay, City, 2601</h5>
          <h5>carsandrent@gmail.com</h5>
          <h5>carsandrent@gmail.com</h5>
          <h5>(074) 454 - 7896</h5>
        </div>
        <div class="col-sm-4">
          <h1>CONNECT</h1>
          <a href="#" class="fab fa-facebook fa-2x"></a>
          <a href="#" class="fab fa-twitter fa-2x"></a>
          <a href="#" class="fab fa-google fa-2x"></a>
          <a href="#" class="fab fa-instagram fa-2x"></a>
          <a href="#" class="fab fa-youtube fa-2x"></a>
        </div>
        <div class="col-sm-4">
          <h2>Comments or Suggestions?</h2>
          <form>
            <div class="form-group">
              <label for="comment">Tell us!</label>
              <textarea class="form-control" rows="3" id="comment"
                placeholder="Comments or Suggestions?"></textarea>
              <small id="Help" class="form-text text-muted">Comments or Suggestions</small>
            </div>
          </form>
          <button type="button" class="btn btn-success">SUBMIT</button>
        </div>
      </div>
    </footer>
  </div>

  <div class="container-fluid">

  </div>

<?php
include_once "d-footer.php";
?>