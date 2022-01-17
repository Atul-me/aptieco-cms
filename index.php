<!DOCTYPE html>
<html lang="en">
<title>APTIECO</title>
<?php include "include/includes.php"; ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/style-cards.css">
<body>

<!-- Header -->
<header class="w3-display-container w3-content w3-center" style="max-width:100%">
<?php include "include/top-bar.php"; ?>
    <!-- Navbar (placed at the bottom of the header image) -->
    </header>

<!-- Navbar on small screens -->
<div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
</div>
  <img class="w3-image" src="img/home.jpg" alt="Me" width="100%" height="600">
  <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
    <h1 class="w3-hide-medium w3-hide-small w3-xxxlarge" style="color: #000"><b>APTIECO</b></h1>
    <h5 class="w3-hide-large" style="white-space:nowrap" style="color: #000"><b>APTIECO</b></h5>
    <h3 class="w3-hide-medium w3-hide-small" style="color: #000"><b>APTIECO</b></h3>
  </div>
<!-- Page content -->
<div class=" col-md-11 mx-auto w3-padding-large w3-margin-top" id="portfolio">

  <!-- Images (Portfolio) -->
  <div id="carouselExampleInterval" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="1000">
                        <img src="img/1.jpg" class="rounded d-block w-100" alt="..."width="1000" height="500">
                    </div>
                    <div class="carousel-item" data-interval="1000">
                        <img src="img/2.jpg" class="rounded d-block w-100" alt="..."width="1000" height="500">
                    </div>
                    <div class="carousel-item" data-interval="1000">
                        <img src="img/3.jpg" class="rounded d-block w-100" alt="..."width="1000" height="500">
                    </div>
                    <div class="carousel-item" data-interval="1000">
                        <img src="img/4.jpg" class="rounded d-block w-100" alt="..."width="1000" height="500">
                    </div>
                    <div class="carousel-item" data-interval="1000">
                        <img src="img/6.jpg" class="rounded d-block w-100" alt="..."width="1000" height="500">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            </div>
            <br>
  <!-- partial:index.partial.html -->
<main>
  <a href="https://google.com" class="card">
      <div class="inner">
        <h2 class="title">Education is the passport to the future, for tomorrow belongs to those who prepare for it today.</h2>
        
      </div>
  </a>
        
  <a href="https://google.com" class="card card2">
      <div class="inner">
        <h2 class="title">If we want to reach real people in this world, we should start educating children.</h2>
        
      </div>
  </a>

  <a href="https://google.com" class="card card3">
      <div class="inner">
        <h2 class="title">A good education is a foundation for better future</h2>
        
      </div>
  </a>
<main>
  <!-- Contact -->
  <div class="w3-content w3-padding-large w3-margin-top" id="portfolio">
  <div class="w3-dark-grey w3-padding-large w3-margin-top" id="contact">
    <h4 class="w3-center">Contact</h4>
      <div class="w3-section">
        <label>Contact No: +911234567890</label>
       
      </div>
      <div class="w3-section">
        <label>E-mail: dsms@example.com</label>
       
      </div>
      <div class="w3-section">
        <label>School Address: XYZ-Type-1, New-Delhi, India.</label>
        
      </div>
  </div>

<!-- End page content -->
</div>
</div>
<br><br>
<?php include "include/footer.php"; ?>
</body>
</html>
